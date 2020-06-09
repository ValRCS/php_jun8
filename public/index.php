<?php
require_once "../src/templates/header.php";
require_once "../src/utilities.php"; //remember no side effects for this file!
echo "<h1>My PHP page</h1>";
$arr = ["Valdis", "Pēteris", "Līga"];
makeUnorderedList($arr);

echo "<div class='results'>" . myAdder(5, 200) . "</div>";
echo "<div class='mycontainer'>";
printFizzBuzz(30);
echo "</div>";
require_once "../src/templates/footer.html";
