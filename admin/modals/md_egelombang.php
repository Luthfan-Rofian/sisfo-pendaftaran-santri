<!-- Modal -->
<div class="modal fade" id="md_egelombang" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" id="md_egelombang">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Gelombang Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_egelombang.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="st_gelombang" class="control-label">Gelombang Pendaftaran</label>
                                <small class="text-danger">*</small>
                                <input type="hidden" name="id_gelombang" id="id_gelombang">
                                <input type="number" class="form-control" name="st_gelombang" id="st_gelombang" required />
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
