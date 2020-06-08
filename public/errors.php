<?php
echo "Let's test some errors";
echo "<hr>";
// echo "No closing quotes
// echo "Need semicolon to close statement"
$a = 10;
$b = 20;
//$c = $a + $nosuchvar;
$name = "Valdis";
// $mix = $name + $a; //in php we concetane strings with . !!! not +
$job = "Coding";
$realmix = $name . " is " . $job;
echo $realmix;
