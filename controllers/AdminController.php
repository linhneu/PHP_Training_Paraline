<?php
class AdminController extends BaseController{
    private $adminModel;
    public function __construct() {
        $this->loadModel('AdminModel');
        $this->adminModel = new AdminModel;
    }
    //public function index() {
        
       // $this->view('frontend.admins.index');
   // }
    public function index(){      
        $this->view('frontend.admins.index',); 
        $admins = $this->adminModel->getAllAdmin(['email', 'password']);
        if(isset($_POST["submit"])){
            $email = $_POST["email"] ?? null;
            $password = $_POST["password"] ?? null;
            if(isset($email) && isset($password)){             
                      $_SESSION["email"]= $email;
                      $_SESSION["password"]= $password;
                      //$this->view('frontend.admins.home');;
            }
                else echo '<center class="alert alert-danger">Tài khoản không tồn tại hoặc bạn không có quyền truy cập</center>';
        }
    }
    public function home() {
        $this->view('frontend.admins.home');
    }
    public function logout(){
        session_start();
        unset($_SESSION['email']);
        $this->view('frontend.admins.index');;
    }
    public function createAdmin() {      
 
        if(isset($_POST["submit"])) {
            //$id = $_POST["id"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $role_type = $_POST["role_type"];
            $ins_id = $_POST["ins_id"];
           // $upd_id = $_POST["upd_id"];
            $del_flag = $_POST["del_flag"];
            $ins_datetime =  date('Y-m-d H:s:i');
            
            if($_FILE['avatar']['name'] =='') {
                $error_avatar='<span style="color: red;">(*)</span>';
            }
            else {
                $avatar = $_FILES['avatar']['name'];
                $tmp_name = $_FILES['anh_sp']['tmp_name'];

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
           // return $this->view('frontend.admins.home',);       
        }
        $this->view('frontend.admins.createAdmin',);        
    }
    public function updateAdmin(){
        //$this->view('frontend.admins.updateAdmin');
        $id = $_GET['id'];
        /*
        if(isset($_POST["submit"])) {
          
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $role_type = $_POST["role_type"];
           // $ins_id = $_POST["ins_id"];
            $upd_id = $_POST["upd_id"];
           // $del_flag = $_POST["del_flag"];
            $upd_datetime = date('Y-m-d H:s:i');
            
            //$row = $this->adminModel->getAllAdmin(['name', 'email','password','role_type']);

            if($_FILE['avatar']['name'] =='') {
                $error_avatar='<span style="color: red;">(*)</span>';
            }else {
                $avatar = $_FILES['avatar']['name'];
                $tmp_name = $_FILES['anh_sp']['tmp_name'];
            }
            $data = [
                'name'=> $name,
                'email'=> $email,
                'password'=> $password,              
                'upd_id'=> $upd_id,
                'upd_datetime'=> $upd_datetime,
                'role_type'=> $role_type,
            ];
            $this->adminModel->updateAdmin($id, $data);
            $detail = $this->adminModel->getById($id);
        }   
        */
        //$this->adminModel->updateAdmin($id, $data);
        $rows = $this->adminModel->getById($id);
        print_r($rows);
        //echo $rows['name'];
        die;

            //$this->view('frontend.admins.updateAdmin',[
                // 'details' => $details
                // ]);
        //$row = $this->adminModel->getAllAdmin(['id','name', 'email', 'password', 'avatar', 'role_type']);
        //$detail = $this->adminModel->getById($id);
      // $this->view('frontend.admins.updateAdmin',[
           //'row' => $row, 
          // 'detail' => $detail
           //  ]); 
    }
    public function deleteAdmin() {
        $id = $_GET['id'];
        $this->adminModel->deleteAdmin($id);
    }
    public function findAdmin() {
        $this->view('frontend.admins.findAdmin',);        
        
       if(isset($_POST['submit']))  {
           $condition = 0;
            $search = addslashes($_POST['search']);
            if(empty($search)) {
                echo "Please enter keyword";
            } else 
            {
                $admins = $this->adminModel->findAdmin($search, $condition);
                //return $this->view('frontend.admins.findAdmin',
                //['admins' => $admins]);
                print_r($admins);
               
            }
        } 
        //$admins = $this->adminModel->findAdmin($search);
        //print_r($admins);
    }
    
    public function listAdmin(){

        $admins = $this->adminModel->getAllAdmin(['email', 'password'], 2);
        return $this->view('frontend.admins.listAdmin',
        ['admins' => $admins]
        
    );
    $rows = $this->adminModel->getById($id);
        print_r($rows);
    }

    public function editUser(){
        
        if(isset($_POST["submit"]) && isset($row)) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $facebook_id = $_POST["facebook"];
            $status = $_POST["status"];
           // $ins_id = $_POST["ins_id"];
            $upd_id = $_POST["upd_id"];
            //$del_flag = $_POST["del_flag"];
            $upd_datetime = date('Y-m-d H:s:i');
            
            $row = $this->adminModel->updateUser($id);
            print_r($row);

            if($_FILE['avatar']['name'] =='') {
                $error_avatar='<span style="color: red;">(*)</span>';
            }
            else {
                $avatar = $_FILES['avatar']['name'];
                $tmp_name = $_FILES['anh_sp']['tmp_name'];

            }
            $data = [
                'name'=> $name,
                'email'=> $email,
                'password'=> $password,
                'facebook_id'=> $facebook_id,
                'status'=> $status,
                'upd_id'=> $upd_id,
                'upd_datetime'=> $upd_datetime,
            ];
            $this->adminModel->updateUser($id, $data);
        }
        $this->view('frontend.admins.updateUser',);
       

    }
    public function deleteUser() {
        $id = $_GET['id'];
        $this->adminModel->deleteUser($id);
    }
    public function findUser() {
        $this->view('frontend.admins.findUser',);        
        
       if(isset($_POST['submit']))  {
           $condition = 0;
            $search = addslashes($_POST['search']);
            if(empty($search)) {
                echo "Please enter keyword";
            } else 
            {
                $admins = $this->adminModel->findUser($search, $condition);
                //return $this->view('frontend.admins.findAdmin',
                //['admins' => $admins]);
                print_r($admins);
               
            }
        } 
        //$admins = $this->adminModel->findAdmin($search);
        //print_r($admins);
    }
}

    
