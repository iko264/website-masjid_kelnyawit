<?php
require_once '../../connector/koneksi.php';
require_once '../layout/header.php';
require_once '../../models/jadwal_khatib_proses.php';
?>

<main class="form-wrapper">
    <form action="" method="POST" class="glass-form">
        <div class="form-header">
            <h2><?php echo $is_edit ? 'Edit Jadwal Khatib' : 'Tambah Khatib Baru'; ?></h2>
            <p style="color: rgba(255,255,255,0.6);">Silakan lengkapi informasi jadwal di bawah ini</p>
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em; font-size: 0.85em;">Tanggal Khutbah:</label>
        <div class="input-group">
            <span class="input-icon"><i class="fas fa-calendar-alt"></i></span>
            <input 
                type="date" 
                name="tanggal" 
                class="form-input" 
                value="<?php echo htmlspecialchars($tanggal); ?>" 
                required
            >
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em; font-size: 0.85em;">Nama Lengkap Khatib:</label>
        <div class="input-group">
            <span class="input-icon"><i class="fas fa-user-tie"></i></span>
            <input 
                type="text" 
                name="nama_khatib" 
                class="form-input" 
                placeholder="Contoh: Ustaz Dr. Haji Ahmad" 
                value="<?php echo htmlspecialchars($nama_khatib); ?>" 
                required
            >
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em; font-size: 0.85em;">Muadzin:</label>
        <div class="input-group">
            <span class="input-icon"><i class="fas fa-book-open"></i></span>
            <input 
                type="text" 
                name="muadzin" 
                class="form-input" 
                placeholder="Contoh: Javier" 
                value="<?php echo htmlspecialchars($muadzin); ?>"
            >
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-check-circle"></i> <?php echo $is_edit ? 'Perbarui Jadwal' : 'Simpan Jadwal'; ?>
        </button>
        
        <a href="jadwal.php" class="btn-back">
            <i class="fas fa-arrow-left"></i> Batal & Kembali
        </a>
    </form>
</main>

<?php
// Panggil komponen footer
require_once '../layout/footer.php';
?>