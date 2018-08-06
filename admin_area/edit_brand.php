<!DOCTYPE html>
<?php 
include('includes/db.php');
if (isset($_GET['edit_brand'])) {
	$get_id=$_GET['edit_brand'];
	$get_brand="select * from brands where brand_id='$get_id'";
	$run_brand=mysqli_query($con, $get_brand);
	while ($row_brand=mysqli_fetch_array($run_brand)) {
		$brand_id=$row_brand['brand_id'];
		$brand_title=$row_brand['brand_title'];
	}
}

 ?>

<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post" style="padding: 80px;">
		<input type="text" name="brand_title" value="<?php echo $brand_title;?>"/>
		<input type="submit" name="update_brand"/>
	
</form>
</body>
</html>
<?php

if (isset($_POST['update_brand'])) {
	$update_id=$brand_id;
	$brand_title=$_POST['brand_title'];
	$update_brand="update brands set brand_title='$brand_title' where brand_id='$update_id'";
	$run_update=mysqli_query($con, $update_brand);
	if($run_update){
		echo "<script>alert('brand name successfuly updated')</script>";
		echo "<script>window.open('index.php?view_brands','_self')</script>";
	}
}
  ?>












