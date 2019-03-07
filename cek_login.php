<?php 
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$login = pg_query($conn,"select * from public.user where username='$username' and password='$password'");
$cek = pg_num_rows($login);
if($cek > 0){ 
	$data = pg_fetch_assoc($login);
	if($data['level']=="Administrator"){
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $data[id_user];
		$_SESSION['level'] = "Administrator";
		header("location:admin.php");
	}else if($data['level']=="User"){
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $data[id_user];
		$_SESSION['level'] = "User";
		header("location:user.php");
	}else{
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
?>
