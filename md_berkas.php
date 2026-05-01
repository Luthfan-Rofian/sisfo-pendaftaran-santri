<div class="modal fade" id="md_berkas-bp">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3><b>Contoh Bukti Pembayaran</b></h3>
            </div>
            <div class="modal-body">
                <center>
                <?php
                $ppdb = mysqli_query($conn, "SELECT * FROM tb_ppdb");
                $tp = mysqli_fetch_object($ppdb);
                ?>
                Berkas yang diupload adalah bukti pembayaran<br> dari bank/mesin ATM/Mobile Banking 
                <br>Jika anda belum melakukan pembayaran, silahkan lakukan pembayaran terlebih dahulu<br/> ke <span class="badge badge-primary"><?= strip_tags($tp->nr_pdf); ?></span> Nomor Rekening <span class="badge badge-dark"><?= strip_tags($tp->rk_pdf); ?></span> A/N <span class="badge badge-dark"><?= strip_tags($tp->ar_pdf); ?></span>
                </center><br>
                <div class="form-group">
                    <center>
                        <img src="assets/files/bukti.jpg" width="200px"><hr>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="md_berkas-kk">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b>Contoh Kartu Keluarga</b></h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h4><b>Contoh Posisi Foto</b></h4><br/>
                    <center>
                        <img src="assets/files/kk_salah.jpg" width="300px"><br/>
                        <span class="text-danger"><h4>Salah <i class="fas fa-times"></i></h4></span><br/><br/>
                        <img src="assets/files/kk_benar.jpg" width="300px"><br/>
                        <span class="text-success"><h4>Benar <i class="fas fa-check"></i></h4></span><br/><hr/>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="md_berkas-ak">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b>Contoh Akte Lahir</b></h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h4><b>Contoh Posisi Foto</b></h4><br/>
                    <center>
                        <img src="assets/files/ak_salah.png" width="300px"><br/>
                        <span class="text-danger"><h4>Salah <i class="fas fa-times"></i></h4></span><br/><br/>
                        <img src="assets/files/ak_benar.png" width="300px"><br/>
                        <span class="text-success"><h4>Benar <i class="fas fa-check"></i></h4></span><br/><hr/>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="md_berkas-sk">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b>Contoh Surat Keterangan Lulus</b></h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h4><b>Contoh Posisi Foto</b></h4><br/>
                    <center>
                        <img src="assets/files/sk_salah.jpg" width="300px"><br/>
                        <span class="text-danger"><h4>Salah <i class="fas fa-times"></i></h4></span><br/><br/>
                        <img src="assets/files/sk_benar.jpg" width="300px"><br/>
                        <span class="text-success"><h4>Benar <i class="fas fa-check"></i></h4></span><br/><hr/>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="md_lembaga-br">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b>Brosur Lembaga</b></h3>
            </div>
            <div class="modal-body" id="md_lembaga-br">
                <div class="form-group">
                    <center><b><span id="nm_lembaga"></span></b></center>
                    <br>
                    <center>
                        <img src="" class="img-thumbnails" id="br_lembaga" width="300px"><br/>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="md_lembaga-by">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b>Rincian Biaya Lembaga</b></h3>
            </div>
            <div class="modal-body" id="md_lembaga-by">
                <div class="form-group">
                    <center><b><span id="nm_lembaga"></span></b></center>
                    <br>
                    <center>
                        <img src="" class="img-thumbnails" id="by_lembaga" width="300px"><br/>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="md_lembaga-spj">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b>Pakta Integritas</b></h3>
            </div>
            <div class="modal-body" id="md_lembaga-spj">
                <div class="form-group">
                    <center><b><span id="nm_lembaga"></span></b></center>
                    <br>
                    <center>
                        <img src="" class="img-thumbnails" id="spj_lembaga" width="300px"><br/>
                    </center>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>