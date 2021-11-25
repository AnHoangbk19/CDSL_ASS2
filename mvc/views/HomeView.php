<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        <?php include "./assets/css/home.css" ?>
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="/assignment/home"><img src="https://lh3.googleusercontent.com/d/1Rc3H-oqkp8BIRXpcL_EOUMlBeNf5CSll" alt="#"></a>
        </div>
        <div>
            <nav class="menu">
                <ul>
                    <li><a style="background-color: dodgerblue;" href="#">Home</a></li>
                    <li><a href="products">Products</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Account</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="intro">
        <div class="intro-desc">
            <h1>GIVE YOUR WORKOUT<br>A NEW STYLE!</h1>
            <p>Success isn't always about greatness.
                It's about consistency. Consistent
                hard work gains success. Greatness will come.
            </p>
            <div class="explore-btn"><a href ="products">Explore Now!</a></div>
        </div>

        <div class="intro-image">
            <img src="./public/images/exclusive.png" alt="#">
        </div>
    </div>
    
    <div class="ads">
        <img src="./public/images/ads1.jpg" alt="#" style="border-radius: 50px 0 0 50px;">
        <img src="./public/images/ads2.jpg" alt="#">
        <img src="./public/images/ads3.jpg" alt="#" style="border-radius: 0 50px 50px 0;">
    </div>

    <div class="category-list">
        <div class="category-box">
            <h2>Gaming accessories</h2>
            <div class="product-list">
                <div class="product">
                    <a href="products"><img src="./public/images/gaming1.jpg" alt="#"></a>
                    <p>Keyboards</p>
                </div>
                <div class="product">
                    <a href="products"><img src="./public/images/gaming2.jpg" alt="#"></a>
                    <p>Headphones</p>
                </div>
                <div class="product">
                    <a href="products"><img src="./public/images/gaming3.jpg" alt="#"></a>
                    <p>Mouses</p>
                </div>
                <div class="product">
                    <a href="products"><img src="./public/images/gaming4.jpg" alt="#"></a>
                    <p>Chairs</p>
                </div>
            </div>
            <div class="seemore-btn"><a href="products">See more</a></div>
        </div>

        <div class="category-box">
            <h2>Gaming accessories</h2>
            <div class="product-list">
                <div class="product">
                    <a href="products"><img src="./public/images/gaming1.jpg" alt="#"></a>
                    <p>Keyboards</p>
                </div>
                <div class="product">
                    <a href="products"><img src="./public/images/gaming2.jpg" alt="#"></a>
                    <p>Headphones</p>
                </div>
                <div class="product">
                    <a href="products"><img src="./public/images/gaming3.jpg" alt="#"></a>
                    <p>Mouses</p>
                </div>
                <div class="product">
                    <a href="products"><img src="./public/images/gaming4.jpg" alt="#"></a>
                    <p>Chairs</p>
                </div>
            </div>
            <div class="seemore-btn"><a href="products">See more</a></div>
        </div>

        <div class="category-box">
            <h2>Gaming accessories</h2>
            <div class="product-list">
                <div class="product">
                    <a href="products"><img src="./public/images/gaming1.jpg" alt="#"></a>
                    <p>Keyboards</p>
                </div>
                <div class="product">
                    <a href="products"><img src="./public/images/gaming2.jpg" alt="#"></a>
                    <p>Headphones</p>
                </div>
                <div class="product">
                    <a href="products"><img src="./public/images/gaming3.jpg" alt="#"></a>
                    <p>Mouses</p>
                </div>
                <div class="product">
                    <a href="products"><img src="./public/images/gaming4.jpg" alt="#"></a>
                    <p>Chairs</p>
                </div>
            </div>
            <div class="seemore-btn"><a href="products">See more</a></div>
        </div>

        <div class="category-scroll">
            <h2>May be you need</h2>
            <div class="product-list">
                <?php 
                    while ($row = mysqli_fetch_array($data["all-pro"])){
                        echo '<div class="product">
                                <a href="products/productdetail/'.$row["product_id"].'"><img src="'.$row["product_image"].'" alt="#"></a>
                            </div>';
                    };
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="useful-link">
            <h3>Get To Know Us</h3>
            <div><a href="#">Link1</a></div>
            <div><a href="#">Link1</a></div>
            <div><a href="#">Link1</a></div>
            <div><a href="#">Link1</a></div>
        </div>
        <div class="useful-link">
            <h3>Let Us Help You</h3>
            <div><a href="#">Link1</a></div>
            <div><a href="#">Link1</a></div>
            <div><a href="#">Link1</a></div>
            <div><a href="#">Link1</a></div>
        </div>
        <div class="useful-link">
            <h3>Make Money With Us</h3>
            <div><a href="#">Link1</a></div>
            <div><a href="#">Link1</a></div>
            <div><a href="#">Link1</a></div>
            <div><a href="#">Link1</a></div>
        </div>
        
    </div>

</body>
</html>