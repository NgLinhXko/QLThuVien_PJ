<?php
class ProductModel extends BaseModel
{

    public function book_by_id($id)
    {
        $sql = "SELECT * from books,categories where books.id_cate = categories.id_cate and id_b = $id";
        $query = $this->query($sql);
        return mysqli_fetch_assoc($query);
    }
    public function data_nxb($name_nxb)
    {
        $sql = "SELECT  name_cate, COUNT(books.id_cate) as SL FROM books,categories 
        where books.id_cate=categories.id_cate and nxb_b LIKE '$name_nxb' 
        GROUP BY books.id_cate,name_cate";
        $query = $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
    }
    public function  book_by_cate($name_cate)
    {
        $sql = "SELECT * from books,categories where books.id_cate = categories.id_cate and name_cate like '$name_cate'";
        $query = $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
    }
    public function cate_book()
    {
        $sql = "SELECT categories.id_cate,name_cate,(SELECT COUNT(id_b) FROM books
        where id_cate =  categories.id_cate) as SLuong from categories order by SLuong DESC";
        $query = $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
    }
}
