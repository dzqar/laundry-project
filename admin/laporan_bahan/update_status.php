<?php
// Koneksi
include '../../koneksi.php';

// Variable
$id_bahan = $_POST['id_bahan'];
$stok = $_POST['stok'];
$stoktambah = $_POST['stoktambah'];

// Rumus
$rumus = $stok + $stoktambah;
$cek = mysqli_query($koneksi, "UPDATE tbl_data_bahan SET stok='$rumus', status='1' WHERE id_bahan='$id_bahan'");
if ($cek) {
	# Jika berhasil
header('location: ../?pesan=berhasilUpData');
}else{
	// Jika gagal
header('location: ../?pesan=gagalUpData');
}
?>