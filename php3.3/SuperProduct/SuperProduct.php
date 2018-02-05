<?php
    namespace SuperProduct;

    abstract class SuperProduct
    {
        protected $title;
        protected $tipe;
        protected $price;
        protected $count;

        public function __construct($title, $tipe, $price, $count)
        {
            $this->title = $title;
            $this->tipe = $tipe;
            $this->price = $price;
            $this->count = $count;
        }

        abstract public function getPrice();

        abstract public function getCount();
}
