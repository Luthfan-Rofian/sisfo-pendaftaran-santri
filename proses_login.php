<?php
session_start();
error_reporting(0);
include 'assets/plugins/securimage/securimage.php';
$securimage = new Securimage();

if ($securimage->check($_POST['cod']) == false) {
    $_SESSION['pesan_captcha_gagal'] = '<h6>Kode Keamanan Tidak Sesuai..!!</h6>';
    echo "<script>window.location='login'</script>";
}else{

include 'config/koneksi.php';
if (isset($_POST['login'])) {
	function anti_injection($data){
		$filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		return $filter;
	}

	$us_user = anti_injection($_POST['us_user']);
	$ps_user = anti_injection(SHA1($_POST['ps_user']));

	$injeksi_us_user = mysqli_real_escape_string($conn, $us_user);
	$injeksi_ps_user = mysqli_real_escape_string($conn, $ps_user);

	$cek = mysqli_query($conn, "SELECT * FROM tb_user WHERE 
      us_user = '".mysqli_real_escape_string($conn, $_POST['us_user'])."' AND 
      ps_user = '".SHA1(mysqli_real_escape_string($conn, $_POST['ps_user']))."' 
      ");

	$user = mysqli_fetch_array($cek);
	$id_user = $user['id_user'];
	$nm_user = $user['nm_user'];
	$lb_user = $user['lb_user'];
	$rl_user = $user['rl_user'];

	$log = mysqli_query($conn, "INSERT INTO tb_logs VALUES('', '$nm_user', '".date('Y-m-d')."', '$rl_user')");

	if (mysqli_num_rows($cek) > 0) {

		$_SESSION['start_login'] = true;
		$_SESSION['id_user'] = $id_user;
		$_SESSION['nm_user'] = $nm_user;
		$_SESSION['lb_user'] = $lb_user;
		$_SESSION['rl_user'] = $rl_user;

		if ($rl_user == 'Admin') {
		    $_SESSION['pesan_login_sukses'] = '<h6>Login Berhasil..</h6>';
		    echo "<script>window.location='admin/index'</script>";
		}else if ($rl_user == 'Panitia') {
		    $_SESSION['pesan_login_sukses'] = '<h6>Login Berhasil..</h6>';
		    echo "<script>window.location='panitia/index'</script>";
		}
	}else{
	    $_SESSION['pesan_login_gagal'] = '<h6>Username / Password salah..!</h6>';
	    echo "<script>window.location='login'</script>";
	}
}}
?>