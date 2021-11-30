<?php
    class DishController{
        public function InitDishController(){
            require_once('mvc/models/dish-model.php');
            require_once('mvc/views/dish-view.php');
        }

        public function View($ctrl){
            $this->InitDishController();
            $output = "";
            switch ($ctrl) {

                case 'dish':
                    $DishModel = new DishModel();
                    $DishView = new DishView();
                    if (isset($_POST['updateDish']))
                    {
                        $_SESSION['Name'] = $_POST['updateDish'];
                        $dishes = $DishModel->getOneDish($_POST['updateDish']);
                        $_SESSION['Price'] = $dishes['Price'];
                        $_SESSION['Image_Link'] = $dishes['Image_Link'];

                        $link = "dish.php?ctrl=dish&act=update";
                        header("Location: " . $link);
                    }

                    if (isset($_POST['deleteDish']))
                    {
                        $DishView->deleteDish();
                    }

                    if (isset($_POST['search'])) {                                     
                        $dishes = $DishModel->search($_POST['search']);
                        $output = $DishView->showAllDishes_adminpage($dishes);
                        break;
                    }   

                    $dishes = $DishModel->getAllDishes();
                    $output = $DishView->showAllDishes_adminpage($dishes);
                    break;

                case 'filter':
                    $DishView = new DishView();
                    $output .= $DishView->showFormFilter();
                    $DishModel = new DishModel();
                    $Compared_Price = "";
                    $Branch_Num = "";
                    $check = true;
                    if (isset($_POST['submit'])) {
                        
                        if (empty($_POST['Compared_Price']))
                            $output .= $DishView->showInvalidFilter(1);
                        else if (empty($_POST['Branch_Num']))
                            $output .= $DishView->showInvalidFilter(2);
                        else {
                            $Compared_Price = $_POST['Compared_Price'];
                            $Branch_Num = $_POST['Branch_Num'];
                            $check = $DishModel->Check_Branch_Num_Exists($Branch_Num);

                            if ($check == false) {
                                $output .= $DishView->showInvalidFilter(0);
                            }
        
                            else {
                                $dishes = $DishModel->Dish_Price_Filter($Compared_Price, $Branch_Num);
                                $output .= $DishView->showDishesFilter($dishes); 
                            } 
                        }                        
                    }              
                    break;

                    case 'available':
                        $DishView = new DishView();
                        $output .= $DishView->showFormAvailable();
                        $DishModel = new DishModel();
                        $Total_Qty = "";
                        if (isset($_POST['submit'])) {
                            if (empty($_POST['Total_Qty']))
                                $output .= $DishView->showInvalidAvailable(1);
                            else {
                                $Total_Qty = $_POST['Total_Qty'];
                                $dishes = $DishModel->Available_Dish($Total_Qty);
                                $output .= $DishView->showDishesAvailable($dishes);  
                            }
                        }   
                        break;
            }
            return $output;
        }

        public function Edit($ctrl, $action){
            $this->InitDishController();
            $output = "";
            if ($ctrl == "dish"){
                $DishView = new DishView();
                $output .= $DishView->showFormDish_adminpage($action);         
                $DishModel = new DishModel();
                if ($action == "insert")
                {
                    $arr = array();
                    $arr['Name'] = "";
                    $arr['Price'] = "";
                    $arr['Image_Link'] = "";
                    if (isset($_POST['submit'])) {

                        if (empty($_POST['Name']))
                            $output .= $DishView->showInvalidInsert(1);
                        else if (empty($_POST['Price']))
                            $output .= $DishView->showInvalidInsert(2);
                        else {

                        $arr['Name'] = $_POST['Name'];
                        $arr['Price'] = $_POST['Price'];
                        $arr['Image_Link'] = $_POST['Image_Link'];}

                        $check = $DishModel->Check_Dish_Name_Exists($arr['Name']);

                        if ($check == false) {
                            $output .= $DishView->showInvalidInsert(0);
                        }

                    }
                }
                else if ($action == "update")
                {        
                    $arr = array();
                    if (isset($_POST['submit'])) {
                        $arr['Name'] = $_SESSION['Name'];
                        $arr['Price'] = $_POST['Price'];
                        $arr['Image_Link'] = $_POST['Image_Link'];
                    }
                    $result = false;
                }
                if (sizeof($arr) != 0) {
                    $result = $DishModel->Edit($action, $arr);
                }
            }
            return $output;
        }


        public function getDishesSearch(){
            $this->InitDishController();
            $DishModel = new DishModel();
            if (isset($_GET['search'])) {
                $dishes = $DishModel->search($_GET['search']);
            }
        }        

    }
?>