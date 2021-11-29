<?php
    require_once "./mvc/core/basehref.php";
    use function PHPSTORM_META\type;
    class Home extends Controller {
        public function viewEmployeeAll(){
            $Data = $this->model('RestaurantModel')->getviewEmployeeAll();
            $this->view("ManageEmp", [
                "data" => $Data
            ]);
        }
        public function editEmployee($id){
            $ID_Employee = $_POST['ID_Employee'];
            $Name = $_POST['Name'];
            $Email = $_POST['Email'];
            $Phone = $_POST['Phone'];
            $Bdate = $_POST['Bdate'];
            $Sex = $_POST['Sex']; 
            $Address = $_POST['Address'];
            $Salary = $_POST['Salary'];
            $Eaccount = $_POST['Eaccount'];
            $Bnumber = $_POST['Bnumber'];
            
            $demoData = $this->model('RestaurantModel')->editEmployee($id, $ID_Employee,$Name,$Email,$Phone,$Bdate,$Sex,$Address,$Salary,$Eaccount,$Bnumber);
            if($demoData != "") echo $demoData;
            else header("Location: " . geturl(). "/Home/viewEmployeeAll");
        }
        public function viewShift($quantity){
            $Data = $this->model('RestaurantModel')->getEmployeeShift($quantity);
            $this->view("ManageEmp", [
                "data" => $Data
            ]);
        }
        public function viewEmployee($name){
            $Data = $this->model('RestaurantModel')->getviewEmployee($name);
            $this->view("ManageEmp", [
                "data" => $Data
            ]);
        }
        public function deleteEmployee($id){
            $demoData = $this->model('RestaurantModel')->deleteEmployee($id);
            header("Location: " . geturl(). "/Home/viewEmployeeAll");
        }
    }


?>