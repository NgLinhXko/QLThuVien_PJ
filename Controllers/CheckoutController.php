<?php
class CheckoutController extends BaseController
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
        $all_cate = $this->AdminModel->getALL(self::CATE);
        $all_nxb = $this->AdminModel->All_nxb();
        if(sizeof($_SESSION['cart']) ==0){
            header("Location:".self::URL."controller=cart");
        }else{
            return $this->view('frontend.customer.checkout', [
                "all_cates" => $all_cate,
                "all_nxbs" => $all_nxb,
            ]);
        }
        }
        
    public function info()
    {
        $actions = $_POST['actions'];
        $datas_user = $this->AdminModel->load_update(self::USERS, ["id_u" => $_SESSION['id_u']]);
        return $this->view("frontend.customer.data_cart", [
            "actions" => $actions,
            "datas_user" => $datas_user
        ]);
    }
    public function banking(){
        $tong = $_POST['tong'];
       
        $datas_user = $this->AdminModel->load_update(self::USERS, ["id_u" => $_SESSION['id_u']]);
        $money =  $datas_user[0]['money'];
        $datas_admin = $this->AdminModel->load_update(self::USERS, ["id_u" => 33]);
        $money_admin =  $datas_admin[0]['money'];
        $data = [
            "date_borr" => date("Y/m/d"),
             "id_u" => $_SESSION['id_u'],
             "total"   => $tong,
             "status" => 0
        ];
        // $datas_user = $this->AdminModel->load_update(self::USERS, ["id_u" => $_SESSION['id_u']]);
        $add = $this->AdminModel -> add_data(self::BILL, $data);
        $bill = $this-> AdminModel ->pagination(self::BILL, "id_bi", 0);
        $bill_get = $bill[0]['id_bi'];
        for($i = 0 ; $i <sizeof($_SESSION['cart']);$i++){
             $this->AdminModel -> add_data(self::DETAILBILL, [
                "id_bi" => $bill_get,
                "id_b" => $_SESSION['cart'][$i][0]['id_b'],
                "quanti_De" => 1
            ]);
        }
        $msg = $this->AdminModel -> update_data(self::USERS,["id_u" => $_SESSION['id_u']],['money'=> $money-$tong]);
        $this->AdminModel -> update_data(self::USERS,["id_u" => 33],['money'=> $money_admin+$tong]);
        $_SESSION['cart'] = [];
         echo "Bạn đã đặt hàng thành công";
        
    }
    public function ck_banking(){
        $val_money = $_POST['val_money'];
        $money_now = $_POST['money_now'];
        $msg = $this->AdminModel -> update_data(self::USERS,["id_u" => $_SESSION['id_u']],['money'=> $val_money+$money_now]);
        echo "Nạp tiền thành công";
    }
}
