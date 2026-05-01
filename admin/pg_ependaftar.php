<?php
error_reporting(0);
include '../config/koneksi.php';
include 'pages/header.php';
$id=$_GET['idpdf'];
$pdf = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE id_p='$id'");
$pd = mysqli_fetch_object($pdf);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ubah Data Pendaftar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Beranda</a></li>
              <li class="breadcrumb-item active"><a href="pg_pendaftar">Pendaftar</a></li>
              <li class="breadcrumb-item active"><a href="#">Edit</a></li>
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
          <form action="a_ependaftar.php" method="post">

            <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-6">
                <div class="card card-primary card-outline">
                  <div class="card-header" title="Klik tanda - untuk menyembunyikan formulir">
                    <h3 class="card-title">Pendaftaran dan Berkas</h3>
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
                            <input type="hidden" name="id_p" value="<?= $pd->id_p ?>">
                            <select name="lb_daf" class="form-control" required />
                              <option value="<?= $pd->lb_daf; ?>"><?= $pd->lb_daf; ?></option>
                              <?php
                              $Lembaga = "SELECT * FROM tb_lembaga ORDER BY tk_lembaga ASC";
                              $QLembaga = mysqli_query($conn, $Lembaga);
                              while($tl=mysqli_fetch_object($QLembaga)){
                              ?>
                              <option value="<?= $tl->nm_lembaga ?>">
                                <?= $tl->nm_lembaga ?>
                              </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Mode</label>
                            <select name="md_daf" class="form-control">
                              <option value="<?= $pd->md_daf ?>"><?= $pd->md_daf ?></option>
                              <option value="offline">offline</option>
                              <option value="online">online</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tgl Daftar</label>
                            <input type="text" name="tg_daf" value="<?= $pd->tg_daf ?>" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Gelombang</label>
                            <input type="text" name="gl_daf" value="<?= $pd->gl_daf ?>" class="form-control">
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
                            <input type="text" name="nm_pdf" value="<?= $pd->nm_pdf ?>" placeholder="Sesuai KK" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>NISN</label>
                            <input type="text" name="ns_pdf" value="<?= $pd->ns_pdf ?>" placeholder="Lihat di ijazah" class="form-control" minlength="10" onkeypress="return hanyaAngka(event)"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nk_pdf" value="<?= $pd->nk_pdf ?>" placeholder="Sesuai KK" class="form-control" minlength="16" onkeypress="return hanyaAngka(event)"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tl_pdf" value="<?= $pd->tl_pdf ?>" placeholder="Sesuai KK/Akte" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="number" name="tg_pdf" value="<?= $pd->tg_pdf ?>" placeholder="--" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Bulan Lahir</label>
                            <select name="bl_pdf" class="form-control" />
                                <option value="<?= $pd->bl_pdf ?>"><?= $pd->bl_pdf ?></option>
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
                            <input type="number" name="th_pdf" value="<?= $pd->th_pdf ?>" placeholder="----" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk_pdf" class="form-control" />
                              <option value="<?= $pd->jk_pdf ?>"><?= $pd->jk_pdf ?></option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Jml Saudara</label>
                            <input type="number" name="sd_pdf" value="<?= $pd->sd_pdf ?>" class="form-control"/>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Anak Ke</label>
                            <input type="number" name="ak_pdf" value="<?= $pd->ak_pdf ?>" class="form-control"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Cita-cita</label>
                            <select name="ct_pdf" class="form-control" />
                              <option value="<?= $pd->ct_pdf ?>"><?= $pd->ct_pdf ?></option>
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
                            <input type="text" name="hp_pdf" value="<?= $pd->hp_pdf ?>" placeholder="Contoh : 085200000000" class="form-control"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="em_pdf" value="<?= $pd->em_pdf ?>" placeholder="Contoh : emailsaya@gmail.com" class="form-control"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Hobi</label>
                            <select name="hb_pdf" class="form-control" />
                              <option value="<?= $pd->hb_pdf ?>"><?= $pd->hb_pdf ?></option>
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
                              <option value="<?= $pd->gol_dar ?>"><?= $pd->gol_dar ?></option>
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
                            <input type="text" name="rw_py" value="<?= $pd->rw_py ?>" placeholder="---" class="form-control"/>
                          </div>
                        </div>

                        <!-- Alamat !-->
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-sm-3">Provinsi</label>
                            <div class="col-sm-9">
                              <input type="text" name="provinsi" placeholder="Isikan provinsi" value="<?= $pd->provinsi ?>" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-sm-3" >Kabupaten</label>
                            <div class="col-sm-9">
                              <input type="text" name="kota" placeholder="Isikan kabupaten" value="<?= $pd->kota ?>" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-sm-3" >Kecamatan</label>
                            <div class="col-sm-9"> 
                              <input type="text" name="kecamatan" placeholder="Isikan kecamatan" value="<?= $pd->kecamatan ?>" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label col-sm-3" >Kelurahan</label>
                            <div class="col-sm-9"> 
                              <input type="text" name="kelurahan" placeholder="Isikan kelurahan" value="<?= $pd->kelurahan ?>" class="form-control"/>
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
                            <input type="text" name="sa_sek" value="<?= $pd->sa_sek ?>" class="form-control" minlength="4" />
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Status Sekolah</label>
                            <select name="st_sek" class="form-control" />
                              <option value="<?= $pd->st_sek ?>"><?= $pd->st_sek ?></option>
                              <option value="Negeri">Negeri</option>
                              <option value="Swasta">Swasta</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>NPSN Sekolah</label>
                            <input type="text" name="sn_sek" value="<?= $pd->sn_sek ?>" class="form-control"/>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Alamat Sekolah</label>
                            <input type="text" name="al_sek" value="<?= $pd->al_sek ?>" placeholder="Isi nama Jalan, Desa, Kecamatan, Provinsi" class="form-control" minlength="10" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Kabupaten Sekolah</label>
                            <input type="text" name="kb_sek" value="<?= $pd->kb_sek ?>" class="form-control" minlength="3" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>No. Hp. Sekolah</label>
                            <input type="text" name="nw_sek" value="<?= $pd->nw_sek ?>" class="form-control" placeholder="Contoh : 085200000000"/>
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
                            <input type="text" name="no_ktk" value="<?= $pd->no_ktk ?>" class="form-control" minlength="16" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>No. KIP <small>(Jika ada)</small></label>
                            <input type="text" name="no_kip" value="<?= $pd->no_kip ?>" class="form-control"/>
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
                            <input type="text" name="nm_ayh" value="<?= $pd->nm_ayh ?>" placeholder="Sesuai KTP/KK" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tl_ayh" value="<?= $pd->tl_ayh ?>" placeholder="Sesuai KTP/KK" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="number" name="tg_ayh" value="<?= $pd->tg_ayh ?>" placeholder="--" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Bulan Lahir</label>
                            <select name="bl_ayh" class="form-control" />
                                <option value="<?= $pd->bl_ayh ?>"><?= $pd->bl_ayh ?></option>
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
                            <input type="number" name="th_ayh" value="<?= $pd->th_ayh ?>" placeholder="----" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nk_ayh" value="<?= $pd->nk_ayh ?>" placeholder="Sesuai KTP/KK" class="form-control" minlength="16" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Pendidikan Terakhir</label>
                            <select name="pd_ayh" class="form-control" />
                                <option value="<?= $pd->pd_ayh ?>"><?= $pd->pd_ayh ?></option>
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
                            <input type="text" name="pk_ayh" value="<?= $pd->pk_ayh ?>" placeholder="Sesuai KTP/KK" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rata-rata Penghasilan <small><i>per bulan</i></small></label>
                            <select name="pg_ayh" class="form-control" />
                                <option value="<?= $pd->pg_ayh ?>"><?= $pd->pg_ayh ?></option>
                                <option value="Kurang dari 5.00.000">Kurang dari 5.00.000</option>
                                <option value="5.00.100-1.000.000">5.00.100-1.000.000</option>
                                <option value="1.000.100-2.000.000">1.000.100-2.000.000</option>
                                <option value="2.000.100-3.000.000">2.000.100-3.000.000</option>
                                <option value="3.000.100-4.000.000">3.000.100-4.000.000</option>
                                <option value="4.000.100-5.000.000">4.000.100-5.000.000</option>
                                <option value="Lebih dari 5.000.000">Lebih dari 5.000.000</option>
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
                            <input type="text" name="nm_ibu" value="<?= $pd->nm_ibu ?>" placeholder="Sesuai KTP/KK" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tl_ibu" value="<?= $pd->tl_ibu ?>" placeholder="Sesuai KTP/KK" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="number" name="tg_ibu" value="<?= $pd->tg_ibu ?>" placeholder="--" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Bulan Lahir</label>
                            <select name="bl_ibu" class="form-control" />
                                <option value="<?= $pd->bl_ibu ?>"><?= $pd->bl_ibu ?></option>
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
                            <input type="number" name="th_ibu" value="<?= $pd->th_ibu ?>" placeholder="----" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nk_ibu" value="<?= $pd->nk_ibu ?>" placeholder="Sesuai KTP/KK" class="form-control" minlength="16" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Pendidikan Terakhir</label>
                            <select name="pd_ibu" class="form-control" />
                                <option value="<?= $pd->pd_ibu ?>"><?= $pd->pd_ibu ?></option>
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
                            <input type="text" name="pk_ibu" value="<?= $pd->pk_ibu ?>" placeholder="Sesuai KTP/KK" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rata-rata Penghasilan <small><i>per bulan</i></small></label>
                            <select name="pg_ibu" class="form-control" />
                                <option value="<?= $pd->pg_ibu ?>"><?= $pd->pg_ibu ?></option>
                                <option value="Kurang dari 5.00.000">Kurang dari 5.00.000</option>
                                <option value="5.00.100-1.000.000">5.00.100-1.000.000</option>
                                <option value="1.000.100-2.000.000">1.000.100-2.000.000</option>
                                <option value="2.000.100-3.000.000">2.000.100-3.000.000</option>
                                <option value="3.000.100-4.000.000">3.000.100-4.000.000</option>
                                <option value="4.000.100-5.000.000">4.000.100-5.000.000</option>
                                <option value="Lebih dari 5.000.000">Lebih dari 5.000.000</option>
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
                            <input type="text" name="hp_ortu" value="<?= $pd->hp_ortu ?>" placeholder="Contoh : 082200010001" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>No. WA Orangtua</label>
                            <input type="text" name="wa_ortu" value="<?= $pd->wa_ortu ?>" placeholder="Contoh : 082200010001" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Status Pendaftaran</label>
                            <select name="st_pdf" class="form-control">
                              <option value="<?= $pd->st_pdf ?>"><?= $pd->st_pdf ?></option>
                              <option value="Menunggu">Menunggu</option>
                              <option value="Diterima">Diterima</option>
                              <option value="Ditolak">Ditolak</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Panitia Pendaftaran</label>
                            <select name="pn_pdf" class="form-control" required />
                              <option value="<?= $pd->pn_pdf ?>"><?= $pd->pn_pdf ?></option>
                              <?php
                              $User = "SELECT * FROM tb_user ORDER BY nm_user ASC";
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
                            <input type="text" name="ug_pdf" placeholder="Contoh : 200000 (tanpa titik, koma atau spasi)" value="<?= $pd->ug_pdf ?>" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Info PSB</label>
                            <select name="info_psb" class="form-control" required="required">
                              <option value="<?= $pd->info_psb ?>"><?= $pd->info_psb ?></option>
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
                              <option value="<?= $pd->al_mondok ?>"><?= $pd->al_mondok ?></option>
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
                        <div class="col-md-6">
                          <div class="form-group">
                            <button type="submit" name="ubah" class="btn btn-success">Proses</button>
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
include 'pages/footer.php';
include 'modals/md_logout.php';
?>
<script>
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