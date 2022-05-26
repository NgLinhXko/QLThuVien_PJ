<?php
class CateController extends BaseController
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
        if (isset($_GET['id_cate']) && is_numeric($_GET['id_cate']) ==true) {
            $id_cate = $_GET['id_cate'];
        }else{
            header("Location:".self::URL);
        }

        $all_cate = $this->AdminModel->getALL(self::CATE);
        $all_nxb = $this->AdminModel->All_nxb();
        $cate_book  = $this->ProductModel->cate_book();
        $topnumBorr = $this->CustomerModel->get_topBorr(self::BOOKS, "numborr", "DESC", 5);
        $newBook = $this->CustomerModel->get_topBorr(self::BOOKS, "id_b", "DESC", 5);
        $randomBook = $this->CustomerModel->get_topBorr(self::BOOKS, "RAND", "()", 1);
        $total_book = $this->CateModel-> data_cate($id_cate);
        return  $this->view("frontend.customer.categories", [
            "all_cates" => $all_cate,
            "all_nxbs" => $all_nxb,
            "cates_book" => $cate_book,
            "topnumBorrs" => $topnumBorr,
            "newBooks" => $newBook,
            "randomBooks" => $randomBook,
            "total_page_cate" => sizeof($total_book)
        ]);
    }
}
