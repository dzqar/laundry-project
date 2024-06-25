<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
  <title>Edit Metode</title>
</head>
<body>
  <!-- Header -->
  <?php include '../../header.html' ?>
  <!-- Akhir Header -->

  <!-- Untuk menampilkan data di tbl_layanan sesuai id_layanan yang dipilih -->
  <?php
  // Koneksi
  include '../../koneksi.php';

  // Variable
  $idm = $_POST['id_data_metode'];

  // Query
  $data = mysqli_query($koneksi,"SELECT id_data_metode as idm, tbl_metode.id_metode as im, nama_metode as nm, nama_data_metode as ndm, estimasi as est, harga as h FROM tbl_data_metode INNER JOIN tbl_metode ON tbl_data_metode.id_metode=tbl_metode.id_metode WHERE id_data_metode='$idm'");

  // Loop
  while($d = mysqli_fetch_array($data)){
    ?>
    <main>
      <section>
        <div class="container d-flex justify-content-center">
          <form action="proses.php">
            <div class="card bordered border-dark mb-5" style="width: 22rem">
              <h3 class="card-header bg-primary text-white text-center bordered border-dark">
                Edit Metode
              </h3>
              <div class="card-body">
                <div class="mb-3">
                  <input type="hidden" name="id_data_metode" value="<?= $d['idm'];?>">
                  <label class="form-label">Nama Metode</label>
                  <input type="text" class="form-control" value="<?= $d['ndm'];?>" name="nama_metode" style="border: 1px solid #FF7D2D" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Harga</label>
                  <input type="number" class="form-control" value="<?= $d['h'];?>" name="harga" style="border: 1px solid #FF7D2D" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Estimasi</label>
                  <input type="number" class="form-control" value="<?= $d['est'];?>" name="estimasi" style="border: 1px solid #FF7D2D" min="0" max="30" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Jenis Metode</label>
                  <select name="jenis_metode" class="form-select" style="border: 1px solid #FF7D2D" required>
                    <option value="<?= $d['im']?>" hidden selected><?= $d['nm'];?></option>
                    <!-- Menampilkan data dari tbl_metode -->
                    <?php
                    // Query
                      $data = mysqli_query($koneksi,"SELECT id_metode as im, nama_metode as nm FROM tbl_metode");

                      // Loop
                      while ($r = mysqli_fetch_array($data)) {
                        ?>
                        <option value="<?= $r['im']?>"><?= $r['nm']?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
                <!-- Penutup while() -->
                <?php
              }
              ?>
              <div class="text-center">
                <!-- Untuk memisahkan div atas dengan bawah -->
                <input type="submit" name="submit" value="Edit" class="btn btn-primary">
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
