<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");
?>
<html>

<head>
    <title>The Online Shop</title>
    <link rel="stylesheet" href="styles/style.css" media="all" />

</head>

<body>
    <div class="main_wrapper">
        <div class="header_wrapper">
            <!-- <img id="logo" src="images/logo1.png" />
            <img id="banner" src="images/banner.jpg" />-->
        </div>
        <div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="#">Cart</a></li>
            </ul>
            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="search any thing" />
                    <input type="submit" name="search" value="search" />
                </form>
            </div>
        </div>

        <div class="content_wrapper">
            <div id="sidebar">
                <div id="sidebar_title">Categories </div>
                <ul id="cats">
                    <?php getCats();?>
                    <!--<li><a href="#">Laptops</a></li>
                    <li><a href="#">Computers</a></li>
                    <li><a href="#">Mobiles</a></li>
                    <li><a href="#">Cameras</a></li>-->
                </ul>
                <div id="sidebar_title">Brands </div>
                <ul id="cats">
                    <?php getBrand();?>
                    <!-- <li><a href="#">HP</a></li>
                <li><a href="#">Dell</a></li>
                <li><a href="#">Moto</a></li>
                <li><a href="#">LG</a></li>-->
                </ul>
            </div>
            <div id="content_area">
                <?php cart();?>
                <div id="shopping_cart">
                    <span style="float:right; font-size:15px; padding:5px; line-height:40px;">
                    Welcome guest!<b style="color:yellow">Shopping Cart</b> Total Items: <?php total_items();?> Total Price: <?php total_price();?> <a href="cart.php">Go to Cart</a>
                     </span>
                </div>
                 <?php getIp();?>
                <div id="products_box">
                    <?php 
                    if(!isset($_SESSION['customer_email'])){
                     include("customer_login.php");   
                    }
                    else{
                        include("payment.php");
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <h2 style="text-align:center; padding-top:30px;">&copy; 2018 by www.ranjan.com</h2>
        </div>
    </div>
</body>

</html>
