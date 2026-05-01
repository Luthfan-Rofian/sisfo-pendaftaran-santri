<?php
session_start();
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$edit = mysqli_query($conn, "UPDATE tb_tbladm SET 
	st = '".mysqli_real_escape_string($conn, $_POST['st'])."'
	WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'
	");
}

if ($edit) {
	$_SESSION['pesan_tbladm_sukses'] = 'Status tombol diubah..';
	echo "<script>window.location='pg_app'</script>";
}else{
	$_SESSION['pesan_tbladm_gagal'] = 'Gagal ubah status tombol..!!!';
	echo "<script>window.location='pg_app'</script>";
}
?>