<?php 
// Mulai sesi virtual
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Mengambil nama file PHP yang sedang dibuka saat ini
$halaman_aktif = basename($_SERVER['PHP_SELF']); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masjid Hamzah</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/footer.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/jadwal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="navbar" role="banner">
        <div class="navbar__container">
            <a href="<?php echo BASE_URL; ?>/index.php"><img src="<?php echo BASE_URL; ?>/assets/img/logo.png" alt="Masjid Hamzah" class="navbar__brand"></a>
            
            <button class="navbar__toggle" 
                    id="navbarToggle" 
                    aria-label="Toggle navigation" 
                    aria-controls="navbarMenu" 
                    aria-expanded="false">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
            
            <nav id="navbarMenu" class="navbar__menu" role="navigation" aria-labelledby="navbarToggle">
                <ul class="navbar__list">
                    <li class="navbar__item"><a href="<?php echo BASE_URL; ?>/index.php" class="navbar__link <?php echo ($halaman_aktif == 'index.php') ? 'navbar__link--active' : ''; ?>">Home</a></li>
                    <li class="navbar__item"><a href="<?php echo BASE_URL; ?>/view/pages/jadwal.php" class="navbar__link <?php echo ($halaman_aktif == 'jadwal.php') ? 'navbar__link--active' : ''; ?>">Jadwal</a></li>
                    <li class="navbar__item"><a href="<?php echo BASE_URL; ?>/view/pages/kegiatan.php" class="navbar__link <?php echo ($halaman_aktif == 'kegiatan.php') ? 'navbar__link--active' : ''; ?>">Kegiatan</a></li>
                    <li class="navbar__item"><a href="<?php echo BASE_URL; ?>/view/pages/keuangan.php" class="navbar__link <?php echo ($halaman_aktif == 'keuangan.php') ? 'navbar__link--active' : ''; ?>">Keuangan</a></li>
                    <li class="navbar__item"><a href="<?php echo BASE_URL; ?>/view/pages/amal_sedekah.php" class="navbar__link <?php echo ($halaman_aktif == 'amal_sedekah.php') ? 'navbar__link--active' : ''; ?>">Amal Online</a></li>
                    <?php if (isset($_SESSION['is_admin'])): ?>
                    <li class="navbar__item"><a href="<?php echo BASE_URL; ?>/models/login.php?action=logout" class="navbar__link " onclick="return confirm('Yakin ingin keluar?');">Logout</a></li>
                    <?php else: ?>
                    <li class="navbar__item"><a href="<?php echo BASE_URL; ?>/auth/login.php" class="navbar__link" >Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>