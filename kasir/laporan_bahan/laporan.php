<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Bahan Laundry</title>
</head>
<body>
  <script>
    // Function untuk mengurangi stok
    function kurangDB(){
      var result = confirm("Apakah Anda yakin ingin mengurangi stok ini?");
      return result;
    }
  </script>

  <!-- Button modal daftar laporan bahan -->
  <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#laporanbahan">
    Data <br> Bahan Laundry
  </button>

  <!-- Modal -->
  <div class="modal fade" id="laporanbahan" tabindex="-1" aria-labelledby="laporanbahanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
      <div class="modal-content bordered border-primary border-3">
        <div class="modal-header bordered border-dark border-bot-2">
          <h1 class="modal-title fs-5" id="laporanbahanLabel">Data Bahan Laundry</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table border="1px" class="table table-bordered border-dark">
            <thead class="table table-bordered border-dark table-primary">
              <tr>
                <th>Kode Bahan</th>
                <th>Nama Bahan</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table table-bordered border-dark table-warning">
              <!-- Menampilkan daftar laporan bahan sesuai id_manager yang menginputnya -->
              <?php
              $no = 1;

              // Query
              $data = mysqli_query($koneksi,"SELECT
              id_bahan as ib,
              nama_bahan as nb,
              stok as persediaan,
              status as stts
              FROM tbl_data_bahan ORDER BY status ASC");

              // Loop
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $d['ib']; ?></td>
                  <td><?php echo $d['nb']; ?></td>
                  <td><?php echo $d['persediaan']; ?></td>
                  <td><?php echo $d['stts']; ?></td>
                <td>
                  <form action="laporan_bahan/update_status.php" onsubmit="return kurangDB()" method="POST">
                  <input type="hidden" name="id_bahan" value="<?php echo $d['ib'];?>">
                  <input type="hidden" name="stok" value="<?php echo $d['persediaan'];?>">
                  <?php
                  // IF persediaan lebih kecil dari 1
                    if ($d['persediaan'] < 1) { ?>
                      <!-- Disabled input -->
                      <input type="number" name="stokkurang" class="form-control" style="border: 1px solid #FF7D2D" min="0" value="0" disabled>
                      <input type="submit" class="btn btn-success" value="kurangi" disabled>
                      <?php
                    }else{
                      ?>
                      <!-- Enabled input -->
                      <input type="number" name="stokkurang" class="form-control" style="border: 1px solid #FF7D2D" min="1" max="<?= $d['persediaan']?>" value="1" required>
                      <input type="submit" class="btn btn-success" value="kurangi">
                  <?php }?>
                </form>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>