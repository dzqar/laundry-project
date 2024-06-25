<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Metode</title>
</head>
<body>
  
  <script>
    // Function untuk menghapus data metode
    function hapusM(){
      var result = confirm("Apakah Anda yakin ingin menghapus daftar metode ini?");
      return result;
    }
  </script>

 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#daftarMetode">
  Lihat Daftar <br> Metode
</button>

<!-- Modal -->
<div class="modal fade" id="daftarMetode" tabindex="-1" aria-labelledby="riwayatTransaksiLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content bordered border-primary border-3">
      <div class="modal-header bordered border-dark border-bot-2">
        <h1 class="modal-title fs-5" id="riwayatTransaksiLabel">Daftar Metode</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <table border="1px" class="table table-bordered border-dark">
        <thead class="table table-bordered table-primary border-dark">
          <tr>
            <th>No</th>
            <th>Jenis Metode</th>
            <th>Nama Metode</th>
            <th>Estimasi</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody class="table table-bordered border-dark table-warning">
          <!-- Menampilkan data dari tbl_data_metode dan INNER JOIN tbl_metode dengan menyamakan column yang bersangkutan -->
          <?php
          $no = 1;
          // Query
          $data = mysqli_query($koneksi,"SELECT id_data_metode as idm, nama_metode as nm, nama_data_metode as ndm, estimasi as est, harga as h FROM tbl_data_metode INNER JOIN tbl_metode ON tbl_data_metode.id_metode=tbl_metode.id_metode");

          // Loop
          while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $d['nm'] ?></td>
              <td><?php echo $d['ndm']; ?></td>
              <td><?php echo $d['est'];?></td>
              <td>Rp. <?php echo number_format($d['h'],'0','','.'); ?></td>
              <td>
                <form action="metode/edit_metode.php" method="POST">
                  <input type="hidden" name="id_data_metode" value="<?= $d['idm']?>">
                  <input type="submit" value="Edit" class="btn btn-success">
                  <a href="metode/proses.php?id_data_metode=<?= $d['idm']?>&submit=Hapus" class="btn btn-danger" type="button" onclick="return hapusM()">Hapus</a>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="modal-footer bordered border-dark border-top-2">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      <a href="metode/tambah_metode.php" type="button" class="btn btn-primary">Tambah Metode</a>
    </div>
  </div>
</div>
</div>
</body>
</html>