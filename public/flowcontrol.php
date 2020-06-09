<?php
include "../src/templates/header.php";
$a = 15;
if ($a > 5) {
    echo "Wow $a is larger than 5";
} elseif ($a === 5) {
    echo "$a is exactly 5";
} else {
    echo "hmm $a is kind of small";
}

echo "<hr>";
$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!";
        break;
    case "blue":
        echo "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}

$i = 10;
while ($i > 0) {
    echo "<hr> \$i is $i"; // \$ to show $
    $i--;
}
include "../src/templates/footer.html";
