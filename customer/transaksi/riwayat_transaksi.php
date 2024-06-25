<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Transaksi Anda</title>
</head>
<body>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#riwayatTransaksi">
    Daftar <br> Transaksi
  </button>

  <!-- Modal -->
  <div class="modal fade" id="riwayatTransaksi" tabindex="-1" aria-labelledby="riwayatTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg modal-fullscreen-md-down">
      <div class="modal-content bordered border-primary border-3">
        <div class="modal-header bordered border-bot-2 border-dark">
          <h1 class="modal-title fs-5" id="riwayatTransaksiLabel">Daftar Transaksi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table border="1" class="table table-bordered border-dark">
            <thead class="table table-primary table-bordered border-dark">
              <tr>
                <th>No</th>
                <th>Tanggal<br>Transaksi</th>
                <th>Metode<br>Pembayaran</th>
                <th>Total Biaya</th>
                <th>Status<br>Transaksi</th>
              </tr>
            </thead>
            <tbody class="table table-bordered table-warning border-dark">
              <!-- Menampilkan data dari tbl_transaksi berdasarkan id_customer -->
              <?php
              $no = 1;

              // Query
              $data = mysqli_query($koneksi,"SELECT
              tgl_transaksi as tglT,
              metode_pembayaran as mb,
              total_biaya as tb,
              status as stts,
              id_customer as ic,
              id_pesan as ip
              FROM tbl_transaksi WHERE id_customer='$id' ORDER BY status ASC");

              // Loop
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['tglT']; ?></td>
                  <td><?php echo $d['mb']; ?></td>
                  <td>Rp. <?php echo number_format($d['tb'],'0','','.'); ?></td>
                  <td><?php echo $d['stts'];
                  // Jika status = Selesai dan id_customer = id_user
                  if ($d['stts'] === 'Selesai' && $_SESSION['id_user'] === $d['ic']){ ?>
                    <form action="review/review.php" method="POST">
                      <input type="hidden" name="id_pesan" value="<?= $d['ip']?>">
                      <input type="submit" value="Beri Ulasan" class="btn btn-success">
                    </form>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer bordered border-dark border-top-2">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>