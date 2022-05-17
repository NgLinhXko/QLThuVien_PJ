<?php
require "./Core/Database.php"; 
require "./Models/BaseModel.php";
require "./Controllers//BaseController.php";
$controller = $_GET['controller'] ?? 'customer';
// echo $controller;
$controllerName = ucfirst((strtolower($controller) .'Controller')) ;
$actionName = strtolower($_REQUEST['action'] ?? 'index' );
require "./Controllers/${controllerName}.php";

$controllerObject = new $controllerName ;
 
$controllerObject -> $actionName();