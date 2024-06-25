<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Bahan Laundry</title>
</head>
<body>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#LaporanBahan">
    Data <br> Bahan Laundry
  </button>

  <!-- Modal -->
  <div class="modal fade" id="LaporanBahan" tabindex="-1" aria-labelledby="LaporanBahanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
      <div class="modal-content bordered border-primary border-3">
        <div class="modal-header bordered border-dark border-bot-2">
          <h1 class="modal-title fs-5" id="LaporanBahanLabel">Data Bahan Laundry</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table border="1px" class="table table-bordered border-dark">
            <thead class="table table-primary table-bordered border-dark">
              <tr>
                <th>No</th>
                <th>Nama Bahan</th>
                <th>Stok</th>
                <th>Status</th>
                <th>aksi</th>
              </tr>
            </thead>
            <tbody class="table table-warning table-bordered border-dark">
              <!-- Untuk menampilkan data yang ada di tbl_laporan_bahan -->
              <?php
              $no = 1;
              // Query
              $data = mysqli_query($koneksi,"SELECT id_bahan AS ib, nama_bahan AS nb, stok AS stk, status AS stts FROM tbl_data_bahan ORDER BY status DESC");
              // Loop
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $d['nb']; ?></td>
                  <td><?php echo $d['stk']; ?></td>
                  <td><?php echo $d['stts']; ?>
                </td>
                <td>
                  <form action="laporan_bahan/update_status.php" method="POST">
                  <input type="hidden" name="id_bahan" value="<?php echo $d['ib'];?>">
                  <input type="hidden" name="stok" value="<?php echo $d['stk'];?>">
                      <input type="number" class="form-control" style="border: 1px solid #FF7D2D" name="stoktambah" min="1" value="1" required>
                      <input type="submit" class="btn btn-success" value="Tambah">
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