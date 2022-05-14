<?php
class CustomerModel extends BaseModel{
    const BOOKS= "books";
    public function get_topBorr($table, $column, $order,$limit){
        return $this ->slt_orderby($table, $column, $order,$limit);
    }
}