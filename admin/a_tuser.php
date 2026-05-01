<?php
session_start();
include '../config/koneksi.php';

$nm_user = mysqli_real_escape_string($conn, $_POST['nm_user']);
$lb_user = mysqli_real_escape_string($conn, $_POST['lb_user']);
$us_user = mysqli_real_escape_string($conn, $_POST['us_user']);

$cek = mysqli_query($conn, "SELECT us_user FROM tb_user WHERE us_user='$us_user'");

if ($cek->num_rows > 0) {
	$_SESSION['pesan_user_ada'] = 'Username Sudah Digunakan...!!!';
	echo "<script>window.location='pg_user'</script>";
}else{

	$ps_user = SHA1(mysqli_real_escape_string($conn, $_POST['ps_user']));

	$ft_user = $_FILES['ft_user']['name'];
	$tmp = $_FILES['ft_user']['tmp_name'];
	$extensi = explode(".", $_FILES['ft_user']['name']);
	$ft_user = "Foto-".round(microtime(true)).".".end($extensi);
	$path = "../assets/images/user/".$ft_user;
	move_uploaded_file($tmp, $path);
	$rl_user = mysqli_real_escape_string($conn, $_POST['rl_user']);

	$tambah = mysqli_query($conn, "INSERT INTO tb_user VALUES(
	'',
	'".$nm_user."',
	'".$lb_user."',
	'".$us_user."',
	'".$ps_user."',
	'".$ft_user."',
	'".$rl_user."'
	)");

	if ($tambah) {
		$_SESSION['pesan_user_tambah'] = 'User Ditambah...';
		echo "<script>window.location='pg_user';</script>";
	}else{
		$_SESSION['pesan_user_gagal'] = 'Gagal Tambah User...!!!';
		echo "<script>window.location='pg_user';</script>";
	}
}
?>