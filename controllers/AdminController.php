<?php
class AdminController extends BaseController{
    private $adminModel;
    public function __construct() {
        $this->loadModel('AdminModel');
        $this->adminModel = new AdminModel;
    }
    public function index(){   
        if(isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $role_type = $_POST["role_type"];
            $email = strip_tags($email);
            $email = addslashes($email);
            $password = strip_tags($password);
            $password = addslashes($password);
            $row = $this->adminModel->getAdmin();
            if ($email == "" || $password =="") {
                echo "email hoặc password bạn không được để trống!";
                $this->view('frontend.admins.index');
                die;
            }else{
                $result = $this->adminModel->login($email, $password, $role_type);
               if (mysqli_num_rows($result) > 0) {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['role_type'] = $role_type;
                $this->view('include.admin.header',
                [   'row' => $row]
                );                                                             
                header ('location: index.php?controller=admin&action=home');  
               }else{
                echo "tên đăng nhập hoặc mật khẩu không đúng !";
                $this->view('frontend.admins.index');
                die;
               }
        }
    }
                       
        $this->view('frontend.admins.index');

        }   
        //$admins = $this->adminModel->getAllAdmin(['id','name','email', 'avatar','role_type']);
    public function home() {
        $this->view('frontend.admins.home');
    }
    public function logout(){
        //unset($_SESSION['email']);
        //unset($_SESSION['password']);
        //session_destroy();
        return $this->index();
        $this->view('frontend.admins.index');
        //session_destroy();

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
        $id = $_GET['id'];
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
        }   
            $row = $this->adminModel->getIdAdmin($id);
            $this->view('frontend.admins.updateAdmin',[
                'row' => $row
                 ]);

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
    }
    
    public function listAdmin(){
        
        $result = $this->adminModel->getAdmin();
        $row = mysqli_fetch_array($result);
        return $this->view('frontend.admins.listAdmin',
        [ 'row' => $row, 'result'=>$result]
    );
    }
    public function listUser(){
        
        $row = $this->adminModel->getAdmin();
        //$admins = $this->adminModel->getAllAdmin(['id','name','email', 'avatar','role_type']);

        return $this->view('frontend.admins.listUser',
        [ 'row' => $row]
    );
     
    }

    public function editUser(){
        $id = $_GET['id'];
        if(isset($_POST["submit"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $facebook_id = $_POST["facebook"];
            $status = $_POST["status"];
           // $ins_id = $_POST["ins_id"];
            $upd_id = $_POST["upd_id"];
            //$del_flag = $_POST["del_flag"];
            $upd_datetime = date('Y-m-d H:s:i');

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
            $row = $this->adminModel->getIdUser($id);
            $this->view('frontend.admins.editUser',[
                'row' => $row
                 ]);
       
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
    }
    public function introduce() {
        $this->view('frontend.admins.introduce',);        

    }
}

    
