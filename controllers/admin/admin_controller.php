<?php
require_once('core/base_controller.php');
class AdminController extends BaseController {
    function __construct(){
        $this->folder="admin";
        
    }
    function index() {
        require_once 'views/admin/index.php';
    }

    function error()
    {
    $this->render('error');
    }

    function login(){
        require_once('models/admin_model.php');
        if (!empty($_POST)) {
        $email = escape($_POST['email']);
        $password = md5($_POST['password']);
        user_login($email, $password);
    }

    }

}