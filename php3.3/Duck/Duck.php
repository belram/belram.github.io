<?php
    namespace Duck;

    interface FourthInterface
    {
        public function getDescription();
    }

    class Duck extends \SuperProduct\SuperProduct implements FourthInterface
    {
        private $standardWeight;
        private $isGeneticallyModified;

        public function __construct($title, $tipe, $price, $count, $standardWeight, $isGeneticallyModified)
        {
            parent::__construct($title, $tipe, $price, $count);

            $this->standardWeight = $standardWeight;
            $this->isGeneticallyModified = $isGeneticallyModified;
        }

        public function getDescription()
        {
            return ['title' => $this->title, 'tipe' => $this->tipe, 'price' => $this->price, 'count' => $this->count,
                   'standardWeight' => $this->standardWeight, 'isGeneticallyModified' => $this->isGeneticallyModified
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
