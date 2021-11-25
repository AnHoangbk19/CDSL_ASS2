<?php
    class Products extends Controller {

        function defaultView(){
            $productDB = $this->model("ProductsModel");
            $productsView = $this->view("ProductsView", 
            [
                "all-pro"=>$productDB->getAllProducts(),
                "all-type"=>$productDB->getAllCategories(),
            ]);
        }

        function category($category){
            $this->view("ProductsView", ["category"=>$category]);
        }

        function productdetail($product_id){
            $productDB = $this->model("ProductsModel");
            $product = mysqli_fetch_array($productDB->getProduct($product_id));
            $related_product = $productDB->getProducts($product["product_type"]);
            $this->view("ProductDetailView", ["pro"=>$product, "related-pro"=>$related_product]);
        }
    }
?>