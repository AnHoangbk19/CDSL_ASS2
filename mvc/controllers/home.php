<?php
    Class Home extends Controller {
        function defaultView(){
            $all_product = $this->model("ProductsModel")->getAllProducts();
            $this->view("HomeView", ["all-pro"=>$all_product]);
        }
    }
?>