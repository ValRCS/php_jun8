<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['register'])) {
        require_once "../config/config.php";
        $conn = new mysqli($servername, $username, $password, $dbname);
        var_dump($_POST);
        //INSERT INTO `users` (`id`, `username`, `email`, `hash`, `created`)
        // VALUES (NULL, 'Līga', 'ls@gmail.com', 'afdfadfafdaadsfad', current_timestamp())
        //we could check for password length etc and redirect to registration again
        $hash = password_hash($_POST['pw'], PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO `users`
            (`username`, `email`, `hash`)
            VALUES ( (?), (?), (?) ) ");
        $stmt->bind_param("sss", $_POST["myName"], $_POST["myEmail"], $hash);
        $stmt->execute();
        //TODO check for success and login automatically
        header("Location: /tracks.php");
    }
}
