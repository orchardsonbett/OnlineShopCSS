<?php
$con= mysqli_connect("localhost","root","","ecommerce");
if(mysqli_connect_errno())
{
    echo "Failed to connect the MYSQL:" .mysqli_connect_error();
}
?>