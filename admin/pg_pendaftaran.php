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
            <h1 class="m-0">Pengaturan Pendaftaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item"><a href="#" onclick="window.history.go(0);">Pengaturan</a></li>
              <li class="breadcrumb-item active">Pendaftaran</li>
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
          <div class="col-sm-6 col-md-12">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  Pengaturan
                </h3>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Data Pendaftaran</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Prosedur Pendaftaran</a>
                  </li>
                </ul>
                <div class="tab-custom-content"></div>
                <div class="tab-content" id="custom-content-above-tabContent">
                  <div class="tab-pane fade show active" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                    <div class="table-responsive">
                      <table class="table table-borderles table-sm">
                        <?php
                        $ppdb = mysqli_query($conn, "SELECT * FROM tb_ppdb");
                        $tp = mysqli_fetch_object($ppdb);
                        ?>
                        <input style="color: green;" type="hidden" name="id_pdf" value="<?= $tp->id_pdf; ?>">
                        <tr>
                          <td class="bg-light text-right" width="25%">Nama Pendaftaran</td>
                          <td><?= $tp->lb_pdf; ?> [<?= $tp->sk_pdf; ?>]</td>
                        </tr>
                        <tr>
                          <td class="bg-light text-right" width="25%">Yayasan</td>
                          <td><?= $tp->ys_pdf; ?> Tahun Ajaran <?= $tp->th_pdf; ?></td>
                        </tr>
                        <tr>
                          <td class="bg-light text-right" width="25%">Kontak 1</td>
                          <td><?= $tp->n1_pdf; ?> - <?= $tp->k1_pdf; ?></td>
                        </tr>
                        <tr>
                          <td class="bg-light text-right" width="25%">Kontak 2</td>
                          <td><?= $tp->n2_pdf; ?> - <?= $tp->k2_pdf; ?></td>
                        </tr>
                        <tr>
                          <td class="bg-light text-right" width="25%">Link Facebook</td>
                          <td><a href="<?= $tp->fb_pdf; ?>" target="_blank"><?= $tp->fb_pdf; ?></a></td>
                        </tr>
                        <tr>
                          <td class="bg-light text-right" width="25%">Link Youtube</td>
                          <td><a href="<?= $tp->yt_pdf; ?>" target="_blank"><?= $tp->yt_pdf; ?></a></td>
                        </tr>
                        <tr>
                          <td class="bg-light text-right" width="25%">Link Instagram</td>
                          <td><a href="<?= $tp->ig_pdf; ?>" target="_blank"><?= $tp->ig_pdf; ?></a></td>
                        </tr>
                        <tr>
                          <td class="bg-light text-right" width="25%">No. WA</td>
                          <td><?= $tp->wa_pdf; ?></td>
                        </tr>
                        <tr>
                          <td class="bg-light text-right" width="25%">Rekening</td>
                          <td><?= $tp->nr_pdf; ?> - <?= $tp->rk_pdf; ?> - <?= $tp->ar_pdf; ?></td>
                        </tr>
                        <tr>
                          <td class="bg-light text-right" width="25%">Sekretariat</td>
                          <td><?= $tp->a1_pdf; ?></td>
                        </tr>
                        <!--<tr>
                          <td class="bg-light text-right" width="25%">Sekretariat 2</td>
                          <td><?= $tp->a2_pdf; ?></td>
                        </tr>-->
                        <tr><td colspan="2"></td></tr>
                      </table>
                    </div>
                    <a href="#" class="btn btn-success float-sm-right badge-xs" id="td_ependaftaran" data-toggle="modal" data-target="#md_ependaftaran" 
                    data-id="<?= $tp->id_pdf; ?>"
                    data-lb="<?= $tp->lb_pdf; ?>"
                    data-sk="<?= $tp->sk_pdf; ?>"
                    data-ys="<?= $tp->ys_pdf; ?>"
                    data-th="<?= $tp->th_pdf; ?>"
                    data-n1="<?= $tp->n1_pdf; ?>"
                    data-k1="<?= $tp->k1_pdf; ?>"
                    data-n2="<?= $tp->n2_pdf; ?>"
                    data-k2="<?= $tp->k2_pdf; ?>"
                    data-fb="<?= $tp->fb_pdf; ?>"
                    data-yt="<?= $tp->yt_pdf; ?>"
                    data-ig="<?= $tp->ig_pdf; ?>"
                    data-wa="<?= $tp->wa_pdf; ?>"
                    data-nr="<?= $tp->nr_pdf; ?>"
                    data-rk="<?= $tp->rk_pdf; ?>"
                    data-ar="<?= $tp->ar_pdf; ?>"
                    data-a1="<?= $tp->a1_pdf; ?>"
                    data-a2="<?= $tp->a2_pdf; ?>"
                    >Ubah Data</a>
                  </div>
                  <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                     <form action="a_eprosedur.php" method="post">
                      <div class="table-responsive">
                        <table class="table table-borderles table-sm">
                          <?php
                          $prosedur = mysqli_query($conn, "SELECT * FROM tb_pros");
                          $tr = mysqli_fetch_object($prosedur);
                          ?>
                          <input style="color: green;" type="hidden" name="id_pros" value="<?= $tr->id_pros; ?>">
                          <tr>
                            <td class="bg-light text-right" width="25%">Tanggal Update</td>
                            <td><input type="date" name="tg_pros" value="<?= $tr->tg_pros; ?>" class="form-control"></td>
                          </tr>
                          <tr>
                            <td class="bg-light text-right" width="25%">Tanggal Update</td>
                            <td>
                              <textarea name="is_pros" class="form-control" id="summernote"><?= $tr->is_pros; ?></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td>
                              <input type="submit" name="ubah" value="Ubah Prosedur" class="btn btn-success float-sm-right badge-xs">
                            </td>
                          </tr>
                        </table>
                      </div>
                     </form>
                  </div>
                </div>
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
include 'modals/md_ependaftaran.php';
include 'modals/md_logout.php';

  if(@$_SESSION['pesan_epdf_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_epdf_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_epdf_sukses']); 
  }

  if(@$_SESSION['pesan_epdf_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_epdf_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_epdf_gagal']); 
  }

  if(@$_SESSION['pesan_ubahpros_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_ubahpros_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_ubahpros_sukses']); 
  }

  if(@$_SESSION['pesan_ubahpros_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_ubahpros_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_ubahpros_gagal']); 
  }
  
?>

<script>
    $(document).on("click", "#td_ependaftaran", function(){
      let id = $(this).data('id');
      let lb = $(this).data('lb');
      let sk = $(this).data('sk');
      let ys = $(this).data('ys');
      let th = $(this).data('th');
      let n1 = $(this).data('n1');
      let k1 = $(this).data('k1');
      let n2 = $(this).data('n2');
      let k2 = $(this).data('k2');
      let fb = $(this).data('fb');
      let yt = $(this).data('yt');
      let ig = $(this).data('ig');
      let wa = $(this).data('wa');
      let nr = $(this).data('nr');
      let rk = $(this).data('rk');
      let ar = $(this).data('ar');
      let a1 = $(this).data('a1');
      let a2 = $(this).data('a2');

      $("#md_ependaftaran #id_pdf").val(id);
      $("#md_ependaftaran #lb_pdf").val(lb);
      $("#md_ependaftaran #sk_pdf").val(sk);
      $("#md_ependaftaran #ys_pdf").val(ys);
      $("#md_ependaftaran #th_pdf").val(th);
      $("#md_ependaftaran #n1_pdf").val(n1);
      $("#md_ependaftaran #k1_pdf").val(k1);
      $("#md_ependaftaran #n2_pdf").val(n2);
      $("#md_ependaftaran #k2_pdf").val(k2);
      $("#md_ependaftaran #fb_pdf").val(fb);
      $("#md_ependaftaran #yt_pdf").val(yt);
      $("#md_ependaftaran #ig_pdf").val(ig);
      $("#md_ependaftaran #wa_pdf").val(wa);
      $("#md_ependaftaran #nr_pdf").val(nr);
      $("#md_ependaftaran #rk_pdf").val(rk);
      $("#md_ependaftaran #ar_pdf").val(ar);
      $("#md_ependaftaran #a1_pdf").val(a1);
      $("#md_ependaftaran #a2_pdf").val(a2);
    })
    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_ependaftaran.php',
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