<?php
    namespace BallPen;

    interface ThirdInterface
    {
	    public function getDescription();
    }

    class BallPen extends \SuperProduct\SuperProduct implements ThirdInterface
    {
	    private $color;
	    private $num_of_use;
	    private $isInBox;

	    public function __construct($title, $tipe, $price, $count, $color, $num_of_use, $isInBox)
	    {
		    parent::__construct($title, $tipe, $price, $count);

		    $this->color = $color;
		    $this->num_of_use = $num_of_use;
		    $this->isInBox = $isInBox;
	    }

	    public function getDescription()
	    {
		    return ['title' => $this->title, 'tipe' => $this->tipe, 'price' => $this->price, 'count' => $this->count,
        'color' => $this->color, 'num_of_use' => $this->num_of_use, 'isInBox' => $this->isInBox];
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
