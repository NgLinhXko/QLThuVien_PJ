<?php
//tên class giống tên file
class BookController extends BaseController
{
    private $bookModel;
    public function __construct()
    {
        $this->loadModel('BookModel');
        $this->bookModel = new BookModel;
    }
    public function index()
    {
        return $this->view("frontend.categories.index");
    }
    public function get_book()
    {
        $pageTitle = "Sách theo thể loại";
        $books = $this->bookModel->getAll(['*']);
        return $this->view(
            "frontend.books.table_book",
            [
                "check_act" =>  "book",
                'books' => $books,
                'pageTitle' => $pageTitle
            ]
        );
    }
    //chi tiet
    public function show()
    {
        $id = $_GET['id'];
        $book = $this->bookModel->findById($id);
        echo '<pre>';
        print_r($book);
        // return $this->view("frontend.books.show", [
        //     'books' => $book,
        // ]);
    }
    //them
    public function store()
    {
        $data = [
            'name_b' => 'Giải Tích 2',
            'price_b' => 40000,
            'nxb_b' => 'NXB Đại Học Quốc gia',
            'year_b' => '2022-05-02',
            'page_b' => 300,
            'des_b' => 'Sách toán giải tích 2',
            'quantity_b' => 20,
            'numBorr' => 5,
            'img_b' => './images/giaitich11.jpg',
            'img1_b' => './images/giaitich12.jpg',
            'id_cate' => 2
        ];
        $this->bookModel->store($data);
    }
    public function update()
    {
        $id = $_GET['id'];
        $data = [
            'name_b' => 'Giải Tích 2 data update',
            'price_b' => 40000,
            'nxb_b' => 'NXB Đại Học Quốc gia',
            'year_b' => '2022-05-02',
            'page_b' => 300,
            'des_b' => 'Sách toán giải tích 2',
            'quantity_b' => 20,
            'numBorr' => 5,
            'img_b' => './images/giaitich11.jpg',
            'img1_b' => './images/giaitich12.jpg',
            'id_cate' => 2
        ];
        $this->bookModel->updateData($id, $data);
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->bookModel->destroy($id);
    }
}
