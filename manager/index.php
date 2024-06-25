<?php
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

// Fungsi untuk memeriksa izin akses sesuai level
include '../script/cek_akses.php';

// Kalo misalnya akun dengan level lain selain manager, bakal dilempar lagi ke halamannya
if (!manager()) {
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
  <title>Index - Manager</title>
</head>
<body>
  <!-- Script untuk pop up pesan -->
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

        <!-- Link -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto pe-3 pt-20 me-5">
            <li class="nav-item pe-3">
              <a class="nav-link active" style="color: #FF7D2D;" data-bs-toggle="modal" data-bs-target="#profile">Profil</a>
            </li>
            <li class="nav-item pe-3">
              <a class="nav-link" style="color: #006dff" data-bs-toggle="modal" data-bs-target="#tampilpegawai">Daftar Akun Pegawai</a>
            </li>
            <li class="nav-item pe-3">
              <a class="nav-link" style="color: #006dff" data-bs-toggle="modal" data-bs-target="#laporanbahan">Data Bahan Laundry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color: #006dff" data-bs-toggle="modal" data-bs-target="#ulasan">Ulasan Customer</a>
            </li>
          </ul>
        </div>
        <!-- Akhir Link -->
      </div>
    </nav>
    <!-- Akhir Navbar -->
  </header>
  <!-- Akhir Header -->

  <!-- Awal Main -->
  <main>
    <section id="beranda">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col">
            <img src="../style/logo/logo.png" width="150" height="150" class="mb-3">
            <h2>JIT Laundry</h2>
            <h5>(Just In Time Laundry)</h5>
            <p>Lokasi : Jalan Pakai Kaki, Jawa Barat, Indonesia</p>
          </div>
        </div>
      </div>
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-4 mb-3">
            <!-- Tampil Akun Pegawai -->
            <?php include 'akun_pegawai/tampil_pegawai.php'; ?>
          </div>
          <div class="col-sm-4 mb-3">
            <!-- Daftar Laporan Bahan Laundry -->
            <?php include 'laporan_bahan/laporan.php'; ?>
          </div>
          <div class="col-sm-4 mb-3">
            <!-- Ulasan -->
            <?php include '../kasir/ulasan/ulasan.php'; ?>
          </div>
          <div class="col-sm-4 mb-3">
            <!-- Profile -->
            <?php include'../form/profile/profile.php'; ?> 
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Akhir Main -->

  <!-- Script Bootstrap -->
  <script src="../style/FR FRONTEND/BOOSTRAP/assets/js/bootstrap.bundle.js"></script>
</body>
</html>