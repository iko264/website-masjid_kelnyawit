<?php
// auth/logout.php
require_once '../connector/koneksi.php';

// Pastikan session sudah dimulai sebelum dihancurkan
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Hancurkan semua data sesi admin
session_destroy(); 

// Tampilkan pesan sukses dan kembalikan ke halaman beranda
echo "<script>alert('Anda telah berhasil logout.'); window.location.href='" . BASE_URL . "';</script>";
exit;
?>