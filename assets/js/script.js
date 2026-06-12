// ========================================
// 1. Fungsi Navbar Toggle (Glassmorphism)
// ========================================
document.addEventListener('DOMContentLoaded', function () {
    const navbarToggle = document.getElementById('navbarToggle');
    const navbarMenu = document.getElementById('navbarMenu');

    if (navbarToggle && navbarMenu) {
        navbarToggle.addEventListener('click', function () {
            navbarToggle.classList.toggle('is-active');
            navbarMenu.classList.toggle('is-active');

            // Update the aria-expanded attribute for screen readers
            const isExpanded = navbarToggle.getAttribute('aria-expanded') === 'true';
            navbarToggle.setAttribute('aria-expanded', !isExpanded);
        });
    }
});

// ========================================
// 2. Fungsi Jadwal Sholat API Kemenag
// ========================================
async function getJadwalSholat() {
    // PENJAGA: Cek apakah ada elemen tabel di halaman ini.
    // Jika tidak ada (misal di halaman Home), hentikan fungsi agar tidak error.
    const elementTanggal = document.getElementById('tanggal-masehi');
    const elementTabel = document.getElementById('data-jadwal');
    
    if (!elementTanggal || !elementTabel) {
        return; // Berhenti di sini
    }

    // Persiapan tanggal hari ini
    const date = new Date();
    const tahun = date.getFullYear();
    const bulan = String(date.getMonth() + 1).padStart(2, '0');
    const hari = String(date.getDate()).padStart(2, '0');
    
    // URL API Kemenag (MyQuran API)
    const apiUrl = `https://api.myquran.com/v2/sholat/jadwal/1404/${tahun}/${bulan}/${hari}`;

    try {
        // Meminta data ke server API
        const response = await fetch(apiUrl);
        const data = await response.json();

        // Jika data berhasil diambil
        if(data.status === true) {
            const jadwal = data.data.jadwal;
            
            // Tampilkan tanggal ke layar
            elementTanggal.innerText = jadwal.tanggal;

            // Masukkan data jam sholat ke dalam tabel HTML
            elementTabel.innerHTML = `
                <td>${jadwal.imsak}</td>
                <td>${jadwal.subuh}</td>
                <td>${jadwal.terbit}</td>
                <td>${jadwal.dzuhur}</td>
                <td>${jadwal.ashar}</td>
                <td>${jadwal.maghrib}</td>
                <td>${jadwal.isya}</td>
            `;
        }
    } catch (error) {
        console.error("Gagal mengambil data jadwal sholat: ", error);
        elementTabel.innerHTML = `<td colspan="7">Gagal memuat jadwal. Periksa koneksi internet.</td>`;
    }
}

// Jalankan fungsi jadwal sholat saat halaman dimuat
document.addEventListener('DOMContentLoaded', getJadwalSholat); 