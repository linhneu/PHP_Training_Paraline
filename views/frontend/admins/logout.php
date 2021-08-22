<?php
//unset($_SESSION['email']);
//session_start();
//session_destroy();
//exit();
//header('location: index.php?controller=admin');
if(isset($_SESSION['email']) && isset($_SESSION['password'])){
    unset($_SESSION['email']);
    unset($_SESSION['password']);
session_destroy();

}
