<?php 
session_start();
if ($_SESSION['status'] != 'login') {
	echo "<script>
	alert('Anda belum Login!');
	location.href='../index.php';
	</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website Galeri Foto</title>
	<link rel="stylesheet" type="text/css" href="../aset/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container">
    <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
    <div class="navbar-nav me-auto">
        <a href="album.php" class="nav-link">Album</a>
		<a href="foto.php" class="nav-link">Photos</a>
    </div>
    <a href="../config/aksi_logout.php" class="btn btn-outline danger m-1">Logout</a>
    </div>
</div>
</nav>

<div class="container mt-3">
	<div class="row">
		<div class="col-md-3">
		<div class="card">
			<img src="" class="card-img-top" title="" style="height: 12rem;">
			<div class="card-footer text-center">
				<a href="">10 Suka</a>
				<a href="">3 Komentar</a>
			</div>
		</div>
		</div>
	</div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
	<p>&copy; UKK RPL 2024 | Syifa Ayudiva</p>
</footer>

<script type="text/javascript" src="../aset/js/bootstrap.min.js"></script><title></title>
</body>
</html>