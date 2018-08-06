<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="styles/style_login.css" media="all">
</head>
<body>

<div class="login">

<h2 style="color: white; text-align: center;">	<?php echo @$_GET['not_admin']; ?></h2>
<h2 style="color: white; text-align: center;"><?php echo @$_GET['logged_out']; ?></h2>
	<h1>Admin Login</h1>
    <form method="post">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="pass" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Let me in.</button>
    </form>
</div>

</body>
</html>
<?php
include('includes/db.php');
 
if (isset($_POST['login'])) {
	$email=mysqli_real_escape_string($con, $_POST['email']);
	$pass=mysqli_real_escape_string($con, $_POST['pass']);

	$sel_admin="select * from admins where admin_email='$email' AND admin_pass='$pass'";
	$run_admin=mysqli_query($con, $sel_admin);
	$check_admin=mysqli_num_rows($run_admin);
	if ($check_admin==0) {
		echo "<script>alert('Password or Email is not correct')</script>";
		# code...=
	}
	else{
		$_SESSION['admin_email']=$email;
		echo "<script>window.open('index.php?logged_in=You have successfully logged in','_self')</script>";
	}
}
?>