<?php
    require_once "./mvc/core/basehref.php";
    use function PHPSTORM_META\type;
    class cus extends Controller {
        public function viewCustomerAll(){
            $Data = $this->model('CustomerModel')->getviewCustomerAll();
            $this->view("ManageCus", [
                "data" => $Data
            ]);
        }
        public function editCustomer($id){
            $ID_Customer = $_POST['ID_Customer'];
            $Name = $_POST['Name_Customer'];
            $Phone = $_POST['Phone_Customer'];
            $Point = $_POST['Point_Customer'];
            $demoData = $this->model('CustomerModel')->editCustomer($id, $ID_Customer,$Name,$Phone,$Point);
            if($demoData != "") echo $demoData;
            else header("Location: " . geturl(). "/cus/viewCustomerAll");
        }
        public function viewShift($quantity){
            $Data = $this->model('CustomerModel')->getCustomerShift($quantity);
            $this->view("ManageCus", [
                "data" => $Data
            ]);
        }
        public function viewCustomer($name){
            $Data = $this->model('CustomerModel')->getviewCustomer($name);
            $this->view("ManageCus", [
                "data" => $Data
            ]);
        }
        public function deleteCustomer($id){
            $demoData = $this->model('CustomerModel')->deleteCustomer($id);
            header("Location: " . geturl(). "/cus/viewCustomerAll");
        }
    }

    
?>