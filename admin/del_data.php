<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';

//Hapus Data Pendaftar
if (isset($_GET['idpdf'])) {	
    $AmbilPdf = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE id_p = '".$_GET['idpdf']."'");
    $DataBerkas = mysqli_fetch_array($AmbilPdf);

    if(is_file("../assets/images/berkas/".$DataBerkas['bp_berkas']))
        unlink("../assets/images/berkas/".$DataBerkas['bp_berkas']);
    if(is_file("../assets/images/berkas/".$DataBerkas['ak_berkas']))
        unlink("../assets/images/berkas/".$DataBerkas['ak_berkas']);
    if(is_file("../assets/images/berkas/".$DataBerkas['kk_berkas']))
        unlink("../assets/images/berkas/".$DataBerkas['kk_berkas']);
    if(is_file("../assets/images/berkas/".$DataBerkas['sk_berkas']))
        unlink("../assets/images/berkas/".$DataBerkas['sk_berkas']);

	$DelPdf = mysqli_query($conn, "DELETE FROM tb_daftar WHERE id_p = '".$_GET['idpdf']."' ");

	if ($DelPdf) {
		$_SESSION['pesan_sukses_hapus'] = 'Pendaftar Dihapus...!!';
		echo "<script>window.location='pg_pendaftar'</script>";
	}
}
//Hapus Data Pendaftar

//Hapus Data Lembaga
if (isset($_GET['idl'])) {	
    $DelLembaga = mysqli_query($conn, "SELECT * FROM tb_lembaga WHERE id_lembaga = '".$_GET['idl']."'");
    $datafllembaga = mysqli_fetch_array($DelLembaga);

    if(is_file("../assets/images/lembaga/".$datafllembaga['lg_lembaga']))
        unlink("../assets/images/lembaga/".$datafllembaga['lg_lembaga']);
    if(is_file("../assets/images/lembaga/".$datafllembaga['br_lembaga']))
        unlink("../assets/images/lembaga/".$datafllembaga['br_lembaga']);

	$DelUser = mysqli_query($conn, "DELETE FROM tb_lembaga WHERE id_lembaga = '".$_GET['idl']."' ");

	if ($DelLembaga) {
		$_SESSION['pesan_lembaga_hapus'] = 'Unit Lembaga Dihapus...!!';
		echo "<script>window.location='pg_yayasan'</script>";
	}
}
//Hapus Data Lembaga

//Hapus Data User
if (isset($_GET['idus'])) {	
    $AmbilUser = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '".$_GET['idus']."'");
    $dataftuser = mysqli_fetch_array($AmbilUser);

    if(is_file("../assets/images/user/".$dataftuser['ft_user']))
        unlink("../assets/images/user/".$dataftuser['ft_user']);

	$DelUser = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '".$_GET['idus']."' ");

	if ($DelUser) {
		$_SESSION['pesan_user_hapus'] = 'User Dihapus...!!';
		echo "<script>window.location='pg_user'</script>";
	}
}
//Hapus Data User

?>