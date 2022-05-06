<?php
class LoginModel extends BaseModel{
    const TABLE = "USERS";
    public function checkEmail($data){
        return $this-> find(self::TABLE,$data);
    }
}

?>