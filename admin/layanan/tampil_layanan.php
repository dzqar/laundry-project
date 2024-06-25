<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Layanan</title>
</head>
<body>
 <script>
    // Function untuk menghapus Layanan
    function hapusL(){
        var result = confirm('Apakah anda yakin ingin menghapus layanan tersebut?');
        return result;
    }
</script>
<!-- Button memunculkan modal Layanan -->
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#layanan">
  Daftar <br> Layanan
</button>

<!-- Modal Layanan-->
<div class="modal fade" id="layanan" tabindex="-1" aria-labelledby="layananLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content bordered border-primary border-3">
      <div class="modal-header bordered border-dark border-bot-2">
        <h1 class="modal-title fs-5" id="layananLabel">Daftar Layanan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <!-- List Layanan -->
        <table border="1px" class="table table-bordered border-dark">
            <thead class="table table-bordered border-dark table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Jenis Layanan</th>
                    <th>Estimasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table table-bordered border-dark table-warning">
                <?php
                $no = 1;
                // Query
                $data = mysqli_query($koneksi,"SELECT id_layanan as idl, nama_layanan as nl, harga as h, jenis_layanan as jl, estimasi as est FROM tbl_layanan");

                // Loop
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $d['nl']; ?></td>
                        <td>Rp. <?php echo number_format($d['h'],'0','','.'); ?></td>
                        <td><?php echo $d['jl'] ?></td>
                        <td><?php echo $d['est'];?></td>
                        <td>
                            <form action="layanan/edit_layanan.php" method="POST">
                                <input type="hidden" name="id_layanan" value="<?php echo $d['idl']; ?>">
                                <input type="submit" value="Edit" class="btn btn-success mb-2">
                                <a type="button" href="layanan/proses.php?id_layanan=<?php echo $d['idl'] ?>&submit=Hapus" onclick="return hapusL()" class="btn btn-danger mb-2">Hapus</a> 
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="modal-footer bordered border-dark border-top-2">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <a href="layanan/input_layanan.php" type="button" class="btn btn-primary">Buat Layanan</a>
    </div>
</div>
</div>
</div>
</body>
</html>