<?php 

class A{
	private static $intance;
	private function __construct(){}

	public static function getIntance(){
		if( !isset(self::$intance))
			self::$intance = new A;
		return self::$intance;
	}
}

$a = A::getIntance();
var_dump($a);echo '<br/>';
$b = A::getIntance();
var_dump($b);echo '<br/>';
$c = A::getIntance();
var_dump($c);echo '<br/>';
