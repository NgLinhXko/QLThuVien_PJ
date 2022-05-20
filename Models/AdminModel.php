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
    public function search_data($table, $data, $start)
    {
        return $this->search_($table, $data, $start);
    }
    public function get_cate($start)
    {
        $sql = "SELECT categories.id_cate,name_cate,(SELECT COUNT(id_b) FROM books
         where id_cate =  categories.id_cate) as SLuong from categories order by id_cate limit $start,10";
        $query = $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
    }
    public function get_cate_search($data, $start)
    {
        $sql = "SELECT categories.id_cate,name_cate,(SELECT COUNT(id_b) FROM books
         where id_cate =  categories.id_cate) as SLuong from categories where name_cate 
         like '%$data%' order by id_cate limit $start,10";
        $query = $this->query($sql);
        if($query){
            $datar = [];
            while ($row = mysqli_fetch_assoc($query)) {
                array_push($datar, $row);
            }
            return $datar;
        }else{
            return false;
        }
      
    }
    public function check_name($data)
    {
        $sql = "SELECT * from categories where name_cate like '$data' ";
        $query = $this->query($sql);
        $datar = [];
        //if
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
        //else
    }
    public function pagination($table, $colum, $start,)
    {
        if ($table == "users") {
            $sql = "SELECT * from $table where status = 1 order by $colum DESC limit $start,10";
        } else {
            $sql = "SELECT * from $table order by $colum DESC limit $start,10";
        }

        $query = $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
    }
    public function total_page($table)
    {
        $sql = "SELECT * from $table";
        $query = $this->query($sql);
        $total_row = mysqli_num_rows($query);
        return ceil($total_row / 10);
    }
    public function total_page_search($table, $arr)
    {
        foreach ($arr as $key => $val) {
            $where = $key . ' like ' . "'%$val%'";
        }
        $sql = "SELECT * from $table where  $where ";
        $query = $this->query($sql);
        $total_row = mysqli_num_rows($query);
        return ceil($total_row / 10);
    }
    public function all_nxb()
    {
        $sql = "SELECT nxb_b FROM `books` GROUP by nxb_b";
        $query = $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($datar, $row);
        }
        return $datar;
    }
}
