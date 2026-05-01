<?php
session_start();
include '../config/koneksi.php';
if (@$_POST['ubah']) {
	$edit = mysqli_query($conn, "UPDATE tb_pros SET 
	tg_pros = '".mysqli_real_escape_string($conn, $_POST['tg_pros'])."',
	is_pros = '".mysqli_real_escape_string($conn, $_POST['is_pros'])."'
	WHERE id_pros = '".mysqli_real_escape_string($conn, $_POST['id_pros'])."'
	");

	if ($edit) {
		$_SESSION['pesan_ubahpros_sukses'] = 'Prosedur pendaftaran diubah';
		echo "<script>window.history.go(-1);</script>";
	}else{
		$_SESSION['pesan_ubahpros_gagal'] = 'Gagal ubah prosedur pendaftaran...!';
		echo "<script>window.history.go(-1);</script>";
	}
}
?>