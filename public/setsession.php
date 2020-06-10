<?php
session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION['myName'] = "Valdis";
var_dump($_SESSION);
