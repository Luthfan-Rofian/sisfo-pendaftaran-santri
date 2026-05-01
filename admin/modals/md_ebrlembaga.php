<div class="modal fade" id="md_ebrlembaga">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_ebrlembaga">
            <div class="modal-header">
                <h5 class="modal-title">Edit Brosur Lembaga</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="a_ebrlembaga.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_lembaga" id="id_lembaga">
                        <center>
                            <img class="img-thumbnail" src="" id="br_lembaga" width="200px"><hr>
                        </center>
                        <p>Ukuran gambar yang disarankan 800x600 pixels</p>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="ubah_brosur" value="true" id="ceklis" checked="checked">
                            <label class="custom-control-label text-danger" for="ceklis"> Ceklis untuk ubah brosur</label>
                        </div>
                        <input type="file" class="form-control" name="br_lembaga" id="br_lembaga">
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