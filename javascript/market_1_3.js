'use strict';

// Part 1

var positions = [
        'Отвертка ультразвуковая WHO-D',
        'Ховерборд Mattel 2016',
        'Нейтрализатор FLASH black edition',
        'Меч световой FORCE (синий луч)',
        'Машина времени DeLorean',
        'Репликатор домашний STAR-94',
        'Лингвенсор 000-17',
        'Целеуказатель электронный WAY-Y'
	]

var arrayLength = positions.length;

console.log('Список наименований:');

for (var i = 0, j = 1; i < positions.length; i++, j++) {
	console.log(`${j}. ${positions[i]}`);
}

// Part 2

positions.push('Экзоскелет Trooper-111', 'Нейроинтерфейс игровой SEGUN', 'Семена дерева Эйва');
console.log('Окончательный список наименований:');
for (var i = 0, j = 1; i < positions.length; i++, j++) {
	console.log(`${j}. ${positions[i]}`);
}

// Part 3

var productIndex = positions.indexOf('Машина времени DeLorean');
var firstlyAccept = positions.splice(productIndex, 1);
positions.unshift(firstlyAccept[0]);
console.log('Принять в первую очередь:');
for (var i = 0, j = 1; i < 3; i++, j++) {
	console.log(`${j}. ${positions[i]}`);
}

// Part 4

// for (var i = 0, j = 1; i < positions.length; i++, j++) {
// 	console.log(`${j}. ${positions[i]}`);
// }

// var productInShop = positions.slice(0, 5);
// var [product1, product2, product3, product4, product5] = productInShop;
// 	console.log('В магазине');
// for (var i = 1; i <= 5; i++){
// 	console.log(`${product${i}}`);
// }


// var productRest = positions.slice(5, 11);
// console.log(productRest);
