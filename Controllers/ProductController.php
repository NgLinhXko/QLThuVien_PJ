<?php
class ProductController extends BaseController
{
 
    public function __construct()
    {
        $this->loadModel('AdminModel');
        $this->AdminModel = new AdminModel;
        $this->loadModel('CustomerModel');
        $this->CustomerModel = new CustomerModel;
        $this->loadModel('ProductModel');
        $this->ProductModel = new ProductModel;
    }
    public function index()
    {
        $id_b = $_GET['id_b'];
        $all_cate = $this->AdminModel->getALL(self::CATE);
        $all_nxb = $this->AdminModel->All_nxb();
        $datas_book = $this->ProductModel->book_by_id($id_b);
        $datas_nxb = $this->ProductModel ->data_nxb($datas_book['nxb_b']);
        $book_by_cate = $this-> ProductModel -> book_by_cate($datas_book['name_cate']);
        $cate_book  = $this->ProductModel -> cate_book();
        $topnumBorr = $this->CustomerModel->get_topBorr(self::BOOKS, "numborr", "DESC", 5);
        $newBook = $this->CustomerModel->get_topBorr(self::BOOKS, "id_b", "DESC", 5);
        $randomBook = $this->CustomerModel->get_topBorr(self::BOOKS, "RAND", "()", 1);
        return $this->view('frontend.customer.productdetail', [
            "all_cates" => $all_cate,
            "all_nxbs" => $all_nxb,
            "datas_book" => $datas_book,
            "datas_nxb"=> $datas_nxb,
            "books_by_cate" => $book_by_cate,
            "cates_book" => $cate_book,
            "topnumBorrs" => $topnumBorr,
            "newBooks" => $newBook,
            "randomBooks" =>  $randomBook
        ]);
    }
}
