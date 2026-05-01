<div class="modal fade" id="md_estpendaftar">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_estpendaftar">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Status Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="a_estpendaftar.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_p" id="id_p">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" name="edit" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>