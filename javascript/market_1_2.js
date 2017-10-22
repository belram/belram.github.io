'use strict';

// Part 1

let amountStock = 10, amountOrder = 10;
if(amountOrder > amountStock){
	console.log('На складе нет такого количества товаров');
}else if(amountOrder == amountStock){
	console.log('Вы забираете весь товар c нашего склада!');
}else{
	console.log('Заказ оформлен');
}

// Part 2

let oredrDestination = 'Туманность Ориона';
switch (oredrDestination){
	case 'Луна':
	console.log(`Стоимость доставки для области Луна: 150 Q`);
	break;
	case 'Крабовидная туманность':
	console.log(`Стоимость доставки для области Крабовидная туманность: 250 Q`);
	break;
	case 'Галактика Туманность Андромеды':
	console.log(`Стоимость доставки для области Галактика Туманность Андромеды: 550 Q`);
	break;
	case 'Туманность Ориона':
	console.log(`Стоимость доставки для области Туманность Ориона: 600 Q`);
	break;
	case 'Звезда смерти':
	console.log(`Стоимость доставки для области Звезда смерти: договорная цена`);
	break;
	default:
	console.log('В ваш квадрант доставка не осуществляется');
}

// Part 3

let priceProduct = 4;
try{
	if(typeof (priceProduct) !== 'number'){
		throw 'Price has to be number!';
	}
	console.log('Цена товара введена корректно!');
}catch(err){
	console.log(`Вы допустили ошибку: '${priceProduct}' не является числом!`);
}

// Part 4

let userLivingPlanet = 'svew', userAge = 18;
if((userLivingPlanet === 'Земля') && (userAge < 18)){
	console.log('Вы не достигли совершеннолетия!');
}else if((userLivingPlanet === 'Земля') && (userAge >= 18)){
	console.log('Приятных покупок!');
}else if((userLivingPlanet === 'Юпитер') && (userAge < 120)){
	console.log('Сожалеем. Вернитесь на 120-й день рождения');
}else if((userLivingPlanet === 'Юпитер') && (userAge >= 120)){
	console.log('Чистого неба и удачных покупок!');
}else{
	console.log('Спасибо, что пользуетесь услугами нашего магазина!');
}

// Part 4 через try-cath

try{
	if((userLivingPlanet === 'Земля') && (userAge < 18)){
		throw 'Вы не достигли совершеннолетия!';
	}else if((userLivingPlanet === 'Юпитер') && (userAge < 120)){
		throw 'Сожалеем. Вернитесь на 120-й день рождения';
	}
	if((userLivingPlanet === 'Земля') && (typeof(userAge) == 'number')){
		console.log('Приятных покупок!');
	}else if((userLivingPlanet === 'Юпитер') && (typeof(userAge) == 'number')){
		console.log('Чистого неба и удачных покупок!');
	}else{
		console.log('Спасибо, что пользуетесь услугами нашего магазина!');
	}
}catch(err){
	console.log(err);
}
