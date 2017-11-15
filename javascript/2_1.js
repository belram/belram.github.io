'use strict';
var positions = [
  {
    title: 'Телепорт бытовой VZHIH-101',
    producer: {
      name: 'Рязанский телепортостроительный завод',
      deferPeriod: 10,
      lot: 3
    },
    price: 10000
  },
  {
    title: 'Ховерборд Mattel 2016',
    producer: {
      name: 'Волжский Ховерборд Завод',
      deferPeriod: 24,
      lot: 14
    },
    price: 9200
  },
  {
    title: 'Меч световой FORCE (синий луч)',
    producer: {
      name: 'Тульский оружейный комбинат',
      deferPeriod: 5,
      lot: 1
    },
    price: 57000
  }
];

//Part 1

var order1 = 29;
var product1 = positions[0];
var order2 = 50;
var product2 = positions[1];

function lotCalculator(product, order) {
  var lots = Math.ceil(order / product['producer']['lot']);
  var total = product['producer']['lot'] * lots * product['price'];
  
  return {'lots': lots, 'total': total};
}

let result1 = lotCalculator(product1, order1);
let result2 = lotCalculator(product2, order2);

console.log(`${product1.title} ${order1} штук: заказать партий ${result1.lots}, стоимостью ${result1.total} Q`);
console.log(`${product2.title} ${order2} штук: заказать партий ${result2.lots}, стоимостью ${result2.total} Q`);


//Part 2

const deferedPayments = [];

const producer1 = {
  name: 'Рязанский телепортостроительный завод',
  deferPeriod: 10
};
var date1 = new Date(2015, 8, 18);

const producer2 = {
  name: 'Волжский Ховерборд Завод',
  deferPeriod: 24
};
var date2 = new Date(2054, 5, 22);

const producer3 = {
  name: 'Тульский оружейный комбинат',
  deferPeriod: 5
};
var date3 = new Date(2015, 11, 29);

function deferPay(producer, amount, date) {
  var paymentDate = date;
  paymentDate.setDate(paymentDate.getDate() + producer['deferPeriod']);

	deferedPayments.push({'producer': {'name': producer['name']},
	'amount': amount,
	'paymentDate': paymentDate});
}

deferPay(producer1, 7400, date1);
deferPay(producer2, 15800, date2);
deferPay(producer3, 190000, date3);

console.log(`${deferedPayments[0]['paymentDate'].toLocaleDateString('ru-Ru')}: ${deferedPayments[0]['producer']['name']}, сумма ${deferedPayments[0]['amount']} Q`);
console.log(`${deferedPayments[1]['paymentDate'].toLocaleDateString('ru-Ru')}: ${deferedPayments[1]['producer']['name']}, сумма ${deferedPayments[1]['amount']} Q`);
console.log(`${deferedPayments[2]['paymentDate'].toLocaleDateString('ru-Ru')}: ${deferedPayments[2]['producer']['name']}, сумма ${deferedPayments[2]['amount']} Q`);

//Part 3

function loadCurrencyJSON() {
  return '{"AUD":44.95,"AZN":33.73,"GBP":73.42,"AMD":0.12,"BYN":30.96,"BGN":32.01,"BRL":18.8,"HUF":0.2,"DKK":8.42,"USD":58.85,"EUR":62.68,"INR":0.88,"KZT":0.18,"CAD":44.74,"KGS":0.85,"CNY":8.55,"MDL":2.94,"NOK":7.02,"PLN":14.55,"RON":13.92,"ZZZ":79.91,"SGD":41.36,"TJS":7.43,"TRY":15.97,"TMT":16.84,"UZS":0.02,"UAH":2.16,"CZK":2.32,"SEK":6.6,"CHF":58.69,"ZAR":4.4,"KRW":0.05,"JPY":0.52}';
}

var currencyExchange;

function convertCurrency(amount, from, to) {
  currencyExchange = JSON.parse(loadCurrencyJSON());
	var result = amount * (currencyExchange[from] / currencyExchange[to]);
	return Math.round(result * 100) / 100;
}

try{
  if(loadCurrencyJSON()){
    var price1 = convertCurrency(7000, 'ZZZ', 'USD');
    var price2 = convertCurrency(790, 'EUR', 'ZZZ');
  }
}catch(err){
	console.error(err.name, err.message);
}

console.log(`Сумма ${price1} USD`);
console.log(`Сумма ${price2} Q`);
