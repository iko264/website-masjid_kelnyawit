<?php
require_once '../../connector/koneksi.php';
require_once '../layout/header.php';
require_once '../../models/kegiatan.php'; 

$is_edit          = isset($_GET['id']) && !empty($_GET['id']);
$nama_kegiatan    = isset($nama_kegiatan) ? $nama_kegiatan : '';
$deskripsi        = isset($deskripsi) ? $deskripsi : '';
$tanggal          = isset($tanggal) ? $tanggal : '';
$dokumentasi_lama = isset($dokumentasi_lama) ? $dokumentasi_lama : ''; // Ubah dari gambar_lama jadi dokumentasi_lama
?>

<main class="form-wrapper">
    <form action="" method="POST" enctype="multipart/form-data" class="glass-form" style="max-width: 600px;">
        <div class="form-header">
            <h2><?php echo $is_edit ? 'Edit Kegiatan' : 'Tambah Kegiatan Baru'; ?></h2>
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em;">Nama Kegiatan:</label>
        <div class="input-group">
            <span class="input-icon"><i class="fas fa-heading"></i></span>
            <input type="text" name="nama_kegiatan" class="form-input" value="<?php echo htmlspecialchars($nama_kegiatan); ?>" required>
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em;">Tanggal:</label>
        <div class="input-group">
            <span class="input-icon"><i class="fas fa-calendar-day"></i></span>
            <input type="date" name="tanggal" class="form-input" value="<?php echo htmlspecialchars($tanggal); ?>" required>
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em;">Deskripsi Singkat:</label>
        <div class="input-group" style="align-items: flex-start;">
            <span class="input-icon" style="height: 100%;"><i class="fas fa-align-left"></i></span>
            <textarea name="deskripsi" class="form-input" rows="4" required><?php echo htmlspecialchars($deskripsi); ?></textarea>
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em;">Unggah Dokumentasi (Format: JPG/PNG):</label>
        <div class="input-group">
            <span class="input-icon"><i class="fas fa-image"></i></span>
            <input type="file" name="dokumentasi" accept="image/*" class="form-input" <?php echo $is_edit ? '' : 'required'; ?> style="padding: 0.7em;">
        </div>
        
        <?php if($is_edit && !empty($dokumentasi_lama)): ?>
            <p style="text-align: left; color: #ffd700; font-size: 0.8em; margin-top:-1em; margin-bottom: 1.5em;">*Kosongkan jika tidak ingin mengubah dokumentasi.</p>
        <?php endif; ?>

        <button type="submit" class="btn-submit">
            <i class="fas fa-save"></i> <?php echo $is_edit ? 'Perbarui Kegiatan' : 'Simpan Kegiatan'; ?>
        </button>
        
        <a href="kegiatan.php" class="btn-back">
            <i class="fas fa-arrow-left"></i> Batal
        </a>
    </form>
</main>

<?php require_once '../layout/footer.php'; ?>