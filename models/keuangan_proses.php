<?php
// models/keuangan_proses.php
require_once __DIR__ . '/../connector/koneksi.php';

if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Proteksi Admin
if (!isset($_SESSION['is_admin'])) {
    // PERBAIKAN: Ubah redirect ke keuangan.php jika ditolak
    echo "<script>alert('Akses Ditolak!'); window.location.href='keuangan.php';</script>";
    exit;
}

$id = isset($_GET['id']) ? $_GET['id'] : '';
$is_edit = !empty($id);

$tanggal = '';
$jenis_transaksi = 'Pemasukan'; 
$keterangan = '';
$nominal = '';

// 1. AMBIL DATA LAMA JIKA MODE EDIT
if ($is_edit) {
    try {
        // PENTING: Pastikan nama tabel Anda (kas_masjid) sudah benar
        $stmt = $pdo->prepare("SELECT * FROM kas_masjid WHERE id_kas = :id");
        $stmt->execute(['id' => $id]);
        $kas = $stmt->fetch();
        if ($kas) {
            $tanggal = $kas['tanggal'];
            $jenis_transaksi = $kas['jenis_transaksi'];
            $keterangan = $kas['keterangan'];
            $nominal = $kas['nominal'];
        }
    } catch (PDOException $e) {
        die("Error Ambil Data: " . $e->getMessage());
    }
}

// 2. PROSES SIMPAN (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $in_tanggal = $_POST['tanggal'];
    $in_jenis   = $_POST['jenis_transaksi'];
    $in_ket     = $_POST['keterangan'];
    $in_nominal = $_POST['nominal'];

    try {
        if ($is_edit) {
            // PENTING: Sesuaikan nama tabel jika bukan 'kas_masjid'
            $sql = "UPDATE kas_masjid SET tanggal = :tanggal, jenis_transaksi = :jenis, keterangan = :keterangan, nominal = :nominal WHERE id_kas = :id";
            $params = ['tanggal' => $in_tanggal, 'jenis' => $in_jenis, 'keterangan' => $in_ket, 'nominal' => $in_nominal, 'id' => $id];
            $pesan = "Data kas berhasil diperbarui!";
        } else {
            // PENTING: Sesuaikan nama tabel jika bukan 'kas_masjid'
            $sql = "INSERT INTO kas_masjid (tanggal, jenis_transaksi, keterangan, nominal) VALUES (:tanggal, :jenis, :keterangan, :nominal)";
            $params = ['tanggal' => $in_tanggal, 'jenis' => $in_jenis, 'keterangan' => $in_ket, 'nominal' => $in_nominal];
            $pesan = "Transaksi baru berhasil dicatat!";
        }

        $stmt_simpan = $pdo->prepare($sql);
        $stmt_simpan->execute($params);
        
        // PERBAIKAN UTAMA: Jalur dialihkan langsung ke 'keuangan.php'
        echo "<script>alert('$pesan'); window.location.href='keuangan.php';</script>";
        exit;
    } catch (PDOException $e) {
        die("Error Simpan Kas: " . $e->getMessage());
    }
}
?>  