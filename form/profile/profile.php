<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="../script/jquery-3.7.1.min.js"></script>
  <title>Daftar Pesanan</title>
</head>
<body>
  <!-- Modal -->
  <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="riwayatPesananLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-md-down">
      <div class="modal-content bordered border-primary border-3">
        <!-- Form -->
        <form action="../form/profile/proses.php" method="POST" enctype="multipart/form-data">
          <div class="modal-header bordered border-dark border-bot-2">
            <h1 class="modal-title fs-5" id="riwayatPesananLabel">Profil</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Menampilkan data dari tbl_user berdasarkan id_user -->
            <?php
            // Query
            $data = mysqli_query($koneksi,"SELECT
            foto as gambar,
            nama,
            alamat as lokasi,
            no_tlp as tlp,
            username as un,
            password as pw
            FROM tbl_user WHERE id_user = $id");

            // Loop
            while ($d = mysqli_fetch_array($data)) { ?>
              <!-- Script -->
              <script>
                // Membuat function foto() untuk preview foto ketika mengupload file
                function pripiw(){
                  // Untuk menangkap tag dengan id="foto" dan return files nya itu index/utama (0) ketika sudah di upload
                  var foto = document.getElementById("foto").files[0];
                  // Menangkap tag dengan id="preview" untuk melakukan preview sebuah foto
                  var preview = document.getElementById("preview");

                  
                  // Tanpa pake File API
                  if (foto) {
                    // Menambahkan atribut src pada tag yang id="preview" dengan valuenya ditangkap dari variabel foto
                    preview.src = URL.createObjectURL(foto);
                    // Membuat style id="preview" display="block" untuk di tampilkan
                    preview.style.display = "block";
                  }else{
                    // Jika tidak ada, maka src nya menjadi # dan display nya menjadi none, agar tidak di tampilkan
                    preview.src = "../form/profile/gambar/<?= $d['gambar']?>";
                    preview.style.display= "block";
                  }
                }
                  // Function showPass yang baru
                  $(document).ready(function() {
                  // Ketika <a> yang didalam <div id="pw"> di click
                  $("#pw a").on('click', function(event) {
                    // Membatalkan tindakan onclick (kalo di nonaktifin, href="" nya bakal jalan)
                    event.preventDefault();
                    // Jika <input type="text">
                    if($('#pw input').attr("type") == "text"){
                      // Mengubahnya menjadi "password"
                      $('#pw input').attr('type', 'password');
                      // Menambah class di <i> atau icon mata nya
                      $('#pw i').addClass( "bi-eye-slash" ); //Icon mata dicoret
                      // Menghapus class
                      $('#pw i').removeClass( "bi-eye" ); //Icon mata biasa
                      // Jika <input type="password">
                    }else if($('#pw input').attr("type") == "password"){
                      // Mengubahnya menjadi text
                      $('#pw input').attr('type', 'text');
                      // Menghapus class
                      $('#pw i').removeClass( "bi-eye-slash" );
                      // Menambah class
                      $('#pw i').addClass( "bi-eye" );
                    }
                  });
                });
              </script>
              <!-- Akhir Script -->
              <table class="table table-bordered">
                <tr>
                  <td colspan="2">
                    <img src="../form/profile/gambar/<?= $d['gambar']?>" id="preview" style="border-radius: 50%; object-fit: cover;" alt="foto profile" width="100" height="100" class="me-2 d-inline-block align-text-top">
                  </td>
                </tr>
                <?php
                // IF gambar bukan deafult.png
                if ($d['gambar'] != 'default.png') { ?>
                  <tr>
                    <td colspan="2">
                      <input type="hidden" name="foto" value="<?= $d['gambar']?>">
                      <!-- Muncul tombol hapus foto -->
                      <input type="submit" name="submit" value="Hapus Foto" class="btn btn-danger">
                    </td>
                  </tr>
                  <?php
                }
                ?>
                <input type="hidden" name="id_user" value="<?= $id?>">
                <tr>
                  <td>Upload Foto Baru</td>
                  <td><input type="file" name="foto" id="foto" onchange="pripiw()" class="form-control" style="border: 1px solid #FF7D2D" accept="image/png,image/jpg,image/gif"></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><input type="text" name="nama" value="<?= $d['nama']?>" class="form-control" style="border: 1px solid #FF7D2D" pattern="{1,50}" title="Masukkan huruf" required></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><textarea name="alamat" class="form-control" style="border: 1px solid #FF7D2D" cols="10" rows="2" required><?= $d['lokasi']?></textarea></td>
                </tr>
                <tr>
                  <td>No Telepon</td>
                  <td><input type="number" name="no_tlp" value="<?= $d['tlp']?>" class="form-control" style="border: 1px solid #FF7D2D" pattern="[0-9]{12,15}" title="Masukkan nomor minimal digit 12, maksimal 15" inputmode="numeric" required></td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td><input type="text" value="<?= $d['un']?>" class="form-control" style="border: 1px solid #FF7D2D" disabled></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td class="input-group" id="pw">
                    <input type="password" name="password" value="<?= $d['pw']?>" class="form-control" style="border: 1px solid #FF7D2D" pattern=".{8,25}" required title="Password minimal 8 karakter, dan maksimal 20 karakter">
                    <div class="input-group-text" style="border: 1px solid #FF7D2D">
                      <a href="" style="color: #333"><i class="bi bi-eye-slash" aria-hidden="true"></i></a>
                    </div>
                  </td>
                </tr>
              </table>
              <?php
            }
            ?>
          </div>
          <div class="modal-footer bordered border-dark border-top-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <input type="reset" value="Ulang" class="btn btn-danger">
            <input type="submit" name="submit" value="Ubah Profil" class="btn btn-primary">
          </div>
        </form>
        <!-- Akhir Form -->
      </div>
    </div>
  </div>
</body>
</html>