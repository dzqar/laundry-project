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
    <!-- FontAwesome -->
    <link rel="stylesheet" href="../../style/FR FRONTEND/FONTAWESOME/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Review</title>
</head>
<body style="background-color: white;">
  <!-- Header -->
  <?php include '../../header.html' ?>

  <main>
    <section>
        <div class="container d-flex justify-content-center">
            <form action="proses.php" method="POST">
                <div class="card bordered border-dark mb-5" style="width: 22rem">
                  <h3 class="card-header bg-primary text-white text-center bordered border-dark">Beri Ulasan</h3>
                  <div class="card-body">
                    <!-- Menampilkan data dari tbl_transaksi berdasarkan id_pesan -->
                    <?php
                    // Koneksi
                    include '../../koneksi.php';

                    // Variable
                    $id_pesan = $_POST['id_pesan'];

                    // Query
                    $data = mysqli_query($koneksi,"SELECT id_pesan as ip, id_customer as ic FROM tbl_transaksi WHERE id_pesan='$id_pesan'");

                    // Loop
                    while($d = mysqli_fetch_array($data)){
                        ?>
                        <input type="hidden" name="id_pesan" value="<?= $d['ip'];?>">
                        <input type="hidden" name="id_customer" value="<?= $d['ic'];?>">
                        <div class="mb-3">
                            <label class="form-label">Ulasan</label>
                            <textarea name="ulasan" cols="10" rows="3" class="form-control" style="border: 1px solid #FF7D2D" placeholder="Masukkan Ulasan Anda Disini" required></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="stars">
                              <input type="radio" id="star5" name="rating" value="1" style="display: none;" />
                              <label for="star5" class="star ms-3">
                                <i class="fa-solid fa-star"></i>
                            </label>
                            <input type="radio" id="star4" name="rating" value="2" style="display: none;" />
                            <label for="star4" class="star ms-3">
                                <i class="fa-solid fa-star"></i>
                            </label>
                            <input type="radio" id="star3" name="rating" value="3" style="display: none;" />
                            <label for="star3" class="star ms-3">
                                <i class="fa-solid fa-star"></i>
                            </label>
                            <input type="radio" id="star2" name="rating" value="4" style="display: none;" />
                            <label for="star2" class="star ms-3">
                                <i class="fa-solid fa-star"></i>
                            </label>
                            <input type="radio" id="star1" name="rating" value="5" style="display: none;" />
                            <label for="star1" class="star ms-3">
                                <i class="fa-solid fa-star"></i>
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Kirim" class="btn btn-primary">
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