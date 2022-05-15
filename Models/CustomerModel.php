<?php
class CustomerModel extends BaseModel
{
    const BOOKS = "books";
    public function get_topBorr($table, $column, $order, $limit)
    {
        // return $this ->slt_orderby($table, $column, $order,$limit);
        $sql = "SELECT * from books, categories where books.id_cate = categories.id_cate order by $column $order limit 0,$limit";
        $query = $this->query($sql);
        $ar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($ar, $row);
        }
        return  $ar;
    }
    public function random_book($table, $column, $order, $limit)
    {
        // return $this ->slt_orderby($table, $column, $order,$limit);
        $sql = "SELECT * from books, categories where books.id_cate = categories.id_cate order by $column $order  0,$limit";
        $query = $this->query($sql);
        $ar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($ar, $row);
        }
        return  $ar;
    }
}
