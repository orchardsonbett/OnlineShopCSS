<?php
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('admin_login.php?not_admin=You are not an admin!','_self')</script>";
}
else{
	?>
<?php
include("includes/db.php");

if(isset($_GET['delete_cat'])){
	
	$delete_id=$_GET['delete_cat'];
	
	$delete_cat="delete from categories where cat_id='$delete_id'";
	
	$run_delete=mysqli_query($con, $delete_cat);
	
	if($run_delete){
		echo "<script>alert('category has been succesfuly deleted')</script>";
		echo "<script>window.open('index.php?view_cats','_self')</script>";
	}

}
?>
<?php }?>
