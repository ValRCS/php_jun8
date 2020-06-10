<?php
//the file can be outside public path
$path = 'count.txt';
$file = fopen($path, 'r');
$count = fgets($file, 1000);
fclose($file);
$count = abs(intval($count)) + 1;
echo "Hello visitor $count";
$file = fopen($path, 'w');
fwrite($file, $count); //this will fail when more than 1 user attempts to write
fclose($file);
