<?php
class AdminController extends BaseController{
    private $adminModel;
    public function __construct() {
        $this->loadModel('AdminModel');
        $this->adminModel = new AdminModel;
    }
    public function index() {
        echo __METHOD__;
        $this->view('frontend.admins.index');
    }
    public function login(){      
        $this->view('frontend.admins.login',); 
        $admins = $this->adminModel->getAllAdmin(['email', 'password']);
        if(isset($_POST["submit"])){
            $email = $_POST["email"] ?? null;
            $password = $_POST["password"] ?? null;
            if(isset($email) && isset($password)){
               
                      $_SESSION["email"]= $email;
                      $_SESSION["password"]= $password;
                      header('location: ./views/frontend/admins/index.php');
            }
                else echo '<center class="alert alert-danger">Tài khoản không tồn tại hoặc bạn không có quyền truy cập</center>';
            
        }
      

    }
}