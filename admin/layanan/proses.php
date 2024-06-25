<?php
// Koneksi
include '../../koneksi.php';

// Variable
$il = $_POST['id_layanan'];
$nl = $_POST['nama_layanan'];
$harga = $_POST['harga'];
$estimasi = $_POST['estimasi'];
$jenis_layanan = $_POST['jenis_layanan'];

// Buat Layanan
if ($_POST['submit'] == 'Buat Layanan') {
	// Ngecek nama_layanan, apakah sudah ada atau belum
	$cek = mysqli_query($koneksi, "SELECT nama_layanan FROM tbl_layanan WHERE nama_layanan = '$nl'");
	if ($cek < 0) {
	# jika sudah ada, maka akan gagal
		header('location: ../?pesan=gagalInputLay');
	}else{
		mysqli_query($koneksi, "INSERT INTO tbl_layanan VALUES('','$nl','$harga','$jenis_layanan','$estimasi')");
		header('location: ../?pesan=berhasilInputLay');
	}

// Edit Layanan
}elseif ($_POST['submit'] == 'Edit') {
	// Update data tertentu di tbl_layanan
	mysqli_query($koneksi,"UPDATE tbl_layanan SET nama_layanan='$nl', harga='$harga', estimasi='$estimasi' , jenis_layanan='$jenis_layanan' WHERE id_layanan='$il'");

	// mengalihkan ke halaman utama dan membuat pesan di URL
	header('location: ../?pesan=berhasilEditLay');

// Hapus Layanan
}elseif ($_GET['submit'] == 'Hapus') {
	$id_layanan = $_GET['id_layanan'];
	
	// Menghapus data tertentu dari tbl_layanan
	mysqli_query($koneksi,"DELETE FROM tbl_layanan WHERE id_layanan='$id_layanan'");

	// Mengalihkan ke halaman utama dan membuat pesan di URL
	header('location: ../?pesan=berhasilHapusL');
}

?>