<?php
// models/kegiatan.php

require_once __DIR__ . '/../connector/koneksi.php';

// ==========================================
// 1. FITUR HAPUS KEGIATAN (DENGAN PROTEKSI ADMIN)
// ==========================================
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    
    // Pastikan session sudah menyala
    if (session_status() === PHP_SESSION_NONE) { 
        session_start(); 
    }

    if (isset($_SESSION['is_admin'])) {
        $id_hapus = $_GET['id'];
        try {
            // PERBAIKAN: Cari kolom 'dokumentasi' dari tabel 'dokumentasi_kegiatan'
            $stmt_gambar = $pdo->prepare("SELECT dokumentasi FROM dokumentasi_kegiatan WHERE id_kegiatan = :id");
            $stmt_gambar->execute(['id' => $id_hapus]);
            $kegiatan = $stmt_gambar->fetch();

            if ($kegiatan) {
                // Hapus file gambar secara fisik dari folder uploads/
                $file_path = __DIR__ . '/../assets/uploads/' . $kegiatan['dokumentasi'];
                if (file_exists($file_path) && !empty($kegiatan['dokumentasi'])) {
                    unlink($file_path); 
                }

                // PERBAIKAN: Hapus baris data dari tabel 'dokumentasi_kegiatan'
                $stmt_hapus = $pdo->prepare("DELETE FROM dokumentasi_kegiatan WHERE id_kegiatan = :id");
                $stmt_hapus->execute(['id' => $id_hapus]);
                
                echo "<script>alert('Kegiatan berhasil dihapus!'); window.location.href='kegiatan.php';</script>";
                exit;
            } else {
                 echo "<script>alert('Data tidak ditemukan di database!'); window.location.href='kegiatan.php';</script>";
                 exit;
            }
        } catch (PDOException $e) {
            die("Error Saat Menghapus Kegiatan: " . $e->getMessage());
        }
    } else {
        echo "<script>alert('Aksi Ilegal! Anda bukan admin.'); window.location.href='kegiatan.php';</script>";
        exit;
    }
}

// ==========================================
// 2. AMBIL DATA KEGIATAN UNTUK DITAMPILKAN
// ==========================================
$data_kegiatan = [];
try {
    // PERBAIKAN: Ambil data dari tabel 'dokumentasi_kegiatan'
    $stmt = $pdo->query("SELECT * FROM dokumentasi_kegiatan ORDER BY tanggal DESC");
    $data_kegiatan = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error Query Kegiatan: " . $e->getMessage());
}
?>