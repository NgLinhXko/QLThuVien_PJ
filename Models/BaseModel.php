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

  //getdata view
  public function slt_orderby($table, $column, $order, $limit)

  {
    $sql = "SELECT * from $table order by $column $order limit 0,$limit";
    $query = $this->query($sql);
    $ar = [];
    while ($row = mysqli_fetch_assoc($query)) {
      array_push($ar, $row);
    }
    return  $ar;
  }
  //lay ra ban ghi theo id loadupdate
  public function find($table, $id)
  {

    foreach ($id as $key => $val) {
      $where = $key . '=' . "'$val' ";
    }
    $sql = "SELECT * FROM ${table} WHERE ${where}";
    $query = $this->query($sql);

    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
      array_push($data, $row);
    }
    return $data;
    // echo $sql
    // print_r($sql);
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
      return "Thêm thất bại";
    }
    // echo $sql;
  }

  //sua data
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
    $query = $this->query($sql);
    if ($query) {
      return "Update thành công.";
    } else {
      return "Update thất bại";
    }
  }

  //tim kiem
  public function search_($table, $data, $start)
  {
    foreach ($data as $key => $val) {
      $where = $key . ' like ' . "'%$val%'";
    }
    $sql = "SELECT * FROM ${table} WHERE ${where} limit $start,10";
    // echo $sql;
    $query = $this->query($sql);
    $datar = [];
    while ($row = mysqli_fetch_assoc($query)) {
      array_push($datar, $row);
    }
    return $datar;
  }


  //xoa
  public function deleteAll($table, $id)
  {
    foreach ($id as $key => $val) {
      $where = $key . '=' . "'$val'";
    }
    $sql = "DELETE from $table where $where ";
    $query = $this->query($sql);
    if ($query) {
      return "Xóa thành công";
    } else {
      return "Xóa thất bại";
    }
  }

  //select all
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

  // public function slt_orderby($table, $column, $order,$start,$limit)


  //get user
  public function get_user()
  {

    $sql = "SELECT * FROM users EXCEPT SELECT * from users WHERE status = 2 ";
    $query = $this->query($sql);
    $ar = [];
    while ($row = mysqli_fetch_assoc($query)) {
      array_push($ar, $row);
    }
    return  $ar;
  }


  //delete_ID
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

  ////4----sau khi có được câu sql thì phải thực hiện truy vấn 
  public function __construct()
  {
    $this->connect = $this->connect();
  }
  public function query($sql)
  {
    return mysqli_query($this->connect, $sql);
  }
}
