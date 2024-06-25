<?php
// Koneksi
include '../../koneksi.php';

// IF submit = Pesan
if ($_POST['submit'] == 'Pesan') {
// Menampung form method POST dari file pesanan.php dengan menggunakan variable
    $id = $_POST['id_customer'];
    $nl = $_POST['nama_layanan'];
    $jumlah = $_POST['jumlah'];
    $metcuci = $_POST['metode_pencucian'];
    $metambil = $_POST['metode_pengambilan'];
    $tgl = date('Y-m-d');

    $data = mysqli_query($koneksi, "SELECT estimasi as est, harga as h FROM tbl_layanan WHERE nama_layanan = '$nl'");
// Tambahin if else jika inputnnya berhasil & gagal
    while ($d = mysqli_fetch_array($data)) {
        $hargaLay = $d['h'];
        $esti = $d['est'];
        $jumEsti = $esti * $jumlah;

    // Metode Pencucian
        $dataDM = mysqli_query($koneksi, "SELECT harga as h, estimasi as est FROM tbl_data_metode WHERE nama_data_metode='$metcuci'");
        while ($row = mysqli_fetch_array($dataDM)) {
            $hargaCuci = $row['h'];
            $estiDM = $row['est'];

            $LDM = $jumEsti - $estiDM;
        }

    // Metode Pengambilan
        $dataMD = mysqli_query($koneksi, "SELECT harga as h FROM tbl_data_metode WHERE nama_data_metode='$metambil'");
        while ($row = mysqli_fetch_array($dataMD)){
            $hargaambil = $row['h'];
        }

        $tgl_estimasi = date('Y-m-d' ,strtotime($tgl.' +'. $LDM .' days'));
        $totaltgl = date('Y-m-d', strtotime($tgl_estimasi));

        $hargatotal = ($hargaLay * $jumlah) + $hargaCuci + $hargaambil;
        $cek = mysqli_query($koneksi,"INSERT INTO tbl_pesan VALUES('','','$id','$nl','$jumlah','$metambil','$metcuci',NOW(),'$totaltgl','$hargatotal','1')");
        if ($cek) {
        // Jika berhasil
            header('location: ../?pesan=berhasilBuatPesanan');
        }else{
            header('location: ../?pesan=gagalBuatPesanan');
        }
    }

// ELSEIF submit = Batal
}elseif ($_GET['submit'] == 'Batal') {
    // Menampung id_pesan dari link
    $id_pesan = $_GET['id_pesan'];

    // Update pesanan tertentu menjadi 'Batal'
    mysqli_query($koneksi, "UPDATE tbl_pesan SET status = 4 WHERE id_pesan = '$id_pesan'");

    // Mengalihkan ke halaman utama
    header('location:../?pesan=berhasilBatalPesanan');
}
?>