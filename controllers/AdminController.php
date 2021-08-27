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
            $email = strip_tags($email);
            $email = addslashes($email);
            $password = strip_tags($password);
            $password = addslashes($password);
            if ($email == "" || $password == "") {
                echo MESSAGE_NULL_LOGIN_FAILED;
            } else {
                $result = $this->adminModel->login($email, $password);
                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['role_type'] = $row['role_type'];
                    header('location: index.php?controller=admin&action=home');
                } else {
                    echo MESSAGE_VALIDATE_LOGIN_FAILED;
                }
            }
        }
        $this->view('frontend.admins.index');
    }
    public function permissionAdmin()
    {
        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            if ($_SESSION['role_type'] == ROLE_ADMIN) {
                exit(MESSAGE_NOT_PERMISSION);
            }
        }
    }
    public function checkLogin()
    {
        if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
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
        session_destroy();
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
        $this->checkLogin();
        $this->permissionAdmin();
        if (isset($_POST["submit"])) {
            if ($_FILES['avatar']['name'] == '') {
                echo MESSAGE_NOT_NULL_FORM;
            } else {
                $avatar = $_FILES['avatar']['name'];
                $tmp_name = $_FILES['avatar']['tmp_name'];
            }
            $data = [
                'name' => isset($_POST["name"]) ? $_POST["name"] : null,
                'email' => isset($_POST["email"]) ? $_POST["email"] : null,
                'password' => isset($_POST["password"]) ? $_POST["password"] : null,
                'role_type' => isset($_POST["role_type"]) ? $_POST["role_type"] : null,
                'avatar' => $avatar
            ];
            $this->adminModel->createAdmin($data);
            move_uploaded_file($tmp_name, "asset/images/" . $avatar);
            header('location: index.php?controller=admin&action=listAdmin');
        }
        $this->view('frontend.admins.createAdmin',);
    }
    public function updateAdmin()
    {
        $this->checkLogin();
        $this->permissionAdmin();
        $id = $_GET['id'];
        if (isset($_POST["submit"])) {
            if ($_FILES['avatar']['name'] == "") {
                $avatar = $_POST['avatar'];
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
        $id = $_GET['id'];
        $del_flag = DEL_FLAG_BANNED;
        $this->adminModel->deleteAdmin($id, $del_flag);
        header('location: index.php?controller=admin&action=listAdmin');
    }
    public function findAdmin()
    {
        $this->checkLogin();
        $this->permissionAdmin();
        if (isset($_POST['submit'])) {
            $del_flag = DEL_FLAG_ACTIVE;
            $search = addslashes($_POST['search']);
            if (!isset($search)) {
                echo MESSGAE_NOT_NULL_KEY;
            } else {
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
        if (isset($_POST['submit'])) {
            $del_flag = DEL_FLAG_ACTIVE;
            $search = addslashes(isset($_POST['search']) ? $_POST['search'] : null);
            if (empty($search)) {
                echo MESSGAE_NOT_NULL_KEY;
            } else {
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
        }
        $this->view('frontend.admins.findUser');
    }
}
