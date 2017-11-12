'use strict';
//Part 1
function chooseGuarantee(termGuarantee) {
  if(termGuarantee === 1) {
    return 1250;
  }else if(termGuarantee === 2) {
    return 2300;
  }else {
    return 0;
  }
}

console.log('Дополнительное гарантийное обслуживание: ', chooseGuarantee(1), ' Q');

//Part 2

var yourString = 'I like JS and PHP';

function getPicturePrice() {
  return countWords(yourString) * 11;
}
function countWords(yourString) {
  var count = yourString.split(' ');
  return count.length;
}
console.log('Подарочная упаковка и гравировка: ', getPicturePrice(), ' Q');

//Part 3

var data = {
  'Луна': 150,
  'Крабовидная туманность': 250,
  'Галактика Туманность Андромеды': 550,
  'Туманность Ориона': 600
}
    
var needDestination = 'yes';
var deliveryDestination = 'Крабовидная туманность';

function countDelivery(deliveryDestination, needDestination) {
  if(needDestination === 'yes') {
    if(deliveryDestination in data) {
      for(var key in data) {
        if(key === deliveryDestination) {
          var priceDelivery = data[key];
          return priceDelivery;
        } 
      }
    } else {
      return NaN;
    }
  } else {
    return 0;
  }
}

function showResult(deliveryDestination, needDestination){
  var totalRes = countDelivery(deliveryDestination, needDestination);
  if(isNaN(totalRes)) {
    console.log('Ошибка при расчете стоимости доставки.');  
  } else if(totalRes === 0) {
    console.log('Доставка не требуется.');
  } else {
    console.log(`Стоимость доставки: ${totalRes} Q`);
  }
}

showResult(deliveryDestination, needDestination);

//Part 4

var termGuarantee = 1;
var temporary = countDelivery(deliveryDestination, needDestination);

function showAllInfo(termGuarantee, yourString, needDestination, deliveryDestination){
  if(isNaN(temporary)) {
    temporary = 0;
  }
  var totalBill = chooseGuarantee(termGuarantee) + getPicturePrice() + temporary;
  return totalBill;
}

console.log(`Общая стоимость заказа: ${showAllInfo(termGuarantee, yourString, needDestination, deliveryDestination)} Q.
Из них ${chooseGuarantee(termGuarantee)} Q за гарантийное обслуживание на ${termGuarantee} год/года.
Гравировка на сумму ${getPicturePrice()} Q.
Доставка в область ${deliveryDestination}: ${temporary} Q.`
  );
