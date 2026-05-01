<?php 
include 'pages/header.php';
include '../config/koneksi.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="#" onclick="window.history.go(0);">Laporan</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Rekapitulasi Data</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Sembunyikan">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Tutup">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                	<table class="table table-hover table-sm">
                   <thead>
                     <tr>
                       <th align="center">No.</th>
                       <th>Unit Lembaga</th>
                       <th align="center">Putra</th>
                       <th align="center">Putri</th>
                       <th align="center">Jumlah</th>
                     </tr>
                   </thead>
                   <tbody>
                      <?php
                      $no=1;
                      $Rekap=mysqli_query($conn, "SELECT * FROM tb_daftar GROUP BY lb_daf");
                      while ($row=mysqli_fetch_object($Rekap)) {
                      ?>
                      <tr>
                         <td align="center"><?= $no++; ?></td>
                         <td><small><?= $row->lb_daf; ?></small></td>
                         <td align="center">
                           <?php
                           $lbg=$row->lb_daf;
                           $Putra=mysqli_query($conn, "SELECT COUNT(jk_pdf) AS putra FROM tb_daftar WHERE lb_daf='$lbg' && jk_pdf='Laki-laki'
                           ");
                           $pa=mysqli_fetch_object($Putra);
                           echo $pa->putra;
                           ?>
                         </td>
                         <td align="center">
                           <?php
                           $Putri=mysqli_query($conn, "SELECT COUNT(jk_pdf) AS putri FROM tb_daftar WHERE lb_daf='$lbg' && jk_pdf='Perempuan'
                           ");
                           $pi=mysqli_fetch_object($Putri);
                           echo $pi->putri;
                           ?>
                         </td>
                         <td align="center">
                           <?php
                           $Total=mysqli_query($conn, "SELECT COUNT(id_p) AS total FROM tb_daftar WHERE lb_daf='$lbg'");
                           $tt=mysqli_fetch_object($Total);
                           echo $tt->total;
                           ?>
                         </td>
                      </tr>
                      <?php } ?>
                      <tfoot>
                        <tr>
                          <td align="left">
                            <a href="ekspor/pg_rekap" class="btn btn-sm btn-success">Ekspor</a>
                          </td>
                          <td align="right"><b>Total Pendaftar</b></td>
                          <td colspan="3" align="center">
                           <b>
                            <?php
                              $Semua=mysqli_query($conn, "SELECT COUNT(id_p) AS semua FROM tb_daftar");
                              $sm=mysqli_fetch_object($Semua);
                              echo $sm->semua;
                            ?>
                           </b>
                          </td>
                        </tr>
                      </tfoot>
                   </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Download Data Pendaftar</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Sembunyikan">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Tutup">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-sm">
                   <thead>
                     <tr>
                       <th align="center">No.</th>
                       <th>Unit Lembaga</th>
                       <th align="center">Download</th>
                     </tr>
                   </thead>
                   <tbody>
                        <?php
                        $no=1;
                        $Unduh=mysqli_query($conn, "SELECT * FROM tb_daftar GROUP BY lb_daf");
                        while ($rows=mysqli_fetch_object($Unduh)) {
                        ?>
                        <tr>
                          <td align="center"><?= $no++; ?></td>
                          <td><small><?= $rows->lb_daf; ?></small></td>
                          <td align="center">
                            <a href="ekspor/pg_ekspdf?lembaga=<?= $rows->lb_daf; ?>"><i class="fas fa-cloud-download-alt"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tfoot>
                   </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Download Berkas Pendaftar</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Sembunyikan">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Tutup">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-sm">
                   <thead>
                     <tr>
                       <th align="center">No.</th>
                       <th>Unit Lembaga</th>
                       <th align="center">Download</th>
                     </tr>
                   </thead>
                   <tbody>
                        <?php
                        $no=1;
                        $Unduh=mysqli_query($conn, "SELECT * FROM tb_daftar GROUP BY lb_daf");
                        while ($rows=mysqli_fetch_object($Unduh)) {
                        ?>
                        <tr>
                          <td align="center"><?= $no++; ?></td>
                          <td><small><?= $rows->lb_daf; ?></small></td>
                          <td align="center">
                            <a href="ekspor/pg_eksberkas?lembaga=<?= $rows->lb_daf; ?>"><i class="fas fa-cloud-download-alt"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tfoot>
                   </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'pages/footer.php';
include 'modals/md_logout.php';
?>
<script>  
  function logout_modal(logout_url)
  {
  $('#modal_logout').modal('show', {backdrop: 'static'});
  document.getElementById('logout_link').setAttribute('href' , logout_url);
  }
</script>