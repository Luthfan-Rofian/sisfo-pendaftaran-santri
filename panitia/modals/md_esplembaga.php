<div class="modal fade" id="md_espjlembaga">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_espjlembaga">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pakta Integritas JPG</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="a_espjlembaga.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_lembaga" id="id_lembaga">
                        <center>
                            <img class="img-thumbnail" src="" id="spj_lembaga" width="200px"><hr>
                        </center>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="ubah_pakta_jpg" value="true" id="ceklis1" checked="checked">
                            <label class="custom-control-label text-danger" for="ceklis1"> Ceklis untuk ubah file</label>
                        </div>
                        <input type="file" class="form-control" name="spj_lembaga" id="spj_lembaga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="md_espplembaga">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="md_espplembaga">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pakta Integritas PDF</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="a_espplembaga.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id_lembaga" id="id_lembaga">
                        <center>
                            <img class="img-thumbnail" src="" id="spp_lembaga" width="200px"><hr>
                        </center>
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="ubah_pakta_pdf" value="true" id="ceklis2" checked="checked">
                            <label class="custom-control-label text-danger" for="ceklis2"> Ceklis untuk ubah file</label>
                        </div>
                        <input type="file" class="form-control" name="spp_lembaga" id="spp_lembaga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>