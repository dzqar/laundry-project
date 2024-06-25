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

    // Function untuk selesaikan pesanan
    function selesaiP() {
      var result = confirm("Apakah Anda yakin ingin menyelesaikan pesanan?");
      return result;
    }

    // Function untuk menghapus semua Daftar pesanan
    function hapusP(){
      var result = confirm("Apakah Anda yakin ingin menghapus semua pesanan yang sudah selesai transaksi dan pesanan yang batal?");
      return result;
    }
  </script>
  <button type="button" class="btn btn-primary btn-lg position-relative" data-bs-toggle="modal" data-bs-target="#riwayatPesanan">
    Daftar Pesanan
    <?php
    $data = mysqli_query($koneksi,"SELECT COUNT(status) AS stts FROM tbl_pesan WHERE status=1");
    while ($d = mysqli_fetch_array($data)) {
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
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
      <div class="modal-content bordered border-primary border-3">
        <div class="modal-header bordered border-dark border-bot-2">
          <h1 class="modal-title fs-5" id="riwayatPesananLabel">Daftar Pesanan Customer</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <table class="table table-bordered border-dark" border="1">
          <thead class="table table-bordered border-dark table-primary">
            <tr>
              <th>ID Pesan</th>
              <th>ID Customer</th>
              <th>Nama Layanan</th>
              <th>Jumlah <br>Pakaian</th>
              <th>Metode <br>Pengambilan</th>
              <th>Metode <br>Pencucian</th>
              <th>Tanggal Pesan</th>
              <th>Tanggal <br>Pengambilan</th>
              <th>Total Biaya</th>
              <th colspan="2">Status</th>
            </tr>
          </thead>
          <tbody class="table table-bordered border-dark table-warning">
            <?php
            $data = mysqli_query($koneksi,"SELECT
            id_pesan as ip,
            id_kasir as ik,
            id_customer as ic,
            nama_layanan as nl,
            jumlah as jmlh,
            metode_pengambilan as ma,
            metode_pencucian as mc,
            tgl_pesan as tglP,
            tgl_pengambilan as tglA,
            total_biaya as tb,
            status as stts
            FROM tbl_pesan WHERE id_kasir IN(0, '$id') AND status IN(1,2,3,5,4) ORDER BY status ASC");
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><?php echo $d['ip'];?></td>
                <td><?php echo $d['ic'];?></td>
                <td><?php echo $d['nl'];?></td>
                <td><?php echo $d['jmlh'];?></td>
                <td><?php echo $d['ma'];?></td>
                <td><?php echo $d['mc'];?></td>
                <td><?php echo $d['tglP'];?></td>
                <td><?php echo $d['tglA'];?></td>
                <td>Rp. <?php echo number_format($d['tb'],'0','','.');?></td>
                <td><?php echo $d['stts'];?><br>
                <!-- Tombol untuk menerima pesanan -->
                <?php if ($d['stts'] == "Belum Diterima") { ?>
                  <a href="pesanan/proses.php?id_pesan=<?php echo $d['ip'];?>&id_kasir=<?php echo $id;?>&submit=Terima">
                    <button class="btn btn-warning mb-2">Terima</button>
                  </a>
                <?php } ?>
                <!-- Tombol untuk menyelesaikan pesanan -->
                <?php if ($d['stts'] == "Proses" && $id === $d['ik']) { ?>
                  <a href="pesanan/proses.php?id_pesan=<?php echo $d['ip'];?>&submit=Selesaikan" onclick="return selesaiP()">
                    <button class="btn btn-success mb-2">Selesaikan</button>
                  </a>
                <?php } ?>
                <!-- Tombol untuk membatalkan pesanan -->
                <?php if ($d['stts'] == "Belum Diterima" || $d['stts'] == "Proses" && $id === $d['ik']) { ?>
                  <a href="pesanan/proses.php?id_pesan=<?php echo $d['ip'];?>&id_kasir=<?php echo $id;?>&submit=Batal" onclick="return batalP()">
                    <button class="btn btn-danger">Batal</button>
                  </a>
                <?php } ?>
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
      <a href="pesanan/proses.php?id_kasir=<?= $id ?>&submit=Hapus">
      <button type="button" class="btn btn-danger" onclick="return hapusP()">Bersihkan</button>
      </a>
    </div>
  </div>
</div>
</div>
</body>
</html>