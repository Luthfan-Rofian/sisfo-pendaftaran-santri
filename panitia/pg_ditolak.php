<?php
include 'pages/header.php';
include '../config/koneksi.php';
include 'fungsi_ed_status.php';

$pdf_error = $status_error ="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(empty($_POST['id_p'])){
        $pdf_error = "Anda belum memilih pendaftar..!!";
    }else{
        $id_p = $_POST['id_p'];
        $id_p = implode(",", $id_p);
    }
    if(empty($_POST['status_pdf'])){
        $status_error = "Anda belum memilih status..!!";
    }else{
        $status_pdf = $_POST['status_pdf'];
    }
    if(empty($pdf_error) && empty($status_error)){
        if(update($status_pdf, $id_p)):
          $_SESSION['pesan_editst_sukses'] = 'Status diubah..';
          echo "<script>window.history.go(1);</script>";
        else:
          $_SESSION['pesan_editst_gagal'] = 'Gagal ubah status..!!!';
          echo "<script>window.history.go(1);</script>";
        endif;
    }
}

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ditolak</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item"><a href="#" onclick="window.location='pg_pendaftar'">Pendaftar</a></li>
              <li class="breadcrumb-item active">Ditolak</li>
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
                  <button type="button" class="btn btn-info btn-sm mt-1" onclick="window.location='pg_tpendaftar'">
                      <i class="fas fa-user-plus"></i> 
                      <small>Tambah</small>
                  </button>
                  <div class="btn-group btn-sm">
                      <button id="btnGroupDrop1" type="button" class="btn btn-success btn-sm mt-1 dropdown-toggle" data-toggle="dropdown"><small>Kolom</small></button>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="0">Cek</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="1">No</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="2">Nama Siswa</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="3">Jenis Kelamin</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="4">Status</a>
                        <a href="#" class="dropdown-item toggle-vis btn btn-outline-dark btn-xs" data-column="5">Aksi</a>
                      </div>
                  </div>
                  <div class="btn-group btn-sm">
                      <button id="btnGroupDrop1" type="button" class="btn btn-dark btn-sm mt-1 dropdown-toggle" data-toggle="dropdown"><small>Status</small></button>
                      <div class="dropdown-menu">
                        <a href="pg_pendaftar" class="dropdown-item btn btn-outline-dark btn-sm">Semua</a>
                        <a href="pg_menunggu" class="dropdown-item btn btn-outline-dark btn-sm">Menunggu</a>
                        <a href="pg_diterima" class="dropdown-item btn btn-outline-dark btn-sm">Diterima</a>
                        <a href="pg_ditolak" class="dropdown-item btn btn-outline-dark btn-sm">Ditolak</a>
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
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                  <table class="table table-striped table-sm" id="data1">
                    <thead>
                      <tr class="bg-danger">
                        <th class="text-center">
                          <input type="checkbox" onchange="checkAll(this)" name="chk[]" title="Pilih Semua">
                        </th>
                        <th class="text-center">No.</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $pdf = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE st_pdf='Ditolak' && lb_daf='$lembaga'");
                      while($pd = mysqli_fetch_object($pdf)){
                      ?>
                      <tr>
                        <td class="text-center">
                          <input type="checkbox" name="id_p[]" value="<?= $pd->id_p; ?>">
                        </td>
                        <td class="text-center"><?= $no++; ?></td>
                        <td>
                          <b><?= $pd->nm_pdf; ?></b> <br>
                          ID : <?= $pd->id_daf; ?> <br>
                          NISN  : <?= $pd->ns_pdf; ?>
                        </td>
                        <td><?= $pd->jk_pdf; ?></td>
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
                          <a href="#" class="badge badge-light badge-xs" id="td_estpendaftar" data-toggle="modal" data-target="#md_estpendaftar" 
                            data-ids="<?= $pd->id_p; ?>"
                            data-sts="<?= $pd->st_pdf; ?>">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                        </td>
                        <td class="text-center">
                          <div class="btn-group btn-sm">
                              <button id="btnGroupDrop1" type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown">
                              Pilih Aksi</button>
                              <div class="dropdown-menu">
                                <a title="Detail" class="dropdown-item btn-sm" href="#" id="td_dpendaftar" data-toggle="modal" data-target="#md_dpendaftar"
                                data-id="<?= $pd->idp ?>"
                                data-iddf="<?= $pd->id_daf ?>"
                                data-gldf="<?= $pd->gl_daf ?>"
                                data-lbdf="<?= $pd->lb_daf ?>"
                                data-mddf="<?= $pd->md_daf ?>"
                                data-tgdf="<?= $pd->tg_daf ?>"

                                data-nmpd="<?= $pd->nm_pdf ?>"
                                data-nspd="<?= $pd->ns_pdf ?>"
                                data-nkpd="<?= $pd->nk_pdf ?>"
                                data-tlpd="<?= $pd->tl_pdf ?>"
                                data-tgpd="<?= $pd->tg_pdf ?>"
                                data-blpd="<?= $pd->bl_pdf ?>"
                                data-thpd="<?= $pd->th_pdf ?>"
                                data-jkpd="<?= $pd->jk_pdf ?>"

                                data-sdpd="<?= $pd->sd_pdf ?>"
                                data-akpd="<?= $pd->ak_pdf ?>"
                                data-ctpd="<?= $pd->ct_pdf ?>"
                                data-hppd="<?= $pd->hp_pdf ?>"
                                data-empd="<?= $pd->em_pdf ?>"
                                data-hbpd="<?= $pd->hb_pdf ?>"
                                data-darah="<?= $pd->gol_dar ?>"
                                data-penyakit="<?= $pd->rw_py ?>"
                                data-prov="<?= $pd->provinsi ?>"
                                data-kab="<?= $pd->kota ?>"
                                data-kec="<?= $pd->kecamatan ?>"
                                data-des="<?= $pd->kelurahan ?>"

                                data-sask="<?= $pd->sa_sek ?>"
                                data-stsk="<?= $pd->st_sek ?>"
                                data-snsk="<?= $pd->sn_sek ?>"
                                data-alsk="<?= $pd->al_sek ?>"
                                data-kbsk="<?= $pd->kb_sek ?>"
                                data-nwsk="<?= $pd->nw_sek ?>"
                                data-nksk="<?= $pd->no_ktk ?>"
                                data-npsk="<?= $pd->no_kip ?>"

                                data-nmay="<?= $pd->nm_ayh ?>"
                                data-tlay="<?= $pd->tl_ayh ?>"
                                data-tgay="<?= $pd->tg_ayh ?>"
                                data-blay="<?= $pd->bl_ayh ?>"
                                data-thay="<?= $pd->th_ayh ?>"
                                data-nkay="<?= $pd->nk_ayh ?>"
                                data-pday="<?= $pd->pd_ayh ?>"
                                data-pkay="<?= $pd->pk_ayh ?>"
                                data-pgay="<?= $pd->pg_ayh ?>"

                                data-nmbu="<?= $pd->nm_ibu ?>"
                                data-tlbu="<?= $pd->tl_ibu ?>"
                                data-tgbu="<?= $pd->tg_ibu ?>"
                                data-blbu="<?= $pd->bl_ibu ?>"
                                data-thbu="<?= $pd->th_ibu ?>"
                                data-nkbu="<?= $pd->nk_ibu ?>"
                                data-pdbu="<?= $pd->pd_ibu ?>"
                                data-pkbu="<?= $pd->pk_ibu ?>"
                                data-pgbu="<?= $pd->pg_ibu ?>"

                                data-hpor="<?= $pd->hp_ortu ?>"
                                data-waor="<?= $pd->wa_ortu ?>"
                                data-stdf="<?= $pd->st_pdf ?>"
                                data-pndf="<?= $pd->pn_pdf ?>"
                                data-info="<?= $pd->info_psb ?>"
                                data-alasan="<?= $pd->al_mondok ?>"
                                >Detail Data</a>
                                </a>
                                <a title="Edit" class="dropdown-item btn-sm" href="pg_ependaftar?idpdf=<?= $pd->id_p; ?>">Ubah Data</a>
                                </a>
                                <a href="#" class="dropdown-item btn-sm" onClick="konfirmasi('del_data?idpdf=<?= $pd->id_p; ?>');">Hapus Data</i>
                                </a>
                              </div>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <hr>
                <label class="control-label ml-2"><b>PILIH STATUS</b></label>
                <div class="form-group row ml-2">
                    <select class="form-control col-sm-2" name="status_pdf">
                      <option value="">---</option>
                      <option value="Menunggu">Menunggu</option>
                      <option value="Diterima">Diterima</option>
                      <option value="Ditolak">Ditolak</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm ml-2">Proses</button>
                </div>
                <h5>
                    <span class="text-danger ml-2"><?= $pdf_error; ?></span><br>
                    <span class="text-danger ml-2"><?= $status_error; ?></span>
                </h5>
                </form>
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
include 'modals/md_dpendaftar.php';
include 'modals/md_del_data.php';
include 'modals/md_estpendaftar.php';
include 'modals/md_logout.php';

  if(@$_SESSION['pesan_daf_tambah_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_daf_tambah_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_daf_tambah_sukses']); 
  }

  if(@$_SESSION['pesan_daf_tambah_gagal']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_daf_tambah_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_daf_tambah_gagal']); 
  }

  if(@$_SESSION['pesan_edit_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_edit_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_edit_sukses']); 
  }
  
  if(@$_SESSION['pesan_edit_gagal']){ ?>
    <script>
      toastr.error('<?= $_SESSION['pesan_edit_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_edit_gagal']); 
  }

  if(@$_SESSION['pesan_editst_sukses']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_editst_sukses']; ?>')
    </script>
  <?php unset($_SESSION['pesan_editst_sukses']); 
  }
  
  if(@$_SESSION['pesan_editst_gagal']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_editst_gagal']; ?>')
    </script>
  <?php unset($_SESSION['pesan_editst_gagal']); 
  }
  
  if(@$_SESSION['pesan_sukses_hapus']){ ?>
    <script>
      toastr.success('<?= $_SESSION['pesan_sukses_hapus']; ?>')
    </script>
  <?php unset($_SESSION['pesan_sukses_hapus']); 
  }

?>
<script>
    $(document).on("click", "#td_dpendaftar", function(){
      let id = $(this).data('id');
      let iddf = $(this).data('iddf');
      let gldf = $(this).data('gldf');
      let lbdf = $(this).data('lbdf');
      let mddf = $(this).data('mddf');
      let tgdf = $(this).data('tgdf');
      let nmpd = $(this).data('nmpd');
      let nspd = $(this).data('nspd');
      let nkpd = $(this).data('nkpd');
      let tlpd = $(this).data('tlpd');
      let tgpd = $(this).data('tgpd');
      let blpd = $(this).data('blpd');
      let thpd = $(this).data('thpd');
      let jkpd = $(this).data('jkpd');

      let sdpd = $(this).data('sdpd');
      let akpd = $(this).data('akpd');
      let ctpd = $(this).data('ctpd');
      let hppd = $(this).data('hppd');
      let empd = $(this).data('empd');
      let hbpd = $(this).data('hbpd');
      let darah = $(this).data('darah');
      let penyakit = $(this).data('penyakit');
      let prov = $(this).data('prov');
      let kab = $(this).data('kab');
      let kec = $(this).data('kec');
      let des = $(this).data('des');

      let sask = $(this).data('sask');
      let stsk = $(this).data('stsk');
      let snsk = $(this).data('snsk');
      let alsk = $(this).data('alsk');
      let kbsk = $(this).data('kbsk');
      let nwsk = $(this).data('nwsk');
      let nksk = $(this).data('nksk');
      let npsk = $(this).data('npsk');

      let nmay = $(this).data('nmay');
      let tlay = $(this).data('tlay');
      let tgay = $(this).data('tgay');
      let blay = $(this).data('blay');
      let thay = $(this).data('thay');
      let nkay = $(this).data('nkay');
      let pday = $(this).data('pday');
      let pkay = $(this).data('pkay');
      let pgay = $(this).data('pgay');

      let nmbu = $(this).data('nmbu');
      let tlbu = $(this).data('tlbu');
      let tgbu = $(this).data('tgbu');
      let blbu = $(this).data('blbu');
      let thbu = $(this).data('thbu');
      let nkbu = $(this).data('nkbu');
      let pdbu = $(this).data('pdbu');
      let pkbu = $(this).data('pkbu');
      let pgbu = $(this).data('pgbu');

      let hpor = $(this).data('hpor');
      let waor = $(this).data('waor');
      let stdf = $(this).data('stdf');
      let pndf = $(this).data('pndf');
      let info = $(this).data('info');
      let alasan = $(this).data('alasan');

      $("#md_dpendaftar #id_p").text(id);
      $("#md_dpendaftar #id_daf").text(iddf);
      $("#md_dpendaftar #gl_daf").text(gldf);
      $("#md_dpendaftar #lb_daf").text(lbdf);
      $("#md_dpendaftar #md_daf").text(mddf);
      $("#md_dpendaftar #tg_daf").text(tgdf);
      $("#md_dpendaftar #nm_pdf").text(nmpd);
      $("#md_dpendaftar #ns_pdf").text(nspd);
      $("#md_dpendaftar #nk_pdf").text(nkpd);
      $("#md_dpendaftar #tl_pdf").text(tlpd);
      $("#md_dpendaftar #tg_pdf").text(tgpd);
      $("#md_dpendaftar #bl_pdf").text(blpd);
      $("#md_dpendaftar #th_pdf").text(thpd);
      $("#md_dpendaftar #jk_pdf").text(jkpd);

      $("#md_dpendaftar #sd_pdf").text(sdpd);
      $("#md_dpendaftar #ak_pdf").text(akpd);
      $("#md_dpendaftar #ct_pdf").text(ctpd);
      $("#md_dpendaftar #hp_pdf").text(hppd);
      $("#md_dpendaftar #em_pdf").text(empd);
      $("#md_dpendaftar #hb_pdf").text(hbpd);
      $("#md_dpendaftar #gol_dar").text(darah);
      $("#md_dpendaftar #rw_py").text(penyakit);
      $("#md_dpendaftar #provinsi").text(prov);
      $("#md_dpendaftar #kota").text(kab);
      $("#md_dpendaftar #kecamatan").text(kec);
      $("#md_dpendaftar #kelurahan").text(des);

      $("#md_dpendaftar #sa_sek").text(sask);
      $("#md_dpendaftar #st_sek").text(stsk);
      $("#md_dpendaftar #sn_sek").text(snsk);
      $("#md_dpendaftar #al_sek").text(alsk);
      $("#md_dpendaftar #kb_sek").text(kbsk);
      $("#md_dpendaftar #nw_sek").text(nwsk);
      $("#md_dpendaftar #no_ktk").text(nksk);
      $("#md_dpendaftar #no_kip").text(npsk);

      $("#md_dpendaftar #nm_ayh").text(nmay);
      $("#md_dpendaftar #tl_ayh").text(tlay);
      $("#md_dpendaftar #tg_ayh").text(tgay);
      $("#md_dpendaftar #bl_ayh").text(blay);
      $("#md_dpendaftar #th_ayh").text(thay);
      $("#md_dpendaftar #nk_ayh").text(nkay);
      $("#md_dpendaftar #pd_ayh").text(pday);
      $("#md_dpendaftar #pk_ayh").text(pkay);
      $("#md_dpendaftar #pg_ayh").text(pgay);

      $("#md_dpendaftar #nm_ibu").text(nmbu);
      $("#md_dpendaftar #tl_ibu").text(tlbu);
      $("#md_dpendaftar #tg_ibu").text(tgbu);
      $("#md_dpendaftar #bl_ibu").text(blbu);
      $("#md_dpendaftar #th_ibu").text(thbu);
      $("#md_dpendaftar #nk_ibu").text(nkbu);
      $("#md_dpendaftar #pd_ibu").text(pdbu);
      $("#md_dpendaftar #pk_ibu").text(pkbu);
      $("#md_dpendaftar #pg_ibu").text(pgbu);
      
      $("#md_dpendaftar #hp_ortu").text(hpor);
      $("#md_dpendaftar #wa_ortu").text(waor);
      $("#md_dpendaftar #st_pdf").text(stdf);
      $("#md_dpendaftar #pn_pdf").text(pndf);
      $("#md_dpendaftar #info_psb").text(info);
      $("#md_dpendaftar #al_mondok").text(alasan);

    })

    $(document).on("click", "#td_estpendaftar", function(){
      let ids = $(this).data('ids');
      let sts = $(this).data('sts');

      $("#md_estpendaftar #id_p").val(ids);
      $("#md_estpendaftar #st_pdf").val(sts);
    })

    $(document).ready(function(e){
    $('#form').on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url : 'a_estpendaftar.php',
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
    
    function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      if (ele.checked) {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox' ) {
                  checkboxes[i].checked = true;
              }
          }
      } else {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox') {
                  checkboxes[i].checked = false;
              }
          }
      }
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