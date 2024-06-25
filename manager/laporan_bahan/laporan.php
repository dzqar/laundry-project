<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Bahan Laundry</title>
</head>
<body>
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
              <!-- Menampilkan data dari tbl_data_bahan -->
              <?php
              $no = 1;

              // Query
              $data = mysqli_query($koneksi,"SELECT
              id_bahan as ib,
              nama_bahan as nb,
              stok as persediaan,
              status as stts
              FROM tbl_data_bahan");

              // Loop
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?php echo $d['ib']; ?></td>
                  <td><?php echo $d['nb']; ?></td>
                  <td><?php echo $d['persediaan']; ?></td>
                  <td><?php echo $d['stts']; ?></td>
                  <td>
                    <form action="laporan_bahan/edit_bahan.php" method="POST">
                      <input type="hidden" name="id_bahan" value="<?= $d['ib']?>">
                      <input type="submit" value="Edit" class="btn btn-success">
                      <a href="laporan_bahan/proses.php?id_bahan=<?= $d['ib']?>&submit=Hapus" type="button" class="btn btn-danger">Hapus</a>
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer bordered border-dark border-top-2">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <a href="laporan_bahan/lapor.php"><button type="button" class="btn btn-primary">Buat Data Bahan</button></a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>