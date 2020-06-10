<form action="post.php" method="post">
<input type="email" name="myEmail" placeholder="valdis.s.coding@gmail.com" >
<input type="password" name="myPw" placeholder="hunter2" required>
<input type="text" name="myName" placeholder="Valdis" value="Voldemars">
<button type="submit">Submit Me</button>
</form>
<?php
var_dump($_POST); //another superglobal
if (isset($_POST['myPw']) && $_POST['myPw'] != "" && isset($_POST['myName'])) {
    $myName = $_POST['myName'];
    $myPw = $_POST['myPw'];
    echo "Going to log in $myName with password $myPw in some place";
    //some sort of DB access could go here,session set up etc
} else {
    echo "No name or password set";
}