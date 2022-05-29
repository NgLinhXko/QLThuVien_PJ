<?php
class StatistiModel extends BaseModel{
    public function all_bill($date_s,$date_e){
        $sql = "SELECT* from bill where date_borr BETWEEN '$date_s' AND '$date_e'";
        $qr= $this->query($sql);
        $datar = [];
        while ($row = mysqli_fetch_assoc($qr)) {
            array_push($datar, $row);
        }
        return $datar;
    }
}