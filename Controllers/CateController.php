<?php
class CateController extends BaseController
{
    // public $id_cate = $_GET['id_cate'];
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
        if (isset($_GET['id_cate']) && is_numeric($_GET['id_cate']) == true) {
            $id_cate = $_GET['id_cate'];
        } else {
            header("Location:" . self::URL);
        }

        $all_cate = $this->AdminModel->getALL(self::CATE);
        $all_nxb = $this->AdminModel->All_nxb();
        $cate_book  = $this->ProductModel->cate_book();
        $topnumBorr = $this->CustomerModel->get_topBorr(self::BOOKS, "numborr", "DESC", 5);
        $newBook = $this->CustomerModel->get_topBorr(self::BOOKS, "id_b", "DESC", 5);
        $randomBook = $this->CustomerModel->get_topBorr(self::BOOKS, "RAND", "()", 1);
        $total_book = $this->CateModel->total_book_cate($id_cate);
        $total_page = ceil($total_book / 8);
        return  $this->view("frontend.customer.categories", [
            "all_cates" => $all_cate,
            "all_nxbs" => $all_nxb,
            "cates_book" => $cate_book,
            "topnumBorrs" => $topnumBorr,
            "newBooks" => $newBook,
            "randomBooks" => $randomBook,
            "total_book_cate" => $total_book
        ]);
    }
    public function cate_by_page()
    {
        $id_cate = $_POST['id_cate'];
        if (!isset($_POST['this_page'])) {
            $this_page = 1;
        } else {
            $this_page = $_POST['this_page'];
        }
        $start = ($this_page - 1) * 8;
        $column = $_POST['col'];
        $order = $_POST['order'];
        $data_by_page =  $this->CateModel->data_cate($id_cate, $column, $order, $start);
        $total_book = $this->CateModel->total_book_cate($id_cate);
        $total_page = ceil($total_book / 8);
        return $this->view("frontend.customer.data_cate", [
            "URL" => self::URL,
            "datas_by_page" => $data_by_page,
            "total_page" => $total_page,
            "this_page" => $this_page
        ]);
    }

    // public function search(){
    //     $val = $_POST['val_search'];
    // }
}
