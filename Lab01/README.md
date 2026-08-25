# Lab Assignment: Introduction to Object-Oriented PHP




---

## Part A – Simple Class and Object

### Code

```php
<?php

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
```

### Output

```text
Hello! I am a student.
```

---

## Part B – Student Class with Constructor

### Code

```php
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

$student1 = new Student("Ahmad", 1001, "Computer Science");
$student1->showInfo();
echo "<br>";
```

### Output

```text
Name: Ahmad
Student ID: 1001
Department: Computer Science
```

---

## Part C – Second Object & Questions

### Code

```php
$student2 = new Student("Sara", 1002, "Information Systems");
$student2->showInfo();
echo "<hr>";
```

### Output

```text
Name: Sara
Student ID: 1002
Department: Information Systems
```

### Questions and Answers

**Q: How many classes did you create?**

**A:** I created ONE classes in total:  `Student`.


---

**Q: How many objects did you create?**

**A:** I created 3 objects:

- `$student1` – Part B
- `$student2` – Part C


---

## Part D – Access Modifiers

### Code

```php
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

$account1 = new BankAccount("Ahmad", 5000);

echo "Owner: " . $account1->ownerName . "<br>";
$account1->showBalance();
echo "<hr>";
```

### Output

```text
Owner: Ahmad
Balance: 5000
```

### Try This – Questions and Answers

**Q: Does `echo $account1->balance;` work?**

**A:** No.

---

**Q: Why?**

**A:** Because `$balance` is declared as `private`.

Private properties can only be accessed from inside the `BankAccount` class itself, such as inside the `showBalance()` method.

They cannot be accessed directly from outside the class.

---

## Part E & F – Inheritance

### Code

```php
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
```

### Output

```text
My name is Ahmad
Ahmad is studying.
```

### Questions and Answers

**Q1: Which class is the parent class?**

**A1:** `Person`

---

**Q2: Which class is the child class?**

**A2:** `OOPStudent`


---

**Q3: Which keyword creates the inheritance relationship?**

**A3:** `extends`

---

**Q4: The `introduce()` method was written inside which class?**

**A4:** `Person`, the parent class.

---

**Q5: Can the `$student3` object call `introduce()`?**

**A5:** Yes.

---

**Q6: Why can `$student3` use `introduce()` even though it is not written inside the `OOPStudent` class?**

**A6:** Because `OOPStudent` inherits from `Person`.

Inheritance gives the child class access to the parent's public and protected methods.

---

## Part G – Vehicle and Car

### Code

```php
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
```

### Output

```text
The vehicle is starting.
Car brand: Toyota
```

---

