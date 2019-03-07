<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="assets/datepicker/css/bootstrap-datepicker.min.css">
		<script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>
		<title>Web Aplikasi Pendataan Alat GPS</title>
		
		<script type="text/javascript">
			$(function(){
			$(".datepicker").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true,
				});
			});
		</script>
		
		<script>document.file.submit();</script>
		
		<script>
            function tampilkanPreview(gambar,idpreview){
                var gb = gambar.files;
                for (var i = 0; i < gb.length; i++){
                    var gbPreview = gb[i];
                    var imageType = /image.*/;
                    var preview=document.getElementById(idpreview);            
                    var reader = new FileReader();
                    if (gbPreview.type.match(imageType)) {
                        preview.file = gbPreview;
                        reader.onload = (function(element) { 
                            return function(e) { 
                                element.src = e.target.result; 
                            }; 
                        })(preview);
                        reader.readAsDataURL(gbPreview);
                    }else{
                        alert("Type file tidak sesuai. Khusus image.");
                    } 
                }    
            }
        </script>
		
	</head>
	<body>
		<?php 
		session_start();
		if($_SESSION['level']==""){
			header("location:index.php?pesan=belum_login");
		}else
			if($_SESSION['level']!="User"){
			header("location:index.php?pesan=belum_login");
			}
		?>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-item nav-link active" href="user.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-item nav-link" href="user_datagps.php">Data GPS</a>
					</li>
				</ul>	
			</div>
			<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" style="left:auto; right:0px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  <?php echo $_SESSION['username']; ?> (<?php echo $_SESSION['level']; ?>)
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['id_user'];?>">Edit Profile</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<div id="login" class="container mt-2">
			<div class="container mt-5">
				<div class="card bg-light" style="max-width: 25 rem; margin: 0 auto; float: none;">
					<div class="card-header"><i class="fas fa-plus"></i> Tambah GPS</div>
					<?php
					include 'koneksi.php';
					$id = $_GET['id'];
					$data = pg_query($conn,"select * from public.gps where id_gps='$id'");
					while($d = pg_fetch_array($data)){
					?>
					<form method="post" action="user_datagps_editaction.php" enctype="multipart/form-data">
						<div class="card-body"> 
							<div class="form-group col-5">
								<label for="brand">Brand</label>
								<input type="hidden" name="id" value="<?php echo $d['id_gps']; ?>">
								<input type="text" class="form-control" name="brand" value="<?php echo $d['brand_gps']; ?>">
							</div>
							<div class="form-group col-5">
								<label for="model">Model</label>
								<input type="text" class="form-control" name="model" value="<?php echo $d['model_gps']; ?>">
							</div>
							<div class="form-group col-5">
								<label for="gps_name">GPS Name</label>
								<input type="text" class="form-control" name="gps_name" value="<?php echo $d['gps_name']; ?>">
							</div>
							<div class="form-group col-2">
								<div class="input-group date">
								<label for="waranty_month">Waranty Month</label>
								<select class="custom-select" name="waranty_month">
									<?php $a=1; for($i=1;$i<=12;$i++){?>
									<option <?php if($d['waranty_month']==$a){?>selected ><?php echo $a; };?></option>
									<?php echo $a++;}; ?>
								</select>
								<div class="input-group-text">Month</div>
								</div>
							</div>
							<div class="form-group col-5">
								<label for="buy_date">Buy Date</label>
								<div class="input-group date">
								<div class="input-group-text"><i class="fas fa-fw fa-table"></i></div>
								<input type="text" class="form-control datepicker" name="buy_date" value="<?php echo $d['buy_date']; ?>">
								</div>
							</div>
							<div class="form-group col-5">
								<label for="buy_date">Sold Date</label>
								<div class="input-group date">
								<div class="input-group-text"><i class="fas fa-fw fa-table"></i></div>
								<input type="text" class="form-control datepicker" name="sold_date" value="<?php echo $d['sold_date']; ?>">
								</div>
							</div>
							<div class="form-group col-5">
								<label for="sold_to">Sold To</label>
								<input type="text" class="form-control" name="sold_to" value="<?php echo $d['sold_to']; ?>">
							</div>
							
							<div class="form-group col-5">						
									<label for="picture">Upload Picture (Max 1 MB)</label>
									<input type="file"  name="file" accept="image/*"  onchange="tampilkanPreview(this,'preview')"/><br>
									<input type="checkbox" name="ubah_picture" value="true"> Checklist jika ingin mengubah foto
									<img id="preview" src="<?php echo "file/".$d['picture']; ?>" alt="" width="320px"/>
								</br>
							<?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan'] == "gagal"){
								echo "Upload Gagal!!!";
								}else if($_GET['pesan'] == "besar"){
								echo "File melebihi 1 MB!!!";
								}else if($_GET['pesan'] == "salah"){
								echo "File harus berupa gambar!!!";
								}
							}
							?>
							</div>
							<div class="form-group col-5">
								<label for="description">Description</label>
								<textarea type="text" rows="5" class="form-control" name="description" ><?php echo $d['description']; ?></textarea>
							</div>
								
							<div class="form-group col-5">
								<button type="submit" name="picture" class="btn btn-primary"><i class="fas fa-fw fa-save"></i>Simpan</button>
							</div>
						</div>
					</form>
					<?php 
					}
					?>
				</div>
			</div>
		</div>	
		<footer class="sticky-footer">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>&copy; 2019 Design By Rival Dwi Rexy</span>
				</div>
			</div>
        </footer>
	</body>
</html>