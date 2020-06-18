<?php
require "../src/checkSession.php";

// "DELETE FROM `tracks` WHERE `tracks`.`id` = 4"?
if (!isset($_POST['deleteSong'])) {
    // die("You are not adding a song are you?");
    header("Location: /tracks.php"); // we could redirect to error page as well
}
require_once "../config/config.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_POST['deleteSong']; //might want to check with if user has filled this form
// "DELETE FROM `tracks` WHERE `tracks`.`id` = 4"?
$stmt = $conn->prepare("DELETE FROM `tracks`
    WHERE `tracks`.`id` = (?)
    AND tracks.userid = (?)");
$stmt->bind_param("dd", $id, $_SESSION['id']); //$_SESSION['id'] refers to userid
$stmt->execute();
// echo "Ok should have added song now";
header("Location: /tracks.php");
