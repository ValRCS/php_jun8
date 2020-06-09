<?php
$a = 7;
$b = 3.14159;
$myName = "Valdis";
$isSunny = false; //true also works
$something = null;
$myPet = "kaķis";
$myStudent = "Šarlote";
$quote = "alus ari ira sula";

var_dump($a, $b, $myName, $isSunny, $something, $myPet, $myStudent);
echo "<hr>";
echo mb_strlen($myStudent) . strlen($myStudent);
echo "<hr>";
echo $myName . " is " . strlen($myName) . " characters long";
echo "<hr>";
echo "$a + $b = " . ($a + $b);
echo "<hr>";
echo "letter a is found " . mb_substr_count($quote, "a") . " times<hr>";
echo "letter a is found " . substr_count($quote, "a") . " times<hr>";

echo mb_substr_count("ķēpā kaķis", "ķ");
echo "<hr>";
echo substr_count("ķēpā kaķis", "ķ");
echo "<hr>";

$myStr = "ķēpā kaķis";
echo substr($myStr, 2, 5);
echo "<hr>";
$newText = str_replace("aķ", "uŪu", $myStr);
echo $newText;
//TODO find string reverse and reverse $newText on screen
