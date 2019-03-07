<?php 
	include 'koneksi.php';
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$level = $_POST['level'];
	pg_query($conn,"update public.user set username='$username', password='$password', level='$level' where id_user=$id");
	header("location:admin_datauser.php");
?>