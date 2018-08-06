<table width="795" align="center" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h4>View All Brands</h4></td>
	</tr>
	<tr align="center" bgcolor="skyblue">
		<th>Brand Id</th>
		<th>Brand Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
<?php
include("includes/db.php");
$get_brands="select * from brands";
$run_brands=mysqli_query($con, $get_brands);
while ($row_brand=mysqli_fetch_array($run_brands)) {
$brand_id=$row_brand['brand_id'];
$brand_title=$row_brand['brand_title'];

?>
<tr align="center">
<td><?php echo $brand_id;?></td>
<td><?php echo $brand_title;?></td>
<td><a href="index.php?edit_brand=<?php echo $brand_id;?>">Edit</a></td>
<td><a href="index.php?delete_brand=<?php echo $brand_id;?>">Delete</a></td>
</tr>
<?php }?>
</table>