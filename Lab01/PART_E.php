<?php
// PART E & F – Inheritance
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
?>