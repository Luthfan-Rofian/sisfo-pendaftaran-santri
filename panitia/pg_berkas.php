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
            <h1 class="m-0">Berkas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="#" onclick="window.history.go(0);">Berkas</a></li>
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
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="1">Nama</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="2">Lembaga</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="3">Bukti</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="4">Akte</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="5">KK</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="6">SKL</a>
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
              <div class="card-body">
                Untuk mengubah berkas, silahkan klik pada file (tanda ceklis atau tanda silang)
              </div>
              <div class="table-responsive">
                <div class="card-body">
                  <table class="table table-striped table-bordered table-sm" id="data1">
                    <thead>
                      <tr class="bg-light">
                        <th class="text-center">No.</th>
                        <th>Nama Pendaftar</th>
                        <th>Lembaga</th>
                        <th>Bukti</th>
                        <th>Akte</th>
                        <th>KK</th>
                        <th>SKL</th>
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
                          <td><?= $pd->nm_pdf; ?></td>
                          <td><small><?= $pd->lb_daf; ?></small></td>
                          <td>
                            <?php
                            $bp=$pd->bp_berkas;
                            if (!empty($bp)) {
                              ?>
                              <a href="#" class="badge badge-success badge-xs" id="td_ebpberkas" 
                              data-toggle="modal" data-target="#md_ebpberkas" title="Klik untuk ubah file" 
                              data-idbb="<?= $pd->id_p; ?>"
                              data-bpbb="<?= $pd->bp_berkas; ?>"><i class="fas fa-check-circle"></i></a>
                              <a href="../assets/images/berkas/<?= $pd->bp_berkas; ?>" class="badge badge-primary badge-xs" target="_blank" title="Download"><i class="fas fa-download"></i></a>
                              <?php
                            }
                            if (empty($bp)) {
                              ?>
                              <a href="#" class="badge badge-warning badge-xs" id="td_ebpberkas" 
                              data-toggle="modal" data-target="#md_ebpberkas" title="Klik untuk ubah file" 
                              data-idbb="<?= $pd->id_p; ?>"
                              data-bpbb="<?= $pd->bp_berkas; ?>"><i class="fas fa-times-circle"></i></a>
                              <?php
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            $ak=$pd->ak_berkas;
                            if (!empty($ak)) {
                              ?>
                              <a href="#" class="badge badge-success badge-xs" id="td_eakberkas" 
                              data-toggle="modal" data-target="#md_eakberkas" title="Klik untuk ubah file" 
                              data-idba="<?= $pd->id_p; ?>"
                              data-akba="<?= $pd->ak_berkas; ?>"><i class="fas fa-check-circle"></i></a>
                              <a href="../assets/images/berkas/<?= $pd->ak_berkas; ?>" class="badge badge-primary badge-xs" target="_blank" title="Download"><i class="fas fa-download"></i></a>
                              <?php
                            }
                            if (empty($ak)) {
                              ?>
                              <a href="#" class="badge badge-warning badge-xs" id="td_eakberkas" 
                              data-toggle="modal" data-target="#md_eakberkas" title="Klik untuk ubah file" 
                              data-idba="<?= $pd->id_p; ?>"
                              data-akba="<?= $pd->ak_berkas; ?>"><i class="fas fa-times-circle"></i></a>
                              <?php
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            $kk=$pd->kk_berkas;
                            if (!empty($kk)) {
                              ?>
                              <a href="#" class="badge badge-success badge-xs" id="td_ekkberkas" 
                              data-toggle="modal" data-target="#md_ekkberkas" title="Klik untuk ubah file" 
                              data-idbk="<?= $pd->id_p; ?>"
                              data-akbk="<?= $pd->kk_berkas; ?>"><i class="fas fa-check-circle"></i></a>
                              <a href="../assets/images/berkas/<?= $pd->kk_berkas; ?>" class="badge badge-primary badge-xs" target="_blank" title="Download"><i class="fas fa-download"></i></a>
                              <?php
                            }
                            if (empty($ak)) {
                              ?>
                              <a href="#" class="badge badge-warning badge-xs" id="td_ekkberkas" 
                              data-toggle="modal" data-target="#md_ekkberkas" title="Klik untuk ubah file" 
                              data-idbk="<?= $pd->id_p; ?>"
                              data-akbk="<?= $pd->kk_berkas; ?>"><i class="fas fa-times-circle"></i></a>
                              <?php
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            $sk=$pd->sk_berkas;
                            if (!empty($sk)) {
                              ?>
                              <a href="#" class="badge badge-success badge-xs" id="td_eskberkas" 
                              data-toggle="modal" data-target="#md_eskberkas" title="Klik untuk ubah file" 
                              data-idbs="<?= $pd->id_p; ?>"
                              data-akbs="<?= $pd->sk_berkas; ?>"><i class="fas fa-check-circle"></i></a>
                              <a href="../assets/images/berkas/<?= $pd->sk_berkas; ?>" class="badge badge-primary badge-xs" target="_blank" title="Download"><i class="fas fa-download"></i></a>
                              <?php
                            }
                            if (empty($ak)) {
                              ?>
                              <a href="#" class="badge badge-warning badge-xs" id="td_eskberkas" 
                              data-toggle="modal" data-target="#md_eskberkas" title="Klik untuk ubah file" 
                              data-idbs="<?= $pd->id_p; ?>"
                              data-akbs="<?= $pd->sk_berkas; ?>"><i class="fas fa-times-circle"></i></a>
                              <?php
                            }
                            ?>
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
include 'modals/md_ebpberkas.php';
include 'modals/md_eakberkas.php';
include 'modals/md_ekkberkas.php';
include 'modals/md_eskberkas.php';
include 'pages/footer.php';
include 'modals/md_logout.php';

  if(@$_SESSION['pesan_bp_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_bp_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_bp_sukses']); 
  }
  
  if(@$_SESSION['pesan_bp_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_bp_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_bp_gagal']); 
  }

?>
<script>
    $(document).on("click", "#td_ebpberkas", function(){
      let idbb = $(this).data('idbb');
      let bpbb = $(this).data('bpbb');

      $("#md_ebpberkas #id_p").val(idbb);
      $("#md_ebpberkas #bp_berkas").attr("src", "../assets/images/berkas/"+bpbb);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_ebpberkas',
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

    $(document).on("click", "#td_eakberkas", function(){
      let idba = $(this).data('idba');
      let akba = $(this).data('akba');

      $("#md_eakberkas #id_p").val(idba);
      $("#md_eakberkas #ak_berkas").attr("src", "../assets/images/berkas/"+akba);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_eakberkas',
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

    $(document).on("click", "#td_ekkberkas", function(){
      let idbk = $(this).data('idbk');
      let akbk = $(this).data('akbk');

      $("#md_ekkberkas #id_p").val(idbk);
      $("#md_ekkberkas #kk_berkas").attr("src", "../assets/images/berkas/"+akbk);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_ekkberkas',
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

    $(document).on("click", "#td_eskberkas", function(){
      let idbs = $(this).data('idbs');
      let akbs = $(this).data('akbs');

      $("#md_eskberkas #id_p").val(idbs);
      $("#md_eskberkas #sk_berkas").attr("src", "../assets/images/berkas/"+akbs);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_eskberkas',
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