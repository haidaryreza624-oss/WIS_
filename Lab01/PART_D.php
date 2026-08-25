<?php
// PART D – Access Modifiers
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
/* --------------------
   Q: Does echo $account1->balance; work?
   A: No.

   Q: Why?
   A: Because $balance is declared as 'private'. 
      Private properties can only be accessed from inside the 
      BankAccount class itself.
      They cannot be accessed from outside the class.
--------------------- */

?>