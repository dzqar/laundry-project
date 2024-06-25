<?php
// Koneksi
include '../../koneksi.php';

// Variable
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_tlp = $_POST['no_tlp'];
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

// Cek tbl_user berdasarkan username
$check = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username='$username'");

// Kondisi jika username sudah/pernah terdaftar
if (mysqli_num_rows($check) > 0) {
	// Mengalihkan ke halaman daftar.php dan memberi pesan jika ada username yang terdaftar sebelumnya
	header('location:daftar.php?pesan=usernameAlready');
}else{
	// Menginput data ke database tbl_user jika tidak ada data yang sama
	mysqli_query($koneksi,"INSERT INTO tbl_user values('','$nama','$alamat','$no_tlp','$username','$password',4,'default.png')");
	// Mengalihkan halaman ke index.php
	header('location:../login/login.php');
}
?>