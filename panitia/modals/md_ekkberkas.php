<div class="modal fade" id="md_ekkberkas">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_ekkberkas">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Kartu Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="a_ekkberkas" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_p" id="id_p">
                        <center>
                            <img class="img-thumbnail" src="" id="kk_berkas" width="200px"><hr>
                        </center>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="ubah_kk" value="true" checked="checked" id="ceklis">
                            <label class="custom-control-label text-danger" for="ceklis"><small><--Ceklis untuk ubah file</small></label>
                        </div>
                        <input type="file" class="form-control" name="kk_berkas" id="kk_berkas">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" name="ubahkk" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>