<?php 
class CustomerController extends BaseController{
    public function __construct()
    {
        $this->loadModel('AdminModel');
        $this->AdminModel = new AdminModel;
        $this-> loadModel('CustomerModel');
        $this-> CustomerModel = new CustomerModel;
    }
    public function index(){
        $topnumBorr = $this-> CustomerModel -> get_topBorr("books","numborr","DESC",3);
        return $this->view("frontend.customer.index",
       [
        "topnumBorrs" => $topnumBorr,
       ]
    );
      
    }
}
?>