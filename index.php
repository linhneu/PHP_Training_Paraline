<?php
//session_start();
//require_once('core/connection.php');
//require_once('core/base_controller.php');

//if(isset($_GET['controller'])) $controller = $_GET['controller'];
//else $controller = 'admin';
//if(isset($_GET['action'])) $action = $_GET['action'];
//else $action = 'index';
//if(!isset($_SESSION['admin'])) {
   // $controller = 'admin';
   // $action = 'login';
//}
?>
<?php
require_once 'core/connection.php';
require_once 'core/base_controller.php';
require_once 'core/app.php';
session_start();
