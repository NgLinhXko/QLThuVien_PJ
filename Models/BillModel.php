<?php
class BillModel extends BaseModel
{
    public function data_bill($id_u,$act)
    {
        $sql = "SELECT * from bill where id_u = $id_u  and status=$act ";

        $query = $this->query($sql);
        $ar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($ar, $row);
        }
        return $ar;
    }
    public  function detail_bill($id_bi)
    {
        $sql = "SELECT*from  books ,detailbill,categories ,bill
          where books.id_b=detailbill.id_b and bill.id_bi =detailbill.id_bi and  categories.id_cate=books.id_cate and detailbill.id_bi=$id_bi";
        $query = $this->query($sql);
        $ar = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($ar, $row);
        }
        return $ar;
    }
    public function count_bill($i,$id_u){
        $sql = "SELECT Count(id_bi) as SL from bill where status = $i and id_u = $id_u";
        $qr = $this->query($sql);
        return mysqli_fetch_assoc($qr)['SL'];
    }
}
