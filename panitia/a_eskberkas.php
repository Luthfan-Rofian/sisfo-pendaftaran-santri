<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';
if (@$_POST['ubahsk']) {

	if (!empty($_POST['ubah_sk'])) {

		$id_p = mysqli_real_escape_string($conn, $_POST['id_p']);

		$sk_berkas = $_FILES['sk_berkas']['name'];
		$tmp = $_FILES['sk_berkas']['tmp_name'];
		$extensi = explode(".", $_FILES['sk_berkas']['name']);
		$sk_berkasbaru = "Bukti-".round(microtime(true)).".".end($extensi);
		$path = "../assets/images/berkas/".$sk_berkasbaru;
		move_uploaded_file($tmp, $path);

			$query = "SELECT * FROM tb_daftar WHERE id_p='".$id_p."'";
			$sql = mysqli_query($conn, $query);
			$data = mysqli_fetch_array($sql);

			if(is_file("../assets/images/berkas/".$data['sk_berkas']))
				unlink("../assets/images/berkas/".$data['sk_berkas']);

		$ubahsk = mysqli_query($conn, "UPDATE tb_daftar SET 
		sk_berkas = '".$sk_berkasbaru."'
		WHERE id_p = '".$id_p."'
		");

		if ($ubahsk) {
			$_SESSION['pesan_bp_sukses'] = 'Kartu Keluarga Diubah..';
			echo "<script>window.history.go(-1);</script>";
		}else{
			$_SESSION['pesan_bp_gagal'] = 'Gagal Ubah Kartu Keluarga..';
			echo "<script>window.history.go(-1);</script>";
		}
	}
}

?>