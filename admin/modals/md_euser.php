<!-- Modal -->
<div class="modal fade" id="md_euser" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" id="md_euser">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="a_euser.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-6">
                            <label for="nm_user" class="control-label">Nama User</label>
                            <input type="hidden" id="id_user" name="id_user">
                            <input type="text" class="form-control" id="nm_user" name="nm_user">
                            <small class="text-danger">-</small>
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label class="control-label">Lembaga</label>
                            <small class="text-danger">*</small>
                            <select class="form-control" id="lb_user" name="lb_user" required />
                                <option value="">- Pilih -</option>
                                <option value="Yayasan">Yayasan</option>
                                <?php
                                    $Lembaga = "SELECT * FROM tb_lembaga";
                                    $QLembaga = mysqli_query($conn, $Lembaga);
                                    while($tl=mysqli_fetch_object($QLembaga)){
                                ?>
                                <option value="<?= $tl->nm_lembaga ?>"><?= $tl->nm_lembaga ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label for="us_user" class="control-label">Username</label>
                            <input type="text" class="form-control" id="us_user" name="us_user" onkeypress="return hanyaAngka(event)" minlength="5">
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label for="ps_user" class="control-label">Password</label>
                            <input type="text" class="form-control" name="ps_user">
                            <small class="text-danger">Kosongkan Jika Tidak Diubah</small>
                        </div>
                        <div class="form-group col-md-12 col-sm-6">
                            <label for="rl_user" class="control-label">Role</label>
                            <select class="form-control" id="rl_user" name="rl_user">
                                <option value="">- Pilih -</option>
                                <option value="Panitia">Panitia</option>
                                <option value="Admin">Admin</option>
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
