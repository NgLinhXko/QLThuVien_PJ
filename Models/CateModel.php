<?php
class CateModel extends BaseModel
{

    public function data_cate($id_cate, $column, $order, $start)
    {
        $sql = "SELECT * from books,categories where books.id_cate = categories.id_cate 
        and books.id_cate = $id_cate order by  $column $order limit $start,8 ";
        $query = $this->query($sql);

        $ar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($ar, $row);
        }

        return $ar;
    }
    public function data_search($val_search, $column, $order, $start)
    {
        $sql = "SELECT * from books,categories where books.id_cate = categories.id_cate 
        and name_b like '%$val_search%' order by  $column $order limit $start,8 ";
        $query = $this->query($sql);

        $ar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($ar, $row);
        }

        return $ar;
    }
    public function total_book_cate($id_cate)
    {
        $sql = "SELECT * from books,categories where books.id_cate = categories.id_cate and books.id_cate = $id_cate";
        $query = $this->query($sql);
        return mysqli_num_rows($query);
    }
    public function total_book_search($name_b)
    {
        $sql = "SELECT * from books,categories where books.id_cate = categories.id_cate and name_b like '%$name_b%'";
        $query = $this->query($sql);
        return mysqli_num_rows($query);
    }
}
