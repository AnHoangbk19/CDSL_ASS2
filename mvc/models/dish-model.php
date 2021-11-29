<?php

class DishModel {
    public function InitConnect(){
        $con = mysqli_connect('localhost', 'root', '', 'restaurant');

        if (mysqli_connect_errno()){
            die('Connection failed: '. mysqli_connect_error());
        }
        else return $con;
    }

    public function getAllDishes(){
        $con = $this->InitConnect();

        $res = $con->query('select * from dish');
        $dishes = array();
        if ($res->num_rows > 0){
            while ($dish = mysqli_fetch_assoc($res)){
                $dishes[] = $dish;
            }
        }

        return $dishes;
    }

    public function getOneDish($Name){
        $con = $this->InitConnect();

        $res = $con->query("select * from DISH where Name = '" . $Name . "'");
        $dish = mysqli_fetch_assoc($res);
        return $dish;
    }

    public function Edit($action, $dish){

        if ($action == "insert")
        {
            $conn = $this->InitConnect();

            //$sql = "insert INTO dish (Name, Price) VALUES ('" .$dish['Name']."', '".$dish['Price']."')";
            $sql = "CALL insert_DISH('" .$dish['Name']."', '".$dish['Price']."', '".$dish['Image_Link']."')";

            if ($conn->query($sql) === TRUE) {
                $conn->close();
                return true;
            }
            else {
                $conn->close();
                return false;
            }
        }

        if ($action == "update")
        {
            $conn = $this->InitConnect();

            $existName = mysqli_query($conn, "select * from DISH where Name = '" . $dish['Name'] . "'");
            if (mysqli_num_rows($existName) == 0)
                return false;
            else
            {
                $sql = "update DISH set Name = '" . $dish['Name'] . "', Price = '" . $dish['Price'] . "', Image_Link = '" . $dish['Image_Link'] . "' where Name = '" . $dish['Name'] . "'";
                if ($conn->query($sql) === TRUE) {
                    $conn->close();
                    return true;
                }
                else {
                    $conn->close();
                    return false;
                }
            }
        }

        if ($action == "delete")
        {
            $conn = $this->InitConnect();

            $existName = mysqli_query($conn, "select * from DISH where Name = '". $dish['Name']. "'");
            if (mysqli_num_rows($existName) == 0)
                return false;
            else
            {
                $sql = "delete from DISH where Name = '" . $dish['Name'] . "'";
                if (mysqli_query($conn, $sql)) {
                    mysqli_close($conn);
                    return true;
                }
                else {
                    mysqli_close($conn);
                    return false;
                }
            }
        }
    }

    public function search($key){
        
        $con = $this->InitConnect();

        
        $res = $con->query("select * from DISH where Name like '%$key%'");
        
        $dishes = array();
        if (mysqli_num_rows($res) > 0){
            
            while ($dish = mysqli_fetch_assoc($res)){
                $dishes[] = $dish;
            }
        }
        return $dishes;
    }

    public function Dish_Price_Filter($Compared_Price, $Branch_Num){
        $con = $this->InitConnect();


        $res = $con->query('call Dish_Price_Filter("' . $Compared_Price . '", "' . $Branch_Num . '")');
        /*$res = $con->query('select H.Number AS Branch_Num, H.Dish_name AS Dish_Name, D.Price AS Price
        FROM DISH AS D, HAS_FOOD AS H
        WHERE H.Dish_name = D.Name AND D.Price <= "' . $Compared_Price . '" AND H.number = "' . $Branch_Num . '"
        ORDER BY Price');*/
        $dishes = array();
        if ($res != null){
            if ($res->num_rows > 0){
                while ($dish = mysqli_fetch_assoc($res)){
                    $dishes[] = $dish;
                }
            }
        }
        return $dishes;
    }

    /*public function Available_Dish($Total_Qty){
        $con = $this->InitConnect();

        $res = $con->query('call Available_Dish("' . $Total_Qty . '")');


        $dishes = array();
        if ($res->num_rows > 0){
            while ($dish = mysqli_fetch_assoc($res)){
                $dishes[] = $dish;
            }
        }
        else $dishes = 0;
        return $dishes;
    }*/

    public function Check_Branch_Num_Exists($Branch_Num) {
        $con = $this->InitConnect();

        $res = $con->query('select Number from BRANCH');
        if (mysqli_num_rows($res) > 0){
            
            while ($num = mysqli_fetch_assoc($res)){
                if ($num['Number'] == $Branch_Num) return true;
            }
        }
        return false;
        
    }

}

?>