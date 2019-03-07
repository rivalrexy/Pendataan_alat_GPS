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
		<div class="jumbotron jumbotron-fluid">
			<div class="container mt-2">	
				<h1>Halaman User</h1>
				<p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
			</div>
		</div>
		<br/>
		<br/>
		
		<div style="text-align: center;vertical-align: middle;">
			&copy; 2019 Design By Rival Dwi Rexy
		</div>	
	</body>
</html>