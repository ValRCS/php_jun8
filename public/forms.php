<form action="forms.php" method="get">
<input type="email" name="myEmail" id="">
<input type="text" name="myName">
<button type="submit">Submit Me</button>
</form>
<?php
if (isset($_GET['myName'])) {
    echo "<hr>Hello there " . $_GET['myName'] . "nice to meet you<br>";
}
