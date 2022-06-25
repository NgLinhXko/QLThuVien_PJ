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
        $this->loadModel('BillModel');
        $this->BillModel = new BillModel;
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
        $id_u = $_SESSION['id_u'];
        $act = $_POST['act'];
        //lấy về các bill của ngườidungf
        // if($act == 3){

        // }
        $data = $this->BillModel->data_bill($id_u, $act);
       
        $detail_bill = [];
        foreach ($data as $dt) {
            $dt_detail = $this->BillModel->detail_bill($dt['id_bi']);
            array_push($detail_bill, $dt_detail);
        }
        
        return $this->view("frontend.customer.data_bill", [
            "detail_bills" => $detail_bill,
            "datas_bill" => $data,
            "act" => $act
        ]);
    }
    public function count_bill()
    {
        $data = [];
        $id_u = $_SESSION['id_u'];
        for ($i = -1; $i <= 5; $i++) {
            $cout = $this->BillModel->count_bill($i, $id_u);
            array_push($data, $cout);
        }
        echo json_encode($data);
    }
    public function borr_again()
    {
        $id_bi = $_POST['id_bi'];
        $data_book = $this->ManagebillModel->data_detail_book($id_bi);

        $cart_affter = sizeof($_SESSION['cart']);
        foreach ($data_book as $dt) {
            $dem  = 0;
            // array_push($arr_id_b, $data_book['id_b']);
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i][0]['id_b'] == $dt['id_b']) {
                    $dem = 1;
                }
            }
            // if ($dem == 1) {
            //     $string = "Sản phẩm đã có trong giỏ hàng";
            // }
            if ($dem == 0) {
                $data_book = $this->AdminModel->load_update(self::BOOKS, ["id_b" => $dt['id_b']]);
                array_push($_SESSION['cart'], $data_book);
                // $string = "Thêm thành công";
            }
        }
        // echo 
        $cart_before = sizeof($_SESSION['cart']);
        // echo json_encode()
        if ($cart_before -  $cart_affter > 0) {
            echo "Đã thêm các sản phẩm vào giỏ hàng";
        } else {
            echo "Sản phẩm đã có trong giỏ hàng";
        }
    }
}
