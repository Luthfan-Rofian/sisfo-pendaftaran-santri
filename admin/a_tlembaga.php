<?php
session_start();
include '../config/koneksi.php';

$nm_lembaga = mysqli_real_escape_string($conn, $_POST['nm_lembaga']);
$sk_lembaga = mysqli_real_escape_string($conn, $_POST['sk_lembaga']);
$tk_lembaga = mysqli_real_escape_string($conn, $_POST['tk_lembaga']);
$n1_lembaga = mysqli_real_escape_string($conn, $_POST['n1_lembaga']);
$k1_lembaga = mysqli_real_escape_string($conn, $_POST['k1_lembaga']);
$n2_lembaga = mysqli_real_escape_string($conn, $_POST['n2_lembaga']);
$k2_lembaga = mysqli_real_escape_string($conn, $_POST['k2_lembaga']);
$gl_lembaga = mysqli_real_escape_string($conn, $_POST['gl_lembaga']);
$ug_lembaga = mysqli_real_escape_string($conn, $_POST['ug_lembaga']);
$tt_lembaga = mysqli_real_escape_string($conn, $_POST['tt_lembaga']);

if(@$_POST['upload_logo']){
$lg_lembaga = $_FILES['lg_lembaga']['name'];
$tmp1 = $_FILES['lg_lembaga']['tmp_name'];
$extensi = explode(".", $_FILES['lg_lembaga']['name']);
$lg_lembaga = "Logo-".round(microtime(true)).".".end($extensi);
$path1 = "../assets/images/lembaga/".$lg_lembaga;
move_uploaded_file($tmp1, $path1);
}
if(@$_POST['upload_brosur']){
$br_lembaga = $_FILES['br_lembaga']['name'];
$tmp2 = $_FILES['br_lembaga']['tmp_name'];
$extensi = explode(".", $_FILES['br_lembaga']['name']);
$br_lembaga = "Brosur-".round(microtime(true)).".".end($extensi);
$path2 = "../assets/images/lembaga/".$br_lembaga;
move_uploaded_file($tmp2, $path2);
}
if(@$_POST['upload_biaya']){
$by_lembaga = $_FILES['by_lembaga']['name'];
$tmp3 = $_FILES['by_lembaga']['tmp_name'];
$extensi = explode(".", $_FILES['by_lembaga']['name']);
$by_lembaga = "Rincian-".round(microtime(true)).".".end($extensi);
$path3 = "../assets/images/lembaga/".$by_lembaga;
move_uploaded_file($tmp3, $path3);
}
if(@$_POST['upload_sjpg']){
$spj_lembaga = $_FILES['spj_lembaga']['name'];
$tmp4 = $_FILES['spj_lembaga']['tmp_name'];
$extensi = explode(".", $_FILES['spj_lembaga']['name']);
$spj_lembaga = "Rincian-".round(microtime(true)).".".end($extensi);
$path4 = "../assets/images/lembaga/".$spj_lembaga;
move_uploaded_file($tmp4, $path4);
}
if(@$_POST['upload_spdf']){
$spp_lembaga = $_FILES['spp_lembaga']['name'];
$tmp4 = $_FILES['spp_lembaga']['tmp_name'];
$extensi = explode(".", $_FILES['spp_lembaga']['name']);
$spp_lembaga = "Rincian-".round(microtime(true)).".".end($extensi);
$path4 = "../assets/images/lembaga/".$spp_lembaga;
move_uploaded_file($tmp4, $path4);
}

$tambah = mysqli_query($conn, "INSERT INTO tb_lembaga VALUES(
'',
'".$nm_lembaga."',
'".$sk_lembaga."',
'".$tk_lembaga."',
'".$n1_lembaga."',
'".$k1_lembaga."',
'".$n2_lembaga."',
'".$k2_lembaga."',
'".$gl_lembaga."',
'".$ug_lembaga."',
'".$tt_lembaga."',
'".$lg_lembaga."',
'".$br_lembaga."',
'".$by_lembaga."',
'".$spj_lembaga."',
'".$spp_lembaga."'
)");

if ($tambah) {
	$_SESSION['pesan_lembaga_tambah'] = 'Unit Lembaga Ditambah...';
	echo "<script>window.location='pg_yayasan.php';</script>";
}else{
	$_SESSION['pesan_lembaga_gagal'] = 'Gagal Tambah Unit Lembaga...!!!';
	echo "<script>window.location='pg_yayasan.php';</script>";
}

?>