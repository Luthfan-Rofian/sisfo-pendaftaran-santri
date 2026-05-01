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
            <h1 class="m-0">Tentang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="#" onclick="window.history.go(0);">Tentang</a></li>
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
          <div class="col-12 col-sm-6 col-md-6">
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">Perjanjian Penggunaan</h3>

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
    <h5><b>Perjanjian Penggunaan</b></h5>
    <p>
        Dengan menggunakan Aplikasi PSB ini, Anda secara sadar menyetujui ketentuan penggunaan yang ditetapkan untuk menjaga integritas sistem di lingkungan <b>Yayasan Pondok Pesantren Darul Ulum Tlasih</b> sebagai berikut:
    </p>

    <hr>

    <h5><b>Ketentuan Lisensi & Hak Cipta</b></h5>
    <p>Demi menghargai karya intelektual pengembang, pengguna dilarang keras untuk:</p>
    <div class="row">
        <div class="col-md-12">
            <ul class="list-unstyled">
                <li><i class="fas fa-check-circle text-danger"></i> Tidak mengubah nama aplikasi maupun identitas developer asli.</li>
                <li><i class="fas fa-check-circle text-danger"></i> Tidak memperjualbelikan aplikasi ini kepada pihak manapun.</li>
                <li><i class="fas fa-check-circle text-danger"></i> Tidak memodifikasi kode sumber untuk tujuan komersial/dijual kembali.</li>
            </ul>
        </div>
    </div>

    <hr>

    <h5><b>Sanksi Pelanggaran</b></h5>
    <div class="developer-info">
        <p>Segala bentuk pelanggaran terhadap ketentuan di atas dapat dikenakan sanksi pidana sesuai hukum yang berlaku:</p>
        <p style="font-size: 1.0em; margin-bottom: 5px;">
            <strong>UU No. 28 Tahun 2014 tentang Hak Cipta Pasal 113</strong>
        </p>
        <p class="text-muted" style="font-size: 0.9em;">
            Pelanggaran hak ekonomi dapat dipidana penjara paling lama 10 tahun dan/atau denda maksimal <b>Rp 4.000.000.000,00</b>.
        </p>
    </div>

    <div class="alert alert-warning mt-3" style="font-size: 0.85em;">
        Hargailah karya anak bangsa dengan tidak melakukan pembajakan atau modifikasi ilegal pada sistem ini.
    </div>

    <footer class="mt-4 border-top pt-2">
        <p class="text-center text-muted" style="font-size: 0.8em;">
            &copy; <?php echo date('Y'); ?> <b>DigitalNode ID</b> | Protected by Intellectual Property Law. <br>
            Sidoarjo, Jawa Timur - Indonesia
        </p>
    </footer>
</div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">Tentang Aplikasi</h3>

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
    <h5><b>Tentang Aplikasi</b></h5>
    <p>
        Aplikasi PSB Online ini merupakan platform resmi yang dirancang khusus untuk mengelola sistem pendaftaran santri baru secara digital di lingkungan <b>Yayasan Pondok Pesantren Darul Ulum Tlasih, Tulangan, Sidoarjo</b>. 
        Sistem ini dibangun untuk menciptakan proses administrasi yang lebih cepat, transparan, dan akuntabel.
    </p>

    <hr>

    <h5><b>Dukungan & Media Sosial</b></h5>
    <p>Mari terus dukung pengembangan ekosistem digital pesantren dengan mengikuti kanal media sosial kami:</p>
    <div class="row">
        <div class="col-md-6">
            <ul class="list-unstyled">
                <li><i class="fab fa-facebook text-primary"></i> <a href="https://www.facebook.com/kang.mahmud.5095" target="_blank"> Facebook Resmi</a></li>
                <li><i class="fab fa-youtube text-danger"></i> <a href="https://www.youtube.com/channel/UCJ7M12OVk8RbOQQrmLXeriQ" target="_blank"> YouTube Channel</a></li>
                <li><i class="fab fa-instagram text-info"></i> <a href="https://www.instagram.com/_kg_mahmud/" target="_blank"> Instagram Update</a></li>
            </ul>
        </div>
    </div>

    <hr>

    <h5><b>Informasi Developer</b></h5>
    <div class="developer-info">
        <p>Aplikasi ini dikembangkan sepenuhnya secara mandiri oleh:</p>
        <p style="font-size: 1.1em; margin-bottom: 5px;">
            <strong>M. Luthfan Rofi'An Anwar, S.Kom.</strong>
        </p>
        <p class="text-muted">
            <em>Web Developer & IT Consultant</em><br>
            Founder of <strong>DigitalNode ID</strong>
        </p>
    </div>

    <div class="alert alert-info mt-3" style="font-size: 0.85em;">
        Dukungan Anda dalam bentuk kritik, saran, maupun donasi pengembangan sangat berarti bagi kami untuk terus menciptakan aplikasi-aplikasi bermanfaat lainnya di masa depan.
    </div>

    <footer class="mt-4 border-top pt-2">
        <p class="text-center text-muted" style="font-size: 0.8em;">
            &copy; <?php echo date('Y'); ?> Pondok Pesantren Darul Ulum Tlasih. <br>
            All Rights Reserved | Dikembangkan oleh M. Luthfan Rofi'An Anwar, S.Kom.
        </p>
    </footer>
</div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-12">
<div class="card card-outline card-danger">
  <div class="card-header">
    <h3 class="card-title"><i class="fas fa-book-reader mr-1"></i> Panduan Operasional Admin</h3>
  </div>
  <div class="card-body">
    <h5><b>1. Manajemen Pendaftaran</b></h5>
    <p>Admin bertanggung jawab untuk memantau setiap data santri baru yang masuk melalui sistem. Pastikan setiap berkas yang diunggah dapat terbaca dengan jelas.</p>
    
    <h5><b>2. Verifikasi Dokumen</b></h5>
    <ul>
      <li>Cek kesesuaian data antara form pendaftaran dengan dokumen asli (KK/Ijazah).</li>
      <li>Gunakan fitur <b>Validasi</b> untuk mengubah status pendaftaran dari <i>Pending</i> menjadi <i>Diterima</i> atau <i>Ditolak</i>.</li>
      <li>Jika data tidak lengkap, hubungi nomor WhatsApp pendaftar yang tertera di sistem.</li>
    </ul>

    <hr>

    <h5><b>3. Pengaturan Gelombang & Biaya</b></h5>
    <p>Pastikan pengaturan tanggal buka/tutup pendaftaran sudah sesuai dengan kalender akademik yayasan. Periksa kembali nominal biaya pendaftaran pada menu pengaturan jika terdapat perubahan kebijakan.</p>

    <hr>

    <h5><b>4. Keamanan Akun</b></h5>
    <p>Demi menjaga integritas data santri di lingkup <b>Darul Ulum Tlasih</b>, harap perhatikan hal berikut:</p>
    <ul>
      <li>Gunakan password yang kuat dan jangan berikan akses login kepada pihak luar.</li>
      <li>Selalu lakukan <b>Logout</b> setelah selesai menggunakan perangkat publik/bersama.</li>
      <li>Lakukan backup data secara berkala melalui menu laporan jika tersedia.</li>
    </ul>

    <div class="alert alert-warning mt-3">
      <i class="fas fa-exclamation-triangle"></i> <b>Penting:</b> 
      Segala aktivitas perubahan data terekam oleh sistem. Gunakan hak akses Anda dengan bijak dan amanah.
    </div>
  </div>
  <div class="card-footer text-muted" style="font-size: 0.85em;">
    Sistem dikembangkan oleh: <b>M. Luthfan Rofi'An Anwar, S.Kom.</b> | &copy; <?php echo date('Y'); ?>
  </div>
</div>
          </div>
        </div>
        <!-- /.row -->
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'pages/footer.php';
include 'modals/md_logout.php';
?>
<script>  
  function logout_modal(logout_url)
  {
  $('#modal_logout').modal('show', {backdrop: 'static'});
  document.getElementById('logout_link').setAttribute('href' , logout_url);
  }
</script>