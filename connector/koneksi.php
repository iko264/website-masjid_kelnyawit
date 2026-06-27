<?php
define('DB_HOST', 'localhost');    
define('DB_NAME', 'masjid_hamzah'); 
define('DB_USER', 'root');          
define('DB_PASS', ''); // Dikosongkan atau diisi sesuai password MySQL Anda
define('DB_CHARSET', 'utf8mb4');    

// Hapus bagian port=3307 agar otomatis menggunakan default 3306
$dsn = "mysql:host=" . DB_HOST . 
       ";dbname=" . DB_NAME . 
       ";charset=" . DB_CHARSET;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    //echo "Koneksi berhasil!"; // Aktifkan saat testing
    
} catch (PDOException $e) {
    die("<div class='alert alert-danger m-3'>
            <strong>Error Koneksi Database!</strong><br>
            " . htmlspecialchars($e->getMessage()) . "
         </div>");
}

define('BASE_URL', 'http://website-masjid_kelnyawit.test');