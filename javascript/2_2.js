'use strict';

var positions = [
  {
    title: 'Телепорт бытовой VZHIH-101',
    price: 10000,
    discount: 7,
    available: 3
  },
  {
    title: 'Ховерборд Mattel 2016',
    price: 9200,
    discount: 4,
    available: 14
  },
  {
    title: 'Меч световой FORCE (синий луч)',
    price: 57000,
    discount: 0,
    available: 1
  }
];

//Part 1

const itemPrototype = {
  hold(amount = 1) {
    if (this.available < amount) {
      return false;
    }
    this.available -= amount;
    this.holded += amount;
    return true;
  },
///////////////////////////////////////////////////////////////
  unhold(unHolded = 0) {
    if(this.holded < unHolded){
      return false;
    }else if(unHolded === 0) {
      this.available += this.holded;
      this.holded = 0;
    }
    this.available += unHolded;
    this.holded -= unHolded;
    return true;
  },
/////////////////////////////////////////////////////////////////
  toString() {
    return `${this.title} (остаток ${this.available}, в резерве ${this.holded})`;
  }
};

function createItem(title, amount) {
  const item = Object.create(itemPrototype);
  item.title = title;
  item.available = amount;
  item.holded = 0;
  item.unHolded = 0;
  return item;
}

const items = [];
for (let item of positions) {
  items.push(createItem(item.title, item.available));
}

items[0].hold(2);
items[1].hold(8);
items[1].hold(12);
items[2].hold(1);

console.log(`Товар ${items[0]}`);
items[0].unhold(1);
console.log(`Товар ${items[0]}`);
console.log(`Товар ${items[1]}`);
items[1].unhold();
console.log(`Товар ${items[1]}`);
console.log(`Товар ${items[2]}`);
items[2].unhold();
console.log(`Товар ${items[2]}`);

//Part 2

for (let item of positions) {
  Object.defineProperty(item, "finalPrice", {
    get: function() {
      return this.price - (this.price * (this.discount / 100));
    },
    set: function(value) {
      try {
        if(value <= this.price) {
          this.discount = ((this.price - value) / this.price) * 100;
        } else if(value > this.price) {
          throw 'Attention! "finalPrice" should be less or equal "price"!';
        }
    } catch(e) {
      console.log(e);
    }
    }
  });
}

console.log(positions[0].finalPrice);
positions[2].finalPrice = 28500;
console.log(positions[2].discount);

console.log(positions[1].finalPrice);
console.log(positions[1].discount);
positions[1].finalPrice = 100000;
console.log(positions[1].discount);
console.log(positions[1].finalPrice);

//Part 3

const requiredFields = [ 'title', 'price', 'discount' ];
let form1 = {
  title: 'Товар Телепорт бытовой VZHIH-101',
  price: 7800,
  discount: 0
};
let form2 = {
  title: 'Товар Телепорт бытовой VZHIH-101',
  discount: 10
}

function isValidPosition(form, requiredFields) {
  var count = 0;
  var keys =  Object.keys(form);
  for(var i = 0; i < requiredFields.length; i++) {
    if(requiredFields[i] === keys[i]) {
      count ++;
    }
  }
  if(count === requiredFields.length) {
    return true;
  } else {
    return false;
  }
}

if(isValidPosition(form1, requiredFields)) {
  console.log('Форма № 1 заполнена верно');
} else {
  console.log('В форме № 1 не заполнены необходимые поля');
}

if(isValidPosition(form2, requiredFields)) {
  console.log('Форма № 2 заполнена верно');
} else {
  console.log('В форме № 2 не заполнены необходимые поля');
}
