<!-- Modal Edit main -->
<div class="modal fade" id="md_emain" role="dialog" aria-labelledby="modalmain" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_emain">
            <div class="modal-header">
                <h5 class="modal-title" id="modalmain">Atur Formulir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_emain.php" method="post">
                <div class="modal-body text-center">
                    <div class="form-group">
                        <input type="hidden" id="id_main" name="id_main">
                        <label for="ps_main" class="control-label">Pesan</label>
                        <textarea id="ps_main" name="ps_main" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="aw_main" class="control-label">Status</label>
                        <select class="form-control" id="aw_main" name="aw_main">
                            <option value="buka">Buka</option>
                            <option value="tutup">Tutup</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ak_main" class="control-label">Waktu Buka</label>
                        <input type="text" name="ak_main" id="ak_main" class="form-control">
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
<!-- Modal Edit main -->
