<!DOCTYPE>
<?php
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
                <div id="shopping_cart">
                    <span style="float:right; font-size:15px; padding:5px; line-height:40px;">
                    Welcome guest!<b style="color:yellow">Shopping Cart</b> Total Items: Total Price: <a href="cart.php">Go to Cart</a>
                     </span>
                </div>

                <div id="products_box">
                    <?php
                     $get_pro="SELECT * from products";
    $run_pro=mysqli_query($con,$get_pro);
    while($row_pro=mysqli_fetch_array($run_pro)){
      $pro_id=$row_pro['product_id']; 
        $pro_cat=$row_pro['product_cat'];
        $pro_brand=$row_pro['product_brand'];
        $pro_title=$row_pro['product_title'];
        $pro_price=$row_pro['product_price'];
        $pro_image=$row_pro['product_image'];
        echo "
        <div id='single_product'>
        <h3>$pro_title</h3>
        <img src='admin_area/product_images/$pro_image' width='180' height='180'/> 
        <p><b> $ $pro_price</b></p>
        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
        <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
        </div>
        ";
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
