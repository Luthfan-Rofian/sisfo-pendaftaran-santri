<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login — PSB Darul Ulum Tlasih</title>
    <meta name="description" content="Halaman login administrasi PSB Darul Ulum Tlasih">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Amiri:wght@400;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
    <style>
        *{box-sizing:border-box;}
        html,body{margin:0;padding:0;height:100%;overflow:hidden;}
        body{font-family:'Plus Jakarta Sans',sans-serif;}
        .font-amiri{font-family:'Amiri',serif;}
        .font-playfair{font-family:'Playfair Display',serif;}
        .bg-glass{backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);}
        .input-custom{border:1.5px solid #dee2e6;border-radius:12px;padding:9px 14px;font-size:13px;color:#212529;font-family:inherit;transition:all .2s;}
        .input-custom:focus{border-color:#198754;box-shadow:0 0 0 3px rgba(25,135,84,.1);}
        .input-custom::placeholder{color:#adb5bd;}
        .input-icon{border:1.5px solid #dee2e6;border-left:none;border-radius:0 12px 12px 0;background:#f8f9fa;transition:border-color .2s;}
        .input-icon-left{border:1.5px solid #dee2e6;border-right:none;border-radius:12px 0 0 12px;background:#f8f9fa;cursor:pointer;transition:border-color .2s;}
        .input-group:focus-within .input-custom{border-color:#198754;}
        .input-group:focus-within .input-icon{border-color:#198754;}
        .input-group:focus-within .input-icon-left{border-color:#198754;}
        .btn-login{background:linear-gradient(135deg,#0F4C3A,#198754);border-radius:12px;padding:11px;font-size:14px;font-weight:700;box-shadow:0 6px 20px rgba(15,76,58,.2);transition:all .3s;position:relative;overflow:hidden;}
        .btn-login::before{content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.1),transparent);transition:left .5s;}
        .btn-login:hover::before{left:100%;}
        .btn-login:hover{background:linear-gradient(135deg,#0a3328,#157A54);transform:translateY(-2px);box-shadow:0 8px 28px rgba(15,76,58,.3);color:#fff;}
        .side-left{position:relative;overflow:hidden;}
        .side-left::before{content:'';position:absolute;inset:0;background:linear-gradient(160deg,rgba(10,51,40,.94) 0%,rgba(15,76,58,.9) 50%,rgba(25,135,84,.88) 100%);z-index:1;}
        .side-left::after{content:'';position:absolute;bottom:-40px;left:-40px;width:200px;height:200px;background:rgba(212,160,23,.1);border-radius:50%;filter:blur(60px);z-index:2;}
        .side-pattern{position:absolute;inset:0;z-index:1;opacity:.05;background-image:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");}
        .side-circle{position:absolute;border-radius:50%;border:1px solid rgba(255,255,255,.08);}
        .side-content{position:relative;z-index:3;}
        .stat-float{background:rgba(255,255,255,.1);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,.12);border-radius:12px;}
        .img-hero{object-fit:cover;width:100%;max-height:42vh;border-radius:16px;border:2px solid rgba(255,255,255,.1);box-shadow:0 8px 30px rgba(0,0,0,.2);}
        .badge-float{background:rgba(255,255,255,.95);border-radius:10px;box-shadow:0 4px 12px rgba(0,0,0,.08);}
        .shake{animation:shake .5s ease-in-out;}
        @keyframes shake{0%,100%{transform:translateX(0);}20%,60%{transform:translateX(-6px);}40%,80%{transform:translateX(6px);}}
        @media(max-width:991.98px){
            .side-left{min-height:220px;border-radius:20px 20px 0 0;}
            .card-form{border-radius:0 0 20px 20px;}
            .img-hero{max-height:180px;}
        }
    </style>
</head>
<body class="bg-light">

    <div class="container-fluid p-0 m-0 h-100">
        <div class="row g-0 h-100">

            <!-- KIRI: Gambar Besar -->
            <div class="col-lg-6 d-none d-lg-flex side-left align-items-stretch">
                <div class="side-pattern"></div>
                <div class="side-circle" style="width:350px;height:350px;top:-100px;right:-100px;"></div>
                <div class="side-circle" style="width:220px;height:220px;bottom:40px;left:-70px;"></div>

                <div class="side-content d-flex flex-column justify-content-between align-items-center h-100 w-100 p-4 px-lg-5">

                    <!-- Atas -->
                    <div class="text-center text-white w-100">
                        <div class="d-flex align-items-center justify-content-center mx-auto mb-2 rounded-3 bg-glass shadow" style="width:52px;height:52px;">
                            <img src="assets/dist/img/icon.png" alt="Logo" style="width:34px;height:34px;object-fit:contain;">
                        </div>
                        <div class="font-amiri opacity-15 user-select-none" style="font-size:22px;line-height:1;">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ</div>
                        <h3 class="font-playfair fw-bold mb-0" style="font-size:26px;letter-spacing:-.02em;line-height:1.1;">
                            Penerimaan Santri Baru
                        </h3>
                        <p class="text-white-50 mb-0" style="font-size:13px;">Panel administrasi PSB</p>
                    </div>

                    <!-- Tengah: Gambar Besar -->
                    <div class="w-100 px-lg-2 my-2 position-relative">
                        <img src="assets/landing/assets/img/hero-img2.png" alt="Santri" class="img-hero" onerror="this.onerror=null;this.src='https://placehold.co/600x400/0F4C3A/ffffff?text=Pondok+Pesantren';">
                        <!-- Badge floating -->
                        <div class="badge-float position-absolute d-flex align-items-center gap-2 p-2" style="bottom:12px;right:16px;border-left:3px solid #D4A017;">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success" style="width:32px;height:32px;font-size:15px;"><i class="bi bi-mortarboard-fill"></i></div>
                            <div><div class="text-muted" style="font-size:9px;line-height:1;">Pengalaman</div><div class="fw-bold text-dark" style="font-size:15px;line-height:1;">25+ Tahun</div></div>
                        </div>
                        <div class="badge-float position-absolute d-flex align-items-center gap-2 p-2" style="top:12px;left:16px;border-left:3px solid #198754;">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10 text-success" style="width:32px;height:32px;font-size:15px;"><i class="bi bi-journal-bookmark-fill"></i></div>
                            <div><div class="text-muted" style="font-size:9px;line-height:1;">Tahfidz</div><div class="fw-bold text-dark" style="font-size:15px;line-height:1;">30 Juz</div></div>
                        </div>
                    </div>

                    <!-- Bawah: Stat -->
                    <div class="d-flex gap-2 justify-content-center w-100">
                        <div class="stat-float px-3 py-1 text-center flex-fill">
                            <div class="fw-bold text-white" style="font-size:17px;">2000+</div>
                            <div class="text-white-50" style="font-size:9px;">Alumni</div>
                        </div>
                        <div class="stat-float px-3 py-1 text-center flex-fill">
                            <div class="fw-bold text-white" style="font-size:17px;">100+</div>
                            <div class="text-white-50" style="font-size:9px;">Prestasi</div>
                        </div>
                        <div class="stat-float px-3 py-1 text-center flex-fill">
                            <div class="fw-bold text-white" style="font-size:17px;">30 Juz</div>
                            <div class="text-white-50" style="font-size:9px;">Tahfidz</div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Mobile Header -->
            <div class="col-12 d-lg-none p-3 text-center" style="background:linear-gradient(135deg,#0a3328,#198754);">
                <div class="d-flex align-items-center justify-content-center mx-auto mb-1 rounded-3 bg-glass shadow" style="width:44px;height:44px;">
                    <img src="assets/dist/img/icon.png" alt="Logo" style="width:30px;height:30px;object-fit:contain;">
                </div>
                <div class="font-amiri text-white opacity-15 user-select-none mb-0" style="font-size:18px;">بِسْمِ اللَّهِ</div>
                <h6 class="fw-bold text-white mb-0">Penerimaan Santri Baru</h6>
            </div>

            <!-- KANAN: Form Kecil -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center" style="background:#fff;">
                <div class="w-100 px-3 px-lg-5 py-3" style="max-width:400px;">

                    <!-- Judul -->
                    <div class="mb-3">
                        <h5 class="fw-bold text-dark mb-0" style="font-size:18px;">Selamat Datang</h5>
                        <p class="text-body-secondary mb-0" style="font-size:12px;">Masuk ke panel administrasi PSB</p>
                    </div>

                    <form action="proses_login.php" method="post" id="loginForm">

                        <!-- Username -->
                        <div class="mb-2">
                            <label class="form-label fw-semibold mb-1" style="font-size:12px;color:#374151;">Username</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control input-custom" placeholder="Masukkan username" name="us_user" required minlength="5" id="inputUser" autocomplete="username">
                                <span class="input-group-text input-icon"><i class="bi bi-person-fill text-success" style="font-size:14px;"></i></span>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-2">
                            <label class="form-label fw-semibold mb-1" style="font-size:12px;color:#374151;">Password</label>
                            <div class="input-group input-group-sm">
                                <input type="password" class="form-control input-custom" placeholder="Masukkan password" name="ps_user" id="pass" required autocomplete="current-password">
                                <span class="input-group-text input-icon" role="button" tabindex="0" aria-label="Tampilkan password" onclick="togglePass()" style="cursor:pointer;">
                                    <i class="bi bi-eye-fill text-success" style="font-size:14px;" id="eyeIcon"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Captcha -->
                        <div class="mb-2">
                            <div class="text-center mb-1">
                                <img id="captcha" src="assets/plugins/securimage/securimage_show.php" alt="CAPTCHA" class="rounded-3 border" style="border-color:#dee2e6!important;height:48px;">
                            </div>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text input-icon-left" role="button" tabindex="0" aria-label="Refresh captcha" onclick="refreshCaptcha()" style="cursor:pointer;padding:0 12px;">
                                    <i class="bi bi-arrow-clockwise text-success" style="font-size:14px;"></i>
                                </span>
                                <input class="form-control input-custom text-center fw-semibold" name="cod" placeholder="Kode" maxlength="6" id="inputCaptcha" autocomplete="off" style="letter-spacing:3px;font-size:14px;padding:7px 14px;">
                                <span class="input-group-text input-icon" role="button" tabindex="0" aria-label="Refresh captcha" onclick="refreshCaptcha()" style="cursor:pointer;padding:0 12px;">
                                    <i class="bi bi-arrow-clockwise text-success" style="font-size:14px;"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" name="login" class="btn btn-login w-100 d-flex align-items-center justify-content-center gap-2 border-0 text-white">
                            <i class="bi bi-box-arrow-in-right"></i> Masuk
                        </button>

                    </form>

                    <!-- Footer -->
                    <div class="d-flex align-items-center justify-content-between mt-2 pt-2 border-top">
                        <a href="javascript:history.back()" class="text-decoration-none d-inline-flex align-items-center gap-1 fw-semibold" style="font-size:12px;color:#198755;">
                            <i class="bi bi-arrow-left" style="font-size:10px;"></i> Kembali
                        </a>
                        <div class="d-flex align-items-center gap-2">
                            <a href="index" class="text-decoration-none" style="color:#9ca3af;font-size:13px;" title="Beranda"><i class="bi bi-house-door"></i></a>
                            <a href="prosedur" class="text-decoration-none" style="color:#9ca3af;font-size:13px;" title="Prosedur"><i class="bi bi-journal-text"></i></a>
                        </div>
                    </div>

                    <!-- Branding -->
                    <div class="text-center mt-2">
                        <span style="font-size:11px;color:#adb5bd;">&copy; <?= date('Y'); ?> <span class="fw-semibold text-danger">DigitalNode ID</span> · <b style="font-size:11px;color:#6b7280;">PSB Darul Ulum Tlasih</b></span>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function(){
        window.togglePass = function(){
            var p = document.getElementById('pass');
            var icon = document.getElementById('eyeIcon');
            if(p.type === 'password'){ p.type = 'text'; icon.className = 'bi bi-eye-slash-fill text-warning'; }
            else { p.type = 'password'; icon.className = 'bi bi-eye-fill text-success'; }
        };
        document.getElementById('inputUser').addEventListener('keypress', function(e){
            var c = e.which ? e.which : e.keyCode;
            if(c > 31 && (c < 48 || c > 57)){
                e.preventDefault();
                Swal.fire({icon:'error',title:'Hanya Angka',text:'Username hanya boleh diisi angka.',timer:2500,showConfirmButton:false,toast:true,position:'top',customClass:{popup:'swal2-toast'}});
            }
        });
        window.refreshCaptcha = function(){
            document.getElementById('captcha').src = 'assets/plugins/securimage/securimage_show.php?' + new Date().getTime();
            document.getElementById('inputCaptcha').value = '';
            document.getElementById('inputCaptcha').focus();
        };
        <?php if(isset($_SESSION['pesan_captcha_gagal']) || isset($_SESSION['pesan_login_gagal'])): ?>
        setTimeout(function(){ var f = document.getElementById('loginForm'); if(f){ f.classList.add('shake'); setTimeout(function(){ f.classList.remove('shake'); }, 600); } }, 300);
        <?php endif; ?>
        <?php if(isset($_SESSION['pesan_captcha_gagal'])): ?>
        setTimeout(function(){ Swal.fire({icon:'error',title:'Kode Salah',text:'<?= addslashes($_SESSION['pesan_captcha_gagal']); ?>',timer:4000,showConfirmButton:false,toast:true,position:'top',customClass:{popup:'swal2-toast'}}); }, 400);
        <?php unset($_SESSION['pesan_captcha_gagal']); endif; ?>
        <?php if(isset($_SESSION['pesan_login_gagal'])): ?>
        setTimeout(function(){ Swal.fire({icon:'error',title:'Login Gagal',text:'<?= addslashes($_SESSION['pesan_login_gagal']); ?>',timer:4000,showConfirmButton:false,toast:true,position:'top',customClass:{popup:'swal2-toast'}}); }, 800);
        <?php unset($_SESSION['pesan_login_gagal']); endif; ?>
    });
    </script>
</body>
</html>