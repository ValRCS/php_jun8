<?php
if (!isset($_POST['updateSong'])) {
    header("Location: /tracks.php"); // we could redirect to error page as well
}
require_once "../config/config.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_POST['updateSong']; //might want to check with if user has filled this form
$trackName = $_POST['trackName'];
$artistName = $_POST['artistName'];
// var_dump($_POST);
// die("now");
$stmt = $conn->prepare("UPDATE `tracks`
            SET `name` = (?), `artist` = (?), updated = CURRENT_TIMESTAMP()
            WHERE `tracks`.`id` = (?)");
$stmt->bind_param("ssd", $trackName, $artistName, $id); //s means string, d means integer here
$stmt->execute();
header("Location: /tracks.php");
