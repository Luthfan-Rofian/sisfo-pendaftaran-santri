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
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="#" onclick="window.history.go(0);">User</a></li>
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
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-outline card-dark">
              <div class="card-header">
                <h3 class="card-title">
                  <button type="button" class="btn btn-info btn-sm mt-1" data-toggle="modal" data-target="#md_tuser">
                      <i class="fas fa-user-plus"></i> 
                      <small>Tambah</small>
                  </button>
                  <div class="btn-group btn-sm">
                      <button id="btnGroupDrop1" type="button" class="btn btn-success btn-sm mt-1 dropdown-toggle" data-toggle="dropdown">Pilih Kolom</button>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="0">No</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="1">Nama User</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="2">Lembaga</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="3">Username</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="4">Role</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="5">Foto User</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="6">Aksi</a>
                      </div>
                  </div>
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="" onclick="window.history.go(0);" title="Reload">
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
              <div class="table-responsive">
                <div class="card-body">
                  <table class="table table-striped table-bordered table-sm" id="data1">
                    <thead>
                      <tr class="bg-dark">
                        <th class="text-center">No.</th>
                        <th class="text-center">Nama User</th>
                        <th class="text-center">Lembaga</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Foto User</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $User = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY nm_user ASC");
                      while($tu = mysqli_fetch_object($User)){
                      ?>
                      <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $tu->nm_user; ?></td>
                        <td class="text-center"><?= $tu->lb_user; ?></td>
                        <td class="text-center"><?= $tu->us_user; ?></td>
                        <td class="text-center"><?= $tu->rl_user; ?></td>
                        <td class="text-center">
                            <img class="img-thumbnail" src="../assets/images/user/<?= $tu->ft_user; ?>" width="50"><br>
                            <small>
                                <a class="btn btn-light btn-xs" id="td_fuser" href="#" data-toggle="modal" data-target="#md_fuser" 
                                data-id="<?= $tu->id_user; ?>"
                                data-ft="<?= $tu->ft_user; ?>">
                                <i class="fas fa-image"></i> Ubah Foto
                                </a>
                            </small>
                        </td>
                        <td class="text-center">
                            <a title="Ubah" class="btn btn-success btn-xs" id="td_euser"
                            href="#" data-toggle="modal" data-target="#md_euser" 
                            data-id="<?= $tu->id_user; ?>"
                            data-nm="<?= $tu->nm_user; ?>"
                            data-lb="<?= $tu->lb_user; ?>"
                            data-us="<?= $tu->us_user; ?>"
                            data-rl="<?= $tu->rl_user; ?>"
                            >Ubah</a>
                            <a href="#" class="btn btn-xs btn-danger" onClick="konfirmasi('del_data?idus=<?= $tu->id_user; ?>');">Hapus
                            </a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
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
include 'modals/md_tuser.php';
include 'modals/md_euser.php';
include 'modals/md_del_data.php';
include 'modals/md_fuser.php';
include 'modals/md_logout.php';

  if(@$_SESSION['pesan_user_tambah']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_user_tambah']; ?>')
    </script>
  <?php unset($_SESSION['pesan_user_tambah']); 
  }

  if(@$_SESSION['pesan_user_edit']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_user_edit']; ?>')
    </script>
  <?php unset($_SESSION['pesan_user_edit']); 
  }

  if(@$_SESSION['pesan_user_ada']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_user_ada']; ?>')
    </script>
  <?php unset($_SESSION['pesan_user_ada']); 
  }

  if(@$_SESSION['pesan_user_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_user_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_user_gagal']); 
  }

  if(@$_SESSION['pesan_user_editft']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_user_editft']; ?>')
    </script>
  <?php unset($_SESSION['pesan_user_editft']); 
  }

  if(@$_SESSION['pesan_user_hapus']){ ?>
    <script>
      toastr.info('<?= $_SESSION['pesan_user_hapus']; ?>')
    </script>
  <?php unset($_SESSION['pesan_user_hapus']); 
  }

?>
<script>
    $(document).on("click", "#td_fuser", function(){
      let id = $(this).data('id');
      let ft = $(this).data('ft');

      $("#md_fuser #id_user").val(id);
      $("#md_fuser #ft_user").attr("src", "../assets/images/user/"+ft);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_fuser',
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

    $(document).on("click", "#td_euser", function(){
      let id = $(this).data('id');
      let nm = $(this).data('nm');
      let lb = $(this).data('lb');
      let us = $(this).data('us');
      let rl = $(this).data('rl');

      $("#md_euser #id_user").val(id);
      $("#md_euser #nm_user").val(nm);
      $("#md_euser #lb_user").val(lb);
      $("#md_euser #us_user").val(us);
      $("#md_euser #rl_user").val(rl);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_euser',
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

    function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57)){
        toastr.error('Maaf Isi Hanya Boleh Diisi Angka')
        return false;
     };
    return true;
    }
    
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