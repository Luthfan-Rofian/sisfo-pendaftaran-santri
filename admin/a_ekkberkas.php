<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['ubahkk']) {

	if (!empty($_POST['ubah_kk'])) {

		$id_p = mysqli_real_escape_string($conn, $_POST['id_p']);

		$kk_berkas = $_FILES['kk_berkas']['name'];
		$tmp = $_FILES['kk_berkas']['tmp_name'];
		$extensi = explode(".", $_FILES['kk_berkas']['name']);
		$kk_berkasbaru = "Bukti-".round(microtime(true)).".".end($extensi);
		$path = "../assets/images/berkas/".$kk_berkasbaru;
		move_uploaded_file($tmp, $path);

			$query = "SELECT * FROM tb_daftar WHERE id_p='".$id_p."'";
			$sql = mysqli_query($conn, $query);
			$data = mysqli_fetch_array($sql);

			if(is_file("../assets/images/berkas/".$data['kk_berkas']))
				unlink("../assets/images/berkas/".$data['kk_berkas']);

		$ubahkk = mysqli_query($conn, "UPDATE tb_daftar SET 
		kk_berkas = '".$kk_berkasbaru."'
		WHERE id_p = '".$id_p."'
		");

		if ($ubahkk) {
			$_SESSION['pesan_bp_sukses'] = 'Kartu Keluarga Diubah..';
			echo "<script>window.history.go(-1);</script>";
		}else{
			$_SESSION['pesan_bp_gagal'] = 'Gagal Ubah Kartu Keluarga..';
			echo "<script>window.history.go(-1);</script>";
		}
	}
}

?>