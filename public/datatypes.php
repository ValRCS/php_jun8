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

echo 'no need to escape here $ works<hr>';
echo "need to escape \$ here $i gets variable<hr>";
//multi line string which lets you insert variables inside
echo <<<MYSTRINGLIM
    <footer>My name is "{$arr[6]}". I am printing some $i.
        Now, I am printing some.
        This should print a capital 'A': \x41
    </footer>
MYSTRINGLIM;
