<?php
error_reporting(0);
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
            <h1 class="m-0">Pengaturan Aplikasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item"><a href="#" onclick="window.history.go(0);">Pengaturan</a></li>
              <li class="breadcrumb-item active">Aplikasi</li>
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
          <div class="col-sm-6">
            <!-- Default box -->
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Pengaturan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="" onclick="window.location='pg_app'" title="Reload">
                    <i class="fas fa-circle-notch"></i>
                  </button>
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
                  <table class="table table-borderles table-sm">
                    <?php
                    $tomboladmin = mysqli_query($conn, "SELECT * FROM tb_tbladm");
                    $ta = mysqli_fetch_object($tomboladmin);
                    ?>
                    <tr>
                      <td>Tombol Admin</td>
                      <td>
                          <?php
                          $buka=$ta->st;
                          if ($buka=='buka') {
                            ?><span class="badge badge-success">Ditampilkan</span><?php
                          }else{
                            ?><span class="badge badge-dark">Disembunyikan</span><?php
                          }
                          ?>
                      </td>
                      <td class="text-light">
                        <a class="fas fa-pencil-alt text-success float-right" id="tb_etbladm"
                        href="#" data-toggle="modal" data-target="#md_etbladm" 
                        data-id_t="<?= $ta->id; ?>"
                        data-st_t="<?= $ta->st; ?>"
                        ></a>
                      </td>
                    </tr>

                    <?php
                    $gelombang = mysqli_query($conn, "SELECT * FROM tb_gelombang");
                    $tg = mysqli_fetch_object($gelombang);
                    ?>
                    <tr>
                      <td>Ubah Gelombang</td>
                      <td>
                        <?php
                        $gel=$tg->st_gelombang;
                        if ($gel==1) { ?>
                          <span class="badge bg-fuchsia">Gelombang <?= $gel; ?></span>
                        <?php }if ($gel==2) { ?>
                          <span class="badge bg-purple">Gelombang <?= $gel; ?></span>
                        <?php }if ($gel==3) { ?>
                          <span class="badge bg-indigo">Gelombang <?= $gel; ?></span>
                        <?php }if ($gel>=4) { ?>
                          <span class="badge bg-navy">Gelombang <?= $gel; ?></span>
                        <?php } ?>
                      </td>
                      <td>
                        <a class="fas fa-pencil-alt text-success float-right" id="tb_egelombang"
                        href="#" data-toggle="modal" data-target="#md_egelombang" 
                        data-id_g="<?= $tg->id_gelombang; ?>"
                        data-st_g="<?= $tg->st_gelombang; ?>"
                        ></a>
                      </td>
                    </tr>

                    <?php
                    $maintenance = mysqli_query($conn, "SELECT * FROM tb_maintenance");
                    $tm = mysqli_fetch_object($maintenance);
                    ?>
                    <tr>
                      <td>Formulir Pendaftaran</td>
                      <td>
                          <?php
                          $aktif=$tm->aw_main;
                          if ($aktif=='buka') {
                            ?><span class="badge badge-success">Dibuka</span><?php
                          }else{
                            ?><span class="badge badge-dark">Ditutup</span><?php
                          }
                          ?>
                      </td>
                      <td>
                        <a class="fas fa-pencil-alt text-success float-right" id="tb_emain"
                        href="#" data-toggle="modal" data-target="#md_emain" 
                        data-id_m="<?= $tm->id_main; ?>"
                        data-ps_m="<?= $tm->ps_main; ?>"
                        data-aw_m="<?= $tm->aw_main; ?>"
                        data-ak_m="<?= $tm->ak_main; ?>"
                        ></a>
                      </td>
                    </tr>
                    <?php
                    $notifikasi = mysqli_query($conn, "SELECT * FROM tb_notif_depan");
                    $tnd = mysqli_fetch_object($notifikasi);
                    ?>
                    <tr>
                      <td>Pop Up Depan</td>
                      <td>
                          <?php
                          $buka=$tnd->st_nd;
                          if ($buka=='buka') {
                            ?><span class="badge badge-success">Dibuka</span><?php
                          }else{
                            ?><span class="badge badge-dark">Ditutup</span><?php
                          }
                          ?>
                      </td>
                      <td>
                        <a class="fas fa-pencil-alt text-success float-right" id="tb_e_nd"
                        href="#" data-toggle="modal" data-target="#md_e_nd"
                        data-id_nd="<?= $tnd->id_nd ?>"
                        data-st_nd="<?= $tnd->st_nd ?>"
                        data-jd_nd="<?= $tnd->jd_nd ?>"
                        data-sf_nd="<?= $tnd->sf_nd ?>"
                        data-tg_nd="<?= $tnd->tg_nd ?>"
                        data-ct_nd="<?= $tnd->ct_nd ?>"
                        data-at_nd="<?= $tnd->at_nd ?>"
                        ></a>
                      </td>
                    </tr>
                    <tr><td colspan="3"></td></tr>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-sm-6">
            <!-- Default box -->
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">Reset Data</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="" onclick="window.location='pg_app'" title="Reload">
                    <i class="fas fa-circle-notch"></i>
                  </button>
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
                  <p class="text-danger"><b>PERHATIAN !!</b> Tombol Reset akan menghapus seluruh data pendaftar tanpa konfirmasi. Pastikan data pendaftar yang akan direset sudah dibackup</p>
                  <table class="table table-borderles table-sm">
                    <tr>
                      <td>Reset Pendaftar</td>
                      <td></td>
                      <td>
                        <?php
                          $pdfmn = mysqli_query($conn, "SELECT * FROM tb_daftar");
                          $rmn=mysqli_fetch_object($pdfmn);
                        ?>
                        <a href="rst_data?idpdf=<?= $rmn->id_p; ?>" class="fas fa-pencil-alt text-danger float-right"></a>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'pages/footer.php';
include 'modals/md_etbladm.php';
include 'modals/md_emain.php';
include 'modals/md_egelombang.php';
include 'modals/md_e_nd.php';
include 'modals/md_logout.php';
  
  if(@$_SESSION['pesan_tbladm_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_tbladm_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_tbladm_sukses']); 
  }

  if(@$_SESSION['pesan_tbladm_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_tbladm_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_tbladm_gagal']); 
  }
  
  if(@$_SESSION['pesan_main_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_main_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_main_sukses']); 
  }

  if(@$_SESSION['pesan_main_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_main_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_main_gagal']); 
  }
  
  if(@$_SESSION['pesan_gelombang_edit_s']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_gelombang_edit_s']; ?>')
    </script>
  <?php unset($_SESSION['pesan_gelombang_edit_s']); 
  }

  if(@$_SESSION['pesan_gelombang_edit_g']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_gelombang_edit_g']; ?>')
    </script>
  <?php unset($_SESSION['pesan_gelombang_edit_g']); 
  }
  
  if(@$_SESSION['pesan_nd_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_nd_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_nd_sukses']); 
  }

  if(@$_SESSION['pesan_nd_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_nd_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_nd_gagal']); 
  }

  if(@$_SESSION['pesan_sukses_reset']){ ?>
    <script>
      toastr.info('<?= $_SESSION['pesan_sukses_reset']; ?>')
    </script>
  <?php unset($_SESSION['pesan_sukses_reset']); 
  }
  
?>

<script>
    $(document).on("click", "#tb_etbladm", function(){
      let id_t = $(this).data('id_t');
      let st_t = $(this).data('st_t');

      $("#md_etbladm #id").val(id_t);
      $("#md_etbladm #st").val(st_t);
    })

    $(document).ready(function(e){
      $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
          url : 'a_etbladm.php',
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

    $(document).on("click", "#tb_emain", function(){
      let id_m = $(this).data('id_m');
      let ps_m = $(this).data('ps_m');
      let aw_m = $(this).data('aw_m');
      let ak_m = $(this).data('ak_m');

      $("#md_emain #id_main").val(id_m);
      $("#md_emain #ps_main").val(ps_m);
      $("#md_emain #aw_main").val(aw_m);
      $("#md_emain #ak_main").val(ak_m);
    })

    $(document).ready(function(e){
      $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
          url : 'a_emain.php',
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

    $(document).on("click", "#tb_egelombang", function(){
      let id_g = $(this).data('id_g');
      let st_g = $(this).data('st_g');

      $("#md_egelombang #id_gelombang").val(id_g);
      $("#md_egelombang #st_gelombang").val(st_g);
    })

    $(document).ready(function(e){
      $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
          url : 'a_egelombang.php',
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

    $(document).on("click", "#tb_e_nd", function(){
      let id_nd = $(this).data('id_nd');
      let st_nd = $(this).data('st_nd');
      let jd_nd = $(this).data('jd_nd');
      let sf_nd = $(this).data('sf_nd');
      let tg_nd = $(this).data('tg_nd');
      let ct_nd = $(this).data('ct_nd');
      let at_nd = $(this).data('at_nd');

      $("#md_e_nd #id_nd").val(id_nd);
      $("#md_e_nd #st_nd").val(st_nd);
      $("#md_e_nd #jd_nd").val(jd_nd);
      $("#md_e_nd #sf_nd").val(sf_nd);
      $("#md_e_nd #tg_nd").val(tg_nd);
      $("#md_e_nd #ct_nd").val(ct_nd);
      $("#md_e_nd #at_nd").val(at_nd);
    })

    $(document).ready(function(e){
      $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
          url : 'a_e_nd.php',
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