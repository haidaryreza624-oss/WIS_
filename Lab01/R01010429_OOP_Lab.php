<?php



// Part A - Simple Class and Object
class SimpleStudent
{
    function sayHello()
    {
        echo "Hello! I am a student.<br>";
    }
}
$studentA = new SimpleStudent();
$studentA->sayHello();
echo "<hr>";




// Part B - Student Class with Constructor
class Student
{
    public $name;
    public $studentId;
    public $department;

    function __construct($name, $studentId, $department)
    {
        $this->name = $name;
        $this->studentId = $studentId;
        $this->department = $department;
    }

    function showInfo()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Student ID: " . $this->studentId . "<br>";
        echo "Department: " . $this->department . "<br>";
    }
}
$student1 = new Student(
    "Ahmad",
    1001,
    "Computer Science"
);
$student1->showInfo();
echo "<br>";


// Part C - Second Object
$student2 = new Student(
    "Sara",
    1002,
    "Information Systems"
);
$student2->showInfo();
echo "<hr>";




// Part D - Access Modifiers
class BankAccount
{
    public $ownerName;
    private $balance;

    function __construct($ownerName, $balance)
    {
        $this->ownerName = $ownerName;
        $this->balance = $balance;
    }

    function showBalance()
    {
        echo "Balance: " . $this->balance . "<br>";
    }
}
$account1 = new BankAccount(
    "Ahmad",
    5000
);
echo "Owner: " . $account1->ownerName . "<br>";
$account1->showBalance();
echo "<hr>";




// Part E & F - Inheritance
class Person
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function introduce()
    {
        echo "My name is " . $this->name . "<br>";
    }
}
class OOPStudent extends Person
{
    function study()
    {
        echo $this->name . " is studying.<br>";
    }
}
$student3 = new OOPStudent("Ahmad");
$student3->introduce();
$student3->study();
echo "<hr>";




// Part G - Vehicle and Car
class Vehicle
{
    protected $brand;

    function __construct($brand)
    {
        $this->brand = $brand;
    }

    function start()
    {
        echo "The vehicle is starting.<br>";
    }
}
class Car extends Vehicle
{
    function showBrand()
    {
        echo "Car brand: " . $this->brand . "<br>";
    }
}
$car1 = new Car("Toyota");
$car1->start();
$car1->showBrand();

?>