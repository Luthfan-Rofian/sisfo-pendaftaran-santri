<?php
error_reporting(0);
include 'pages/header.php';
include '../config/koneksi.php';

$iduser=$_SESSION['id_user'];
$User = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user='$iduser'");
$tu = mysqli_fetch_object($User);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profil User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="#" onclick="window.history.go(0);">Profil User</a></li>
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
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../assets/images/user/<?= $tu->ft_user; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Foto</h3>

                <center>
                  <a class="btn btn-info btn-xs" id="td_fuser" href="#" 
                  data-toggle="modal" data-target="#md_fuser" 
                  data-id="<?= $tu->id_user; ?>"
                  data-ft="<?= $tu->ft_user; ?>">
                  <i class="fas fa-image"></i> Ubah Foto
                  </a>
                </center>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->

          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2"><b>Data User</b></div>
              <div class="card-body">
                <table class="table table-sm">
                  <form action="a_eprofil.php" method="post">
                    <input type="hidden" name="id_user" value="<?= $tu->id_user; ?>">
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Nama User</b></td>
                      <td><input type="text" name="nm_user" value="<?= $tu->nm_user; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Username</b></td>
                      <td><input type="text" name="us_user" value="<?= $tu->us_user; ?>" class="form-control" onkeypress="return hanyaAngka(event)" minlength="5" required /></td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Password</b></td>
                      <td>
                        <input type="text" name="ps_user" class="form-control">
                        <small class="text-danger">Kosongkan jika tidak diubah</small>
                      </td>
                    </tr>
                    <tr>
                      <td class="bg-light text-right" width="20%"><b>Role</b></td>
                      <td><input type="text" name="rl_user" value="<?= $tu->rl_user; ?>" class="form-control" readonly /></td>
                    </tr>
                    <tr>
                      <td colspan="2">                      
                        <input type="submit" class="btn btn-success float-right" name="edit" value="Ubah Data">
                      </td>
                    </tr>
                  </form>
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'pages/footer.php';
include 'modals/md_euser.php';
include 'modals/md_fprofil.php';
include 'modals/md_logout.php';

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

    function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57)){
        toastr.error('Maaf Isi Hanya Boleh Diisi Angka')
        return false;
     };
    return true;
    }

    function logout_modal(logout_url)
    {
    $('#modal_logout').modal('show', {backdrop: 'static'});
    document.getElementById('logout_link').setAttribute('href' , logout_url);
    }
</script>