<?php 
	include 'koneksi.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	pg_query($conn,"insert into public.user(username,password,level) values('$username','$password','$level')");
	header("location:admin_datauser.php");
?>