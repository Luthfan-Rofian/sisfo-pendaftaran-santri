<!-- Modal -->
<div class="modal fade" id="md_ependaftaran" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="md_ependaftaran">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_ependaftaran.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_pdf" id="id_pdf">
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Nama Pendaftaran</label>
                            <input type="text" class="form-control" name="lb_pdf" id="lb_pdf">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Singkatan</label>
                            <input type="text" class="form-control" name="sk_pdf" id="sk_pdf">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Nama Yayasan</label>
                            <input type="text" class="form-control" name="ys_pdf" id="ys_pdf">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Tahun Ajaran</label>
                            <input type="text" class="form-control" name="th_pdf" id="th_pdf">
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label>Kontak 1</label>
                            <input type="text" class="form-control" name="n1_pdf" id="n1_pdf">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Hp. Kontak 1</label>
                            <input type="text" class="form-control" name="k1_pdf" id="k1_pdf">
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label>Kontak 2</label>
                            <input type="text" class="form-control" name="n2_pdf" id="n2_pdf">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Hp. Kontak 2</label>
                            <input type="text" class="form-control" name="k2_pdf" id="k2_pdf">
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <label>Link Youtube</label>
                            <input type="text" class="form-control" name="yt_pdf" id="yt_pdf">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Link Facebook</label>
                            <input type="text" class="form-control" name="fb_pdf" id="fb_pdf">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>Link Instagram</label>
                            <input type="text" class="form-control" name="ig_pdf" id="ig_pdf">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label>No WhatsApp</label>
                            <input type="text" class="form-control" name="wa_pdf" id="wa_pdf">
                        </div>

                        <div class="form-group col-md-4 col-sm-6">
                            <label>Nama Bank</label>
                            <input type="text" class="form-control" name="nr_pdf" id="nr_pdf">
                        </div>
                        <div class="form-group col-md-4 col-sm-6">
                            <label>No Rekening</label>
                            <input type="text" class="form-control" name="rk_pdf" id="rk_pdf">
                        </div>
                        <div class="form-group col-md-4 col-sm-6">
                            <label>Nama Rekening</label>
                            <input type="text" class="form-control" name="ar_pdf" id="ar_pdf">
                        </div>

                        <div class="form-group col-md-12 col-sm-6">
                            <label>Sekretariat 1</label>
                            <input type="text" class="form-control" name="a1_pdf" id="a1_pdf">
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label>Sekretariat 2</label>
                            <input type="text" class="form-control" name="a2_pdf" id="a2_pdf">
                        </div>
                        
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-success" name="edit" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
