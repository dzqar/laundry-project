<?php
// Mulai session
session_start();

// Koneksi
include '../../koneksi.php';
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
    <title>Order Laundry</title>
</head>
<body>
    <!-- Header -->
    <?php include '../../header.html' ?>
    <main>
        <section>
            <div class="container d-flex justify-content-center"> 
                <form action="proses_pesanan.php" method="POST">
                    <div class="card bordered border-dark mb-5" style="width: 22rem">
                      <h3 class="card-header bg-primary text-white text-center bordered border-dark">Pesan</h3>
                      <div class="card-body">
                        <input type="hidden" name="id_customer" value="<?php echo $_SESSION['id_user']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Layanan yang tersedia</label>
                            <!-- List layanan yang tersedia -->
                            <select name="nama_layanan" class="form-select" style="border: 1px solid #FF7D2D" required>
                                <option disable selected hidden value>Pilih Jenis Layanan</option>
                                <!-- Menampilkan data dari tbl_layanan -->
                                <?php 
                                $no = 1;

                                // Query
                                $data = mysqli_query($koneksi,"SELECT nama_layanan as nl, harga as h, estimasi as est FROM tbl_layanan");

                                // Loop
                                while($d = mysqli_fetch_array($data)){
                                    ?>
                                    <option value="<?php echo $d['nl']; ?>"><?php echo $no++.'. '.$d['nl']." | Rp. ".number_format($d['h'],'0','','.')." (".$d['est']." Hari)"; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" value="1" min="1" max="10" class="form-control" style="border: 1px solid #FF7D2D" required>
                        </div>
                            <!-- <div class="mb-3">
                                <label class="form-label">Tanggal pengambilan <i class="bi bi-calendar"></i></label>
                                <input type="date" name="tgl_pengambilan" class="form-control" style="border: 1px solid #FF7D2D" min="<?php echo date('Y-m-d')?>" value="<?php echo date('Y-m-d')?>">
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">Metode Pencucian</label>
                                <select name="metode_pencucian" class="form-select" style="border: 1px solid #FF7D2D" required>
                                    <option disable selected hidden value>Pilih Metode Pencucian</option>
                                    <!-- Menampilkan data dari tbl_data_metode berdasarkan id_metode -->
                                    <?php
                                    // Query
                                    $data = mysqli_query($koneksi,"SELECT nama_data_metode AS ndm, harga AS h, estimasi AS est FROM tbl_data_metode WHERE id_metode=1");
                                    // Loop
                                    while ($d = mysqli_fetch_array($data)) {
                                        // IF harga & estimasi bukan 0
                                        if ($d['h'] != 0 && $d['est'] != 0) { ?>
                                            <option value="<?= $d['ndm'] ?>"><?= $d['ndm']." | Rp. ".number_format($d['h'],'0','','.') ?> (-<?= $d['est']?> Hari)</option>
                                            <?php
                                        }else{
                                            ?>
                                            <option value="<?= $d['ndm'] ?>"><?= $d['ndm'] ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Metode Pengambilan</label>
                                    <select name="metode_pengambilan" class="form-select" style="border: 1px solid #FF7D2D" required>
                                        <option disable selected hidden value>Pilih Metode Pengambilan</option>
                                        <!-- Menampilkan data dari tbl_data_metode berdasarkan id_metode -->
                                        <?php
                                        // Query
                                        $data = mysqli_query($koneksi,"SELECT nama_data_metode AS ndm, harga AS h FROM tbl_data_metode WHERE id_metode=2");
                                        // Loop
                                        while ($d = mysqli_fetch_array($data)) {
                                            // IF hari bukan 0
                                            if ($d['h'] != 0) { ?>
                                                <option value="<?= $d['ndm'] ?>"><?= $d['ndm']." | Rp. ".number_format($d['h'],'0','','.') ?></option>
                                                <?php
                                            }else{
                                                ?>
                                                <option value="<?= $d['ndm'] ?>"><?= $d['ndm'] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" name="submit" value="Pesan" class="btn btn-primary w-50">
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