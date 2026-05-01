<!-- Modal -->
<div class="modal fade animate__animated animate__bounceIn" id="md_rstpsguru">
    <div class="modal-dialog" role="document">
        <div class="modal-content card-outline card-warning" id="md_rstpsguru">
            <form action="a_rstpsguru.php" method="post">
                <center>
                    <div class="modal-body">
                        <h5>Apakah anda akan mereset password</h5>
                        <br>
                        <input type="hidden" id="id_guru" name="id_guru">
                        <input type="text" id="nm_guru" name="nm_guru" class="form-control text-center bg-light" style="border: none; font-weight: bold;" readonly=""><br>
                        <input type="hidden" name="ps_guru" value="123456">
                    <br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-warning" name="edit" value="Reset">
                    </div>
                    <div class="modal-footer"></div>
                </center>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
