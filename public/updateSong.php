<?php
if (!isset($_POST['updateSong'])) {
    // die("You are not adding a song are you?");
    header("Location: /tracks.php"); // we could redirect to error page as well
}
require_once "../config/config.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_POST['updateSong']; //might want to check with if user has filled this form
$trackName = $_POST['trackName'];
$artistName = $_POST['artistName'];
// var_dump($_POST);
// die("now");
//UPDATE `tracks` SET `name` = 'Enter Sandman',
// `artist` = 'Metallica and friends' WHERE `tracks`.`id` = 12
$stmt = $conn->prepare("UPDATE `tracks` SET `name` = (?), `artist` = (?)  WHERE `tracks`.`id` = (?)");
$stmt->bind_param("ssd", $trackName, $artistName, $id); //s means string, d means integer here
$stmt->execute();
// echo "Ok should have added song now";
header("Location: /tracks.php");
