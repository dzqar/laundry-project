<?php
  // Memulai session dari login
  session_start();

  // Koneksi
  include '../koneksi.php';

  // Tampungan dari proses login
  $id = $_SESSION['id_user'];
  $username = $_SESSION['username'];
  $level = $_SESSION['level'];

  // Jika pengguna belum melakukan login
  if(!isset($_SESSION['username'])){
    header('location: ../form/login/login.php?pesan=belum_login');
    exit;
  }

  // Fungsi untuk memeriksa izin akses sesuai level kasir
  include '../script/cek_akses.php';

  // Kalo misalnya akun dengan level lain selain customer, bakal dilempar lagi ke halamannya

  if (!customer()) {
    header("location:../$level/?pesan=noaccess");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Icon Title -->
  <link rel="icon" href="../style/logo/logo.png" type="image/x-icon">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="../style/FR FRONTEND/BOOSTRAP/assets/icon/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../style/FR FRONTEND/BOOSTRAP/assets/icon/font/bootstrap-icons.min.css">
  <!-- Style Bootstrap -->
  <link rel="stylesheet" href="../style/FR FRONTEND/BOOSTRAP/assets/css/bootstrap.min.css">
  <!-- Style CSS -->
  <link rel="stylesheet" href="../style/style.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../style/FR FRONTEND/SWEETALERT2/assets/css/sweetalert2.min.css">
  <link rel="stylesheet" href="../style/FR FRONTEND/SWEETALERT2/assets/css/animate.min.css">
  <script src="../style/FR FRONTEND/SWEETALERT2/assets/js/sweetalert2.min.js"></script>
  <!-- Title -->
  <title>Beranda</title>
</head>
<body>
  <!-- Script untuk bagian url/link, kondisinya ada di file pesan.js -->
  <script>
    <?php include '../script/pesan.js'?>
  </script>

  <!-- Awal header -->
  <header>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-light fixed-top border-2 border-bottom border-black">
      <div class="container-fluid">

        <!-- Profile -->
        <?php include '../profile.php'?>
        <!-- Akhir Profile -->

        <!-- Tombol kalo di layar HP -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto pe-3 pt-20 me-5">
            <li class="nav-item pe-3">
              <a class="nav-link active" style="color: #FF7D2D;" data-bs-toggle="modal" data-bs-target="#profile">Profil</a>
            </li>
            <li class="nav-item pe-3">
              <a class="nav-link" style="color: #006dff" data-bs-toggle="modal" data-bs-target="#riwayatPesanan">Daftar Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #006dff" data-bs-toggle="modal" data-bs-target="#riwayatTransaksi">Daftar Transaksi</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  
  </header>
  <!-- Akhir Header -->

  <!-- Awal Main -->
  <main>
    <!-- Awal Beranda -->
    <section id="beranda">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <!-- Menampilkan gambar logo dari perusahaan JIT Laundry -->
            <img src="../style/logo/logo.png" width="150" height="150" class="mb-3">
            <h2>JIT Laundry</h2>
            <h5>(Just In Time Laundry)</h5>
            <p>Lokasi : Jalan Pakai Kaki, Jawa Barat, Indonesia</p>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <div class="row align-items-start">
          <div class="col-sm-4 mb-3">
            <!-- Link untuk ke halaman buat pesanan -->
            <a href="pesanan/pesanan.php" class="btn btn-primary btn-lg">Buat <br> Pesanan</a>
          </div>
          <div class="col-sm-4 mb-3">
            <!-- Modal daftar Pesanan -->
            <?php include'pesanan/riwayat_pesanan.php'; ?>
          </div>
          <div class="col-sm-4 mb-3">
            <!-- Modal daftar Transaksi -->
            <?php include'transaksi/riwayat_transaksi.php'; ?> 
          </div>
          <div class="col-sm-4 mb-3">
            <!-- Profile -->
            <?php include'../form/profile/profile.php'; ?> 
          </div>
        </div>
      </div>
      <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#006dff" fill-opacity="1" d="M0,96L48,106.7C96,117,192,139,288,144C384,149,480,139,576,149.3C672,160,768,192,864,181.3C960,171,1056,117,1152,112C1248,107,1344,149,1392,170.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg> -->
    </section>
    <!-- Akhir Beranda -->
  </main>
  <!-- Akhir Main -->

</body>
<script src="../style/FR FRONTEND/BOOSTRAP/assets/js/bootstrap.bundle.js"></script>
</html>