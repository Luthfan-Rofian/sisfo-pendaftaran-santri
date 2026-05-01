<?php
session_start();
// Saat debugging, pakai E_ALL. Jika sudah jalan, ganti jadi 0
error_reporting(E_ALL); 
ini_set('display_errors', 1);

// PERBAIKAN 1: WAJIB ADA. Koneksi database harus di-include
include 'config/koneksi.php';

// PERBAIKAN 2: Cek apakah parameter lembaga ada di URL
if (!isset($_GET['lembaga']) || empty($_GET['lembaga'])) {
    $_SESSION['pesan_lembaga_kosong'] = 'Maaf Anda Belum Memilih Lembaga..';
    echo "<script>window.location='lembaga'</script>";
    exit;
}

// PERBAIKAN 3: Sanitasi variabel dari SQL Injection
 $lembaga = mysqli_real_escape_string($conn, $_GET['lembaga']);

 $Lembaga = mysqli_query($conn, "SELECT * FROM tb_lembaga WHERE nm_lembaga='$lembaga'");
 $lbg = mysqli_fetch_object($Lembaga);

// Jika lembaga tidak ditemukan di database, tendang kembali
if(!$lbg) {
    $_SESSION['pesan_lembaga_kosong'] = 'Lembaga tidak ditemukan..';
    echo "<script>window.location='lembaga'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verifikasi Keamanan - PSB</title>

  <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/icon.png">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

  <style>
    body {
      background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
      font-family: 'Poppins', sans-serif;
    }
    .login-box {
      margin-top: 5%;
    }
    .card-success {
      border-top: 3px solid var(--pesantren-green, #1a6b54);
    }
    .card-header {
      background-color: #1a6b54 !important;
      color: white !important;
      font-family: 'Playfair Display', serif;
    }
    .btn-success {
      background-color: #1a6b54;
      border-color: #1a6b54;
    }
    .btn-success:hover {
      background-color: #145a46;
      border-color: #145a46;
    }
  </style>
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="card card-outline card-success">
    <div class="card-header login-logo text-center">
      <h5><i class="fas fa-shield-alt mr-2"></i> Kode Keamanan</h5>
    </div>
    <div class="card-body login-card-body">
      <p class="login-box-msg text-dark">
        Anda akan mendaftar di <br><b class="text-success"><?= htmlspecialchars(strip_tags($lembaga)); ?></b>
      </p>
      <hr>
      <form action="auth/proses" method="post">
        <div class="form-group text-center">
          <small>Isikan hasil operasi matematika di formulir di bawah.<br>Tekan <b>Refresh</b> jika anda salah memasukkan kode</small>
          <hr>
          <div class="mb-3">
            <img id="captcha" src="assets/plugins/securimage/securimage_show.php" alt="CAPTCHA Image" class="shadow-sm rounded" />
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control text-center" name="cod" placeholder="Masukkan Kode Keamanan" required autocomplete="off" />
          <input type="hidden" name="lbg" value="<?= htmlspecialchars(strip_tags($lembaga)); ?>" />
        </div>
        <input type="submit" name="isi" class="btn btn-success btn-block shadow-sm" value="Lanjut ke Formulir">
      </form>
    </div>
    
    <div class="card-footer" style="background-color: #f8f9fa;">
      <div class="d-flex justify-content-between align-items-center">
        <a href="#" onclick="history.back(self);" class="text-muted"><small><i class="fas fa-arrow-left mr-1"></i>Kembali</small></a>
        <a href="#" class="btn btn-outline-secondary btn-sm" onclick="window.history.go(0);" title="Refresh Kode">
          <i class="fas fa-sync-alt mr-1"></i> Refresh
        </a>
      </div>
    </div>

  </div>
</div>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="assets/plugins/toastr/toastr.min.js"></script>

<?php
  // Notifikasi jika captcha salah
  if(isset($_SESSION['pesan_captcha_gagal'])){ ?>
    <script>
      toastr.error('<?= addslashes($_SESSION['pesan_captcha_gagal']); ?>')
    </script>
  <?php unset($_SESSION['pesan_captcha_gagal']); 
  }

  // Notifikasi jika dipaksa masuk formulir tanpa verifikasi
  if(isset($_SESSION['pesan_verifikasi_gagal'])){ ?>
    <script>
      toastr.error('<?= addslashes($_SESSION['pesan_verifikasi_gagal']); ?>')
    </script>
  <?php unset($_SESSION['pesan_verifikasi_gagal']); 
  }
?>
</body>
</html>