<?php
class ManagebillModel extends BaseModel{
    public function data_bill($act){
        $sql = "SELECT * from bill,users where bill.id_u = users.id_u and bill.status = $act order by id_bi DESC";
        $qr = $this->query($sql);
        if(mysqli_num_rows($qr)>0){
            $data=[];
            while($row=mysqli_fetch_assoc($qr)){
                array_push($data,$row);
            }
        }else{
            $data=[];
        }
        return $data;

    }
    public function  count_bill($i){
        $sql = "SELECT Count(id_bi) as SL from bill where status = $i";
        $qr = $this->query($sql);
        return mysqli_fetch_assoc($qr)['SL'];
    }
    public function update_bill($status,$id_bi){
        $sql = "UPDATE bill set status = $status where id_bi = $id_bi";
        $qr = $this->  query($sql);
        if($qr){
            return "thành công";
        }else{
            return "thất bại";
        }
    }
    public function data_detail($id_bi){
        $sql = "SELECT * FROM books,bill,categories,detailbill,users 
        where bill.id_bi = detailbill.id_bi and books.id_b = detailbill.id_b 
        and books.id_cate = categories.id_cate and bill.id_u=users.id_u AND bill.id_bi = $id_bi";
        $qr = $this-> query($sql);
        $data = [];
        while($row=mysqli_fetch_assoc($qr)){
            array_push($data,$row);
        }
        return $data;
    }
    public function data_bi_user($id_bi){
        $sql = "SELECT * from bill,users where bill.id_u = users.id_u and id_bi = $id_bi";
        $qr = $this-> query($sql);
        return mysqli_fetch_assoc($qr);
    }
    public function data_detail_book($id_bi){
        $sql = "SELECT * FROM books,detailbill,categories
        where  books.id_b = detailbill.id_b 
        and books.id_cate = categories.id_cate AND detailbill.id_bi = $id_bi";
        $qr = $this-> query($sql);
        $data = [];
        while($row=mysqli_fetch_assoc($qr)){
            array_push($data,$row);
        }
        return $data;
    }
    public function update_quantity_b($sl,$id_b){
        $sql = "UPDATE Books SET quantity_b = $sl where id_b = $id_b";
        $this -> query($sql);
        
    }
}
?>