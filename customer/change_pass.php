<h2 style="text_align:center;">Change your password</h2>
<form action="" method="post">
    <table><tr>
<td><b>Enter Current Password:</b></td>
<td><input type="password" name="current_pass" /></td>
        </tr>
        <tr>
            <td><b>Enter New Password:</b></td>
            <td><input type="password" name="new_pass" /></td>
        </tr> 
        <tr>
        <td><b>Enter New Password Again:</b></td>
            <td><input type="password" name="new_pass_again" /></td>
        </tr>
 <tr align="center">
        <td colspan="5"><input type="submit" name="change_pass" value="Change Password"/></td></tr>   

        
        </table>
</form>

<?php
include("includes/db.php");
if(isset($_POST['change_pass'])){
    $user=$_SESSION['customer_email'];
    
    $current_pass=$_POST['current_pass'];
    $new_pass=$_POST['new_pass'];
    $new_again=$_POST['new_pass_again'];
    $sel_pass="select * from customers where customer_pass='$current_pass' AND customer_email='$user'";
    $run_pass= mysqli_query($con,$sel_pass);
    $check_pass=mysqli_num_rows($run_pass);
    if($check_pass==0){
        echo "<script>alert('your current password is wrong')</script>";
        exit();
        }
    if($new_pass!=$new_again){
       echo "<script>alert('Password do match')</script>"; 
        exit();
    }
    else{
        $update_pass="update customers SET customer_pass='$new_pass' where customer_email='$user'";
        $run_update=mysqli_query($con, $update_pass);
        echo "<script>alert('Password updated successfully')</script>";
        echo "<script>window.open('my_account.php','_self')</script>";
    }
    
}
?>