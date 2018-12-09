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

class ProductFactory {
	static function generateProduct($amount)
	{
		switch($amount){
			case $amount > 0 && $amount <= 5:
				return new SmallProduct($amount);

			case $amount > 6 && $amount <= 10:
				return new BigProduct($amount);

			case $amount > 11 && $amount <= 15:
				return new LargeProduct($amount);

			default:
				return null;
			
		}
	}
}

$orders = [1,3,5,9,12];
$products = [];
foreach($orders as $order){
	$product = ProductFactory::generateProduct($order);
	array_push($products, $product);

}

foreach($products as $product) {
	echo $product->amount * 10 + $product->packagePrice . PHP_EOL;
}

?>