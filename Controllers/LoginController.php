<?php
class LoginController extends BaseController{
    public function __construct()
    {
          $this->loadModel('LoginModel');
          // khởi tạo đối tượng
          $this->LoginModel = new LoginModel;
          
    }
    public function addUser(){
        $data = $_POST;
        print_r($data);
    }
    public function check_mail(){
        $data = $_POST;
        $data = $this->LoginModel-> checkEmail($data);
       echo sizeof($data);
    }
}