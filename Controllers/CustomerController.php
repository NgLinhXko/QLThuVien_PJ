<?php 
class CustomerController extends BaseController{
    public function __construct()
    {
        // echo '123';
    }
    public function index(){
        return $this->view("frontend.customer.index");
    }
}
?>