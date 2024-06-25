<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Icon Title -->
	<link rel="icon" href="../../style/logo/logo.png" type="image/x-icon">
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="../../style/FR FRONTEND/BOOSTRAP/assets/icon/font/bootstrap-icons.css">
	<link rel="stylesheet" href="../../style/FR FRONTEND/BOOSTRAP/assets/icon/font/bootstrap-icons.min.css">
	<!-- Style Bootstrap -->
	<link rel="stylesheet" href="../../style/FR FRONTEND/BOOSTRAP/assets/css/bootstrap.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="../../style/style.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="../../style/FR FRONTEND/SWEETALERT2/assets/css/sweetalert2.min.css">
	<link rel="stylesheet" href="../../style/FR FRONTEND/SWEETALERT2/assets/css/animate.min.css">
	<script src="../../style/FR FRONTEND/SWEETALERT2/assets/js/sweetalert2.min.js"></script>
	<title>Edit Bahan</title>
</head>
<body>
	<!-- Awal Header -->
	<?php include '../../header.html' ?>
	<!-- Akhir header -->

	<!-- Awal Content -->
	<main>
		<section>
			<div class="container d-flex justify-content-center">
				<form action="proses.php" method="POST">
					<!-- Menampilkan data dari tbl_data_bahan berdasarkan id_bahan -->
					<?php 
					// Koneksi
					include '../../koneksi.php';

					// Variable
					$idb = $_POST['id_bahan'];

					// Query
					$data = mysqli_query($koneksi,"SELECT nama_bahan as nb FROM tbl_data_bahan WHERE id_bahan='$idb'");

					// Loop
					while ($d = mysqli_fetch_array($data)) {
						?>
						<input type="hidden" name="id_bahan" value="<?= $idb ?>">
						<div class="card bordered border-dark mb-5" style="width: 22rem">
							<h3 class="card-header bg-primary text-white text-center bordered border-dark">
								Edit Bahan
							</h3>
							<div class="card-body">
								<div class="mb-3">
									<label class="form-label">Nama Bahan</label>
									<input type=text class="form-control" name="nama_bahan" value="<?= $d['nb']?>" style="border: 1px solid #FF7D2D" required>
								</div>
								<div class="text-center">
									<!-- Untuk memisahkan div atas dengan bawah -->
									<input type="submit" name="submit" value="Edit" class="btn btn-primary">
								</div>
							</div>
							<div class="card-footer text-center bordered border-dark">
								<a href="../" style="color: #FF7D2D">Kembali</a>
							</div>
						</div>
					<?php } ?>
				</form>
			</div>
		</section>
	</main>
	<!-- Akhir Content -->
</body>
<script src="../../style/FR FRONTEND/BOOSTRAP/assets/js/bootstrap.bundle.js"></script>
</html>