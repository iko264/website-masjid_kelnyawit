<?php

require_once __DIR__ . '/../connector/koneksi.php';

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    
    if (session_status() === PHP_SESSION_NONE) { 
        session_start(); 
    }

    if (isset($_SESSION['is_admin'])) {
        $id_hapus = $_GET['id'];
        try {
            $stmt_gambar = $pdo->prepare("SELECT dokumentasi FROM dokumentasi_kegiatan WHERE id_kegiatan = :id");
            $stmt_gambar->execute(['id' => $id_hapus]);
            $kegiatan = $stmt_gambar->fetch();

            if ($kegiatan) {
                $file_path = __DIR__ . '/../assets/uploads/' . $kegiatan['dokumentasi'];
                if (file_exists($file_path) && !empty($kegiatan['dokumentasi'])) {
                    unlink($file_path); 
                }

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

$data_kegiatan = [];
try {
    $stmt = $pdo->query("SELECT * FROM dokumentasi_kegiatan ORDER BY tanggal DESC");
    $data_kegiatan = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error Query Kegiatan: " . $e->getMessage());
}
?>