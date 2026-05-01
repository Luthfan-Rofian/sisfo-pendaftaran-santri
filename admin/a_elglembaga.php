<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';

$id_lembaga = $_POST['id_lembaga'];

if(@$_POST['ubah_logo']){

	$lg_lembaga = $_FILES['lg_lembaga']['name'];
	$tmp = $_FILES['lg_lembaga']['tmp_name'];
	$extensi = explode(".", $_FILES['lg_lembaga']['name']);
	$lg_lembagabaru = "Foto-".round(microtime(true)).".".end($extensi);
	$path = "../assets/images/lembaga/".$lg_lembagabaru;
	move_uploaded_file($tmp, $path);

		$query1 = "SELECT * FROM tb_lembaga WHERE id_lembaga='".$id_lembaga."'";
		$sql1 = mysqli_query($conn, $query1);
		$data1 = mysqli_fetch_array($sql1);

		if(is_file("../assets/images/lembaga/".$data1['lg_lembaga']))
			unlink("../assets/images/lembaga/".$data1['lg_lembaga']);
		
		$query2 = "UPDATE tb_lembaga SET lg_lembaga='".$lg_lembagabaru."' WHERE id_lembaga='".$id_lembaga."'";
		$sql2 = mysqli_query($conn, $query2);

		if($sql2){
			$_SESSION['pesan_lembaga_edit_lg_ok'] = 'Logo lembaga sukses diubah..';
			echo "<script>window.history.go(-1);</script>";
		}else{
			$_SESSION['pesan_lembaga_edit_lg_g'] = 'Gagal ubah logo lembaga..';
			echo "<script>window.history.go(-1);</script>";
		}
}else{
	$_SESSION['pesan_lembaga_edit_lg_g'] = 'Gagal ubah logo lembaga..';
	echo "<script>window.history.go(-1);</script>";
}

?>

