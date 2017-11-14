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
  if(!!yourString) {
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

function countDelivery(needDestination, deliveryDestination) {
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

function showResult(needDestination, deliveryDestination){
  var totalRes = countDelivery(needDestination, deliveryDestination);
  if(Number.isNaN(totalRes)) {
    console.log('Ошибка при расчете стоимости доставки.');  
  } else if(totalRes === 0) {
    console.log('Доставка не требуется.');
  } else {
    console.log(`Стоимость доставки: ${totalRes} Q`);
  }
}

showResult(needDestination, deliveryDestination);

//Part 4

var termGuarantee = 1, allInfo;

function showAllInfo(termGuarantee, yourString, needDestination, deliveryDestination){
  
  function chooseGuarantee(termGuarantee) {
    if(termGuarantee === 1) {
      return 1250;
    } else if(termGuarantee === 2) {
      return 2300;
    } else {
      return 0;
    }
  }
  
  var guaranteeBill = chooseGuarantee(termGuarantee);
  
  function getPicturePrice(yourString) {
    if(!!yourString) {
      var count = yourString.split(' ');
      return count.length * 11;
    } else {
      return 0;
    }
  }
  
  var pictureBill = getPicturePrice(yourString);
  
  function countDelivery(needDestination, deliveryDestination) {
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
  
  var deliveryBill = countDelivery(needDestination, deliveryDestination);
  deliveryBill = (Number.isNaN(deliveryBill)) ? 0: deliveryBill;
  
  var totalBill = guaranteeBill + pictureBill + deliveryBill;
  
  return [totalBill, guaranteeBill, pictureBill, deliveryBill];
}

allInfo = showAllInfo(termGuarantee, yourString, needDestination, deliveryDestination);

console.log(`Общая стоимость заказа: ${allInfo[0]} Q.
Из них ${allInfo[1]} Q за гарантийное обслуживание на ${termGuarantee} год/года.
Гравировка на сумму ${allInfo[2]} Q.
Доставка в область ${deliveryDestination}: ${allInfo[3]} Q.`
  );
