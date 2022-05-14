<?php
class AdminModel extends BaseModel
{
    //lấy data về (SELECT *From tabel)
    public function getALL($table)
    {
        return $this->get_all($table);
    }
    //add data INSERT INTO $table($colum) values($data)
    public function add_data($table, $data)
    {
        return $this->create($table, $data);
    }
    public function deleteByID($table, $ar)
    {
        return $this->deleteAll($table, $ar);
    }
    public function getById($table, $ar)
    {
        return $this->get_all($table, $ar);
    }
    public function load_update($table, $ar)
    {
        return $this->find($table, $ar);
    }
    public function update_data($table, $ar, $data)
    {
        return $this->update($table, $ar, $data);
    }
    public function search_data($table, $data)
    {
        return $this->search_($table, $data);
    }
    public function get_cate()
    {
        $sql = "SELECT categories.id_cate,name_cate,(SELECT COUNT(id_b) FROM books
         where id_cate =  categories.id_cate) as SLuong from categories";
        $query = $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
    }
    public function get_cate_search($data)
    {
        $sql = "SELECT categories.id_cate,name_cate,(SELECT COUNT(id_b) FROM books
         where id_cate =  categories.id_cate) as SLuong from categories where name_cate like '%$data%'";
        $query = $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
    }
    public function check_name($data)
    {
        $sql = "SELECT * from categories where name_cate like '$data' ";
        $query = $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
    }
}
