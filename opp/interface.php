<?php 
 interface Person{
 	public function say();
 	public function walk();
 }
 interface Human{
 	public function run();
 }
 class Student implements Person,Human{
 	protected $name = "VUUUU";
 	private $age = 20;
 	public function say(){
 		echo "student say";
 	}
 	public function walk(){
 		echo "";
 	}
    public function run(){
    	echo "studen Run";
    }
    public function getName(){
    	echo $this->name;
    }
 }
 $student = new Student;
 $student->say();
 $student->run();
 $student->getName();
 // echo $student->name;
 /*
  interface, implement : truu tuong
 */