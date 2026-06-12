<?php
// models/khatib_proses.php

require_once __DIR__ . '/../connector/koneksi.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['is_admin'])) {
    echo "<script>alert('Akses Ditolak! Anda harus login sebagai admin.'); window.location.href='jadwal.php';</script>";
    exit;
}
$id = isset($_GET['id']) ? $_GET['id'] : '';
$is_edit = !empty($id);

$tanggal = '';
$nama_khatib = '';
$muadzin = '';

// 1. JIKA MODE EDIT
if ($is_edit) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM jadwal_khatib WHERE id_khatib = :id");
        $stmt->execute(['id' => $id]);
        $khatib = $stmt->fetch();

        if ($khatib) {
            $tanggal     = $khatib['tanggal'];
            $nama_khatib = $khatib['nama_khatib'];
            $muadzin     = $khatib['muadzin'];
        } else {
            echo "<script>alert('Data khatib tidak ditemukan!'); window.location.href='jadwal.php';</script>";
            exit;
        }
    } catch (PDOException $e) {
        die("Error fetch data khatib: " . $e->getMessage());
    }
}

// 2. PROSES SIMPAN DATA (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_tanggal = $_POST['tanggal'];
    $input_nama    = $_POST['nama_khatib'];
    $input_muadzin = !empty($_POST['muadzin']) ? $_POST['muadzin'] : null;

    try {
        if ($is_edit) {
            // UPDATE
            $sql = "UPDATE jadwal_khatib SET tanggal = :tanggal, nama_khatib = :nama, muadzin = :muadzin WHERE id_khatib = :id";
            $params = [
                'tanggal' => $input_tanggal,
                'nama'    => $input_nama,
                'muadzin' => $input_muadzin,
                'id'      => $id
            ];
            $pesan = "Jadwal khatib berhasil diperbarui!";
        } else {
            // INSERT
            $sql = "INSERT INTO jadwal_khatib (tanggal, nama_khatib, muadzin) VALUES (:tanggal, :nama, :muadzin)";
            $params = [
                'tanggal' => $input_tanggal,
                'nama'    => $input_nama,
                'muadzin' => $input_muadzin
            ];
            $pesan = "Jadwal khatib baru berhasil ditambahkan!";
        }

        $stmt_simpan = $pdo->prepare($sql);
        $stmt_simpan->execute($params);

        echo "<script>alert('$pesan'); window.location.href='jadwal.php';</script>";
        exit;

    } catch (PDOException $e) {
        die("Error saat menyimpan data khatib: " . $e->getMessage());
    }
}
?>