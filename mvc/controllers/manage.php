<?php

use function PHPSTORM_META\type;

class manage extends controller{
    public function viewProductPage($page){
        if($page < 1) $page = 1;
        $Data = $this->model('manageModal')->getProductManagePaging($page);
        $this->view("ProductManage", [
            "data" => $Data,
            "page" => $page
        ]);
    }
    public function deleteProduct($id){
        $demoData = $this->model('manageModal')->deleteProductManage($id);
        header("Location: http://localhost/ltw/manage/viewProductPage/1");
    }
    public function editProduct($id){
        $name = $_POST['Name_Product'];
        $type = $_POST['Type_Product'];
        $price = $_POST['Price_Product'];
        $quantity = $_POST['Quantity_Product'];
        $detail = $_POST['Detail_Product'];
        $brand = $_POST['Brand_Product'];
        $rating = $_POST['Rating_Product'];
        
        $demoData = $this->model('manageModal')->editProductManage($id,$name,$type,$price,$quantity,$detail,$brand,$rating);
        header("Location: http://localhost/ltw/manage/viewProductPage/1");
    }
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
        header("Location: http://localhost/ltw/manage/viewUserPage/1");
    }
    public function editUser($id){
        $Name = $_POST['Name_User'];
        $Password = $_POST['Password_User'];
        $Email = $_POST['Email_User'];
        $Phone = $_POST['Phone_User'];
        $Avatar = $_POST['Avatar_User'];
        
        $demoData = $this->model('manageModal')->editUserManage($id,$Name,$Password,$Email,$Phone,$Avatar);
        header("Location: http://localhost/ltw/manage/viewUserPage/1");
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
        header("Location: http://localhost/ltw/manage/viewOrderPage/1");
    }
}
?>