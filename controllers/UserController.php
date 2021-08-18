<?php
class UserController extends BaseController{
    private $userModel;
    public function __construct() {
        $this->loadModel('UserModel');
        $this->userModel = new UserModel;
    }public function index() {
        $this->view('frontend.users.index',); 
    }
    public function showUser() {
        $this->view('frontend.users.showUser',); 
    }
}