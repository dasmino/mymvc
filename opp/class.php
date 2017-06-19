<?php 

class Person{
	public $face;
	public function walk(){
		echo "iam di bo";
	}
}
class Student extends Person{
	public $name;
	public function __construct($name,$face){
		$this->name = $name;
		$this->face = $face;
	}
	public function name(){
		echo "toi ten la".$this->name."toi ten la".$this->face;
	}
	public function walk(){
		echo "<h1>chay</h1>";
	}
	public function __destruct(){
		echo "<h1>student is finish</h1>";
	}
}

$vu = new Student('LONG','mat tron');
$vu->name();
$vu->walk();
unset($vu);