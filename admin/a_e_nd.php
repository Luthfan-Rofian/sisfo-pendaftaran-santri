<?php
session_start();
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$edit = mysqli_query($conn, "UPDATE tb_notif_depan SET 
	st_nd = '".mysqli_real_escape_string($conn, $_POST['st_nd'])."',
	jd_nd = '".mysqli_real_escape_string($conn, $_POST['jd_nd'])."',
	sf_nd = '".mysqli_real_escape_string($conn, $_POST['sf_nd'])."',
	tg_nd = '".mysqli_real_escape_string($conn, $_POST['tg_nd'])."',
	ct_nd = '".mysqli_real_escape_string($conn, $_POST['ct_nd'])."',
	at_nd = '".mysqli_real_escape_string($conn, $_POST['at_nd'])."'
	WHERE id_nd = '".mysqli_real_escape_string($conn, $_POST['id_nd'])."'
	");
}

if ($edit) {
	$_SESSION['pesan_nd_sukses'] = 'Status notifikasi diubah..';
	echo "<script>window.location='pg_app'</script>";
}else{
	$_SESSION['pesan_nd_gagal'] = 'Gagal ubah status notifikasi..!!!';
	echo "<script>window.location='pg_app'</script>";
}
?>