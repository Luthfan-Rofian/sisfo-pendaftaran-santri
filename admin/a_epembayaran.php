<?php
session_start();
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$ubah = mysqli_query($conn, "UPDATE tb_daftar SET 
	ug_pdf = '".mysqli_real_escape_string($conn, $_POST['ug_pdf'])."',
	pn_pdf = '".mysqli_real_escape_string($conn, $_POST['pn_pdf'])."'
	WHERE id_p = '".mysqli_real_escape_string($conn, $_POST['id_p'])."'
	");

	if ($ubah) {
		$_SESSION['pesan_epby_sukses'] = 'Data pembayaran diubah...';
		echo "<script>window.location='pg_pembayaran';</script>";
	}else{
		$_SESSION['pesan_epby_gagal'] = 'Gagal ubah data pembayaran...';
		echo "<script>window.location='pg_pembayaran';</script>";
	}
}
?>