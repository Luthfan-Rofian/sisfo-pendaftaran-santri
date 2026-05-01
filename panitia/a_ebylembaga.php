<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';

$id_lembaga = $_POST['id_lembaga'];

if(@$_POST['ubah_rincian']){

	$by_lembaga = $_FILES['by_lembaga']['name'];
	$tmp = $_FILES['by_lembaga']['tmp_name'];
	$extensi = explode(".", $_FILES['by_lembaga']['name']);
	$by_lembagabaru = "Foto-".round(microtime(true)).".".end($extensi);
	$path = "../assets/images/lembaga/".$by_lembagabaru;
	move_uploaded_file($tmp, $path);

		$query1 = "SELECT * FROM tb_lembaga WHERE id_lembaga='".$id_lembaga."'";
		$sql1 = mysqli_query($conn, $query1);
		$data1 = mysqli_fetch_array($sql1);

		if(is_file("../assets/images/lembaga/".$data1['by_lembaga']))
			unlink("../assets/images/lembaga/".$data1['by_lembaga']);
		
		$query2 = "UPDATE tb_lembaga SET by_lembaga='".$by_lembagabaru."' WHERE id_lembaga='".$id_lembaga."'";
		$sql2 = mysqli_query($conn, $query2);

		if($sql2){
			$_SESSION['pesan_lembaga_edit_by_ok'] = 'Rincian biaya sukses diubah..';
			echo "<script>window.history.go(-1);</script>";
		}else{
			$_SESSION['pesan_lembaga_edit_by_g'] = 'Gagal ubah rincian biaya..';
			echo "<script>window.history.go(-1);</script>";
		}
}else{
	$_SESSION['pesan_lembaga_edit_by_g'] = 'Gagal ubah rincian biaya..';
	echo "<script>window.history.go(-1);</script>";
}

?>

