<?php
//this is not full HTML we are just demonstrating PHP syntax
echo "Syntax! <hr>";
echo ("Could use parenthesis, but why bother for echo?<hr>");
$txt = "Hello world!";
$x = 5;
$y = 10.5;
$result = $x + $y;
echo "Your greeting is $txt, and $x+$y =  $result . Not bad<hr>";
echo 'Single quotes give you just text. Your greeting is $txt, and $x+$y =  $result . Not bad';
echo "<hr>";
//var_dump is for debuggin delete var_dump from production
var_dump($txt);
echo "<hr>";
//alternative to var_dump without type info
print_r($txt);
