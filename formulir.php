<?php
session_start();
// PERBAIKAN PHP 8: Jangan sembunyikan error saat development, gunakan E_ALL. Jika sudah production, ganti jadi 0.
error_reporting(E_ALL); 
ini_set('display_errors', 1);

include 'config/koneksi.php';

// PERBAIKAN PHP 8: Gunakan isset() agar tidak fatal error jika session belum terdaftar
if (!isset($_SESSION['verifikasi']) || $_SESSION['verifikasi'] != true) {
    $_SESSION['pesan_verifikasi_gagal'] = 'Maaf Anda Harus Mengisi Kode Keamanan Dulu..';
    echo "<script>window.location='portal'</script>";
    exit; // Hentikan eksekusi
}

if (!isset($_SESSION['data_lembaga']) || empty($_SESSION['data_lembaga'])) {
    $_SESSION['pesan_lembaga_kosong'] = 'Maaf Anda Belum Memilih Lembaga..';
    echo "<script>window.location='lembaga'</script>";
    exit; // Hentikan eksekusi
}

 $ppdb = mysqli_query($conn, "SELECT * FROM tb_ppdb");
 $pdb = mysqli_fetch_object($ppdb);

// Fallback jika database kosong
if(!$pdb) {
    $pdb = new stdClass();
    $pdb->sk_pdf = 'PSB';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulir Pendaftaran - <?= htmlspecialchars(strip_tags($pdb->sk_pdf)); ?></title>

  <link rel="icon" type="image/png" sizes="16x16" href="assets/dist/img/index.png">

  <!-- Google Font Khas Pesantren & Modern -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- SweetAlert -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

  <style>
    :root {
      --pesantren-green: #1a6b54;
      --pesantren-green-light: #e8f5f0;
      --pesantren-gold: #c5a059;
      --pesantren-cream: #fdfbf7;
      --pesantren-dark: #2c3e50;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--pesantren-cream);
      color: #444;
    }

    /* Navbar Override */
    .main-header {
      background-color: var(--pesantren-green) !important;
      border-bottom: 3px solid var(--pesantren-gold);
    }
    .main-header .logo h2 { 
      color: #fff !important; 
      font-family: 'Playfair Display', serif; 
    }
    .main-header .nav-link { 
      color: #fff !important; 
    }
    .main-header .nav-link:hover { 
      color: var(--pesantren-gold) !important; 
    }

    /* Card Override */
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      margin-bottom: 25px;
    }
    .card-header {
      background-color: #fff;
      border-bottom: 2px solid var(--pesantren-green-light);
      padding: 18px 25px;
      border-radius: 15px 15px 0 0 !important;
    }
    .card-header .card-title {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      color: var(--pesantren-green);
      font-size: 1.3rem;
    }
    .card-body {
      padding: 25px;
      background-color: #fff;
      border-radius: 0 0 15px 15px !important;
    }

    /* Form Control Override */
    .form-control, .custom-file-input {
      border-radius: 8px;
      border: 1px solid #ddd;
      padding: 10px 15px;
    }
    .form-control:focus {
      border-color: var(--pesantren-green);
      box-shadow: 0 0 0 0.2rem rgba(26, 107, 84, 0.15);
    }
    label {
      font-weight: 500;
      color: var(--pesantren-dark);
      margin-bottom: 8px;
      font-size: 0.9rem;
    }

    /* Button Override */
    .btn-primary {
      background-color: var(--pesantren-green);
      border-color: var(--pesantren-green);
      border-radius: 30px;
      padding: 12px 40px;
      font-weight: 600;
      letter-spacing: 0.5px;
    }
    .btn-primary:hover {
      background-color: #145a46;
      border-color: #145a46;
    }
    .btn-primary:disabled {
      background-color: #a0c5bb;
      border-color: #a0c5bb;
    }

    /* Custom File Input */
    .custom-file-label { 
      border-radius: 8px; 
    }
    .custom-file-label::after {
      border-radius: 0 8px 8px 0;
      background-color: var(--pesantren-green);
      color: white;
      border: none;
    }

    /* Header Form */
    .form-header {
      background: linear-gradient(135deg, var(--pesantren-green) 0%, #2e8b6a 100%);
      padding: 40px 20px;
      color: white;
      text-align: center;
      border-radius: 0 0 40px 40px;
      margin-bottom: 30px;
    }
    .form-header h1 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
    }

    /* Checkbox Override */
    .icheck-primary > input:first-child:checked + label::before {
      background-color: var(--pesantren-green);
      border-color: var(--pesantren-green);
    }

    /* Guide Box */
    .guide-box {
      background-color: var(--pesantren-green-light);
      border-left: 5px solid var(--pesantren-green);
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 30px;
    }
    .guide-box h5 {
      color: var(--pesantren-green);
      font-weight: 700;
    }
  </style>
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light">
    <div class="container">
      <a href="index" class="logo">
        <h2><i class="fas fa-mosque mr-2"></i> <?= strip_tags($pdb->sk_pdf); ?></h2>
      </a>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <?php
          $tomboladmin = mysqli_query($conn, "SELECT * FROM tb_tbladm");
          $ta = mysqli_fetch_object($tomboladmin);
          $buka = isset($ta->st) ? strip_tags($ta->st) : '';
          if ($buka=='buka') {
        ?>
        <li>
          <a class="nav-link" href="login">
            <span class="btn btn-outline-light btn-sm shadow-sm rounded-pill px-4">
              <i class="fas fa-sign-in-alt mr-1"></i> Login
            </span>
          </a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </nav>

  <!-- Header Form -->
  <div class="form-header">
    <div class="container">
      <h1>Formulir Pendaftaran Santri</h1>
      <p class="lead mb-2"><?= htmlspecialchars($_SESSION['data_lembaga'] ?? ''); ?></p>
      <small><i class="fas fa-info-circle"></i> Isi data dengan sebenar-benarnya sesuai dokumen resmi</small>
    </div>
  </div>

  <!-- Content Wrapper -->
  <div class="content-wrapper" style="background-color: transparent; min-height: auto;">
    <div class="content">
      <div class="container">
        
        <!-- Panduan Pengisian -->
        <div class="guide-box">
          <h5><i class="fas fa-book-reader mr-2"></i> Panduan Pengisian Formulir</h5>
          <ul class="mb-0" style="line-height: 2;">
            <li>Pastikan semua berkas diunggah dengan format <b>JPG, PNG, atau PDF</b> dan ukuran maksimal 1 MB.</li>
            <li>Data Nomor Induk Kependudukan (<b>NIK</b>) dan <b>NISN</b> harus sesuai dengan dokumen asli.</li>
            <li>Gunakan <b>Huruf Kapital</b> di awal kata untuk nama dan tempat lahir (contoh: Sidoarjo).</li>
            <li>Setelah semua terisi, centang kotak persetujuan dan klik <b>"Daftar Sekarang"</b>.</li>
          </ul>
        </div>

        <form action="proses_daftar.php" method="post" enctype="multipart/form-data" name="formulir" onsubmit="return validateForm()">

          <!-- Upload Berkas -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header" title="Klik tanda - untuk menyembunyikan formulir">
                  <h3 class="card-title"><i class="fas fa-cloud-upload-alt mr-2"></i> Upload Berkas</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Unit Lembaga</label>
                        <input type="text" name="lb_daf" class="form-control" value="<?= htmlspecialchars($_SESSION['data_lembaga'] ?? ''); ?>" readonly />
                        <input type="hidden" name="md_daf" value="online">
                        <input type="hidden" name="tg_daf" value="<?= date('Y-m-d') ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gelombang</label>
                        <?php
                        $QGelombang = mysqli_query($conn, "SELECT * FROM tb_gelombang");
                        $gl = mysqli_fetch_object($QGelombang);
                        $val_gel = isset($gl->st_gelombang) ? $gl->st_gelombang : '-';
                        ?>
                        <input type="text" name="gl_daf" value="<?= htmlspecialchars($val_gel); ?>" class="form-control" readonly />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Bukti Pembayaran <small class="text-danger">(Wajib)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="bp_berkas" accept="image/gif,image/jpeg,image/jpg,image/png,application/pdf" class="custom-file-input" id="file_bukti">
                            <label class="custom-file-label" for="file_bukti">Pilih File</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text"><button type="button" data-toggle="modal" data-target="#md_berkas-bp" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></button></span>
                          </div>
                        </div>
                        <small class="text-muted">Format: jpg, png, pdf. Maks 1mb</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Akte Kelahiran <small class="text-danger">(Wajib)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="ak_berkas" accept="image/gif,image/jpeg,image/jpg,image/png,application/pdf" class="custom-file-input" id="file_akte">
                            <label class="custom-file-label" for="file_akte">Pilih File</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text"><button type="button" data-toggle="modal" data-target="#md_berkas-ak" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></button></span>
                          </div>
                        </div>
                        <small class="text-muted">Format: jpg, png, pdf. Maks 1mb</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kartu Keluarga <small class="text-danger">(Wajib)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="kk_berkas" accept="image/gif,image/jpeg,image/jpg,image/png,application/pdf" class="custom-file-input" id="file_kk">
                            <label class="custom-file-label" for="file_kk">Pilih File</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text"><button type="button" data-toggle="modal" data-target="#md_berkas-kk" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></button></span>
                          </div>
                        </div>
                        <small class="text-muted">Format: jpg, png, pdf. Maks 1mb</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Surat Kelulusan / SKL <small class="text-danger">(Wajib)</small></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="sk_berkas" accept="image/gif,image/jpeg,image/jpg,image/png,application/pdf" class="custom-file-input" id="file_skl">
                            <label class="custom-file-label" for="file_skl">Pilih File</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text"><button type="button" data-toggle="modal" data-target="#md_berkas-sk" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></button></span>
                          </div>
                        </div>
                        <small class="text-muted">Format: jpg, png, pdf. Maks 1mb</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Data Diri -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card collapsed-card">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-user-graduate mr-2"></i> Data Diri Calon Santri</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nm_pdf" placeholder="Sesuai KK" class="form-control" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="ns_pdf" placeholder="Lihat di ijazah" class="form-control" minlength="10" onkeypress="return hanyaAngka(event)" required/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nk_pdf" placeholder="Sesuai KK (16 digit)" class="form-control" minlength="16" onkeypress="return hanyaAngka(event)" required/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tl_pdf" placeholder="Sesuai KK/Akte" class="form-control" required />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="number" name="tg_pdf" placeholder="Tgl" class="form-control" min="1" max="31" required />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Bulan Lahir</label>
                        <select name="bl_pdf" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tahun Lahir</label>
                        <input type="number" name="th_pdf" placeholder="Tahun" class="form-control" min="1990" max="2020" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk_pdf" class="form-control" required>
                          <option value="">- Pilih -</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Jml Saudara</label>
                        <input type="number" name="sd_pdf" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Anak Ke</label>
                        <input type="number" name="ak_pdf" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cita-cita</label>
                        <select name="ct_pdf" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="PNS">PNS</option>
                          <option value="TNI/Polri">TNI/Polri</option>
                          <option value="Guru/Dosen">Guru/Dosen</option>
                          <option value="Politikus">Politikus</option>
                          <option value="Wiraswasta">Wiraswasta</option>
                          <option value="Seniman/Artis">Seniman/Artis</option>
                          <option value="Ilmuwan">Ilmuwan</option>
                          <option value="Agamawan">Agamawan</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. HP Santri</label>
                        <input type="text" name="hp_pdf" placeholder="Contoh : 085200000000" class="form-control" required/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="em_pdf" placeholder="Contoh : emailsaya@gmail.com" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Hobi</label>
                        <select name="hb_pdf" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Olahraga">Olahraga</option>
                          <option value="Kesenian">Kesenian</option>
                          <option value="Membaca">Membaca</option>
                          <option value="Menulis">Menulis</option>
                          <option value="Jalan-jalan">Jalan-jalan</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Golongan Darah</label>
                        <select name="gol_dar" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="O">O</option>
                          <option value="AB">AB</option>
                          <option value="Belum diketahui">Belum diketahui</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Riwayat Penyakit <small>(Jika Ada)</small></label>
                        <input type="text" name="rw_py" placeholder="Kosongkan jika sehat" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-md-12 mt-3">
                      <h5 class="text-muted border-bottom pb-2"><i class="fas fa-map-marker-alt mr-1"></i> Alamat Lengkap</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" name="provinsi" placeholder="Isikan provinsi" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kabupaten</label>
                        <input type="text" name="kota" placeholder="Isikan kabupaten" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" name="kecamatan" placeholder="Isikan kecamatan" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kelurahan</label>
                        <input type="text" name="kelurahan" placeholder="Isikan kelurahan" class="form-control"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Sekolah Asal -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card collapsed-card">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-school mr-2"></i> Sekolah Asal</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input type="text" name="sa_sek" class="form-control" minlength="4" required />
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Status Sekolah</label>
                        <select name="st_sek" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Negeri">Negeri</option>
                          <option value="Swasta">Swasta</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>NPSN Sekolah</label>
                        <input type="text" name="sn_sek" class="form-control"/>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat Sekolah</label>
                        <input type="text" name="al_sek" placeholder="Isi nama Jalan, Desa, Kecamatan, Provinsi" class="form-control" minlength="10" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Kabupaten Sekolah</label>
                        <input type="text" name="kb_sek" class="form-control" minlength="3" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. Hp. Sekolah</label>
                        <input type="text" name="nw_sek" class="form-control" placeholder="Contoh : 085200000000"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Data Keluarga -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card collapsed-card">
                <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-users mr-2"></i> Data Keluarga</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. KK</label>
                        <input type="text" name="no_ktk" class="form-control" minlength="16" onkeypress="return hanyaAngka(event)"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. KIP <small>(Jika ada)</small></label>
                        <input type="text" name="no_kip" class="form-control"/>
                      </div>
                    </div>
                    
                    <div class="col-md-12 mt-3">
                      <h5 class="text-muted border-bottom pb-2"><i class="fas fa-male mr-1"></i> Data Ayah</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Lengkap Ayah</label>
                        <input type="text" name="nm_ayh" placeholder="Sesuai KTP/KK" class="form-control" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tl_ayh" placeholder="Sesuai KTP/KK" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="number" name="tg_ayh" placeholder="Tgl" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Bulan Lahir</label>
                        <select name="bl_ayh" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Januari">Januari</option>
                          <option value="Februari">Februari</option>
                          <option value="Maret">Maret</option>
                          <option value="April">April</option>
                          <option value="Mei">Mei</option>
                          <option value="Juni">Juni</option>
                          <option value="Juli">Juli</option>
                          <option value="Agustus">Agustus</option>
                          <option value="September">September</option>
                          <option value="Oktober">Oktober</option>
                          <option value="November">November</option>
                          <option value="Desember">Desember</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tahun Lahir</label>
                        <input type="number" name="th_ayh" placeholder="Tahun" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nk_ayh" placeholder="Sesuai KTP/KK" class="form-control" minlength="16" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <select name="pd_ayh" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Belum tamat SD">Belum tamat SD</option>
                          <option value="SD/Sederajat">SD/Sederajat</option>
                          <option value="SMP/Sederajat">SMP/Sederajat</option>
                          <option value="SMA/Sederajat">SMA/Sederajat</option>
                          <option value="D1">D1</option>
                          <option value="D2">D2</option>
                          <option value="D3">D3</option>
                          <option value="D4/S1">D4/S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                          <option value="Tidak bersekolah">Tidak bersekolah</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pk_ayh" placeholder="Sesuai KTP/KK" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rata-rata Penghasilan <small><i>per bulan</i></small></label>
                        <select name="pg_ayh" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                          <option value="500.000-1 Juta">500.000-1 Juta</option>
                          <option value="1 Juta-2 Juta">1 Juta-2 Juta</option>
                          <option value="2 Juta-3 Juta">2 Juta-3 Juta</option>
                          <option value="3 Juta-4 Juta">3 Juta-4 Juta</option>
                          <option value="4 Juta-5 Juta">4 Juta-5 Juta</option>
                          <option value="Lebih dari 5 Juta">Lebih dari 5 Juta</option>
                          <option value="Tidak ada">Tidak ada</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12 mt-3">
                      <h5 class="text-muted border-bottom pb-2"><i class="fas fa-female mr-1"></i> Data Ibu</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Lengkap Ibu</label>
                        <input type="text" name="nm_ibu" placeholder="Sesuai KTP/KK" class="form-control" required />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tl_ibu" placeholder="Sesuai KTP/KK" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="number" name="tg_ibu" placeholder="Tgl" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Bulan Lahir</label>
                        <select name="bl_ibu" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Januari">Januari</option>
                          <option value="Februari">Februari</option>
                          <option value="Maret">Maret</option>
                          <option value="April">April</option>
                          <option value="Mei">Mei</option>
                          <option value="Juni">Juni</option>
                          <option value="Juli">Juli</option>
                          <option value="Agustus">Agustus</option>
                          <option value="September">September</option>
                          <option value="Oktober">Oktober</option>
                          <option value="November">November</option>
                          <option value="Desember">Desember</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Tahun Lahir</label>
                        <input type="number" name="th_ibu" placeholder="Tahun" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nk_ibu" placeholder="Sesuai KTP/KK" class="form-control" minlength="16" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <select name="pd_ibu" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Belum tamat SD">Belum tamat SD</option>
                          <option value="SD/Sederajat">SD/Sederajat</option>
                          <option value="SMP/Sederajat">SMP/Sederajat</option>
                          <option value="SMA/Sederajat">SMA/Sederajat</option>
                          <option value="D1">D1</option>
                          <option value="D2">D2</option>
                          <option value="D3">D3</option>
                          <option value="D4/S1">D4/S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                          <option value="Tidak bersekolah">Tidak bersekolah</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pk_ibu" placeholder="Sesuai KTP/KK" class="form-control" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rata-rata Penghasilan <small><i>per bulan</i></small></label>
                        <select name="pg_ibu" class="form-control">
                          <option value="">- Pilih -</option>
                          <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                          <option value="500.000-1 Juta">500.000-1 Juta</option>
                          <option value="1 Juta-2 Juta">1 Juta-2 Juta</option>
                          <option value="2 Juta-3 Juta">2 Juta-3 Juta</option>
                          <option value="3 Juta-4 Juta">3 Juta-4 Juta</option>
                          <option value="4 Juta-5 Juta">4 Juta-5 Juta</option>
                          <option value="Lebih dari 5 Juta">Lebih dari 5 Juta</option>
                          <option value="Tidak ada">Tidak ada</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-md-12 mt-3">
                      <h5 class="text-muted border-bottom pb-2"><i class="fas fa-phone-alt mr-1"></i> Kontak & Lainnya</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. Hp. Orangtua</label>
                        <input type="text" name="hp_ortu" placeholder="Contoh : 082200010001" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>No. WA Orangtua</label>
                        <input type="text" name="wa_ortu" placeholder="Contoh : 082200010001" class="form-control">
                        <input type="hidden" name="st_pdf" value="Menunggu">
                        <input type="hidden" name="pn_pdf" value="0">
                        <input type="hidden" name="ug_pdf" value="0">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Informasi Ponpes Raudhatul Mujawwidin</label>
                        <select name="info_psb" class="form-control" required>
                          <option value="">- Pilih -</option>
                          <option value="Tetangga/Keluarga/Kerabat/Teman">Tetangga/Keluarga/Kerabat/Teman</option>
                          <option value="Spanduk/Banner/Baliho PP Romu">Spanduk/Banner/Baliho PP Romu</option>
                          <option value="Brosur Pendaftaran">Brosur Pendaftaran</option>
                          <option value="Media Sosial">Media Sosial</option>
                          <option value="Kegiatan Bakti Sosial">Kegiatan Bakti Sosial</option>
                          <option value="Pengajian">Pengajian</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Alasan Mondok</label>
                        <select name="al_mondok" class="form-control" required>
                          <option value="">- Pilih -</option>
                          <option value="Keinginan Orangtua">Keinginan Orangtua</option>
                          <option value="Keinginan Sendiri">Keinginan Sendiri</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Aksi Submit -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body text-center">
                  <div class="icheck-primary d-inline-block mr-2">
                    <input type="checkbox" name="simpan" id="simpan" value="check" />
                    <label for="simpan"></label>
                  </div>
                  <label class="form-check-label text-left" style="max-width: 80%; font-size: 0.9rem;">
                    Saya menyatakan bahwa data yang saya kirim telah valid dan sesuai dengan dokumen yang sah. <b>Apabila di kemudian hari terdapat data yang tidak valid saya bertanggung jawab penuh atas segala konsekuensinya.</b>
                  </label>
                  <br><br>
                  <button type="submit" name="kirim" class="btn btn-primary btn-lg" disabled>
                    <i class="fas fa-paper-plane mr-2"></i> Daftar Sekarang
                  </button>
                  <br><br>
                  <a href="index" class="text-muted"><i class="fas fa-arrow-left mr-1"></i> Kembali Ke Homepage</a>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
    <?php include 'md_berkas.php'; ?>
  </div>

  <!-- Footer -->
  <footer class="main-footer" style="background: var(--pesantren-dark); color: #ccc; padding: 40px 0;">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 style="color: var(--pesantren-gold); font-family: 'Playfair Display', serif;"><i class="fas fa-mosque mr-2"></i> <?= strip_tags($pdb->sk_pdf); ?></h5>
          <p style="font-size: 0.9rem;">Sistem Penerimaan Santri Baru secara online untuk memudahkan proses pendaftaran dari jarak jauh.</p>
        </div>
        <div class="col-md-4">
          <h5 style="color: var(--pesantren-gold);">Kontak Panitia</h5>
          <ul class="list-unstyled" style="font-size: 0.9rem;">
            <li><i class="fas fa-user mr-2"></i> <?= strip_tags($pdb->n1_pdf); ?> (<?= strip_tags($pdb->k1_pdf); ?>)</li>
            <li><i class="fas fa-user mr-2"></i> <?= strip_tags($pdb->n2_pdf); ?> (<?= strip_tags($pdb->k2_pdf); ?>)</li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5 style="color: var(--pesantren-gold);">Alamat</h5>
          <p style="font-size: 0.9rem;"><?= strip_tags($pdb->a1_pdf); ?></p>
        </div>
      </div>
      <hr style="border-color: #444;">
      <div class="row align-items-center">
        <div class="col-md-6 text-left">
          <strong style="color: #fff;">&copy; <?= date('Y'); ?> Developed by <a href="#" style="color: var(--pesantren-gold);">DigitalNode ID</a>.</strong>
        </div>
        <div class="col-md-6 text-right">
          <strong style="color: var(--pesantren-green);">PSB V.3.0</strong>
        </div>
      </div>
    </div>
  </footer>

</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/adminlte.min.js"></script>
<script src="assets/plugins/bs-custom-file-file-input/bs-custom-file-input.min.js"></script>
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/toastr/alert.js"></script>

<script>
    $(function () {
      bsCustomFileInput.init();
    });

    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)){
        toastr.error('Maaf, isian hanya boleh diisi angka')
        return false;
      }
      return true;
    }

    function validateForm() {
      var form = document.forms["formulir"];

      // PERBAIKAN JS: Gunakan operator OR (||), bukan koma (,)
      if (form["bp_berkas"].value == "" || form["ak_berkas"].value == "" || form["kk_berkas"].value == "" || form["sk_berkas"].value == "") {
          toastr.error('Maaf, Berkas Belum Lengkap')
          form["bp_berkas"].focus();
          return false;
      }

      if (form["nm_pdf"].value == "") {
          toastr.error('Maaf, Nama Lengkap Tidak Boleh Kosong')
          form["nm_pdf"].focus();
          return false;
      }

      if (form["ns_pdf"].value == "" || form["ns_pdf"].value.length < 10) {
          toastr.error('Maaf, NISN Tidak Boleh Kosong dan minimal 10 karakter')
          form["ns_pdf"].focus();
          return false;
      }

      if (form["nk_pdf"].value == "" || form["nk_pdf"].value.length < 16) {
          toastr.error('Maaf, NIK Tidak Boleh Kosong dan harus 16 digit')
          form["nk_pdf"].focus();
          return false;
      }

      if (form["bl_pdf"].value == "") {
          toastr.error('Maaf, Bulan Lahir Belum Dipilih')
          form["bl_pdf"].focus();
          return false;
      }

      if (form["jk_pdf"].value == "") {
          toastr.error('Maaf, Jenis Kelamin Belum Dipilih')
          form["jk_pdf"].focus();
          return false;
      }

      if (form["nm_ayh"].value == "") {
          toastr.error('Maaf, Nama Ayah Tidak Boleh Kosong')
          form["nm_ayh"].focus();
          return false;
      }

      if (form["nm_ibu"].value == "") {
          toastr.error('Maaf, Nama Ibu Tidak Boleh Kosong')
          form["nm_ibu"].focus();
          return false;
      }

      if (form["info_psb"].value == "") {
          toastr.error('Maaf, Sumber Informasi Belum Dipilih')
          form["info_psb"].focus();
          return false;
      }

      if (form["al_mondok"].value == "") {
          toastr.error('Maaf, Alasan Mondok Belum Dipilih')
          form["al_mondok"].focus();
          return false;
      }

      // Tambahan: Validasi Ekstensi File
      var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;
      var fileInputs = ['bp_berkas', 'ak_berkas', 'kk_berkas', 'sk_berkas'];
      for (var i = 0; i < fileInputs.length; i++) {
        var fileInput = form[fileInputs[i]];
        if (fileInput.value != "" && !allowedExtensions.exec(fileInput.value)) {
          toastr.error('Format file ' + fileInputs[i].replace('_', ' ') + ' tidak valid. Hanya JPG, PNG, PDF, GIF');
          fileInput.focus();
          return false;
        }
      }

      return true;
    }

    $("input[type=checkbox]").on( "change", function(evt) {
      let simpan = $('input[id=simpan]:checked');
      if(simpan.length == 0){
        $("button[name=kirim]").prop("disabled", true);
      }else{
        $("button[name=kirim]").prop("disabled", false);
      }
    });
</script>
</body>
</html>