<?php
// Koneksi
include '../../koneksi.php';

// Variable
$ip = $_GET['id_pesan'];
$submit = $_GET['submit'];
$id_kasir = $_GET['id_kasir'];

if ($submit === "Terima") {
	# Update statu menjadi 'Terima'
	mysqli_query($koneksi,"UPDATE tbl_pesan SET status=2, id_kasir='$id_kasir' WHERE id_pesan='$ip'");
	// Mengalihkan ke halaman utama dan membuat pesan di URL
	header('location: ../?pesan=berhasilTerimaPesanan');
}elseif ($submit === "Selesaikan") {
	// Update status pesanan tertentu menjadi 'selesai'
	mysqli_query($koneksi, "UPDATE tbl_pesan SET status=3 WHERE id_pesan = '$ip'");
	// Mengalihkan ke halaman utama dan membuat pesan di URL
	header('location: ../?pesan=berhasilSelesaiPesanan');
}elseif ($submit === "Batal") {
	// Update status pesanan tertentu menjadi 'batal' dan id_kasir
	mysqli_query($koneksi, "UPDATE tbl_pesan SET status=4, id_kasir='$id_kasir' WHERE id_pesan = '$ip'");
	// Mengalihkan ke halaman utama dan membuat pesan di URL
	header('location:../?pesan=berhasilBatalPesanan');
}elseif ($submit === "Hapus") {
	// Menghapus riwayat pesanan yang kondisinya statusnya transaksi dan tgl pengambilannya kurang dari hari ini
	mysqli_query($koneksi,"DELETE FROM tbl_pesan WHERE id_kasir IN($id_kasir,0) AND status IN(4,5) AND tgl_pengambilan < NOW()");

	// Mengalihkan ke halaman utama dan membuat pesan di URL
	header('location: ../../?pesan=berhasilHapusPesanan');
}



?>