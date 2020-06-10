<?php
session_start();
// https://www.php.net/manual/en/function.session-unset.php
unset($_SESSION['myName']);
header("Location: login.php"); //load this page
