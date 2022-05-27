<?php
class BillController extends BaseController
{
    public function __construct()
    {
        $this->loadModel('LoginModel');
        $this->LoginModel = new LoginModel;
        $this->loadModel('AdminModel');
        $this->AdminModel = new AdminModel;
        $this->loadModel('CustomerModel');
        $this->CustomerModel = new CustomerModel;
        $this->loadModel('ManagebillModel');
        $this->ManagebillModel = new ManagebillModel;
        $this->loadModel('ProductModel');
        $this->ProductModel = new ProductModel;
        $this->loadModel('CateModel');
        $this->CateModel = new CateModel;
    }
    public function index()
    {
        $all_cate = $this->AdminModel->getALL(self::CATE);
        $all_nxb = $this->AdminModel->All_nxb();
        return $this->view("frontend.customer.bill", [
            "all_cates" => $all_cate,
            "all_nxbs" => $all_nxb,
        ]);
    }
    public function get_data()
    {
        $act = $_POST['act'];
        return $this->view("frontend.customer.data_bill", []);
    }
}
