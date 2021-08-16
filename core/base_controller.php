<?php
//class BaseController
//{
  //protected $folder; 
  //function render($file, $data = array(), $admin)
  //{
    
    //$view_file = 'views/' . $this->folder . '/' . $file . '.php';
    //if (is_file($view_file)) {
      
      //extract($data);
     
      //ob_start();
      //require_once($view_file);
      //$content = ob_get_clean();
      //if(isset($admin)) {
        //require_once('views/layouts/admin.php');
      //} else {
        //  require_once('views/layouts/application.php');
      //}
      
    //} else {
      //   header('Location: index.php?controller=layouts&action=error');
    //}
  //}
//}
class BaseController {
  public function model($model){
    require_once "./models/".$model.".php";
    return new $model;
  }
  public function view($view, $data=[]){
    require_once "./views/".$view.".php";
  }
}