<?php
class AdminModel extends BaseModel{
    //lấy data về (SELECT *From tabel)
    public function getALL($table) {
        return $this-> get_all($table);
    }
    //add data INSERT INTO $table($colum) values($data)
    public function add_data($table,$data){
        return $this -> create($table,$data);
    }
    public function deleteByID($table,$ar){
        return $this-> delete_ID($table,$ar);
    }

}
?>