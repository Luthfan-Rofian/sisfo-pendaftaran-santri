<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['ubahbp']) {

	if (!empty($_POST['ubah_bukti'])) {

		$id_p = mysqli_real_escape_string($conn, $_POST['id_p']);

		$bp_berkas = $_FILES['bp_berkas']['name'];
		$tmp = $_FILES['bp_berkas']['tmp_name'];
		$extensi = explode(".", $_FILES['bp_berkas']['name']);
		$bp_berkasbaru = "Bukti-".round(microtime(true)).".".end($extensi);
		$path = "../assets/images/berkas/".$bp_berkasbaru;
		move_uploaded_file($tmp, $path);

			$query = "SELECT * FROM tb_daftar WHERE id_p='".$id_p."'";
			$sql = mysqli_query($conn, $query);
			$data = mysqli_fetch_array($sql);

			if(is_file("../assets/images/berkas/".$data['bp_berkas']))
				unlink("../assets/images/berkas/".$data['bp_berkas']);

		$ubahbp = mysqli_query($conn, "UPDATE tb_daftar SET 
		bp_berkas = '".$bp_berkasbaru."'
		WHERE id_p = '".$id_p."'
		");

		if ($ubahbp) {
			$_SESSION['pesan_bp_sukses'] = 'File Bukti Diubah..';
			echo "<script>window.history.go(-1);</script>";
		}else{
			$_SESSION['pesan_bp_gagal'] = 'Gagal Ubah File Bukti..';
			echo "<script>window.history.go(-1);</script>";
		}
	}
}

?>