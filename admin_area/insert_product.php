<!DOCTYPE html>
<?php 
include('includes/db.php');
?>
<html>

<head>

    <title>Inserting Product</title>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });

    </script>

</head>

<body bgcolor="skyblue">

    <form action="insert_product.php" method="post" enctype="multipart/form-data">

        <table align="center" width="700px" border="2px" bgcolor="Green">

            <tr align="center">

                <td colspan="7">
                    <h2>Insert New Product</h2>
                </td>

            </tr>

            <tr>

                <td align="center"><b>Product Title*</b></td>
                <td><input type="text" name="product_title" size="40" required/></td>

            </tr>

            <tr>

                <td align="center"><b>Product Category</b></td>
                <td>

                    <select name="product_cat" required="">

                    <option>Select Category</option>

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

                    <option>Select Brand</option>

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
                <td><input type="text" name="product_price" required/></td>

            </tr>

            <tr>

                <td align="center"><b>Product Description</b></td>
                <td><textarea name="product_desc" cols="20" rows="10"></textarea> </td>

            </tr>

            <tr>

                <td align="center"><b>Product Keyword</b></td>
                <td><input type="text" name="product_keywords" size="40" required/></td>

            </tr>

            <tr align="center">

                <td colspan="7"><input type="submit" name="insert_post" value="Insert Now" /></td>

            </tr>

        </table>


    </form>


</body>

</html>

<?php

    if(isset($_POST['insert_post'])){

        //Getting Text

        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $product_brand = $_POST['product_brand'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

        //Getting Image

        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp = $_FILES['product_image']['tmp_name'];

        //Inserting Data

        $insert_product = "INSERT INTO products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) VALUES ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
$result = mysqli_query($con,$insert_product);
    }

 ?>
