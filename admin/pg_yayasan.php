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
            <h1 class="m-0">Pengaturan Yayasan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item"><a href="#" onclick="window.history.go(0);">Pengaturan</a></li>
              <li class="breadcrumb-item active">Yayasan</li>
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
                <h3 class="card-title">Data Yayasan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="" onclick="window.location='pg_yayasan'" title="Reload">
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
                    $yayasan = mysqli_query($conn, "SELECT * FROM tb_yayasan");
                    $tp = mysqli_fetch_object($yayasan);
                    ?>
                    <tr>
                      <td>Nama Yayasan</td>
                      <td>: <?= $tp->nm_yayasan; ?></td>
                    </tr>
                    <tr>
                      <td>Singkatan</td>
                      <td>: <?= $tp->sk_yayasan; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>: <?= $tp->al_yayasan; ?></td>
                    </tr>
                    <tr>
                      <td>Kabupaten</td>
                      <td>: <?= $tp->kb_yayasan; ?></td>
                    </tr>
                    <tr>
                      <td>Provinsi</td>
                      <td>: <?= $tp->pr_yayasan; ?></td>
                    </tr>
                    <tr>
                      <td>Ketua Yayasan</td>
                      <td>: <?= $tp->kp_yayasan; ?></td>
                    </tr>
                    <tr>
                      <td>Logo</td>
                      <td><img src="../assets/images/<?= $tp->lg_yayasan; ?>" width="60px"></td>
                    </tr>
                    <tr><td colspan="2"></td></tr>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <a class="btn btn-sm btn-success float-right" id="tb_eyayasan"
                href="#" data-toggle="modal" data-target="#md_eyayasan" 
                data-id="<?= $tp->id_yayasan; ?>"
                data-nm="<?= $tp->nm_yayasan; ?>"
                data-sk="<?= $tp->sk_yayasan; ?>"
                data-al="<?= $tp->al_yayasan; ?>"
                data-kb="<?= $tp->kb_yayasan; ?>"
                data-pr="<?= $tp->pr_yayasan; ?>"
                data-kp="<?= $tp->kp_yayasan; ?>"
                data-lg="<?= $tp->lg_yayasan; ?>"
                >Ubah</a>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-sm-6">
            <!-- Default box -->
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Unit Lembaga</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="" onclick="window.location='pg_yayasan'" title="Reload">
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
                <a class="btn btn-sm btn-success mb-1" href="#" data-toggle="modal" data-target="#md_tlembaga">Tambah</a>
                <div class="table-responsive">
                  <table class="table table-borderles table-sm">
                    <tr>
                      <th>No.</th>
                      <th>Nama Lembaga</th>
                      <th>Jenjang</th>
                      <th></th>
                    </tr>
                    <?php
                    $n=1;
                    $Lembaga = "SELECT * FROM tb_lembaga ORDER BY tk_lembaga ASC";
                    $QLembaga = mysqli_query($conn, $Lembaga);
                    while($tl=mysqli_fetch_object($QLembaga)){
                    ?>
                    <tr>
                      <td><?= $n++; ?></td>
                      <td><?= $tl->nm_lembaga; ?></td>
                      <td><?= $tl->tk_lembaga; ?></td>
                      <td>
                        <div class="btn-group btn-sm">
                          <button id="btnGroupDrop1" type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
                          Aksi</button>
                          <div class="dropdown-menu">
                            <a href="pg_dlembaga.php?idl=<?= $tl->id_lembaga; ?>" class="dropdown-item btn-xs">Ubah</a>
                            <a href="#" class="dropdown-item btn-xs" onClick="konfirmasi('del_data.php?idl=<?= $tl->id_lembaga; ?>');">Hapus</a>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
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
include 'modals/md_eyayasan.php';
include 'modals/md_tlembaga.php';
include 'modals/md_elembaga.php';
include 'modals/md_del_data.php';
include 'modals/md_logout.php';

  if(@$_SESSION['pesan_yayasan_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_yayasan_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_yayasan_sukses']); 
  }

  if(@$_SESSION['pesan_yayasan_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_yayasan_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_yayasan_gagal']); 
  }

  if(@$_SESSION['pesan_lembaga_tambah']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_lembaga_tambah']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_tambah']); 
  }

  if(@$_SESSION['pesan_lembaga_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_lembaga_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_gagal']); 
  }

  if(@$_SESSION['pesan_lembaga_hapus']){ ?>
    <script>
      toastr.info('<?= $_SESSION['pesan_lembaga_hapus']; ?>')
    </script>
  <?php unset($_SESSION['pesan_lembaga_hapus']); 
  }
?>

<script>
    $(document).on("click", "#tb_eyayasan", function(){
      let id = $(this).data('id');
      let nm = $(this).data('nm');
      let sk = $(this).data('sk');
      let al = $(this).data('al');
      let kb = $(this).data('kb');
      let pr = $(this).data('pr');
      let kp = $(this).data('kp');
      let lg = $(this).data('lg');

      $("#md_eyayasan #id_yayasan").val(id);
      $("#md_eyayasan #nm_yayasan").val(nm);
      $("#md_eyayasan #sk_yayasan").val(sk);
      $("#md_eyayasan #al_yayasan").val(al);
      $("#md_eyayasan #kb_yayasan").val(kb);
      $("#md_eyayasan #pr_yayasan").val(pr);
      $("#md_eyayasan #kp_yayasan").val(kp);
      $("#md_eyayasan #lg_yayasan").val(lg);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_eyayasan',
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

    $(document).on("click", "#tb_elembaga", function(){
      let id_l = $(this).data('id_l');
      let nm_l = $(this).data('nm_l');
      let sk_l = $(this).data('sk_l');
      let tk_l = $(this).data('tk_l');
      let tt_l = $(this).data('tt_l');

      $("#md_elembaga #id_lembaga").val(id_l);
      $("#md_elembaga #nm_lembaga").val(nm_l);
      $("#md_elembaga #sk_lembaga").val(sk_l);
      $("#md_elembaga #tk_lembaga").val(tk_l);
      $("#md_elembaga #tt_lembaga").val(tt_l);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_elembaga',
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
    
    function konfirmasi(delete_url)
    {
    $('#modal_delete').modal('show', {backdrop: 'static'});
    document.getElementById('delete_link').setAttribute('href' , delete_url);
    }

    function logout_modal(logout_url)
    {
    $('#modal_logout').modal('show', {backdrop: 'static'});
    document.getElementById('logout_link').setAttribute('href' , logout_url);
    }
</script>