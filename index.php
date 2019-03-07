<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<title>Web Aplikasi Pendataan Alat GPS</title>
	</head>
<body>
	<div id="login" class="container mt-2">
		<div class="container mt-5">
			<form method="post" action="cek_login.php" class="contact-form bg-white">
				<div class="card bg-light mb-3" style="max-width: 25rem; margin: 0 auto; float: none;">
					<div class="card-header">Login</div>
					<div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Enter Username">
						</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
					</div>
	<?php 
		if(isset($_GET['pesan'])){
		  if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		  }else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		  }else if($_GET['pesan'] == "belum_login"){
			echo "Anda belum login !!!";
		  }
		}
	?>
						<br/>
						<button type="submit" class="btn btn-primary">Sign In</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<nav class="navbar bottom navbar-light bg-light">
		<a class="navbar-brand" style="position: absolute; left: 50%;transform: translateX(-50%);" href="#">&copy; 2019 Design By Rival Dwi Rexy</a>
	</nav>
</body>
</html>