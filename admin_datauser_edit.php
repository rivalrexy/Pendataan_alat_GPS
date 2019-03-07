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
			if($_SESSION['level']!="Administrator"){
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
						<a class="nav-item nav-link active" href="admin.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-item nav-link" href="admin_datauser.php">Data User</a>
					</li>
					<li class="nav-item">
						<a class="nav-item nav-link" href="admin_datagps.php">Data GPS</a>
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
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<div id="login" class="container mt-2">
			<div class="container mt-5">
				<div class="card bg-light" style="max-width: 25 rem; margin: 0 auto; float: none;">
					<div class="card-header"><i class="fas fa-plus"></i> Tambah User</div>
					<?php
					include 'koneksi.php';
					$id = $_GET['id'];
					$data = pg_query($conn,"select * from public.user where id_user='$id'");
					while($d = pg_fetch_array($data)){
					?>
						<form method="post" action="admin_datauser_editaction.php">
							<div class="card-body"> 
								<div class="form-group col-5">
									<label for="username">Username</label>
									<input type="hidden" name="id" value="<?php echo $d['id_user']; ?>">
									<input type="text" class="form-control" name="username" value="<?php echo $d['username']; ?>">
								</div>
								<div class="form-group col-5">
									<label for="password">Password</label>
									<input type="password" class="form-control" name="password" value="<?php echo $d['password']; ?>">
								</div>
								<div class="form-group col-5">
									<label for="level">Level</label>
									<select class="form-control" id="level" name="level" value="1" selected>
										<option >Administrator</option>
										<option <?php if($d['level']=="User"){?>selected <?php }?>>User</option>
									</select>
								</div>
								<div class="form-group col-5">
									<button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i>Simpan</button>
								</div>
							</div>
						</form>
						<?php 
						}
						?>
				</div>
			</div>
		</div>
	</body>
</html>