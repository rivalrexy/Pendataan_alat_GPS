<?php 
	include 'koneksi.php';
	$brand = $_POST['brand'];
	$model = $_POST['model'];
	$gps_name = $_POST['gps_name'];
	$waranty_month = $_POST['waranty_month'];
	$buy_date = $_POST['buy_date'];
	$sold_date = $_POST['sold_date'];
	$sold_to = $_POST['sold_to'];
	$picture=$_POST['picture'];
	$description = $_POST['description'];
	//if($brand){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'file/'.$nama);
					$query = pg_query($conn,"insert into public.gps(brand_gps,model_gps,gps_name,waranty_month,buy_date,sold_date,sold_to,picture,description) values('$brand','$model','$gps_name','$waranty_month','$buy_date','$sold_date','$sold_to','$nama','$description')");
					if($query){
						header("location:user_datagps.php");
					}else{
						header("location:user_datagps_tambah.php?pesan=gagal");
					}
				}else{
					header("location:user_datagps_tambah.php?pesan=besar");
				}
			}else{
				header("location:user_datagps_tambah.php?pesan=salah");
			}
	//}
?>