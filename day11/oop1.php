<?php

// notce for the oop 

class Book
{
    public $title;

    public function read()
    {
        $title = $this->title;
        echo "I read the  $title now ";
    }
}

$book = new Book();
$book->title = "Ante5Rostos";
$book->read();
// ************************************************************
echo "<br>";
echo "<br>";
class Employee
{
    public $name;
    protected $salary;
    private $bonus;

    public function print()
    {
        echo "The Employee name is : $this->name<br>";
        echo "The Employee Salary is : $this->salary<br>";
        echo "The Employee name is : $this->bonus<br>";
    }
    public function SetBonus($bonus)
    {
        $this->bonus = $bonus;
    }
    public function SetSalary($salary)
    {
        $this->salary = $salary;
    }
    public function getBonus()
    {
        return $this->bonus;
    }
}
$em = new Employee();
$em->SetBonus("20%");
$em->name = "lashin";
$em->setSalary("10000");
$em->print("Lashin", "1000");
// $em->SetBonus();
//*************************************************** 
echo "<br>";
echo "<br>";
class Course
{
    private $title;
    // private $instructor;
    public function __construct($title, private $instructor)
    {
        $this->title = $title;
        // $this->instructor = $instructor;
    }
    function describe()
    {
        echo "U course info is :<br>Course Title: $this->title <br>Course Instructor :$this->instructor<br>";
    }
}
$course = new Course("BackEnd", "Ahmed AbuBaker ");
$course->describe();
//************************************************** 
echo "<br>";
echo "<br>";

class Vehicl
{
    function __construct(private $model, private $make)
    {
    }
    public function info()
    {
        echo "the model is :$this->model<br><hr> and make an :$this->make<br><hr>";
    }
}

class Car extends Vehicl
{
    function __construct($model, $make, private $fullType)
    {
        parent::__construct($model, $make);
    }
    public function info()
    {
        parent::info();
        echo "and the FullType is = $this->fullType";
    }
}
$vec = new Vehicl("Nesan", "in Egypt ");
$vec->info();
echo "<hr><hr>";
$car = new Car("Tyota Sobra", "in USA", "90 oil");
$car->info();
echo "<br>";
echo "<br>";
//********************************************* 

class BankAcc
{
    function __construct(private $balance = 0)
    {
    }
    function deposit($amount)
    {

        if ($this->balance < 0) {

            echo "Please Enter Valid Values  <hr>";
        } else {
            $this->balance += $amount;
            echo "Operation Done Successfuly <hr>";
        }



        // echo "done<hr>";
    }
    function whith($amount)
    {
        if ($amount > $this->balance) {

            echo "There Is NOt enough Balance <hr>";
        } else {
            $this->balance -= $amount;
            echo "Operation Done Successfuly <hr>";
        }
    }
    function getBalance()
    {
        echo "Ur Balance is = $this->balance<hr>";
    }
}


$man = new BankAcc();
$man->deposit(100);
$man->getBalance();
$man->whith(50);
$man->getBalance();



abstract class Emps
{
    abstract function calcSalary();
}
class Emploo extends Emps
{
    function __construct(private $salareOnHour, private $hours)
    {
    }
    function calcSalary()
    {
        $blanc = $this->salareOnHour * $this->hours;
        echo "ur salary this moth is = $blanc $<br>";
    }
}
$emploo = new Emploo(200, 10);
$emploo->calcSalary();



class Animal
{
    public function __construct(private $name, private $sound)
    {
    }
    function makeSound()
    {
        echo "The animal $this->name sound is $this->sound";
    }
}

class Dog extends Animal
{
    function __construct($name, $sound)
    {
        parent::__construct($name, $sound);
    }
}
echo "<br><hr>";
$dog = new Dog("dog", "Woof");
$dog->makeSound();
echo "<br><hr>";

trait Time
{
    public function currentTime($event)
    {
        echo "$event The time is " . date("H:i:s") . " and the date is  " . date("Y-M-D");
    }
}

class Order
{
    use Time;
    public $name = "Labtop";
}
class Invoice
{
    use Time;
    public $name = "Record";
}
$order = new Order();
echo "<br><hr>";
$order->currentTime("Ur Order will Araive in ");
echo "<br><hr>";





?>