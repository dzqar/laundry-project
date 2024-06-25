<?php
session_start();

// Menghubungkan file proses dengan koneksi
include '../../koneksi.php';

// Menangkap data nilai dari form inputan terdapat di input.php
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);

// Login untuk memeriksa keberadaan user dalam tabel user
$login = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

  //Mengecek apakah username dan passwordnya SAMA seperti yang ada di database
	if ($username === $data['username'] && $password === $data['password']) {
	// cek jika user login sebagai admin
		if($data['level']=="admin"){

		// buat session login dan username
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = "admin";
			$_SESSION['is_logged_in'] = true;
		// alihkan ke halaman dashboard admin
			header("location:../../admin/");

	// cek jika user login sebagai manager
		}else if($data['level']=="manager"){
		// buat session login dan username
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = "manager";
			$_SESSION['is_logged_in'] = true;
		// alihkan ke halaman dashboard pegawai
			header("location:../../manager/");

	// cek jika user login sebagai kasir
		}else if($data['level']=="kasir"){
		// buat session login dan username
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = "kasir";
			$_SESSION['is_logged_in'] = true;
		// alihkan ke halaman dashboard pengurus
			header("location:../../kasir/");

	// cek jika user login sebagai customer
		}else if($data['level']=="customer"){
		// buat session login dan username
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = "customer";
			$_SESSION['is_logged_in'] = true;
		// alihkan ke halaman dashboard pengurus
			header("location:../../customer/");
			
		}else{
		// alihkan ke halaman login kembali
			header("location:login.php?pesan=gagal");
		}
	}else{
  	// Dialihkan kembali ke halaman login jika usernamenya tidak sesuai yang ada di database
		header("location:login.php?pesan=gagal");
	}

	
}else{
	header("location:login.php?pesan=gagal");

	// Buat mencegah login berulang
	$_SESSION['auth'] = $_SESSION['auth'];
	$_SESSION['pass'] = NULL;
	if(isset($_SESSION['auth'])){
		$_SESSION['auth']++;
	}else{
		$_SESSION['auth'] = 1;
	}
}
?>