
<?php
session_start();
if (isset($_SESSION['myName'])) {
    echo "Cool you are logged in " . $_SESSION['myName'];
    include "../src/templates/logout.html";
} else {
    include "../src/templates/loginform.html";
}
echo "<hr>";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "Cool got POST method will save my login";
    if (isset($_POST['myName'])) {
        $_SESSION['myName'] = $_POST['myName'];
        echo "Session saved";
    } else {
        echo "No myName set";
    }

} else {
    echo "Not POST probably just a request " . $_SERVER['REQUEST_METHOD'];
}