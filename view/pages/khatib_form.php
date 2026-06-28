<?php
// Memanggil koneksi database
require_once '../../connector/koneksi.php';

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $nama_khatib = $_POST['nama_khatib'];
    $muadzin = $_POST['muadzin'];

    try {
        // Menggunakan Prepared Statement PDO agar aman dari SQL Injection
        $query = "INSERT INTO jadwal_khatib (tanggal, nama_khatib, muadzin) VALUES (:tanggal, :nama_khatib, :muadzin)";
        $stmt = $pdo->prepare($query);
        
        $stmt->execute([
            ':tanggal' => $tanggal,
            ':nama_khatib' => $nama_khatib,
            ':muadzin' => $muadzin
        ]); 

        // Jika berhasil, munculkan alert dan redirect kembali ke jadwal
        echo "<script>alert('Data Khatib berhasil ditambahkan!'); window.location.href='jadwal.php';</script>";
    } catch (PDOException $e) {
        // Jika gagal, tampilkan pesan error
        echo "<script>alert('Gagal menambahkan data: " . addslashes($e->getMessage()) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Khatib Baru</title>
    <style>
        body { 
            font-family: sans-serif; 
            background: linear-gradient(to bottom, #4b6b4e, #1a7e44); /* Hijau tema masjid */
            color: white; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        .form-container { 
            background: rgba(0, 0, 0, 0.25); 
            padding: 30px; 
            border-radius: 10px; 
            width: 400px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.3); 
        }
        h2 { text-align: center; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="date"] { 
            width: 100%; 
            padding: 10px; 
            border: none; 
            border-radius: 5px; 
            box-sizing: border-box; 
        }
        .btn-submit { 
            background-color: #f1c40f; /* Kuning tombol tambah */
            color: #333; 
            padding: 10px 15px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            width: 100%; 
            font-weight: bold; 
            font-size: 16px; 
            margin-top: 10px; 
        }
        .btn-submit:hover { background-color: #d4ac0d; }
        .btn-back { 
            display: block; 
            text-align: center; 
            margin-top: 15px; 
            color: white; 
            text-decoration: underline; 
            font-size: 14px; 
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Khatib Baru</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>
        </div>
        <div class="form-group">
            <label for="nama_khatib">Nama Khatib:</label>
            <input type="text" id="nama_khatib" name="nama_khatib" placeholder="Masukkan nama khatib..." required>
        </div>
        <div class="form-group">
            <label for="muadzin">Nama Muadzin:</label>
            <input type="text" id="muadzin" name="muadzin" placeholder="Masukkan nama muadzin..." required>
        </div>
        <button type="submit" name="submit" class="btn-submit">Simpan Data</button>
        <a href="jadwal.php" class="btn-back">Kembali ke Jadwal</a>
    </form>
</div>

</body>
</html>