<?php

abstract class BoxType {
	const small = 'small';
	const big = 'big';
	const large = 'large';
}

class Product {
	public $boxType;
	public $amount;
	public $packagePrice;

	public function __construct($boxType, Int $amount)
	{
		$this->boxType = $boxType;
		$this->amount = $amount;
		$this->packagePrice = 0;
	}

}

class SmallProduct extends Product {
	public function __construct($amount)
	{
		parent::__construct(BoxType::small, $amount);
		$this->amount = $amount;
	}
}

class BigProduct extends Product {
	public function __construct($amount)
	{
		parent::__construct(BoxType::big, $amount);
		$this->amount = $amount;
	}
}

class LargeProduct extends Product {
	public function __construct($amount)
	{
		parent::__construct(BoxType::large, $amount);
		$this->amount = $amount;
	}
}


$orders = [1,3,5,9,12];

$product1 = new SmallProduct(1);
$product2 = new SmallProduct(3);
$product3 = new SmallProduct(5);
$product4 = new BigProduct(9);
$product5 = new LargeProduct(12);

$products = [$product1, $product2, $product3, $product4, $product5];

foreach($products as $product) {
	echo $product->amount * 10 + $product->packagePrice . PHP_EOL;
}

?>