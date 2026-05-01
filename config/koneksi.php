<?php
// SILAHKAN SESUAIKAN KONFIGURASI DATABASE ANDA
// DENGAN MENGUBAH PARAMETER '$host,$user,$pass,$data' SESUAI DATABASE ANDA

$host='localhost';
$user='root';
$pass='';
$data='psb_2023';

$conn = mysqli_connect($host,$user,$pass,$data);
if (!$conn) {
    $_SESSION['pesan_gagal_koneksi'] = 'Koneksi database gagal..!!!';
}

?>