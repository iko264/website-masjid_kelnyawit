<?php
require_once __DIR__ . '/../connector/koneksi.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['is_admin'])) {
    echo "<script>alert('Akses Ditolak! Anda harus login sebagai admin.'); window.location.href='jadwal.php';</script>";
    exit;
}
$hari  = isset($_GET['hari']) ? $_GET['hari'] : '';
$waktu = isset($_GET['waktu']) ? $_GET['waktu'] : '';

if (empty($hari) || empty($waktu)) {
    echo "<script>window.location.href='jadwal.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_baru = isset($_POST['nama_petugas']) ? $_POST['nama_petugas'] : '';

    try {
        $stmt_cek = $pdo->prepare("SELECT id_muadzin FROM jadwal_muadzin WHERE hari = :hari AND waktu_sholat = :waktu");
        $stmt_cek->execute([
            'hari'  => $hari,
            'waktu' => $waktu
        ]);
        
        if ($stmt_cek->rowCount() > 0) {
            $stmt_simpan = $pdo->prepare("UPDATE jadwal_muadzin SET nama_petugas = :nama WHERE hari = :hari AND waktu_sholat = :waktu");
        } else {
            $stmt_simpan = $pdo->prepare("INSERT INTO jadwal_muadzin (hari, waktu_sholat, nama_petugas) VALUES (:hari, :waktu, :nama)");
        }

        $stmt_simpan->execute([
            'nama'  => $nama_baru,
            'hari'  => $hari,
            'waktu' => $waktu
        ]);

        echo "<script>alert('Jadwal berhasil diperbarui!'); window.location.href='jadwal.php';</script>";
        exit;

    } catch (PDOException $e) {
        die("Error Saat Menyimpan Data: " . $e->getMessage());
    }
}

try {
    $stmt_lama = $pdo->prepare("SELECT nama_petugas FROM jadwal_muadzin WHERE hari = :hari AND waktu_sholat = :waktu");
    $stmt_lama->execute([
        'hari'  => $hari,
        'waktu' => $waktu
    ]);
    
    $data_lama = $stmt_lama->fetch();
    $nama_petugas_lama = isset($data_lama['nama_petugas']) ? $data_lama['nama_petugas'] : '';

} catch (PDOException $e) {
    die("Error Saat Mengambil Data Lama: " . $e->getMessage());
}
?>