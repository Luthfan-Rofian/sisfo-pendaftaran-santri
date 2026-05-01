<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['edit']) {

	$id_user = mysqli_real_escape_string($conn, $_POST['id_user']);
	$nm_user = mysqli_real_escape_string($conn, $_POST['nm_user']);
	$us_user = mysqli_real_escape_string($conn, $_POST['us_user']);
	$ps_user = mysqli_real_escape_string($conn, sha1($_POST['ps_user']));
	$rl_user = mysqli_real_escape_string($conn, $_POST['rl_user']);

	if (empty($_POST['ps_user'])) {

		$kosong = mysqli_query($conn, "UPDATE tb_user SET 
		nm_user = '".$nm_user."',
		us_user = '".$us_user."',
		rl_user = '".$rl_user."'
		WHERE id_user = '".$id_user."'
		");

		if ($kosong) {
			echo "<script>window.location='logout'</script>";
		}else{
			$_SESSION['pesan_user_gagal'] = 'Gagal ubah user..';
			echo "<script>window.location='pg_profil'</script>";
		}
	}else{

		$tidakkosong = mysqli_query($conn, "UPDATE tb_user SET 
		nm_user = '".$nm_user."',
		us_user = '".$us_user."',
		ps_user = '".$ps_user."',
		rl_user = '".$rl_user."'
		WHERE id_user = '".$id_user."'
		");

		if ($tidakkosong) {
			echo "<script>window.location='logout'</script>";
		}else{
			$_SESSION['pesan_user_gagal'] = 'Gagal ubah user..';
			echo "<script>window.location='pg_profil'</script>";
		}
	}
}

?>