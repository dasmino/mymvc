<?php 
class Person{
	public $face = 'mat tron';
	 public function walk(){
		echo "<h1>di bo suong khong???</h1>";
	}
}
abstract class Student extends Person{
	public $name='long';
	protected $age = 20;
	abstract public function say();
}
class StudentA extends Student{
	public function say(){
		echo '11111';
        echo $this->age;
	}
}
$long = new StudentA();
echo $long->face;
$long->say();
$long->walk();

