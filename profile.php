<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(function(){
			$(".datepicker").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true,
				});
			});
		</script>
		
		
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
		<link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<title>Web Aplikasi Pendataan Alat GPS</title>
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
				<div class="card bg-light" style="width: 18 rem;">
					<div class="card-header"><i class="fas fa-user"></i> Profil</div>
					<?php
					include 'koneksi.php';
					$id = $_GET['id'];
					$data = pg_query($conn,"select * from public.user where id_user='$id'");
					while($d = pg_fetch_array($data)){
					?>
						<div class="card-body"> 
							<div class="form-group col-5">
								<label for="username">Username</label><a class="btn btn-warning" style="float:right;" href="edit_profile.php?id=<?php echo $d['id_user']; ?>"><i class="fas fa-fw fa-edit"></i>Edit</a>
								<div><?php echo $d['username']; ?></div>
							</div>
							<div class="form-group col-5">
								<label for="username">Email</label>
								<div><?php echo $d['email']; ?></div>
							</div>
							<div class="form-group col-5">
								<label for="username">Alamat</label>
								<div><?php echo $d['alamat']; ?></div>
							</div>
							<div class="form-group col-5">
								<label for="buy_date">Tanggal Lahir</label>
								<div class="input-group date">
								<div><?php echo $d['tanggal_lahir']; ?></div>
								</div>
							</div>
							<div class="form-group col-5">
								<label for="password">Password</label>
								<div><?php echo $d['password']; ?></div>
							</div>
							<div class="form-group col-5">						
									<label for="picture">Photo Profile</label>
									<img id="preview" src="<?php echo "file/".$d['photo']; ?>" alt="" width="320px"/>
								</br>
							</div>
						</div>
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