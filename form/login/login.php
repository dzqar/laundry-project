<?php
session_start();

// Jika Pengguna sudah melakukan login, maka akan dialihkan ke halaman index.php sesuai level
if (isset($_SESSION['username']) && isset($_SESSION['level'])) {
  if($_SESSION['level'] == "customer"){
      // Customer
    header("Location: ../../customer/?pesan=pernah_login");
    exit;
  }elseif($_SESSION['level'] == "kasir") {
      // Kasir
    header('location:../../kasir/?pesan=pernah_login');
    exit;
  }elseif($_SESSION['level'] == "manager") {
      // Manager
    header('location:../../manager/?pesan=pernah_login');
    exit;
  }elseif($_SESSION['level'] == "admin") {
      // Admin
    header('location:../../admin/?pesan=pernah_login');
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <title>LOGIN</title>
</head>
<body>
  <!-- Mengambil code dari script jquery -->
  <script src="../../script/jquery-3.7.1.min.js"></script>
  <!-- Script untuk menampilkan sweetalert -->
  <script>
    <?php 
    include '../../script/pesan.js';
    
    // Jika sudah 3x percobaan, maka akan memunculkan pesan error
    if (isset($_SESSION['auth'])) {
      if ($_SESSION['auth'] >= 3) { ?>
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Anda sudah gagal untuk yang ke-3 kalinya!',
          allowOutsideClick: false,
          allowEscapeKey: false,
          confirmButtonText: 'Ok'
        })
        <?php
              // Kalo mau terus"an di disabled form nya, matiin session_destroy() kecuali kalo lu mau aktifin tiap refresh/bolak-balik halaman
        session_destroy();
              // exit();
      }
    } ?>
    // Function showPass yang baru
    $(document).ready(function() {
      // Ketika <a> yang didalam <div id="pw"> di click
      $("#pw a").on('click', function(event) {
        // Membatalkan tindakan onclick (kalo di nonaktifin, href="" nya bakal jalan)
        event.preventDefault();
        // Jika <input type="text">
        if($('#pw input').attr("type") == "text"){
          // Mengubahnya menjadi "password"
          $('#pw input').attr('type', 'password');
          // Menambah class di <i> atau icon mata nya
          $('#pw i').addClass( "bi-eye-slash" ); //Icon mata dicoret
          // Menghapus class
          $('#pw i').removeClass( "bi-eye" ); //Icon mata biasa
          // Jika <input type="password">
        }else if($('#pw input').attr("type") == "password"){
          // Mengubahnya menjadi text
          $('#pw input').attr('type', 'text');
          // Menghapus class
          $('#pw i').removeClass( "bi-eye-slash" );
          // Menambah class
          $('#pw i').addClass( "bi-eye" );
        }
      });
    });
  </script>
  <!-- Header -->
  <?php include '../../header.html' ?>
  <main>
    <section>
      <div class="container d-flex justify-content-center">
        <form action="proses_login.php" method="POST">
          <div class="card text-center bordered border-dark mb-5" style="width: 22rem;">
            <h3 class="card-header bg-primary text-white bordered border-dark">
              Login
            </h3>
            <div class="card-body">
              <?php
              if (isset($_SESSION['auth']) && $_SESSION['auth'] >= 3) { ?>
                <!-- Jika sudah lebih dari 3x percobaan, maka form akan di disabled -->
                <div class="mb-3">
                  <label for="exampleInputtext1" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" style="border: 1px solid #FF7D2D" placeholder="Anda sudah tidak bisa lagi login!" disabled required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" style="border: 1px solid #FF7D2D" placeholder="Anda sudah tidak bisa lagi login!" disabled required>
                </div>
                <input type="submit" value="Login" class="btn btn-primary" disabled>
                <?php
              }else{ ?>
                <!-- Jika tidak ada auth/masih ada kesempatan buat login -->
                <div class="mb-3">
                  <label for="exampleInputtext1" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" style="border: 1px solid #FF7D2D" placeholder="Masukkan username anda" pattern=".{3,25}" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <!-- Pake Icon Mata -->
                  <div class="input-group" id="pw">
                    <input type="password" name="password" class="form-control" style="border: 1px solid #FF7D2D" placeholder="Masukkan password anda" pattern=".{8,25}" required>
                    <div class="input-group-text" style="border: 1px solid #FF7D2D">
                      <a href="" style="color: #333"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <a href="../daftar/daftar.php">Belum Punya Akun?</a>
                </div>
                <input type="submit" value="Login" class="btn btn-primary">
              <?php } ?>
            </div>
            <div class="card-footer bordered border-dark">
              <a href="../../" style="color: #FF7D2D">Kembali</a>
            </div>
          </div>    
        </form>
      </div>
    </section>
  </main>
</body>
</html>