<?php
require_once "classExamples.php";

//static methods can be used before any object are made
echo "My roof size is " . House::mult(10, 15) . " not bad<hr>";
echo "My foundation for all houses is " . House::$foundation . "<hr>";
//we create new objects which are class instances
$defaultHouse = new House();
$myHouse = new House("green");
$friendHouse = new House("blue", "orange goat");
$expensiveHouse = new FancyHouse("yellow");
$alsoExpensiveHouse = new FancyHouse("purple", "dog", 42);

echo "<hr>";
echo "My house color is" . $myHouse->primaryColor;
echo "<hr>";
echo "My friend's house color is" . $friendHouse->primaryColor;
$myHouse->primaryColor = "orange";
echo "<hr>";
echo "My house color is" . $myHouse->primaryColor;
echo "<hr>";
echo "My friend's house color is" . $friendHouse->primaryColor;

//$myHouse->mySecret is not available from outside
$myHouse->showSecret();
$friendHouse->showSecret();
$friendHouse->setSecret("pink elephant");
$friendHouse->showSecret();
echo "<hr>";
echo $myHouse->add(563, 24324);
echo $myHouse->prettyPrint("My greeting");
