<?php
require_once "./mvc/core/basehref.php";
use function PHPSTORM_META\type;

class order extends controller{
    public function viewBranch($quantity){
        $Data = $this->model('OrderModel')->getviewBranch($quantity);
        $this->view("OrderManage", [
            "data" => $Data
        ]);
    }
    public function viewBranchName($name){
        $Data = $this->model('OrderModel')->getviewBranchName($name);
        $this->view("OrderManage", [
            "data" => $Data
        ]);
    }
    public function viewBranchAll(){
        $Data = $this->model('OrderModel')->getviewBranchAll();
        $this->view("OrderManage", [
            "data" => $Data
        ]);
    }
    public function deleteBranch($id){
        $demoData = $this->model('OrderModel')->deleteBranchManage($id);
        header("Location: " . geturl(). "/order/viewBranchAll");
    }
    public function editBranch($id){
        $ID_Branch = $_POST['ID_Branch'];
        $Name_Branch = $_POST['Name_Branch'];
        $Location_Branch = $_POST['Location_Branch'];
        $Phone_Branch = $_POST['Phone_Branch'];
        $Manage_ID_Branch = $_POST['Manage_ID_Branch'];
        
        $demoData = $this->model('OrderModel')->editBranchManage($id, $ID_Branch,$Name_Branch,$Location_Branch,$Phone_Branch,$Manage_ID_Branch);
        if($demoData != "") echo $demoData;
        else header("Location: " . geturl(). "/order/viewBranchAll");
    }
    //--------------
    public function viewUserPage($page){
        if($page < 1) $page = 1;
        $Data = $this->model('OrderModel')->getProductUserPaging($page);
        $this->view("UserManage", [
            "data" => $Data,
            "page" => $page
        ]);
    }
    public function deleteUser($id){
        $demoData = $this->model('OrderModel')->deleteUserManage($id);
        header("Location: " . geturl(). "/order/viewUserPage/1");
    }
    public function editUser($id){
        $Name = $_POST['Name_User'];
        $Password = $_POST['Password_User'];
        $Email = $_POST['Email_User'];
        $Phone = $_POST['Phone_User'];
        $Avatar = $_POST['Avatar_User'];
        
        $demoData = $this->model('OrderModel')->editUserManage($id,$Name,$Password,$Email,$Phone,$Avatar);
        header("Location: " . geturl(). "/order/viewUserPage/1");
    }
    public function note(){
        $this->view("note");
    }
    public function viewOrderPage($page){
        if($page < 1) $page = 1;
        $Data = $this->model('OrderModel')->getOrderPaging($page);
        $this->view("orderManage", [
            "data" => $Data,
            "page" => $page
        ]);
    }
    public function deleteOrder($id){
        $demoData = $this->model('OrderModel')->deleteOrderManage($id);
        header("Location: " . geturl(). "/order/viewOrderPage/1");
    }
}
?>