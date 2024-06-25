<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Transaksi Anda</title>
</head>
<body>
  <script>
    // Function untuk membatalkan transaksi
    function batalT() {
      var result = confirm("Apakah Anda yakin ingin membatalkan transaksi?");
      return result;
    }
    // Function untuk menyelesaikan transaksi
    function selesaiT() {
      var result = confirm("Apakah Anda yakin ingin menyelesaikan transaksi?");
      return result;
    }
  </script>
  <button type="button" class="btn btn-primary btn-lg position-relative" data-bs-toggle="modal" data-bs-target="#riwayatTransaksi">
    Daftar Transaksi
    <!-- Menghitung data status dari tbl_transaksi berdasarkan status = 'Proses' -->
    <?php
    // Query
    $data = mysqli_query($koneksi,"SELECT COUNT(status) AS stts FROM tbl_transaksi WHERE status=1");

    // Loop
    while ($d = mysqli_fetch_array($data)) {
      // IF jumlah status lebih dari 0
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
  <div class="modal fade" id="riwayatTransaksi" tabindex="-1" aria-labelledby="riwayatTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
      <div class="modal-content bordered border-primary border-3">
        <div class="modal-header bordered border-dark border-bot-2">
          <h1 class="modal-title fs-5" id="riwayatTransaksiLabel">Daftar Transaksi Customer</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <table class="table table-bordered border-dark">
          <thead class="table table-bordered border-dark table-primary">
            <tr>
              <th>No</th>
              <th>ID Customer</th>
              <th>Tanggal<br>Transaksi</th>
              <th>Metode<br>Pembayaran</th>
              <th>Total Biaya</th>
              <th>Status<br>Transaksi</th>
              <th>Detail<br>Transaksi</th>
            </tr>
          </thead>
          <tbody class="table table-bordered border-dark table-warning">
            <!-- Menampilkan data dari tbl_transaksi -->
            <?php
            $no = 1;

            // Query
            $data = mysqli_query($koneksi,"SELECT 
            id_transaksi AS idt, 
            id_pesan AS idp, 
            id_customer AS idc, 
            tgl_transaksi AS tglT, 
            metode_pembayaran AS mp, 
            total_biaya AS tb, 
            status AS stts 
            FROM tbl_transaksi WHERE id_kasir='$id' AND status IN(1,2,4) ORDER BY status ASC");

            // Loop
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['idc'] ?></td>
                <td><?php echo $d['tglT']; ?></td>
                <td><?php echo $d['mp']; ?></td>
                <td>Rp. <?php echo number_format($d['tb'],'0','','.'); ?></td>
                <td><?php echo $d['stts']; ?>
                <!-- Tombol untuk menyelesaikan transaksi -->
                <?php if ($d['stts'] == "Proses") {
                  ?>
                  <a href="transaksi/proses.php?id_transaksi=<?php echo $d['idt'];?>&submit=Selesai" onclick="return selesaiT()">
                    <button class="btn btn-success mb-2">Selesaikan</button>
                  </a>
                  <a href="transaksi/proses.php?id_transaksi=<?php echo $d['idt'];?>&id_pesan=<?php echo $d['idp']; ?>&submit=Batal" onclick="return batalT()">
                    <button class="btn btn-danger">Batal</button>
                  </a>
                <?php } ?>
              </td>
              <td>
                <form action="transaksi/downloadstruk.php" method="POST">
                  <input type="hidden" name="id_transaksi" value="<?= $d['idt']?>">
                  <input type="hidden" name="id_customer" value="<?= $d['idc']?>">
                  <input type="submit" value="Cek" class="btn btn-info text-white">
                </form>
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