<!-- Modal Edit nd -->
<div class="modal fade" id="md_e_nd" role="dialog" aria-labelledby="modalnd" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="md_e_nd">
            <div class="modal-header">
                <h5 class="modal-title" id="modalnd">Atur Notifikasi Depan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_e_nd.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="id_nd" name="id_nd">
                        <label for="jd_nd" class="control-label">Judul</label>
                        <input type="text" name="jd_nd" id="jd_nd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="st_nd" class="control-label">Status</label>
                        <select class="form-control" id="st_nd" name="st_nd">
                            <option value="buka">Buka</option>
                            <option value="tutup">Tutup</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sf_nd" class="control-label">Sifat</label>
                        <select class="form-control" id="sf_nd" name="sf_nd">
                            <option value="">-Pilih-</option>
                            <option value="Sangat Penting">Sangat Penting</option>
                            <option value="Penting">Penting</option>
                            <option value="Biasa">Biasa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tg_nd" class="control-label">Tanggal</label>
                        <input type="date" name="tg_nd" id="tg_nd" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ct_nd" class="control-label">Isi</label>
                        <textarea id="ct_nd" name="ct_nd" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="at_nd" class="control-label">Oleh</label>
                        <input type="text" name="at_nd" id="at_nd" class="form-control">
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
<!-- Modal Edit nd -->
