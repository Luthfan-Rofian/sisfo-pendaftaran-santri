<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';

$id_lembaga = $_POST['id_lembaga'];

if(@$_POST['ubah_pakta_jpg']){

	$spj_lembaga = $_FILES['spj_lembaga']['name'];
	$tmp = $_FILES['spj_lembaga']['tmp_name'];
	$extensi = explode(".", $_FILES['spj_lembaga']['name']);
	$spj_lembagabaru = "Paktajpg-".round(microtime(true)).".".end($extensi);
	$path = "../assets/images/lembaga/".$spj_lembagabaru;
	move_uploaded_file($tmp, $path);

		$query1 = "SELECT * FROM tb_lembaga WHERE id_lembaga='".$id_lembaga."'";
		$sql1 = mysqli_query($conn, $query1);
		$data1 = mysqli_fetch_array($sql1);

		if(is_file("../assets/images/lembaga/".$data1['spj_lembaga']))
			unlink("../assets/images/lembaga/".$data1['spj_lembaga']);
		
		$query2 = "UPDATE tb_lembaga SET spj_lembaga='".$spj_lembagabaru."' WHERE id_lembaga='".$id_lembaga."'";
		$sql2 = mysqli_query($conn, $query2);

		if($sql2){
			$_SESSION['pesan_lembaga_edit_spp_ok'] = 'Pakta integritas sukses diubah..';
			echo "<script>window.history.go(-1);</script>";
		}else{
			$_SESSION['pesan_lembaga_edit_spp_g'] = 'Gagal ubah pakta integritas..';
			echo "<script>window.history.go(-1);</script>";
		}
}else{
	$_SESSION['pesan_lembaga_edit_spp_g'] = 'Gagal ubah pakta integritas..';
	echo "<script>window.history.go(-1);</script>";
}

?>