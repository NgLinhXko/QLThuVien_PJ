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
        $id_u = $data_bi_user['id_u'];
        $money_get = $data_bi_user['total'];
        $money_user  = $data_bi_user['money'];
        $data_detail_book = $this->ManagebillModel->data_detail_book($id_bi);

        if ($status == 1) {
            $check_quanty_b = 1;
            foreach ($data_detail_book as $sluongSach) {
               if((int)$sluongSach['quantity_b'] <=0){
                    $check_quanty_b =0;
                    $string = "Sách - ".$sluongSach['name_b']." đã hết";
               }
            }
            if($check_quanty_b == 1){
                $data = $this->ManagebillModel->update_bill($status, $id_bi);
                $string =  "Xác nhận hàng ". $data;
            }

        }
        if ($status == 2) {

            foreach ($data_detail_book as $sluongSach) {
                $this->ManagebillModel->update_quantity_b((int)$sluongSach['quantity_b'] - 1, $sluongSach['id_b']);
            }
            $data = $this->ManagebillModel->update_bill($status, $id_bi);
            $string ="Lấy hàng " . $data;
        }
        if ($status == -1) {

            $this->ManagebillModel->back_money((int)$money_get + (int)$money_user, $id_u);
            $data = $this->ManagebillModel->update_bill($status, $id_bi);
            $string = "Hủy đơn hàng " . $data;
        }
        if ($status  == 5) {
            $first_date = strtotime(date("Y/m/d"));
            $second_date = strtotime($data_bi_user['date_borr']);
            $datediff = abs($first_date - $second_date);
            $days = floor($datediff / (60 * 60 * 24));
            // echo $now_day;
            $money_back = (int)$money_get + (int)$money_user - (int)$days * 2000 * sizeof($data_detail_book);
            $this->ManagebillModel->back_money($money_back, $id_u);
            $this->ManagebillModel->update_day_back(date("Y/m/d"), $id_bi);
            foreach ($data_detail_book as $sluongSach) {
                $this->ManagebillModel->update_quantity_b((int)$sluongSach['quantity_b'] + 1, $sluongSach['id_b']);
                $this->ManagebillModel->update_numBorr((int)$sluongSach['numBorr'] + 1, $sluongSach['id_b']);

            }
            $data = $this->ManagebillModel->update_bill($status, $id_bi);
            $string = "Xác nhận trả sách " . $data;
        }
 
        if ($status == 3) {
            $data = $this->ManagebillModel->update_bill($status, $id_bi);
            $string = "Nhận hàng " . $data;
           
        }
        if ($status == 4) {
            $data = $this->ManagebillModel->update_bill($status, $id_bi);
            $string = "Vui lòng đợi hệ thống xác nhận";
           
        }

        echo $string;
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
