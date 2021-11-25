<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <?php include "./assets/css/product.css" ?>
    </style>

</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="home"><img src="https://lh3.googleusercontent.com/d/1Rc3H-oqkp8BIRXpcL_EOUMlBeNf5CSll" alt="#"></a>
        </div>
        <div>
            <nav class="menu">
                <ul>
                    <li><a href="/assignment/home">Home</a></li>
                    <li><a style="background-color: dodgerblue;" href="products">Products</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Account</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="products">
        <div class="type-menu">
            <div class="sub-menu">
                <h4>Departments</h4>
                <ul>
                    <?php 
                        while ($row = mysqli_fetch_array($data["all-type"])){
                            echo '<li class=""><a id="'.$row["product_type"].'" onClick="categoryClick('."'".$row["product_type"]."'".')">'.$row["product_type"].'</a></li>';
                        };
                    ?>
                </ul>
            </div>

            <div class="sub-menu">
                <h4>Price</h4>
                <ul>
                    <li><a href="#">Under $25</a></li>
                    <li><a href="#">$25 to $50</a></li>
                    <li><a href="#">$50 to $100</a></li>
                    <li><a href="#">$100 to $200</a></li>
                    <li><a href="#">$200 & Above</a></li>
                </ul>
            </div>

        </div>

        <div class="type-product">
            <h2 id="category">
                All products
            </h2>
            <div class="product-list">
                <?php 
                    while ($row = mysqli_fetch_array($data["all-pro"])){
                        echo '<div class="product">
                                <a href="/assignment/products/productdetail/'.$row["product_id"].'"><div class="product-img"><img src="'.$row["product_image"].'" alt="#"></div></a>
                                <div class="product-price">'.$row["product_price"].'$</div>
                                <div class="product-name">'.$row["product_name"].'</div>
                            </div>';
                    };
                ?>
            </div>
        </div>
    </div>

    <div class="page-btn">
        <a href=""></a>
    </div>

</body>
<script src="./assets/js/javascript.js"></script>
</html>