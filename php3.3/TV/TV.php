<?php
    namespace TV;

    interface SecondInterface
    {
        public function getDescription();
    }

    class TV extends \SuperProduct\SuperProduct implements SecondInterface
    {
        private $sizeOfScreen;
        private $discount;

        public function __construct($title, $tipe, $price, $count, $sizeOfScreen)
        {
        parent::__construct($title, $tipe, $price, $count);

        $this->sizeOfScreen = $sizeOfScreen;
        }

        public function getDescription()
        {
            return ['title' => $this->title, 'tipe' => $this->tipe, 'price' =>  $this->price, 'count' =>  $this->count,
                    'sizeOfScreen' =>  $this->sizeOfScreen
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
