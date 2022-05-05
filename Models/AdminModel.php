<?php
class AdminModel extends BaseModel{
    public function getALL($table) {
        return $this-> get_all($table);
    }
    public function deleteByID($table,$ar){
        return $this-> delete_ID($table,$ar);
    }

}
?>