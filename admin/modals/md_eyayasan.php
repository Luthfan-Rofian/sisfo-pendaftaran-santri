<!-- Modal -->
<div class="modal fade" id="md_eyayasan" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="md_eyayasan">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Profil yayasan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_eyayasan.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nm_yayasan" class="col-sm-3 text-right control-label col-form-label">Nama yayasan</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="id_yayasan" name="id_yayasan">
                            <input type="text" class="form-control" id="nm_yayasan" name="nm_yayasan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="np_yayasan" class="col-sm-3 text-right control-label col-form-label">Singkatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="sk_yayasan" name="sk_yayasan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="al_yayasan" class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="al_yayasan" name="al_yayasan"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kb_yayasan" class="col-sm-3 text-right control-label col-form-label">Kabupaten</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kb_yayasan" name="kb_yayasan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pr_yayasan" class="col-sm-3 text-right control-label col-form-label">Provinsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="pr_yayasan" name="pr_yayasan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kp_yayasan" class="col-sm-3 text-right control-label col-form-label">Kepala yayasan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kp_yayasan" name="kp_yayasan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Logo</label>
                        <div class="col-sm-9">
                            <input type="checkbox" name="ubah_logo" value="true"> <small><i class="text-success">Ceklis jika ingin mengubah logo</i></small><br>
                            <input type="file" id="lg_yayasan" name="lg_yayasan">
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
