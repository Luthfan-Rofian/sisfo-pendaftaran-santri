<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';

$id_user = $_POST['id_user'];

if(@$_POST['ubah_foto']){

	$ft_user = $_FILES['ft_user']['name'];
	$tmp1 = $_FILES['ft_user']['tmp_name'];
	$extensi = explode(".", $_FILES['ft_user']['name']);
	$ft_userbaru = "Foto-".round(microtime(true)).".".end($extensi);
	$path1 = "../assets/images/user/".$ft_userbaru;
	move_uploaded_file($tmp1, $path1);

		$query1 = "SELECT * FROM tb_user WHERE id_user='".$id_user."'";
		$sql1 = mysqli_query($conn, $query1);
		$data1 = mysqli_fetch_array($sql1);

		if(is_file("../assets/images/user/".$data1['ft_user']))
			unlink("../assets/images/user/".$data1['ft_user']);
		
		$query1 = "UPDATE tb_user SET ft_user='".$ft_userbaru."' WHERE id_user='".$id_user."'";
		$sql1 = mysqli_query($conn, $query1);

		if($sql1){
			$_SESSION['pesan_user_editft'] = 'Foto user sukses diubah..';
			echo "<script>window.location='pg_profil'</script>";
		}else{
			$_SESSION['pesan_user_gagal'] = 'Gagal ubah user..';
			echo "<script>window.location='pg_profil'</script>";
		}
}else{
	$_SESSION['pesan_user_gagal'] = 'Gagal ubah user..';
	echo "<script>window.location='pg_profil'</script>";
}

?>

