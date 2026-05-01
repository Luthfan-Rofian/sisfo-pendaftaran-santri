<?php
session_start();
error_reporting(0);
include 'config/koneksi.php';

 $ppdb = mysqli_query($conn, "SELECT * FROM tb_ppdb");
 $pdb = mysqli_fetch_object($ppdb);

// Fallback jika database kosong
if(!$pdb) {
    $pdb = new stdClass();
    $pdb->sk_pdf = 'PSB';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pilih Unit Lembaga - PPDB</title>
  <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/icon.png">

  <!-- Google Font: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
    
    /* Custom Navbar */
    .main-header { background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
    .logo h2 { color: #1a5276 !important; font-weight: 700; }

    /* Hero Header */
    .page-header {
      background: linear-gradient(135deg, #1a5276 0%, #2980b9 100%);
      color: white; padding: 40px 20px; border-radius: 0 0 30px 30px;
      text-align: center; margin-bottom: 40px;
    }
    .page-header h1 { font-weight: 700; font-size: 2.2rem; }
    .page-header p { opacity: 0.9; font-size: 1.1rem; }

    /* Modern Cards */
    .lembaga-card {
      border: none; border-radius: 15px; 
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      overflow: hidden; text-align: center;
      background: white;
    }
    .lembaga-card:hover { 
      transform: translateY(-10px); 
      box-shadow: 0 15px 30px rgba(26, 82, 118, 0.15); 
    }
    
    .lembaga-card .card-img-top {
      width: 110px; height: 110px; 
      object-fit: cover; border-radius: 50%; 
      margin: 30px auto 20px auto; 
      border: 4px solid #e9ecef; padding: 5px; background: white;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    .lembaga-card .card-body { padding: 0 20px 20px 20px; }
    .lembaga-card .card-title { color: #1a5276; font-weight: 700; font-size: 1.25rem; }
    .lembaga-card .card-text { color: #6c757d; font-size: 0.9rem; }
    
    .lembaga-card .card-footer { 
      background: white; border-top: 1px solid #eee; padding: 20px; 
    }
    
    /* Tombol Aksi */
    .btn-pelajari {
      background-color: #c5a059; color: white; border-radius: 30px; 
      font-weight: 600; padding: 10px 25px; width: 100%;
      transition: all 0.3s;
    }
    .btn-pelajari:hover { 
      background-color: #1a5276; color: white; 
      box-shadow: 0 5px 15px rgba(26, 82, 118, 0.3); 
    }

    /* Alert Peringatan */
    .alert-pilih-lembaga {
      background: #fff3cd; border-left: 5px solid #f0ad4e; color: #856404;
      border-radius: 8px; padding: 15px 20px; margin-bottom: 30px;
    }
  </style>
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-white navbar-light">
    <div class="container">
      <a href="index" class="logo"><h2><?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?></h2></a>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <?php
          $tomboladmin = mysqli_query($conn, "SELECT * FROM tb_tbladm");
          $ta = mysqli_fetch_object($tomboladmin);
          $buka = isset($ta->st) ? strip_tags($ta->st) : '';
          if ($buka == 'buka') {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="login"><span class="btn btn-primary btn-sm rounded-pill shadow-sm px-4"><i class="fas fa-sign-in-alt mr-1"></i> Login</span></a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </nav>

  <!-- Content Wrapper -->
  <div class="content-wrapper">

    <!-- Hero Header -->
    <section class="page-header">
      <div class="container">
        <h1>Pilih Unit Lembaga</h1>
        <p>Pilih lembaga yang sesuai dengan jenjang pendidikan Anda</p>
      </div>
    </section>

    <!-- Main content -->
    <div class="content">
      <div class="container">

        <!-- Peringatan -->
        <div class="alert-pilih-lembaga shadow-sm">
          <i class="fas fa-exclamation-triangle mr-2"></i> 
          <strong>Perhatian!</strong> Sebelum melakukan pendaftaran, mohon pelajari unit lembaga dengan saksama agar tidak salah dalam memilih.
        </div>

        <!-- Grid Lembaga -->
        <div class="row justify-content-center">
          <?php
          $Lembaga = mysqli_query($conn, "SELECT * FROM tb_lembaga ORDER BY tk_lembaga ASC");
          while ($lbg = mysqli_fetch_object($Lembaga)) {
          ?>
          <div class="col-lg-4 col-md-6 mb-5">
            <div class="card lembaga-card h-100">
              <!-- Logo -->
              <img src="assets/images/lembaga/<?= htmlspecialchars($lbg->lg_lembaga); ?>" class="card-img-top" alt="<?= htmlspecialchars(strip_tags($lbg->nm_lembaga)); ?>">
              
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= htmlspecialchars(strip_tags($lbg->nm_lembaga)); ?></h5>
                <p class="card-text mt-auto mb-3">Klik tombol di bawah untuk melihat informasi lengkap, rincian biaya, dan melakukan pendaftaran.</p>
              </div>
              
              <div class="card-footer">
                <a href="dlembaga?lembaga=<?= urlencode(strip_tags($lbg->nm_lembaga)); ?>" class="btn btn-pelajari shadow-sm">
                  <i class="fas fa-book-reader mr-1"></i> Pelajari & Daftar
                </a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

        <!-- Tombol Kembali -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <a href="#" onclick="history.back();" class="btn btn-outline-secondary rounded-pill shadow-sm px-4"><i class="fas fa-arrow-left mr-2"></i> Kembali Ke Homepage</a>
            </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer text-sm" style="background: white; border-top: 1px solid #eee;">
    <div class="float-right d-none d-sm-block">
        <b>PSB Darul Ulum Tlasih</b> | <span class="badge badge-danger">Version 3.0</span>
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <span class="text-danger">DigitalNode ID</span>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- bs-custom-file-input -->
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- SweetAlert -->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script type="text/javascript">
<?php
  // PERBAIKAN BUG: Menghapus session_destroy() dan menggunakan unset() spesifik
  // session_destroy() akan mematikan sesi login pengguna secara paksa!
  if(isset($_SESSION['pesan_lembaga_kosong'])){ 
?>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: '<?php echo addslashes($_SESSION['pesan_lembaga_kosong']); ?>',
      showConfirmButton: true,
      confirmButtonColor: '#1a5276'
    });
<?php 
    unset($_SESSION['pesan_lembaga_kosong']); 
  }
?>
</script>
</body>
</html>