<?php
// Koneksi
include '../../koneksi.php';

// Variable
$id_bahan = $_POST['id_bahan'];
$stok = $_POST['stok'];
$stokkurang = $_POST['stokkurang'];

// Rumus
$rumus = $stok - $stokkurang;

// IF hasil dari rumus bukan 0
    if ($rumus != 0 ) {
        mysqli_query($koneksi, "UPDATE tbl_data_bahan SET stok='$rumus' WHERE id_bahan='$id_bahan'");
        header('location: ../?pesan=berhasilLB');
    }else{
        mysqli_query($koneksi, "UPDATE tbl_data_bahan SET stok='$rumus', status='2' WHERE id_bahan='$id_bahan'");
        header('location: ../?pesan=berhasilLB');
    }
?>