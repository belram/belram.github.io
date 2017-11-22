'use strict';

function showSpecialPrice() {
  console.log('Введен секретный код. Все цены уменьшены вдвое!');
}

//Part 1

const orders = [
  { price: 21, amount: 4 },
  { price: 50, amount: '17 штук' },
  { price: 7, amount: '1,5 килограмма' },
  { price: 2, amount: ' 2.7 метра ' },
  { price: 1, amount: 'семь единиц' }
];

function fixAmount(amount) {
  if(typeof (amount) !== 'number') {
    
    let newAmount = amount.trim();
    
    if(newAmount.indexOf(',') !== -1) {
      var temporary = newAmount.replace(',', '.');
      
      return parseFloat(temporary);
      
    } else if(newAmount.indexOf('.') !== -1) {
      
      return parseFloat(newAmount);
    } else if(parseInt(newAmount)) {
      
      return parseInt(newAmount);
    } else {

      return -1;
    }
  } else {
    return amount;
  }
}

for (let order of orders) {
  let result = fixAmount(order.amount);
  console.log(`Заказ на сумму: ${result * order.price} Q`);
}

//Part 2

var keys = ['2', '4', 'R', '2', 'd', '2'];
var tempStr = '';

function handleKey(char) {
  tempStr = tempStr.concat(char).toLowerCase();
  if(tempStr.slice(-4) === 'r2d2') {
    return showSpecialPrice();
  }
}

for (let key of keys) {
  handleKey(key);
}

//Part 3

function parseData(nwObj, data) {
  var tempArr = [];
  for(var i = 0; i < data.length; i++) {
    var elemArr = data[i].split(',');
    var tempObj = {};
    for(var j = 0; j < nwObj.length; j++) {
      tempObj[nwObj[j]] = elemArr[j].trim();
    }
    tempArr[i] = tempObj;
  }
  
  return tempArr;
}

const data = [
  '12,Телепорт бытовой VZHIH-101 ,17,10000',
  '77, Меч световой FORCE (синий луч), 2,57000'
];

let items = parseData(['id', 'name', 'amount', 'price'], data);
console.log(items);
