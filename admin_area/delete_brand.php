
<?php
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('admin_login.php?not_admin=You are not an admin!','_self')</script>";
}
else{
	?>
<?php
include('includes/db.php');
if (isset($_GET['delete_brand'])) {
$delete_id=$_GET['delete_brand'];
$delete_brand="delete from brands where brand_id='$delete_id'";
$run_delete=mysqli_query($con, $delete_brand);
if($run_delete){
	echo "<script>alert('Brand has been deleted')</script>";
	echo "<script>window.open('index.php?view_brands','_self')</script>";
}
}
?>

<!-- Ending else here -->
<?php }?>