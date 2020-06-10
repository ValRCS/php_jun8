<?php
session_start();
// https://www.php.net/manual/en/function.session-unset.php
unset($_SESSION['myName']);
unset($_SESSION['indexVisits']);
header("Location: login.php"); //load this page
