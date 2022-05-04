<?php

//tên class giống tên file
class CategoriesController extends BaseController
{
    private $categoriesModel;
    public function __construct()
    {
        $this->loadModel('CategoriesModel');
        $this->categoriesModel = new CategoriesModel;
    }
    ///1---------------đứng từ controller gọi đến getAll từ CategoriesModel
    public function index()
    {
        return $this->view("frontend.categories.index");
    }
    public function get_cate()
    {
        $selectColumn = ['id_cate', 'name_cate'];
        $orders =  ['column' => 'idne', 'order' => 'desc'];
        $pageTitle = 'Danh sách các thể loại';
        $categories = $this->categoriesModel->getAll(
            $selectColumn,
            $orders

        );
        return $this->view("frontend.categories.table_cate", [
            "check_act" =>  "cate",
            'categories' => $categories,
            'pageTitle' => $pageTitle,

        ]);
    }
    public function update()
    {
        $id = $_GET["id"];
        $data = $_POST;
        $this->categoriesModel->updateData($id, $data);
    }
    // public function index()
    // {

    //     $pageTitle = 'Danh sách các thể loại';
    //     $categories = $this->categoriesModel->getAll();
    //     return $this->view("frontend.categories.index", [
    //         'categories' => $categories,
    //         'pageTitle' => $pageTitle,

    //     ]);
    // }
    //chi tiet
    public function show()
    {
        $category =  $this->categoriesModel->findById(1);
        return $this->view("frontend.categories.show", [
            'category' => $category
        ]);
    }
    public function load_update()
    {
        $id = $_GET["id"];
        $data = $this->categoriesModel->findById($id);
        echo json_encode($data);
    }
    //xoa
    public function delete()
    {
        $id = $_POST;
        $this->categoriesModel->destroy($id);
    }
    //them
    public function store()
    {
        $data = $_POST;
        $this->categoriesModel->store($data);
    }
}
