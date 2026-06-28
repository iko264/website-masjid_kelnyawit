<?php

require_once __DIR__ . '/../connector/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nama = $_POST['nama_kegiatan'];
    $tgl  = $_POST['tanggal'];
    $desk = $_POST['deskripsi'];
    
    $nama_file = $_FILES['dokumentasi']['name'];
    $file_tmp  = $_FILES['dokumentasi']['tmp_name'];
    $upload_dir = __DIR__ . '/../assets/uploads/';
    
    if (!empty($nama_file)) {
        $nama_file = time() . '_' . $nama_file; // Randomize nama file
        move_uploaded_file($file_tmp, $upload_dir . $nama_file);
    }

    if ($id) {
        $sql = "UPDATE dokumentasi_kegiatan SET nama_kegiatan=?, tanggal=?, deskripsi=?";
        $params = [$nama, $tgl, $desk];
        
        if (!empty($nama_file)) {
            $sql .= ", dokumentasi=?";
            $params[] = $nama_file;
        }
        $sql .= " WHERE id_kegiatan=?";
        $params[] = $id;
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
    } else {
        // PROSES TAMBAH
        $stmt = $pdo->prepare("INSERT INTO dokumentasi_kegiatan (nama_kegiatan, tanggal, deskripsi, dokumentasi) VALUES (?,?,?,?)");
        $stmt->execute([$nama, $tgl, $desk, $nama_file]);
    }
    header("Location: kegiatan.php?status=success");
    exit;
}

function getKegiatanById($id, $pdo) {
    $stmt = $pdo->prepare("SELECT * FROM dokumentasi_kegiatan WHERE id_kegiatan = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

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