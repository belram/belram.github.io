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

function getPicturePrice(yourString) {
  if((!!yourString) !== false) {
    var count = yourString.split(' ');
    return count.length * 11;
  } else {
    return 0;
  }
}

console.log('Подарочная упаковка и гравировка: ', getPicturePrice(yourString), ' Q');

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
  if(!!needDestination) {
    if(deliveryDestination in data) {
      var priceDelivery = data[deliveryDestination];
      return priceDelivery;
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

var pictureBill, deliveryBill, guaranteeBill, termGuarantee = 1;

function showAllInfo(termGuarantee, yourString, deliveryDestination, needDestination){
  
  function chooseGuarantee(termGuarantee) {
    if(termGuarantee === 1) {
      return 1250;
    } else if(termGuarantee === 2) {
      return 2300;
    } else {
      return 0;
    }
  }
  
  guaranteeBill = chooseGuarantee(termGuarantee);
  
  function getPicturePrice(yourString) {
    if((!!yourString) !== false) {
      var count = yourString.split(' ');
      return count.length * 11;
    } else {
      return 0;
    }
  }
  
  pictureBill = getPicturePrice(yourString);
  
  function countDelivery(deliveryDestination, needDestination) {
    if(!!needDestination) {
      if(deliveryDestination in data) {
        var priceDelivery = data[deliveryDestination];
        return priceDelivery;
      } else {
        return NaN;
      }
    } else {
    return 0;
    }
  }
  
  deliveryBill = countDelivery(deliveryDestination, needDestination);
  deliveryBill = (isNaN(deliveryBill)) ? 0: deliveryBill;
  
  var totalBill = guaranteeBill + pictureBill + deliveryBill;
  
  return totalBill;
}

console.log(`Общая стоимость заказа: ${showAllInfo(termGuarantee, yourString, deliveryDestination, needDestination)} Q.
Из них ${guaranteeBill} Q за гарантийное обслуживание на ${termGuarantee} год/года.
Гравировка на сумму ${pictureBill} Q.
Доставка в область ${deliveryDestination}: ${deliveryBill} Q.`
  );
