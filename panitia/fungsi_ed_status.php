<?php

function query($data){
	global $conn;
	$perintah=mysqli_query($conn, $data);
	if(!$perintah) die("Gagal query :".mysqli_connect_error());
	return $perintah;
}
function update($type, $data){

	$Qry="UPDATE tb_daftar SET st_pdf='$type' WHERE id_p IN ($data)";
	$perintah=query($Qry);
	return $perintah;
	
}

?>