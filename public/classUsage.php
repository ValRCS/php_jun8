<?php
require_once "classExamples.php";

//we create new objects which are class instances
$defaultHouse = new House();
$myHouse = new House("green");
$friendHouse = new House("blue", "orange goat");

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
