<!-- Modal -->
<div class="modal fade" id="md_tlembaga" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" id="md_tlembaga">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Unit Lembaga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_tlembaga.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Nama Lembaga</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="nm_lembaga" id="nm_lembaga" required />
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label class="control-label">Singkatan</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="sk_lembaga" id="sk_lembaga" required />
                        </div>
                        <div class="form-group col-md-3 col-sm-6">
                            <label class="control-label">Jenjang</label>
                            <small class="text-danger">*</small>
                            <select class="form-control" name="tk_lembaga" required />
                                <option value="">- Pilih -</option>
                                <option value="TK">TK</option>
                                <option value="SD">SD</option>
                                <option value="SLTP">SLTP</option>
                                <option value="SLTA">SLTA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Kontak 1</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="n1_lembaga" required />
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Hp. Kontak 1</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="k1_lembaga" required />
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Kontak 2</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="n2_lembaga" required />
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Hp. Kontak 2</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="k2_lembaga" required />
                        </div>
                        <?php
                        $glmbng = mysqli_query($conn, "SELECT * FROM tb_gelombang");
                        $gl = mysqli_fetch_object($glmbng);
                        ?>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Gelombang</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="gl_lembaga" value="<?= $gl->st_gelombang; ?>" readonly />
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Uang Pendaftaran</label>
                            <small class="text-danger">*</small>
                            <input type="text" class="form-control" name="ug_lembaga" required />
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label class="control-label">Info Lembaga</label>
                            <textarea name="tt_lembaga" class="form-control" id="summernote" required />
                            </textarea>
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Logo </label>
                            <input type="checkbox" name="upload_logo" checked="checked" required />
                            <input type="file" class="form-control" name="lg_lembaga" required />
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Brosur </label>
                            <input type="checkbox" name="upload_brosur" checked="checked" required />
                            <input type="file" class="form-control" name="br_lembaga" required />
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Rincian Biaya </label>
                            <input type="checkbox" name="upload_biaya" checked="checked" required />
                            <input type="file" class="form-control" name="by_lembaga" required />
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Pakta Integritas JPG </label>
                            <input type="checkbox" name="upload_sjpg" checked="checked" required />
                            <input type="file" class="form-control" name="spj_lembaga">
                        </div>
                        <div class="form-group col-md-6 col-sm-6">
                            <label class="control-label">Pakta Integritas PDF </label>
                            <input type="checkbox" name="upload_spdf" checked="checked" required />
                            <input type="file" class="form-control" name="spp_lembaga">
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-success" value="Proses">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
