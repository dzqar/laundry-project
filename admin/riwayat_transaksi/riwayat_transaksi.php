<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Transaksi Kasir</title>
</head>
<body>
  
  <script>
    // Function untuk membersihkan daftar transaksi
    function hapusT(){
      var result = confirm("Apakah Anda yakin ingin menghapus semua daftar transaksi yang sudah selesai?");
      if (result) {
        // Redirect ke halaman untuk memproses menghapus semau daftar transaksi
        window.location.href = "riwayat_transaksi/hapus.php";
      }else{
        // Tidak kemana-mana
      }
      return result;
    }
  </script>

 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#riwayatTransaksi">
  Lihat Daftar <br> Transaksi (Kasir)
</button>

<!-- Modal -->
<div class="modal fade" id="riwayatTransaksi" tabindex="-1" aria-labelledby="riwayatTransaksiLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content bordered border-primary border-3">
      <div class="modal-header bordered border-dark border-bot-2">
        <h1 class="modal-title fs-5" id="riwayatTransaksiLabel">Daftar Transaksi (Kasir)</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <table border="1px" class="table table-bordered border-dark">
        <thead class="table table-bordered table-primary border-dark">
          <tr>
            <th>No</th>
            <th>Kasir</th>
            <th>Tanggal Transaksi</th>
            <th>Metode<br>Pembayaran</th>
            <th>Nama<br>Layanan</th>
            <th>Metode<br>Pencucian</th>
            <th>Metode<br>Pengambilan</th>
            <th>Total Biaya</th>
            <th>Status<br>Transaksi</th>
          </tr>
        </thead>
        <tbody class="table table-bordered border-dark table-warning">
          <?php
          // Query
          $data = mysqli_query($koneksi,"SELECT tbl_transaksi.id_transaksi as it, 
            tgl_transaksi as tglT, 
            metode_pembayaran as mb, 
            tbl_transaksi.total_biaya as tb, 
            tbl_transaksi.status as stts, 
            tbl_user.username as un, 
            tbl_pesan.nama_layanan as nl, 
            tbl_pesan.metode_pencucian as mc, 
            tbl_pesan.metode_pengambilan as ma 
            FROM ((tbl_transaksi INNER JOIN tbl_user ON tbl_transaksi.id_kasir=tbl_user.id_user) INNER JOIN tbl_pesan ON tbl_transaksi.id_pesan=tbl_pesan.id_pesan)");

          // Loop
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><?php echo $d['it']; ?></td>
              <td><?php echo $d['un'] ?></td>
              <td><?php echo $d['tglT']; ?></td>
              <td><?php echo $d['mb']; ?></td>
              <td><?php echo $d['nl']; ?></td>
              <td><?php echo $d['mc']; ?></td>
              <td><?php echo $d['ma']; ?></td>
              <td>Rp. <?php echo number_format($d['tb'],'0','','.'); ?></td>
              <td><?php echo $d['stts']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="modal-footer bordered border-dark border-top-2">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
       <button type="button" class="btn btn-danger" onclick="return hapusT()">Bersihkan</button>
    </div>
  </div>
</div>
</div>
</body>
</html>