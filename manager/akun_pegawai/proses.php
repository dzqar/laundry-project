<?php
// Koneksi
include '../../koneksi.php';

// Variable
$id = $_POST['id_user'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_tlp = $_POST['no_tlp'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$noTlp = $_POST['no_tlp'];

// IF submit = Buat
if ($_POST['submit'] == 'Buat') {
	// Kondisi jika username sudah/pernah terdaftar
	$check = mysqli_query($koneksi,"SELECT username FROM tbl_user WHERE username='$username'");
	if (mysqli_num_rows($check) > 0) {
	// Jika sudah ada, maka dikembalikan ke halaman daftar.php dengan alert di URL
		header('location:daftar.php?alert=gagal');
	}else{
	// Menginput data ke database tbl_user
		mysqli_query($koneksi,"INSERT INTO tbl_user values(NULL,'$nama','$alamat','$no_tlp','$username','$password','$level','default.png')");
	// Mengalihkan halaman ke halaman utama
		header('location:../?pesan=berhasilBuatAkun');
	}

// ELSEIF submit = Ubah
}elseif ($_POST['submit'] == 'Ubah') {
	// Update akun dengan id_user yang dipilih
	mysqli_query($koneksi,"UPDATE tbl_user SET level='$level', password='$password' WHERE id_user='$id'");
	// Mengalihkan ke halaman utama dan membuat pesan di URL
	header('location:../?pesan=berhasilUbahAkun');

// ELSEIF submit = Hapus
}elseif ($_GET['submit'] == 'Hapus') {
	// Tampungan
	$id_pegawai = $_GET['id_user'];

	// Menghapus riwayat pesanan yang kondisinya statusnya transaksi dan tgl pengambilannya kurang dari hari ini
	mysqli_query($koneksi,"DELETE FROM tbl_user WHERE id_user='$id_pegawai'");

	// Mengalihkan ke halaman utama dan membuat pesan di URL
	header('location: ../?pesan=berhasilhPeg');
}

?>