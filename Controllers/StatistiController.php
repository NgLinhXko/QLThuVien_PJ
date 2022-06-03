<?php
class StatistiController extends BaseController
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
        $this->loadModel('StatistiModel');
        $this->StatistiModel = new StatistiModel;
    }
    public function index()
    {
        return $this->view("frontend.admin.statistical");
    }
    public function get_data()
    {
        $date_s = $_POST['date_s'];
        $date_e = $_POST['date_e'];
        //loc thống kê
        $act_tt = $_POST['act_tt'];
        //doi tt loc
        $status = $_POST['status'];
        // print_r($_POST);
        $tienlai = 0;
        if ($act_tt == 0) {

            $all_bills = $this->StatistiModel->all_bill($date_s, $date_e);
            $datail_bill = [];
            foreach ($all_bills as $bill) {

                $second_date = strtotime($bill['date_borr']);
                //lay slg sách don hang
                $num_book = $this->ManagebillModel->data_detail_book($bill['id_bi']);
                //chua huy don
                if ($bill['status'] != "-1") {
                    if ($bill['date_back'] == "") {
                        $first_date = strtotime(date("Y/m/d"));
                    } else {
                        $first_date = strtotime($bill['date_back']);
                    }
                    $datediff = abs($first_date - $second_date);
                    $days = floor($datediff / (60 * 60 * 24));
                    //tien lai 1 đơn
                    $tong = (int)$days * 2000 * (int)sizeof($num_book);
                    //tiền lãi all
                    $tienlai += $tong;
                }
                //push detail đh vào mảng datail_bill
                array_push($datail_bill, $num_book);

                // $money_back = (int)$money_get + (int)$money_user - (int)$days * 2000 * sizeof($data_detail_book);
            }
        }
        return $this->view("frontend.admin.data_statis", [
            "act_tt" => $act_tt,
            "date_s" => $date_s,
            "date_e" => $date_e,
            "all_bills" => $all_bills,
            "tienlai" => $tienlai,
            "datail_bills" => $datail_bill,
            "status" => $status
        ]);
    }
}
