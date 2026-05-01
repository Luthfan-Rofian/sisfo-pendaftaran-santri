<?php
session_start();
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$edit = mysqli_query($conn, "UPDATE tb_maintenance SET 
	ps_main = '".mysqli_real_escape_string($conn, $_POST['ps_main'])."',
	aw_main = '".mysqli_real_escape_string($conn, $_POST['aw_main'])."',
	ak_main = '".mysqli_real_escape_string($conn, $_POST['ak_main'])."'
	WHERE id_main = '".mysqli_real_escape_string($conn, $_POST['id_main'])."'
	");
}

if ($edit) {
	$_SESSION['pesan_main_sukses'] = 'Status Formulir Diubah..';
	echo "<script>window.location='pg_app'</script>";
}else{
	$_SESSION['pesan_main_gagal'] = 'Gagal Ubah Status Formulir..!!!';
	echo "<script>window.location='pg_app'</script>";
}
?>