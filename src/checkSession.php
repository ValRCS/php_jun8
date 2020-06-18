<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['id'])) {
    header("Location: /tracks.php");
    exit();
}
