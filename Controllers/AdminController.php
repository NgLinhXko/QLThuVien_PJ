<?php
class  AdminController extends BaseController
{
    public function __construct()
    {
        //requai  file
        if (isset($_SESSION['email'])) {
            $this->loadModel('AdminModel');
            // khởi tạo đối tượng
            $this->AdminModel = new AdminModel;
        }else{
            header("Location: http://localhost:81/Project/QLThuVien_Pj/index.php");
        }
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
        if($table == "categories"){
            $datas = $this-> AdminModel -> get_cate();
        }else{
            $datas = $this->AdminModel->getALL($table);
        }
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
        $table1 = $_POST['table'];
        if ($table1 == "books") {
            if (isset($_FILES['img_b']['name']) && $_FILES['img_b']['name'] != "") {
                $anhchinh = $_FILES['img_b']['name']; //tên file ảnh
                $tempname = $_FILES["img_b"]["tmp_name"]; //ổ ảo
                $folder = $_SERVER['DOCUMENT_ROOT'] . "/QLThuVien_PJ/public/images/" . $anhchinh; //thư mục chuyển ảnh vào
                move_uploaded_file($tempname, $folder); //chuyển file vào ổ(tên ổ,thư mục chuyển)
                array_pop($data_get); //xóa phần tử cuối cùng của mảng
                $data_get['img_b'] = $anhchinh;
                $data_get['table'] = "books";
            }
        }
        if ($table1 == "users") {
            
            if (isset($_FILES['avatar_u']['name'])&&$_FILES['avatar_u']['name'] != "") {
                $anhchinh = $_FILES['avatar_u']['name']; //tên file ảnh
                $tempname = $_FILES["avatar_u"]["tmp_name"]; //ổ ảo
                $folder = $_SERVER['DOCUMENT_ROOT'] . "/QLThuVien_PJ/public/images/" . $anhchinh; //thư mục chuyển ảnh vào
                move_uploaded_file($tempname, $folder); //chuyển file vào ổ(tên ổ,thư mục chuyển)
                array_pop($data_get); //xóa phần tử cuối cùng của mảng
                $data_get['avatar_u'] = $anhchinh;
                $data_get['table'] = "users";
            }
        }
        $table = array_pop($data_get); //xóa tên bảng
        $data = $this->AdminModel->add_data($table, $data_get);
        echo $data;
        // print_r($data_get);
    }
    public function update_all()
    {
        $data_get = $_POST;
        
        $table = array_pop($data_get); //xóa tên bảng
        if ($table == "books") {
            if (isset($_FILES['img_b']['name']) && $_FILES['img_b']['name'] != "" ) {
                $anhchinh = $_FILES['img_b']['name']; //tên file ảnh
                $tempname = $_FILES["img_b"]["tmp_name"]; //ổ ảo
                $folder = $_SERVER['DOCUMENT_ROOT'] . "/QLThuVien_PJ/public/images/" . $anhchinh; //thư mục chuyển ảnh vào
                move_uploaded_file($tempname, $folder); //chuyển file vào ổ(tên ổ,thư mục chuyển)
                array_pop($data_get); //xóa phần tử cuối cùng của mảng
                $data_get['img_b'] = $anhchinh;
            }
        }
        if ($table == "users") {
            if (isset($_FILES['avatar_u']['name']) && $_FILES['avatar_u']['name'] != "") {
                $anhchinh = $_FILES['avatar_u']['name']; //tên file ảnh
                $tempname = $_FILES["avatar_u"]["tmp_name"]; //ổ ảo
                $folder = $_SERVER['DOCUMENT_ROOT'] . "/QLThuVien_PJ/public/images/" . $anhchinh; //thư mục chuyển ảnh vào
                move_uploaded_file($tempname, $folder); //chuyển file vào ổ(tên ổ,thư mục chuyển)
                array_pop($data_get); //xóa phần tử cuối cùng của mảng
                $data_get['avatar_u'] = $anhchinh;
            }
        }
        $id = reset($data_get);
        $ar = [];
        $ar[array_keys($data_get)[0]] = $id;
        $data = $this->AdminModel->update_data($table, $ar, $data_get);
        echo $data;
    }
    public function search_all()
    {
        $table = $_POST['table'];
        $data = $_POST['data'];
        $data_s = [];
        if ($table == "categories") {
            $data_s['name_cate'] = $data;
            $datas = $this->AdminModel->get_cate_search($data);
        }
        if ($table == "books") {
            $data_s['name_b'] = $data;
            $datas = $this->AdminModel->search_data($table, $data_s);
        }
        if ($table == "users") {
            $data_s['name_u'] = $data;
            $datas = $this->AdminModel->search_data($table, $data_s);
        }
        // $datas = $this->AdminModel->search_data($table, $data_s);
        return $this->view("frontend.admin.table_data", [
            "check_act" =>  $table,
            "datas" => $datas
        ]);
    }
    public function delete_all()
    {
        $data = [];
        $table = $_POST['table'];
        if ($table == "categories") {
           
            $data['id_cate'] = $_POST['id'];
        }
        if ($table == "books") {
            $data['id_b'] = $_POST['id'];
        }
        if ($table == "users") {
            $data['id_u'] = $_POST['id'];
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
        if ($table == "books") {
            $data['id_b'] = $_POST['id'];
        }
        if ($table == "users") {
            $data['id_u'] = $_POST['id'];
        }

        $datas = $this->AdminModel->load_update($table, $data);
        echo json_encode($datas);
    }
    public function check_name_cate(){
        $name_cate = $_POST['name_cate'];
        $datas = $this-> AdminModel -> check_name($name_cate);
        echo sizeof($datas);
    }
}
