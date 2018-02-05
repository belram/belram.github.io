<?php
    namespace Car;

    interface FirstInterface
    {
	    public function getDescription();
    }

    class Car extends \SuperProduct\SuperProduct implements FirstInterface
    {
        private $color;
        private $engine;
        private $sizeOfWheel;
        private $quantityOfDoors;

        public function __construct($title, $tipe, $price, $count, $color, $engine, $sizeOfWheel, $quantityOfDoors)
        {
            parent::__construct($title, $tipe, $price, $count);
            
            $this->color = $color;
            $this->engine = $engine;
            $this->sizeOfWheel = $sizeOfWheel;
            $this->quantityOfDoors = $quantityOfDoors;
        }

        public function getDescription()
        {
            return ['title' => $this->title, 'tipe' => $this->tipe, 'price' => $this->price, 'count' => $this->count, 
		            'color' =>  $this->color, 'engine' => $this->engine, 'sizeOfWheel' => $this->sizeOfWheel,
		             'quantityOfDoors' => $this->quantityOfDoors
                 ];
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function getCount()
        {
            return $this->count;
        }
    }
