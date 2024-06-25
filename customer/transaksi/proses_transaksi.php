<?php
// Koneksi
include '../../koneksi.php';

// Variable
$ip = $_POST['id_pesan'];
$ik = $_POST['id_kasir'];
$id = $_POST['id_customer'];
$total = $_POST['total_biaya'];
$metodeBayar = $_POST['metode_pembayaran'];

// Menambah data ke tbl_transaksi
$cek = mysqli_query($koneksi,"INSERT INTO tbl_transaksi VALUES('','$ik','$ip','$id',NOW(),'$metodeBayar','$total','1')");
if ($cek) {
	// Jika berhasil
header('location: ../?pesan=berhasilTransaksi');
}else{
	// Jika gagal
header('location: ../?pesan=gagalTransaksi');
}
?>