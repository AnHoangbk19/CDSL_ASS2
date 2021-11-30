<?php
require_once "./mvc/core/basehref.php";
class OrderModel extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    
    public function deleteBranchManage($id){
        $typesql = "DELETE FROM includes WHERE Onum=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
    public function getviewBranchName($Name){
        $typesql = "SELECT * FROM includes I, food_order O WHERE I.Onum = O.Number AND Dname = '".$Name."';";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    } 
    public function getviewBranchAll(){
        $typesql = "SELECT * FROM includes I, food_order O WHERE I.Onum = O.Number;";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    }
    
}
?>