<?php
require_once 'view/layout/header.php';


// SAKTI: Langsung panggil model keuangan agar angka kas di beranda tampil secara LIVE
if (file_exists('/WEBSITE-MASJID_KELNYAWIT/models/keuangan.php')) {
    require_once '/WEBSITE-MASJID_KELNYAWIT/models/keuangan.php';
}

// Sabuk pengaman jika data kas di database masih kosong
$total_pemasukan   = isset($total_pemasukan) ? $total_pemasukan : 0;
$total_pengeluaran = isset($total_pengeluaran) ? $total_pengeluaran : 0;
$saldo_akhir       = isset($saldo_akhir) ? $saldo_akhir : 0;
?>


<main style="padding: 0 var(--navbar-padding); flex: 1;">
    
    <section class="hero-section">
        <h1 class="hero-title">MASJID HAMZAH</h1>
        <p class="hero-subtitle">Wadah Pembinaan Iman, Takwa, dan Tempat Ibadah yang Nyaman bagi Jamaah Kelnyawit.</p>
        
        <div class="masjid-img-container">
            <img src="/WEBSITE-MASJID_KELNYAWIT/assets/img/hasmjid.jpg" alt="Gambar Masjid Hamzah" class="masjid-img">
        </div>
    </section>

    <section class="home-section">
        <h2>Jadwal Sholat & Petugas Muadzin</h2>
        <p style="color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto;">
            Pantau waktu sholat lima waktu berjamaah serta jadwal Khatib Jumat secara berkala agar ibadah kita semakin tertata.
        </p>
        <a href="jadwal.php" class="btn-selengkapnya">
            <i class="fas fa-calendar-alt"></i> Lihat Jadwal Selengkapnya
        </a>
    </section>

    <section class="home-section">
        <h2>Transparansi Kas Masjid</h2>
        <p style="color: rgba(255,255,255,0.8);">Laporan kas masuk dan keluar secara terbuka demi menjaga amanah dana umat.</p>
        
        <div class="finance-mini-grid">
            <div class="mini-box">
                <p>Total Pemasukan</p>
                <div style="color: #00ff88;">Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?></div>
            </div>
            <div class="mini-box">
                <p>Total Pengeluaran</p>
                <div style="color: #ff4757;">Rp <?php echo number_format($total_pengeluaran, 0, ',', '.'); ?></div>
            </div>
            <div class="mini-box" style="background: rgba(255, 215, 0, 0.1); border-color: rgba(255, 215, 0, 0.3);">
                <p>Saldo Kas Saat Ini</p>
                <div style="color: #ffd700;">Rp <?php echo number_format($saldo_akhir, 0, ',', '.'); ?></div>
            </div>
        </div>

        <a href="view/pages/keuangan.php" class="btn-selengkapnya">
            <i class="fas fa-wallet"></i> Detail Laporan Keuangan
        </a>
    </section>

    <section class="home-section" style="margin-bottom: 4rem;">
        <h2>Temukan Kami</h2>
        <p style="color: rgba(255,255,255,0.8); margin-bottom: 1.5rem;">Kunjungi Masjid Hamzah Kelnyawit secara langsung melalui panduan peta digital di bawah ini:</p>
        
        <div style="margin-top: 1rem;">
            <a href="https://share.google/awr5EuYzy0eU7ACy0" target="_blank" class="map-box" style="text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <span style="font-size: 2rem; color: #ff4757;"><i class="fas fa-map-marked-alt"></i></span>
                <div style="text-align: left;">
                    <div style="font-size: 1.1rem; color: #2B4141;">Buka di Google Maps</div>
                    <div style="font-size: 0.8rem; color: #666; font-weight: normal;">Klik untuk petunjuk arah perjalanan ke Masjid</div>
                </div>
            </a>
        </div>
    </section>

</main>

<?php 
require_once 'view/layout/footer.php'; 
?>