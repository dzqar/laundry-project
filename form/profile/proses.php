<?php
// mulai session
session_start();

// Menangkap $_SESSION['']
$level = $_SESSION['level'];

// Menangkap dari form
$id = $_POST['id_user'];

// Include koneksi
include '../../koneksi.php';

// IF Ubah profil
if ($_POST['submit'] == 'Ubah Profil') {

// Nangkep $_POST['']; dan ditampung di variabel
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_tlp = $_POST['no_tlp'];
	$password = $_POST['password'];

// Mengecek, jika input type='file' ada isinya/file, maka akan menjalankan IF condition
	if (isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])) {
		$rand = rand();
		$ekstensi = array('png','jpg','jpeg','gif');
		$filename = $_FILES['foto']['name'];
		$ukuran = $_FILES['foto']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

	// Mengecek Ekstensi
		if (!in_array($ext,$ekstensi)) {
			header('location: ../../'.$level.'/?pesan=gagalEkstensi');
		}else{
		// Mengecek Ukuran
			if ($ukuran < 2044070) {
		// Jika ukurannya lebih kecil dari 2mb
				$xx = $rand.'_'.$filename;

			// Mengecek data di column 'foto' berdasakan id_user
				$data = mysqli_query($koneksi,"SELECT foto FROM tbl_user WHERE id_user='$id'");
				$d = mysqli_fetch_assoc($data)['foto'];

			// Jika bukan foto bawaan/default
				if ($d != 'default.png') {

				// Menghapus foto selain 'default.png'
					unlink('gambar/'.$d);
				}

			// Menambah file ke dalam folder 'gambar'
				move_uploaded_file($_FILES['foto']['tmp_name'],'gambar/'.$rand.'_'.$filename);

			// Query SQL
				mysqli_query($koneksi,"UPDATE tbl_user SET nama='$nama', alamat='$alamat', no_tlp='$no_tlp', password='$password', foto='$xx' WHERE id_user='$id'");

			// Mengalihkan ke halaman dari level masing-masing + pesan untuk Pop Up Sweetalert
				header('location:../../'.$level.'/?pesan=berhasilUpProfile');

			}else{
			// Jika ukurannya lebih besar dari sistem
				header('location:../../'.$level.'/?pesan=gagalUkuran');
			}
		}
	}else{
	// Jika input type='file' tidak ada isinya/file
		mysqli_query($koneksi,"UPDATE tbl_user SET nama='$nama', alamat='$alamat', no_tlp='$no_tlp', password='$password' WHERE id_user='$id'");

	// Mengalihkan ke halaman dari level masing-masing + pesan untuk Pop Up Sweetalert
		header('location: ../../'.$level.'/?pesan=berhasilUpProfile');	
	}

// ELSEIF Hapus foto
}elseif ($_POST['submit'] == 'Hapus Foto') {
	$foto = $_POST['foto'];

	// Jika $foto bukan 'default.png' atau foto bawaan dari sistem
	if ($foto != 'default.png') {
	// Mengecek data di column 'foto' berdasakan id_user
		$data = mysqli_query($koneksi,"SELECT foto FROM tbl_user WHERE id_user='$id'");
		$d = mysqli_fetch_assoc($data)['foto'];
	// Menghapus foto
		unlink('gambar/'.$d);

	// Update foto menjadi bawaan 'default.png'
		mysqli_query($koneksi,"UPDATE tbl_user SET foto='default.png' WHERE id_user='$id'");

	// Mengalihkan ke halaman level masing-masing + pesan Pop Up Sweetalert
		header('location: ../../'.$level.'/?pesan=berhasilUpProfile');
	}else{
	// Mengalihkan ke halaman level masing-masing + pesan Pop Up Sweetalert
		header('location: ../../'.$level.'/?pesan=gagalHapusFotoDefault');
	}
}


?>