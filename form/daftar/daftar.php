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
  <title>DAFTAR</title>
</head>
<body>
  <script src="../../script/jquery-3.7.1.min.js"></script>
  <script>
    <?php
    include '../../script/pesan.js';
    ?>
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
  <!-- Penutup header -->
  <main>
    <section>
      <div class="container d-flex justify-content-center"> 
       <form action="proses_daftar.php" method="POST">
        <div class="card text-center bordered border-dark mb-5" style="width: 22rem;">
          <h3 class="card-header bg-primary text-white bordered border-dark">
            Daftar
          </h3>
          <div class="card-body">
            <div class="mb-3">
              <label for="exampleInputtext1" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama" style="border: 1px solid #FF7D2D" placeholder="Masukkan nama lengkap anda" pattern="{1,50}" title="Masukkan huruf" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputtext1" class="form-label">Alamat</label>
              <input type="text" class="form-control" name="alamat" style="border: 1px solid #FF7D2D" placeholder="Masukkan alamat anda" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputtext1" class="form-label">Nomor Telepon</label>
              <input type="text" class="form-control" name="no_tlp" style="border: 1px solid #FF7D2D" placeholder="Masukkan nomor telepon anda" pattern="[0-9]{12,15}" title="Masukkan nomor minimal digit 12, maksimal 15" inputmode="numeric" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputtext1" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" style="border: 1px solid #FF7D2D" placeholder="Masukkan username anda" pattern=".{3,25}" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <!-- Pake Icon Mata -->
              <div class="input-group" id="pw">
                <input type="password" name="password" class="form-control" style="border: 1px solid #FF7D2D" placeholder="Masukkan password anda" pattern=".{8,25}" required title="Password minimal 8 karakter, dan maksimal 20 karakter">
                <div class="input-group-text" style="border: 1px solid #FF7D2D">
                  <a href="" style="color: #333"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <div class="mb-3 text-start">
              <input type="checkbox" required> Saya menyetujui <a href="#" data-bs-toggle="modal" data-bs-target="#s&k">Syarat & Ketentuan</a> JIT Laundry
            </div>
            <div class="mb-3">
              <a href="../login/login.php">Sudah Punya Akun?</a>
            </div>
            <input type="submit" value="Daftar" class="btn btn-primary">
          </div>
          <div class="card-footer bordered border-dark">
            <a href="../../" style="color: #FF7D2D">Kembali</a>
          </div>
        </div>
      </form>   
    </div>    
  </section>
</main>

<?php include '../../s&k.php' ?>
</body>
<script src="../../style/FR FRONTEND/BOOSTRAP/assets/js/bootstrap.bundle.js"></script>
</html>