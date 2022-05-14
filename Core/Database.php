<?php
class Database
{
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = 'ngoclinh741';
    const DB_NAME = 'db_qltv_u';
    // const URL = "http://localhost:88/QLthuVien_PJ/index.php?";
    // URL: =
    private  $connect;
    public function connect()
    {
        $connect = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DB_NAME);
        mysqli_set_charset($connect, "utf8");
        if (mysqli_connect_errno() == 0) {
            return $connect;
        }
        return false;
    }
}
