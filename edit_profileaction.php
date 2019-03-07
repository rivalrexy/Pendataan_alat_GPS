<?php 
	include 'koneksi.php';
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$alamat = $_POST['alamat'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$photo = $_POST['photo'];
	if(isset($_POST['ubah_picture'])){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'file/'.$nama);
					$query=pg_query($conn,"update public.user set username='$username', password='$password', email='$email', alamat='$alamat', tanggal_lahir='$tanggal_lahir', photo='$nama' where id_user=$id");
					if($query){
						header("location:profile.php?id=$id");
					}else{
						//echo $id;
						header("location:edit_profile.php?id=$id&pesan=gagal");
					}
				}else{
					header("location:edit_profile.php?id=$id&pesan=besar");
				}
			}else{
				header("location:edit_profile.php?id=$id&pesan=salah");
			}	
	}
	else{
			$query=pg_query($conn,"update public.user set username='$username', password='$password', email='$email', alamat='$alamat', tanggal_lahir='$tanggal_lahir' where id_user=$id");
			if($query){
				header("location:profile.php?id=$id");
			}else{
				//echo $id;
				header("location:edit_profile.php?id=$id&pesan=gagal");
			}
	}
?>