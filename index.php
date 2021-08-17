<?php
require './core/database.php';
require './models/BaseModel.php';
require './controllers/BaseController.php';
$controllerName = ucfirst((strtolower ($_REQUEST['controller']) ?? 'Welcome') . 'Controller');
$actionName = $_REQUEST['action'] ?? 'index';

require "./controllers/${controllerName}.php";

$controllerObject = new $controllerName;
$controllerObject->$actionName();