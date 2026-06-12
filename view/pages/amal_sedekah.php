<?php
// view/pages/sedekah.php
require_once '../layout/header.php';
?>

<style>
    .sedekah-container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 3rem 2rem;
        margin: calc(var(--navbar-height) + 2rem) auto 4rem auto;
        max-width: 650px;
        text-align: center;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }
    .qris-box {
        background: #ffffff;
        padding: 1.5rem;
        border-radius: 16px;
        display: inline-block;
        margin: 2rem 0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        border: 3px solid var(--color-glass-border);
    }
    .qris-img {
        width: 100%;
        max-width: 280px;
        height: auto;
        margin:0 auto;
        display: block;
    }
    .quote-box {
        font-style: italic;
        color: #ffd700; /* Warna emas */
        font-size: 1.1rem;
        line-height: 1.6;
        margin: 1.5rem 0;
        padding: 0 1rem;
        position: relative;
    }
    .quote-box::before {
        content: '"';
        font-size: 3rem;
        color: rgba(255,255,255,0.2);
        position: absolute;
        top: -1.5rem;
        left: 0;
    }
    .quote-source {
        font-size: 0.9rem;
        color: #eee;
        margin-top: 0.5rem;
        font-weight: bold;
        font-style: normal;
    }
</style>

<main style="padding: 0 var(--navbar-padding); flex: 1;">
    <div class="sedekah-container">
        <h1 style="margin-top: 0; margin-bottom: 0.5rem; color: #fff;">Sedekah Online</h1>
        <p style="color: rgba(255,255,255,0.7); font-size: 0.95rem; margin-bottom: 2rem;">
            Salurkan infak terbaik Anda secara mudah dan instan demi kemakmuran operasional dan kegiatan sosial Masjid Hamzah.
        </p>

        <div class="quote-box">
            "Perumpamaan orang yang menginfakkan hartanya di jalan Allah seperti sebutir biji yang menumbuhkan tujuh tangkai, pada setiap tangkai ada seratus biji. Allah melipatgandakan bagi siapa yang Dia kehendaki."
            <div class="quote-source">— QS. Al-Baqarah: 261</div>
        </div>

        <div class="qris-box">
            <img src="/WEBSITE-MASJID_KELNYAWIT/assets/img/qris.png" alt="QRIS Masjid Hamzah" class="qris-img" >
            <div style="color: #333; font-weight: 800; margin-top: 0.8rem; font-size: 1.1rem; letter-spacing: 1px;">QRIS JALAN AMAL MASJID</div>
            <div style="color: #777; font-size: 0.75rem; margin-top: 0.2rem;">Mendukung semua dompet digital (Gopay, OVO, Dana, LinkAja, & M-Banking)</div>
        </div>

        <div class="quote-box" style="color: #ffffff; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem;">
            "Sedekah itu tidak akan mengurangi harta. Tidak ada orang yang memberi maaf kepada orang lain, melainkan Allah akan menambah kemuliaannya."
            <div class="quote-source">— HR. Muslim no. 2588</div>
        </div>
    </div>
</main>

<?php 
require_once '../layout/footer.php'; 
?>