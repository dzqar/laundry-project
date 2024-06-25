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
    <title>Transaksi</title>
</head>
<body>
    <!-- Header -->
    <?php include '../../header.html' ?>
    <main>
        <section>
            <div class="container d-flex justify-content-center">
                <form action="proses_transaksi.php" method="POST">
                    <div class="card bordered border-dark mb-5" style="width: 22rem">
                      <h3 class="card-header bg-primary text-white text-center bordered border-dark">Transaksi</h3>
                      <div class="card-body">
                        <?php
                        include '../../koneksi.php';
                        $ip = $_POST['id_pesan'];
                        $data = mysqli_query($koneksi,"SELECT
                        id_pesan as ip,
                        id_kasir as ik,
                        id_customer as ic,
                        total_biaya as tb,
                        nama_layanan as nl,
                        tgl_pesan as tglP
                        FROM tbl_pesan WHERE id_pesan='$ip'");
                        while($d = mysqli_fetch_array($data)){
                            ?>
                            <input type="hidden" name="id_pesan" value="<?= $d['ip'];?>">
                            <input type="hidden" name="id_kasir" value="<?= $d['ik'];?>">
                            <input type="hidden" name="id_customer" value="<?= $d['ic'];?>">
                            <input type="hidden" name="total_biaya" value="<?= $d['tb']; ?>">
                            <div class="mb-3">
                                <label class="form-label">Layanan yang dipilih</label>
                                <input type="text" value="<?php echo $d['nl'] ?>" class="form-control" readonly style="border: 1px solid #FF7D2D">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pesan</label>
                                <input type="text" value="<?= $d['tglP'] ?>" class="form-control" style="border: 1px solid #FF7D2D" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Biaya</label>
                                <input type="text" value="Rp. <?= number_format($d['tb'],'0','','.') ?>" class="form-control" style="border: 1px solid #FF7D2D" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Metode Pembayaran</label>
                                <select name="metode_pembayaran" class="dropdown-toggle btn btn-white text-start" style="border: 1px solid #FF7D2D" required>
                                    <option selected disabled hidden value>Pilih</option>
                                    <?php
                                    $data = mysqli_query($koneksi,"SELECT nama_data_metode as ndm FROM tbl_data_metode WHERE id_metode=3");
                                    while ($d=mysqli_fetch_array($data)) {
                                    ?>
                                    <option value="<?= $d['ndm']?>"><?= $d['ndm']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Transaksi" class="btn btn-primary">
                            </div>
                        </div>
                    <?php } ?>
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