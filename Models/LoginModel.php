<?php
class LoginModel extends BaseModel
{
    const TABLE = "USERS";
    public function checkEmail($email_u)
    {
        // return $this-> find(self::TABLE,$data);
        $sql = "SELECT * from users where email_u = '$email_u' and status = 1";
        $query = $this->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
    }
    public function checkEmail_all($email_u)
    {
        // return $this-> find(self::TABLE,$data);
        $sql = "SELECT * from users where email_u = '$email_u'";
        $query = $this->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
        echo $sql;
    }

    public function add_user($data)
    {
        return $this->create(self::TABLE, $data);
    }
    public function find_acc($table, $email, $pass)
    {
        $sql = "SELECT * from users where email_u = '$email' and pass_u = '$pass' ";
        $query = $this->query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }
        return $data;
        // echo $sql;
    }
    public function update_code($email, $code)
    {
        $sql = "Update Users set code = $code where email_u = '$email'";
        $query = $this->query($sql);
        if ($query) {
            echo '1';
        } else {
            echo '0';
        }
    }
    public function check_code($email, $code)
    {
        $sql = "SELECT count(id_u) as SL from Users where email_u = '$email' and code = $code";
        $query = $this->query($sql);
        return mysqli_fetch_assoc($query)['SL'];
    }
    public function change_pass($email, $pass)
    {
        $sql = "Update users set pass_u = '$pass' where email_u = '$email'";
        $query = $this->query($sql);
        if ($query) {
            echo 'Thay đổi mật khẩu thành công';
        } else {
            echo 'Đổi mật khẩu thất bại';
        }
    }
}
