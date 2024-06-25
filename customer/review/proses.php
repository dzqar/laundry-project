<?php
// Koneksi
include '../../koneksi.php';

// Variable
$id_pesan = $_POST['id_pesan'];
$id_customer = $_POST['id_customer'];
$ulasan = $_POST['ulasan'];
$rating = $_POST['rating'];

// Query
mysqli_query($koneksi,"INSERT INTO tbl_review VALUES(NULL,'$id_customer','$id_pesan','$ulasan','$rating')");

// Alihkan ke halaman utama
header('location: ../?pesan=berhasilReview');

?>