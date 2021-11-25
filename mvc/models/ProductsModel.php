<?php
    class ProductsModel extends db{
        public function getAllProducts(){
            $qr = "SELECT * FROM PRODUCTS";
            return mysqli_query($this->connect, $qr);
        }

        public function getAllCategories(){
            $qr = "SELECT DISTINCT product_type FROM PRODUCTS ORDER BY product_type";
            return mysqli_query($this->connect, $qr);
        }

        public function getProducts($type){
            $qr = "SELECT product_name, product_price, product_image FROM products WHERE product_type='".$type."'";
            return mysqli_query($this->connect, $qr);
        }

        public function getProduct($product_id){
            $qr = "SELECT * FROM PRODUCTS WHERE product_id = $product_id";
            return mysqli_query($this->connect, $qr);
        }
    }
?>