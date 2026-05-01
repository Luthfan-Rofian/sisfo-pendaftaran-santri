<?php
session_start();
error_reporting(0);
include 'config/koneksi.php';

$ppdb = mysqli_query($conn, "SELECT * FROM tb_ppdb");
$pdb = mysqli_fetch_object($ppdb);
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Penerimaan Santri Baru</title>

  <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/icon.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index" class="logo"><h2><?= $pdb->sk_pdf; ?></h2></a>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <?php
          $tomboladmin = mysqli_query($conn, "SELECT * FROM tb_tbladm");
          $ta = mysqli_fetch_object($tomboladmin);

          $buka=strip_tags($ta->st);
          if ($buka=='buka') {
              ?>
              <li>
                <a class="nav-link" href="login"><span class="btn btn-info text-white btn-sm">Login</span></a>
              </li>
              <?php
          }
        ?>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Data Pendaftar</h1>
            <a href="#" onclick="history.back(self);" class="btn btn-dark btn-xs">Kembali Ke Homepage</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container table-responsive">
        <table class="table table-striped table-sm" id="data1">
          <thead>
            <tr class="bg-info">
              <th class="text-center">No.</th>
              <th>ID</th>
              <th>Tgl Daftar</th>
              <th>Nama Pendaftar</th>
              <th>Jenis Kelamin</th>
              <th>Unit Lembaga</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $n=1;
              $dpdf = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE st_pdf='Diterima'");
              while ($df = mysqli_fetch_object($dpdf)){
            ?>
            <tr>
              <td align="center"><?= $n++ ?></td>
              <td><?= strip_tags($df->id_daf); ?></td>
              <td><?= date('d-m-Y', strtotime($df->tg_daf)) ?></td>
              <td><?= strip_tags($df->nm_pdf); ?></td>
              <td><?= strip_tags($df->jk_pdf); ?></td>
              <td><?= strip_tags($df->lb_daf); ?></td>
              <td>
                <?php
                if ($df->st_pdf=='Menunggu') {
                  ?>
                  <span class="badge badge-dark badge-xs">Menunggu</span>
                  <?php
                }else if ($df->st_pdf=='Diterima') {
                  ?>
                  <span class="badge badge-success badge-xs">Diterima</span>
                  <?php
                }else if ($df->st_pdf=='Ditolak') {
                  ?>
                  <span class="badge badge-danger badge-xs">Ditolak</span>
                  <?php }
                ?>
                <a href="c_bukti?idpdf=<?= $df->id_p; ?>" class="badge badge-info badge-xs" target="_blank">Cetak Bukti</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <strong>PSB </strong>Version 3.0
    </div>
    <strong>Powered &reg; 2021 <a href="https://www.youtube.com/channel/UCJ7M12OVk8RbOQQrmLXeriQ" target="_blank">Kang Mahmud</a>.</strong>
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
<script>
$(function () {
  bsCustomFileInput.init();
  $("#data1").DataTable();
});
</script>
</body>
</html>
