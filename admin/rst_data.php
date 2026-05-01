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

	$DelPdf = mysqli_query($conn, "TRUNCATE tb_daftar");

	if ($DelPdf) {
		$_SESSION['pesan_sukses_reset'] = 'Pendaftar Direset...!!';
		echo "<script>window.location='pg_app'</script>";
	}
}
//Hapus Data Pendaftar