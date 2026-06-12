<?php
// models/jadwal_proses_edit.php

// 1. Panggil koneksi dengan jalur absolut
require_once __DIR__ . '/../connector/koneksi.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['is_admin'])) {
    echo "<script>alert('Akses Ditolak! Anda harus login sebagai admin.'); window.location.href='jadwal.php';</script>";
    exit;
}
// 2. Ambil parameter koordinat dari URL
$hari  = isset($_GET['hari']) ? $_GET['hari'] : '';
$waktu = isset($_GET['waktu']) ? $_GET['waktu'] : '';

// Validasi jika parameter URL kosong, kembalikan ke halaman jadwal
if (empty($hari) || empty($waktu)) {
    echo "<script>window.location.href='jadwal.php';</script>";
    exit;
}

// 3. PROSES SIMPAN (Jika tombol submit ditekan / Metode POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_baru = isset($_POST['nama_petugas']) ? $_POST['nama_petugas'] : '';

    try {
        // Cek apakah data untuk hari & waktu ini sudah ada di database
        $stmt_cek = $pdo->prepare("SELECT id_muadzin FROM jadwal_muadzin WHERE hari = :hari AND waktu_sholat = :waktu");
        $stmt_cek->execute([
            'hari'  => $hari,
            'waktu' => $waktu
        ]);
        
        // Menggunakan rowCount() untuk menghitung jumlah baris data pada PDO
        if ($stmt_cek->rowCount() > 0) {
            // Skenario A: Data sudah ada, maka lakukan UPDATE
            $stmt_simpan = $pdo->prepare("UPDATE jadwal_muadzin SET nama_petugas = :nama WHERE hari = :hari AND waktu_sholat = :waktu");
        } else {
            // Skenario B: Data masih kosong (-), maka lakukan INSERT
            $stmt_simpan = $pdo->prepare("INSERT INTO jadwal_muadzin (hari, waktu_sholat, nama_petugas) VALUES (:hari, :waktu, :nama)");
        }

        // Eksekusi query simpan (baik INSERT maupun UPDATE menggunakan parameter yang sama)
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

// 4. PROSES AMBIL DATA LAMA (Untuk ditampilkan di dalam kotak input form)
try {
    $stmt_lama = $pdo->prepare("SELECT nama_petugas FROM jadwal_muadzin WHERE hari = :hari AND waktu_sholat = :waktu");
    $stmt_lama->execute([
        'hari'  => $hari,
        'waktu' => $waktu
    ]);
    
    $data_lama = $stmt_lama->fetch();
    
    // Jika data lama ditemukan, ambil namanya. Jika tidak, kosongkan teks input.
    $nama_petugas_lama = isset($data_lama['nama_petugas']) ? $data_lama['nama_petugas'] : '';

} catch (PDOException $e) {
    die("Error Saat Mengambil Data Lama: " . $e->getMessage());
}
?>