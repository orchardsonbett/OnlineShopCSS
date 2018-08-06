<!DOCTYPE html>
<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('admin_login.php?not_admin=You are not an admin!','_self')</script>";
}
else{
    ?>
<?php 
include('includes/db.php');
if(isset($_GET['edit_pro'])){
    $get_id=$_GET['edit_pro'];
    $get_pro="select * from products where product_id='$get_id'";
    $run_pro=mysqli_query($con, $get_pro);
    while ($row_pro=mysqli_fetch_array($run_pro)) {
        $pro_id=$row_pro['product_id'];
        $product_title=$row_pro['product_title'];
        $product_image=$row_pro['product_image'];
        $product_cat=$row_pro['product_cat'];
        $product_brand=$row_pro['product_brand'];
        $product_price=$row_pro['product_price'];
        $product_desc=$row_pro['product_desc'];
        $product_keywords=$row_pro['product_keywords'];
        /*Getting category*/
        $get_cat="select * from categories where cat_id='$product_cat'";
        $run_cat=mysqli_query($con,$get_cat);
        $row_cat=mysqli_fetch_array($run_cat);
        $category_title=$row_cat['cat_title'];

          /*Getting brand*/
          $get_brand="select * from brands where brand_id='$product_brand'";
        $run_brand=mysqli_query($con,$get_brand);
        $row_brand=mysqli_fetch_array($run_brand);
        
        $brand_title=$row_brand['brand_title'];
    }
}

?>
<html>
<head>
<title>Edit/Update Product</title>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>

</head>

<body bgcolor="skyblue">

    <form action="" method="post" enctype="multipart/form-data">

        <table align="center" width="700px" border="2px" bgcolor="Green">

            <tr align="center">

                <td colspan="7">
                    <h2>Edit/Update Product</h2>
                </td>
            </tr>

            <tr>

                <td align="center"><b>Product Title</b></td>
                <td><input type="text" name="product_title" size="40" value="<?php echo $product_title;?>"/></td>
            </tr>

            <tr>

                <td align="center"><b>Product Category</b></td>
                <td>

                    <select name="product_cat" required="">

                    <option><?php echo $category_title;?></option>

                    <?php 

                        $get_cats = "select * from categories";
                        $run_cats = mysqli_query($con, $get_cats);

                        while ($row_cats = mysqli_fetch_array($run_cats)) {

                            $cat_id = $row_cats['cat_id'];
                            $cat_title = $row_cats['cat_title'];

                            echo "<option value='$cat_id'>$cat_title</option>";

                            }

                     ?>

                </select>

                </td>

            </tr>

            <tr>

                <td align="center"><b>Product Brand</b></td>
                <td>

                    <select name="product_brand" required="">

                    <option><?php echo $brand_title;?></option>

                    <?php 

                        $get_brand = "select * from brands";
                        $run_brand = mysqli_query($con, $get_brand);

                        while ($row_brand = mysqli_fetch_array($run_brand)) {

                            $brand_id = $row_brand['brand_id'];
                            $brand_title = $row_brand['brand_title'];

                            echo "<option value='$brand_id'>$brand_title</option>";

                            }

                     ?>

                </select>

                </td>

            </tr>

            <tr>

                <td align="center"><b>Product Image</b></td>
                <td><input type="file" name="product_image" /></td>

            </tr>

            <tr>

                <td align="center"><b>Product Price</b></td>
                <td><input type="text" name="product_price" value="<?php echo $product_price;?>" /></td>

            </tr>

            <tr>

                <td align="center"><b>Product Description</b></td>
                <td><textarea name="product_desc" cols="20" rows="10"><?php echo $product_desc;?></textarea> </td>

            </tr>

            <tr>

                <td align="center"><b>Product Keyword</b></td>
                <td><input type="text" name="product_keywords" size="40" value="<?php echo $product_keywords;?>" /></td>

            </tr>

            <tr align="center">

                <td colspan="7"><input type="submit" name="update_product" value="Update Product" /></td>

            </tr>

        </table>
</form>
</body>
</html>

<?php

    if(isset($_POST['update_product'])){

        //Getting Text
        $update_id=$pro_id;
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

        //Getting Image
$product_image = $_FILES['product_image']['name'];
$product_image_tmp = $_FILES['product_image']['tmp_name'];
move_uploaded_file($product_image_tmp, "product_images/$product_image");
        //$product_image = $_FILES['product_image']['name'];
        //$product_image_tmp = $_FILES['product_image']['tmp_name'];

        //Inserting Data
       $update_product = "update products set product_cat='$product_cat',product_brand='$product_brand', product_title='$product_title',product_price='$product_price',product_desc='$product_desc', product_keywords='$product_keywords' where product_id='$update_id'";
        $result = mysqli_query($con,$update_product);
        if($result){
            echo "<script>alert('Product Has been Updated!')</script>";
            echo "<script>window.open('index.php?view_products.php','_self')</script>";
        }
    }
?>
<?php }?>
