<!-- Modal -->
<div class="modal fade" id="md_elembaga" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="md_elembaga">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Unit Lembaga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_elembaga.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nm_lembaga" class="control-label">Nama Lembaga</label>
                                <small class="text-danger">*</small>
                                <input type="hidden" name="id_lembaga" id="id_lembaga">
                                <input type="text" class="form-control" name="nm_lembaga" id="nm_lembaga" required />
                            </div>
                            <div class="form-group">
                                <label for="sk_lembaga" class="control-label">Singkatan</label>
                                <small class="text-danger">*</small>
                                <input type="text" class="form-control" name="sk_lembaga" id="sk_lembaga" required />
                            </div>
                            <div class="form-group">
                                <label for="tk_lembaga" class="control-label">Jenjang</label>
                                <small class="text-danger">*</small>
                                <select class="form-control" name="tk_lembaga" id="tk_lembaga" required />
                                    <option value="">- Pilih -</option>
                                    <option value="TK">TK</option>
                                    <option value="SD">SD</option>
                                    <option value="SLTP">SLTP</option>
                                    <option value="SLTA">SLTA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tt_lembaga" class="control-label">Info Singkat</label>
                                <textarea name="tt_lembaga" class="form-control" id="tt_lembaga" required /></textarea>
                            </div>
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
