<?php
// Koneksi
include '../../koneksi.php';

// Variable
$submit = $_GET['submit'];
$nama_metode = $_GET['nama_metode'];
$id_data_metode = $_GET['id_data_metode'];
$harga = $_GET['harga'];
$estimasi = $_GET['estimasi'];
$jenis_metode = $_GET['jenis_metode'];

// Jika submit=Tambah
if ($submit === 'Tambah') {
	mysqli_query($koneksi,"INSERT INTO tbl_data_metode VALUES(NULL,'$jenis_metode','$nama_metode','$estimasi','$harga')");
	header('location: ../?pesan=berhasilTambahM');

// ELSEIF Edit
}elseif ($submit === 'Edit') {
	mysqli_query($koneksi,"UPDATE tbl_data_metode SET nama_data_metode='$nama_metode', harga='$harga', estimasi='$estimasi', id_metode='$jenis_metode' WHERE id_data_metode='$id_data_metode'");
	header('location: ../?pesan=berhasilEditM');

// ELSEUF Hapus
}elseif ($submit === 'Hapus') {
	mysqli_query($koneksi,"DELETE FROM tbl_data_metode WHERE id_data_metode='$id_data_metode'");
	header('location: ../?pesan=berhasilHapusM');
}


?>