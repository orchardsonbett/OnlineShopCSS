<?php
$user=$_SESSION['customer_email'];
                    $get_customer="select * from customers where customer_email='$user'";
                    $run_customer= mysqli_query($con,$get_customer);
                    $row_customer=mysqli_fetch_array($run_customer);
$name= $row_customer['customer_name'];
$email= $row_customer['customer_email'];
$pass= $row_customer['customer_password'];
$image= $row_customer['customer_image'];
$country= $row_customer['customer_country'];
$city= $row_customer['customer_city'];
$contact= $row_customer['customer_contact'];
$address= $row_customer['customer_address'];

?>
<form action="customer_register.php" method="post" enctype="multipart/form-data">
    <table align="center" width="750">
        <tr align="center">
            <td colspan="6">
                <h2>Update your Account</h2>
            </td>
        </tr>
        <tr>
            <td align="right">Customer Name:</td>
            <td><input type="text" name="c_name" /></td>
        </tr>
        <tr>
            <td align="right">Customer Email:</td>
            <td><input type="email" name="c_email" /></td>
        </tr>
        <tr>
            <td align="right">Customer Password:</td>
            <td><input type="password" name="c_pass" /></td>
        </tr>
        <tr>
            <td align="right">Customer Image:</td>
            <td><input type="file" name="c_image" /></td>
        </tr>
        <tr>
            <td align="right">Customer Country:</td>
            <td>
                <select name="c_country">
                            <option>Select Country</option>
                            <option>India</option>
                            <option>USA</option>
                            <option>UK</option>
                            <option>Japan</option>
                            <option>China</option>
                            </select>
            </td>
        </tr>
        <tr>
            <td align="right">Customer City:</td>
            <td><input type="text" name="c_city" /></td>
        </tr>
        <tr>
            <td align="right">Customer Contact:</td>
            <td><input type="text" name="c_contact" /></td>
        </tr>
        <tr>
            <td align="right">Customer Address:</td>
            <td><textarea cols="20" rows="10" name="c_address"></textarea></td>
        </tr>
        <tr align="center">
            <td colspan="6"><input type="submit" name="register" value=" Submit" /></td>
        </tr>

    </table>
</form>


<?php
if(isset($_POST['register'])){
    $ip=getIp();
    
    $c_name= $_POST['c_name'];
     $c_email= $_POST['c_email'];
     $c_pass= $_POST['c_pass'];
     $c_country= $_POST['c_country'];
     $c_city= $_POST['c_city'];
     $c_contact= $_POST['c_contact'];
     $c_address= $_POST['c_address'];
    
    $c_image = $_FILES['c_image']['name'];
    $c_image_temp = $_FILES['c_image']['temp_name'];
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    $insert_c = "insert INTO customers(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";
    $run_c=mysqli_query($con, $insert_c);
    $sel_cart="select * from cart where ip_add='$ip'";
    $run_cart=mysqli_query($con,$sel_cart);
    $check_cart=mysqli_num_rows($run_cart);
    
    if($check_cart==0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('Account has been created successfully')</script>";
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    }
    else{
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('Account has been created successfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
        
    }
}
?>
