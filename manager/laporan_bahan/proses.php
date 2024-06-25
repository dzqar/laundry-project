<?php
// Koneksi
include '../../koneksi.php';

// Variable
$id = $_POST['id_user'];
$idb = $_POST['id_bahan'];
$nama_bahan = $_POST['nama_bahan'];
$stok =  $_POST['stok'];

// IF submit = Buat
if ($_POST['submit'] === 'Buat') {
	// jika jumlah sisa yang diinput adalah 0 maka keterangannya adalah 'Habis'
	if ($stok == 0) {
		mysqli_query($koneksi,"INSERT INTO tbl_data_bahan VALUES('','$nama_bahan','$stok',2)");
	} elseif ($stok > 0) {
		// Jika jumlah sisa yang diinput lebih dari 0 maka keterangannya adalah 'tersisa'
		mysqli_query($koneksi,"INSERT INTO tbl_data_bahan VALUES('','$nama_bahan','$stok',1)");
	}

	// Mengalihkan ke halaman utama
	header('location: ../?pesan=berhasilTambahB');

// ELSEIF submit = Edit
}elseif ($_POST['submit'] === 'Edit') {
	// Query
	mysqli_query($koneksi,"UPDATE tbl_data_bahan SET nama_bahan='$nama_bahan' WHERE id_bahan=$idb");

	header('location: ../?pesan=berhasilEditB');

// ELSEIF submit = Hapus
}elseif ($_GET['submit'] === 'Hapus') {
	// tampungan
	$id_bahan = $_GET['id_bahan'];

	// update status data tertentu menjadi batal
	$update = mysqli_query($koneksi, "DELETE FROM tbl_data_bahan WHERE id_bahan = $id_bahan");

	// mengalihkan ke halaman utama dan membuat pesan di URL
	header('location: ../?pesan=berhasilHapusB');
}

?>