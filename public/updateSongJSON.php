<?php
if (!isset($_POST['updateSong'])) {
    header("Location: /tracks.php"); // we could redirect to error page as well
}
require_once "../config/config.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_POST['updateSong']; //might want to check with if user has filled this form
$trackName = $_POST['trackName'];
$artistName = $_POST['artistName'];
if (isset($_POST['isHeard'])) {
    $isHeard = 1;
} else {
    $isHeard = 0;
}
// var_dump($_POST);
// die("now");
$stmt = $conn->prepare("UPDATE `tracks`
            SET isHeard = (?), `name` = (?), `artist` = (?), updated = CURRENT_TIMESTAMP()
            WHERE `tracks`.`id` = (?)");
$stmt->bind_param("dssd", $isHeard, $trackName, $artistName, $id); //s means string, d means integer here
$stmt->execute();
$data = [
    "isHeard" => $isHeard,
    "artistName" => $artistName,
];
header('Content-type: application/json');
echo json_encode($data);
