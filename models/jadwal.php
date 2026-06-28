<?php
require_once __DIR__ . '/../connector/koneksi.php';


if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

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
        echo "<script>alert('Aksi Ilegal! Anda tidak memiliki hak akses.'); window.location.href='jadwal.php';</script>";
        exit;
    }
}
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

$data_khatib = [];
try {
    $stmt_khatib = $pdo->query("SELECT * FROM jadwal_khatib WHERE tanggal >= CURDATE() ORDER BY tanggal ASC LIMIT 10");
    $data_khatib = $stmt_khatib->fetchAll();
} catch (PDOException $e) {
    die("Error Query Khatib: " . $e->getMessage());
}
?>