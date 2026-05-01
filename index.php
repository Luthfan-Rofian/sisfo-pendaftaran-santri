<?php
session_start();
error_reporting(0);
include 'config/koneksi.php';

 $ppdb = mysqli_query($conn, "SELECT * FROM tb_ppdb");
 $pdb = mysqli_fetch_object($ppdb);

 $tomboladmin = mysqli_query($conn, "SELECT * FROM tb_tbladm");
 $ta = mysqli_fetch_object($tomboladmin);

 $stmaintenance = mysqli_query($conn, "SELECT * FROM tb_maintenance");
 $mt = mysqli_fetch_object($stmaintenance);

 $notifikasi = mysqli_query($conn, "SELECT * FROM tb_notif_depan");
 $tnd = mysqli_fetch_object($notifikasi);

 $lembaga_q = mysqli_query($conn, "SELECT * FROM tb_lembaga");

if(!$pdb) {
    $pdb = new stdClass();
    $pdb->sk_pdf = 'PSB'; $pdb->lb_pdf = 'Penerimaan Santri Baru'; $pdb->ys_pdf = 'Yayasan Pendidikan';
    $pdb->th_pdf = date('Y'); $pdb->nr_pdf = '-'; $pdb->rk_pdf = '-'; $pdb->ar_pdf = '-';
    $pdb->n1_pdf = '-'; $pdb->k1_pdf = '-'; $pdb->n2_pdf = '-'; $pdb->k2_pdf = '-';
    $pdb->a1_pdf = '-'; $pdb->a2_pdf = '-'; $pdb->fb_pdf = '#'; $pdb->ig_pdf = '#'; $pdb->yt_pdf = '#'; $pdb->wa_pdf = '628000000000';
}
if(!$ta) { $ta = new stdClass(); $ta->st = ''; }
if(!$mt) { $mt = new stdClass(); $mt->aw_main = ''; }
if(!$tnd) { $tnd = new stdClass(); $tnd->st_nd = ''; $tnd->sf_nd = ''; $tnd->jd_nd = ''; $tnd->tg_nd = ''; $tnd->ct_nd = ''; $tnd->at_nd = ''; }

function tgl_indo($tanggal){
    if(!$tanggal || $tanggal == '0000-00-00') return '-';
    $bulan = array (1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

 $dpdf = mysqli_query($conn, "SELECT COUNT(id_daf) AS total FROM tb_daftar");
 $dtp = mysqli_fetch_object($dpdf);
 $dpdfm = mysqli_query($conn, "SELECT COUNT(id_daf) AS tunggu FROM tb_daftar WHERE st_pdf = 'Menunggu'");
 $dtm = mysqli_fetch_object($dpdfm);
 $dpdfr = mysqli_query($conn, "SELECT COUNT(id_daf) AS terima FROM tb_daftar WHERE st_pdf = 'Diterima'");
 $dtr = mysqli_fetch_object($dpdfr);
 $dpdfl = mysqli_query($conn, "SELECT COUNT(id_daf) AS tolak FROM tb_daftar WHERE st_pdf = 'Ditolak'");
 $dtl = mysqli_fetch_object($dpdfl);

 $aktif = strip_tags($mt->aw_main);
 $linkDaftar = ($aktif == 'tutup') ? 'main' : 'lembaga';
 $buka_notif = strip_tags($tnd->st_nd);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>PENERIMAAN SANTRI BARU - <?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?></title>
    <meta content="Website resmi Penerimaan Santri Baru (PPDB) <?= htmlspecialchars(strip_tags($pdb->ys_pdf)); ?>" name="description">
    <meta content="PPDB, PSB, Pondok Pesantren, Santri Baru, Pendaftaran Online" name="keywords">
    <meta property="og:title" content="PSB - <?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?>">
    <meta property="og:description" content="Website resmi Penerimaan Santri Baru <?= htmlspecialchars(strip_tags($pdb->ys_pdf)); ?>">
    <meta property="og:type" content="website">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Amiri:wght@400;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
    <style>
        *{scroll-behavior:smooth;box-sizing:border-box;}
        body{font-family:'Plus Jakarta Sans',sans-serif;overflow-x:hidden;background:#FAFBFC;}
        .font-amiri{font-family:'Amiri',serif;}
        .font-playfair{font-family:'Playfair Display',serif;}
        .text-islamic-green{color:#0F4C3A !important;}
        .bg-islamic-green{background-color:#0F4C3A !important;}
        .bg-islamic-green-light{background-color:#EEFBF4 !important;}
        .text-gold{color:#C8963E !important;}
        .bg-gold{background-color:#C8963E !important;}
        .bg-gold-light{background-color:#FFF9EB !important;}
        #preloader{z-index:10000 !important;transition:opacity .6s ease,visibility .6s ease;}
        #preloader.hidden-preloader{opacity:0 !important;visibility:hidden !important;pointer-events:none !important;}
        .preloader-bar{width:200px;height:4px;background:#e9ecef;border-radius:4px;overflow:hidden;}
        .preloader-bar-fill{height:100%;width:0;background:linear-gradient(90deg,#0F4C3A,#C8963E);border-radius:4px;transition:width .4s ease;}
        #scrollProgress{position:fixed;top:0;left:0;height:3px;background:linear-gradient(90deg,#0F4C3A,#C8963E);z-index:9999;transition:width .1s linear;width:0;}
        .hero-pattern{background-image:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%230F4C3A' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");}
        .hero-blob{position:absolute;border-radius:50%;filter:blur(80px);opacity:.15;animation:blobFloat 8s ease-in-out infinite alternate;}
        @keyframes blobFloat{0%{transform:translate(0,0) scale(1);}100%{transform:translate(30px,-20px) scale(1.1);}}
        .ornament-islamic{position:absolute;opacity:.04;pointer-events:none;}
        @keyframes rotateSlow{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}
        .rotate-slow{animation:rotateSlow 60s linear infinite;}
        @keyframes floatY{0%,100%{transform:translateY(0);}50%{transform:translateY(-12px);}}
        .float-y{animation:floatY 4s ease-in-out infinite;}
        .card-hover{transition:all .35s cubic-bezier(.4,0,.2,1);}
        .card-hover:hover{transform:translateY(-8px);box-shadow:0 20px 50px rgba(15,76,58,0.12) !important;}
        .card-hover-glow:hover{box-shadow:0 20px 60px rgba(15,76,58,0.18),0 0 0 1px rgba(15,76,58,0.06) !important;}
        .navbar-scrolled{padding-top:6px !important;padding-bottom:6px !important;backdrop-filter:blur(20px) saturate(180%);background:rgba(255,255,255,0.92) !important;}
        .nav-link-custom{color:#4A4A5A !important;font-weight:600;font-size:14px;padding:8px 16px !important;border-radius:8px;transition:all .25s;position:relative;}
        .nav-link-custom:hover,.nav-link-custom.active{color:#0F4C3A !important;background:#EEFBF4;}
        .nav-link-custom.active::after{content:'';position:absolute;bottom:2px;left:50%;transform:translateX(-50%);width:16px;height:2px;background:#C8963E;border-radius:2px;}
        .dropdown-menu{border:none;box-shadow:0 8px 32px rgba(0,0,0,0.1);border-radius:12px;padding:8px;min-width:240px;}
        .dropdown-item{border-radius:8px;padding:10px 14px;font-size:13px;font-weight:500;color:#4A4A5A;transition:all .2s;}
        .dropdown-item:hover{background:#EEFBF4;color:#0F4C3A;}
        .btn-islamic{background:#0F4C3A;color:#fff;border:none;border-radius:12px;padding:13px 30px;font-weight:700;font-size:14px;transition:all .3s;position:relative;overflow:hidden;}
        .btn-islamic::before{content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.1),transparent);transition:left .5s;}
        .btn-islamic:hover::before{left:100%;}
        .btn-islamic:hover{background:#0a3328;color:#fff;transform:translateY(-2px);box-shadow:0 8px 24px rgba(15,76,58,0.3);}
        .btn-gold{background:#C8963E;color:#fff;border:none;border-radius:12px;padding:13px 30px;font-weight:700;font-size:14px;transition:all .3s;}
        .btn-gold:hover{background:#b5862f;color:#fff;transform:translateY(-2px);box-shadow:0 8px 24px rgba(200,150,62,0.3);}
        .btn-outline-custom{border:2px solid #D1D5DB;color:#374151;border-radius:12px;padding:12px 28px;font-weight:700;font-size:14px;background:#fff;transition:all .3s;}
        .btn-outline-custom:hover{border-color:#0F4C3A;color:#0F4C3A;background:#EEFBF4;}
        .section-label{font-size:12px;font-weight:700;color:#C8963E;text-transform:uppercase;letter-spacing:0.15em;}
        .section-title{font-family:'Playfair Display',serif;color:#0F4C3A;font-weight:800;}
        .islamic-divider{display:flex;align-items:center;gap:16px;justify-content:center;margin:0 auto;max-width:300px;}
        .islamic-divider::before,.islamic-divider::after{content:'';flex:1;height:1px;background:linear-gradient(to right,transparent,#C8963E,transparent);}
        .section-decoration{position:absolute;border-radius:50%;pointer-events:none;}
        .step-line{position:absolute;left:50%;top:0;bottom:0;width:3px;background:linear-gradient(to bottom,#0F4C3A,#C8963E,#0F4C3A);transform:translateX(-50%);border-radius:3px;}
        .step-dot{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:48px;height:48px;border-radius:50%;background:#0F4C3A;color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;z-index:2;box-shadow:0 4px 12px rgba(15,76,58,0.3);transition:all .3s;}
        .step-dot:hover{transform:translate(-50%,-50%) scale(1.15);box-shadow:0 8px 24px rgba(15,76,58,0.4);}
        .counter-box{position:relative;overflow:hidden;}
        .counter-box::before{content:'';position:absolute;top:-50%;right:-50%;width:100%;height:100%;background:radial-gradient(circle,rgba(200,150,62,0.08) 0%,transparent 70%);border-radius:50%;}
        .floating-wa{position:fixed;bottom:28px;left:28px;z-index:1050;animation:bounce-wa 2s infinite;}
        @keyframes bounce-wa{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
        .fade-up{opacity:0;transform:translateY(30px);transition:all .6s cubic-bezier(.4,0,.2,1);}
        .fade-up.visible{opacity:1;transform:translateY(0);}
        .fade-left{opacity:0;transform:translateX(-30px);transition:all .6s cubic-bezier(.4,0,.2,1);}
        .fade-left.visible{opacity:1;transform:translateX(0);}
        .fade-right{opacity:0;transform:translateX(30px);transition:all .6s cubic-bezier(.4,0,.2,1);}
        .fade-right.visible{opacity:1;transform:translateX(0);}
        .scale-in{opacity:0;transform:scale(0.9);transition:all .5s cubic-bezier(.4,0,.2,1);}
        .scale-in.visible{opacity:1;transform:scale(1);}
        .zoom-in{opacity:0;transform:scale(0.85);transition:all .7s cubic-bezier(.4,0,.2,1);}
        .zoom-in.visible{opacity:1;transform:scale(1);}
        .accordion-button:not(.collapsed){background:#EEFBF4;color:#0F4C3A;box-shadow:none;font-weight:600;}
        .accordion-button:focus{box-shadow:none;}
        .compare-table th,.compare-table td{padding:14px 18px;font-size:13.5px;vertical-align:middle;}
        .compare-table thead th{background:#0F4C3A;color:#fff;font-weight:700;border:none;font-size:12px;text-transform:uppercase;letter-spacing:0.05em;}
        .compare-table tbody tr{transition:background .2s;}
        .compare-table tbody tr:hover{background:#EEFBF4;}
        .compare-table tbody td{border-color:#e9ecef;color:#374151;}
        #cookieBanner{transition:all .5s ease;transform:translateY(100%);}
        #cookieBanner.show-cookie{transform:translateY(0);}
        .pulse-ring{position:relative;}
        .pulse-ring::after{content:'';position:absolute;inset:-4px;border-radius:50%;border:2px solid #0F4C3A;animation:pulseRing 1.5s ease-out infinite;}
        @keyframes pulseRing{0%{transform:scale(1);opacity:1;}100%{transform:scale(1.5);opacity:0;}}
        .typing-cursor{display:inline-block;width:3px;height:1em;background:#C8963E;margin-left:4px;animation:blink .8s step-end infinite;vertical-align:text-bottom;}
        @keyframes blink{50%{opacity:0;}}
        .info-card{border-left:3px solid #C8963E;padding-left:14px;transition:all .2s;}
        .info-card:hover{border-left-color:#0F4C3A;background:#EEFBF4;border-radius:0 8px 8px 0;}
        .gallery-item{position:relative;overflow:hidden;border-radius:16px;cursor:pointer;}
        .gallery-item img{transition:transform .5s cubic-bezier(.4,0,.2,1);width:100%;height:100%;object-fit:cover;}
        .gallery-item:hover img{transform:scale(1.08);}
        .gallery-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(15,76,58,0.8) 0%,transparent 60%);opacity:0;transition:opacity .35s;display:flex;align-items:flex-end;padding:20px;}
        .gallery-item:hover .gallery-overlay{opacity:1;}
        .countdown-item{background:rgba(255,255,255,0.1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.15);border-radius:12px;padding:12px 16px;min-width:80px;text-align:center;transition:transform .2s;}
        .countdown-item:hover{transform:translateY(-4px);}
        .countdown-num{font-family:'Playfair Display',serif;font-size:32px;font-weight:800;color:#fff;line-height:1;}
        .countdown-label{font-size:10px;color:rgba(255,255,255,0.7);text-transform:uppercase;letter-spacing:0.1em;font-weight:600;margin-top:4px;}
        .prestasi-line{position:absolute;left:28px;top:0;bottom:0;width:3px;background:linear-gradient(to bottom,#C8963E,#0F4C3A);border-radius:3px;}
        .prestasi-dot{position:absolute;left:16px;top:50%;transform:translateY(-50%);width:26px;height:26px;border-radius:50%;background:#C8963E;border:3px solid #fff;box-shadow:0 0 0 2px #C8963E;z-index:2;}
        .glow-border{position:relative;}
        .glow-border::before{content:'';position:absolute;inset:-2px;border-radius:inherit;background:linear-gradient(135deg,#0F4C3A,#C8963E,#0F4C3A);z-index:-1;opacity:0;transition:opacity .3s;}
        .glow-border:hover::before{opacity:1;}
        .marquee-container{overflow:hidden;white-space:nowrap;}
        .marquee-content{display:inline-block;animation:marquee 30s linear infinite;}
        @keyframes marquee{0%{transform:translateX(0);}100%{transform:translateX(-50%);}}
        #backToTop{bottom:28px;right:28px;width:46px;height:46px;font-size:20px;opacity:0;visibility:hidden;transition:all .3s;z-index:1040;}
        #backToTop.show{opacity:1;visibility:visible;}
        .testimonial-card{border-top:3px solid transparent;transition:all .3s;}
        .testimonial-card:hover{border-top-color:#C8963E;}
        @media(max-width:767.98px){
            .step-line-mobile{position:absolute;left:24px;top:0;bottom:0;width:3px;background:linear-gradient(to bottom,#0F4C3A,#C8963E,#0F4C3A);border-radius:3px;}
            .step-dot-mobile{position:absolute;left:24px;top:50%;transform:translate(-50%,-50%);width:40px;height:40px;border-radius:50%;background:#0F4C3A;color:#fff;display:flex;align-items:center;justify-content:center;font-size:15px;z-index:2;}
            .compare-table th,.compare-table td{padding:10px 12px;font-size:12px;}
            .countdown-num{font-size:24px;}
            .countdown-item{min-width:65px;padding:10px 12px;}
        }
        @media(prefers-reduced-motion:reduce){*,*::before,*::after{animation-duration:0.01ms!important;animation-iteration-count:1!important;transition-duration:0.01ms!important;}}
    </style>
</head>
<body class="bg-light">

    <div id="scrollProgress"></div>

    <div id="preloader" class="position-fixed top-0 start-0 w-100 h-100 flex-column align-items-center justify-content-center gap-3 bg-white" style="display:flex;">
        <div class="d-flex align-items-center justify-content-center rounded-4 bg-islamic-green mb-2" style="width:64px;height:64px;">
            <img src="assets/dist/img/icon.png" alt="Logo" class="img-fluid" style="width:40px;height:40px;object-fit:contain;">
        </div>
        <div class="font-amiri fs-5 text-islamic-green opacity-40">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
        <div class="preloader-bar mt-2"><div class="preloader-bar-fill" id="preloaderBar"></div></div>
        <div class="small text-muted fw-medium mt-1" id="preloaderText">Memuat halaman...</div>
    </div>

    <header id="header" class="fixed-top">
        <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3" id="mainNav">
            <div class="container">
                <a href="index" class="navbar-brand d-flex align-items-center gap-3 text-decoration-none">
                    <div class="d-flex align-items-center justify-content-center rounded-3 bg-islamic-green" style="width:44px;height:44px;flex-shrink:0;">
                        <img src="assets/dist/img/icon.png" alt="Logo" class="img-fluid" style="width:28px;height:28px;object-fit:contain;">
                    </div>
                    <div>
                        <div class="fw-bold text-islamic-green lh-1" style="font-size:15px;"><?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?></div>
                        <div class="fw-semibold text-gold lh-1" style="font-size:9px;text-transform:uppercase;letter-spacing:0.12em;">Penerimaan Santri Baru</div>
                    </div>
                </a>
                <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navMain">
                    <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                        <li class="nav-item"><a class="nav-link nav-link-custom active" href="#hero">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-custom" href="#about">Tentang</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-custom" href="#program">Program</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-custom" href="#alur">Alur</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Lainnya</a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#brosur"><i class="bi bi-file-earmark-image me-2 text-gold"></i>Brosur</a></li>
                                <li><a class="dropdown-item" href="#galeri"><i class="bi bi-images me-2 text-gold"></i>Galeri Kegiatan</a></li>
                                <li><a class="dropdown-item" href="#rekening"><i class="bi bi-bank2 me-2 text-gold"></i>Rekening Bank</a></li>
                                <li><a class="dropdown-item" href="#syarat"><i class="bi bi-clipboard-check me-2 text-gold"></i>Syarat Pendaftaran</a></li>
                                <li><a class="dropdown-item" href="#perbandingan"><i class="bi bi-bar-chart me-2 text-gold"></i>Perbandingan</a></li>
                                <li><a class="dropdown-item" href="#prestasi"><i class="bi bi-trophy me-2 text-gold"></i>Prestasi</a></li>
                                <li><a class="dropdown-item" href="#faq"><i class="bi bi-question-circle me-2 text-gold"></i>FAQ</a></li>
                                <li><a class="dropdown-item" href="#testimoni"><i class="bi bi-chat-quote me-2 text-gold"></i>Testimoni</a></li>
                                <li><a class="dropdown-item" href="#lokasi"><i class="bi bi-geo-alt me-2 text-gold"></i>Lokasi</a></li>
                                <li><a class="dropdown-item" href="#tips"><i class="bi bi-lightbulb me-2 text-gold"></i>Tips Persiapan</a></li>
                                <li><hr class="dropdown-divider my-1"></li>
                                <li><a class="dropdown-item" href="prosedur"><i class="bi bi-journal-text me-2 text-gold"></i>Prosedur Lengkap</a></li>
                                <li><a class="dropdown-item" href="#footer"><i class="bi bi-telephone me-2 text-gold"></i>Kontak Person</a></li>
                            </ul>
                        </li>
                        <?php if (strip_tags($ta->st) == 'buka') { ?>
                        <li class="nav-item ms-lg-2">
                            <a href="login" class="btn btn-islamic btn-sm d-inline-flex align-items-center gap-2 px-4 py-2"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section id="hero" class="hero-pattern position-relative" style="min-height:100vh;padding-top:80px;">
        <div class="hero-blob bg-islamic-green" style="width:400px;height:400px;top:10%;right:-100px;"></div>
        <div class="hero-blob bg-gold" style="width:300px;height:300px;bottom:10%;left:-80px;animation-delay:3s;"></div>
        <div class="position-absolute top-0 end-0 w-50 h-100 d-none d-lg-block" style="background:linear-gradient(135deg,transparent 30%,#EEFBF4 70%,#FFF9EB);border-radius:0 0 0 50%;opacity:0.4;"></div>
        <div class="ornament-islamic rotate-slow d-none d-lg-block" style="width:200px;height:200px;top:15%;left:5%;">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"><polygon points="100,10 120,80 190,80 130,120 150,190 100,150 50,190 70,120 10,80 80,80" fill="#0F4C3A"/></svg>
        </div>
        <div class="container position-relative" style="z-index:2;">
            <div class="row align-items-center min-vh-100 py-5 g-5">
                <div class="col-lg-6 fade-up">
                    <div class="d-inline-flex align-items-center gap-2 rounded-pill px-3 py-2 mb-4 bg-islamic-green-light border border-success-subtle">
                        <span class="rounded-circle bg-islamic-green pulse-ring" style="width:8px;height:8px;"></span>
                        <span class="fw-bold text-islamic-green" style="font-size:11px;text-transform:uppercase;letter-spacing:0.1em;">Pendaftaran Dibuka</span>
                    </div>
                    <div class="font-amiri text-islamic-green opacity-10" style="font-size:clamp(22px,4vw,38px);line-height:1;user-select:none;margin-bottom:-4px;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
                    <h1 class="font-playfair text-islamic-green mb-2" style="font-size:clamp(32px,5.5vw,56px);font-weight:800;line-height:1.05;letter-spacing:-0.03em;">
                        <span id="heroTyping"></span><span class="typing-cursor"></span>
                    </h1>
                    <p class="font-playfair text-gold fw-semibold mb-3" style="font-size:clamp(18px,3vw,26px);"><?= htmlspecialchars(strip_tags($pdb->ys_pdf)); ?></p>
                    <p class="text-secondary mb-4" style="font-size:15px;max-width:480px;line-height:1.85;">Mencetak generasi berilmu, berakhlak mulia & berwawasan global melalui kurikulum terpadu pesantren dan pemerintah. Bergabunglah bersama ribuan alumni tersebar di seluruh penjuru negeri.</p>
                    <div class="d-inline-flex align-items-center gap-2 rounded-pill px-4 py-2 mb-4 bg-gold-light border border-warning-subtle">
                        <i class="bi bi-calendar3 text-gold"></i>
                        <span class="fw-bold" style="font-size:13px;color:#92400E;">Tahun Ajaran <?= htmlspecialchars(strip_tags($pdb->th_pdf)); ?></span>
                    </div>
                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <a href="<?= $linkDaftar; ?>" class="btn btn-islamic d-inline-flex align-items-center gap-2"><i class="bi bi-pencil-square"></i> Daftar Sekarang</a>
                        <a href="prosedur" class="btn btn-outline-custom d-inline-flex align-items-center gap-2"><i class="bi bi-journal-text"></i> Prosedur Lengkap</a>
                    </div>
                    <div class="row g-3">
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 bg-islamic-green-light">
                                <div class="d-flex align-items-center justify-content-center rounded-2 bg-islamic-green text-white" style="width:36px;height:36px;"><i class="bi bi-people-fill"></i></div>
                                <div><div class="fw-bold text-islamic-green" style="font-size:13px;">Putra & Putri</div><div class="text-muted" style="font-size:10px;">Terpisah & Nyaman</div></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 bg-gold-light">
                                <div class="d-flex align-items-center justify-content-center rounded-2 bg-gold text-white" style="width:36px;height:36px;"><i class="bi bi-building"></i></div>
                                <div><div class="fw-bold" style="font-size:13px;color:#92400E;">Asrama Modern</div><div class="text-muted" style="font-size:10px;">Fasilitas Lengkap</div></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 bg-primary bg-opacity-10">
                                <div class="d-flex align-items-center justify-content-center rounded-2 bg-primary text-white" style="width:36px;height:36px;"><i class="bi bi-globe2"></i></div>
                                <div><div class="fw-bold text-primary" style="font-size:13px;">Kurikulum Terpadu</div><div class="text-muted" style="font-size:10px;">Nasional + Pesantren</div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 fade-up" style="transition-delay:0.2s;">
                    <div class="position-relative">
                        <div class="position-absolute rounded-4 bg-islamic-green-light border-0" style="inset:-20px;opacity:0.5;z-index:-1;"></div>
                        <img src="assets/landing/assets/img/hero-img2.png" class="img-fluid rounded-4 shadow-lg" alt="Hero Image" onerror="this.onerror=null;this.src='https://placehold.co/600x500/EEFBF4/0F4C3A?text=PSB';">
                        <div class="position-absolute bg-white rounded-3 shadow p-3 d-flex align-items-center gap-3 float-y" style="bottom:30px;right:-10px;border-left:4px solid #C8963E;">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-islamic-green-light text-islamic-green" style="width:48px;height:48px;font-size:22px;"><i class="bi bi-mortarboard-fill"></i></div>
                            <div><div class="text-muted" style="font-size:11px;">Pengalaman</div><div class="fw-bold text-islamic-green" style="font-size:22px;">25+ Tahun</div></div>
                        </div>
                        <div class="position-absolute bg-white rounded-3 shadow p-3 d-flex align-items-center gap-3 d-none d-md-flex" style="top:30px;left:-10px;border-left:4px solid #0F4C3A;animation:floatY 5s ease-in-out infinite;">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-gold-light text-gold" style="width:48px;height:48px;font-size:22px;"><i class="bi bi-journal-bookmark-fill"></i></div>
                            <div><div class="text-muted" style="font-size:11px;">Tahfidz</div><div class="fw-bold text-gold" style="font-size:22px;">30 Juz</div></div>
                        </div>
                        <div class="position-absolute bg-white rounded-3 shadow p-2 d-flex align-items-center gap-2 d-none d-lg-flex" style="top:50%;right:-15px;transform:translateY(-50%);border-left:4px solid #16A34A;">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success" style="width:36px;height:36px;font-size:16px;"><i class="bi bi-check-lg"></i></div>
                            <div><div class="fw-bold text-success" style="font-size:14px;">Terakreditasi</div><div class="text-muted" style="font-size:9px;">Kemenag RI</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-islamic-green py-2 overflow-hidden">
        <div class="marquee-container">
            <div class="marquee-content">
                <span class="text-white fw-medium" style="font-size:12px;letter-spacing:0.05em;">
                    &nbsp;&nbsp;<i class="bi bi-star-fill text-gold me-1"></i> Pendaftaran TA <?= htmlspecialchars(strip_tags($pdb->th_pdf)); ?> Dibuka &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Kuota Terbatas &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Tahfidz 30 Juz + Sanad &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Kurikulum Terpadu Nasional & Pesantren &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Beasiswa Prestasi Tersedia &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Pendaftaran Online 24 Jam &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Asrama Modern & Islami &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Pendaftaran TA <?= htmlspecialchars(strip_tags($pdb->th_pdf)); ?> Dibuka &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Kuota Terbatas &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Tahfidz 30 Juz + Sanad &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Kurikulum Terpadu Nasional & Pesantren &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Beasiswa Prestasi Tersedia &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Pendaftaran Online 24 Jam &nbsp;&nbsp;
                    <i class="bi bi-star-fill text-gold me-1"></i> Asrama Modern & Islami &nbsp;&nbsp;
                </span>
            </div>
        </div>
    </div>

    <section class="bg-islamic-green py-4 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-5" style="background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2240%22 height=%2240%22%3E%3Cpath d=%22M20 20.5V18H0v-2h20v-2l2 3.25-2 3.25z%22 fill=%22%23fff%22 fill-opacity=%220.4%22 fill-rule=%22evenodd%22/%3E%3C/svg%3E');"></div>
        <div class="container text-center position-relative" style="z-index:2;">
            <div class="font-amiri text-white opacity-30 mb-1" style="font-size:clamp(18px,3vw,28px);">يَرْفَعِ اللَّهُ الَّذِينَ آمَنُوا مِنكُمْ وَالَّذِينَ أُوتُوا الْعِلْمَ دَرَجَاتٍ</div>
            <div class="text-white-50 small">QS. Al-Mujadalah : 11 — "Allah akan mengangkat derajat orang-orang yang beriman dan berilmu di antaramu beberapa derajat."</div>
        </div>
    </section>

    <section class="py-5 position-relative overflow-hidden" style="background:linear-gradient(135deg,#0a3328 0%,#0F4C3A 50%,#0a3328 100%);">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-5" style="background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22%3E%3Ccircle cx=%2230%22 cy=%2230%22 r=%222%22 fill=%22%23fff%22/%3E%3C/svg%3E');"></div>
        <div class="container position-relative" style="z-index:2;">
            <div class="text-center mb-4 fade-up">
                <p class="text-gold fw-bold mb-1" style="font-size:11px;text-transform:uppercase;letter-spacing:0.15em;">Waktu Pendaftaran</p>
                <h3 class="text-white fw-bold" style="font-size:22px;">Countdown Pendaftaran TA <?= htmlspecialchars(strip_tags($pdb->th_pdf)); ?></h3>
                <p class="text-white-50 small mb-0">Segera daftarkan putra/putri Anda sebelum waktu habis</p>
            </div>
            <div class="d-flex justify-content-center gap-3 flex-wrap fade-up" style="transition-delay:0.15s;">
                <div class="countdown-item"><div class="countdown-num" id="cdDays">00</div><div class="countdown-label">Hari</div></div>
                <div class="countdown-item"><div class="countdown-num" id="cdHours">00</div><div class="countdown-label">Jam</div></div>
                <div class="countdown-item"><div class="countdown-num" id="cdMinutes">00</div><div class="countdown-label">Menit</div></div>
                <div class="countdown-item"><div class="countdown-num" id="cdSeconds">00</div><div class="countdown-label">Detik</div></div>
            </div>
            <div class="text-center mt-4 fade-up" style="transition-delay:0.3s;">
                <a href="<?= $linkDaftar; ?>" class="btn btn-gold d-inline-flex align-items-center gap-2 px-5"><i class="bi bi-pencil-square"></i> Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <section id="counts" class="py-5 bg-dark position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-5" style="background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2240%22 height=%2240%22%3E%3Cpath d=%22M20 20.5V18H0v-2h20v-2l2 3.25-2 3.25z%22 fill=%22%23fff%22 fill-opacity=%220.3%22 fill-rule=%22evenodd%22/%3E%3C/svg%3E');"></div>
        <div class="container position-relative" style="z-index:2;">
            <div class="text-center mb-4 fade-up">
                <p class="text-gold fw-bold mb-1" style="font-size:11px;text-transform:uppercase;letter-spacing:0.15em;">Data Pendaftaran Real-Time</p>
                <h3 class="text-white fw-bold" style="font-size:22px;">Statistik Pendaftar TA <?= htmlspecialchars(strip_tags($pdb->th_pdf)); ?></h3>
            </div>
            <div class="row text-center g-4">
                <div class="col-6 col-lg-3 fade-up">
                    <div class="counter-box p-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-10 text-gold mb-3" style="width:56px;height:56px;font-size:24px;"><i class="bi bi-people-fill"></i></div>
                        <div class="fw-bold text-white display-6 lh-1" data-count="<?= $dtp->total ?? 0; ?>">0</div>
                        <div class="text-white-50 mt-2 small fw-medium">Total Pendaftar</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 fade-up" style="transition-delay:0.1s;">
                    <div class="counter-box p-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-10 text-warning mb-3" style="width:56px;height:56px;font-size:24px;"><i class="bi bi-hourglass-split"></i></div>
                        <div class="fw-bold text-warning display-6 lh-1" data-count="<?= $dtm->tunggu ?? 0; ?>">0</div>
                        <div class="text-white-50 mt-2 small fw-medium">Menunggu Verifikasi</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 fade-up" style="transition-delay:0.2s;">
                    <div class="counter-box p-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-10 text-success mb-3" style="width:56px;height:56px;font-size:24px;"><i class="bi bi-check-circle-fill"></i></div>
                        <div class="fw-bold text-success display-6 lh-1" data-count="<?= $dtr->terima ?? 0; ?>">0</div>
                        <div class="text-white-50 mt-2 small fw-medium">Diterima</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 fade-up" style="transition-delay:0.3s;">
                    <div class="counter-box p-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-10 text-danger mb-3" style="width:56px;height:56px;font-size:24px;"><i class="bi bi-x-circle-fill"></i></div>
                        <div class="fw-bold text-danger display-6 lh-1" data-count="<?= $dtl->tolak ?? 0; ?>">0</div>
                        <div class="text-white-50 mt-2 small fw-medium">Ditolak</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main id="main">

        <section id="about" class="py-5 bg-white position-relative">
            <div class="section-decoration bg-islamic-green-light" style="width:300px;height:300px;top:-100px;right:-100px;opacity:0.5;"></div>
            <div class="container py-4 position-relative" style="z-index:2;">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Tentang Kami</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Mengapa Memilih Pondok Kami?</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                    <p class="text-secondary mx-auto" style="max-width:520px;font-size:15px;">Komitmen kami dalam membentuk generasi Qurani yang unggul, berakhlak mulia, dan siap berdaya saing di era modern.</p>
                </div>
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 fade-left">
                        <div class="position-relative">
                            <img src="assets/landing/assets/img/hero-img2.png" class="img-fluid rounded-4 shadow" alt="Tentang" onerror="this.onerror=null;this.src='https://placehold.co/560x400/F8FAFB/0F4C3A?text=Pondok+Pesantren';">
                            <div class="position-absolute bg-white rounded-3 shadow-sm p-3 d-none d-md-flex align-items-center gap-2" style="bottom:-15px;left:30px;">
                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success" style="width:40px;height:40px;"><i class="bi bi-trophy-fill"></i></div>
                                <div><div class="fw-bold text-dark" style="font-size:18px;">100+</div><div class="text-muted" style="font-size:10px;">Prestasi Nasional</div></div>
                            </div>
                            <div class="position-absolute bg-white rounded-3 shadow-sm p-3 d-none d-md-flex align-items-center gap-2" style="top:-15px;right:30px;">
                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10 text-warning" style="width:40px;height:40px;"><i class="bi bi-person-check-fill"></i></div>
                                <div><div class="fw-bold text-dark" style="font-size:18px;">2000+</div><div class="text-muted" style="font-size:10px;">Total Alumni</div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 fade-right">
                        <p class="text-secondary mb-4" style="font-size:15px;line-height:1.9;">Merupakan kehormatan bagi kami untuk mempersiapkan generasi penerus bangsa yang berilmu, berakhlak mulia, dan berwawasan global melalui kurikulum terpadu yang memadukan keunggulan pesantren dan pendidikan nasional.</p>
                        <div class="row g-3 mb-4">
                            <?php
                            $features = [
                                ['Kurikulum Terpadu (Pesantren & Kemenag/Kemendikbud)', 'bi-book', 'success'],
                                ['Pembinaan Karakter & Bahasa Arab Intensif', 'bi-chat-heart', 'warning'],
                                ['Fasilitas Asrama Modern, Nyaman & Islami', 'bi-house-heart', 'info'],
                                ['Ekstrakurikuler Berprestasi Tingkat Nasional', 'bi-trophy', 'danger'],
                                ['Program Tahfidz Al-Quran 30 Juz Bimbingan Sanad', 'bi-journal-bookmark-fill', 'success'],
                                ['Ustadz/Ustadzah Berpengalaman & Bersertifikat', 'bi-person-workspace', 'primary']
                            ];
                            foreach($features as $f) { ?>
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-light card-hover">
                                    <div class="d-flex align-items-center justify-content-center rounded-2 bg-<?= $f[2]; ?> bg-opacity-10 text-<?= $f[2]; ?> flex-shrink-0" style="width:38px;height:38px;font-size:16px;"><i class="bi <?= $f[1]; ?>"></i></div>
                                    <div class="fw-medium" style="font-size:13px;color:#374151;line-height:1.5;"><?= $f[0]; ?></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <a href="prosedur" class="btn btn-islamic d-inline-flex align-items-center gap-2">Pelajari Prosedur Lengkap <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="program" class="py-5" style="background:#F8FAFB;">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Program Kami</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Program Unggulan</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                    <p class="text-secondary mx-auto" style="max-width:480px;font-size:15px;">Enam program unggulan yang menjadi keunggulan kompetitif pondok pesantren kami</p>
                </div>
                <div class="row g-4">
                    <?php
                    $programs = [
                        ['Tahfidz Al-Quran', 'Program menghafal Al-Quran 30 juz dengan bimbingan sanad mutawatir dan metode talaqqi langsung dari syaikh.', 'bi-journal-bookmark-fill', '30 Juz + Sanad', 'islamic-green'],
                        ['Kitab Kuning', 'Pembelajaran kitab kuning klasik dengan metode sorogan dan bandongan untuk mendalami ilmu-ilmu Islam.', 'bi-book-half', 'Nahwu, Shorof, Fiqh', 'gold'],
                        ['Bahasa Arab & Inggris', 'Program penguasaan bahasa asing secara aktif melalui muhadatsah harian dan English camp.', 'bi-translate', 'Aktif Bicara', 'primary'],
                        ['Tahsin & Tajwid', 'Pembinaan bacaan Al-Quran sesuai kaidah tajwid dengan bimbingan intensif dari ahlinya.', 'bi-mic-fill', 'Bimbingan Intensif', 'success'],
                        ['Kaderisasi Leadership', 'Pembentukan jiwa kepemimpinan melalui organisasi santri, roan, dan kegiatan kemasyarakatan.', 'bi-people', 'Organisasi Santri', 'warning'],
                        ['Life Skill & Teknologi', 'Pelatihan keterampilan hidup dan literasi digital untuk bekal santri di masa depan.', 'bi-cpu-fill', 'Digital Literacy', 'info']
                    ];
                    foreach($programs as $i => $p) { ?>
                    <div class="col-md-6 col-lg-4 fade-up" style="transition-delay:<?= $i * 0.08; ?>s;">
                        <div class="card border-0 shadow-sm card-hover card-hover-glow h-100 rounded-4 overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-3 bg-<?= $p[4]; ?> text-white" style="width:52px;height:52px;font-size:22px;flex-shrink:0;"><i class="bi <?= $p[2]; ?>"></i></div>
                                    <div>
                                        <h5 class="card-title text-dark fw-bold mb-0" style="font-size:16px;"><?= $p[0]; ?></h5>
                                        <span class="badge bg-<?= $p[4]; ?>-light text-<?= $p[4]; ?> border-0 mt-1" style="font-size:9px;font-weight:600;"><?= $p[3]; ?></span>
                                    </div>
                                </div>
                                <p class="card-text text-secondary mb-0" style="font-size:13.5px;line-height:1.8;"><?= $p[1]; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section id="alur" class="py-5 bg-white">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Langkah Mudah</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Alur Pendaftaran</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                    <p class="text-secondary mx-auto" style="max-width:480px;font-size:15px;">Hanya 5 langkah sederhana untuk bergabung bersama kami</p>
                </div>
                <div class="position-relative py-3" style="max-width:880px;margin:0 auto;">
                    <div class="step-line d-none d-md-block"></div>
                    <?php
                    $steps = [
                        ['Isi Formulir Online', 'Lengkapi data diri calon santri, data orang tua/wali, dan riwayat pendidikan terakhir secara lengkap dan benar.', 'bi-pencil-square'],
                        ['Transfer Biaya Pendaftaran', 'Lakukan pembayaran sesuai nominal yang ditentukan ke rekening resmi, lalu unggah bukti transfer saat mendaftar.', 'bi-credit-card'],
                        ['Verifikasi Berkas', 'Panitia PPDB akan memverifikasi seluruh berkas persyaratan dan bukti pembayaran Anda dalam 1x24 jam.', 'bi-clipboard-check'],
                        ['Tes Seleksi', 'Hadiri tes akademik, baca Al-Quran, dan wawancara sesuai jadwal yang telah ditentukan oleh panitia.', 'bi-journal-text'],
                        ['Pengumuman & Daftar Ulang', 'Cek hasil seleksi melalui akun pendaftaran. Jika diterima, segera lakukan daftar ulang sesuai batas waktu.', 'bi-check2-circle']
                    ];
                    $langkah = ['Pertama', 'Kedua', 'Ketiga', 'Keempat', 'Kelima'];
                    foreach($steps as $i => $s) {
                        $isOdd = ($i % 2 == 0);
                    ?>
                    <div class="position-relative <?= $i < 4 ? 'mb-5' : ''; ?> fade-up" style="transition-delay:<?= $i * 0.1; ?>s;">
                        <div class="step-dot d-none d-md-flex"><i class="bi <?= $s[2]; ?>"></i></div>
                        <div class="step-dot-mobile d-md-none"></div>
                        <div class="d-md-none step-line-mobile"></div>
                        <div class="card border-0 shadow-sm rounded-4 p-4 glow-border" style="<?= $isOdd ? 'width:42%;margin-left:auto;margin-right:54%;' : 'margin-left:54%;'; ?>box-shadow:0 2px 8px rgba(0,0,0,0.04) !important;">
                            <div class="d-md-none mb-2"><span class="badge bg-islamic-green text-white" style="font-size:10px;">Langkah <?= $langkah[$i]; ?></span></div>
                            <div class="d-none d-md-block"><span class="fw-bold text-gold" style="font-size:10px;text-transform:uppercase;letter-spacing:0.1em;">Langkah <?= $langkah[$i]; ?></span></div>
                            <h5 class="fw-bold text-islamic-green mt-1 mb-2" style="font-size:16px;"><?= $s[0]; ?></h5>
                            <p class="text-secondary mb-0" style="font-size:13.5px;line-height:1.75;"><?= $s[1]; ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section id="brosur" class="py-5" style="background:#F8FAFB;">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Informasi Lengkap</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Brosur Pendaftaran</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                    <p class="text-secondary mx-auto" style="max-width:480px;font-size:15px;">Unduh brosur resmi sesuai lembaga yang Anda tuju</p>
                </div>
                <?php if(mysqli_num_rows($lembaga_q) > 0) { ?>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
                    <?php while($pd = mysqli_fetch_object($lembaga_q)){ ?>
                    <div class="col fade-up">
                        <div class="card border-0 shadow-sm card-hover h-100 rounded-4 overflow-hidden">
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:300px;">
                                <img src="assets/images/lembaga/<?= htmlspecialchars($pd->br_lembaga); ?>" alt="Brosur" class="img-fluid p-3" style="max-height:100%;object-fit:contain;" onerror="this.onerror=null;this.src='https://placehold.co/280x360/F8FAFB/6B7280?text=Brosur+Belum+Ada';">
                            </div>
                            <div class="card-body p-4 text-center border-top bg-white">
                                <h5 class="card-title text-islamic-green fw-bold mb-3" style="font-size:15px;"><i class="bi bi-file-earmark-image me-2 text-gold"></i><?= htmlspecialchars(strip_tags($pd->sk_lembaga)); ?></h5>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="assets/images/lembaga/<?= htmlspecialchars($pd->br_lembaga); ?>" target="_blank" class="btn btn-islamic btn-sm d-inline-flex align-items-center gap-1 px-3 py-2" style="font-size:12px;"><i class="bi bi-download"></i> Download</a>
                                    <a href="assets/images/lembaga/<?= htmlspecialchars($pd->br_lembaga); ?>" target="_blank" class="btn btn-outline-custom btn-sm d-inline-flex align-items-center gap-1 px-3 py-2" style="font-size:12px;"><i class="bi bi-zoom-in"></i> Perbesar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } else { ?>
                <div class="text-center py-5 fade-up">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light" style="width:80px;height:80px;"><i class="bi bi-inbox text-muted" style="font-size:36px;"></i></div>
                    <p class="text-muted mt-3 mb-0" style="font-size:15px;">Brosur belum tersedia saat ini.</p>
                </div>
                <?php } ?>
            </div>
        </section>

        <section id="galeri" class="py-5 bg-white">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Galeri</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Galeri Kegiatan</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                    <p class="text-secondary mx-auto" style="max-width:480px;font-size:15px;">Momen-momen berkesan dari berbagai kegiatan santri di pondok pesantren kami</p>
                </div>
                <div class="row g-3">
                    <?php
                    $galleryItems = [
                        ['Kegiatan Belajar Mengajar', '250px', 'col-lg-8'],
                        ['Tahfidz Al-Quran', '250px', 'col-lg-4'],
                        ['Lomba Tahfidz Antar Kelas', '200px', 'col-lg-4'],
                        ['Upacara Hari Santri Nasional', '280px', 'col-lg-8'],
                        ['Kegiatan Pramuka Santri', '250px', 'col-lg-6'],
                        ['Wisuda Tahfidz 30 Juz', '250px', 'col-lg-6']
                    ];
                    foreach($galleryItems as $i => $gi) { ?>
                    <div class="col-md-6 <?= $gi[2]; ?> zoom-in" style="transition-delay:<?= $i * 0.06; ?>s;">
                        <div class="gallery-item" style="height:<?= $gi[1]; ?>;">
                            <img src="assets/landing/assets/img/hero-img2.png" alt="<?= $gi[0]; ?>" onerror="this.onerror=null;this.src='https://placehold.co/600x300/EEFBF4/0F4C3A?text=<?= urlencode($gi[0]); ?>';">
                            <div class="gallery-overlay">
                                <div>
                                    <div class="text-white fw-bold" style="font-size:14px;"><?= $gi[0]; ?></div>
                                    <div class="text-white-50" style="font-size:11px;"><i class="bi bi-camera me-1"></i>Dokumentasi Kegiatan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section id="syarat" class="py-5" style="background:#F8FAFB;">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Persyaratan</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Syarat Pendaftaran</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                    <p class="text-secondary mx-auto" style="max-width:480px;font-size:15px;">Persiapkan dokumen berikut sebelum melakukan pendaftaran online</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6 fade-left">
                        <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                            <div class="card-header bg-islamic-green text-white border-0 py-3 px-4">
                                <h5 class="mb-0 fw-bold" style="font-size:15px;"><i class="bi bi-file-earmark-person me-2"></i>Dokumen Wajib</h5>
                            </div>
                            <div class="card-body p-4">
                                <?php
                                $dokumen = [
                                    ['Fotokopi Akta Kelahiran', '1 lembar'],
                                    ['Fotokopi Kartu Keluarga (KK)', '1 lembar'],
                                    ['Fotokopi Ijazah / SKL', '1 lembar'],
                                    ['Surat Keterangan Sehat', 'dari dokter'],
                                    ['Pas Foto Berwarna 3x4', '4 lembar'],
                                    ['Fotokopi KTP Orang Tua', '1 lembar'],
                                    ['Surat Keterangan Mengaji', 'dari ustadz/ustadzah']
                                ];
                                foreach($dokumen as $d) { ?>
                                <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success flex-shrink-0" style="width:26px;height:26px;font-size:12px;"><i class="bi bi-check2"></i></div>
                                        <span class="fw-medium" style="font-size:13.5px;color:#374151;"><?= $d[0]; ?></span>
                                    </div>
                                    <span class="badge bg-light text-muted border" style="font-size:9px;"><?= $d[1]; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 fade-right">
                        <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                            <div class="card-header bg-gold text-white border-0 py-3 px-4">
                                <h5 class="mb-0 fw-bold" style="font-size:15px;"><i class="bi bi-card-checklist me-2"></i>Ketentuan Umum</h5>
                            </div>
                            <div class="card-body p-4">
                                <?php
                                $ketentuan = [
                                    ['Lulusan MI/SD/MTs/SMP atau sederajat', 'Wajib'],
                                    ['Berprestasi akademik/non-akademik', 'Diutamakan'],
                                    ['Bersedia tinggal di asrama (mukim)', 'Wajib'],
                                    ['Tidak merokok & bebas kebiasaan buruk', 'Wajib'],
                                    ['Izin penuh dari orang tua/wali', 'Wajib'],
                                    ['Mengikuti seluruh rangkaian tes', 'Wajib'],
                                    ['Sehat jasmani dan rohani', 'Wajib']
                                ];
                                foreach($ketentuan as $k) { ?>
                                <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10 text-warning flex-shrink-0" style="width:26px;height:26px;font-size:12px;"><i class="bi bi-check2"></i></div>
                                        <span class="fw-medium" style="font-size:13.5px;color:#374151;"><?= $k[0]; ?></span>
                                    </div>
                                    <span class="badge bg-light text-muted border" style="font-size:9px;"><?= $k[1]; ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4 fade-up">
                    <div class="alert bg-islamic-green-light border-0 rounded-3 d-inline-flex align-items-center gap-2 px-4 py-3" style="max-width:600px;">
                        <i class="bi bi-info-circle-fill text-islamic-green" style="font-size:20px;"></i>
                        <span class="text-start" style="font-size:13px;color:#374151;">Seluruh dokumen diunggah dalam format <strong>JPG/PNG/PDF</strong> dengan ukuran maksimal <strong>2MB</strong> per file.</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="rekening" class="py-5 bg-white">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Pembayaran</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Rekening Bank Resmi</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7 fade-up">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <div class="card-body p-5 text-center">
                                <?php
                                $bank = strip_tags($pdb->nr_pdf);
                                if ($bank == 'BANK MANDIRI') { ?>
                                <div class="mb-3"><img src="assets/landing/assets/img/mandiri.png" alt="Mandiri" style="max-height:50px;"></div>
                                <?php } else if ($bank == 'BANK BRI') { ?>
                                <div class="mb-3"><img src="assets/landing/assets/img/bri.png" alt="BRI" style="max-height:50px;"></div>
                                <?php } else { ?>
                                <div class="mb-3"><i class="bi bi-credit-card-2-front-fill text-islamic-green" style="font-size:48px;"></i></div>
                                <?php } ?>
                                <div class="text-muted fw-semibold" style="font-size:13px;"><?= htmlspecialchars($bank); ?></div>
                                <div class="fw-bold my-4 text-islamic-green rounded-3 p-3 bg-light border" style="font-size:28px;letter-spacing:3px;border-style:dashed !important;" id="rekeningNumber"><?= htmlspecialchars(strip_tags($pdb->rk_pdf)); ?></div>
                                <div class="text-secondary" style="font-size:14px;">a.n. <strong class="text-dark"><?= htmlspecialchars(strip_tags($pdb->ar_pdf)); ?></strong></div>
                                <div class="mt-3"><button class="btn btn-islamic btn-sm px-4" onclick="copyRekening('<?= htmlspecialchars(strip_tags($pdb->rk_pdf)); ?>')"><i class="bi bi-clipboard me-1"></i> Salin Nomor Rekening</button></div>
                                <hr class="my-4">
                                <div class="alert alert-warning border-0 rounded-3 mb-0 py-2 px-3"><i class="bi bi-exclamation-triangle-fill me-2"></i><small class="fw-medium">Hanya transfer ke rekening resmi di atas. Waspadai penipuan!</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="perbandingan" class="py-5" style="background:#F8FAFB;">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Perbandingan</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Keunggulan Kami vs Lainnya</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                </div>
                <div class="row justify-content-center fade-up">
                    <div class="col-lg-10 overflow-hidden rounded-4 shadow-sm">
                        <div class="table-responsive">
                            <table class="table compare-table mb-0">
                                <thead>
                                    <tr>
                                        <th style="width:40%;border-radius:16px 0 0 0;">Fitur & Layanan</th>
                                        <th class="text-center" style="background:#0F4C3A;"><i class="bi bi-star-fill text-gold me-1"></i>Pondok Kami</th>
                                        <th class="text-center" style="border-radius:0 16px 0 0;background:#6B7280;">Pesantren Lain</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $compare = [
                                        ['Kurikulum Terpadu Nasional & Pesantren', true, false],
                                        ['Program Tahfidz 30 Juz + Sanad', true, false],
                                        ['Asrama Modern dengan Fasilitas Lengkap', true, null],
                                        ['Bahasa Arab & Inggris Aktif', true, false],
                                        ['Life Skill & Literasi Digital', true, false],
                                        ['Organisasi & Kepemimpinan Santri', true, null],
                                        ['Beasiswa Prestasi', true, null],
                                        ['Pendaftaran Online 24 Jam', true, false],
                                        ['Monitoring Orang Tua via Sistem', true, false],
                                        ['Ekstrakurikuler Berprestasi Nasional', true, null],
                                        ['Ustadz Bersertifikat Pengajar', true, null],
                                        ['Lingkungan Asrama Islami & Kondusif', true, null]
                                    ];
                                    $iy = '<i class="bi bi-check-circle-fill text-success" style="font-size:20px;"></i>';
                                    $in = '<i class="bi bi-x-circle-fill text-danger" style="font-size:20px;"></i>';
                                    $im = '<i class="bi bi-dash-circle text-muted" style="font-size:20px;"></i>';
                                    foreach($compare as $c) {
                                        $v1 = $c[1]===true?$iy:($c[1]===false?$in:$im);
                                        $v2 = $c[2]===true?$iy:($c[2]===false?$in:$im);
                                    ?>
                                    <tr><td class="fw-medium"><?= $c[0]; ?></td><td class="text-center"><?= $v1; ?></td><td class="text-center"><?= $v2; ?></td></tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="prestasi" class="py-5 bg-white">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Prestasi</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Prestasi Unggulan</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                    <p class="text-secondary mx-auto" style="max-width:480px;font-size:15px;">Deretan prestasi membanggakan yang diraih oleh santri-santri terbaik kami</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="position-relative px-5 px-md-3 fade-up">
                            <div class="prestasi-line d-none d-md-block"></div>
                            <?php
                            $prestasiList = [
                                ['Juara 1 MTQ Nasional — Cabang Tilawatil Quran', '2024', 'bi-trophy-fill', 'warning'],
                                ['Juara 2 Olimpiade Sains Tingkat Provinsi', '2024', 'bi-award-fill', 'success'],
                                ['Juara 1 Lomba Kaligrafi Tingkat Regional', '2023', 'bi-palette-fill', 'info'],
                                ['Santri Berprestasi Nasional — Kemendikbud RI', '2023', 'bi-star-fill', 'danger'],
                                ['Juara 1 Cerdas Cermat Islam Tingkat Kabupaten', '2023', 'bi-lightbulb-fill', 'primary'],
                                ['Juara 3 Lomba Pidato Bahasa Arab Tingkat Provinsi', '2022', 'bi-mic-fill', 'warning'],
                                ['Penghargaan Pesantren Ramah Anak — Kemenag RI', '2022', 'bi-shield-check', 'success']
                            ];
                            foreach($prestasiList as $i => $pr) { ?>
                            <div class="position-relative d-flex align-items-start gap-4 mb-4">
                                <div class="prestasi-dot d-none d-md-block"></div>
                                <div class="d-none d-md-block" style="width:56px;flex-shrink:0;"></div>
                                <div class="card border-0 shadow-sm rounded-3 p-3 w-100 card-hover">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="d-flex align-items-center justify-content-center rounded-2 bg-<?= $pr[3]; ?> bg-opacity-10 text-<?= $pr[3]; ?> flex-shrink-0" style="width:42px;height:42px;font-size:18px;"><i class="bi <?= $pr[2]; ?>"></i></div>
                                        <div class="flex-grow-1">
                                            <div class="fw-bold text-dark" style="font-size:14px;"><?= $pr[0]; ?></div>
                                            <span class="badge bg-<?= $pr[3]; ?>-light text-<?= $pr[3]; ?> border-0 mt-1" style="font-size:9px;font-weight:600;"><i class="bi bi-calendar3 me-1"></i><?= $pr[1]; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="faq" class="py-5" style="background:#F8FAFB;">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">FAQ</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Pertanyaan yang Sering Diajukan</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="accordion" id="accordionFaq">
                            <?php
                            $faqs = [
                                ['q'=>'Kapan batas akhir pendaftaran santri baru?','a'=>'Pendaftaran dibuka mulai bulan Maret dan ditutup pada bulan Juni setiap tahunnya. Namun dapat ditutup lebih awal jika kuota sudah terpenuhi.','show'=>true],
                                ['q'=>'Apakah bisa mendaftar jika ijazah belum keluar?','a'=>'Bisa. Cukup melampirkan <strong>Surat Keterangan Lulus (SKL)</strong> atau rapor semester terakhir. Ijazah asli dilengkapi saat daftar ulang.','show'=>false],
                                ['q'=>'Apakah santri boleh membawa kendaraan pribadi?','a'=>'Diperbolehkan dengan ketentuan: memiliki SIM C berlaku, surat izin dari orang tua/wali, dan kendaraan wajib didaftarkan ke keamanan pondok.','show'=>false],
                                ['q'=>'Apakah tersedia program beasiswa?','a'=>'Tentu. Kami menyediakan <strong>beasiswa penuh</strong> dan <strong>potongan biaya</strong> bagi santri berprestasi akademik, hafalan Al-Quran minimal 5 juz, atau juara tingkat kabupaten/nasional.','show'=>false],
                                ['q'=>'Bagaimana sistem pembelajaran di pesantren ini?','a'=>'Kami menggunakan <strong>sistem klasikal terpadu</strong> — kurikulum nasional di pagi hari, kurikulum pesantren (kitab kuning, tahfidz, bahasa Arab) di sore dan malam hari.','show'=>false],
                                ['q'=>'Bagaimana sistem kunjungan orang tua/wali?','a'=>'Kunjungan rutin diadakan setiap dua minggu sekali pada hari Sabtu-Ahad. Di luar jadwal, orang tua dapat menghubungi panitia untuk keperluan darurat.','show'=>false],
                                ['q'=>'Apakah ada program tahfidz untuk santri baru?','a'=>'Ya, seluruh santri baru wajib mengikuti program tahfidz. Bagi yang sudah memiliki hafalan, akan dilakukan tes penempatan level.','show'=>false],
                                ['q'=>'Bagaimana sistem keamanan di pondok?','a'=>'Pondok dilengkapi dengan <strong>CCTV 24 jam</strong>, petugas keamanan yang berjaga shift, gerbang keluar-masuk yang terkontrol.','show'=>false],
                                ['q'=>'Apakah ada klinik atau fasilitas kesehatan?','a'=>'Ya, tersedia klinik kesehatan dengan perawat yang bertugas 24 jam. Untuk kasus yang memerlukan penanganan lebih lanjut, santri akan dirujuk ke rumah sakit terdekat.','show'=>false],
                                ['q'=>'Bagaimana jika santri ingin pindah di tengah jalan?','a'=>'Orang tua/wali dapat mengajukan permohonan penarikan santri secara tertulis. Biaya yang sudah dibayarkan tidak dapat dikembalikan.','show'=>false]
                            ];
                            $faqId = ['f1','f2','f3','f4','f5','f6','f7','f8','f9','f10'];
                            foreach($faqs as $i => $faq) { ?>
                            <div class="accordion-item border rounded-3 mb-3 shadow-sm" style="border-color:#e9ecef !important;">
                                <h2 class="accordion-header">
                                    <button class="accordion-button <?= $faq['show'] ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $faqId[$i]; ?>"><i class="bi bi-question-circle-fill text-gold me-2" style="flex-shrink:0;"></i><?= $faq['q']; ?></button>
                                </h2>
                                <div id="<?= $faqId[$i]; ?>" class="accordion-collapse collapse <?= $faq['show'] ? 'show' : '' ?>" data-bs-parent="#accordionFaq">
                                    <div class="accordion-body" style="padding-left:48px;color:#4A4A5A;font-size:13.5px;line-height:1.85;"><?= $faq['a']; ?></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimoni" class="py-5 bg-white">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Testimoni</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Kata Mereka Tentang Kami</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                </div>
                <div class="row g-4">
                    <?php
                    $testimonis = [
                        ['Ustadz Ahmad Fauzi','Wali Santri 2023','Alhamdulillah, anak saya sangat betah belajar di sini. Perubahan akhlak dan kemandiriannya sangat terasa. Terima kasih kepada para ustadz dan ustadzah.'],
                        ['Hj. Siti Aminah','Wali Santri 2022','Awalnya ragu menitipkan anak di pesantren, tapi setelah melihat perkembangan hafalan Al-Quran anak saya yang luar biasa, saya yakin ini keputusan terbaik.'],
                        ['Muhammad Rizki','Alumni 2021 — Mahasiswa UGM','Pondok ini menjadi fondasi terbaik bagi saya. Ilmu agama yang kuat ditambah wawasan luas membuat saya mampu bersaing di perguruan tinggi negeri.'],
                        ['Ustadzah Nur Halimah','Guru Tahfidz','Melihat santri-santri semangat menghafal Al-Quran setiap hari adalah kebahagiaan tersendiri. Lingkungan yang Islami dan kondusif sangat mendukung.'],
                        ['H. Abdul Karim','Wali Santri 2024','Sistem pendaftaran online-nya sangat memudahkan. Tidak perlu datang jauh-jauh hanya untuk mendaftar. Informasi juga selalu update melalui website dan WhatsApp.'],
                        ['Fatimah Az-Zahra','Alumni 2020 — Dokter','Ilmu agama yang saya dapatkan di pondok ini menjadi pegangan hidup saya. Sekarang saya menjadi dokter yang tetap menjaga shalat berjamaah dan hafalan Al-Quran saya.']
                    ];
                    $ac = ['bg-islamic-green','bg-gold','bg-primary','bg-success','bg-warning','bg-info'];
                    foreach($testimonis as $i => $t) { ?>
                    <div class="col-md-6 col-lg-4 fade-up" style="transition-delay:<?= $i * 0.08; ?>s;">
                        <div class="card border-0 shadow-sm card-hover h-100 rounded-4 testimonial-card">
                            <div class="card-body p-4">
                                <div class="d-flex gap-1 mb-3"><?php for($s=0;$s<5;$s++){ ?><i class="bi bi-star-fill text-gold" style="font-size:14px;"></i><?php } ?></div>
                                <p class="text-secondary mb-4" style="font-size:13px;line-height:1.85;">"<?= $t[2]; ?>"</p>
                                <div class="d-flex align-items-center gap-3 border-top pt-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle <?= $ac[$i]; ?> text-white flex-shrink-0" style="width:42px;height:42px;font-size:16px;font-weight:700;"><?= mb_substr($t[0],0,1); ?></div>
                                    <div><div class="fw-bold text-dark" style="font-size:13px;"><?= $t[0]; ?></div><div class="text-muted" style="font-size:11px;"><?= $t[1]; ?></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="py-5 bg-islamic-green position-relative overflow-hidden">
            <div class="position-absolute top-0 start-0 w-100 h-100 opacity-5" style="background-image:url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2240%22 height=%2240%22%3E%3Cpath d=%22M20 20.5V18H0v-2h20v-2l2 3.25-2 3.25z%22 fill=%22%23fff%22 fill-opacity=%220.4%22 fill-rule=%22evenodd%22/%3E%3C/svg%3E');"></div>
            <div class="container text-center text-white position-relative" style="z-index:2;">
                <div class="font-amiri mb-3" style="font-size:clamp(20px,3.5vw,34px);opacity:0.9;">مَنْ سَلَكَ طَرِيقًا يَلْتَمِسُ فِيهِ عِلْمًا سَهَّلَ اللَّهُ لَهُ طَرِيقًا إِلَى الْجَنَّةِ</div>
                <div class="text-white-50 mb-4" style="font-size:14px;">HR. Muslim — "Barangsiapa menempuh suatu jalan untuk menuntut ilmu, maka Allah memudahkan baginya jalan menuju surga."</div>
                <div class="islamic-divider mb-4"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                <p class="mb-0 fw-medium" style="opacity:0.7;font-size:15px;">Mari bersama menempuh jalan ilmu menuju keberkahan dunia dan akhirat.</p>
            </div>
        </section>

        <section id="tips" class="py-5" style="background:#F8FAFB;">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Tips & Panduan</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Tips Persiapan Santri Baru</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                    <p class="text-secondary mx-auto" style="max-width:520px;font-size:15px;">Panduan penting bagi calon santri dan orang tua agar proses pendaftaran dan adaptasi berjalan lancar</p>
                </div>
                <div class="row g-4">
                    <?php
                    $tips = [
                        ['Persiapkan Dokumen Sejak Dini','Kumpulkan seluruh dokumen persyaratan minimal seminggu sebelum pendaftaran dibuka agar tidak terburu-buru dan ada waktu untuk memperbaiki jika ada kekurangan.','bi-file-earmark-check','success'],
                        ['Latih Baca Al-Quran Setiap Hari','Biasakan calon santri membaca Al-Quran minimal 1 halaman per hari dengan tajwid yang benar. Ini akan sangat membantu saat tes baca Al-Quran.','bi-journal-bookmark-fill','gold'],
                        ['Bekali Mental & Kemandirian','Ajak anak untuk mulai belajar mandiri: mencuci pakaian, merapikan tempat tidur, dan mengatur waktu sendiri. Ini akan memudahkan adaptasi di asrama.','bi-heart-pulse','danger'],
                        ['Kenalkan Lingkungan Pesantren','Jika memungkinkan, kunjungi pondok pesantren terlebih dahulu agar calon santri tidak merasa asing saat hari pertama masuk.','bi-geo-alt','primary'],
                        ['Siapkan Kebutuhan Santri','Persiapkan perlengkapan santri sesuai daftar yang disediakan panitia: pakaian, perlengkapan mandi, alat tulis, dan kitab yang dibutuhkan.','bi-bag-check','info'],
                        ['Doa & Niat yang Ikhlas','Tanamkan pada santri bahwa niat belajar di pesantren adalah karena Allah SWT. Doakan anak agar diberikan kemudahan dan keberkahan.','bi-moon-stars','warning']
                    ];
                    foreach($tips as $i => $tp) { ?>
                    <div class="col-md-6 col-lg-4 fade-up" style="transition-delay:<?= $i * 0.08; ?>s;">
                        <div class="card border-0 shadow-sm card-hover h-100 rounded-4">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-3 bg-<?= $tp[3]; ?> text-white flex-shrink-0" style="width:48px;height:48px;font-size:20px;"><i class="bi <?= $tp[2]; ?>"></i></div>
                                    <h5 class="card-title text-dark fw-bold mb-0" style="font-size:15px;"><?= $tp[0]; ?></h5>
                                </div>
                                <p class="text-secondary mb-0" style="font-size:13px;line-height:1.8;"><?= $tp[1]; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section id="lokasi" class="py-5 bg-white">
            <div class="container py-4">
                <div class="text-center mb-5 fade-up">
                    <p class="section-label mb-2">Lokasi</p>
                    <h2 class="section-title" style="font-size:clamp(26px,4vw,40px);">Lokasi Pondok Pesantren</h2>
                    <div class="islamic-divider my-3"><i class="bi bi-star-fill text-gold" style="font-size:10px;"></i></div>
                    <p class="text-secondary mx-auto" style="max-width:520px;font-size:15px;"><?= htmlspecialchars(strip_tags($pdb->a1_pdf)); ?></p>
                </div>
                <div class="row justify-content-center fade-up">
                    <div class="col-lg-10">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                            <div class="p-2"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3080.2617361750777!2d112.61867097367858!3d-7.473929092537809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e1d512e0e7f3%3A0x9fd7f1b1a3864702!2sPondok%20Pesantren%20Darul%20Ulum%20Tlasih%20Tulangan!5e1!3m2!1sid!2sid!4v1777276968790!5m2!1sid!2sid" width="100%" height="400" style="border:0;border-radius:12px;" allowfullscreen="" loading="lazy" title="Lokasi Pondok Pesantren"></iframe></div>
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-flex align-items-center justify-content-center rounded-2 bg-islamic-green-light text-islamic-green" style="width:36px;height:36px;"><i class="bi bi-geo-alt-fill"></i></div>
                                            <div><div class="text-muted" style="font-size:10px;">Alamat</div><div class="fw-medium text-dark" style="font-size:12px;"><?= htmlspecialchars(strip_tags($pdb->a1_pdf)); ?></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-flex align-items-center justify-content-center rounded-2 bg-gold-light text-gold" style="width:36px;height:36px;"><i class="bi bi-telephone-fill"></i></div>
                                            <div><div class="text-muted" style="font-size:10px;">Telepon</div><div class="fw-medium text-dark" style="font-size:12px;"><?= htmlspecialchars(strip_tags($pdb->k1_pdf)); ?></div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-flex align-items-center justify-content-center rounded-2 bg-success bg-opacity-10 text-success" style="width:36px;height:36px;"><i class="bi bi-whatsapp"></i></div>
                                            <div><div class="text-muted" style="font-size:10px;">WhatsApp</div><div class="fw-medium text-dark" style="font-size:12px;"><?= htmlspecialchars(strip_tags($pdb->wa_pdf)); ?></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5" style="background:linear-gradient(135deg,#F8FAFB 0%,#EEFBF4 50%,#FFF9EB 100%);">
            <div class="container py-4">
                <div class="card border-0 shadow-lg rounded-5 overflow-hidden fade-up">
                    <div class="row g-0 align-items-center">
                        <div class="col-lg-7 p-5">
                            <p class="section-label mb-2">Ayo Bergabung!</p>
                            <h3 class="font-playfair text-islamic-green fw-bold mb-3" style="font-size:clamp(24px,4vw,36px);">Jangan Lewatkan Kesempatan Ini!</h3>
                            <p class="text-secondary mb-4" style="font-size:15px;max-width:480px;line-height:1.85;">Pendaftaran Tahun Ajaran <strong><?= htmlspecialchars(strip_tags($pdb->th_pdf)); ?></strong> sudah dibuka. Kuota terbatas!</p>
                            <div class="d-flex flex-wrap gap-3">
                                <a href="<?= $linkDaftar; ?>" class="btn btn-islamic d-inline-flex align-items-center gap-2 px-5"><i class="bi bi-pencil-square"></i> Daftar Sekarang</a>
                                <a href="https://api.whatsapp.com/send?phone=<?= htmlspecialchars($pdb->wa_pdf); ?>&text=Assalamu'alaikum,%20saya%20ingin%20bertanya%20tentang%20PSB" target="_blank" class="btn btn-outline-custom d-inline-flex align-items-center gap-2"><i class="bi bi-whatsapp text-success"></i> Tanya via WA</a>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="h-100 bg-islamic-green-light d-flex align-items-center justify-content-center p-5" style="min-height:320px;">
                                <div class="text-center">
                                    <div class="font-amiri text-islamic-green opacity-20 mb-2" style="font-size:28px;">فَإِنَّ مَعَ الْعُسْرِ يُسْرًا</div>
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-islamic-green text-white mx-auto mb-3" style="width:80px;height:80px;font-size:36px;"><i class="bi bi-mortarboard-fill"></i></div>
                                    <div class="fw-bold text-islamic-green" style="font-size:18px;">TA <?= htmlspecialchars(strip_tags($pdb->th_pdf)); ?></div>
                                    <div class="text-muted" style="font-size:13px;">Pendaftaran Dibuka</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php if ($buka_notif == 'buka') {
        $sifat = strip_tags($tnd->sf_nd);
        if ($sifat == 'Sangat Penting') { $bgClass = 'bg-danger'; $textClass = 'text-white'; $badgeClass = 'bg-danger'; $closeWhite = 'btn-close-white'; }
        elseif ($sifat == 'Penting') { $bgClass = 'bg-warning'; $textClass = 'text-dark'; $badgeClass = 'bg-warning text-dark'; $closeWhite = ''; }
        else { $bgClass = 'bg-info'; $textClass = 'text-dark'; $badgeClass = 'bg-info text-dark'; $closeWhite = ''; }
    ?>
    <div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">
                <div class="modal-header <?= $bgClass; ?> <?= $textClass; ?> border-0 py-3 px-4">
                    <div class="d-flex align-items-center gap-2"><i class="bi bi-bell-fill" style="font-size:20px;"></i><h6 class="modal-title fw-bold mb-0"><?= strip_tags($tnd->jd_nd); ?></h6></div>
                    <button type="button" class="btn-close <?= $closeWhite ?>" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                        <span class="badge <?= $badgeClass; ?>" style="font-size:10px;font-weight:600;"><i class="bi bi-tag-fill me-1"></i><?= $sifat; ?></span>
                        <span class="text-muted" style="font-size:12px;"><i class="bi bi-calendar3 me-1"></i><?= tgl_indo(strip_tags($tnd->tg_nd)); ?></span>
                    </div>
                    <hr class="my-2">
                    <p class="mb-3" style="font-size:14.5px;line-height:1.85;color:#374151;"><?= nl2br(strip_tags($tnd->ct_nd)); ?></p>
                    <div class="alert bg-light border-0 rounded-3 d-flex align-items-center gap-2 mb-0 py-2 px-3"><i class="bi bi-person-badge text-islamic-green" style="font-size:16px;"></i><span class="small text-muted">Diterbitkan oleh: <strong class="text-dark"><?= strip_tags($tnd->at_nd); ?></strong></span></div>
                </div>
                <div class="modal-footer border-0 pt-0 px-4 pb-4"><button type="button" class="btn btn-secondary rounded-3 px-4 py-2" data-bs-dismiss="modal" style="font-size:13px;">Tutup</button></div>
            </div>
        </div>
    </div>
    <?php } ?>

    <footer id="footer" class="bg-dark text-white">
        <div class="py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="d-flex align-items-center justify-content-center rounded-3 bg-islamic-green" style="width:44px;height:44px;flex-shrink:0;"><img src="assets/dist/img/icon.png" alt="Logo" style="width:28px;height:28px;object-fit:contain;"></div>
                            <div><div class="fw-bold lh-1" style="font-size:15px;"><?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?></div><div class="text-gold lh-1" style="font-size:9px;text-transform:uppercase;letter-spacing:0.12em;">Penerimaan Santri Baru</div></div>
                        </div>
                        <p class="text-white-50 mb-3" style="font-size:13px;line-height:1.8;">Mencetak generasi berilmu, berakhlak mulia dan berwawasan global melalui pendidikan terpadu pesantren dan pemerintah.</p>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="<?= htmlspecialchars($pdb->fb_pdf); ?>" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px;" title="Facebook"><i class="bi bi-facebook"></i></a>
                            <a href="<?= htmlspecialchars($pdb->ig_pdf); ?>" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px;" title="Instagram"><i class="bi bi-instagram"></i></a>
                            <a href="<?= htmlspecialchars($pdb->yt_pdf); ?>" target="_blank" class="btn btn-sm btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px;" title="YouTube"><i class="bi bi-youtube"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=<?= htmlspecialchars($pdb->wa_pdf); ?>" target="_blank" class="btn btn-sm btn-outline-success rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px;" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <h6 class="fw-bold mb-3 text-gold" style="font-size:14px;">Navigasi</h6>
                        <ul class="list-unstyled" style="font-size:13px;">
                            <li class="mb-2"><a href="#hero" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1 text-gold" style="font-size:10px;"></i>Beranda</a></li>
                            <li class="mb-2"><a href="#about" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1 text-gold" style="font-size:10px;"></i>Tentang</a></li>
                            <li class="mb-2"><a href="#program" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1 text-gold" style="font-size:10px;"></i>Program</a></li>
                            <li class="mb-2"><a href="#alur" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1 text-gold" style="font-size:10px;"></i>Alur</a></li>
                            <li class="mb-2"><a href="#galeri" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1 text-gold" style="font-size:10px;"></i>Galeri</a></li>
                            <li class="mb-2"><a href="#faq" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1 text-gold" style="font-size:10px;"></i>FAQ</a></li>
                            <li class="mb-2"><a href="prosedur" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right me-1 text-gold" style="font-size:10px;"></i>Prosedur</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h6 class="fw-bold mb-3 text-gold" style="font-size:14px;">Kontak Panitia</h6>
                        <div class="d-flex align-items-start gap-2 mb-2"><i class="bi bi-person-circle text-gold mt-1" style="font-size:16px;"></i><div><div class="fw-semibold text-white" style="font-size:13px;"><?= htmlspecialchars(strip_tags($pdb->n1_pdf)); ?></div><a href="tel:<?= htmlspecialchars(strip_tags($pdb->k1_pdf)); ?>" class="text-white-50 text-decoration-none" style="font-size:12px;"><i class="bi bi-telephone me-1"></i><?= htmlspecialchars(strip_tags($pdb->k1_pdf)); ?></a></div></div>
                        <div class="d-flex align-items-start gap-2"><i class="bi bi-person-circle text-gold mt-1" style="font-size:16px;"></i><div><div class="fw-semibold text-white" style="font-size:13px;"><?= htmlspecialchars(strip_tags($pdb->n2_pdf)); ?></div><a href="tel:<?= htmlspecialchars(strip_tags($pdb->k2_pdf)); ?>" class="text-white-50 text-decoration-none" style="font-size:12px;"><i class="bi bi-telephone me-1"></i><?= htmlspecialchars(strip_tags($pdb->k2_pdf)); ?></a></div></div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h6 class="fw-bold mb-3 text-gold" style="font-size:14px;">Sekretariat</h6>
                        <div class="d-flex align-items-start gap-2 mb-3"><i class="bi bi-geo-alt-fill text-gold mt-1" style="font-size:16px;"></i><span class="text-white-50" style="font-size:12px;line-height:1.7;"><?= htmlspecialchars(strip_tags($pdb->a1_pdf)); ?></span></div>
                        <a href="https://api.whatsapp.com/send?phone=<?= htmlspecialchars($pdb->wa_pdf); ?>" target="_blank" class="btn btn-success d-inline-flex align-items-center gap-2 rounded-3 w-100 justify-content-center" style="font-size:13px;font-weight:600;"><i class="bi bi-whatsapp" style="font-size:18px;"></i> Hubungi via WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-top border-secondary py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start"><span class="text-white-50" style="font-size:12px;">&copy; <?= date('Y'); ?> <strong class="text-danger">DigitalNode ID</strong>. All rights reserved.</span></div>
                    <div class="col-md-6 text-center text-md-end mt-2 mt-md-0"><span class="text-white fw-bold" style="font-size:12px;">PSB Darul Ulum Tlasih</span><span class="badge bg-danger ms-1" style="font-size:9px;vertical-align:middle;">v3.0</span></div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" id="backToTop" class="btn btn-islamic rounded-3 position-fixed d-flex align-items-center justify-content-center shadow-lg" aria-label="Kembali ke atas"><i class="bi bi-arrow-up"></i></a>
    <a href="https://api.whatsapp.com/send?phone=<?= htmlspecialchars($pdb->wa_pdf); ?>&text=Assalamu'alaikum,%20saya%20ingin%20bertanya%20tentang%20PSB" target="_blank" class="floating-wa btn btn-success rounded-circle shadow-lg d-flex align-items-center justify-content-center" style="width:56px;height:56px;font-size:26px;" title="Chat WhatsApp" aria-label="Chat WhatsApp"><i class="bi bi-whatsapp"></i></a>

    <div id="cookieBanner" class="position-fixed bottom-0 start-0 w-100 bg-white border-top shadow-lg py-3 px-4" style="z-index:1040;">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-islamic-green-light text-islamic-green flex-shrink-0" style="width:40px;height:40px;"><i class="bi bi-shield-check" style="font-size:18px;"></i></div>
                    <div><div class="fw-bold text-dark" style="font-size:13px;">Website ini menggunakan cookies</div><div class="text-muted" style="font-size:12px;">Kami menggunakan cookies untuk meningkatkan pengalaman Anda.</div></div>
                </div>
                <div class="d-flex gap-2 flex-shrink-0">
                    <button class="btn btn-outline-custom btn-sm px-3 py-2" style="font-size:12px;" onclick="dismissCookie()">Tolak</button>
                    <button class="btn btn-islamic btn-sm px-4 py-2" style="font-size:12px;" onclick="acceptCookie()">Terima Semua</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){
        var preloader=document.getElementById('preloader'),preloaderBar=document.getElementById('preloaderBar'),preloaderText=document.getElementById('preloaderText');
        var ls=[{p:20,t:'Memuat komponen...'},{p:45,t:'Mempersiapkan konten...'},{p:70,t:'Memuat data...'},{p:90,t:'Hampir selesai...'},{p:100,t:'Siap!'}],si=0;
        function rp(){if(si<ls.length){preloaderBar.style.width=ls[si].p+'%';preloaderText.textContent=ls[si].t;si++;setTimeout(rp,300);}else{setTimeout(function(){if(preloader)preloader.classList.add('hidden-preloader');},200);setTimeout(function(){if(preloader&&preloader.parentNode)preloader.parentNode.removeChild(preloader);},900);}}
        rp();
        var ht='<?= addslashes(strip_tags($pdb->lb_pdf)); ?>',he=document.getElementById('heroTyping'),ci=0;
        function th(){if(ci<ht.length){he.textContent+=ht.charAt(ci);ci++;setTimeout(th,60);}}setTimeout(th,1200);
        <?php if($buka_notif=='buka'):?>setTimeout(function(){var m=document.getElementById('myModal');if(m)new bootstrap.Modal(m,{backdrop:true,keyboard:true,focus:true}).show();},1500);<?php endif;?>
        function updateCountdown(){var now=new Date(),year=now.getFullYear(),end=new Date(year,5,30,23,59,59);if(now>end)end=new Date(year+1,5,30,23,59,59);var diff=end-now;if(diff<0)diff=0;var d=Math.floor(diff/(1000*60*60*24)),h=Math.floor((diff%(1000*60*60*24))/(1000*60*60)),mn=Math.floor((diff%(1000*60*60))/(1000*60)),s=Math.floor((diff%(1000*60))/1000);document.getElementById('cdDays').textContent=String(d).padStart(2,'0');document.getElementById('cdHours').textContent=String(h).padStart(2,'0');document.getElementById('cdMinutes').textContent=String(mn).padStart(2,'0');document.getElementById('cdSeconds').textContent=String(s).padStart(2,'0');}
        updateCountdown();setInterval(updateCountdown,1000);
        var sp=document.getElementById('scrollProgress');
        window.addEventListener('scroll',function(){var dh=document.documentElement.scrollHeight-window.innerHeight;sp.style.width=(dh>0?(window.scrollY/dh)*100:0)+'%';});
        var ae=document.querySelectorAll('.fade-up,.fade-left,.fade-right,.scale-in,.zoom-in');
        var ob=new IntersectionObserver(function(e){e.forEach(function(en){if(en.isIntersecting){en.target.classList.add('visible');ob.unobserve(en.target);}});},{threshold:0.08,rootMargin:'0px 0px -30px 0px'});
        ae.forEach(function(el){ob.observe(el);});
        var ce=document.querySelectorAll('[data-count]');
        var co=new IntersectionObserver(function(e){e.forEach(function(en){if(en.isIntersecting){ac(en.target,parseInt(en.target.getAttribute('data-count')));co.unobserve(en.target);}});},{threshold:0.5});
        ce.forEach(function(el){co.observe(el);});
        function ac(el,tg){var d=1500,st=null;function s(ts){if(!st)st=ts;var p=Math.min((ts-st)/d,1);el.textContent=Math.floor((1-Math.pow(1-p,3))*tg);if(p<1)requestAnimationFrame(s);else el.textContent=tg;}requestAnimationFrame(s);}
        var hd=document.getElementById('header'),nav=document.getElementById('mainNav'),bt=document.getElementById('backToTop');
        window.addEventListener('scroll',function(){if(window.scrollY>60){if(nav)nav.classList.add('navbar-scrolled');bt.classList.add('show');}else{if(nav)nav.classList.remove('navbar-scrolled');bt.classList.remove('show');}});
        bt.addEventListener('click',function(e){e.preventDefault();window.scrollTo({top:0,behavior:'smooth'});});
        document.querySelectorAll('a[href^="#"]').forEach(function(a){a.addEventListener('click',function(e){var t=this.getAttribute('href');if(t&&t!=='#'&&t.length>1){var el=document.querySelector(t);if(el){e.preventDefault();window.scrollTo({top:el.getBoundingClientRect().top+window.scrollY-80,behavior:'smooth'});var nc=document.getElementById('navMain');if(nc&&nc.classList.contains('show')){var bc=bootstrap.Collapse.getInstance(nc);if(bc)bc.hide();}}}});});
        var ss=document.querySelectorAll('section[id]');
        window.addEventListener('scroll',function(){var c='';ss.forEach(function(s){if(window.scrollY>=s.offsetTop-120)c=s.getAttribute('id');});document.querySelectorAll('.nav-link-custom').forEach(function(l){l.classList.remove('active');if(l.getAttribute('href')==='#'+c)l.classList.add('active');});});
        var cb=document.getElementById('cookieBanner');
        if(!localStorage.getItem('cookieAccepted')){setTimeout(function(){cb.classList.add('show-cookie');},2000);}else{cb.style.display='none';}
    });
    function acceptCookie(){localStorage.setItem('cookieAccepted','true');var c=document.getElementById('cookieBanner');c.classList.remove('show-cookie');setTimeout(function(){c.style.display='none';},500);Swal.fire({icon:'success',title:'Terima kasih!',timer:2000,showConfirmButton:false});}
    function dismissCookie(){var c=document.getElementById('cookieBanner');c.classList.remove('show-cookie');setTimeout(function(){c.style.display='none';},500);}
    function copyRekening(no){navigator.clipboard.writeText(no).then(function(){Swal.fire({icon:'success',title:'Berhasil Disalin!',text:'Nomor rekening: '+no,timer:2500,showConfirmButton:false});}).catch(function(){var t=document.createElement('textarea');t.value=no;document.body.appendChild(t);t.select();document.execCommand('copy');document.body.removeChild(t);Swal.fire({icon:'success',title:'Berhasil Disalin!',text:'Nomor rekening: '+no,timer:2500,showConfirmButton:false});});}
    </script>

<?php
 $notifications=[
    ['session'=>'pesan_gagal_koneksi','icon'=>'error','timer'=>false],
    ['session'=>'pesan_login_gagal','icon'=>'error','timer'=>3000],
    ['session'=>'pesan_logout_sukses','icon'=>'success','timer'=>3000],
    ['session'=>'pesan_siswa_tambah','icon'=>'success','timer'=>20000,'text_session'=>'pesan_siswa_isi'],
    ['session'=>'pesan_siswa_gagal','icon'=>'error','timer'=>20000,'text_session'=>'pesan_siswa_error']
];
foreach($notifications as $notif){
    if(isset($_SESSION[$notif['session']])){
        $title=addslashes($_SESSION[$notif['session']]);
        $text=isset($notif['text_session'])&&isset($_SESSION[$notif['text_session']])?addslashes($_SESSION[$notif['text_session']]):'';
        $tj=$notif['timer']?"timer:{$notif['timer']},"  :"";
        $txj=$text?"text:'{$text}',"  :"";
        echo "<script>Swal.fire({icon:'{$notif['icon']}',title:'{$title}',{$txj}showConfirmButton:true,{$tj}})</script>";
        unset($_SESSION[$notif['session']]);
        if(isset($notif['text_session']))unset($_SESSION[$notif['text_session']]);
    }
}
?>
</body>
</html>