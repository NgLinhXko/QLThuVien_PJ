<?php
class CartController extends BaseController
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
        return $this->view('frontend.customer.cart', [
            "all_cates" => $all_cate,
            "all_nxbs" => $all_nxb,
        ]);
    }
    //thêm gh
    public function add_cart()
    {
        $data = [];
        if (isset($_POST['id_b'])) {
            $id_b = $_POST['id_b'];
            $dem = 0;
        }
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i][0]['id_b'] == $id_b) {
                $dem = 1;
            }
        }
        if ($dem == 1) {
            $string = "Sản phẩm đã có trong giỏ hàng";
        }
        if ($dem == 0) {
            $data_book = $this->AdminModel->load_update(self::BOOKS, ["id_b" => $id_b]);
            array_push($_SESSION['cart'], $data_book);
            $string = "Thêm thành công";
        }
        // array_push($data, $string);
        // array_push($data, sizeof($_SESSION['cart']));
        echo $string;
    }
    //slg sp in cart
    public function number_cart()
    {
        echo sizeof($_SESSION['cart']);
    }
    //view giỏ hàng
    public function view_cart()
    {
        $actions = $_POST['actions'];
        return $this->view("frontend.customer.data_cart", [
            "actions" => $actions
        ]);
        // print_r($_SESSION['cart']);
    }
    //xoa all gh
    public function delete_cart()
    {
        $_SESSION['cart'] = [];
        echo "Xóa giỏ hàng thành công";
    }
    public function check_cart()
    {
        return sizeof($_SESSION['cart']);
    }
    //xoa theo id
    public function delete_cart_id()
    {
        $id_b = $_POST['id_b'];
        array_splice($_SESSION['cart'], $id_b, 1);
        echo 'Xóa thành công';
    }
    //chcek slg in db
    public function check_slbook()
    {
        $id_b = $_POST['id_b'];
        $data_book = $this->AdminModel->load_update(self::BOOKS, ["id_b" => $id_b]);
        echo ($data_book[0]['quantity_b']);
    }
}
