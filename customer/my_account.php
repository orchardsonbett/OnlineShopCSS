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
                <li><a href="../index.php">Home</a></li>
                <li><a href="../all_products.php">All Products</a></li>
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
                <div id="sidebar_title">My Account:</div>
                <ul id="cats">
                    <?php
                    $user=$_SESSION['customer_email'];
                    $get_img="select * from customers where customer_email='$user'";
                    $run_img= mysqli_query($con,$get_img);
                    $row_img=mysqli_fetch_array($run_img);
                    $c_image=$row_img['customer_image'];
                    
                    $c_name=$row_img['customer_name'];
                    echo "<img src='customer_images/$c_image' width='150' height='150'/>";
                    ?>
                    <li><a href="my_account.php?my_orders">My Orders</a></li>
                   <li><a href="my_account.php?edit_account">Edit Account</a></li>
                    <li><a href="my_account.php?change_pass">Change Password</a></li>
                    <li><a href="my_account.php?delete_account">Delete Account</a></li>
                    <li><a href="logout.php?logout">Logout</a></li>
                 </ul>
               
               
            </div>
            <div id="content_area">
                <?php cart();?>
                <div id="shopping_cart">
                    <span style="float:right; font-size:15px; padding:5px; line-height:40px;">
                        <?php
                        if(isset($_SESSION['customer_email'])){
                            echo "<b>Welcome:</b>" . $_SESSION['customer_email'];
                        }
                       
                        ?>
                
                        
                        <?php 
                        if(!isset($_SESSION['customer_email'])){
                            echo"<a href='checkout.php'>Login</a>";
                        }
                            else{
                                echo"<a href='logout.php' style='color:orange';>Logout</a>";
                            }
                        ?>
                     </span>
                </div>
                 <?php getIp();?>
                <div id="products_box">
                    
                    <?php 
                    if(!isset($_GET['my_orders'])){
                        if(!isset($_GET['edit_account'])){
                         if(!isset($_GET['change_pass'])){
                           if(!isset($_GET['delete_account'])){
                            echo 
                                "<h2 style='padding:20px;'>Welcome: $c_name</h2>
                                <b>You can see your order progress by clicking this <a href='my_account.php?my_orders'>Link</a></b>"; 
                           }  
                         }   
                        }
                            
                    }
                    ?>
                    <?php
                    if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                    }
                    if(isset($_GET['change_pass'])){
                        include('change_pass.php');
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
