<?php
require_once '../../connector/koneksi.php';
require_once '../layout/header.php';
require_once '../../models/kegiatan.php'; 
?>
<main class="content">
    <h1>Kegiatan Masjid</h1>
    <p>Dokumentasi dan informasi kegiatan terbaru di Masjid Hamzah.</p>
    
    <?php if (isset($_SESSION['is_admin'])): ?>
    <div style="max-width: var(--container-width); margin: 0 auto 2em auto; text-align: left;">
        <a href="kegiatan_form.php" class="btn-tambah">
            <i class="fas fa-plus-circle"></i> Tambah Kegiatan Baru
        </a>
    </div>
    <?php endif; ?>

    <div class="kegiatan-grid">
        <?php if (!empty($data_kegiatan)): ?>
            <?php foreach ($data_kegiatan as $keg): ?>
                <div class="kegiatan-card">
                    <div class="kegiatan-img-wrapper">
                        <img src="../../assets/uploads/<?php echo htmlspecialchars($keg['dokumentasi']); ?>" alt="Gambar Kegiatan" class="kegiatan-img" onerror="this.src='https://via.placeholder.com/600x400?text=No+Image';">
                    </div>
                    
                    <div class="kegiatan-content">
                        <div class="kegiatan-meta">
                            <i class="fas fa-calendar-alt"></i> <?php echo date('d M Y', strtotime($keg['tanggal'])); ?>
                        </div>
                        <h2 class="kegiatan-title"><?php echo htmlspecialchars($keg['nama_kegiatan']); ?></h2>
                        <p class="kegiatan-desc">
                            <?php echo nl2br(htmlspecialchars($keg['deskripsi'])); ?>
                        </p>
                        
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <div class="kegiatan-actions">
                            <a href="kegiatan_form.php?id=<?php echo $keg['id_kegiatan']; ?>" class="btn-tambah" style="background: linear-gradient(to right, #4facfe, #00f2fe); font-size: 0.8em; padding: 0.5em 1em;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="kegiatan.php?action=delete&id=<?php echo $keg['id_kegiatan']; ?>" class="btn-tambah" style="background: linear-gradient(to right, #ff416c, #ff4b2b); font-size: 0.8em; padding: 0.5em 1em;" onclick="return confirm('Hapus kegiatan beserta gambarnya secara permanen?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="text-align: center; padding: 3em; background: rgba(255,255,255,0.1); border-radius: 16px;">
                Belum ada dokumentasi kegiatan yang diunggah.
            </div>
        <?php endif; ?>
    </div>
</main>
<?php 
// 3. Panggil Footer
require_once '../layout/footer.php'; 
?>