<?php
$hostname = 'localhost';
$userdb = 'root';
$passdb = '';
$namedb = 'ukk_s';

$koneksi = mysqli_connect($hostname, $userdb, $passdb, $namedb);

if (!$koneksi) {
    echo "Tidak Terhubung";
} 
// else {
//     echo "Terhubung";
// }
