<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title>Payment Successful!</title>
</head>
<body>
<h2>welcome <?php echo $_SESSION['customer_email'];?></h2>
<h3>Your payment was successful, Please go to your account</h3>
<h3><a href="customer/my_account.php">Go to your account</a>
</body>
</html>