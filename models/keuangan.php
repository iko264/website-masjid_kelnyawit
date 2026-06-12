<?php
// models/keuangan.php
require_once __DIR__ . '/../connector/koneksi.php';

// ==========================================
// 1. FITUR HAPUS TRANSAKSI (PROTEKSI ADMIN)
// ==========================================
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    if (session_status() === PHP_SESSION_NONE) { session_start(); }

    if (isset($_SESSION['is_admin'])) {
        $id_hapus = $_GET['id'];
        try {
            // PERHATIKAN: Ganti 'kas_masjid' dengan nama tabel Anda yang sebenarnya jika berbeda
            $stmt_hapus = $pdo->prepare("DELETE FROM kas_masjid WHERE id_kas = :id");
            $stmt_hapus->execute(['id' => $id_hapus]);
            
            echo "<script>alert('Data transaksi berhasil dihapus!'); window.location.href='keuangan.php';</script>";
            exit;
        } catch (PDOException $e) {
            die("Error Saat Menghapus: " . $e->getMessage());
        }
    } else {
        echo "<script>alert('Aksi Ilegal! Anda bukan admin.'); window.location.href='keuangan.php';</script>";
        exit;
    }
}

// ==========================================
// 2. AMBIL DATA & HITUNG SALDO
// ==========================================
$data_keuangan = [];
$total_pemasukan = 0;
$total_pengeluaran = 0;

try {
    // CRITICAL CHECK: Pastikan nama 'kas_masjid' di bawah ini SAMA PERSIS 
    // dengan nama tabel tempat data Anda berhasil masuk tadi!
    $stmt = $pdo->query("SELECT * FROM kas_masjid ORDER BY tanggal DESC, id_kas DESC");
    $data_keuangan = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Proses kalkulasi saldo otomatis
    if ($data_keuangan) {
        foreach ($data_keuangan as $row) {
            if ($row['jenis_transaksi'] === 'Pemasukan') {
                $total_pemasukan += $row['nominal'];
            } elseif ($row['jenis_transaksi'] === 'Pengeluaran') {
                $total_pengeluaran += $row['nominal'];
            }
        }
    }
} catch (PDOException $e) {
    die("Error Query Keuangan: " . $e->getMessage());
}

$saldo_akhir = $total_pemasukan - $total_pengeluaran;
?>