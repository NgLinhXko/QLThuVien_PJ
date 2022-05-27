<?php
class ManagebillController extends BaseController
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
    }
    public function index()
    {

        return $this->view("frontend.admin.managebill");
    }
    public function get_dtmanage()
    {
        $act = $_POST['act'];
        $data = $this->ManagebillModel->data_bill($act);
        return $this->view("frontend.admin.data_manage", [
            "act" => $act,
            "datas" => $data
        ]);
    }
    public function count_bill()
    {
        $data = [];
        for ($i = 0; $i <= 5; $i++) {
            $cout = $this->ManagebillModel->count_bill($i);
            array_push($data, $cout);
        }
        echo json_encode($data);
    }
    public function update_bill()
    {
        $status =  (int)$_POST['status'] + 1;
        $id_bi = $_POST['id_bi'];
        $data_bi_user = $this->ManagebillModel->data_bi_user($id_bi);
        $id_u= $data_bi_user['id_u'];
        if ($status == 2) {
            $data_detail_book = $this->ManagebillModel->data_detail_book($id_bi);
            foreach ($data_detail_book as $sluongSach) {
                $this->ManagebillModel->update_quantity_b((int)$sluongSach['quantity_b'] - 1, $sluongSach['id_b']);
            }
        }
        if ($status == -1) {
            // $data_detail_book = $this->ManagebillModel->data_detail_book($id_bi);
            // foreach ($data_detail_book as $sluongSach) {
            //     $this->ManagebillModel->update_quantity_b((int)$sluongSach['quantity_b'] + 1, $sluongSach['id_b']);
            // }
            // $data_bill = $this->ManagebillModel-> data_bi_user($id_bi);
            $money_get =$data_bi_user['total'];
            $money_user  = $data_bi_user['money'];
            $this->ManagebillModel->back_money((int)$money_get+(int)$money_user,$id_u);
        }
        $data = $this->ManagebillModel->update_bill($status, $id_bi);
        if ($status == 1) {
            echo "Xác nhận đơn hàng " . $data;
        }
        if ($status == 2) {
            echo "Lấy hàng " . $data;
        }
        if($status == 3){
            echo "Nhận hàng ".$data;
        }
        if($status==4){
            echo  "Vui lòng đợi hệ thống xác nhận";
        }
        if ($status == 5) {
            echo "Xác nhận trả sách " . $data;
        }
        if ($status == -1) {
            echo "Hủy đơn hàng " . $data;
        }
    }
    public function data_detail()
    {
        $id_bi = $_POST['id_bi'];
        $data_bi_user = $this->ManagebillModel->data_bi_user($id_bi);
        $data_detail_book = $this->ManagebillModel->data_detail_book($id_bi);
        return $this->view("frontend.admin.data_manage", [
            "modal" => "yes",
            "datas_bi_user" =>  $data_bi_user,
            "datas_detail_book" => $data_detail_book
        ]);
    }
}
