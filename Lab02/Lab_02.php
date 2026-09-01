<?php

// Task 1
class Library{
    const MAX_BOOKS = 3;
}
echo "Task 1 Output: <br>";
echo "Maximum books allowed: ". Library::MAX_BOOKS . "<br>";
// Explaintion: 
// the variable MAX_BOOKS is constant because its decalred by the const keyword
// the MAX_BOOK is a variable indicating the maximum number of books availlable in the library
// so it has to be constant and accessable without creating any object..



// Task 2
class StudentCounter{
    public static $count = 0;
    public  static function addStudent() {
        self::$count += 1;
    }

}
StudentCounter::addStudent();
StudentCounter::addStudent();
StudentCounter::addStudent();
echo "<hr>";
echo "Task 2 Output: <br>";
echo "Total Student: " .StudentCounter::$count . "<br>";



// Task 3
abstract class  Vehichle{
    public abstract function start();
}
class Car extends Vehichle{
    #[Override]
    public function start()
    {
        echo "Car Engine Started! <br>";
    }
}
class Bike extends Vehichle{
    #[Override]
    public function start()
    {
        echo "Bike Started! <br>";
    }
}
echo "<hr>";
echo "Task 3 Output: <br>";
$toyata = new Car();
$honda = new Bike();
$toyata->start();
$honda->start();

?>