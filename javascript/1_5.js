'use strict';
//Part 1
const TAX_RATE = 0.73;
var taxPaymments = 1000;

function countTaxes(soldProduct) {
    taxPaymments += (soldProduct * TAX_RATE);
    
    console.log(`Налог с продаж (73 %), к оплате: ${taxPaymments} Q`);
}

var tv = 500;
countTaxes(tv);
var laptop = 1000;
countTaxes(laptop);
var car = 20000;
countTaxes(car);

//Part 2
var restPackaging = 30;
function isPack(width, height, length) {
  var restAfterOrder;
  var requirePackaging = 2 * (width * height + height * length + width * length);
  
  if(requirePackaging < restPackaging){
    restAfterOrder = restPackaging - requirePackaging;

    console.log(`Заказ (${width}/${height}/${length} м) упакован, осталось упаковочной бумаги ${restAfterOrder} м2`);
  }else {
    console.log(`Заказ (${width}/${height}/${length} м) не упакован, осталось упаковочной бумаги ${restPackaging} м2`);
  }
}

isPack(2, 3, 1);
isPack(10, 5, 1);

//Part 3

var chargeEnergy = [7, 2, 1];
var allCounters = [];
function geret(allCounters, chargeEnergy, j){
  for(var i = 0; i <= 7; ++i) {
    allCounters[i] = function() {
      if(chargeEnergy > 0){
        console.log(`Телепорт ${j} использован, заряд — ${--chargeEnergy} единиц`);
      } else if(chargeEnergy <= 0) {
        console.log(`Телепорт ${j} недоступен, перезаряжается`);
      }
    };
  }
}

var teleport1 = geret(allCounters, chargeEnergy[0], 1);
teleport1 = allCounters[7];
var teleport2 = geret(allCounters, chargeEnergy[1], 2);
teleport2 = allCounters[2];
var teleport3 = geret(allCounters, chargeEnergy[2], 3);
teleport3 = allCounters[1];

teleport1();
teleport1();
teleport2();
teleport1();
teleport2();
teleport2();
teleport3();
teleport1();
teleport3();
