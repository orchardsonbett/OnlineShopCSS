<?php
session_start();
session_destroy();
echo "<script>window.open('admin_login.php?logged_out=You have logged out','_self')</script>";
?>