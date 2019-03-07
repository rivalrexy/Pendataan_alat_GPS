<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script>
			function konfirmasi(){
				tanya = confirm("Anda Yakin Akan Menghapus Data ?");
				if (tanya == true) return true;
				else return false;}
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
					<div class="card-header"><i class="fas fa-table"></i> Data GPS</div>
					<div class="card-body">
						<a class="btn btn-primary" href="admin_datagps_tambah.php"><i class="fas fa-fw fa-plus"></i>Tambah</a><br></br>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
										  <th>No</th>
										  <th>Brand</th>
										  <th>Model</th>
										  <th>Name</th>
										  <th>Waranty</th>
										  <th>Buy Date</th>
										  <th>Sold Date</th>
										  <th>Sold To</th>
										  <th>Picture</th>
										  <th>Description</th>
										  <th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include 'koneksi.php';
										$no = 1;
										$data = pg_query($conn,"select * from public.gps");
										while($d = pg_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['brand_gps']; ?></td>
											<td><?php echo $d['model_gps']; ?></td>
											<td><?php echo $d['gps_name']; ?></td>
											<td><?php echo $d['waranty_month']; ?></td>
											<td><?php echo $d['buy_date']; ?></td>
											<td><?php echo $d['sold_date']; ?></td>
											<td><?php echo $d['sold_to']; ?></td>
											<td><img src="<?php echo "file/".$d['picture']; ?>" width='100' height='100'></td> 
											<td><?php echo $d['description']; ?></td>
											<td>
												<a class="btn btn-warning" href="admin_datagps_edit.php?id=<?php echo $d['id_gps']; ?>"><i class="fas fa-fw fa-edit"></i></a>
												<a class="btn btn-danger" onclick="return konfirmasi()" href="admin_datagps_hapus.php?id=<?php echo $d['id_gps']; ?>"><i class="fas fa-fw fa-trash"></i></a>
											</td>
										</tr>
										<?php 
										}
										?>
									</tbody>
								</table>
							</div>
					</div>
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