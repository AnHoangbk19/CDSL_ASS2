<?php
require_once "./mvc/core/basehref.php";
class manageModal extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    
    public function deleteBranchManage($id){
        $typesql = "DELETE FROM branch WHERE Number=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
    public function editBranchManage($id, $ID_Branch,$Name_Branch,$Location_Branch,$Phone_Branch,$Manage_ID_Branch){
        if($id != -1){
            $typesql1 = "UPDATE branch
            SET Name = '".$Name_Branch."', Location= '".$Location_Branch."', Phone = '".$Phone_Branch."', Manager_ID = '".$Manage_ID_Branch."'
            WHERE Number = ".$ID_Branch.";";
            if (!$this->_query($typesql1)) {
                return "<script>
                    alert(\"Error: ".mysqli_error($this->connect)."\");
                    location.href = '".geturl()."/manage/viewBranchAll';
                </script>";
            }
        }else{
            $typesql1 = "CALL Add_Branch(".$ID_Branch.", '".$Name_Branch."', '".$Location_Branch."', '".$Phone_Branch."', '".$Manage_ID_Branch."');";
            if (!$this->_query($typesql1)) {
                return "<script>
                    alert(\"Error: ".mysqli_error($this->connect)."\");
                    location.href = '".geturl()."/manage/viewBranchAll';
                </script>";
            }
        }
        return "";
    }
    public function getviewBranch($quantity){
        $typesql = "CALL Check_Quantity_Employee(".$quantity.");";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    } 
    public function getviewBranchName($Name){
        $typesql = "SELECT * FROM branch WHERE Name = '".$Name."';";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    } 
    public function getviewBranchAll(){
        $typesql = "SELECT * FROM branch;";
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