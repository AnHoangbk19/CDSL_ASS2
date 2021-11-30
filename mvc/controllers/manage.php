<?php
require_once "./mvc/core/basehref.php";
use function PHPSTORM_META\type;

class manage extends controller{
    public function viewBranch($quantity){
        $Data = $this->model('manageModal')->getviewBranch($quantity);
        $this->view("BranchManage", [
            "data" => $Data
        ]);
    }
    public function viewBranchName($name){
        $Data = $this->model('manageModal')->getviewBranchName($name);
        $this->view("BranchManage", [
            "data" => $Data
        ]);
    }
    public function viewBranchAll(){
        $Data = $this->model('manageModal')->getviewBranchAll();
        $this->view("BranchManage", [
            "data" => $Data
        ]);
    }
    public function deleteBranch($id){
        $demoData = $this->model('manageModal')->deleteBranchManage($id);
        header("Location: " . geturl(). "/manage/viewBranchAll");
    }
    public function editBranch($id){
        $ID_Branch = $_POST['ID_Branch'];
        $Name_Branch = $_POST['Name_Branch'];
        $Location_Branch = $_POST['Location_Branch'];
        $Phone_Branch = $_POST['Phone_Branch'];
        $Manage_ID_Branch = $_POST['Manage_ID_Branch'];
        
        $demoData = $this->model('manageModal')->editBranchManage($id, $ID_Branch,$Name_Branch,$Location_Branch,$Phone_Branch,$Manage_ID_Branch);
        if($demoData != "") echo $demoData;
        else header("Location: " . geturl(). "/manage/viewBranchAll");
    }
    //--------------
    public function viewUserPage($page){
        if($page < 1) $page = 1;
        $Data = $this->model('manageModal')->getProductUserPaging($page);
        $this->view("UserManage", [
            "data" => $Data,
            "page" => $page
        ]);
    }
    public function deleteUser($id){
        $demoData = $this->model('manageModal')->deleteUserManage($id);
        header("Location: " . geturl(). "/manage/viewUserPage/1");
    }
    public function editUser($id){
        $Name = $_POST['Name_User'];
        $Password = $_POST['Password_User'];
        $Email = $_POST['Email_User'];
        $Phone = $_POST['Phone_User'];
        $Avatar = $_POST['Avatar_User'];
        
        $demoData = $this->model('manageModal')->editUserManage($id,$Name,$Password,$Email,$Phone,$Avatar);
        header("Location: " . geturl(). "/manage/viewUserPage/1");
    }
    public function note(){
        $this->view("note");
    }
    public function viewOrderPage($page){
        if($page < 1) $page = 1;
        $Data = $this->model('manageModal')->getOrderPaging($page);
        $this->view("orderManage", [
            "data" => $Data,
            "page" => $page
        ]);
    }
    public function deleteOrder($id){
        $demoData = $this->model('manageModal')->deleteOrderManage($id);
        header("Location: " . geturl(). "/manage/viewOrderPage/1");
    }
}
?>