<!-- Modal -->
<div class="modal fade" id="md_tpendaftar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="md_tpendaftar">
            <div class="modal-header bg-indigo text-white">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pendaftar Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <form action="a_tpendaftar.php" method="post">
                <div class="modal-body">

                    <div class="row">

                    <div class="col-md-12 text-center text-white" id="data-diri">
                        <h5 class="bg-indigo disabled"><b>Data Diri</b></h5>
                        <hr>
                    </div>

                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="nm_pdf" class="control-label">Nama Pendaftar</label>
                                <input type="hidden" id="id_daf" name="id_daf">
                                <input type="text" class="form-control" id="nm_pdf" name="nm_pdf">
                            </div>
                        </div>
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                                <label for="ns_pdf" class="control-label">NISN</label>
                                <input type="text" class="form-control" id="ns_pdf" name="ns_pdf" minlength="10">
                            </div>
                        </div>
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                                <label for="nk_pdf" class="control-label">NIK</label>
                                <input type="text" class="form-control" id="nk_pdf" name="nk_pdf" minlength="16">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="tl_pdf" class="control-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tl_pdf" name="tl_pdf">
                            </div>
                        </div>
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                                <label for="tg_pdf" class="control-label">Tanggal Lahir</label>
                                <input type="number" class="form-control" id="tg_pdf" name="tg_pdf">
                            </div>
                        </div>
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                                <label class="control-label">Bulan Lahir</label>
                                <select name="bl_pdf" class="form-control" id="bl_pdf">
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
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                                <label for="th_pdf" class="control-label">Tahun Lahir</label>
                                <input type="text" class="form-control" id="th_pdf" name="th_pdf">
                            </div>
                        </div>
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                                <label for="jk_pdf" class="control-label">Jenis Kelamin</label>
                                <small class="text-danger">*</small>
                                <select class="form-control" id="jk_pdf" name="jk_pdf">
                                    <option value="">-Pilih-</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                                <label for="sd_pdf" class="control-label">Jumlah Saudara</label>
                                <input type="number" class="form-control" id="sd_pdf" name="sd_pdf">
                            </div>
                        </div>
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                                <label for="ak_pdf" class="control-label">Anak Ke</label>
                                <input type="number" class="form-control" id="ak_pdf" name="ak_pdf">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label class="control-label">Cita-cita</label>
                                <select name="ct_pdf" class="form-control" id="ct_pdf">
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
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="hp_pdf" class="control-label">No. Hp.</label>
                                <input type="text" class="form-control" id="hp_pdf" name="hp_pdf">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="em_pdf" class="control-label">Email</label>
                                <input type="email" class="form-control" id="em_pdf" name="em_pdf">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="hb_pdf" class="control-label">Hobi</label>
                                <select name="hb_pdf" class="form-control" id="hb_pdf">
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
                        <div class="col-md-12 bg-light">
                            <div class="form-group">
                              <label for="al_pdf" class="control-label">Alamat Lengkap</label>
                              <input type="text" name="al_pdf" class="form-control" id="al_pdf" minlength="10">
                            </div>
                        </div>

                    <div class="col-md-12 text-center text-white" id="data-sek">
                        <hr>
                        <h5 class="bg-indigo disabled"><b>Sekolah Asal</b></h5>
                        <hr>
                    </div>

                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                              <label for="sa_sek" class="control-label">Nama Sekolah Asal</label>
                              <input type="text" name="sa_sek" class="form-control" minlength="4" id="sa_sek">
                            </div>
                        </div>
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                              <label class="control-label">Status Sekolah</label>
                              <select name="st_sek" class="form-control" id="st_sek">
                                <option value="">- Pilih -</option>
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-3 bg-light">
                            <div class="form-group">
                              <label for="sn_sek" class="control-label">NPSN Sekolah</label>
                              <input type="text" name="sn_sek" class="form-control" id="sn_sek">
                            </div>
                        </div>
                        <div class="col-md-12 bg-light">
                            <div class="form-group">
                              <label for="al_sek" class="control-label">Alamat Sekolah</label>
                              <input type="text" name="al_sek" class="form-control" minlength="10" id="al_sek">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group" class="control-label">
                              <label for="kb_sek">Kabupaten Sekolah</label>
                              <input type="text" name="kb_sek" class="form-control" minlength="3" id="kb_sek">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                              <label for="nw_sek" class="control-label">No. Hp. Sekolah</label>
                              <input type="text" name="nw_sek" class="form-control" id="nw_sek">
                            </div>
                        </div>

                    <div class="col-md-12 text-center text-white" id="data-kel">
                        <hr>
                        <h5 class="bg-indigo disabled"><b>Data Keluarga</b></h5>
                        <hr>
                    </div>

                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                              <label for="no_ktk" class="control-label">No. Kartu Keluarga</label>
                              <input type="text" name="no_ktk" class="form-control" minlength="16" id="no_ktk">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                              <label for="no_kip" class="control-label">No. KIP <small>( Jika Ada )</small></label>
                              <input type="text" name="no_kip" class="form-control" id="no_kip">
                            </div>
                        </div>

                    <div class="col-md-12 text-center text-white" id="data-ayah">
                        <hr>
                        <h5 class="bg-indigo disabled"><b>Ayah</b></h5>
                        <hr>
                    </div>

                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="nm_ayh" class="control-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="nm_ayh" name="nm_ayh">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="tl_ayh" class="control-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tl_ayh" name="tl_ayh">
                            </div>
                        </div>
                        <div class="col-md-4 bg-light">
                            <div class="form-group">
                                <label for="tg_ayh" class="control-label">Tanggal Lahir</label>
                                <input type="number" class="form-control" id="tg_ayh" name="tg_ayh">
                            </div>
                        </div>
                        <div class="col-md-4 bg-light">
                            <div class="form-group">
                                <label class="control-label">Bulan Lahir</label>
                                <select name="bl_ayh" class="form-control" id="bl_ayh">
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
                        <div class="col-md-4 bg-light">
                            <div class="form-group">
                                <label for="th_ayh" class="control-label">Tahun Lahir</label>
                                <input type="number" class="form-control" id="th_ayh" name="th_ayh">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="nk_ayh" class="control-label">NIK/No. KTP</label>
                                <input type="text" class="form-control" id="nk_ayh" name="nk_ayh" minlength="16">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label class="control-label">Pendidikan Terakhir</label>
                                <select name="pd_ayh" class="form-control" id="pd_ayh">
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
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="pk_ayh" class="control-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pk_ayh" name="pk_ayh">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                            <label>Rata-rata Penghasilan <small><i>per bulan</i></small></label>
                            <select name="pg_ayh" class="form-control" id="pg_ayh">
                                <option value="">- Pilih -</option>
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

                    <div class="col-md-12 text-center text-white" id="data-ibu">
                        <hr>
                        <h5 class="bg-indigo disabled"><b>Ibu</b></h5>
                        <hr>
                    </div>

                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="nm_ibu" class="control-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="nm_ibu" name="nm_ibu">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="tl_ibu" class="control-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tl_ibu" name="tl_ibu">
                            </div>
                        </div>
                        <div class="col-md-4 bg-light">
                            <div class="form-group">
                                <label for="tg_ibu" class="control-label">Tanggal Lahir</label>
                                <input type="number" class="form-control" id="tg_ibu" name="tg_ibu">
                            </div>
                        </div>
                        <div class="col-md-4 bg-light">
                            <div class="form-group">
                                <label class="control-label">Bulan Lahir</label>
                                <select name="bl_ibu" class="form-control" id="bl_ibu">
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
                        <div class="col-md-4 bg-light">
                            <div class="form-group">
                                <label for="th_ibu" class="control-label">Tahun Lahir</label>
                                <input type="number" class="form-control" id="th_ibu" name="th_ibu">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="nk_ibu" class="control-label">NIK/No. KTP</label>
                                <input type="text" class="form-control" id="nk_ibu" name="nk_ibu" minlength="16">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label class="control-label">Pendidikan Terakhir</label>
                                <select name="pd_ibu" class="form-control" id="pd_ibu">
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
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="pk_ibu" class="control-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pk_ibu" name="pk_ibu">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                            <label>Rata-rata Penghasilan <small><i>per bulan</i></small></label>
                            <select name="pg_ibu" class="form-control" id="pg_ibu">
                                <option value="">- Pilih -</option>
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

                    <div class="col-md-12 text-center text-white" id="proses">
                        <hr>
                        <h5 class="bg-indigo disabled"><b>Lain-lain</b></h5>
                        <hr>
                    </div>

                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="hp_ortu" class="control-label">No. Hp. Orangtua</label>
                                <input type="text" class="form-control" id="hp_ortu" name="hp_ortu">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="wa_ortu" class="control-label">No. WA Orangtua</label>
                                <input type="text" class="form-control" id="wa_ortu" name="wa_ortu">
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="st_pdf" class="control-label">Status</label>
                                <select class="form-control" id="st_pdf" name="st_pdf">
                                  <option value="">---</option>
                                  <option value="Menunggu">Menunggu</option>
                                  <option value="Diterima">Diterima</option>
                                  <option value="Ditolak">Ditolak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 bg-light">
                            <div class="form-group">
                                <label for="pn_pdf" class="control-label">Panitia Penerima</label>
                                <input type="text" class="form-control" id="pn_pdf" name="pn_pdf" readonly />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="#data-diri" class="btn btn-warning">Data Diri</a>
                    <a href="#data-sek" class="btn btn-warning">Data Sekolah Asal</a>
                    <a href="#data-kel" class="btn btn-warning">Data Keluarga</a>
                    <a href="#data-ayah" class="btn btn-warning">Data Ayah</a>
                    <a href="#data-ibu" class="btn btn-warning">Data Ibu</a> ||
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-success" name="edit" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->