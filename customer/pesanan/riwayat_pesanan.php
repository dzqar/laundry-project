<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Pesanan</title>
</head>
<body>
  <script>
    // Function untuk membatalkan pesanan
    function batalP() {
      var result = confirm("Apakah Anda yakin ingin membatalkan pesanan?");
      return result;
    }
  </script>
  <button type="button" class="btn btn-primary btn-lg position-relative" data-bs-toggle="modal" data-bs-target="#riwayatPesanan">
    Daftar Pesanan
    <!-- Menghitung data dari tbl_pesan berdasarkan status dan id_customer -->
    <?php
    // Query
    $data = mysqli_query($koneksi,"SELECT COUNT(status) AS stts FROM tbl_pesan WHERE status=3 AND id_customer=$id");
    // Loop
    while ($d = mysqli_fetch_array($data)) {
      // IF jumlah statusnya lebih dari 0
      if ($d['stts'] > 0) {
        ?>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?= $d['stts'] ?>
          <span class="visually-hidden">unread messages</span>
        </span>
        <?php
      }
    }
    ?>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="riwayatPesanan" tabindex="-1" aria-labelledby="riwayatPesananLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl modal-fullscreen-md-down">
      <div class="modal-content bordered border-primary border-3">
        <div class="modal-header bordered border-dark border-bot-2">
          <h1 class="modal-title fs-5" id="riwayatPesananLabel">Daftar Pesanan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table border="1" class="table table-bordered border-dark">
            <thead class="table table-bordered table-primary border-dark">
              <tr>
                <th>No</th>
                <th>Tanggal Pesan</th>
                <th>Tanggal <br>Pengambilan</th>
                <th>Total Biaya</th>
                <th>Status</th>
                <th>Detail <br> Pesanan</th>
              </tr>
            </thead>
            <tbody class="table table-bordered border-dark table-warning">
              <!-- Menampilkan data dari tbl_pesan berdasarkan id_customer -->
              <?php
              $no = 1;

              // Query
              $data = mysqli_query($koneksi,"SELECT
              id_pesan as ip,
              id_customer as ic,
              tgl_pesan as tglP,
              tgl_pengambilan as tglA,
              total_biaya as tb,
              status as stts
              FROM tbl_pesan WHERE id_customer='$id' ORDER BY status ASC");

              // Loop
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?php echo $d['tglP'];?></td>
                  <td><?php echo $d['tglA'];?></td>
                  <td>Rp. <?php echo number_format($d['tb'],'0','','.');?></td>
                  <td>
                  <form action="transaksi/transaksi.php" method="POST" class="d-flex justify-content-center">
                    <?php echo $d['stts'];?>
                    <input type="hidden" name="id_pesan" value="<?php echo $d['ip'] ?>">
                    <!-- Kondisi PHP Jika Status Pesanan masih belum diterima, maka akan ada opsi tombol untuk membatalkan pesanan -->
                    <?php if ($d['stts'] === 'Belum Diterima' && $_SESSION['id_user'] === $d['ic']) { ?>
                      <!-- Tombol Batal -->
                      <a href="pesanan/proses_pesanan.php?id_pesan=<?php echo $d['ip']; ?>&submit=Batal" onclick="return batalP()" type='button' class='btn btn-danger ms-3'>Batal</a>
                    <?php } ?>
                    <!-- Kondisi PHP Jika Status Pesanan sudah berubah menjadi selesai, maka akan ada tombol untuk transaksi -->
                    <?php if ($d['stts'] === 'Selesai' && $_SESSION['id_user'] === $d['ic']/* && $d['tgl_pengambilan'] === date('Y-m-d')*/) { ?>
                      <!-- Tombol Bayar/Transaksi -->
                      <button type='submit' class='btn btn-success ms-3'>Transaksi</button>
                    <?php } ?>
                  </form>
                </td>
                <td>
                  <form action="pesanan/download.php" method="POST">
                    <input type="hidden" name="id_pesan" value="<?php echo $d['ip']; ?>">
                    <input type="hidden" name="id_customer" value="<?php echo $d['ic']; ?>">
                    <?php if ($d['stts'] === 'Batal' || $d['stts'] === 'Transaksi') { ?>
                      <!-- IF status = Batal OR status = Transaksi || Disable tombol Cek -->
                      <input type="submit" disabled value="Cek" class="btn btn-outline-secondary">
                    <?php }else{ ?>
                      <!-- Tombol cek undisabled -->
                      <input type="submit" value="Cek" class="btn btn-info text-white">
                    <?php } ?>
                  </form>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer bordered border-dark border-top-2">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <a href="pesanan/pesanan.php" type="button" class="btn btn-primary">Buat Pesanan</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>