<?php
// Koneksi
include '../../koneksi.php';

// Menghapus data di tbl_transaksi yang statusnya sudah selesai dan sesuai id_kasir yang melayani
mysqli_query($koneksi,"DELETE FROM tbl_transaksi WHERE status=2");

// Mengalihkan ke halaman utama dan membuat pesan di URL
header('location: ../?pesan=berhasilHapusTransaksi');
?>