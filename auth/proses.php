<?php
session_start();
include '../assets/plugins/securimage/securimage.php';
include '../config/koneksi.php';
$securimage = new Securimage();

if (@$_POST['isi']){
	if ($securimage->check($_POST['cod']) == false) {
	    $_SESSION['pesan_captcha_gagal'] = 'Kode Keamanan Tidak Sesuai..!!';
	    echo "<script>window.location='../portal'</script>";
	}else{
		$lembaga=mysqli_real_escape_string($conn, $_POST['lbg']);

		$_SESSION['verifikasi'] = true;
		$_SESSION['data_lembaga'] = $lembaga;
	    echo "<script>window.location='../formulir'</script>";	
	}
}

?>