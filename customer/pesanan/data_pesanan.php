<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<style>
		main {
			/*top: 50%;*/
			left: 50%;
			position: absolute;
			transform: translate(-50%,0);
			font-size: 19px;
		}
		footer {
			position: fixed;  
			left: 10px;  
			bottom: 5px;  
			right: 10px;
			text-align: center;  
		}
	</style>
	<header>
		<table border="0" width="100%">
			<tr>
				<th align="left" style="font-size: 26px;">JIT Laundry</th>
				<td align="right">Jalan Pakai Kaki, Jawa Barat, Indonesia</td>
			</tr>
		</table>
	</header>
	<hr>
	<center>
		<h1>Data Pesanan</h1>
	</center>
	<main>
		<!-- Menampilkan data dari tbl_pesan dan INNER JOIN tbl_user dengan menyamakan column yang bersangkutan dan berdasarkan id_customer dan id_pesan dari tbl_pesan -->
		<?php
		// Koneksi
		include '../../koneksi.php';

		// Variable
		$id_pesan=$_POST['id_pesan'];
		$id_customer=$_POST['id_customer'];

		// Query
		$data = mysqli_query($koneksi,"SELECT 
			id_pesan as ip, 
			nama_layanan as nl, 
			jumlah as jmlh,
			metode_pengambilan as ma,
			metode_pencucian as mc,
			tgl_pesan as tglP,
			tgl_pengambilan as tglA,
			total_biaya as total,
			tbl_user.nama as namaC,
			tbl_user.alamat as lokasi,
			tbl_user.no_tlp as tlp,
			tbl_user.id_user as iu
			FROM tbl_pesan INNER JOIN tbl_user ON tbl_pesan.id_customer=tbl_user.id_user WHERE tbl_pesan.id_customer='$id_customer' AND tbl_pesan.id_pesan='$id_pesan'");
		// Loop
		while ($d = mysqli_fetch_array($data)) {
			?>
			<p>Nama : <?= $d['namaC']?></p>
			<p>Alamat : <?= $d['lokasi']?></p>
			<p>Nomor Telepon : <?= $d['tlp']?></p>
			<p>Nomor Customer : <?= $d['iu']?></p>
			<p>Nomor Pesanan : <?= $d['ip']?></p>
			<p>Nama Layanan : <?= $d['nl']?></p>
			<p>Jumlah yang dipesan : <?= $d['jmlh']?></p>
			<p>Metode Pengambilan : <?= $d['ma']?></p>
			<p>Metode Pencucian : <?= $d['mc']?></p>
			<p>Tanggal Pesan : <?= $d['tglP']?></p>
			<p>Tanggal Pengambilan : <?= $d['tglA']?></p>
			<p>Total Biaya : <?= 'Rp. '.number_format($d['total'],'0','','.')?></p>
		<?php } ?>
	</main>
	<footer>
		<h4>!!! TOLONG SCREENSHOOT/KIRIM/PRINT DATA INI UNTUK DIBERIKAN KE KASIR SEBAGAI BUKTI !!!</h4>
		<hr>
		&copy; Copyright since 2023
	</footer>
</body>
</html>