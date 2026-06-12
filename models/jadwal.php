<?php
// Pastikan jalur ini sesuai dengan lokasi file koneksi.php Anda
require_once __DIR__ . '/../connector/koneksi.php';

// ==========================================
// 1. FITUR HAPUS JADWAL KHATIB (DENGAN PROTEKSI)
// ==========================================
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    
    // Pastikan session sudah menyala untuk mengecek identitas
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // CEK ADMIN: Proses hapus hanya dijalankan JIKA dia adalah admin
    if (isset($_SESSION['is_admin'])) {
        $id_hapus = $_GET['id'];
        try {
            $stmt_hapus = $pdo->prepare("DELETE FROM jadwal_khatib WHERE id_khatib = :id");
            $stmt_hapus->execute(['id' => $id_hapus]);
            
            echo "<script>alert('Jadwal khatib berhasil dihapus!'); window.location.href='jadwal.php';</script>";
            exit;
        } catch (PDOException $e) {
            die("Error Saat Menghapus: " . $e->getMessage());
        }
    } else {
        // Jika bukan admin tapi coba iseng hapus lewat URL
        echo "<script>alert('Aksi Ilegal! Anda tidak memiliki hak akses.'); window.location.href='jadwal.php';</script>";
        exit;
    }
}
// ==========================================
// 2. AMBIL DATA JADWAL ADZAN (Bentuk Matriks)
// ==========================================
$data_adzan = [];
try {
    $stmt_adzan = $pdo->query("SELECT hari, waktu_sholat, nama_petugas FROM jadwal_muadzin");
    while ($row = $stmt_adzan->fetch()) {
        $waktu = $row['waktu_sholat']; 
        $hari  = $row['hari'];          
        $data_adzan[$waktu][$hari] = $row['nama_petugas'];
    }
} catch (PDOException $e) {
    die("Error Query Adzan: " . $e->getMessage());
}

// ==========================================
// 3. AMBIL DATA JADWAL KHATIB (Bentuk List)
// ==========================================
$data_khatib = [];
try {
    // Hanya menampilkan jadwal hari ini ke depan (tidak menampilkan masa lalu)
    $stmt_khatib = $pdo->query("SELECT * FROM jadwal_khatib WHERE tanggal >= CURDATE() ORDER BY tanggal ASC LIMIT 10");
    $data_khatib = $stmt_khatib->fetchAll();
} catch (PDOException $e) {
    die("Error Query Khatib: " . $e->getMessage());
}
?>