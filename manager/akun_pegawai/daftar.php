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
    <title>Buat Akun Pegawai</title>
</head>
<body>
    <!-- Mengambil code dari script jquery -->
    <script src="../../script/jquery-3.7.1.min.js"></script>
    <script>
        <?php 
        // Mengecek alert di URL
        if(isset($_GET['alert'])){
            // Jika alert = gagal
            if($_GET['alert']=="gagal"){
                ?>
                Swal.fire({
                  icon: 'error',
                  title: 'Error!',
                  text: 'Username Sudah Terdaftar!',
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  confirmButtonText: 'Baiklah'
              }).then((result) => {
                  if (result.isConfirmed) {
                    // Jika di confirm, halaman di refresh
                    window.location = "daftar.php"
                }
            })
              <?php
          }
      }
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
<!-- Awal Header -->
<?php include '../../header.html'?>
<!-- Akhir Header -->
<main>
    <section>
        <div class="container d-flex justify-content-center">
            <form action="proses.php" method="POST">
                <div class="card bordered border-dark mb-5" style="width: 22rem">
                    <h3 class="card-header bg-primary text-white text-center bordered border-dark">
                        Buat Akun Pegawai
                    </h3>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" style="border: 1px solid #FF7D2D" placeholder="Masukkan nama lengkap" pattern="[A-Za-z]{1,50}" title="Masukkan huruf">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" cols="10" rows="2" style="border: 1px solid #FF7D2D" placeholder="Masukkan alamat"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="number" name="no_tlp" class="form-control" style="border: 1px solid #FF7D2D" placeholder="Masukkan nomor telepon" pattern="[1-9]{12}[0-9]{15}" title="Masukkan nomor minimal digit 12, maksimal 15" inputmode="numeric" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" style="border: 1px solid #FF7D2D" placeholder="Masukkan username" pattern=".{3,25}" required>
                        </div>
                        <!-- Pake Icon Mata -->
                        <div class="mb-3" id="pw">
                            <label class="form-label">Password</label>
                            <div class="input-group" id="pw">
                                <input type="password" name="password" class="form-control" style="border: 1px solid #FF7D2D" placeholder="Masukkan password" pattern=".{8,25}" required title="Password minimal 8 karakter, dan maksimal 20 karakter">
                                <div class="input-group-text" style="border: 1px solid #FF7D2D">
                                    <a href="" style="color: #333"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                      <div class="mb-3">
                        <label class="form-label">Hak Akses</label>
                        <select name="level" class="dropdown-toggle btn btn-white text-start" style="border: 1px solid #FF7D2D" required>
                            <option disabled hidden selected value>Pilih Hak Akses</option>
                            <option value="1">Admin</option>
                            <option value="2">Manager</option>
                            <option value="3">Kasir</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <!-- Untuk memisahkan div atas dengan bawah -->
                        <input type="submit" name="submit" value="Buat" class="btn btn-primary">
                    </div>
                </div>
                <div class="card-footer text-center bordered border-dark">
                    <a href="../" style="color: #FF7D2D">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</section>
</main>
</body>
<script src="../../style/FR FRONTEND/BOOSTRAP/assets/js/bootstrap.bundle.js"></script>
</html>