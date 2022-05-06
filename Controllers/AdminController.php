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
        $categories = $this->AdminModel->getALL("categories");
        return $this->view("frontend.admin.index",
        [
            "categories"=>$categories
        ]
    );
    }
    public function get_data(){
        $table = $_POST['table'];
        $datas = $this-> AdminModel->getALL($table);
        return $this->view("frontend.admin.table_data",[
            "check_act" =>  $table,
            "datas"=> $datas
        ]);
    }

    //thêm dữ liệu
    public function add_all(){
        $data_get = $_POST;
        if (isset($_FILES['img_b']['name'])) {
            $anhchinh = $_FILES['img_b']['name'];
            $tempname = $_FILES["img_b"]["tmp_name"];
            $folder = $_SERVER['DOCUMENT_ROOT'] . "/QLThuVien_PJ/public/images/" . $anhchinh;
            move_uploaded_file($tempname, $folder);
            array_pop($data_get);
            $data_get['img_b'] = $anhchinh;
            $data_get['table'] = "books";
        }
        // print_r($data_get);
        $table = array_pop($data_get);
        $data = $this-> AdminModel-> add_data($table,$data_get);
        echo $data;
        // print_r($data_get);
    }

    public function delete_all(){
        $table = $_POST['table'];
        $ar = [];
        if($table == "categories"){
            $ar['id_cate'] = $_POST['id'];
        }
        print_r($ar);
    }

}
