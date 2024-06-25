<?php
// Fungsi untuk memeriksa izin akses sesuai level Customer
function customer() {
    if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
        $level = $_SESSION['level'];
        if($level === 'customer') {
            return true; // Pengguna Customer memiliki izin akses
        }
    }
    return false; // Pengguna bukan Customer atau belum login
}

// Fungsi untuk memeriksa izin akses sesuai level kasir
function kasir() {
    if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
        $level = $_SESSION['level'];
        if($level === 'kasir') {
            return true; // Pengguna kasir memiliki izin akses
        }
    }
    return false; // Pengguna bukan kasir atau belum login
}

// Fungsi untuk memeriksa izin akses sesuai level manager
function manager() {
    if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
        $level = $_SESSION['level'];
        if($level === 'manager') {
            return true; // Pengguna manager memiliki izin akses
        }
    }
    return false; // Pengguna bukan manager atau belum login
}

// Fungsi untuk memeriksa izin akses sesuai level admin
function admin() {
    if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
        $level = $_SESSION['level'];
        if($level === 'admin') {
            return true; // Pengguna admin memiliki izin akses
        }
    }
    return false; // Pengguna bukan admin atau belum login
}
?>