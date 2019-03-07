<?php 
	include 'koneksi.php';
	$id = $_POST['id'];
	$brand = $_POST['brand'];
	$model = $_POST['model'];
	$gps_name = $_POST['gps_name'];
	$waranty_month = $_POST['waranty_month'];
	$buy_date = $_POST['buy_date'];
	$sold_date = $_POST['sold_date'];
	$sold_to = $_POST['sold_to'];
	$picture=$_POST['picture'];
	$description = $_POST['description'];
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
					$query=pg_query($conn,"update public.gps set brand_gps='$brand', model_gps='$model', gps_name='$gps_name', waranty_month='$waranty_month', buy_date='$buy_date', sold_date='$sold_date', sold_to='$sold_to', picture='$nama', description='$description' where id_gps=$id");
					if($query){
						header("location:admin_datagps.php");
					}else{
						//echo $nama;
						header("location:admin_datagps_edit.php?id=$id&pesan=gagal");
					}
				}else{
					header("location:admin_datagps_edit.php?id=$id&pesan=besar");
				}
			}else{
				header("location:admin_datagps_edit.php?id=$id&pesan=salah");
			}	
	}
	else{
			$query=pg_query($conn,"update public.gps set brand_gps='$brand', model_gps='$model', gps_name='$gps_name', waranty_month='$waranty_month', buy_date='$buy_date', sold_date='$sold_date', sold_to='$sold_to' , description='$description' where id_gps=$id");
			if($query){
				header("location:admin_datagps.php");
			}else{
				//echo $nama;
				header("location:admin_datagps_edit.php?id=$id&pesan=gagal");
			}
	}
?>