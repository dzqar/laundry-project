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
		<h1>Data Transaksi</h1>
	</center>
	<main>
		<?php
		// Koneksi
		include '../../koneksi.php';

		// Variable
		$id_transaksi=$_POST['id_transaksi'];
		$id_customer=$_POST['id_customer'];

		// Query
		$data = mysqli_query($koneksi,"SELECT * FROM ((tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.id_customer = tbl_user.id_user) INNER JOIN tbl_pesan ON tbl_transaksi.id_pesan = tbl_pesan.id_pesan) WHERE tbl_transaksi.id_customer='$id_customer' AND tbl_transaksi.id_transaksi='$id_transaksi'");

		// Loop
		while ($d = mysqli_fetch_array($data)) {
			?>
			<p>Nama Lengkap : <?= $d['nama']?></p>
			<p>Username : <?= $d['username']?></p>
			<p>ID User : <?= $d['id_user']?></p>
			<p>ID Transaksi : <?= $d['id_transaksi']?></p>
			<p>ID Pesan : <?= $d['id_pesan']?></p>
			<p>Tanggal Transaksi : <?= $d['tgl_transaksi']?></p>
			<p>Tanggal Pengambilan : <?= $d['tgl_pengambilan']?></p>
			<p>Metode Pembayaran : <?= $d['metode_pembayaran']?></p>
			<p>Total Biaya : <?= 'Rp. '.number_format($d['total_biaya'],'0','','.')?></p>
		<?php } ?>
	</main>
	<footer>
		<hr>
		&copy; Copyright since 2023
	</footer>
</body>
</html>