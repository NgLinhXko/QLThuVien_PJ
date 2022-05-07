<?php
class  AdminController extends BaseController
{
    public function __construct()
    {
        //requai  file
        $this->loadModel('AdminModel');
        // khởi tạo đối tượng
        $this->AdminModel = new AdminModel;
    }
    public function index()
    {
        $categories = $this->AdminModel->getALL("categories");
        return $this->view(
            "frontend.admin.index",
            [
                "categories" => $categories
            ]
        );
    }
    public function get_data()
    {
        $table = $_POST['table'];
        $datas = $this->AdminModel->getALL($table);
        // $count = $this->AdminModel->(,...)
        return $this->view("frontend.admin.table_data", [
            "check_act" =>  $table,
            "datas" => $datas

        ]);
    }

    //thêm dữ liệu
    public function add_all()
    {
        $data_get = $_POST;
        if (isset($_FILES['img_b']['name'])) {
            $anhchinh = $_FILES['img_b']['name']; //tên file ảnh
            $tempname = $_FILES["img_b"]["tmp_name"]; //ổ ảo
            $folder = $_SERVER['DOCUMENT_ROOT'] . "/QLThuVien_PJ/public/images/" . $anhchinh; //thư mục chuyển ảnh vào
            move_uploaded_file($tempname, $folder); //chuyển file vào ổ(tên ổ,thư mục chuyển)
            array_pop($data_get); //xóa phần tử cuối cùng của mảng
            $data_get['img_b'] = $anhchinh;
            $data_get['table'] = "books";
        }
        // print_r($data_get);
        $table = array_pop($data_get); //xóa tên bảng
        $data = $this->AdminModel->add_data($table, $data_get);
        echo $data;
        // print_r($data_get);
    }
    public function update_all()
    {
        $data_get = $_POST;
        $table = array_pop($data_get); //xóa tên bảng
        $id = reset($data_get);
        $ar = [];
        $ar[array_keys($data_get)[0]] = $id;
        $data = $this->AdminModel->update_data($table, $ar, $data_get);
    }
    public function delete_all()
    {
        $data = [];
        $table = $_POST['table'];
        if ($table == "categories") {
            $data['id_cate'] = $_POST['id'];
        }
        if ($table == "book") {
            $data['id_b'] = $_POST['id'];
        }
        $datas = $this->AdminModel->deleteByID($table, $data);
        print_r($datas);
    }
    public function load_update()
    {
        $data = [];
        $table = $_POST['table'];
        if ($table == "categories") {
            $data['id_cate'] = $_POST['id'];
        }
        if ($table == "book") {
            $data['id_b'] = $_POST['id'];
        }
        $datas = $this->AdminModel->load_update($table, $data);
        echo json_encode($datas);
    }
}
