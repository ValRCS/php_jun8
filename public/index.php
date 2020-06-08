<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hello</title>
</head>
<body>
    <h1>Simple HTML</h1>
<?php
echo "<div class='myclass'>Anything goes here</div>"
?>
<h2>Heading2 </h2>
<?php

for ($i = 0; $i < 5; $i++) {
    echo "<p>Paragraph no. $i</p>";
}
?>
<footer>Not done by PHP</footer>
</body>
</html>
