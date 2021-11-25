<?php
class manageModal extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    
    public function deleteProductManage($id){
        $typesql = "DELETE FROM products WHERE product_id=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
    public function editProductManage($id,$name,$type,$price,$quantity,$detail,$brand,$rating){
        if($id != -1){
            $typesql = "DELETE FROM products WHERE product_id=" . $id . ";";
            $query = $this->_query($typesql);
            $typesql1 = "insert into products (product_id,product_name, product_type, product_price, product_quantity, product_detail, product_brand, product_image)
            values (".$id.",'".$name."', '".$type."', ".$price.", ".$quantity.", '".$detail."', '".$brand."', '".$rating."');";
            $query1 = $this->_query($typesql1);
        }else{
            $typesql1 = "insert into products (product_name, product_type, product_price, product_quantity, product_detail, product_brand, product_image)
            values ('".$name."', '".$type."', ".$price.", ".$quantity.", '".$detail."', '".$brand."', '".$rating."');";
            $query1 = $this->_query($typesql1);
        }
        return $id;
    }
    public function getProductManagePaging($page){
        $skip = (intval($page) - 1) * 5;
        $skipnext = $skip + 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
            $skipnext = 5;
        }
        
        $typesql = "SELECT * FROM products LIMIT ".$skip.", ".$skipnext.";";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    } 
    public function getProductUserPaging($page){
        $skip = (intval($page) - 1) * 5;
        $skipnext = $skip + 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
            $skipnext = 5;
        }
        
        $typesql = "SELECT * FROM member LIMIT ".$skip.", ".$skipnext.";";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    }
    public function deleteUserManage($id){
        $typesql = "DELETE FROM member WHERE member_id=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
    public function editUserManage($id,$Name,$Password,$Email,$Phone,$Avatar){
        if($id != -1){
            $typesql = "DELETE FROM member WHERE member_id=" . $id . ";";
            $query = $this->_query($typesql);
            $typesql1 = "insert into member (member_id,member_name, member_password, member_email, member_phone, member_avatar)
            values (".$id.",'".$Name."', '".$Password."', '".$Email."', ".$Phone.", '".$Avatar."');";
            $query1 = $this->_query($typesql1);
        }else{
            $typesql1 = "insert into member (member_name, member_password, member_email, member_phone, member_avatar)
            values ('".$Name."', '".$Password."', '".$Email."', ".$Phone.", '".$Avatar."');";
            $query1 = $this->_query($typesql1);
        }
        return $id;
    }
    public function getOrderPaging($page){
        $skip = (intval($page) - 1) * 5;
        $skipnext = $skip + 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
            $skipnext = 5;
        }
        
        $typesql = "SELECT * FROM order_product LIMIT ".$skip.", ".$skipnext.";";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    }
    public function deleteOrderManage($id){
        $typesql = "DELETE FROM order_product WHERE order_id=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
}
?>