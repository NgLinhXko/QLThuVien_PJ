<?php
class LoginModel extends BaseModel{
    const TABLE = "USERS";
    public function checkEmail($data){
        return $this-> find(self::TABLE,$data);
    }

    public function add_user($data){
        return $this-> create(self::TABLE,$data);
    }
}

?>