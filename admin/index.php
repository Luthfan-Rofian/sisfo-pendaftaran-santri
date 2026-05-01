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
            <h1 class="m-0">Beranda</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="#" onclick="window.history.go(0);">Beranda</a></li>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo">
              <div class="inner">
                <?php
                  $Spdf = mysqli_query($conn, "SELECT COUNT(id_daf) AS semua FROM tb_daftar");
                  $sm = mysqli_fetch_object($Spdf);
                ?>
                <h3><?= $sm->semua; ?></h3>

                <p>Pendaftar</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-circle"></i>
              </div>
              <a href="pg_pendaftar" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                  $Mpdf = mysqli_query($conn, "SELECT COUNT(id_daf) AS tunggu FROM tb_daftar WHERE st_pdf='Menunggu'");
                  $mn = mysqli_fetch_object($Mpdf);
                ?>
                <h3><?= $mn->tunggu; ?></h3>

                <p>Menunggu</p>
              </div>
              <div class="icon">
                <i class="fas fa-pause-circle"></i>
              </div>
              <a href="pg_menunggu" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
              <div class="inner">
                <?php
                  $Dapdf = mysqli_query($conn, "SELECT COUNT(id_daf) AS terima FROM tb_daftar WHERE st_pdf='Diterima'");
                  $da = mysqli_fetch_object($Dapdf);
                ?>
                <h3><?= $da->terima; ?></h3>

                <p>Diterima</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-circle"></i>
              </div>
              <a href="pg_diterima" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-fuchsia">
              <div class="inner">
                <?php
                  $Dtpdf = mysqli_query($conn, "SELECT COUNT(id_daf) AS tolak FROM tb_daftar WHERE st_pdf='Ditolak'");
                  $dt = mysqli_fetch_object($Dtpdf);
                ?>
                <h3><?= $dt->tolak; ?></h3>

                <p>Ditolak</p>
              </div>
              <div class="icon">
                <i class="fas fa-times-circle"></i>
              </div>
              <a href="pg_ditolak" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-12 col-sm-3 col-md-3">
            <div class="card card-outline card-indigo">
            </div>
          </div>
          <div class="col-12 col-sm-3 col-md-3">
            <div class="card card-outline card-primary">
            </div>
          </div>
          <div class="col-12 col-sm-3 col-md-3">
            <div class="card card-outline card-teal">
            </div>
          </div>
          <div class="col-12 col-sm-3 col-md-3">
            <div class="card card-outline card-fuchsia">
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-6">
            <div class="card card-outline card-indigo">
              <div class="card-header">
                <h3 class="card-title">Statistik Info PSB</h3>

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
                <canvas id="InfoPSB" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Statistik Alasan Mondok</h3>

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
                <canvas id="Alasan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="card card-outline card-teal">
              <div class="card-header">
                <h3 class="card-title">Statistik Kabupaten</h3>

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
                <?php
                $Kota = mysqli_query($conn, "SELECT DISTINCT kota FROM tb_daftar");
                while ($Kab=mysqli_fetch_array($Kota)) {
                ?>
                <?php echo $Kab['kota']; ?>           
                <br/>                 
                <div class="progress">
                  <?php
                  $CKota = mysqli_query($conn, "SELECT COUNT(kota) AS kab FROM tb_daftar WHERE kota='".$Kab['kota']."'");
                  $Count=mysqli_fetch_array($CKota);
                  ?>
                  <div class="progress-bar" style="background-color: #00fa9a; color: #000000" role="progressbar" aria-valuenow="<?php echo $Count['kab']; ?>" aria-valuemin="0" aria-valuemax="1000"><strong><?php echo $Count['kab']; ?></strong></div>
                </div>                 
                <br/>          
                <?php } ?>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="card card-outline card-pink">
              <div class="card-header">
                <h3 class="card-title">Statistik Kecamatan</h3>

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
                <?php
                $PKec = mysqli_query($conn, "SELECT DISTINCT kecamatan FROM tb_daftar");
                while ($Kec=mysqli_fetch_array($PKec)) {
                ?>
                <?php echo $Kec['kecamatan']; ?>           
                <br/>                 
                <div class="progress">
                  <?php
                  $CKec = mysqli_query($conn, "SELECT COUNT(kecamatan) AS kec FROM tb_daftar WHERE kecamatan='".$Kec['kecamatan']."'");
                  $Count=mysqli_fetch_array($CKec);
                  ?>
                  <div class="progress-bar" style="background-color: #00fa9a; color: #000000" role="progressbar" aria-valuenow="<?php echo $Count['kec']; ?>" aria-valuemin="0" aria-valuemax="1000"><strong><?php echo $Count['kec']; ?></strong></div>
                </div>                 
                <br/>          
                <?php } ?>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-12 col-md-12">
            <div class="card card-outline card-dark">
              <div class="card-header">
                <h3 class="card-title">User Login</h3>

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
                  <?php
                  $lama = 7; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 5 hari
                   
                  // proses untuk melakukan penghapusan data
                   
                  $query = "DELETE FROM tb_logs WHERE DATEDIFF(CURDATE(), wk_logs) > $lama";
                  $hasil = mysqli_query($conn, $query);
                  ?>
         
                  <?php
                    $no=1;
                    // Menampilkan data berdasarkan table logs yang tanggalnya kurang dari 5 hari
                    $sql="SELECT * From tb_logs WHERE nm_logs!='' && rl_logs!=''";
                    $tampil = mysqli_query($conn, $sql);
                  ?>
                  <table id="data" class="table table-borderles table-sm">
                    <thead>
                      <tr class="bg-secondary text-light">
                        <th><small>No.</small></th>
                        <th><small>Nama</small></th>
                        <th><small>Waktu</small></th>
                        <th><small>Role</small></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($s=mysqli_fetch_array($tampil)) { ?>
                      <tr>
                        <td><small><?= $no++; ?>.</small></td>
                        <td><small><?= $s['nm_logs']; ?></small></td>
                        <td><small><?= $s['wk_logs']; ?></small></td>
                        <td><small><?= $s['rl_logs']; ?></small></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot><tr><td colspan="4"></td></tr></tfoot>
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
    </section>
    <section>
      <?php include 'modals/md_logout.php'; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'pages/footer.php';

  if(@$_SESSION['pesan_login_sukses']){ ?>
    <script>
      toastr.success('<?php echo $_SESSION['pesan_login_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_login_sukses']); 
  }

?>
<script>

    var ctx = document.getElementById("InfoPSB").getContext('2d');
    var InfoPSB = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
          'Kerabat',
          'Banner',
          'Brosur',
          'Medsos',
          'Baksos',
          'Pengajian',
          'Lainnya',
        ],
        datasets: [{
          label: '',
          data: [

          <?php
          $Kerabat = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Tetangga/Keluarga/Kerabat/Teman'");
          echo mysqli_num_rows($Kerabat);
          ?>,
          <?php
          $Banner = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Spanduk/Banner/Baliho PP Romu'");
          echo mysqli_num_rows($Banner);
          ?>,
          <?php
          $Brosur = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Brosur Pendaftaran'");
          echo mysqli_num_rows($Brosur);
          ?>,
          <?php
          $Medsos = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Media Sosial'");
          echo mysqli_num_rows($Medsos);
          ?>,
          <?php
          $Baksos = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Kegiatan Bakti Sosial'");
          echo mysqli_num_rows($Baksos);
          ?>,
          <?php
          $Pengajian = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Pengajian'");
          echo mysqli_num_rows($Pengajian);
          ?>,
          <?php
          $Lainnya = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Lainnya'");
          echo mysqli_num_rows($Lainnya);
          ?>

          ],
          backgroundColor: ['#3c8dbc', '#00a65a', '#f56954', '#a52a2a', '#800080', '#f5f5dc', '#2f4f4f'],
          borderColor: ['#3c8dbc', '#00a65a', '#f56954', '#a52a2a', '#800080', '#f5f5dc', '#2f4f4f'],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });

  // $(function () {
  //   var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  //   var donutData        = {
  //     labels: [
  //         'Kerabat',
  //         'Banner',
  //         'Brosur',
  //         'Medsos',
  //         'Baksos',
  //         'Lainnya',
  //     ],
  //     datasets: [
  //       {
  //         data: [

  //             <?php
  //             $Kerabat = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Tetangga/Keluarga/Kerabat/Teman'");
  //             echo mysqli_num_rows($Kerabat);
  //             ?>,
  //             <?php
  //             $Banner = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Spanduk/Banner/Baliho PP Romu'");
  //             echo mysqli_num_rows($Banner);
  //             ?>,
  //             <?php
  //             $Brosur = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Brosur Pendaftaran'");
  //             echo mysqli_num_rows($Brosur);
  //             ?>,
  //             <?php
  //             $Medsos = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Media Sosial'");
  //             echo mysqli_num_rows($Medsos);
  //             ?>,
  //             <?php
  //             $Baksos = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Kegiatan Bakti Sosial'");
  //             echo mysqli_num_rows($Baksos);
  //             ?>,
  //             <?php
  //             $Lainnya = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Lainnya'");
  //             echo mysqli_num_rows($Lainnya);
  //             ?>

  //             ],
  //         backgroundColor : ['#3c8dbc', '#00a65a', '#f56954', '#a52a2a', '#800080', '#2f4f4f'],
  //       }
  //     ]
  //   }
  //   var donutOptions     = {
  //     maintainAspectRatio : false,
  //     responsive : true,
  //   }
  //   //Create pie or douhnut chart
  //   // You can switch between pie and douhnut using the method below.
  //   new Chart(donutChartCanvas, {
  //     type: 'doughnut',
  //     data: donutData,
  //     options: donutOptions
  //   })
  // })
  
    var ctx = document.getElementById("Alasan").getContext('2d');
    var Alasan = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
          'Orangtua',
          'Sendiri',
          'Lainnya',
        ],
        datasets: [{
          barThickness: 40,
          label: '',
          data: [

          <?php
          $Orangtua = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE al_mondok = 'Keinginan Orangtua'");
          echo mysqli_num_rows($Orangtua);
          ?>,
          <?php
          $Sendiri = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE al_mondok = 'Keinginan Sendiri'");
          echo mysqli_num_rows($Sendiri);
          ?>,
          <?php
          $Lainnya = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE info_psb = 'Lainnya'");
          echo mysqli_num_rows($Lainnya);
          ?>

          ],
          backgroundColor: ['#d0696e', '#006400', '#2f4f4f'],
          borderColor: ['#d2691e', '#006400', '#2f4f4f'],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  
  function logout_modal(logout_url)
  {
  $('#modal_logout').modal('show', {backdrop: 'static'});
  document.getElementById('logout_link').setAttribute('href' , logout_url);
  }
</script>