<?php 

class SuperProduct
{
	protected $title;
	protected $tipe;
	protected $price;

	public function __construct($title, $tipe, $price)
	{
		$this->title = $title;
		$this->tipe = $tipe;
		$this->price = $price;
	}
}


//First./////////////////////////////////////////////////////////////////////////
interface FirstInterface
{
	public function getDescription();
}

class Car extends SuperProduct implements FirstInterface
{

	private $color;
	private $engine;
	private $sizeOfWheel;
	private $quantityOfDoors;

	public function __construct($title, $tipe, $price, $color, $engine, $sizeOfWheel, $quantityOfDoors)
	{
		parent::__construct($title, $tipe, $price);

		$this->color = $color;
		$this->engine = $engine;
		$this->sizeOfWheel = $sizeOfWheel;
		$this->quantityOfDoors = $quantityOfDoors;
	}

	public function getDescription()
	{
		return ['title' => $this->title, 'tipe' => $this->tipe, 'price' =>  $this->price, 'color' =>  $this->color, 'engine' =>  $this->engine, 'sizeOfWheel' =>  $this->sizeOfWheel, 'quantityOfDoors' =>  $this->quantityOfDoors,];
	}

}

$bmw_3 = new Car('BMW 3', 'sedan', 25000, 'red', 2999, 17, 4);
$renaultLogan = new Car('Renault Logan', 'sedan', 8500, 'white', 1300, 15, 4);

print 'BMW 3 <ul>';
foreach ($bmw_3->getDescription() as $key => $value) {
	print "<li>{$key}: $value</li>";
}
print '</ul>';

print 'Renault Logan <ul>';
foreach ($renaultLogan->getDescription() as $key => $value) {
	print "<li>{$key}: $value</li>";
}
print '</ul>';

print '<hr>';


//Second.///////////////////////////////////////////////////////////////////////////

interface SecondInterface
{
	public function priceWithDiscount();
}

class TV extends SuperProduct implements SecondInterface
{
	private $sizeOfScreen;
	private $discount;

	public function __construct($title, $tipe, $price, $sizeOfScreen, $discount)
	{
		parent::__construct($title, $tipe, $price);

		$this->sizeOfScreen = $sizeOfScreen;
		$this->discount = $discount;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTipe($tipe)
	{
		$this->tipe = $tipe;
	}

	public function getTipe()
	{
		return $this->tipe;
	}

	public function setSizeOfScreen($sizeOfScreen)
	{
		$this->sizeOfScreen = $sizeOfScreen;
	}

	public function getSizeOfScreen()
	{
		return $this->sizeOfScreen;
	}


	public function priceWithDiscount()
	{
		return round($this->price - ($this->price * $this->discount) / 100);
	}

}

$assortmentTV = ['LG' => ['tipe' => '3D', 'price' => 400, 'sizeOfScreen' => 40, 'discount' => 5],
				'SONY' => ['tipe' => '3D', 'price' => 3600, 'sizeOfScreen' => 50, 'discount' => 10],
				'PASONIC' => ['tipe' => '3D', 'price' => 5000, 'sizeOfScreen' => 60, 'discount' => 7]];

$allTV = [];

foreach ($assortmentTV as $key => $value) {
	$allTV[] = new TV($key, $value['tipe'], $value['price'], $value['sizeOfScreen'], $value['discount']);
}

foreach ($allTV as $key => $value) {
	print $value->getTitle() . ' cost ' . $value->priceWithDiscount() . "<br>\n";
}

print '<hr>';


//Third. //////////////////////////////////////////////////////////////////////////////////////

interface ThirdInterface
{
	public function canBuyWholesale();
}

class BallPen extends SuperProduct implements ThirdInterface
{
	private $color;
	private $num_of_use;
	private $isInBox;
	const SIZE_OF_LOT = 500;

	public function __construct($title, $tipe, $price, $color, $num_of_use, $isInBox)
	{
		parent::__construct($title, $tipe, $price);

		$this->color = $color;
		$this->num_of_use = $num_of_use;
		$this->isInBox = $isInBox;
	}

	public function canBuyWholesale()
	{
		if($this->isInBox == 'Yes'){
			print "You can buy {$this->title} wholesale, if your order more then " . self::SIZE_OF_LOT . " units.<br>\n";
		}else{
			print "You can't buy {$this->title} wholesale.<br>\n";
		}
	}

}


$assortmentPen = ['Hewlett-Packard' => ['tipe' => 'ballpen', 'price' => .6, 'color' => 'black', 'num_of_use' => 'one-off', 'isInBox' => 'No'],
				'Parker' => ['tipe' => 'ink pen', 'price' => 1, 'color' => 'black', 'num_of_use' => 'reusable', 'isInBox' => 'Yes'],
				'Senator' => ['tipe' => 'capillary', 'price' => .5, 'color' => 'blue', 'num_of_use' => 'one-off', 'isInBox' => 'No']];

$allPens = [];

foreach ($assortmentPen as $key => $value) {
	$allPens[] = new BallPen($key, $value['tipe'], $value['price'], $value['color'], $value['num_of_use'], $value['isInBox']);
}


foreach ($allPens as $key => $value) {
	$value->canBuyWholesale();
}

print '<hr>';

//Fourth.///////////////////////////////////////////////////////////////////

interface FourthInterface
{
	public function getPriceOrder();
	public function getPrice();
}

class Duck extends SuperProduct implements FourthInterface
{
	private $standardWeight;
	private $isGeneticallyModified;
	const IF_GEN_MOD = .8;

	public function __construct($title, $tipe, $price, $standardWeight, $isGeneticallyModified)
	{
		parent::__construct($title, $tipe, $price);

		$this->standardWeight = $standardWeight;
		$this->isGeneticallyModified = $isGeneticallyModified;
	}


	public function getPriceOrder()
	{
		print "You can buy $this->title for " . $this->getPrice() . " dollars (1 pack with weight $this->standardWeight kl).<br>\n";
	}

	public function getPrice()
	{
		if($this->isGeneticallyModified == 'Yes'){
			return round($this->price * self::IF_GEN_MOD);
		}else{
			return $this->price;
		}
	}

}

$assortmentDuck = ['Peking Duck' => ['tipe' => 'fillet', 'price' => 7, 'standardWeight' => 2, 'isGeneticallyModified' => 'No'],
				'Black Duck' => ['tipe' => 'fillet', 'price' => 5, 'standardWeight' => 2, 'isGeneticallyModified' => 'Yes'],
				'White Duck' => ['tipe' => 'carcass', 'price' => 9, 'standardWeight' => 2, 'isGeneticallyModified' => 'Yes']];


$allDuck = [];

foreach ($assortmentDuck as $key => $value) {
	$allDuck[] = new Duck($key, $value['tipe'], $value['price'], $value['standardWeight'], $value['isGeneticallyModified']);
}


foreach ($allDuck as $key => $value) {
	$value->getPriceOrder();
}

print '<hr>';


//Fifth. ////////////////////////////////////////////////////////////////////

interface FifthInterface
{
	public function getDescription();
}

class Product extends SuperProduct implements FifthInterface
{
	private $color;
	private $size;
	private $onStock;
	private $canBePosted;

	public function __construct($title, $tipe, $price, $color, $size, $onStock, $canBePosted)
	{
		parent::__construct($title, $tipe, $price);

		$this->color = $color;
		$this->size = $size;
		$this->onStock = $onStock;
		$this->canBePosted = $canBePosted;
	}

	public function getDescription()
	{
		return ['title' => $this->title, 'tipe' => $this->tipe, 'price' => $this->price, 'color' => $this->color,
		 'size' => $this->size, 'onStock' => $this->onStock, 'canBePosted' => $this->canBePosted];
	}
}

$assortmentProduct = ['iPhone' => ['tipe' => 'mobile phone', 'price' => 1000, 'color' => 'gold', 'size' => '5.5 inch', 'onStock' => 200, 'canBePosted' => 'Yes'],
				'Boeing' => ['tipe' => 'aircraft', 'price' => 300000000, 'color' => 'silver', 'size' => '210 feets', 'onStock' => 1, 'canBePosted' => 'No'],
				'Locomotive' => ['tipe' => 'train', 'price' => 2000000, 'color' => 'black', 'size' => '60 feets', 'onStock' => 3, 'canBePosted' => 'No']];

$allProduct = [];

foreach ($assortmentProduct as $key => $value) {
	$allProduct[] = new Product($key, $value['tipe'], $value['price'], $value['color'], $value['size'], $value['onStock'], $value['canBePosted']);
}

$stock =[];
foreach ($allProduct as $key => $value) {
	$stock[] = $value->getDescription();
}


print '<table>';
print '<tr><td>Product</td><td>title</td><td>tipe</td><td>price</td><td>color</td><td>size</td><td>onStock</td><td>canBePosted</td></tr>';
foreach ($stock as $value) {
	print "<tr><td>{$value['title']}</td>
	<td>{$value['tipe']}</td>
	<td>{$value['price']}</td>
	<td>{$value['color']}</td>
	<td>{$value['size']}</td>
	<td>{$value['onStock']}</td>
	<td>{$value['canBePosted']}</td></tr>";
}
print '</table>';
