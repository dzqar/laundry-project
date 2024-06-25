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
    <title>Input Layanan</title>
</head>
<body>
     <!-- Awal Header -->
     <?php include '../../header.html' ?>
     <!-- Akhir Header -->
    <main>
        <section>
        <div class="container d-flex justify-content-center">
        <form action="proses.php" method="POST">
            <div class="card bordered border-dark mb-5" style="width: 22rem">
                <h3 class="card-header bg-primary text-white text-center bordered border-dark">
                    Input Layanan
                </h3>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" name="nama_layanan" style="border: 1px solid #FF7D2D" placeholder="Masukkan nama layanan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" style="border: 1px solid #FF7D2D" placeholder="Masukkan harga layanan" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estimasi</label>
                        <input type="number" class="form-control" name="estimasi" style="border: 1px solid #FF7D2D" placeholder="Masukkan Estimasi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Layanan</label>
                        <select name="jenis_layanan" class="form-select" style="border: 1px solid #FF7D2D" required>
                            <option value selected disabled hidden>Pilih Jenis Layanan</option>
                            <option value="1">Satuan</option>
                            <option value="2">Kiloan</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" value="Buat Layanan" class="btn btn-primary">
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