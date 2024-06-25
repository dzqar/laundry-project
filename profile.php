<div class="navbar-brand ms-3">
  <?php
  $data = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE id_user = $id");
  while ($d = mysqli_fetch_array($data)) { ?>
    <table border="0">
      <tr>
        <th rowspan="4">
          <a data-bs-toggle="modal" data-bs-target="#profile">
            <!-- <img src="../style/img/profile.png" alt="foto profile" width="70" height="70" class="me-2 d-inline-block align-text-top"> -->
            <img src="../form/profile/gambar/<?= $d['foto']?>" alt="foto profile" width="70px" height="70px" class="me-2 d-inline-block align-text-top" style="border-radius: 50%; object-fit: cover;">
          </a>
        </th>
      </tr>
      <tr>
        <td class="fs-3">
          <a data-bs-toggle="modal" data-bs-target="#profile">
            <?php echo $d['username']; ?>
          </a>
        </td>
        <td rowspan="2"><a href="../logout.php" class="btn btn-dark ms-2">Logout</a></td>
      </tr>
    <!-- <tr>
      <td>ID : <?php echo $id ?></td>
    </tr> -->
  </table>
  <?php
}
?>
</div>