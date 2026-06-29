<?php
require_once '../../connector/koneksi.php';
require_once '../layout/header.php';
require_once '../../models/jadwal.php';
?>
<main class="content">
    <h1>Jadwal Sholat Hari Ini</h1>
    <p id="tanggal-masehi">Memuat tanggal...</p>

    <div class="table-container-jadwal">
        <table class="jadwal-table">
            <thead>
                <tr>
                    <th>Imsak</th>
                    <th>Subuh</th>
                    <th>Terbit</th>
                    <th>Dzuhur</th>
                    <th>Ashar</th>
                    <th>Maghrib</th>
                    <th>Isya</th>
                </tr>
            </thead>
            <tbody>
                <tr id="data-jadwal">
                    <td colspan="7">Memuat data...</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h1>Jadwal Adzan</h1>
    <p>Check the prayer schedule for your convenience.</p>
    <div class="table-container-jadwal">
        <table class="jadwal-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jum'at</th>
                    <th>Sabtu</th>
                    <th>Ahad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-weight: bold;">Dzuhur</td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Dzuhur']['Senin']) ? $data_adzan['Dzuhur']['Senin'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Dzuhur&hari=Senin" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Dzuhur']['Selasa']) ? $data_adzan['Dzuhur']['Selasa'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Dzuhur&hari=Selasa" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?> 
                    </td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Dzuhur']['Rabu']) ? $data_adzan['Dzuhur']['Rabu'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Dzuhur&hari=Rabu" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>    
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Dzuhur']['Kamis']) ? $data_adzan['Dzuhur']['Kamis'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Dzuhur&hari=Kamis" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>   
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Dzuhur']['Jumat']) ? $data_adzan['Dzuhur']['Jumat'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Dzuhur&hari=Jumat" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Dzuhur']['Sabtu']) ? $data_adzan['Dzuhur']['Sabtu'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Dzuhur&hari=Sabtu" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Dzuhur']['Minggu']) ? $data_adzan['Dzuhur']['Minggu'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Dzuhur&hari=Minggu" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Ashar</td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Ashar']['Senin']) ? $data_adzan['Ashar']['Senin'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Ashar&hari=Senin" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Ashar']['Selasa']) ? $data_adzan['Ashar']['Selasa'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Ashar&hari=Selasa" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Ashar']['Rabu']) ? $data_adzan['Ashar']['Rabu'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Ashar&hari=Rabu" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>    
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Ashar']['Kamis']) ? $data_adzan['Ashar']['Kamis'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Ashar&hari=Kamis" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>   
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Ashar']['Jumat']) ? $data_adzan['Ashar']['Jumat'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Ashar&hari=Jumat" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Ashar']['Sabtu']) ? $data_adzan['Ashar']['Sabtu'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Ashar&hari=Sabtu" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="nama-petugas">
                            <?php echo isset($data_adzan['Ashar']['Minggu']) ? $data_adzan['Ashar']['Minggu'] : 'N/A'; ?>
                        </span>
                        <?php if (isset($_SESSION['is_admin'])): ?>
                        <a href="jadwal_edit.php?waktu=Ashar&hari=Minggu" class="btn-edit-inline" title="Edit Jadwal">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php endif; ?> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div> 
    <h1>Jadwal Khatib Jumat</h1>
    <p>Daftar penceramah sholat Jumat untuk beberapa pekan ke depan.</p>
    <?php if (isset($_SESSION['is_admin'])): ?>
    <div style="max-width: 1200px; margin: 0 auto 1em auto; text-align: center  ;">
        <a href="jadwal_khatib_edit.php" class="btn-tambah">
            <i class="fas fa-plus-circle"></i> Tambah Khatib Baru
        </a>
    </div>
    <?php endif; ?>
    <div class="table-container-jadwal">
        <table class="jadwal-table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Khatib</th>
                    <th>Muadzin</th>
                    <?php if (isset($_SESSION['is_admin'])): ?>
                        <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data_khatib)): ?>
                    <?php foreach ($data_khatib as $khatib): ?>
                        <tr>
                            <td><strong><?php echo date('d M Y', strtotime($khatib['tanggal'])); ?></strong></td>
                            
                            <td style="text-align: left; padding-left: 1em;">
                                <?php echo htmlspecialchars($khatib['nama_khatib']); ?>
                            </td>
                            
                            <td style="text-align: left; padding-left: 1em;">
                                <?php 
                                // Jika tema kosong, cetak tulisan miring "Belum ditentukan"
                                echo $khatib['muadzin'] ? htmlspecialchars($khatib['muadzin']) : '<em>Belum ditentukan</em>'; 
                                ?>
                            </td>
                            <?php if (isset($_SESSION['is_admin'])): ?>
                            <td>
                                <a href="jadwal_khatib_edit.php?id=<?php echo $khatib['id_khatib']; ?>" class="btn-edit-inline" style="position: static; margin-right: 10px;" title="Edit Khatib">
                                    <i class="fas fa-edit"></i>
                                </a>
    
                                <a href="jadwal.php?action=delete&id=<?php echo $khatib['id_khatib']; ?>" class="btn-delete-inline" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal khatib ini?');" title="Hapus Khatib">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="padding: 2em;">Belum ada jadwal khatib yang terdaftar untuk waktu mendatang.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<br>
<?php
require_once '../layout/footer.php';
?>
