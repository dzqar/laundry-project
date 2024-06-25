<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Style CSS -->
	<link rel="stylesheet" href="style/style.css">
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="style/FR FRONTEND/BOOSTRAP/assets/icon/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="style/FR FRONTEND/BOOSTRAP/assets/icon/font/bootstrap-icons.css">
	<!-- Style Bootstrap -->  
	<link rel="stylesheet" href="style/FR FRONTEND/BOOSTRAP/assets/css/bootstrap.min.css">
	<!-- Icon Title -->
	<link rel="icon" href="style/logo/logo.png" type="image/x-icon">
	<title>JIT Laundry</title>
</head>
<body>
	<!-- Awal Header -->
	<header>
		<!-- Awal Navigation Bar -->
		<nav class="navbar navbar-expand-lg bg-light fixed-top border-2 border-bottom border-black">
			<div class="container-fluid">
				<div class="navbar-brand ms-3">
					<table>
						<!-- Gambar -->
						<tr>
							<td rowspan="4"><img src="style/img/profile.png" alt="Profile" width="70" height="70" class="me-2 d-inline-block align-text-top"></td>
						</tr>
						<!-- Link untuk Login -->
						<tr>
							<td><a href="form/login/login.php" style="text-decoration: none; color: black;"><b>Masuk</b></a></td>
						</tr>
						<!-- Link untuk Daftar -->
						<tr>
							<td><a href="form/daftar/daftar.php" style="text-decoration: none; color: black;"><b>Daftar</b></a></td>
						</tr>
					</table>
				</div>
				<!-- Tombol kalo di layar HP -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Navigasi di 1 halaman index.php ini -->
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto pe-3 me-4">
						<!-- Navigasi ke Beranda -->
						<li class="nav-item pe-3">
							<a class="nav-link" style="color: #006DFF;" aria-current="page" href="#beranda">Beranda</a>
						</li>
						<!-- Navigasi ke Tentang -->
						<li class="nav-item pe-3">
							<a class="nav-link" style="color: #006DFF" href="#tentang">Tentang</a>
						</li>
						<!-- Navigasi ke Rating -->
						<li class="nav-item pe-3">
							<a class="nav-link" style="color: #006DFF" href="#rating">Rating</a>
						</li>
						<!-- Navigasi ke Layanan -->
						<li class="nav-item pe-3">
							<a class="nav-link" style="color: #006DFF" href="#layanan">Layanan</a>
						</li>
						<!-- Navigasi ke Syarat dan Ketentuan -->
						<li class="nav-item">
							<a class="nav-link" style="color: #006DFF" href="#" data-bs-toggle="modal" data-bs-target="#s&k">Syarat & Ketentuan</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Akhir Navigation Bar -->
	</header>
	<!-- Akhir Header -->

	<!-- Awal Main -->
	<main>
		<!-- Awal Beranda -->
		<section id="beranda">
			<div class="container">
				<div class="row text-center mb-3">
					<div class="col">
						<!-- Biodata Perusahaan -->
						<img src="style/logo/logo.png" width="150" height="150" class="mb-3">
						<h2>JIT Laundry</h2>
						<h5>(Just In Time Laundry)</h5>
						<p>Lokasi : Jalan Pakai Kaki, Jawa Barat, Indonesia</p>
					</div>
				</div>
			</div>

			<!-- Gambar Gelombang -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#006dff" fill-opacity="1" d="M0,160L60,154.7C120,149,240,139,360,122.7C480,107,600,85,720,101.3C840,117,960,171,1080,192C1200,213,1320,203,1380,197.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
		</section>
		<!-- Akhir Beranda -->

		<!-- Awal Tentang -->
		<section id="tentang" style="background-color: #006DFF;">
			<div class="container">
				<div class="row text-start mb-3 text-white">
					<div class="col">
						<!-- Judul Tentang -->
						<h2 class="text-center mb-3">Tentang Laundry</h2>
						<!-- Isi Tentang -->
						<p>JIT (Just In Time) Laundry adalah sebuah jasa membersihkan pakaian dengan tepat waktu sesuai dengan nama perusahaan yaitu Just In Time. Selain tepat waktu, kami juga menggunakan bahan laundry yang termasuk premium. Artinya, noda yang terdapat pakaian mudah hilang dan tidak merusak pakaian tersebut dan akan selalu wangi. Terdapat banyak layanan yang kami sediakan disini, mulai dari Cuci Kiloan, Cuci Satuan, Cuci Perlengkapan Bayi, Cuci Boneka, dan banyak lainnya. Banyak yang sudah mencoba dan mempercayai JIT Laundry ini, berikut testimoni pelanggan kami yang sudah menggunakan jasa laundry ini :</p>
					</div>
				</div>
			</div>

			<!-- Gambar Gelombang -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,192L60,208C120,224,240,256,360,245.3C480,235,600,181,720,160C840,139,960,149,1080,176C1200,203,1320,245,1380,266.7L1440,288L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
		</section>
		<!-- Akhir Tentang -->

		<!-- Awal Rating -->
		<section id="rating">
			<div class="container">
				<div class="row text-center mb-3">
					<div class="col">
						<!-- Judul Section Rating -->
						<h2>Rating</h2>
					</div>
				</div>
				<div class="row justify-content-center mb-3">
					
					<!-- Rating -->
					<div class="col-sm-4 mb-3">
						<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active" data-bs-interval="2000">
									<div class="card bordered border-primary border-2 pt-4 pb-4" style="background-color: #fff">
										<div class="card-body">
											<h5 class="card-title text-black">Rating dari beberapa pengguna</h5>
										</div>
									</div>
								</div>
								<?php
								include 'koneksi.php';
								$data = mysqli_query($koneksi,"SELECT tbl_user.username, tbl_review.id_user, review, rating FROM tbl_review INNER JOIN tbl_user ON tbl_review.id_user=tbl_user.id_user WHERE rating >= 4 LIMIT 10");
								while ($d = mysqli_fetch_array($data)) {
									?>
									<div class="carousel-item" data-bs-interval="2000">
										<!-- <img src="..." class="d-block w-100" alt="..."> -->
										<div class="card bordered border-primary border-2" style="background-color: #fff">
											<div class="card-body">
												<h5 class="card-title text-black"><i class="bi bi-person-fill"></i> <?= $d['username']?></h5>
												<h6 class="card-subtitle mb-2 text-primary"><i class="bi bi-star-fill"></i> <?= $d['rating']?></h6>
												<p class="card-text" style="color: #FF7D2D"><?= $d['review']?></p>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Gambar gelombang -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ff7d2d" fill-opacity="1" d="M0,288L60,272C120,256,240,224,360,192C480,160,600,128,720,133.3C840,139,960,181,1080,192C1200,203,1320,181,1380,170.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
		</section>
		<!-- Akhir Rating -->

		<!-- Awal Layanan -->
		<section id="layanan" style="background-color: #FF7D2D">
			<div class="container">
				<div class="row text-center mb-3 text-white">
					<div class="col">
						<!-- Judul Section Layanan -->
						<h2>Layanan</h2>
					</div>
				</div>
				<div class="row justify-content-center mb-3">
					<!-- Awal Card Layanan Cuci Satuan -->
					<div class="col-sm-4 mb-3">
						<div class="card text-center bordered border-primary border-3">
							<div class="card-body text-black">
								<!-- Judul Layanan Cuci Satuan -->
								<h5 class="card-title">Cuci Satuan</h5>
								<!-- Deskripsi -->
								<p class="card-text">Dengan menggunakan layanan ini, anda bisa mencuci pakaian terpisah dengan tata cara laundry yang berbeda pula</p>
								<!-- Tombol untuk membuka modal/pop up yang isinya list Layanan Cuci Satuan -->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#satuan">
									Lihat Layanan
								</button>
							</div>
						</div>
					</div>
					<!-- Akhir Card Layanan Cuci Satuan -->

					<!-- Awal Modal Layanan Cuci Satuan -->
					<div class="modal fade" id="satuan" tabindex="-1" aria-labelledby="satuanLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
							<div class="modal-content bordered border-primary border-3">
								<div class="modal-header bordered border-dark border-bot-2">
									<!-- Judul Modal Layanan Cuci Satuan -->
									<h2 class="modal-title fs-5" id="satuanLabel">Layanan Cuci Satuan</h2>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<!-- Awal List Layanan Cuci Satuan -->
								<div class="modal-body">
									<table class="table table-bordered text-center">
										<thead class="table table-primary table-bordered border-dark">
											<tr>
												<td>No</td>
												<td>Nama Layanan</td>
												<td>Harga</td>
												<td>Estimasi</td>
											</tr>
										</thead>
										<?php
										$no=1;

										// Untuk menampilkan layanan cuci satuan dari database dengan membuat kondisi jenis layanan = satuan
										$data = mysqli_query ($koneksi,"SELECT * FROM tbl_layanan WHERE jenis_layanan=1");

							       	    // Membuat looping dari $data
										while($d = mysqli_fetch_array($data)){
											?>
											<tbody class="table table-bordered border-dark table-warning">
												<tr>
													<td><?php echo $no++;?></td>
													<td><?php echo $d['nama_layanan'];?></td>
													<td>Rp. <?php echo number_format($d['harga'],'0','','.');?></td>
													<td><?php echo $d['estimasi'];?> Hari</td>
												</tr>
											</tbody>
										<?php } ?>
										<!-- Tutup While -->
									</table>
								</div>
								<!-- Akhir List Layanan Cuci Satuan -->
								<!-- Awal Footer Modal -->
								<div class="modal-footer bordered border-dark border-top-2">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
								</div>
								<!-- Akhir Footer Modal -->
							</div>
						</div>
					</div>
					<!-- Akhir Modal/Pop Up Layanan Cuci Satuan -->
					
					<!-- Awal Card Layanan Cuci Kiloan -->
					<div class="col-sm-4 mb-3">
						<div class="card text-center bordered border-primary border-3">
							<div class="card-body text-black">
								<!-- Judul Layanan Cuci Kiloan -->
								<h5 class="card-title">Cuci Kiloan</h5>
								<!-- Deskripsi Layanan Cuci Kiloan + S&K -->
								<p class="card-text">Dengan layanan ini, anda bisa laundry beberapa pakaian sekaligus dengan memesan sesuai timbangan. Berdasarkan dengan <a href="#" data-bs-toggle="modal" data-bs-target="#s&k">Syarat & Ketentuan</a></p>
								<!-- Tombol untuk membuka modal Layanan Cuci Kiloan -->
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kiloan">
									Lihat Layanan
								</button>
							</div>
						</div>
					</div>
					<!-- Akhir Card Layanan Cuci Kiloan -->

					<!-- Awal Modal/Pop up Layanan Cuci Kiloan-->
					<div class="modal fade" id="kiloan" tabindex="-1" aria-labelledby="kiloanLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
							<div class="modal-content bordered border-primary border-3">
								<div class="modal-header bordered border-dark border-bot-2">
									<!-- Judul Modal Layanan Cuci Kiloan -->
									<h2 class="modal-title fs-5" id="kiloanLabel">Layanan Cuci Kiloan</h2>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<!-- Awal List Layanan Cuci Kiloan -->
								<div class="modal-body">
									<table class="table table-bordered border-dark text-center">
										<thead class="table table-bordered border-dark table-primary">
											<tr>
												<td>No</td>
												<td>Nama Layanan</td>
												<td>Harga</td>
												<td>Estimasi</td>
											</tr>
										</thead>
										<?php
										$no=1;

										// Untuk menampilkan layanan cuci kiloan dari database dengan membuat kondisi jenis layanan = kiloan
										$data = mysqli_query ($koneksi,"SELECT * FROM tbl_layanan WHERE jenis_layanan=2");

							       	    	// Membuat looping dari $data
										while($d = mysqli_fetch_array($data)){
											?>
											<tbody class="table table-bordered border-dark table-warning">
												<tr>
													<td><?php echo $no++;?></td>
													<td><?php echo $d['nama_layanan'];?></td>
													<td>Rp. <?php echo number_format($d['harga'],'0','','.');?></td>
													<td><?php echo $d['estimasi'];?> Hari</td>
												</tr>
											</tbody>
										<?php } ?>
										<!-- Penutup While -->
									</table>
								</div>
								<!-- Akhir List Layanan Cuci Kiloan -->
								<!-- Awal Footer Modal -->
								<div class="modal-footer bordered border-dark border-top-2 bordered border-dark border-top-2">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
								</div>
								<!-- Akhir Footer Modal -->
							</div>
						</div>
					</div>
					<!-- Akhir Modal/Pop up layanan cuci kiloan -->
				</div>
			</div>
			<!-- Gambar gelombang -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,128L48,144C96,160,192,192,288,208C384,224,480,224,576,229.3C672,235,768,245,864,218.7C960,192,1056,128,1152,128C1248,128,1344,192,1392,224L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
		</section>
		<!-- Akhir Layanan -->
	</main>
	<!-- Akhir Main -->

	<!-- Awal Footer -->
	<footer class="text-center pb-5" style="background-color: #fff">
		<p>&copy; JIT Laundry</p>
		<center>
			<table style="text-align: center; font-weight: bold">
				<tr>
					<th colspan="4"><u>Team members</u></th>
				</tr>
				<tr>
					<td>Dzaky Aditya Rahman</td>
					<td>|</td>
					<td>Ahmad Zakaria Syafiqi</td>
				</tr>
				<tr>
					<td>Azzahra Cahyani Ridwan</td>
					<td>|</td>
					<td>Muhammad Yunus</td>
				</tr>
			</table>
		</center>
	</footer>
	<!-- Akhir Footer -->

	<!-- Script untuk menampilkan modal Syarat & Ketentuan -->
	<?php include 's&k.php' ?>
	
	<!-- Script Bootstrap -->
	<script src="style/FR FRONTEND/BOOSTRAP/assets/js/bootstrap.bundle.js"></script>
</body>
</html>