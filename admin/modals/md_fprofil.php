<div class="modal fade" id="md_fuser">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_fuser">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Foto User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="a_fprofil.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_user" id="id_user">
                        <center>
                            <img class="img-thumbnail" src="" id="ft_user" width="200px"><hr>
                        </center>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="ubah_foto" value="true" id="ceklis" checked="checked">
                            <label class="custom-control-label text-danger" for="ceklis"> Ceklis untuk ubah foto</label>
                        </div>
                        <input type="file" class="form-control" name="ft_user" id="ft_user">
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