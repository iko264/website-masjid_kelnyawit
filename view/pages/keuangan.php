<?php
// view/pages/keuangan.php
require_once '../layout/header.php';
require_once '../../models/keuangan.php'; 

$total_pemasukan   = isset($total_pemasukan) ? $total_pemasukan : 0;
$total_pengeluaran = isset($total_pengeluaran) ? $total_pengeluaran : 0;
$saldo_akhir       = isset($saldo_akhir) ? $saldo_akhir : 0;
$data_keuangan     = isset($data_keuangan) ? $data_keuangan : [];
?>

<style>
    .finance-summary { display: flex; gap: 1rem; margin-bottom: 2rem; justify-content: space-between; flex-wrap: wrap; }
    .summary-box { flex: 1; min-width: 200px; padding: 1.5rem; border-radius: 12px; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); text-align: center; }
    .summary-box h3 { margin: 0 0 0.5rem 0; font-size: 1rem; color: #eee; }
    .summary-box .amount { font-size: 1.5rem; font-weight: bold; }
    .text-masuk { color: #00ff88; } /* Hijau Terang */
    .text-keluar { color: #ff4757; } /* Merah Terang */
    .text-saldo { color: #ffd700; } /* Emas */
    .badge-pemasukan { background: rgba(0, 255, 136, 0.2); color: #00ff88; padding: 4px 8px; border-radius: 4px; font-size: 0.8em; font-weight: bold;}
    .badge-pengeluaran { background: rgba(255, 71, 87, 0.2); color: #ff4757; padding: 4px 8px; border-radius: 4px; font-size: 0.8em; font-weight: bold;}
</style>

<main class="content">
    <br><br>
    <h1>Laporan Keuangan Masjid</h1>
    <p>Transparansi dana umat Masjid Hamzah.</p>
    
    <?php if (isset($_SESSION['is_admin'])): ?>
    <div style="max-width: var(--container-width); margin: 0 auto 1.5em auto; text-align: left;">
        <a href="keuangan_form.php" class="btn-tambah">
            <i class="fas fa-plus-circle"></i> Catat Transaksi Baru
        </a>
    </div>
    <?php endif; ?>

    <div class="finance-summary" style="max-width: var(--container-width); margin: 0 auto 2em auto;">
        <div class="summary-box">
            <h3>Total Pemasukan</h3>
            <div class="amount text-masuk">Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?></div>
        </div>
        <div class="summary-box">
            <h3>Total Pengeluaran</h3>
            <div class="amount text-keluar">Rp <?php echo number_format($total_pengeluaran, 0, ',', '.'); ?></div>
        </div>
        <div class="summary-box" style="background: rgba(255, 215, 0, 0.15); border-color: rgba(255, 215, 0, 0.4);">
            <h3>Saldo Kas Saat Ini</h3>
            <div class="amount text-saldo">Rp <?php echo number_format($saldo_akhir, 0, ',', '.'); ?></div>
        </div>
    </div>

    <div class="table-container-jadwal">
        <table class="glass-table jadwal-table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jenis</th>
                    <th>Nominal</th>
                    <?php if (isset($_SESSION['is_admin'])): ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data_keuangan)): ?>
                    <?php foreach ($data_keuangan as $kas): ?>
                        <tr>
                            <td><?php echo date('d/m/Y', strtotime($kas['tanggal'])); ?></td>
                            <td style="text-align: left; padding-left: 1rem;"><?php echo htmlspecialchars($kas['keterangan']); ?></td>
                            <td>
                                <?php if($kas['jenis_transaksi'] === 'Pemasukan'): ?>
                                    <span class="badge-pemasukan"><i class="fas fa-arrow-down"></i> Masuk</span>
                                <?php else: ?>
                                    <span class="badge-pengeluaran"><i class="fas fa-arrow-up"></i> Keluar</span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: right; padding-right: 1rem;">
                                Rp <?php echo number_format($kas['nominal'], 0, ',', '.'); ?>
                            </td>
                            
                            <?php if (isset($_SESSION['is_admin'])): ?>
                            <td>
                                <a href="keuangan_form.php?id=<?php echo $kas['id_kas']; ?>" class="btn-edit-inline" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="keuangan.php?action=delete&id=<?php echo $kas['id_kas']; ?>" class="btn-delete-inline" onclick="return confirm('Yakin ingin menghapus transaksi ini? Saldo akan otomatis menyesuaikan.');" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="<?php echo isset($_SESSION['is_admin']) ? '5' : '4'; ?>" style="text-align: center; padding: 2em;">Belum ada catatan keuangan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require_once '../layout/footer.php'; ?>