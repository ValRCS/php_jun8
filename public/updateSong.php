<?php
require "../src/checkSession.php";

if (!isset($_POST['updateSong'])) {
    header("Location: /tracks.php"); // we could redirect to error page as well
}
require_once "../config/config.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_POST['updateSong']; //might want to check with if user has filled this form
$trackName = $_POST['trackName'];
$artistName = $_POST['artistName'];
$concert = $_POST['concert'];
if (isset($_POST['isHeard'])) {
    $isHeard = 1;
} else {
    $isHeard = 0;
}
// we might need to convert concert date to mysql date format
//https://dev.mysql.com/doc/refman/8.0/en/date-and-time-functions.html#function_str-to-date
$stmt = $conn->prepare("UPDATE `tracks`
            SET isHeard = (?),
                `name` = (?),
                `artist` = (?),
                updated = CURRENT_TIMESTAMP(),
                concert = STR_TO_DATE((?), '%Y-%m-%d')
            WHERE `tracks`.`id` = (?)
            AND tracks.userid = (?)");
$stmt->bind_param("dsssdd", $isHeard, $trackName, $artistName, $concert, $id, $_SESSION['id']); //s means string, d means integer here
$stmt->execute();
header("Location: /tracks.php");
