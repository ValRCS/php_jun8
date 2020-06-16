<?php
session_start();
require_once "../config/config.php";
require_once "../src/templates/header.php";

if (!isset($_SESSION['user']) || !isset($_SESSION['id'])) {
    if (isset($_GET['tryagain'])) {
        include "../src/templates/tryAgain.html";
    }
    include "../src/templates/loginForm.html";
    include "../src/templates/registerForm.html";
    include "../src/templates/footer.html";

    exit(); //early exit
}

//this is optional to show usersupon first time login
if (isset($_GET['loginSuccess'])) {
    //could include more html in success template
    echo "<div class='successLogin'>SuccessFul Login</div>";
}

echo "Hello " . $_SESSION['user'] . " your id is " . $_SESSION['id'] . "<hr>";

include "../src/templates/logoutForm.html";
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
    $stmt = $conn->prepare("SELECT *
        FROM tracks
        WHERE artist
        LIKE (?)
        AND userid = (?)");
    $stmt->bind_param("sd", $aName, $_SESSION['id']); //s means string here
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $stmt = $conn->prepare("SELECT *
        FROM tracks
        WHERE userid = (?)");
    $stmt->bind_param("d", $_SESSION['id']); //s means string here
    $stmt->execute();
    $result = $stmt->get_result();
}

if ($result->num_rows > 0) {
    //echo "Cool we got " . $result->num_rows . " rows of data!<hr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        // var_dump($row);
        // echo "id: " . $row["id"] . " name - " . $row["name"] . " artist: " . $row["artist"] . " Created on:" . $row["created"]
        $myclasses = "single-song";
        $checked = "";
        if ($row['isHeard']) {
            $myclasses .= " heard-song";
            $checked = "checked";
        }
        $id = $row["id"];
        $name = $row['name'];
        $artist = $row['artist'];

        $html = "<div class='$myclasses'>";
        $html .= "<form action='updateSong.php' method='post'>";
        $html .= "id: " . $row["id"]; //set $html text here
        $html .= "<input type='checkbox' name='isHeard' $checked>";
        $html .= "<input name='trackName' value='$name'>";
        $html .= "<input name='artistName' value='$artist'>"; //we add this line to previous $html
        $html .= " Created on:" . $row["created"];
        $html .= " Updated on:" . $row["updated"];
        $html .= "<button type='submit' name='updateSong' value='$id'>UPDATE SONG</button>";
        $html .= "</form>";
        $html .= "<form action='deleteSong.php' method='post'>";
        $html .= "<button type='submit' name='deleteSong' value='$id'>";
        $html .= "DELETE SONG</button>";
        $html .= "</form>";
        $html .= "</div>";
        echo $html;
        //   echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

require_once "../src/templates/footer.html";
