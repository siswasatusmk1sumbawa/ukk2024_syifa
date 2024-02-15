<?php 
session_start();
include '../config/koneksi.php';
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
        <a href="album.php" class="nav-link">Albums</a>
		<a href="foto.php" class="nav-link">Photos</a>
    </div>
    <a href="../config/aksi_logout.php" class="btn btn-outline danger m-1">Logout</a>
    </div>
</div>
</nav>


<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="card mt-2">
				<div class="card-header">Tambah Foto</div>
					<div class="card-body">
						<form action="../config/aksi_foto.php" method="POST">
							<label class="form-label">Judul Foto</label>
							<input type="text" name="judulfoto" class="form-control" required>
							<label class="form-label">Deskripsi</label>
							<textarea class="form_control"
							name="deskripsifoto" required></textarea>
                            <label class="form-label">Album</label>
                            <select class="form-control" name="albumid">
                            <?php
                            $sql_album = mysqli_query($koneksi, "SELECT * FROM album");
                            while($data_album = mysqli_fetch_array($sql_album)) {?>
                            <option value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum']?></option>
                            <?php } ?>
							</select>
                            <label class="form-label">File</label>
							<input type="file" class="form-control"  name="lokasifile" required>
        
							<button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
						</form>
					</div>
				</div>
		</div>
		<div class="col-md-8">
			<div class="card mt-2">
				<div class="card-header">Data Galeri Foto</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Foto</th>
								<th>Judul Foto</th>
								<th>Deskripsi</th>
								<th>Tanggal</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$userid = $_SESSION['userid'];
							$sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
							while ($data = mysqli_fetch_array($sql)) {
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><img src="../aset/img/<?php echo $data['lokasifile'] ?>" width="100"></td>
								<td><?php echo $data['judulfoto'] ?></td>
								<td><?php echo $data['deskripsifoto'] ?></td>
								<td><?php echo $data['tanggalunggah'] ?></td>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit <?php echo $data['fotoid']; ?>">
Edit
</button>
<div class="modal fade" id="edit <?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="../config/aksi_foto.php" method="POST">
        <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
        <label class="form-label">Judul Foto</label>
							<input type="text" name="judulfoto" value="<?php echo $data ['judulfoto'] ?>" class="form-control" required>
							<label class="form-label">Deskripsi</label>
							<textarea class="form_control"
							name="deskripsifoto" required><?php echo $data ['deskripsifoto'] ?></textarea>
							<label class="form-label">Album</label>
                            <select class="form-control" name="albumid">
                            <?php
                            $sql_album = mysqli_query($koneksi, "SELECT * FROM album");
                            while($data_album = mysqli_fetch_array($sql_album)) {?>
                            <option <?php if($data_album ['albumid'] == $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum']?></option>
                            <?php } ?>
							</select>
							<label class="form-label">Foto</label>
							<div class="row">
							<div class="col-md-4">
								<img src="../aset/img/<?php echo $data['lokasifile'] ?>" width="100">
							</div>
							<div class="col-md-8">
							<label class="form-label">File</label>
							<input type="file" class="form-control"  name="lokasifile">

							</div>
							</div>
    </div>
    <div class="modal-footer">
        <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
        </form>
    </div>
    </div>
</div>
</div>
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus <?php echo $data['fotoid']; ?>">
Edit
</button>
<div class="modal fade" id="hapus <?php echo $data['fotoid']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="../config/aksi_foto.php" method="POST">
        <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
						Apakah anda yakin ingin menghapus foto ini <strong> <?php echo $data['judulfoto'] ?></strong> ?
    </div>
    <div class="modal-footer">
        <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
        </form>
    </div>
    </div>
</div>
</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
		</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
	<p>&copy; UKK RPL 2024 | Syifa Ayudiva</p>
</footer>

<script type="text/javascript" src="../aset/js/bootstrap.min.js"></script><title></title>
</body>
</html>