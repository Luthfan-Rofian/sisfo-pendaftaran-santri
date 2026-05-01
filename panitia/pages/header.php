<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';
if ($_SESSION['start_login'] != true) {
    $_SESSION['pesan_login_gagal'] = 'Maaf Anda Harus Login Dulu..';
    echo "<script>window.location='../index'</script>";
}
$lembaga=$_SESSION['lb_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Penerimaan Santri Baru || </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/dist/img/icon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  <!--Animated-->
  <link rel="stylesheet" type="text/css" href="../assets/plugins/animate/animate.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <?php
          $menunggu = mysqli_query($conn, "SELECT COUNT(id_p) AS total FROM tb_daftar WHERE st_pdf='Menunggu' && lb_daf='$lembaga'");
          $pd = mysqli_fetch_object($menunggu);
          ?>
          <span class="badge badge-danger navbar-badge"><?= $pd->total; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?= $pd->total; ?> Pendaftar baru menunggu</span>
          <div class="dropdown-divider"></div>
          <?php
          $pdf = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE st_pdf='Menunggu' && lb_daf='$lembaga'");
          while($tp = mysqli_fetch_object($pdf)){ ?>
          <a href="#" class="dropdown-item dropdown-footer text-left"><?= $tp->nm_pdf; ?></a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <?php if (!empty($pd->total)){ ?>
            <a href="pg_menunggu" class="dropdown-item dropdown-footer text-left"><b>Lihat Semua</b></a>
          <?php } ?>
        </div>
      </li>
      <!-- Profile Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Box User</span>
          <div class="dropdown-divider"></div>
          <a href="pg_user" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" onClick="logout_modal('logout')">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link">
      <img src="../assets/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>P S B</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          $yayasan = mysqli_query($conn, "SELECT * FROM tb_yayasan");
          $tp = mysqli_fetch_object($yayasan);
          ?>
          <img src="../assets/images/<?php echo $tp->lg_yayasan; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['nm_user']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pendaftaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pg_pendaftar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pendaftar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pg_berkas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Berkas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pg_pembayaran" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pg_laporan" class="nav-link">
              <i class="nav-icon fas fa-file-excel"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="dropdown-divider"></li>
          <li class="nav-item">
            <a href="pg_info" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>Tentang Aplikasi</p>
            </a>
          </li>
          <li class="dropdown-divider"></li>
          <li class="nav-item">
            <a href="#" class="nav-link" onClick="logout_modal('logout')">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>