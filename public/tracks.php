<?php
require_once "../config/config.php";
echo "Reading my tracks<hr>";

include "../src/templates/songFilterForm.html";
include "../src/templates/addNewSongForm.html";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//FIXME !! NOT SAFE need prepared statements!! reme
if (isset($_GET['artistName'])) {
    $aName = "%" . $_GET['artistName'] . "%"; // we add %s to get fuzzy matches
    $stmt = $conn->prepare("SELECT * FROM tracks WHERE artist LIKE (?)");
    $stmt->bind_param("s", $aName); //s means string here
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM tracks";
    $result = $conn->query($sql);
}

if ($result->num_rows > 0) {
    echo "Cool we got " . $result->num_rows . " rows of data!<hr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // var_dump($row);
        // echo "id: " . $row["id"] . " name - " . $row["name"] . " artist: " . $row["artist"] . " Created on:" . $row["created"]
        $html = "id: " . $row["id"]; //set $html text here
        $html .= " name - " . $row["name"]; //we add this line to previous $html
        $html .= " artist: " . $row["artist"];
        $html .= " Created on:" . $row["created"];
        $html .= "<hr>";
        echo $html;
        //   echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

$sql = "SELECT * FROM tracks WHERE artist LIKE 'ABBA'";
$result = $conn->query($sql);

// we can get all results at once and then loop through them
// $allrows = $result->fetch_all(MYSQLI_BOTH);
$allrows = $result->fetch_all(MYSQLI_ASSOC);
var_dump($allrows);
foreach ($allrows as $rowindex => $row) {
    echo "<div class='myrow' id='row-$rowindex'>";
    // var_dump($row);
    $html = "id: " . $row["id"]; //set $html text here
    $html .= " name - " . $row["name"]; //we add this line to previous $html
    $html .= " artist: " . $row["artist"];
    $html .= " Created on:" . $row["created"];
    // $html .= "<hr>";
    echo $html;
    echo "</div>";
}
