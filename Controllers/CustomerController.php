<?php
class CustomerController extends BaseController
{

    public function __construct()
    {
        $this->loadModel('AdminModel');
        $this->AdminModel = new AdminModel;
        $this->loadModel('CustomerModel');
        $this->CustomerModel = new CustomerModel;
    }
    public function index()
    {
        //top 10 sach muon cao nhat
        $topnumBorr = $this->CustomerModel->get_topBorr(self::BOOKS, "numborr", "DESC", 10);
        //sach random
        $randomBook = $this->CustomerModel->get_topBorr(self::BOOKS, "RAND", "()", 1);
        //sach random
        $randomBook1 = $this->CustomerModel->get_topBorr(self::BOOKS, "RAND", "()", 1);
        //3 sach random
        $randomBook2 = $this->CustomerModel->get_topBorr(self::BOOKS, "RAND", "()", 3);
        //top 3 sach moi phat hanh
        $newBook = $this->CustomerModel->get_topBorr(self::BOOKS, "id_b", "DESC", 3);
        //10 sach random nxb
        $randomBook_byNXB = $this->CustomerModel->get_topBorr(self::BOOKS, "RAND", "()", 10);
        //all cate
        $all_cate = $this->AdminModel->getALL(self::CATE);
        //all nxb
        $all_nxb = $this->AdminModel->All_nxb();
        return $this->view(
            "frontend.customer.index",
            [
                "topnumBorrs" => $topnumBorr,
                "randomBooks" => $randomBook,
                "randomBooks1" => $randomBook1,
                "randomBooks2" => $randomBook2,
                'newBooks' => $newBook,
                "randomBook_byNXBs" => $randomBook_byNXB,
                "all_cates" => $all_cate,
                "all_nxbs" => $all_nxb
            ]
        );
    }
}
