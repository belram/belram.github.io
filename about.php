<?php 

//First. Вероятная цена авто, определяемая маркетологами, при
//сопостовимой базовой величине (средняя цена 10 наиболее покупаемых) затрат на единицу, 
//и влияния на конечную цену следующих факторов: марка, двинатель, комплектация.
class Car
{
	public $model;/*Условные коэффициенты влияющего фактора*/
	public $engine;/*Условные коэффициенты влияющего фактора*/
	public $equipment;/*Условные коэффициенты влияющего фактора*/
	private $baseCost = 15000;/*Средняя цена 10 наиболее покупаемых*/

	public function __construct($model, $engine, $equipment)
	{
		$this->model = $model;
		$this->engine = $engine;
		$this->equipment = $equipment;
	}

	public function pricePrediction()
	{
		return (($this->model * $this->engine * $this->equipment) * $this->baseCost);
	}
}

$bmw_3 = new Car(1.2, 1.1, 1.3);
print 'BMW_3\'s price will be ' . $bmw_3->pricePrediction() . " dollars.<br>";
$bmw_3->pricePrediction();

$renaultLogan = new Car(.7, .8, .6);
print 'Renault Logan\'s price will be ' . $renaultLogan->pricePrediction() . " dollars.<br>";


//Second. Расчет цены с учетом скидки, для производителя 
class TV
{
	public $producer;
	public $discount;

	public function __construct($producer, $discount)
	{
		$this->producer = $producer;
		$this->discount = $discount;
	}

	public function priceWithDiscount($array)
	{
		foreach($array as $key => $value){
			if($this->producer === $key){
				return $value['price'] - ($value['price'] * $this->discount);
			}
		}
	}

}

//Есть массив товаров
$assortment = ['LG' => ['price' => 400],
				'SONY' => ['price' => 3600],
				'PASONIC' => ['price' => 5000]];
//Определяем цену со скидками
$luxuryTV = new TV('SONY', .1);
print $luxuryTV->producer . ' now for ' . $luxuryTV->priceWithDiscount($assortment);
print "<br>";
$ordinaryTV = new TV('LG', .2);
print  $ordinaryTV->producer . ' now for ' . $ordinaryTV->priceWithDiscount($assortment);


//Third. Подарки ученикам в зависимости от успеваемости
class BallPen
{
	public $nameOfPupil;
	public static $averageMark = 4.5;

	public function __construct($nameOfPupil)
	{
		$this->nameOfPupil = $nameOfPupil;
	}

	public function present($marks)
	{
		foreach($marks as $key => $value){
			if($this->nameOfPupil === $key){
				$pupilAverageMark = ($value['maths'] + $value['geography'] + $value['english']) / count($value);
					if($pupilAverageMark > self::$averageMark){
						print $this->nameOfPupil . ' will get expensive ball pen!';
					}else{
						print $this->nameOfPupil . ' will get cheap ball pen!';
					}
			}
		}
	}
}

//Результаты успеваемости
$resalt = ['Jake' => ['maths' => 5, 'geography' => 4, 'english' => 4],
				'Alan' => ['maths' => 5, 'geography' => 5, 'english' => 5]];

//Определяем ценность подарка в зависимости от успеваемости
$jake = new BallPen('Jake');
print "<br>";
$jake->present($resalt);
print "<br>";
$alan = new BallPen('Alan');
$alan->present($resalt);
print "<br>";


//Fourth. Общий чек на продажу уток в зависимости от количества
class Duck
{
	public $countOfWhite;
	public $countOfBlack;
	public static $priceForWhite = 2;
	public static $priceForBlack = 3;

	public function __construct($countOfWhite, $countOfBlack)
	{
		$this->countOfWhite = $countOfWhite;
		$this->countOfBlack = $countOfBlack;
	}

	public function payment()
	{
		$totalCheck = $this->countOfWhite * self::$priceForWhite + $this->countOfBlack * self::$priceForBlack;
		return $totalCheck;
	}

}

$markBuy = new Duck(3, 4);
print 'Mark will pay ' . $markBuy->payment();
print "<br>";
$walterkBuy = new Duck(9, 34);
print 'Walter will pay ' . $walterkBuy->payment();
print "<br>";


//Fifth. Вид оплаты в зависимости от цены
class Product
{
	public $nameOfBuyer;
	public static $limit = 10000;
	public function __construct($nameOfBuyer)
	{
		$this->nameOfBuyer = $nameOfBuyer;
	}
	public function wayToPay($order)
	{
		foreach($order as $title => $bill){
			if($bill > self::$limit){
				print 'For ' . $title . ' ' . $this->nameOfBuyer . ' have to pay by creditcard!' . "<br>";
			}else{
				print 'For ' . $title . ' ' . $this->nameOfBuyer . ' can pay by cash or creditcard!' . "<br>";
			}
		}
	}
}

//Abraham покупает машину и телевизор
$abrahamBill = ['car' => 20000, 'TV' => 800];

$abrahamWillPay = new Product('Abraham');
$abrahamWillPay->wayToPay($abrahamBill);

//Paulпокупает машину и телевизор

$paulBill = ['house' => 90000, 'iPhone' => 800];

$paulWillPay = new Product('Paul');
$paulWillPay->wayToPay($paulBill);

?>
