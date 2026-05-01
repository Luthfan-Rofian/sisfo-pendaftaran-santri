<!-- Modal -->
<div class="modal fade" id="md_epembayaran" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" id="md_epembayaran">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_epembayaran" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Nama Pendaftar</label>
                            <input type="hidden" id="id_p" name="id_p">
                            <input type="text" class="form-control" id="nm_pdf" readonly="">
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Nominal</label>
                            <input type="text" class="form-control" name="ug_pdf" id="ug_pdf">
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Diterima oleh</label>
                            <select name="pn_pdf" class="form-control" id="pn_pdf" required />
                              <option value="">--Pilih--</option>
                              <?php
                              $User = "SELECT * FROM tb_user ORDER BY nm_user ASC";
                              $QUser = mysqli_query($conn, $User);
                              while($us=mysqli_fetch_object($QUser)){
                              ?>
                              <option value="<?= strip_tags($us->nm_user); ?>">
                                <?= strip_tags($us->nm_user); ?>
                              </option>
                              <?php } ?>
                            </select>
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
