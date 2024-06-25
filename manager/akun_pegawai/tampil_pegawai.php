<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pegawai (Admin, Manager, Kasir) JIT Laundry</title>
</head>
<body>
    <script>
        // Function untuk menghapus akun pegawai
        function hapusPeg(){
            var result = confirm("Apakah Anda yakin ingin menghapus akun tersebut?");
            return result;
        }
  </script>

  <!-- Button modal list akun pegawai -->
  <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#tampilpegawai">
      Daftar <br> Akun Pegawai
  </button>

  <!-- Modal list akun pegawai-->
  <div class="modal fade" id="tampilpegawai" tabindex="-1" aria-labelledby="tampilpegawaiLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content bordered border-primary border-3">
          <div class="modal-header bordered border-dark border-bot-2">
            <h1 class="modal-title fs-5" id="tampilpegawaiLabel">Daftar Akun Pegawai</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <table border="1px" class="table table-bordered border-dark">
            <thead class="table table-bordered table-primary border-dark">
                <tr>
                    <th>No</th>
                    <th>ID User</th>
                    <th>Username</th>
                    <th>Role/Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <!-- menampilkan akun pegawai yang levelnya kasir, manager, admin dan tidak menampilkan akun sendiri di list tersebut -->
            <?php
            $no = 1;

            // Query
            $data = mysqli_query($koneksi,"SELECT
            id_user as ui,
            username as un,
            level as role
            FROM tbl_user WHERE level < 4 AND id_user != '$id'");

            // Loop
            while($d = mysqli_fetch_array($data)){
                ?>
                <tbody class="table table-bordered border-dark table-warning">
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['ui']; ?></td>
                        <td><?php echo $d['un']; ?></td>
                        <td><?php echo $d['role']; ?></td>
                        <td><form action="akun_pegawai/edit_pegawai.php" method="POST">
                                <input type="hidden" name="id_user" value="<?php echo $d['ui']; ?>">
                                <input type="submit" value="Edit Akun" class="btn btn-success mb-2 mt-2">
                                <a href="akun_pegawai/proses.php?id_user=<?php echo $d['ui'] ?>&submit=Hapus" onclick="return hapusPeg()" type="button" class="btn btn-danger">Hapus Akun</a>
                            </form>
                        </td>
                    </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
    <div class="modal-footer bordered border-dark border-top-2">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <a href="akun_pegawai/daftar.php" type="button" class="btn btn-primary">Buat Akun Pegawai</a>
    </div>
</div>
</div>
</div>
</body>
</html>