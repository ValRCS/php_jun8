<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['login'])) {
        require_once "../config/config.php";
        $conn = new mysqli($servername, $username, $password, $dbname);
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE username = (?)");

        $stmt->bind_param("s", $_POST["myName"]);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows != 1) {
            //remember do not show user the reason for failing to login
            //user does not exist
            header("Location: /tracks.php?tryagain=true");
            exit();
        }

        //else we have num_rows == 1
        //cool we found our user
        $row = $result->fetch_assoc();
        if (password_verify($_POST['pw'], $row['hash'])) {
            $_SESSION['user'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header("Location: /tracks.php?loginSuccess=true"); //always go back to main page
        } else {
            //remember do not show user the reason for failing to login
            //user exists bad password does not verify
            header("Location: /tracks.php?tryagain=true");
            exit();
        }
    }
}
