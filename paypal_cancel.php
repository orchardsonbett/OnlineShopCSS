<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title>Payment Successful!</title>
</head>
<body>
<h2>hey, <?php echo $_SESSION['customer_email'];?> Your payment was cancelled.</h2>
<h3>Your payment was not successful, Please go to shop</h3>
<h3><a href="index.php">Go back</a>
</body>
</html>