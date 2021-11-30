<?php
    require_once "./mvc/core/basehref.php";
    class RestaurantModel extends db{
        private function _query($sql)
        {
            return mysqli_query($this->connect, $sql);
        }

        public function getviewEmployeeAll(){
            $typesql = "SELECT * FROM employee;";
            $query1 = $this->_query($typesql);
            if(!$query1) return [];
            $types = [];
            while ($row = mysqli_fetch_assoc($query1)) {
                array_push($types, $row);
            }
            return $types;
        }
        public function editEmployee($id, $ID_Employee,$Name,$Email,$Phone,$Bdate,$Sex,$Address,$Salary,$Eaccount,$Bnumber){
            if($id != -1){
                $typesql1 = "UPDATE Employee
                SET Name = '".$Name."', Email= '".$Email."', Phone = '".$Phone."', Bdate = '".$Bdate."', Sex = '".$Sex."', Address = '".$Address."', Salary = ".$Salary."
                WHERE ID = ".$ID_Employee.";";
                if (!$this->_query($typesql1)) {
                    return "<script>
                        alert(\"Error: ".mysqli_error($this->connect)."\");
                        location.href = '".geturl()."/Home/viewEmployeeAll';
                    </script>";
                }
            }else{
                $typesql1 = "CALL Add_Employee('".$ID_Employee."', '".$Name."', '".$Email."', '".$Phone."', '".$Bdate."', '".$Sex."', '".$Address."', ".$Salary.", '".$Eaccount."',".$Bnumber.");";
                if (!$this->_query($typesql1)) {
                    return "<script>
                        alert(\"Error: ".mysqli_error($this->connect)."\");
                        location.href = '".geturl()."/Home/viewEmployeeAll';
                    </script>";
                }
            }
            return "";
        }
        public function getEmployeeShift($quantity){
            $typesql = "CALL Number_of_shift(".$quantity.");";
            $query1 = $this->_query($typesql);
            if(!$query1) return [];
            $types = [];
            while ($row = mysqli_fetch_assoc($query1)) {
                array_push($types, $row);
            }
            return $types;
        } 
        public function getviewEmployee($Name){
            $typesql = "CALL EoB('".$Name."');";
            $query1 = $this->_query($typesql);
            if(!$query1) return [];
            $types = [];
            while ($row = mysqli_fetch_assoc($query1)) {
                array_push($types, $row);
            }
            return $types;
        } 
        public function deleteEmployee($id){
            $typesql = "DELETE FROM EMPLOYEE WHERE ID=" . $id . ";";
            $query1 = $this->_query($typesql);
            return $query1;
        }
    }

?>
