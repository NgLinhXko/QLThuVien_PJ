<?php
class  AdminController extends BaseController{
    public function __construct()
    {
        //requai  file
        $this->loadModel('AdminModel');
        // khởi tạo đối tượng
        $this->AdminModel = new AdminModel;
        
    }
    public function index(){
        return $this->view("frontend.admin.index");
    }
    public function get_cate(){
        $data_cate = $this-> AdminModel->getALL("categories");
        return $this->view("frontend.admin.data_quanly",[
            "check_act" =>  "cate",
            "data_cates"=> $data_cate
        ]);
    }
    public function delete_cate(){
        $ar = $_POST;
        $data = $this-> AdminModel->  deleteByID("categories",$ar);
        if($data){
            echo "Xóa thành công";
        }else{
            echo "Fail";
        }
        // print_r($ar) ;
        
    }

}
?>