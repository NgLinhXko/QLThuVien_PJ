<?php
class BaseModel extends Database
{
  // // protected $connect;
  // public function __construct()
  // {
  //     $this->connect = $this->connect();
  // }
  // ///3-----gọi all thì sẽ có được câu truy vấn sql
  // //lay all data
  // public function all($table, $select = ['*'], $orderBys = [], $limit = 15)
  // {
  //     $column = implode(',', $select);
  //     //chuyển từ mảng sang chuỗi cách nhau 1 dấu , => lấy ra danh sách các cột

  //     $orderByString = implode(',', $orderBys);

  //     if ($orderByString) {
  //         $sql = "SELECT ${column} FROM ${table} ORDER BY name_cate desc LIMIT ${limit}";
  //     } else {
  //         $sql = "SELECT ${column} FROM ${table} LIMIT ${limit}";
  //     }

  //     $query = $this->_query($sql);

  //     $data = [];
  //     //lấy ra danh sách bản ghi
  //     while ($row = mysqli_fetch_assoc($query)) {
  //         //mỗi lần push, push vào mảng data 1 giá trị là row
  //         array_push($data, $row);
  //     }
  //     return $data;
  // }
  // public function get_all($table)
  // {

  //   $sql = "SELect * from $table ";
  //   $query = $this->_query($sql);
  //   $ar = [];
  //   while ($row = mysqli_fetch_assoc($query)) {
  //     array_push($ar, $row);
  //   }
  //   return  $ar;
  // }
  // // public function all($table)
  // // {
  // //   
  // //     $sql = "SELECT * FROM $table";
  // //     $query = $this->_query($sql);

  // //     $data = [];
  // //     //lấy ra danh sách bản ghi
  // //     while ($row = mysqli_fetch_assoc($query)) {
  // //         //mỗi lần push, push vào mảng data 1 giá trị là row
  // //         array_push($data, $row);
  // //     }
  // //     return $data;
  // // }
  //lay ra ban ghi theo id loadupdate
  public function find($table, $id)
  {
    foreach ($id as $key => $val) {
      $where = $key . '=' . "'$val'";
    }
    $sql = "SELECT * FROM ${table} WHERE ${where}";
    $query = $this->query($sql);

    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
      array_push($data, $row);
    }
    return $data;
  }


  // //them data
  public function create($table, $data = [])
  {
    //tách lấy các thuộc tính của table
    $column = implode(',', array_keys($data));
    //convert values có định dạng 'hi'
    $newValues = array_map(function ($values) {
      return "'" . $values . "'";
    }, array_values($data));
    $newValues = implode(',', $newValues);
    $sql = "INSERT INTO ${table}(${column}) VALUES(${newValues})";
    $query = $this->query($sql);
    if ($query) {
      return "Thêm thành công";
    } else {
      "Thêm thất bại";
    }
  }
  //sua data book
  public function update($table, $id, $data = [])
  {
    foreach ($id as $key => $val) {
      $where = $key . '=' . "'$val'";
    }
    $dataSets = [];
    foreach ($data as $key => $val) {
      array_push($dataSets, "${key} = '" . $val . "'");
    }
    //nối các phần tử mảng thành một chuỗi kết quả
    $dataSetString = implode(',', $dataSets);
    $sql = "UPDATE ${table} SET ${dataSetString} WHERE $where";
    print_r($sql);
    $this->query($sql);
  }
  // //sua data cate
  // public function updateCate($table, $id, $data)
  // {
  //     $dataSets = [];
  //     foreach ($data as $key => $val) {
  //         array_push($dataSets, "${key} = '" . $val . "'");
  //     }
  //     //nối các phần tử mảng thành một chuỗi kết quả
  //     $dataSetString = implode(',', $dataSets);
  //     $sql = "UPDATE ${table} SET ${dataSetString} WHERE id_cate = ${id}";
  //     $this->_query($sql);
  // }
  // //xoa data book
  // public function delete($table, $id)
  // {
  //   $sql = "DELETE FROM ${table} where id_b = ${id}";
  //   $this->query($sql);
  // }
  //xoa data cate
  public function deleteAll($table, $id)
  {
    foreach ($id as $key => $val) {
      $where = $key . '=' . "'$val'";
    }
    $sql = "DELETE from $table where $where ";
    print_r($sql);
    $query = $this->query($sql);
    if ($query) {
      return "Xóa thành công";
    } else {
      "Xóa thất bại";
    }
  }
  ////4----sau khi có được câu sql thì phải thực hiện truy vấn 
  public function __construct()
  {
    $this->connect = $this->connect();
  }
  public function get_all($table)
  {

    $sql = "SELect * from $table ";
    $query = $this->query($sql);
    $ar = [];
    while ($row = mysqli_fetch_assoc($query)) {
      array_push($ar, $row);
    }
    return  $ar;
  }
  public function query($sql)
  {
    return mysqli_query($this->connect, $sql);
  }
  public function delete_ID($table, $ar)
  {
    foreach ($ar as $key => $val) {
      $where = $key . '=' . "'$val'";
    }
    $sql = "DELETE from $table where $where ";
    $query = $this->query($sql);
    //echo $sql;
    if ($query) {
      return true;
    } else {
      return false;
    }
  }
}
