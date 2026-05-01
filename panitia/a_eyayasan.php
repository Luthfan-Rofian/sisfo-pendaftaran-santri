<?php
session_start();
include "../config/koneksi.php";

$id_yayasan = mysqli_real_escape_string($conn, $_POST['id_yayasan']);
$nm_yayasan = mysqli_real_escape_string($conn, $_POST['nm_yayasan']);
$sk_yayasan = mysqli_real_escape_string($conn, $_POST['sk_yayasan']);
$al_yayasan = mysqli_real_escape_string($conn, $_POST['al_yayasan']);
$kb_yayasan = mysqli_real_escape_string($conn, $_POST['kb_yayasan']);
$pr_yayasan = mysqli_real_escape_string($conn, $_POST['pr_yayasan']);
$kp_yayasan = mysqli_real_escape_string($conn, $_POST['kp_yayasan']);

if(isset($_POST['ubah_logo'])){

	$lg_yayasan = $_FILES['lg_yayasan']['name'];
	$tmp1 = $_FILES['lg_yayasan']['tmp_name'];
	$extensi = explode(".", $_FILES['lg_yayasan']['name']);
	$lg_yayasanbaru = "Logo-".round(microtime(true)).".".end($extensi);
	$path1 = "../assets/images/".$lg_yayasanbaru;
	move_uploaded_file($tmp1, $path1);

	$query = "SELECT * FROM tb_yayasan WHERE id_yayasan='".$id_yayasan."'";
	$sql = mysqli_query($conn, $query);
	$data = mysqli_fetch_array($sql);

	if(is_file("../assets/images/".$data['lg_yayasan']))
		unlink("../assets/images/".$data['lg_yayasan']);
	
	$query = "UPDATE tb_yayasan SET nm_yayasan='".$nm_yayasan."', sk_yayasan='".$sk_yayasan."', al_yayasan='".$al_yayasan."', kb_yayasan='".$kb_yayasan."', pr_yayasan='".$pr_yayasan."', kp_yayasan='".$kp_yayasan."', lg_yayasan='".$lg_yayasanbaru."' WHERE id_yayasan='".$id_yayasan."'";
	$sql = mysqli_query($conn, $query);

	if($sql){
		$_SESSION['pesan_yayasan_sukses'] = 'Data yayasan diubah..';
		echo "<script>window.location='pg_yayasan'</script>"; 
	}else{
		$_SESSION['pesan_yayasan_gagal'] = 'Gagal ubah data yayasan..!!!';
		echo "<script>window.location='pg_yayasan'</script>";
	}
}else{
	$query2 = "UPDATE tb_yayasan SET nm_yayasan='".$nm_yayasan."', sk_yayasan='".$sk_yayasan."', al_yayasan='".$al_yayasan."', kb_yayasan='".$kb_yayasan."', pr_yayasan='".$pr_yayasan."', kp_yayasan='".$kp_yayasan."' WHERE id_yayasan='".$id_yayasan."'";
	$sql2 = mysqli_query($conn, $query2);

	if($sql2){ 
		$_SESSION['pesan_yayasan_sukses'] = 'Data yayasan diubah..';
		echo "<script>window.location='pg_yayasan'</script>";
	}else{
		$_SESSION['pesan_yayasan_gagal'] = 'Gagal ubah data yayasan..!!!';
		echo "<script>window.location='pg_yayasan'</script>";
	}
}
?>


