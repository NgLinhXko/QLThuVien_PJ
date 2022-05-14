<?php
class LoginModel extends BaseModel
{
    const TABLE = "USERS";
    public function checkEmail($data)
    {
        return $this->find(self::TABLE, $data);
    }

    public function add_user($data)
    {
        return $this->create(self::TABLE, $data);
    }
    public function find_acc($table, $email,$pass){
        $sql = "SELECT * from users where email_u = '$email' and pass_u = '$pass'";
        $query = $this->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
          array_push($data, $row);
        }
        return $data;
        // echo $sql;
    }
}
