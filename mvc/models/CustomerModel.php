<?php
    require_once "./mvc/core/basehref.php";
    class CustomerModel extends db{
        private function _query($sql)
        {
            return mysqli_query($this->connect, $sql);
        }

        public function getviewCustomerAll(){
            $typesql = "SELECT * FROM customer;";
            $query1 = $this->_query($typesql);
            if(!$query1) return [];
            $types = [];
            while ($row = mysqli_fetch_assoc($query1)) {
                array_push($types, $row);
            }
            return $types;
        }
        public function editCustomer($id, $ID_Customer,$Name,$Phone,$Accumulated_point){
            if($id != -1){
                $typesql1 = "UPDATE Customer
                SET Name = '".$Name."', Phone = '".$Phone."', Bdate = '".$Accumulated_point."
                WHERE ID = ".$ID_Customer.";";
                if (!$this->_query($typesql1)) {
                    return "<script>
                        alert(\"Error: ".mysqli_error($this->connect)."\");
                        location.href = '".geturl()."/Home/viewCustomerAll';
                    </script>";
                }
            }else{
                $typesql1 = "CALL addCustomer('".$ID_Customer."', '".$Name."', '".$Phone."', ".$Accumulated_point.");";
                if (!$this->_query($typesql1)) {
                    return "<script>
                        alert(\"Error: ".mysqli_error($this->connect)."\");
                        location.href = '".geturl()."/Home/viewCustomerAll';
                    </script>";
                }
            }
            return "";
        }
        public function getCustomerShift($quantity){
            $typesql = "CALL Number_of_shift(".$quantity.");";
            $query1 = $this->_query($typesql);
            if(!$query1) return [];
            $types = [];
            while ($row = mysqli_fetch_assoc($query1)) {
                array_push($types, $row);
            }
            return $types;
        } 
        public function getviewCustomer($Name){
            $typesql = "select * from CUSTOMER where Name like '%$Name%'";
            $query1 = $this->_query($typesql);
            if(!$query1) return [];
            $types = [];
            while ($row = mysqli_fetch_assoc($query1)) {
                array_push($types, $row);
            }
            return $types;
        } 
        public function deleteEmployee($id){
            $typesql = "DELETE FROM CUSTOMER WHERE ID=" . $id . ";";
            $query1 = $this->_query($typesql);
            return $query1;
        }
    }

?>
