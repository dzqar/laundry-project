<?php 
// Koneksi
include '../../koneksi.php';

// Menampung id_transaksi dari link
$id_transaksi = $_GET['id_transaksi'];

// IF submit = 'Selesai'
if ($_GET['submit'] === 'Selesai') {
	// update status transaksi menjadi 'Selesai'
	mysqli_query($koneksi, "UPDATE tbl_transaksi SET status = 2 WHERE id_transaksi = '$id_transaksi'");

	// Mengalihkan ke halaman utama dan membuat pesan di URL
	header('location: ../?pesan=berhasilSelesaiTransaksi');

// submit = 'Batal'
}elseif ($_GET['submit'] === 'Batal') {
	// Menampung id_pesan dari link
	$id_pesan = $_GET['id_pesan'];

	// Update status data transaksi menjadi 'batal'
	mysqli_query($koneksi, "UPDATE tbl_transaksi SET status = 3 WHERE id_transaksi = '$id_transaksi'");

	// Update status data pesanan menjadi 'Selesai' kembali
	mysqli_query($koneksi, "UPDATE tbl_pesan SET status = 3 WHERE id_pesan = '$id_pesan'");

	// Mengalihkan ke halaman utama dan membuat pesan di URL
	header('location: ../?pesan=berhasilBatalTransaksi');
}

?>