<?php
session_start();
error_reporting(0);

include "config/koneksi.php";

$getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_daf, 5)) AS id FROM tb_daftar");
$d = mysqli_fetch_object($getMaxId);
$generateId = 'PSB'.sprintf("%05s", $d->id + 1);

$gl_daf = mysqli_real_escape_string($conn, $_POST['gl_daf']);
$lb_daf = mysqli_real_escape_string($conn, $_POST['lb_daf']);
$md_daf = mysqli_real_escape_string($conn, $_POST['md_daf']);
$tg_daf = mysqli_real_escape_string($conn, $_POST['tg_daf']);

if(@$_POST['upload_bukti']){
$bp_berkas = $_FILES['bp_berkas']['name'];
$tmp1 = $_FILES['bp_berkas']['tmp_name'];
$extensi = explode(".", $_FILES['bp_berkas']['name']);
$bp_berkas = "Bukti-".round(microtime(true)).".".end($extensi);
$path1 = "assets/images/berkas/".$bp_berkas;
move_uploaded_file($tmp1, $path1);
}
if(@$_POST['upload_akte']){
$ak_berkas = $_FILES['ak_berkas']['name'];
$tmp2 = $_FILES['ak_berkas']['tmp_name'];
$extensi = explode(".", $_FILES['ak_berkas']['name']);
$ak_berkas = "Akte-".round(microtime(true)).".".end($extensi);
$path2 = "assets/images/berkas/".$ak_berkas;
move_uploaded_file($tmp2, $path2);
}
if(@$_POST['upload_kk']){
$kk_berkas = $_FILES['kk_berkas']['name'];
$tmp3 = $_FILES['kk_berkas']['tmp_name'];
$extensi = explode(".", $_FILES['kk_berkas']['name']);
$kk_berkas = "KK-".round(microtime(true)).".".end($extensi);
$path3 = "assets/images/berkas/".$kk_berkas;
move_uploaded_file($tmp3, $path3);
}
if(@$_POST['upload_skl']){
$sk_berkas = $_FILES['sk_berkas']['name'];
$tmp4 = $_FILES['sk_berkas']['tmp_name'];
$extensi = explode(".", $_FILES['sk_berkas']['name']);
$sk_berkas = "SKL-".round(microtime(true)).".".end($extensi);
$path4 = "assets/images/berkas/".$sk_berkas;
move_uploaded_file($tmp4, $path4);
}

$nm_pdf  = mysqli_real_escape_string($conn, $_POST['nm_pdf']);
$ns_pdf  = mysqli_real_escape_string($conn, $_POST['ns_pdf']);
$nk_pdf  = mysqli_real_escape_string($conn, $_POST['nk_pdf']);
$tl_pdf  = mysqli_real_escape_string($conn, $_POST['tl_pdf']);
$tg_pdf  = mysqli_real_escape_string($conn, $_POST['tg_pdf']);
$bl_pdf  = mysqli_real_escape_string($conn, $_POST['bl_pdf']);
$th_pdf  = mysqli_real_escape_string($conn, $_POST['th_pdf']);
$jk_pdf  = mysqli_real_escape_string($conn, $_POST['jk_pdf']);
$sd_pdf  = mysqli_real_escape_string($conn, $_POST['sd_pdf']);
$ak_pdf  = mysqli_real_escape_string($conn, $_POST['ak_pdf']);
$ct_pdf  = mysqli_real_escape_string($conn, $_POST['ct_pdf']);
$hp_pdf  = mysqli_real_escape_string($conn, $_POST['hp_pdf']);
$em_pdf  = mysqli_real_escape_string($conn, $_POST['em_pdf']);
$hb_pdf  = mysqli_real_escape_string($conn, $_POST['hb_pdf']);
$gol_dar  = mysqli_real_escape_string($conn, $_POST['gol_dar']);
$rw_py  = mysqli_real_escape_string($conn, $_POST['rw_py']);
$provinsi  = mysqli_real_escape_string($conn, $_POST['provinsi']);
$kota  = mysqli_real_escape_string($conn, $_POST['kota']);
$kecamatan  = mysqli_real_escape_string($conn, $_POST['kecamatan']);
$kelurahan  = mysqli_real_escape_string($conn, $_POST['kelurahan']);
$sa_sek = mysqli_real_escape_string($conn, $_POST['sa_sek']);
$st_sek = mysqli_real_escape_string($conn, $_POST['st_sek']);
$sn_sek = mysqli_real_escape_string($conn, $_POST['sn_sek']);
$al_sek = mysqli_real_escape_string($conn, $_POST['al_sek']);
$kb_sek = mysqli_real_escape_string($conn, $_POST['kb_sek']);
$nw_sek = mysqli_real_escape_string($conn, $_POST['nw_sek']);
$no_ktk = mysqli_real_escape_string($conn, $_POST['no_ktk']);
$no_kip = mysqli_real_escape_string($conn, $_POST['no_kip']);
$nm_ayh = mysqli_real_escape_string($conn, $_POST['nm_ayh']);
$tl_ayh = mysqli_real_escape_string($conn, $_POST['tl_ayh']);
$tg_ayh = mysqli_real_escape_string($conn, $_POST['tg_ayh']);
$bl_ayh = mysqli_real_escape_string($conn, $_POST['bl_ayh']);
$th_ayh = mysqli_real_escape_string($conn, $_POST['th_ayh']);
$nk_ayh = mysqli_real_escape_string($conn, $_POST['nk_ayh']);
$pd_ayh = mysqli_real_escape_string($conn, $_POST['pd_ayh']);
$pk_ayh = mysqli_real_escape_string($conn, $_POST['pk_ayh']);
$pg_ayh = mysqli_real_escape_string($conn, $_POST['pg_ayh']);
$nm_ibu = mysqli_real_escape_string($conn, $_POST['nm_ibu']);
$tl_ibu = mysqli_real_escape_string($conn, $_POST['tl_ibu']);
$tg_ibu = mysqli_real_escape_string($conn, $_POST['tg_ibu']);
$bl_ibu = mysqli_real_escape_string($conn, $_POST['bl_ibu']);
$th_ibu = mysqli_real_escape_string($conn, $_POST['th_ibu']);
$nk_ibu = mysqli_real_escape_string($conn, $_POST['nk_ibu']);
$pd_ibu = mysqli_real_escape_string($conn, $_POST['pd_ibu']);
$pk_ibu = mysqli_real_escape_string($conn, $_POST['pk_ibu']);
$pg_ibu = mysqli_real_escape_string($conn, $_POST['pg_ibu']);
$hp_ortu = mysqli_real_escape_string($conn, $_POST['hp_ortu']);
$wa_ortu = mysqli_real_escape_string($conn, $_POST['wa_ortu']);
$st_pdf  = mysqli_real_escape_string($conn, $_POST['st_pdf']);
$pn_pdf  = mysqli_real_escape_string($conn, $_POST['pn_pdf']);
$ug_pdf  = mysqli_real_escape_string($conn, $_POST['ug_pdf']);
$info_psb  = mysqli_real_escape_string($conn, $_POST['info_psb']);
$al_mondok  = mysqli_real_escape_string($conn, $_POST['al_mondok']);

$query = "INSERT INTO tb_daftar VALUES(
'',
'".$generateId."',
'".$gl_daf."',
'".$lb_daf."',
'".$md_daf."',
'".$tg_daf."',
'".$bp_berkas."',
'".$ak_berkas."',
'".$kk_berkas."',
'".$sk_berkas."',
'".$nm_pdf."',
'".$ns_pdf."',
'".$nk_pdf."',
'".$tl_pdf."',
'".$tg_pdf."',
'".$bl_pdf."',
'".$th_pdf."',
'".$jk_pdf."',
'".$sd_pdf."',
'".$ak_pdf."',
'".$ct_pdf."',
'".$hp_pdf."',
'".$em_pdf."',
'".$hb_pdf."',
'".$gol_dar."',
'".$rw_py."',
'".$provinsi."',
'".$kota."',
'".$kecamatan."',
'".$kelurahan."',
'".$sa_sek."',
'".$st_sek."',
'".$sn_sek."',
'".$al_sek."',
'".$kb_sek."',
'".$nw_sek."',
'".$no_ktk."',
'".$no_kip."',
'".$nm_ayh."',
'".$tl_ayh."',
'".$tg_ayh."',
'".$bl_ayh."',
'".$th_ayh."',
'".$nk_ayh."',
'".$pd_ayh."',
'".$pk_ayh."',
'".$pg_ayh."',
'".$nm_ibu."',
'".$tl_ibu."',
'".$tg_ibu."',
'".$bl_ibu."',
'".$th_ibu."',
'".$nk_ibu."',
'".$pd_ibu."',
'".$pk_ibu."',
'".$pg_ibu."',
'".$hp_ortu."',
'".$wa_ortu."',
'".$st_pdf."',
'".$pn_pdf."',
'".$ug_pdf."',
'".$info_psb."',
'".$al_mondok."'
)";
$sql = mysqli_query($conn, $query);

if($sql){ 
	$_SESSION['pesan_siswa_tambah'] = 'Pendaftaran Berhasil..';
	$_SESSION['pesan_siswa_isi'] = 'Silahkan tunggu verifikasi dari panitia';
	echo "<script>window.location='index'</script>";
}else{
	$_SESSION['pesan_siswa_gagal'] = 'Maaf Pendaftaran Gagal..!!!';
	$_SESSION['pesan_siswa_error'] = 'Ukuran file berkas terlalu besar atau data tidak lengkap';
	echo "<script>window.location='index'</script>";
}

?>