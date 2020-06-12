<?php
require_once "../config/config.php";
echo "Reading my tracks<hr>";
//TODO move db config off public files!!!

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
