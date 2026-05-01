<div class="modal fade" id="md_eskberkas">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_eskberkas">
            <div class="modal-header">
                <h5 class="modal-title">Ubah SKL</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="a_eskberkas" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_p" id="id_p">
                        <center>
                            <img class="img-thumbnail" src="" id="sk_berkas" width="200px"><hr>
                        </center>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="ubah_sk" value="true" checked="checked" id="ceklis">
                            <label class="custom-control-label text-danger" for="ceklis"><small>Ceklis untuk ubah file</small></label>
                        </div>
                        <input type="file" class="form-control" name="sk_berkas" id="sk_berkas">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" name="ubahsk" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>