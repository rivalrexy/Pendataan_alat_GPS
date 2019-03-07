<?php 
	include 'koneksi.php';
	$id= $_GET['id'];
	pg_query($conn,"delete from public.gps where id_gps='$id'");
	header("location:user_datagps.php");
?>