<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../config/config.php";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE username = (?)");

    $stmt->bind_param("s", $_POST["myName"]);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        //cool we found our user
        $row = $result->fetch_assoc();
        // var_dump($row);
        // die("For now");
        //TODO verify login hash FIXME
        $_SESSION['user'] = $row['username'];
        $_SESSION['id'] = $row['id'];

    }
}
header("Location: /tracks.php"); //always go back to main page
