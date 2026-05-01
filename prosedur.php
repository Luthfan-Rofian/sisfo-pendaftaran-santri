<?php
session_start();
error_reporting(0);
include 'config/koneksi.php';

 $ppdb = mysqli_query($conn, "SELECT * FROM tb_ppdb");
 $pdb = mysqli_fetch_object($ppdb);

 $tomboladmin = mysqli_query($conn, "SELECT * FROM tb_tbladm");
 $ta = mysqli_fetch_object($tomboladmin);

 $prosedur = mysqli_query($conn, "SELECT * FROM tb_pros");
 $tpr = mysqli_fetch_object($prosedur);

if (!$pdb) {
    $pdb = new stdClass();
    $pdb->sk_pdf = 'PSB'; $pdb->wa_pdf = '628000000000';
    $pdb->fb_pdf = '#'; $pdb->ig_pdf = '#'; $pdb->yt_pdf = '#';
    $pdb->n1_pdf = '-'; $pdb->k1_pdf = '-';
}
if (!$ta) { $ta = new stdClass(); $ta->st = ''; }
if (!$tpr) { $tpr = new stdClass(); $tpr->is_pros = '<div class="text-center text-body-secondary py-5"><i class="bi bi-inbox d-block fs-1 mb-2 opacity-50"></i><p class="mb-0">Data prosedur belum tersedia.</p></div>'; }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prosedur Pendaftaran — <?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?></title>
    <meta name="description" content="Panduan lengkap prosedur pendaftaran santri baru <?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Amiri:wght@400;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Minimal CSS: hanya yang tidak ada di Bootstrap -->
    <style>
        body{font-family:'Plus Jakarta Sans',sans-serif;}
        .font-amiri{font-family:'Amiri',serif;}
        .font-playfair{font-family:'Playfair Display',serif;}
        .text-gradient{background:linear-gradient(135deg,#198754,#D4A017);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
        .bg-glass{backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);}
        .prosedur-content{font-size:15px;line-height:1.9;color:#495057;}
        .prosedur-content h1,.prosedur-content h2,.prosedur-content h3,.prosedur-content h4,.prosedur-content h5{color:#198754;font-weight:700;margin-top:1.5em;margin-bottom:.6em;}
        .prosedur-content h1{font-size:24px;}.prosedur-content h2{font-size:20px;}.prosedur-content h3{font-size:17px;}
        .prosedur-content p{margin-bottom:.8em;}.prosedur-content ul,.prosedur-content ol{padding-left:1.5em;margin-bottom:.8em;}.prosedur-content li{margin-bottom:.4em;}
        .prosedur-content img{max-width:100%;height:auto;border-radius:12px;margin:1em 0;}
        .prosedur-content a{color:#198754;font-weight:600;}.prosedur-content a:hover{color:#D4A017;}
        .prosedur-content table{width:100%;border-collapse:collapse;margin:1em 0;font-size:13.5px;}
        .prosedur-content table th{background:#198754;color:#fff;padding:10px 14px;font-weight:600;text-align:left;font-size:12px;text-transform:uppercase;}
        .prosedur-content table td{padding:10px 14px;border-bottom:1px solid #dee2e6;}
        .prosedur-content table tbody tr:hover{background:#f8f9fa;}
        .prosedur-content blockquote{border-left:4px solid #D4A017;padding:12px 16px;margin:1em 0;background:#fff8e1;border-radius:0 8px 8px 0;}
        .prosedur-content strong{color:#212529;}
        .fade-up{opacity:0;transform:translateY(24px);transition:all .6s cubic-bezier(.4,0,.2,1);}
        .fade-up.visible{opacity:1;transform:translateY(0);}
    </style>
</head>
<body class="bg-light">

    <!-- Scroll Progress -->
    <div id="scrollProgress" class="position-fixed top-0 start-0 bg-success" style="height:3px;z-index:9999;width:0;transition:width .1s linear;"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md fixed-top shadow-sm bg-glass bg-opacity-85 border-bottom" id="mainNav" style="border-color:rgba(0,0,0,.06)!important;z-index:1050;transition:all .3s;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3 text-decoration-none" href="index">
                <div class="d-flex align-items-center justify-content-center rounded-3 overflow-hidden bg-success shadow" style="width:44px;height:44px;flex-shrink:0;">
                    <img src="assets/dist/img/icon.png" alt="Logo" style="width:30px;height:30px;object-fit:contain;">
                </div>
                <div>
                    <div class="fw-bold text-success lh-1" style="font-size:16px;"><?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?></div>
                    <div class="fw-semibold lh-1 text-warning lh-1" style="font-size:10px;text-transform:uppercase;letter-spacing:.1em;">Penerimaan Santri Baru</div>
                </div>
            </a>
            <div class="d-flex align-items-center gap-2">
                <a href="javascript:history.back()" class="btn btn-sm rounded-pill px-3 fw-semibold text-decoration-none d-inline-flex align-items-center gap-1 btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <?php if (strip_tags($ta->st) == 'buka') { ?>
                <a href="login" class="btn btn-sm btn-success rounded-pill px-3 fw-bold text-decoration-none d-inline-flex align-items-center gap-1 shadow">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="container" style="padding-top:110px;padding-bottom:32px;">
        <div class="text-center fade-up">
            <span class="d-inline-flex align-items-center gap-2 rounded-pill px-3 py-2 fw-bold mb-3 bg-success bg-opacity-10 border border-success border-opacity-15 text-success text-uppercase" style="font-size:11px;letter-spacing:.08em;">
                <span class="rounded-circle bg-success" style="width:7px;height:7px;"></span>
                Panduan Resmi PPDB
            </span>
            <div class="font-amiri text-success opacity-10 user-select-none" style="font-size:clamp(26px,4vw,44px);line-height:1;margin-bottom:-6px;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
            <h1 class="fw-bold mb-2 text-success" style="font-size:clamp(32px,5.5vw,54px);line-height:1.08;letter-spacing:-.03em;">
                Prosedur <span class="font-playfair text-gradient">Pendaftaran</span>
            </h1>
            <p class="mx-auto text-body-secondary" style="max-width:540px;font-size:15px;">
                Simak video panduan dan langkah-langkah lengkap untuk mendaftarkan putra/putri Anda di pondok pesantren kami.
            </p>
            <div class="d-flex justify-content-center gap-4 flex-wrap mt-3">
                <span class="d-flex align-items-center gap-2 text-body-secondary" style="font-size:13px;font-weight:600;">
                    <span class="d-flex align-items-center justify-content-center rounded-3 bg-success bg-opacity-10 text-success" style="width:34px;height:34px;font-size:15px;"><i class="bi bi-calendar3"></i></span>
                    TA <?= date('Y'); ?>/<?= date('Y') + 1; ?>
                </span>
                <span class="d-flex align-items-center gap-2 text-body-secondary" style="font-size:13px;font-weight:600;">
                    <span class="d-flex align-items-center justify-content-center rounded-3 bg-warning bg-opacity-10 text-warning" style="width:34px;height:34px;font-size:15px;"><i class="bi bi-people-fill"></i></span>
                    Putra &amp; Putri
                </span>
                <span class="d-flex align-items-center gap-2 text-body-secondary" style="font-size:13px;font-weight:600;">
                    <span class="d-flex align-items-center justify-content-center rounded-3 bg-primary bg-opacity-10 text-primary" style="width:34px;height:34px;font-size:15px;"><i class="bi bi-geo-alt-fill"></i></span>
                    Tlasih, Sidoarjo
                </span>
            </div>
        </div>
    </div>

    <!-- Quick Nav -->
    <div class="container pb-4 fade-up" style="transition-delay:.1s;">
        <div class="d-flex justify-content-center">
            <ul class="nav nav-pills shadow-sm rounded-4 p-2 bg-white border" style="border-color:#f0f0f0!important;max-width:700px;">
                <li class="nav-item"><a class="nav-link rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1 bg-success text-white" style="font-size:12px;" href="#video"><i class="bi bi-play-circle"></i> Video</a></li>
                <li class="nav-item"><a class="nav-link rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1 text-body-secondary" style="font-size:12px;" href="#langkah"><i class="bi bi-list-ol"></i> Langkah</a></li>
                <li class="nav-item"><a class="nav-link rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1 text-body-secondary" style="font-size:12px;" href="#ringkasan"><i class="bi bi-signpost-2"></i> Ringkasan</a></li>
                <li class="nav-item"><a class="nav-link rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1 text-body-secondary" style="font-size:12px;" href="#faq"><i class="bi bi-question-circle"></i> FAQ</a></li>
                <li class="nav-item"><a class="nav-link rounded-pill px-3 py-1 fw-semibold d-inline-flex align-items-center gap-1 text-body-secondary" style="font-size:12px;" href="#kontak"><i class="bi bi-telephone"></i> Bantuan</a></li>
            </ul>
        </div>
    </div>

    <!-- Video -->
    <div id="video" class="container pb-4 fade-up" style="transition-delay:.15s;">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="d-flex align-items-center justify-content-between px-4 py-3 border-bottom bg-white">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex align-items-center justify-content-center rounded-3 text-white bg-danger shadow-sm" style="width:38px;height:38px;"><i class="bi bi-play-fill" style="font-size:17px;"></i></span>
                            <div>
                                <div class="fw-bold" style="font-size:15px;">Video Panduan Pendaftaran</div>
                                <div class="text-body-secondary" style="font-size:12px;">PSB Darul Ulum Tlasih</div>
                            </div>
                        </div>
                        <span class="d-none d-sm-inline-flex align-items-center gap-1 rounded-pill px-2 py-1 fw-bold bg-danger bg-opacity-10 border border-danger border-opacity-15 text-danger" style="font-size:10px;letter-spacing:.06em;">
                            <span class="rounded-circle bg-danger" style="width:5px;height:5px;"></span> YOUTUBE
                        </span>
                    </div>
                    <div class="ratio ratio-16x9 bg-dark">
                        <iframe src="https://www.youtube.com/embed/UkcK1Av4NDA" title="Video Panduan PPDB" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="d-flex align-items-center justify-content-between px-4 py-3 border-top bg-body-tertiary bg-opacity-25">
                        <a href="https://www.youtube.com/watch?v=UkcK1Av4NDA&t=5s" target="_blank" class="btn btn-sm rounded-pill px-3 fw-bold text-decoration-none d-inline-flex align-items-center gap-1 btn-outline-danger bg-white">
                            <i class="bi bi-youtube"></i> Lihat di YouTube
                        </a>
                        <span class="text-body-secondary" style="font-size:12px;"><i class="bi bi-clock me-1"></i> Durasi ±5 menit</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Prosedur Content -->
    <div id="langkah" class="container pb-4 fade-up" style="transition-delay:.2s;">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow rounded-4 overflow-hidden">
                    <div class="px-4 py-3 border-bottom bg-success">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex align-items-center justify-content-center rounded-3 bg-white bg-opacity-10 text-warning" style="width:38px;height:38px;font-size:18px;"><i class="bi bi-list-check"></i></span>
                            <div>
                                <div class="fw-bold text-white" style="font-size:15px;">Langkah-Langkah Pendaftaran</div>
                                <div class="fw-medium text-white-50" style="font-size:11px;">Ikuti prosedur berikut secara berurutan</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 bg-white prosedur-content">
                        <?= $tpr->is_pros; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ringkasan Alur -->
    <div id="ringkasan" class="container pb-4 fade-up" style="transition-delay:.25s;">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="text-center mb-4">
                    <span class="badge rounded-pill bg-success bg-opacity-10 text-success border border-success border-opacity-10 px-3 py-2 fw-bold" style="font-size:11px;letter-spacing:.1em;">RINGKASAN ALUR</span>
                </div>
                <div class="row g-3">
                    <?php
                    $ringkasan = [
                        ['Isi Formulir Online', 'Lengkapi seluruh data calon santri melalui sistem pendaftaran online.', 'bi-pencil-square', 'success'],
                        ['Transfer Biaya Daftar', 'Bayar ke rekening resmi lalu upload bukti transfer.', 'bi-credit-card', 'primary'],
                        ['Verifikasi Berkas', 'Panitia memverifikasi berkas dalam 1x24 jam kerja.', 'bi-clipboard-check', 'info'],
                        ['Tes Seleksi', 'Hadiri tes akademik, baca Quran, dan wawancara.', 'bi-journal-text', 'warning'],
                        ['Pengumuman', 'Cek hasil seleksi melalui akun pendaftaran Anda.', 'bi-megaphone', 'dark'],
                        ['Daftar Ulang', 'Lakukan daftar ulang jika dinyatakan diterima.', 'bi-check2-circle', 'danger']
                    ];
                    foreach ($ringkasan as $i => $r) { ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100">
                            <div class="card-body p-3 d-flex align-items-start gap-3">
                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-<?= $r[3]; ?> text-white flex-shrink-0" style="width:40px;height:40px;font-size:15px;font-weight:800;"><?= $i + 1; ?></div>
                                <div>
                                    <div class="fw-bold text-dark" style="font-size:13px;"><?= $r[0]; ?></div>
                                    <div class="text-body-secondary" style="font-size:12px;line-height:1.5;"><?= $r[1]; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ -->
    <div id="faq" class="container pb-4 fade-up" style="transition-delay:.3s;">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="text-center mb-4">
                    <span class="badge rounded-pill bg-warning bg-opacity-10 text-warning border border-warning border-opacity-10 px-3 py-2 fw-bold" style="font-size:11px;letter-spacing:.1em;">PERTANYAAN UMUM</span>
                </div>
                <div class="accordion" id="accordionFaq">
                    <?php
                    $faqs = [
                        ['q' => 'Apakah bisa mendaftar jika ijazah belum keluar?', 'a' => 'Bisa. Cukup melampirkan <strong>Surat Keterangan Lulus (SKL)</strong> atau rapor semester terakhir. Ijazah asli dilengkapi saat daftar ulang.'],
                        ['q' => 'Berapa biaya pendaftaran dan ke mana harus transfer?', 'a' => 'Informasi biaya pendaftaran dan nomor rekening resmi tersedia di halaman utama website pada bagian <strong>Rekening Bank</strong>.'],
                        ['q' => 'Bagaimana cara mengecek status pendaftaran?', 'a' => 'Login ke akun pendaftaran Anda menggunakan email dan password yang didaftarkan. Status akan terlihat di dashboard.'],
                        ['q' => 'Apakah santri boleh membawa kendaraan pribadi?', 'a' => 'Diperbolehkan dengan ketentuan: memiliki SIM C berlaku, surat izin dari orang tua/wali, dan kendaraan wajib didaftarkan ke keamanan pondok.'],
                        ['q' => 'Kapan jadwal tes seleksi diadakan?', 'a' => 'Jadwal tes akan diinformasikan melalui akun pendaftaran dan WhatsApp setelah berkas berhasil diverifikasi oleh panitia.'],
                        ['q' => 'Bagaimana jika ingin membatalkan pendaftaran?', 'a' => 'Hubungi panitia PPDB via WhatsApp dengan menyertakan nomor pendaftaran. Biaya yang sudah dibayarkan tidak dapat dikembalikan.']
                    ];
                    foreach ($faqs as $i => $faq) { ?>
                    <div class="accordion-item border rounded-3 mb-2 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed rounded-3 fw-semibold" type="button" style="font-size:14px;" data-bs-toggle="collapse" data-bs-target="#faq<?= $i; ?>">
                                <i class="bi bi-question-circle-fill text-warning me-2"></i><?= $faq['q']; ?>
                            </button>
                        </h2>
                        <div id="faq<?= $i; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFaq">
                            <div class="accordion-body text-body-secondary" style="font-size:13.5px;line-height:1.8;padding-left:44px;"><?= $faq['a']; ?></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="container pb-4 fade-up" style="transition-delay:.35s;">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow rounded-4 overflow-hidden">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-7 p-4">
                            <div class="font-amiri text-success opacity-15 mb-2" style="font-size:22px;">فَإِنَّ مَعَ الْعُسْرِ يُسْرًا</div>
                            <h5 class="fw-bold text-success mb-2">Sudah Siap Mendaftar?</h5>
                            <p class="text-body-secondary mb-3" style="font-size:14px;">Jangan tunda lagi. Kuota terbatas dan pendaftaran dapat ditutup sewaktu-waktu jika kuota terpenuhi.</p>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="lembaga" class="btn btn-success rounded-pill px-4 fw-bold text-decoration-none d-inline-flex align-items-center gap-2 shadow"><i class="bi bi-pencil-square"></i> Daftar Sekarang</a>
                                <a href="https://api.whatsapp.com/send?phone=<?= htmlspecialchars($pdb->wa_pdf); ?>&text=Assalamu'alaikum,%20saya%20ingin%20bertanya%20tentang%20PSB" target="_blank" class="btn btn-outline-success rounded-pill px-4 fw-bold text-decoration-none d-inline-flex align-items-center gap-2"><i class="bi bi-whatsapp"></i> Tanya via WA</a>
                            </div>
                        </div>
                        <div class="col-md-5 d-none d-md-block">
                            <div class="h-100 bg-success bg-opacity-10 d-flex align-items-center justify-content-center p-4" style="min-height:220px;">
                                <div class="text-center">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-success text-white mx-auto mb-3 shadow" style="width:70px;height:70px;font-size:32px;"><i class="bi bi-mortarboard-fill"></i></div>
                                    <div class="fw-bold text-success" style="font-size:16px;">TA <?= date('Y'); ?>/<?= date('Y') + 1; ?></div>
                                    <div class="text-body-secondary" style="font-size:12px;">Pendaftaran Dibuka</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kontak -->
    <div id="kontak" class="container pb-5 fade-up" style="transition-delay:.4s;">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="text-center mb-4">
                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary border border-primary border-opacity-10 px-3 py-2 fw-bold" style="font-size:11px;letter-spacing:.1em;">BUTUH BANTUAN?</span>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4 bg-white">
                            <div class="d-flex align-items-center justify-content-center mx-auto mb-3 rounded-circle bg-success bg-opacity-10 text-success" style="width:56px;height:56px;font-size:24px;"><i class="bi bi-telephone-fill"></i></div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size:14px;">Hubungi Kami</h6>
                            <p class="text-body-secondary mb-2" style="font-size:12px;">Tim panitia siap membantu Anda.</p>
                            <?php if (!empty($pdb->k1_pdf) && $pdb->k1_pdf != '-') { ?>
                            <a href="tel:<?= htmlspecialchars(strip_tags($pdb->k1_pdf)); ?>" class="btn btn-sm btn-outline-success rounded-pill px-3 text-decoration-none fw-semibold" style="font-size:12px;"><i class="bi bi-telephone me-1"></i> <?= htmlspecialchars(strip_tags($pdb->k1_pdf)); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4 bg-white">
                            <div class="d-flex align-items-center justify-content-center mx-auto mb-3 rounded-circle bg-success bg-opacity-10 text-success" style="width:56px;height:56px;font-size:24px;"><i class="bi bi-whatsapp"></i></div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size:14px;">WhatsApp</h6>
                            <p class="text-body-secondary mb-2" style="font-size:12px;">Konsultasi langsung via WA.</p>
                            <a href="https://api.whatsapp.com/send?phone=<?= htmlspecialchars($pdb->wa_pdf); ?>" target="_blank" class="btn btn-sm btn-success rounded-pill px-3 text-decoration-none fw-semibold shadow" style="font-size:12px;"><i class="bi bi-whatsapp me-1"></i> Chat Sekarang</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm rounded-4 h-100 text-center p-4 bg-white">
                            <div class="d-flex align-items-center justify-content-center mx-auto mb-3 rounded-circle bg-primary bg-opacity-10 text-primary" style="width:56px;height:56px;font-size:24px;"><i class="bi bi-globe2"></i></div>
                            <h6 class="fw-bold mb-1 text-dark" style="font-size:14px;">Sosial Media</h6>
                            <p class="text-body-secondary mb-2" style="font-size:12px;">Follow info terbaru kami.</p>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="<?= htmlspecialchars($pdb->ig_pdf); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle d-flex align-items-center justify-content-center text-decoration-none" style="width:34px;height:34px;" title="Instagram"><i class="bi bi-instagram" style="font-size:14px;"></i></a>
                                <a href="<?= htmlspecialchars($pdb->fb_pdf); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle d-flex align-items-center justify-content-center text-decoration-none" style="width:34px;height:34px;" title="Facebook"><i class="bi bi-facebook" style="font-size:14px;"></i></a>
                                <a href="<?= htmlspecialchars($pdb->yt_pdf); ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle d-flex align-items-center justify-content-center text-decoration-none" style="width:34px;height:34px;" title="YouTube"><i class="bi bi-youtube" style="font-size:14px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-3 border-top bg-white" style="border-color:rgba(0,0,0,.06)!important;">
        <div class="container d-flex align-items-center justify-content-between flex-wrap">
            <span class="text-body-secondary" style="font-size:13px;">Copyright &copy; <?= date('Y'); ?> <span class="fw-semibold text-danger">DigitalNode ID</span>. All rights reserved.</span>
            <span class="d-none d-sm-inline text-dark" style="font-size:13px;">
                <b>PSB Darul Ulum Tlasih</b> <span class="badge bg-danger" style="font-size:10px;vertical-align:middle;">v3.0</span>
            </span>
        </div>
    </footer>

    <!-- Floating WA -->
    <a href="https://api.whatsapp.com/send?phone=<?= htmlspecialchars($pdb->wa_pdf); ?>&text=Assalamu'alaikum,%20saya%20ingin%20bertanya%20tentang%20PSB" target="_blank" class="position-fixed d-flex align-items-center justify-content-center btn btn-success rounded-circle shadow-lg text-decoration-none" style="bottom:28px;left:28px;width:52px;height:52px;font-size:24px;z-index:1040;" title="Chat WhatsApp"><i class="bi bi-whatsapp"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function(){
        /* Scroll Progress */
        var sp = document.getElementById('scrollProgress');
        window.addEventListener('scroll', function(){
            var dh = document.documentElement.scrollHeight - window.innerHeight;
            sp.style.width = (dh > 0 ? (window.scrollY / dh) * 100 : 0) + '%';
        });

        /* Navbar scroll effect */
        var nav = document.getElementById('mainNav');
        window.addEventListener('scroll', function(){
            if(window.scrollY > 40) nav.classList.add('shadow');
            else nav.classList.remove('shadow');
        });

        /* Scroll animations */
        var ae = document.querySelectorAll('.fade-up');
        var ob = new IntersectionObserver(function(e){
            e.forEach(function(en){
                if(en.isIntersecting){ en.target.classList.add('visible'); ob.unobserve(en.target); }
            });
        }, {threshold: 0.08, rootMargin: '0px 0px -20px 0px'});
        ae.forEach(function(el){ ob.observe(el); });

        /* Smooth scroll for nav pills */
        document.querySelectorAll('a[href^="#"]').forEach(function(a){
            a.addEventListener('click', function(e){
                var t = this.getAttribute('href');
                if(t && t !== '#' && t.length > 1){
                    var el = document.querySelector(t);
                    if(el){
                        e.preventDefault();
                        window.scrollTo({top: el.getBoundingClientRect().top + window.scrollY - 80, behavior: 'smooth'});
                    }
                }
            });
        });

        /* Active pill on scroll */
        var sections = document.querySelectorAll('[id]');
        var pills = document.querySelectorAll('.nav-pills .nav-link');
        window.addEventListener('scroll', function(){
            var c = '';
            sections.forEach(function(s){ if(window.scrollY >= s.offsetTop - 120) c = s.getAttribute('id'); });
            pills.forEach(function(p){
                p.classList.remove('bg-success', 'text-white');
                p.classList.add('text-body-secondary');
                var href = p.getAttribute('href');
                if(href === '#' + c){
                    p.classList.add('bg-success', 'text-white');
                    p.classList.remove('text-body-secondary');
                }
            });
        });
    });
    </script>
</body>
</html>