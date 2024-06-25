<?php
error_reporting(0);
$host="localhost";
$user="root";
$pass="";
$database="laundry2"; //Ganti database sesuai kebutuhan

$koneksi = mysqli_connect($host,$user,$pass,$database);
if (!$koneksi) {
	echo "Koneksi gagal";
}
?>
