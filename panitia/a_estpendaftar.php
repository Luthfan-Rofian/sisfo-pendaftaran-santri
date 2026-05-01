<?php
session_start();
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$edit = mysqli_query($conn, "UPDATE tb_daftar SET 
	st_pdf = '".mysqli_real_escape_string($conn, $_POST['st_pdf'])."'
	WHERE id_p = '".mysqli_real_escape_string($conn, $_POST['id_p'])."'
	");
}

if ($edit) {
	$_SESSION['pesan_editst_sukses'] = 'Status pendaftar diubah..';
	echo "<script>window.history.go(-1);</script>";
}else{
	$_SESSION['pesan_editst_gagal'] = 'Gagal ubah status pendaftar..!!!';
	echo "<script>window.history.go(-1);</script>";
}
?>