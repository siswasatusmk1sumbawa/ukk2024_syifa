<?php 
$hostname = 'localhost';
$userdb = 'root';
$passdb = '';
$namedb = 'ukk_syifa';

$koneksi = mysqli_connect($hostname,$userdb,$passdb,$namedb);

if ($koneksi) {
echo "Terhubung";
}else {
    echo "Tidak Terhubung";
}
?>