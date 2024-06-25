<?php
// Mulai session
session_start();

// Variable session
$id = $_SESSION['id_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
    <title>Membuat Laporan Bahan Laundry ke Admin</title>
</head>
<body>
    <!-- Awal Header -->
    <?php include '../../header.html' ?>
    <!-- Akhir Header -->
    <main>
        <section>
            <div class="container d-flex justify-content-center">
                <form action="proses.php" method="POST">
                    <input type="hidden" name="id_user" value="<?php echo $id?>">
                    <div class="card bordered border-dark mb-5" style="width: 22rem">
                        <h3 class="card-header bg-primary text-white text-center bordered border-dark">
                            Tambah Bahan
                        </h3>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Bahan</label>
                                <input type=text class="form-control" name="nama_bahan" placeholder="Masukkan Nama Bahan" style="border: 1px solid #FF7D2D" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type=number class="form-control" name="stok" placeholder="Masukkan Jumlah Stok" style="border: 1px solid #FF7D2D" required>
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