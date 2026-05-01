<?php
session_start();
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$edit = mysqli_query($conn, "UPDATE tb_gelombang SET 
	st_gelombang = '".mysqli_real_escape_string($conn, $_POST['st_gelombang'])."'
	WHERE id_gelombang = '".mysqli_real_escape_string($conn, $_POST['id_gelombang'])."'
	");
}

if ($edit) {
	$_SESSION['pesan_gelombang_edit_s'] = 'Gelombang Pendaftaran Diubah..';
	echo "<script>window.location='pg_app'</script>";
}else{
	$_SESSION['pesan_gelombang_edit_g'] = 'Gagal Ubah Gelombang Pendaftaran..!!!';
	echo "<script>window.location='pg_app'</script>";
}
?>