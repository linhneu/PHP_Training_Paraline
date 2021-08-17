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
                      $this->view('frontend.admins.index');;
            }
                else echo '<center class="alert alert-danger">Tài khoản không tồn tại hoặc bạn không có quyền truy cập</center>';
        }
    }
    public function logout(){
        session_start();
        unset($_SESSION['email']);
        $this->view('frontend.admins.index');;
    }
    public function createAdmin() {      
 
        if(isset($_POST["submit"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $role_type = $_POST["role_type"];
            $ins_id = $_POST["ins_id"];
            $upd_id = $_POST["upd_id"];
            $del_flag = $_POST["del_flag"];
            $ins_datetime = $upd_datetime = date('Y-m-d H:s:i');
            

            if($_FILE['avatar']['name'] =='') {
                $error_anh_sp='<span style="color: red;">(*)</span>';
            }
            else {
                $anh_sp = $_FILES['avatar']['name'];
                $tmp_name = $_FILES['avatar']['tmp_name'];
            }
            $data = [
                'name'=> $name,
                'email'=> $email,
                'password'=> $password,
                'ins_id'=> $ins_id,
                'upd_id'=> $upd_id,
                'ins_datetime'=> $ins_datetime,
                'upd_datetime'=> $upd_datetime,
                'role_type'=> $role_type,
                'del_flag'=> $del_flag,
            ];
            $this->adminModel->createAdmin($data);          
        }
        $this->view('frontend.admins.createAdmin',);        
    }
    public function updateAdmin(){
        $id = $_GET['id'];
        $data = [
            'id' => 1,
            'name' => 'linh'
        ];
        $this->adminModel->updateAdmin($id, $data);

    }
    public function deleteAdmin() {
        $id = $_GET['id'];
        $this->adminModel->deleteAdmin($id);
    }
    public function findAdmin() {
        $id = $_GET['id'];    
        $admin = $this->adminModel->findAdmin($id);
        print_r($admin);
    }
}

    
