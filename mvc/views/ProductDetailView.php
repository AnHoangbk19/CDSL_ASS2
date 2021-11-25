<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <?php 
            include "./assets/css/detail1.css";
        ?>
    </style>

    <script>
        function getTotalCost(){
            var curQuantity = Number(document.getElementById("buy-quantity").value);
            var productCost = document.getElementById("cost").innerHTML;
            productCost = Number(productCost.substring(0, productCost.length-1));
            document.getElementById("total-cost").innerHTML = productCost*curQuantity + "$";
        }
    </script>
    
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="/assignment/home"><img src="https://lh3.googleusercontent.com/d/1Rc3H-oqkp8BIRXpcL_EOUMlBeNf5CSll" alt=""></a>
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

    <div class="content">
        <div class="product-detail">
            <div class="image">
                <img src="<?php echo $data["pro"]["product_image"] ?>" alt="">
            </div>
            <div class="infor">
                <div class="name">
                    <?php echo $data["pro"]["product_name"] ?>
                </div>
                <div class="detail">
                    <div class="attribute"> 
                        Price: 
                        <div class="value" id="cost"><?php echo $data["pro"]["product_price"] ?>$</div>
                    </div>
                    <div class="attribute"> 
                        Brand: 
                        <div class="value"><?php echo $data["pro"]["product_brand"] ?></div>
                    </div>
                    <div class="attribute"> 
                        Category: 
                        <div class="value"><?php echo $data["pro"]["product_type"] ?></div>
                    </div>
                    <div class="attribute"> 
                        Quantity: 
                        <div class="value" id="quantity"><?php echo $data["pro"]["product_quantity"] ?></div>
                    </div>
                </div>
                
                <div class="desc">
                    <h4>About this item</h4>
                    <?php echo $data["pro"]["product_detail"] ?>
                </div>
            </div>

            <div class="order">
                <div class="name">Order</div>
                <div>
                    <form id="order-form">
                    
                        <div class="order-infor">
                            <label>Quantity:</label><input type="number" id="buy-quantity" min="1" max="<?php echo $data["pro"]["product_quantity"] ?>" value="1" onchange="getTotalCost()">
                        </div>
                            
                        <div class="order-infor">
                            <label>Deliver to:</label>
                            <select id="country" name="country">
                                <option value="Afganistan">Afghanistan</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                            </select>
                        </div>

                        <div class="order-infor">
                            <label>Total:</label><label id="total-cost"><?php echo $data["pro"]["product_price"] ?>$</label>
                        </div>

                        <div id="add-to-cart-btn">
                            <button>Add to Cart</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="related-product">
            <h2>Products related to this item</h2>
            <div class="product-list">
                <?php 
                    while ($row = mysqli_fetch_assoc($data["related-pro"])){
                        echo '<div class="product">
                                <a href="#"><div class="img"><img src="'.$row["product_image"].'" alt="#"></div></a>
                                <h3>'.$row["product_price"].'$</h3>
                                <div class="name">'.$row["product_name"].'</div>
                            </div>';
                    }
                ?>
            </div>
        </div>
            
    </div>

    

</body>

</html>