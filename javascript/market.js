'use strict';
//Part 1
var productName, productPrice;
//Part 2
productName = 'Телепорт бытовой VZHIH-101';
productPrice = 10000;
console.log(`В наличии имеется: ${productName}`);
console.log(`Стоимость товара: ${productPrice} Q`);
//Part 3
var discontIfTwo = 0.1, totalPrice;
totalPrice = (productPrice * 2) - ((productPrice * 2) * discontIfTwo);
console.log(`Цена покупки составит: ${totalPrice} Q`);
//Part 4
var cash = 52334224, buyPrice = 6500, purchaseProduct, restCash;
purchaseProduct = (cash - (cash % buyPrice)) / buyPrice;
restCash = cash - purchaseProduct * buyPrice;
console.log(`Мы можем закупить ${purchaseProduct} единиц товара, после закупки на счету останется ${restCash} Q`);
