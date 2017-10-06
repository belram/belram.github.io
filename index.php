<?php
class Product
{
	public $price;
	public $title;

	public function __construct($price, $title)
	{
		$this->price = $price;
		$this->title = $title;
	}

	public function setPrice($price)
	{
		$this->price = $price;
		return $this;//Позволяет сократить код без использования конструктора
	}
	public function getPrice()
	{
		return $this->price;
	}
	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}
	public function getTitle()
	{
		return $this->title;
	}
	// public function printTitle()
	// {
	// 	print $this->title;
	// }

}

// $car = new Product(10, 'Adam');
// $car->printTitle();
// $car->setTitle('Bert');
// $car->printTitle();

class Car extends Product
{
	public $engine;/*Условные коэффициенты влияющего фактора*/
	public $equipment;/*Условные коэффициенты влияющего фактора*/
}

class TV extends Product
{
	public $screenSize;


}

class BallPen extends Product
{
	public $color;

}

class Duck extends Product
{
	public $weight;
	public $ageOfDuck;
	

}
