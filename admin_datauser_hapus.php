<?php 
	include 'koneksi.php';
	$id = $_GET['id'];
	pg_query($conn,"delete from public.user where id_user=$id");
	header("location:admin_datauser.php");
?>