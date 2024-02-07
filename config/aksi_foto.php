<?php 
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
	$judulfoto = $_POST['judulfoto'];
	$deskripsifoto = $_POST['deskripsifoto'];
	$tanggalunggah = date['Y-m-d'];
    $albumid = $_POST['albumid'];
	$userid = $_SESSION['userid'];
    $foto = $_FILES['userid'];
    $tmp = $_FILES['lokasifile'] ['tmp_name'];
    $lokasi = '../aset/img/';
    $namafoto = rand(). '-'.$foto;

    move_uploaded_file($temp, $lokasi.$namafoto);

	$sql = mysqli_query($koneksi,"INSERT INTO foto VALUES ('','$judulfoto','$deskripsifoto','$tanggalunggah','$albumid','$userid')");

	echo "<script>
	alert('Data berhasil disimpan!');
	location.href='../admin/foto.php';
	</script>";
}