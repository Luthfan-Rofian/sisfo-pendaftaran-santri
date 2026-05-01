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
                  $Spdf = mysqli_query($conn, "SELECT COUNT(id_daf) AS semua FROM tb_daftar WHERE lb_daf='$lembaga'");
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
                  $Mpdf = mysqli_query($conn, "SELECT COUNT(id_daf) AS tunggu FROM tb_daftar WHERE st_pdf='Menunggu' && lb_daf='$lembaga'");
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
                  $Dapdf = mysqli_query($conn, "SELECT COUNT(id_daf) AS terima FROM tb_daftar WHERE st_pdf='Diterima' && lb_daf='$lembaga'");
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
                  $Dtpdf = mysqli_query($conn, "SELECT COUNT(id_daf) AS tolak FROM tb_daftar WHERE st_pdf='Ditolak' && lb_daf='$lembaga'");
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
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">           
                Selamat datang admin lembaga <b><strong><?= $_SESSION['nm_user']; ?></strong></b> <br>
                Silahkan lengkapi data lembaga di bawah ini sesuai dengan keadaan lembaga yang sebenarnya
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                Silahkan unduh panduan <br>
                <a href="../assets/files/panduan_admin_lembaga.pdf" target="_blank">Di sini</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-sm-3 col-md-3">
            <div class="card card-outline card-indigo">
            </div>
          </div>
          <div class="col-12 col-sm-3 col-md-9">
            <div class="card card-outline card-primary">
            </div>
          </div>


          <?php
          $Lembaga = "SELECT * FROM tb_lembaga WHERE nm_lembaga='$lembaga'";
          $QLembaga = mysqli_query($conn, $Lembaga);
          $tl=mysqli_fetch_object($QLembaga);
          ?>

          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../assets/images/lembaga/<?= $tl->lg_lembaga; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Logo</h3>

                <a class="btn btn-primary btn-block" id="tb_elglembaga" href="#" data-toggle="modal" data-target="#md_elglembaga" 
                data-id_l="<?= $tl->id_lembaga; ?>"
                data-lg_l="<?= $tl->lg_lembaga; ?>"
                >Ubah</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../assets/images/lembaga/<?= $tl->br_lembaga; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Brosur</h3>

                <a class="btn btn-primary btn-block" id="tb_ebrlembaga" href="#" data-toggle="modal" data-target="#md_ebrlembaga" 
                data-id_l="<?= $tl->id_lembaga; ?>"
                data-br_l="<?= $tl->br_lembaga; ?>"
                >Ubah</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../assets/images/lembaga/<?= $tl->by_lembaga; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Rincian Biaya</h3>

                <a class="btn btn-primary btn-block" id="tb_ebylembaga" href="#" data-toggle="modal" data-target="#md_ebylembaga" 
                data-id_l="<?= $tl->id_lembaga; ?>"
                data-by_l="<?= $tl->by_lembaga; ?>"
                >Ubah</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../assets/images/lembaga/<?= $tl->spj_lembaga; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Pakta Integritas</h3>

                <a class="btn btn-info btn-block" id="tb_espjlembaga" href="#" data-toggle="modal" data-target="#md_espjlembaga" 
                data-id_ls="<?= $tl->id_lembaga; ?>"
                data-spj_l="<?= $tl->spj_lembaga; ?>"
                >Ubah JPG</a>

                <a class="btn btn-danger btn-block" id="tb_espplembaga" href="#" data-toggle="modal" data-target="#md_espplembaga" 
                data-id_ls="<?= $tl->id_lembaga; ?>"
                data-spp_l="<?= $tl->spp_lembaga; ?>"
                >Ubah PDF</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2"><b>Data Lembaga</b>
                <button onclick="window.location='pg_yayasan'" class="btn btn-success btn-xs float-right">
                  <i class="fas fa-arrow-left"></i> Kembali</button>
                </div>
              <div class="card-body">
                <table class="table table-sm">
                  <form action="a_elembaga.php" method="post">
                    <input type="hidden" name="id_lembaga" value="<?= $tl->id_lembaga; ?>">
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Nama Lembaga</b></td>
                      <td><input type="text" name="nm_lembaga" value="<?= $tl->nm_lembaga; ?>" class="form-control" readonly /></td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Singkatan</b></td>
                      <td><input type="text" name="sk_lembaga" value="<?= $tl->sk_lembaga; ?>" class="form-control" required /></td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Tingkat</b></td>
                      <td>
                        <select class="form-control" name="tk_lembaga" required />
                            <option value="<?= $tl->tk_lembaga; ?>"><?= $tl->tk_lembaga; ?></option>
                            <option value="TK">TK</option>
                            <option value="SD">SD</option>
                            <option value="SLTP">SLTP</option>
                            <option value="SLTA">SLTA</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Kontak 1</b></td>
                      <td><input type="text" name="n1_lembaga" value="<?= $tl->n1_lembaga; ?>" class="form-control" required /></td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>No. Hp. 1</b></td>
                      <td><input type="text" name="k1_lembaga" value="<?= $tl->k1_lembaga; ?>" class="form-control" required /></td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Kontak 2</b></td>
                      <td><input type="text" name="n2_lembaga" value="<?= $tl->n2_lembaga; ?>" class="form-control" required /></td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>No. Hp. 2</b></td>
                      <td><input type="text" name="k2_lembaga" value="<?= $tl->k2_lembaga; ?>" class="form-control" required /></td>
                    </tr>
                    <?php
                    $Gll = mysqli_query($conn, "SELECT * FROM tb_gelombang");
                    $glmb = mysqli_fetch_object($Gll);
                    ?>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Gelombang</b></td>
                      <td><input type="text" name="gl_lembaga" value="<?= $glmb->st_gelombang; ?>" class="form-control" readonly /></td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Uang Pendaftaran</b></td>
                      <td><input type="text" name="ug_lembaga" value="<?= $tl->ug_lembaga; ?>" class="form-control" required /></td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Tentang</b></td>
                      <td><textarea name="tt_lembaga" class="form-control" id="summernote"><?= $tl->tt_lembaga; ?></textarea></td>
                    </tr>
                    <tr><td colspan="2">                      
                      <input type="submit" class="btn btn-success float-right" name="edit" value="Ubah Data">
                    </td></tr>
                  </form>
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'pages/footer.php';
include 'modals/md_elglembaga.php';
include 'modals/md_ebrlembaga.php';
include 'modals/md_ebylembaga.php';
include 'modals/md_esplembaga.php';
include 'modals/md_logout.php';

  if(@$_SESSION['pesan_login_sukses']){ ?>
    <script>
      toastr.success('<?php echo $_SESSION['pesan_login_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_login_sukses']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_s']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_lembaga_edit_s']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_s']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_g']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_lembaga_edit_g']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_g']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_lg_ok']){ ?>
    <script>
      toastr.info('<?= $_SESSION['pesan_lembaga_edit_lg_ok']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_lg_ok']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_lg_g']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_lembaga_edit_lg_g']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_lg_g']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_br_ok']){ ?>
    <script>
      toastr.info('<?= $_SESSION['pesan_lembaga_edit_br_ok']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_br_ok']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_br_g']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_lembaga_edit_br_g']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_br_g']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_by_ok']){ ?>
    <script>
      toastr.info('<?= $_SESSION['pesan_lembaga_edit_by_ok']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_by_ok']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_by_g']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_lembaga_edit_by_g']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_by_g']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_spj_ok']){ ?>
    <script>
      toastr.info('<?= $_SESSION['pesan_lembaga_edit_spj_ok']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_spj_ok']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_spj_g']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_lembaga_edit_spj_g']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_spj_g']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_spp_ok']){ ?>
    <script>
      toastr.info('<?= $_SESSION['pesan_lembaga_edit_spp_ok']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_spp_ok']); 
  }

  if(@$_SESSION['pesan_lembaga_edit_spp_g']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_lembaga_edit_spp_g']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_edit_spp_g']); 
  }

?>
<script>

  $(function () {
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Menunggu',
          'Diterima',
          'Ditolak',
      ],
      datasets: [
        {
          data: [700,500,400],
          backgroundColor : ['#3c8dbc', '#00a65a', '#f56954'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  })
    $(document).on("click", "#tb_elglembaga", function(){
      let id_l = $(this).data('id_l');
      let lg_l = $(this).data('lg_l');

      $("#md_elglembaga #id_lembaga").val(id_l);
      $("#md_elglembaga #lg_lembaga").attr("src", "../assets/images/lembaga/"+lg_l);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_elglembaga',
            type : 'POST',
            data : new FormData(this),
            contentType : false,
            cache : false,
            processData : false,
            success : function(msg){
                $('.table').html(msg);
            }
        });
    });
    })

    $(document).on("click", "#tb_ebrlembaga", function(){
      let id_l = $(this).data('id_l');
      let br_l = $(this).data('br_l');

      $("#md_ebrlembaga #id_lembaga").val(id_l);
      $("#md_ebrlembaga #br_lembaga").attr("src", "../assets/images/lembaga/"+br_l);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_ebrlembaga',
            type : 'POST',
            data : new FormData(this),
            contentType : false,
            cache : false,
            processData : false,
            success : function(msg){
                $('.table').html(msg);
            }
        });
    });
    })

    $(document).on("click", "#tb_ebylembaga", function(){
      let id_l = $(this).data('id_l');
      let by_l = $(this).data('by_l');

      $("#md_ebylembaga #id_lembaga").val(id_l);
      $("#md_ebylembaga #by_lembaga").attr("src", "../assets/images/lembaga/"+by_l);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_ebylembaga',
            type : 'POST',
            data : new FormData(this),
            contentType : false,
            cache : false,
            processData : false,
            success : function(msg){
                $('.table').html(msg);
            }
        });
    });
    })

    $(document).on("click", "#tb_espjlembaga", function(){
      let id_ls = $(this).data('id_ls');
      let spj_l = $(this).data('spj_l');

      $("#md_espjlembaga #id_lembaga").val(id_ls);
      $("#md_espjlembaga #spj_lembaga").attr("src", "../assets/images/lembaga/"+spj_l);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_espjlembaga',
            type : 'POST',
            data : new FormData(this),
            contentType : false,
            cache : false,
            processData : false,
            success : function(msg){
                $('.table').html(msg);
            }
        });
    });
    })

    $(document).on("click", "#tb_espplembaga", function(){
      let id_ls = $(this).data('id_ls');
      let spp_l = $(this).data('spp_l');

      $("#md_espplembaga #id_lembaga").val(id_ls);
      $("#md_espplembaga #spp_lembaga").attr("src", "../assets/images/lembaga/"+spp_l);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_espplembaga',
            type : 'POST',
            data : new FormData(this),
            contentType : false,
            cache : false,
            processData : false,
            success : function(msg){
                $('.table').html(msg);
            }
        });
    });
    })
  
  function logout_modal(logout_url)
  {
  $('#modal_logout').modal('show', {backdrop: 'static'});
  document.getElementById('logout_link').setAttribute('href' , logout_url);
  }
</script>