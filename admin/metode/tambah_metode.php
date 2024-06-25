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
    <title>Tambah Metode</title>
</head>
<body>
     <!-- Awal Header -->
     <?php include '../../header.html' ?>
     <!-- Akhir Header -->
    <main>
        <section>
        <div class="container d-flex justify-content-center">
        <form action="proses.php">
            <div class="card bordered border-dark mb-5" style="width: 22rem">
                <h3 class="card-header bg-primary text-white text-center bordered border-dark">
                    Tambah Metode
                </h3>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Metode</label>
                        <input type="text" class="form-control" name="nama_metode" style="border: 1px solid #FF7D2D" placeholder="Masukkan nama metode" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estimasi</label>
                        <input type="number" class="form-control" name="estimasi" style="border: 1px solid #FF7D2D" placeholder="Masukkan Estimasi" value="0" min="0" max="30" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" style="border: 1px solid #FF7D2D" placeholder="Masukkan harga metode" value="0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Metode</label>
                        <select name="jenis_metode" class="form-select" style="border: 1px solid #FF7D2D" required>
                            <option value disabled selected hidden>Pilih Jenis Metode</option>
                            <!-- Menampilkan data dari tbl_metode -->
                            <?php
                            // Koneksi
                                include '../../koneksi.php';
                                
                                // Query
                                $data = mysqli_query($koneksi,"SELECT id_metode as im, nama_metode as nm FROM tbl_metode");

                                // Loop
                                while ($d = mysqli_fetch_array($data)) { ?>
                            <option value="<?= $d['im']?>"><?= $d['nm']?></option>    
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
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
<script src="../../style/FR FRONTEND/BOOSTRAP/assets/js/bootstrap.bundle.js"></script>
</body>
</html>