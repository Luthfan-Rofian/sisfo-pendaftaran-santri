<?php
session_start();
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$ubah = mysqli_query($conn, "UPDATE tb_ppdb SET 
	lb_pdf = '".mysqli_real_escape_string($conn, $_POST['lb_pdf'])."',
	sk_pdf = '".mysqli_real_escape_string($conn, $_POST['sk_pdf'])."',
	ys_pdf = '".mysqli_real_escape_string($conn, $_POST['ys_pdf'])."',
	th_pdf = '".mysqli_real_escape_string($conn, $_POST['th_pdf'])."',
	n1_pdf = '".mysqli_real_escape_string($conn, $_POST['n1_pdf'])."',
	k1_pdf = '".mysqli_real_escape_string($conn, $_POST['k1_pdf'])."',
	n2_pdf = '".mysqli_real_escape_string($conn, $_POST['n2_pdf'])."',
	k2_pdf = '".mysqli_real_escape_string($conn, $_POST['k2_pdf'])."',
	fb_pdf = '".mysqli_real_escape_string($conn, $_POST['fb_pdf'])."',
	yt_pdf = '".mysqli_real_escape_string($conn, $_POST['yt_pdf'])."',
	ig_pdf = '".mysqli_real_escape_string($conn, $_POST['ig_pdf'])."',
	wa_pdf = '".mysqli_real_escape_string($conn, $_POST['wa_pdf'])."',
	nr_pdf = '".mysqli_real_escape_string($conn, $_POST['nr_pdf'])."',
	rk_pdf = '".mysqli_real_escape_string($conn, $_POST['rk_pdf'])."',
	ar_pdf = '".mysqli_real_escape_string($conn, $_POST['ar_pdf'])."',
	a1_pdf = '".mysqli_real_escape_string($conn, $_POST['a1_pdf'])."',
	a2_pdf = '".mysqli_real_escape_string($conn, $_POST['a2_pdf'])."'
	WHERE id_pdf = '".mysqli_real_escape_string($conn, $_POST['id_pdf'])."'
	");

	if ($ubah) {
		$_SESSION['pesan_epdf_sukses'] = 'Data Pendaftaran Diubah..';
		echo "<script>window.location='pg_pendaftaran';</script>";
	}else{
		$_SESSION['pesan_epdf_gagal'] = 'Gagal Ubah Data Pendaftaran..!!!';
		echo "<script>window.location='pg_pendaftaran';</script>";
	}
}
?>