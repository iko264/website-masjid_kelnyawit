<?php
// view/pages/keuangan_form.php
require_once '../layout/header.php';
require_once '../../models/keuangan_proses.php';

// Sabuk Pengaman
$is_edit         = isset($_GET['id']) && !empty($_GET['id']);
$tanggal         = isset($tanggal) ? $tanggal : '';
$jenis_transaksi = isset($jenis_transaksi) ? $jenis_transaksi : 'Pemasukan';
$keterangan      = isset($keterangan) ? $keterangan : '';
$nominal         = isset($nominal) ? $nominal : '';
?>

<main class="form-wrapper">
    <form action="" method="POST" class="glass-form" style="max-width: 500px;">
        <div class="form-header">
            <h2><?php echo $is_edit ? 'Edit Transaksi' : 'Catat Transaksi Baru'; ?></h2>
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em;">Tanggal:</label>
        <div class="input-group">
            <span class="input-icon"><i class="fas fa-calendar-day"></i></span>
            <input type="date" name="tanggal" class="form-input" value="<?php echo htmlspecialchars($tanggal); ?>" required>
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em;">Jenis Transaksi:</label>
        <div class="input-group">
            <span class="input-icon"><i class="fas fa-exchange-alt"></i></span>
            <select name="jenis_transaksi" class="form-input" required style="cursor: pointer;">
                <option value="Pemasukan" <?php echo ($jenis_transaksi === 'Pemasukan') ? 'selected' : ''; ?>>Pemasukan (Uang Masuk)</option>
                <option value="Pengeluaran" <?php echo ($jenis_transaksi === 'Pengeluaran') ? 'selected' : ''; ?>>Pengeluaran (Uang Keluar)</option>
            </select>
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em;">Keterangan / Sumber / Tujuan:</label>
        <div class="input-group">
            <span class="input-icon"><i class="fas fa-info-circle"></i></span>
            <input type="text" name="keterangan" class="form-input" placeholder="Contoh: Infak Jumat / Bayar Listrik" value="<?php echo htmlspecialchars($keterangan); ?>" required>
        </div>

        <label style="color: #fff; display: block; text-align: left; margin-bottom: 0.3em;">Nominal (Rp):</label>
        <div class="input-group">
            <span class="input-icon" style="font-weight: bold;">Rp</span>
            <input type="number" name="nominal" class="form-input" placeholder="Contoh: 150000" min="0" value="<?php echo htmlspecialchars($nominal); ?>" required>
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-save"></i> <?php echo $is_edit ? 'Perbarui Transaksi' : 'Simpan Transaksi'; ?>
        </button>
        
        <a href="keuangan.php" class="btn-back">
            <i class="fas fa-arrow-left"></i> Batal
        </a>
    </form>
</main>

<?php require_once '../layout/footer.php'; ?>