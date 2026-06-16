<?php
require_once '../../connector/koneksi.php';
require_once '../layout/header.php';
require_once '../../models/jadwal_edit.php';
?>

<main class="form-wrapper">
    <form action="" method="POST" class="glass-form">
        <div class="form-header">
            <h2>Edit Petugas Adzan</h2>
            <p>Pilihan: <strong><?php echo htmlspecialchars($hari); ?></strong> - Waktu: <strong><?php echo htmlspecialchars($waktu); ?></strong></p>
        </div>

        <div class="input-group">
            <span class="input-icon"><i class="fas fa-user"></i></span>
            <input 
                id="nama_petugas" 
                name="nama_petugas" 
                class="form-input" 
                type="text" 
                placeholder="Masukkan Nama Muadzin..." 
                value="<?php echo htmlspecialchars($nama_petugas_lama); ?>" 
                required
            >
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-save"></i> Simpan Jadwal
        </button>
        
        <a href="jadwal.php" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali ke Jadwal
        </a>
    </form>
</main> 

<?php
// Panggil footer
require_once '../layout/footer.php';
?>