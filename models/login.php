<?php
// models/login_proses.php
require_once __DIR__ . '/../connector/koneksi.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. PROSES LOGIN (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Menggunakan MD5 sesuai yang kita buat di database

    try {
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
        $stmt->execute(['username' => $username, 'password' => $password]);
        
        if ($stmt->rowCount() > 0) {
            // Jika cocok, berikan "Kartu Tanda Pengenal"
            $_SESSION['is_admin'] = true;
            $_SESSION['username'] = $username;
            
            echo "<script>alert('Login berhasil! Selamat datang, Admin.'); window.location.href='../view/pages/jadwal.php';</script>";
            exit;
        } else {
            // Jika salah
            echo "<script>alert('Username atau Password salah!'); window.location.href='../view/pages/login.php';</script>";
            exit;
        }
    } catch (PDOException $e) {
        die("Error Login: " . $e->getMessage());
    }
}

// 2. PROSES LOGOUT (GET)
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy(); // Hancurkan semua sesi
    echo "<script>alert('Anda telah berhasil logout.'); window.location.href='" . BASE_URL . "';</script>";
    exit;
}
?>