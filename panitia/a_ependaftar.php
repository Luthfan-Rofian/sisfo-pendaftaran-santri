<?php
session_start();
error_reporting(0);
include '../config/koneksi.php';
if (isset($_POST['ubah'])) {
		$edit = mysqli_query($conn, "UPDATE tb_daftar SET 
		lb_daf = '".mysqli_real_escape_string($conn, $_POST['lb_daf'])."',
		md_daf = '".mysqli_real_escape_string($conn, $_POST['md_daf'])."',
		tg_daf = '".mysqli_real_escape_string($conn, $_POST['tg_daf'])."',
		gl_daf = '".mysqli_real_escape_string($conn, $_POST['gl_daf'])."',
		nm_pdf = '".mysqli_real_escape_string($conn, $_POST['nm_pdf'])."',
		ns_pdf = '".mysqli_real_escape_string($conn, $_POST['ns_pdf'])."',
		nk_pdf = '".mysqli_real_escape_string($conn, $_POST['nk_pdf'])."',
		tl_pdf = '".mysqli_real_escape_string($conn, $_POST['tl_pdf'])."',
		tg_pdf = '".mysqli_real_escape_string($conn, $_POST['tg_pdf'])."',
		bl_pdf = '".mysqli_real_escape_string($conn, $_POST['bl_pdf'])."',
		th_pdf = '".mysqli_real_escape_string($conn, $_POST['th_pdf'])."',
		jk_pdf = '".mysqli_real_escape_string($conn, $_POST['jk_pdf'])."',
		sd_pdf = '".mysqli_real_escape_string($conn, $_POST['sd_pdf'])."',
		ak_pdf = '".mysqli_real_escape_string($conn, $_POST['ak_pdf'])."',
		ct_pdf = '".mysqli_real_escape_string($conn, $_POST['ct_pdf'])."',
		hp_pdf = '".mysqli_real_escape_string($conn, $_POST['hp_pdf'])."',
		em_pdf = '".mysqli_real_escape_string($conn, $_POST['em_pdf'])."',
		hb_pdf = '".mysqli_real_escape_string($conn, $_POST['hb_pdf'])."',
		gol_dar = '".mysqli_real_escape_string($conn, $_POST['gol_dar'])."',
		rw_py = '".mysqli_real_escape_string($conn, $_POST['rw_py'])."',
		provinsi = '".mysqli_real_escape_string($conn, $_POST['provinsi'])."',
		kota = '".mysqli_real_escape_string($conn, $_POST['kota'])."',
		kecamatan = '".mysqli_real_escape_string($conn, $_POST['kecamatan'])."',
		kelurahan = '".mysqli_real_escape_string($conn, $_POST['kelurahan'])."',
		sa_sek = '".mysqli_real_escape_string($conn, $_POST['sa_sek'])."',
		st_sek = '".mysqli_real_escape_string($conn, $_POST['st_sek'])."',
		sn_sek = '".mysqli_real_escape_string($conn, $_POST['sn_sek'])."',
		al_sek = '".mysqli_real_escape_string($conn, $_POST['al_sek'])."',
		kb_sek = '".mysqli_real_escape_string($conn, $_POST['kb_sek'])."',
		nw_sek = '".mysqli_real_escape_string($conn, $_POST['nw_sek'])."',
		no_ktk = '".mysqli_real_escape_string($conn, $_POST['no_ktk'])."',
		no_kip = '".mysqli_real_escape_string($conn, $_POST['no_kip'])."',
		nm_ayh = '".mysqli_real_escape_string($conn, $_POST['nm_ayh'])."',
		tl_ayh = '".mysqli_real_escape_string($conn, $_POST['tl_ayh'])."',
		tg_ayh = '".mysqli_real_escape_string($conn, $_POST['tg_ayh'])."',
		bl_ayh = '".mysqli_real_escape_string($conn, $_POST['bl_ayh'])."',
		th_ayh = '".mysqli_real_escape_string($conn, $_POST['th_ayh'])."',
		nk_ayh = '".mysqli_real_escape_string($conn, $_POST['nk_ayh'])."',
		pd_ayh = '".mysqli_real_escape_string($conn, $_POST['pd_ayh'])."',
		pk_ayh = '".mysqli_real_escape_string($conn, $_POST['pk_ayh'])."',
		pg_ayh = '".mysqli_real_escape_string($conn, $_POST['pg_ayh'])."',
		nm_ibu = '".mysqli_real_escape_string($conn, $_POST['nm_ibu'])."',
		tl_ibu = '".mysqli_real_escape_string($conn, $_POST['tl_ibu'])."',
		tg_ibu = '".mysqli_real_escape_string($conn, $_POST['tg_ibu'])."',
		bl_ibu = '".mysqli_real_escape_string($conn, $_POST['bl_ibu'])."',
		th_ibu = '".mysqli_real_escape_string($conn, $_POST['th_ibu'])."',
		nk_ibu = '".mysqli_real_escape_string($conn, $_POST['nk_ibu'])."',
		pd_ibu = '".mysqli_real_escape_string($conn, $_POST['pd_ibu'])."',
		pk_ibu = '".mysqli_real_escape_string($conn, $_POST['pk_ibu'])."',
		pg_ibu = '".mysqli_real_escape_string($conn, $_POST['pg_ibu'])."',
		hp_ortu = '".mysqli_real_escape_string($conn, $_POST['hp_ortu'])."',
		wa_ortu = '".mysqli_real_escape_string($conn, $_POST['wa_ortu'])."',
		st_pdf = '".mysqli_real_escape_string($conn, $_POST['st_pdf'])."',
		pn_pdf = '".mysqli_real_escape_string($conn, $_POST['pn_pdf'])."',
		ug_pdf = '".mysqli_real_escape_string($conn, $_POST['ug_pdf'])."',
		info_psb = '".mysqli_real_escape_string($conn, $_POST['info_psb'])."',
		al_mondok = '".mysqli_real_escape_string($conn, $_POST['al_mondok'])."'
		WHERE id_p = '".mysqli_real_escape_string($conn, $_POST['id_p'])."'
		");

	if($edit) {
		$_SESSION['pesan_edit_sukses'] = 'Data Pendaftar Diubah..';
		echo "<script>window.history.go(-2);</script>";
	}else{
		$_SESSION['pesan_edit_gagal'] = 'Gagal Ubah Data Pendaftar..';
		echo "<script>window.history.go(-2);</script>";
	}
}
?>