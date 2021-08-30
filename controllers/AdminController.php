<?php
class AdminController extends BaseController
{
    public $adminModel;
    public function __construct()
    {
        $this->loadModel('AdminModel');
        $this->adminModel = new AdminModel;
    }
    public function index()
    {
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            if ($email == "" || $password == "") {
                echo MESSAGE_NULL_LOGIN_FAILED;
            } else {
                $result = $this->adminModel->login($email, $password);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) > 0) {
                    $data = [
                        'id' => $row['id'],
                        'email' => $email,
                        'password' => $password,
                        'role_type' => $row['role_type']
                    ];
                    $_SESSION['admin'] = $data;
                    header('location: index.php?controller=admin&action=home');
                } else {
                    echo MESSAGE_VALIDATE_LOGIN_FAILED;
                }
            }
        }
        $this->view('frontend.admins.index',);
    }
    public function permissionAdmin()
    {
        if (isset($_SESSION['admin']['email']) && isset($_SESSION['admin']['password'])) {
            if ($_SESSION['admin']['role_type'] == ROLE_ADMIN) {
                exit(MESSAGE_NOT_PERMISSION);
            }
        }
    }
    public function checkLogin()
    {
        if (!isset($_SESSION['admin']['email']) && !isset($_SESSION['admin']['password'])) {
            header('location:index.php?controller=admin&action=index');
        }
    }
    public function home()
    {
        $this->checkLogin();
        $this->view('frontend.admins.home',);
    }
    public function logout()
    {
        unset($_SESSION['admin']['email']);
        unset($_SESSION['admin']['password']);
        header('location: index.php?controller=admin&action=index');
    }
    public function listAdmin()
    {
        $this->checkLogin();
        $this->permissionAdmin();
        $result = $this->adminModel->getAdmin();
        return $this->view(
            'frontend.admins.listAdmin',
            ['result' => $result]
        );
    }
    public function createAdmin()
    {
        $error = []; $report = [];
        $allowType = ['jpg', "png", "bmp", "jpeg"];
        $result = $this->adminModel->getAdmin();
        $row = mysqli_fetch_array($result);
        $this->checkLogin();
        $this->permissionAdmin();
        if (isset($_POST["submit"])) {
            $email = isset($_POST["email"]) ? $_POST["email"] : null;
            if (isset($_FILES['avatar'])) {
                $targetDir = "";
                $targetFile   = $targetDir . basename($_FILES["avatar"]["name"]);
                $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);
                if (!in_array($imageFileType, $allowType)) {
                    $error['avatar'] = MESSAGE_AVA_TYPE_FAILED;
                }
                if ($_FILES['avatar']['size'] > 800000) {
                    $error['avatar'] = MESSAGE_AVA_SIZE_FAILED;
                }
            }
            $data = [
                'name' => isset($_POST["name"]) ? $_POST["name"] : null,
                'email' => $email,
                'password' => isset($_POST["password"]) ? $_POST["password"] : null,
                'role_type' => isset($_POST["role_type"]) ? $_POST["role_type"] : null,
                'avatar' => $targetFile
            ];
            if(empty($data['name'])) {
                $error['name'] = MESSAGE_NOT_NULL_NAME ;
            }
            if (empty($email)) {
                $error['email'] = MESSAGE_NOT_NULL_EMAIL;
            }
            if ($email === $row['email']) {
                $error['email'] = MESSAGE_EXIST_EMAIL;
            }
            if(empty($data['password'])) {
                $error['password'] = MESSAGE_NOT_NULL_PASSWORD ;
            }

            if (empty($error)) {
                if (isset($_FILES['avatar'])) {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile); 
                }
                $this->adminModel->createAdmin($data);
                $report['create'] = MESSAGE_CREATE_SUCCESS;
                $this->view('frontend.admins.listAdmin', ['report' => $report]);
                header('location: index.php?controller=admin&action=listAdmin',); }
            else if(isset($error)) {
                $error['failed'] = MESSAGE_DATA_FAILED;
            }
            //}
        }
        $this->view('frontend.admins.createAdmin', ['error' => $error]);
    }
    public function updateAdmin()
    {
        $this->checkLogin();
        $this->permissionAdmin();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (isset($_POST["submit"])) {
            if ($_FILES['avatar']['name'] == "") {
                $avatar = $_POST['avatar']; // @todo truyền giá trị gì lưu lại giá trị, k update avatar, truyền gì lên mới được dùng
            } else {
                $avatar = $_FILES['avatar']['name'];
                $tmp_name = $_FILES['avatar']['tmp_name'];
            }
            $data = [
                'name' => isset($_POST["name"]) ? $_POST["name"] : null,
                'email' => isset($_POST["email"]) ? $_POST["email"] : null,
                'password' => isset($_POST["password"]) ? $_POST["password"] : null,
                'role_type' => isset($_POST["role_type"]) ? $_POST["role_type"] : null,
                'avatar' => $avatar,
            ];
            $this->adminModel->updateAdmin($id, $data);
            move_uploaded_file($tmp_name, "asset/images/" . $avatar);
            header('location: index.php?controller=admin&action=listAdmin');
        }
        $row = $this->adminModel->getIdAdmin($id);
        $this->view('frontend.admins.updateAdmin', [
            'row' => $row
        ]);
    }
    public function deleteAdmin()
    {
        $this->checkLogin();
        $this->permissionAdmin();
        $id = isset($_GET['id']) ? $_GET['id'] : null; // @todo check tồn tại trên url, có tồn tại trong db hay k báo mess
        $del_flag = DEL_FLAG_BANNED;
        $this->adminModel->deleteAdmin($id, $del_flag);
        header('location: index.php?controller=admin&action=listAdmin');
    }
    public function findAdmin()
    {
        $this->checkLogin();
        $this->permissionAdmin();
        $search = isset($_GET["search"]) ? $_GET["search"] : null;
        if (!empty($search)) {
            $del_flag = DEL_FLAG_ACTIVE;
            $rowsPerPage = ROW_PER_PAGE;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $total = $this->adminModel->listFindAdmin($search, $del_flag);
            $totalRows = mysqli_num_rows($total);
            $totalPages = ceil($totalRows / $rowsPerPage);
            if ($currentPage > $totalPages) {
                $currentPage = $totalPages;
            } else if ($currentPage < 1) {
                $currentPage = 1;
            }
            $start = ($currentPage - 1) * $rowsPerPage;
            $result = $this->adminModel->findAdmin($search, $del_flag, $start, $rowsPerPage);
            return $this->view('frontend.admins.findAdmin', [
                    'result' => $result,
                    'currentPage' => $currentPage,
                    'totalPages' => $totalPages
                ]);
        }
        $this->view('frontend.admins.findAdmin');
    }
    public function listUser()
    {
        $this->checkLogin();
        $result = $this->adminModel->getUser();
        return $this->view(
            'frontend.admins.listUser',
            ['result' => $result]
        );
    }
    public function editUser()
    {
        $this->checkLogin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST["submit"])) {
                if ($_FILES['avatar']['name'] == '') {
                    $avatar = $_POST['avatar'];
                } else {
                    $avatar = $_FILES['avatar']['name'];
                    $tmp_name = $_FILES['avatar']['tmp_name'];
                }
                $data = [
                    'name' => isset($_POST["name"]) ? $_POST["name"] : null,
                    'email' => isset($_POST["email"]) ? $_POST["email"] : null,
                    'facebook_id' => isset($_POST["facebook_id"]) ? $_POST["facebook_id"] : null,
                    'status' => isset($_POST["status"]) ? $_POST["status"] : null,
                ];
                $this->adminModel->editUser($id, $data);
                move_uploaded_file($tmp_name, "asset/images/" . $avatar);
                header('location: index.php?controller=admin&action=listUser');
            }
        }
        $row = $this->adminModel->getIdUser($id);
        $this->view('frontend.admins.editUser', [
            'row' => $row
        ]);
    }
    public function deleteUser()
    {
        $this->checkLogin();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $del_flag = DEL_FLAG_BANNED;
        $this->adminModel->deleteUser($id, $del_flag);
        return $this->view('frontend.admins.listUser');
    }
    public function findUser()
    {
        $this->checkLogin();
        $search = isset($_GET["search"]) ? $_GET["search"] : null;
        if (!empty($search)) {
            $del_flag = DEL_FLAG_ACTIVE;
            $rowsPerPage = ROW_PER_PAGE;
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $total = $this->adminModel->listFindUser($search, $del_flag);
            $totalRows = mysqli_num_rows($total);
            $totalPages = ceil($totalRows / $rowsPerPage);
            if ($currentPage > $totalPages) {
                $currentPage = $totalPages;
            } else if ($currentPage < 1) {
                $currentPage = 1;
            }
            $start = ($currentPage - 1) * $rowsPerPage;
            $result = $this->adminModel->findUser($search, $del_flag, $start, $rowsPerPage);
            return $this->view('frontend.admins.findUser', [
                'result' => $result,
                'currentPage' => $currentPage,
                'totalPages' => $totalPages
            ]);
        }
        $this->view('frontend.admins.findUser');
    }
}
