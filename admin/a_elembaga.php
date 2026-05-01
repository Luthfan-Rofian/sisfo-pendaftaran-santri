<?php
session_start();
include '../config/koneksi.php';
if (@$_POST['edit']) {
	$edit = mysqli_query($conn, "UPDATE tb_lembaga SET 
	nm_lembaga = '".mysqli_real_escape_string($conn, $_POST['nm_lembaga'])."',
	sk_lembaga = '".mysqli_real_escape_string($conn, $_POST['sk_lembaga'])."',
	tk_lembaga = '".mysqli_real_escape_string($conn, $_POST['tk_lembaga'])."',
	n1_lembaga = '".mysqli_real_escape_string($conn, $_POST['n1_lembaga'])."',
	k1_lembaga = '".mysqli_real_escape_string($conn, $_POST['k1_lembaga'])."',
	n2_lembaga = '".mysqli_real_escape_string($conn, $_POST['n2_lembaga'])."',
	k2_lembaga = '".mysqli_real_escape_string($conn, $_POST['k2_lembaga'])."',
	gl_lembaga = '".mysqli_real_escape_string($conn, $_POST['gl_lembaga'])."',
	ug_lembaga = '".mysqli_real_escape_string($conn, $_POST['ug_lembaga'])."',
	tt_lembaga = '".mysqli_real_escape_string($conn, $_POST['tt_lembaga'])."'
	WHERE id_lembaga = '".mysqli_real_escape_string($conn, $_POST['id_lembaga'])."'
	");
}

if ($edit) {
	$_SESSION['pesan_lembaga_edit_s'] = 'Unit Lembaga Diubah..';
	echo "<script>window.history.go(-1);</script>";
}else{
	$_SESSION['pesan_lembaga_edit_g'] = 'Gagal Ubah Unit Lembaga..!!!';
	echo "<script>window.history.go(-1);</script>";
}
?>