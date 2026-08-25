<?php
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
// PART C – Second Object & Questions
$student2 = new Student("Sara", 1002, "Information Systems");
$student2->showInfo();
echo "<hr>";
/* --------------------
   Q: How many classes did you create?
   A: I created one class in total the Student Class. 
      
   Q: How many objects did you create?
   A: I created 2 objects:  $student1 (Part B), 
      and $student2 (Part C). 
------------------- */
?>