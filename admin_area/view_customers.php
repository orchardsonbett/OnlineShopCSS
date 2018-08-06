<?php
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('admin_login.php?not_admin=You are not an admin!','_self')</script>";
}
else{
	?>

<table width="795" align="center" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h4>View All Customers</h4></td>
	</tr>
	<tr>
		<th>Customer Id</th>
		<th>Customer Name</th>
		<th>Customer Email</th>
		<th>Customer Contact</th>
		<th>Customer City</th>
		<th>Customer Country</th>
	</tr>
	<?php 
	include("includes/db.php");
	$view_c = "select * from customers";
	$run_c = mysqli_query($con, $view_c);
	while($row_c=mysqli_fetch_array($run_c)){
		$customer_id=$row_c['customer_id'];
		$customer_name=$row_c['customer_name'];
		$customer_email=$row_c['customer_email'];
		$customer_country=$row_c['customer_country'];
		$customer_city=$row_c['customer_city'];
		$customer_contact=$row_c['customer_contact'];

		?>
		<tr align="center">
			<td><?php echo $customer_id;?></td>
			<td><?php echo $customer_name;?></td>
			<td><?php echo $customer_email;?></td>
			<td><?php echo $customer_contact;?></td>
			<td><?php echo $customer_city;?></td>
			<td><?php echo $customer_country;?></td>
		</tr>
	<?php } ?>
	
<?php } ?>