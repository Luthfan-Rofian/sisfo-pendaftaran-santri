<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';
include 'pages/header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Pendaftar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="pg_pendaftar">Pendaftar</a></li>
              <li class="breadcrumb-item active"><a href="#">Tambah</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="card">
          <form action="a_tpendaftar.php" method="post" enctype="multipart/form-data" name="formulir" onsubmit="return validateForm()">

            <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card card-primary card-outline">
                  <div class="card-header" title="Klik tanda - untuk menyembunyikan formulir">
                    <h3 class="card-title">Upload Berkas</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-success btn-sm mt-1" onclick="window.history.go(-1);">
                          <i class="fas fa-arrow-left"></i> 
                          <small>Kembali</small>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body" style="background-color: #F8F8FF;">
                    <div class="wrapper">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Unit Lembaga</label>
                            <input type="text" name="lb_daf" value="<?= $lembaga; ?>" class="form-control" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Mode Pendaftaran</label>
                            <input type="text" name="md_daf" value="offline" class="form-control" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tanggal Daftar</label>
                            <input type="text" name="tg_daf" value="<?= date('Y-m-d') ?>" class="form-control" required />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Gelombang</label>
                            <?php
                            $Gelombang = "SELECT * FROM tb_gelombang";
                            $QGelombang = mysqli_query($conn, $Gelombang);
                            $gl=mysqli_fetch_object($QGelombang);
                            ?>
                            <input type="text" name="gl_daf" value="<?= $gl->st_gelombang; ?>"
                            class="form-control" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="file_bukti">Bukti Pembayaran</label>
                            <input type="checkbox" checked="checked" name="upload_bukti">
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="bp_berkas" name="media_empty" accept="image/gif,image/jpeg,image/jpg,image/png," class="custom-file-input" id="file_bukti">
                                <label class="custom-file-label" for="file_bukti">Pilih File</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <button type="button" data-toggle="modal" data-target="#md_berkas-bp" class="btn btn-danger btn-xs">Lihat Contoh</button>
                                </span>
                              </div>
                            </div>
                            <small>Format : jpg, jpeg, png, pdf, gif . Maks. Ukuran 1 mb</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="file_akte">Akte Kelahiran</label>
                            <input type="checkbox" checked="checked" name="upload_akte">
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="ak_berkas" name="media_empty" accept="image/gif,image/jpeg,image/jpg,image/png," class="custom-file-input" id="file_akte">
                                <label class="custom-file-label" for="file_akte">Pilih File</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <button type="button" data-toggle="modal" data-target="#md_berkas-ak" class="btn btn-danger btn-xs">Lihat Contoh</button>
                                </span>
                              </div>
                            </div>
                            <small>Format : jpg, jpeg, png, pdf, gif . Maks. Ukuran 1 mb</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="file_kk">Kartu Keluarga</label>
                            <input type="checkbox" checked="checked" name="upload_kk">
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="kk_berkas" name="media_empty" accept="image/gif,image/jpeg,image/jpg,image/png," class="custom-file-input" id="file_kk">
                                <label class="custom-file-label" for="file_kk">Pilih File</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <button type="button" data-toggle="modal" data-target="#md_berkas-kk" class="btn btn-danger btn-xs">Lihat Contoh</button>
                                </span>
                              </div>
                            </div>
                            <small>Format : jpg, jpeg, png, pdf, gif . Maks. Ukuran 1 mb</small>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="file_skl">Surat Kelulusan</label>
                            <input type="checkbox" checked="checked" name="upload_skl">
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="sk_berkas" name="media_empty" accept="image/gif,image/jpeg,image/jpg,image/png," class="custom-file-input" id="file_skl">
                                <label class="custom-file-label" for="file_skl">Pilih File</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <button type="button" data-toggle="modal" data-target="#md_berkas-sk" class="btn btn-danger btn-xs">Lihat Contoh</button>
                                </span>
                              </div>
                            </div>
                            <small>Format : jpg, jpeg, png, pdf, gif . Maks. Ukuran 1 mb</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.row -->

            <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card card-primary card-outline collapsed-card">
                  <div class="card-header" title="Klik tanda + untuk menampilkan formulir">
                    <h3 class="card-title">Data Diri</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body" style="background-color: #F8F8FF;">
                    <div class="wrapper">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nm_pdf" placeholder="Sesuai KK" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>NISN</label>
                            <input type="text" name="ns_pdf" placeholder="Lihat di ijazah" class="form-control" minlength="10" onkeypress="return hanyaAngka(event)"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nk_pdf" placeholder="Sesuai KK" class="form-control" minlength="16" onkeypress="return hanyaAngka(event)"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tl_pdf" placeholder="Sesuai KK/Akte" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="number" name="tg_pdf" placeholder="--" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Bulan Lahir</label>
                            <select name="bl_pdf" class="form-control" />
                                <option value="">- Pilih -</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="">Juli</option>
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
                            <input type="number" name="th_pdf" placeholder="----" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk_pdf" class="form-control" />
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
                            <select name="ct_pdf" class="form-control" />
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
                            <label>No. Hp.</label>
                            <input type="text" name="hp_pdf" placeholder="Contoh : 085200000000" class="form-control"/>
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
                            <select name="hb_pdf" class="form-control" />
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
                            <select name="gol_dar" class="form-control"/>
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
                            <label>Riwayat Penyakit <small>Jika Ada</small></label>
                            <input type="text" name="rw_py" placeholder="---" class="form-control"/>
                          </div>
                        </div>

                        <!-- Alamat !-->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-sm-3">Provinsi</label>
                            <div class="col-sm-9">
                              <input type="text" name="provinsi" placeholder="Isikan provinsi" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-sm-3" >Kabupaten</label>
                            <div class="col-sm-9">
                              <input type="text" name="kota" placeholder="Isikan kabupaten" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-sm-3" >Kecamatan</label>
                            <div class="col-sm-9"> 
                              <input type="text" name="kecamatan" placeholder="Isikan kecamatan" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-sm-3" >Kelurahan</label>
                            <div class="col-sm-9"> 
                              <input type="text" name="kelurahan" placeholder="Isikan kelurahan" class="form-control"/>
                            </div>
                          </div>
                        </div>                        
                        <!-- Alamat !-->

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card card-primary card-outline collapsed-card">
                  <div class="card-header" title="Klik tanda + untuk menampilkan formulir">
                    <h3 class="card-title">Sekolah Asal</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body" style="background-color: #F8F8FF;">
                    <div class="wrapper">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" name="sa_sek" class="form-control" minlength="4" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Status Sekolah</label>
                            <select name="st_sek" class="form-control" />
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
            </div>

            <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card card-primary card-outline collapsed-card">
                  <div class="card-header" title="Klik tanda + untuk menampilkan formulir">
                    <h3 class="card-title">Data Keluarga</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body" style="background-color: #F8F8FF;">
                    <div class="wrapper">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>No. KK</label>
                            <input type="text" name="no_ktk" class="form-control" minlength="16" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>No. KIP <small>(Jika ada)</small></label>
                            <input type="text" name="no_kip" class="form-control"/>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <hr>
                        </div>
                        <div class="col-md-12">
                          Data Ayah
                        </div>
                        <div class="col-md-12">
                          <hr>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nama Lengkap Ayah</label>
                            <input type="text" name="nm_ayh" placeholder="Sesuai KTP/KK" class="form-control" />
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
                            <input type="number" name="tg_ayh" placeholder="--" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Bulan Lahir</label>
                            <select name="bl_ayh" class="form-control" />
                                <option value="">- Pilih -</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="">Juli</option>
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
                            <input type="number" name="th_ayh" placeholder="----" class="form-control" />
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
                            <select name="pd_ayh" class="form-control" />
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
                            <select name="pg_ayh" class="form-control" />
                                <option value="">- Pilih -</option>
                                <option value="Kurang dari 5.00.000">Kurang dari 5.00.000</option>
                                <option value="5.00.100-1 Juta">5.00.100-1 Juta</option>
                                <option value="1.000.100-2 Juta">1.000.100-2 Juta</option>
                                <option value="2.000.100-3 Juta">2.000.100-3 Juta</option>
                                <option value="3.000.100-4 Juta">3.000.100-4 Juta</option>
                                <option value="4.000.100-5 Juta">4.000.100-5 Juta</option>
                                <option value="Lebih dari 5 Juta">Lebih dari 5 Juta</option>
                                <option value="Tidak ada">Tidak ada</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <hr>
                        </div>
                        <div class="col-md-12">
                          Data Ibu
                        </div>
                        <div class="col-md-12">
                          <hr>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nama Lengkap Ibu</label>
                            <input type="text" name="nm_ibu" placeholder="Sesuai KTP/KK" class="form-control" />
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
                            <input type="number" name="tg_ibu" placeholder="--" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Bulan Lahir</label>
                            <select name="bl_ibu" class="form-control" />
                                <option value="">- Pilih -</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="">Juli</option>
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
                            <input type="number" name="th_ibu" placeholder="----" class="form-control" />
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
                            <select name="pd_ibu" class="form-control" />
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
                            <select name="pg_ibu" class="form-control" />
                                <option value="">- Pilih -</option>
                                <option value="Kurang dari 5.00.000">Kurang dari 5.00.000</option>
                                <option value="5.00.100-1 Juta">5.00.100-1 Juta</option>
                                <option value="1.000.100-2 Juta">1.000.100-2 Juta</option>
                                <option value="2.000.100-3 Juta">2.000.100-3 Juta</option>
                                <option value="3.000.100-4 Juta">3.000.100-4 Juta</option>
                                <option value="4.000.100-5 Juta">4.000.100-5 Juta</option>
                                <option value="Lebih dari 5 Juta">Lebih dari 5 Juta</option>
                                <option value="Tidak ada">Tidak ada</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <hr>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>No. Hp. Orangtua</label>
                            <input type="text" name="hp_ortu" placeholder="Contoh : 082200010001" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>No. WA Orangtua</label>
                            <input type="text" name="wa_ortu" placeholder="Contoh : 082200010001" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status Pendaftaran</label>
                            <select name="st_pdf" class="form-control">
                              <option value="Diterima">Diterima</option>
                              <option value="Menunggu">Menunggu</option>
                              <option value="Ditolak">Ditolak</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Panitia Pendaftaran</label>
                            <select name="pn_pdf" class="form-control" required />
                              <option value="">- Pilih -</option>
                              <?php
                              $User = "SELECT * FROM tb_user WHERE lb_user='$lembaga'  ORDER BY nm_user ASC";
                              $QUser = mysqli_query($conn, $User);
                              while($us=mysqli_fetch_object($QUser)){
                              ?>
                              <option value="<?= strip_tags($us->nm_user); ?>">
                                <?= strip_tags($us->nm_user); ?>
                              </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Jumlah Uang Pendaftaran</label>
                            <input type="text" name="ug_pdf" placeholder="Contoh : 200000 (tanpa titik, koma atau spasi)" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Info PSB</label>
                            <select name="info_psb" class="form-control" required="required">
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
                            <select name="al_mondok" class="form-control" required="required">
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
            </div>

            <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Aksi</h3>
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">                          
                          <label class="control-label text-primary">Silahkan centang persetujuan berikut dan klik Simpan Data</label><br>
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="simpan" id="simpan" value="check" />
                            <label for="simpan"></label>
                          </div>
                          &nbsp;&nbsp; <b>S</b>aya menyatakan bahwa data yang saya kirim telah valid dan sesuai dengan dokumen yang sah serta data tersebut siap digunakan untuk keperluan administrasi. <b>A</b>pabila di kemudian hari terdapat data yang tidak valid saya bertanggung jawab penuh atas segala konsekuensinya <br><br>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="submit" name="kirim" value="Simpan Data" class="btn btn-primary" disabled="">
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.row -->

          </form>
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'modals/md_berkas.php';
include 'modals/md_logout.php';
include 'pages/footer.php';
?>
<script src="../assets/plugins/toastr/alert2.js"></script>
  <script>
    $(function () {
      bsCustomFileInput.init();
    });

    function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57)){
        toastr.error('Maaf Isi Hanya Boleh Diisi Angka')
        return false;
     };
    return true;
    }

    function validateForm() {

      if (document.forms["formulir"]["bp_berkas"].value == "", document.forms["formulir"]["ak_berkas"].value == "", document.forms["formulir"]["kk_berkas"].value == ""){
          document.forms["formulir"]["bp_berkas"].focus();
          return false;
      }

      if (document.forms["formulir"]["lb_daf"].value == "") {
          toastr.error('Maaf Anda Belum Memilih Unit Lembaga')
          document.forms["formulir"]["lb_daf"].focus();
          return false;
      }

      if (document.forms["formulir"]["nm_pdf"].value == "") {
          toastr.error('Maaf, Nama Tidak Boleh Kosong')
          document.forms["formulir"]["nm_pdf"].focus();
          return false;
      }

      if (document.forms["formulir"]["ns_pdf"].value == "") {
          toastr.error('Maaf, NISN Tidak Boleh Kosong, minimal 10 karakter')
          document.forms["formulir"]["ns_pdf"].focus();
          return false;
      }

      if (document.forms["formulir"]["nk_pdf"].value == "") {
          toastr.error('Maaf, NIK Tidak Boleh Kosong')
          document.forms["formulir"]["ns_pdf"].focus();
          return false;
      }
    }

    $("input[type=checkbox]").on( "change", function(evt) {
      let simpan = $('input[id=simpan]:checked');
      if(simpan.length == 0){
        $("input[name=kirim]").prop("disabled", true);
      }else{
        $("input[name=kirim]").prop("disabled", false);
      }
    });

    function logout_modal(logout_url)
    {
    $('#modal_logout').modal('show', {backdrop: 'static'});
    document.getElementById('logout_link').setAttribute('href' , logout_url);
    }
  </script>
</body>
</html>