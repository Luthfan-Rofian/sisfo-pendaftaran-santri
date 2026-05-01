<!-- Modal Edit tbladm -->
<div class="modal fade" id="md_etbladm" role="dialog" aria-labelledby="modaltbladm" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_etbladm">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltbladm">Ubah Status Tombol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_etbladm.php" method="post" id="fr_tbladm">
                <div class="modal-body">
                    <div class="form-group row">
                        <input type="hidden" id="id" name="id">
                        <label for="st" class="col-sm-3 text-right control-label col-form-label">Tampilkan</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="st" name="st">
                                <option value="buka">Ya</option>
                                <option value="tutup">Tidak</option>
                            </select>
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
<!-- Modal Edit tbladm -->
