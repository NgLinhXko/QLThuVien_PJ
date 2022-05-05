<?php
class LoginController extends BaseController{
    public function __construct()
    {
        
    }
    public function addUser(){
        $data = $_POST;
        print_r($data);
    }
}