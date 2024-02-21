<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
	$judulfoto = $_POST['judulfoto'];
	$deskripsifoto = $_POST['deskripsifoto'];
	$tanggalunggah = date('Y-m-d'); //kesalahan sintaks date
	$albumid = $_POST['albumid'];
	$userid = $_SESSION['userid'];
	$foto = $_FILES['userid'];
	$tmp = $_FILES['lokasifile']['tmp_name'];
	$lokasi = '../aset/img/';
	$namafoto = rand() . '-' . $foto;

	move_uploaded_file($temp, $lokasi . $namafoto);

	$sql = mysqli_query($koneksi, "INSERT INTO foto VALUES ('','$judulfoto','$deskripsifoto','$tanggalunggah','$namafoto','$albumid','$userid')");

	echo "<script>
	alert('Data berhasil disimpan!');
	location.href='../admin/foto.php';
	</script>";
}

if (isset($_POST['edit'])) {
	$fotoid = $_POST['fotoid'];
	$judulfoto = $_POST['judulfoto'];
	$deskripsifoto = $_POST['deskripsifoto'];
	$tanggalunggah = date('Y-m-d');
	$albumid = $_POST['albumid'];
	$userid = $_SESSION['userid'];
	$foto = $_FILES['userid'];
	$tmp = $_FILES['lokasifile']['tmp_name'];
	$lokasi = '../aset/img/';
	$namafoto = rand() . '-' . $foto;

	if ($foto == null) {
		$sql - mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$judulfoto', DeskripsiFoto='$deskripsifoto', TanggalUnggah='$tanggalunggah', AlbumID='$albumid' WHERE FotoID='$fotoid'"); //banyak ketidaksesuaian dengan nama kolom pada tabel foto
	} else {
		$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$fotoid'"); //kesalahan nama kolom
		$data = mysqli_fetch_array($query);
		if (is_file('../aset/img/' . $data['LokasiFile'])) {
			unlink('../aset/img/' . $data['LokasiFile']);
		}
		move_uploaded_file($temp, $lokasi . $namafoto);
		$sql = mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$judulfoto', DeskripsiFoto='$deskripsifoto', TanggalUnggah='$tanggalunggah', LokasiFile='$namafile', AlbumID='$albumid' WHERE FotoID='$fotoid'");
	}
	echo "<script>
	alert('Data berhasil diperbarui!');
	location.href='../admin/foto.php';
	</script>";
}

if (isset($_POST['hapus'])) {
	$fotoid = $_POST['fotoid'];
	$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$fotoid'");
	$data = mysqli_fetch_array($query);
	if (is_file('../aset/img/' . $data['LokasiFile'])) {
		unlink('../aset/img/' . $data['LokasiFile']);
	}
	$sql = mysqli_query($koneksi, "DELETE FROM foto WHERE FotoID='$fotoid'");
	echo "<script>
	alert('Data berhasil dihapus!');
	location.href='../admin/foto.php';
	</script>";
}
