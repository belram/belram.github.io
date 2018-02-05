<?php 
    require_once('Loader.php');

    $bmw_3 = new \Car\Car('BMW 3', 'sedan', 25000, 1, 'red', 2999, 17, 4);
    $renaultLogan = new \Car\Car('Renault_Logan', 'sedan', 8500, 2, 'white', 1300, 15, 4);
    $LG = new \TV\TV('LG', '3D', 400, 1, 40);
    $samsung = new \TV\TV('Samsung', 'IPS', 800, 1, 55);
    $peking_Duck = new \Duck\Duck('Peking_Duck', 'fillet', 7, 5, 2, 'Yes');
    $White_Duck = new \Duck\Duck('White_Duck', 'fillet', 9, 4, 4, 'No');
    $Parker = new \BallPen\BallPen('Parker', 'ink pen', .6, 65, 'black', 'one-off', 'No');
    $Senator = new \BallPen\BallPen('Senator', 'capillary', .5, 99, 'blue', 'reusable', 'Yes');

    class ShoppingCart
    {
	    public $order = [];

	    public function addToCart($product)
	    {
		    $temporary = $product->getDescription();
		    $this->order[$temporary['title']] = $temporary;
	    }

	    public function deliteFromCart($name)
	    {
		    unset($this->order["$name"]);
	    }

	    public function formCheck()
	    {
		    $total = 0;
		    foreach ($this->order as $value) {
			    $total += $value['price'] * $value['count'];
		    }
		    return $total;
	    }

	    public function getOrder()
	    {
		    return $this->order;
	    }
    }

    $myOrder = new ShoppingCart;
    $myOrder->addToCart($bmw_3);
    $myOrder->addToCart($renaultLogan);
    $myOrder->addToCart($LG);
    $myOrder->addToCart($samsung);
    $myOrder->addToCart($peking_Duck);
    $myOrder->addToCart($White_Duck);
    $myOrder->addToCart($Parker);
    $myOrder->addToCart($Senator);
    $myOrder->deliteFromCart('Samsung');

    class YourOrder
    {
	    public $order;
	    public $totalPrice;

	    public function __construct($order, $totalPrice)
	    {
		    $this->order = $order;
		    $this->totalPrice = $totalPrice;
	    }

	    public function showOrder()
	    {
		    print "Yor ordder: <br>";
		    foreach ($this->order as $key => $value) {
			    print "$key <ul>";
			    foreach ($value as $key1 => $value1) {
				    print "<li>{$key1}: {$value1}</li>";
			    }
			    print '</ul>';
		    }
		    print '<hr>';
		    print "Total price is " . $this->totalPrice;

	    }
    }

    $result = new YourOrder($myOrder->getOrder(), $myOrder->formCheck());
    $result->showOrder();
