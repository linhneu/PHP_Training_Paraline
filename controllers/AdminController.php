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
        $admins = $this->adminModel->getAllAdmin(['email', 'password']);

        $this->view('frontend.admins.login',
    ['admins' => $admins]
    );

    }
}