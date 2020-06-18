<?php
session_start();
require_once "../src/classes/View.php";
require_once "../src/classes/Model.php";
require_once "../src/classes/Controller.php";

$view = new View();
$model = new Model($view);
$controller = new Controller($model);
$controller->route();
