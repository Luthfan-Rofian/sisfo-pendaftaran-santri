<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['ubahak']) {

	if (!empty($_POST['ubah_akte'])) {

		$id_p = mysqli_real_escape_string($conn, $_POST['id_p']);

		$ak_berkas = $_FILES['ak_berkas']['name'];
		$tmp = $_FILES['ak_berkas']['tmp_name'];
		$extensi = explode(".", $_FILES['ak_berkas']['name']);
		$ak_berkasbaru = "Bukti-".round(microtime(true)).".".end($extensi);
		$path = "../assets/images/berkas/".$ak_berkasbaru;
		move_uploaded_file($tmp, $path);

			$query = "SELECT * FROM tb_daftar WHERE id_p='".$id_p."'";
			$sql = mysqli_query($conn, $query);
			$data = mysqli_fetch_array($sql);

			if(is_file("../assets/images/berkas/".$data['ak_berkas']))
				unlink("../assets/images/berkas/".$data['ak_berkas']);

		$ubahak = mysqli_query($conn, "UPDATE tb_daftar SET 
		ak_berkas = '".$ak_berkasbaru."'
		WHERE id_p = '".$id_p."'
		");

		if ($ubahak) {
			$_SESSION['pesan_bp_sukses'] = 'Akte Lahir Diubah..';
			echo "<script>window.history.go(-1);</script>";
		}else{
			$_SESSION['pesan_bp_gagal'] = 'Gagal Ubah Akte Lahir..';
			echo "<script>window.history.go(-1);</script>";
		}
	}
}

?>