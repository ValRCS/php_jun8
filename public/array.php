<?php
$arr = [1, 3, 4, 7, 8, 9, "Valdis"];
var_dump($arr);
echo "<hr>";
// echo $arr;
//0 start index just like most languages
echo $arr[4];
echo "<hr>";
echo "Last element is " . $arr[count($arr) - 1];

echo "<ul>";
for ($i = 0; $i < count($arr); $i++) {
    echo "<li>Item with index $i costing \$23 is: " . $arr[$i] . "</li>";
}
echo "</ul>";

$arr[50] = "my zip code"; //this will break above loop but below will work
$arr['myfavoriteFood'] = 'potatoes';
$arr['myPet'] = 'kaķis';
$arr[-33] = "my negative number";

echo "<ol>";
//if we do not need index we can loop through like this
foreach ($arr as $item) {
    echo "<li>My Item: $item</li>";
}
echo "</ol>";

echo "<ul>";
var_dump($arr);
echo "<hr>" . $arr['myPet'] . "<hr>";
//we can loop through array by its keys
foreach ($arr as $key => $value) {
    echo "<li>Item with index $key is $value</li>";
}
echo "</ul>";

$array = [
    1 => 555,
    "1" => 200, //this is bad part of PHP we only get key with "1" overwrites the 1 => 555 value
    "foo" => "bar",
    "bar" => "foo",
    "name" => "Valdis",
    7 => 700,
];
var_dump($array);

foreach ($array as $key => $value) {
    echo "<br> my key $key corresponds to $value";
}
