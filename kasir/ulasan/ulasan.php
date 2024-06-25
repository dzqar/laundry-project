<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ulasan Customer</title>
</head>
<body>
  <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#ulasan">
    Lihat Ulasan
  </button>

  <!-- Modal -->
  <div class="modal fade" id="ulasan" tabindex="-1" aria-labelledby="ulasanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
      <div class="modal-content bordered border-primary border-3">
        <div class="modal-header bordered border-dark border-bot-2">
          <?php 
          // Query
            $data = mysqli_query($koneksi,"SELECT COUNT(rating) AS rate FROM tbl_review");

            // Konversi menjadi Array
            $p = mysqli_fetch_array($data);
            ?>
          <h1 class="modal-title fs-5" id="ulasanLabel">* <u><?= $p['rate']?></u> Ulasan dari Customer</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
             <table class="table table-bordered border-dark table-striped" border="1">
              <thead class="table table-bordered border-dark table-primary">
                <tr>
                  <th>No</th>
                  <th><i class="bi bi-person-fill"></i> Username</th>
                  <th>Ulasan</th>
                  <th><i class="bi bi-star-fill"></i> Rating</th>
              </tr>
          </thead>
          <tbody class="table table-bordered border-dark table-warning">
           <!-- Menampilkan data dari tbl_review dan INNER JOIN dengan tbl_user dengan menyamakan kedua column yang bersangkutan -->
            <?php
            $no=1;

            // Query
            $data = mysqli_query($koneksi,"SELECT tbl_user.username as un, review as ulasan, rating as rate FROM tbl_review INNER JOIN tbl_user ON tbl_review.id_user = tbl_user.id_user");

            // Loop
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $d['un'];?></td>
                <td><?php echo $d['ulasan'];?></td>
                <td><?php echo $d['rate'];?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
  </table>

</div>
<div class="modal-footer bordered border-dark border-top-2">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
</div>
</div>
</div>
</div></body>
</html>