<form action="post.php" method="post">
<input type="email" name="myEmail" >
<input type="password" name="myPw" >
<input type="text" name="myName">
<button type="submit">Submit Me</button>
</form>
<?php
var_dump($_POST); //another superglobal
if (isset($_POST['myPw']) && isset($_POST['myName'])) {
    $myName = $_POST['myName'];
    $myPw = $_POST['myPw'];
    echo "Going to log in $myName with password $myPw in some place";
    //some sort of DB access could go here,session set up etc
} else {
    echo "No name or password set";
}