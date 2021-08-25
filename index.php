<?php
session_start();
require_once './core/database.php';
require_once './constant.php';
require_once './models/BaseModel.php';
require_once './controllers/BaseController.php';
$controllerName = ucfirst((strtolower ($_REQUEST['controller']) ?? 'Welcome') . 'Controller');
$actionName = $_REQUEST['action'] ?? 'index';

require "./controllers/${controllerName}.php";

$controllerObject = new $controllerName;
$controllerObject->$actionName();