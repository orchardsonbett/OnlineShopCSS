<!DOCTYPE html>
<?php 
include('includes/db.php');
if(isset($_GET['edit_cats'])){
    $get_id=$_GET['edit_cats'];
    $get_cat="select * from categories where cat_id='$get_id'";
    $run_cat=mysqli_query($con, $get_cat);
    while ($row_cat=mysqli_fetch_array($run_cat)) {
        $cat_id=$row_cat['cat_id'];
        $cat_title=$row_cat['cat_title'];
       
    }
}

?>
<html>
<head>
<title>Edit/Update Category</title>


</head>

<body bgcolor="skyblue">

    <form action="" method="post" style="padding: 80px;">
<b>Edit Category:</b>
<input type="text" name="cat_title" value="<?php echo $cat_title;?>" />
<input type="submit" name="update_cat" value="Update Category"/>
</form>
</body>
</html>

<?php

    if(isset($_POST['update_cat'])){

        //Getting Text
        $update_id=$cat_id;
        $cat_title = $_POST['cat_title'];
        
        

        //Inserting Data
       $update_cat = "update categories set cat_title='$cat_title' where cat_id='$update_id'";
        $result = mysqli_query($con,$update_cat);
        if($result){
            echo "<script>alert('Product Has been Updated!')</script>";
            echo "<script>window.open('index.php?view_cats','_self')</script>";
        }
    }
?>
