<?php
error_reporting(0);
include 'pages/header.php';
include '../config/koneksi.php';
include '../frupiah.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pembayaran</h1>
            <div class="card-outline-success">
              Halaman ini digunakan untuk mengecek pembayaran pendaftar online <br>
            </div>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="#" onclick="window.history.go(0);">Pembayaran</a></li>
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
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  <div class="btn-group btn-sm">
                      <button id="btnGroupDrop1" type="button" class="btn btn-success btn-sm mt-1 dropdown-toggle" data-toggle="dropdown"><small>Kolom</small></button>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="0">No</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="1">Nama Pendaftar</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="2">Lembaga</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="3">Status</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="4">Bukti</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="5">Nominal</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="6">Panitia</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="7">Aksi</a>
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
                      <tr class="bg-light">
                        <th class="text-center">No.</th>
                        <th>Nama Pendaftar</th>
                        <th>Lembaga</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Bukti</th>
                        <th>Nominal</th>
                        <th>Panitia</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        $pdf = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE lb_daf='$lembaga'");
                        while($pd = mysqli_fetch_object($pdf)){
                        ?>
                        <tr>
                          <td class="text-center"><?= $no++; ?></td>
                          <td><small><b><?= $pd->nm_pdf; ?></b></small></td>
                          <td><small><?= $pd->lb_daf; ?></small></td>
                          <td>
                            <?php
                            $st=$pd->st_pdf;
                            if ($st=='Menunggu') {
                              ?>
                              <span class="badge badge-info badge-xs">Menunggu</span>
                              <?php
                            }
                            if ($st=='Diterima') {
                              ?>
                              <span class="badge badge-success badge-xs">Diterima</span>
                              <?php
                            }
                            if ($st=='Ditolak') {
                              ?>
                              <span class="badge badge-danger badge-xs">Ditolak</span>
                              <?php
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            $bp=$pd->bp_berkas;
                            if (!empty($bp)) {
                              ?>
                              <a href="#" class="badge badge-dark badge-xs" id="td_cbpberkas" 
                              data-toggle="modal" data-target="#md_cbpberkas" title="Klik untuk ubah file" 
                              data-id="<?= $pd->id_p; ?>"
                              data-nm="<?= $pd->nm_pdf; ?>"
                              data-bp="<?= $pd->bp_berkas; ?>">Cek &nbsp;<i class="fas fa-pencil-alt"></i></a>
                              <?php
                            }
                            if (empty($bp)) {
                              ?>
                              <a href="#" class="badge badge-warning badge-xs" id="td_cbpberkas" 
                              data-toggle="modal" data-target="#md_cbpberkas" title="Klik untuk ubah file" 
                              data-id="<?= $pd->id_p; ?>"
                              data-nm="<?= $pd->nm_pdf; ?>"
                              data-bp="<?= $pd->bp_berkas; ?>">Cek &nbsp;<i class="fas fa-pencil-alt"></i></a>
                              <?php
                            }
                            ?>
                          </td>
                          <td><?= rupiah($pd->ug_pdf); ?></td>
                          <td><small><?= $pd->pn_pdf; ?></small></td>
                          <td>
                            <a title="Ubah" class="btn btn-primary btn-xs" id="td_epembayaran"
                            href="#" data-toggle="modal" data-target="#md_epembayaran" 
                            data-idp="<?= $pd->id_p; ?>"
                            data-nmp="<?= $pd->nm_pdf; ?>"
                            data-ugp="<?= $pd->ug_pdf; ?>"
                            data-pnp="<?= $pd->pn_pdf; ?>"
                            >Ubah</a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
              <!-- /.card-footer-->
              <div class="card-footer"></div>
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
include 'modals/md_cbpberkas.php';
include 'modals/md_epembayaran.php';
include 'modals/md_logout.php';

  if(@$_SESSION['pesan_epby_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_epby_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_epby_sukses']); 
  }
  
  if(@$_SESSION['pesan_epby_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_epby_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_epby_gagal']); 
  }

?>
<script>
    $(document).on("click", "#td_cbpberkas", function(){
      let id = $(this).data('id');
      let nm = $(this).data('nm');
      let bp = $(this).data('bp');

      $("#md_cbpberkas #id_p").text(id);
      $("#md_cbpberkas #nm_pdf").text(nm);
      $("#md_cbpberkas #bp_berkas").attr("src", "../assets/images/berkas/"+bp);
    })

    $(document).on("click", "#td_epembayaran", function(){
      let idp = $(this).data('idp');
      let nmp = $(this).data('nmp');
      let ugp = $(this).data('ugp');
      let pnp = $(this).data('pnp');

      $("#md_epembayaran #id_p").val(idp);
      $("#md_epembayaran #nm_pdf").val(nmp);
      $("#md_epembayaran #ug_pdf").val(ugp);
      $("#md_epembayaran #pn_pdf").val(pnp);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_epembayaran',
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