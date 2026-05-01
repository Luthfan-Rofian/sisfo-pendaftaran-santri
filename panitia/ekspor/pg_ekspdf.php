<?php
include "../../config/koneksi.php";

require '../../assets/PHPExcel/PHPExcel2/PHPExcel.php';

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Kang Mahmud')
					   ->setLastModifiedBy('Kang Mahmud')
					   ->setTitle("Data Pendaftar")
					   ->setSubject("Pendaftar")
					   ->setDescription("Data Pendaftar")
					   ->setKeywords("Data Pendaftar");

require '../../assets/PHPExcel/PHPExcel2/FungsiWarna2.php';

$style_col = array(
	'font' => array('bold' => true),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
	)
);

$style_row = array(
	'alignment' => array(
		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
	),
	'borders' => array(
		'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
		'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  
		'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), 
		'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) 
	)
);

$excel->setActiveSheetIndex(0)->setCellValue('A1', "No."); 
$excel->setActiveSheetIndex(0)->setCellValue('B1', "ID");
$excel->setActiveSheetIndex(0)->setCellValue('C1', "Gel");
$excel->setActiveSheetIndex(0)->setCellValue('D1', "Unit Lembaga"); 
$excel->setActiveSheetIndex(0)->setCellValue('E1', "Mode");
$excel->setActiveSheetIndex(0)->setCellValue('F1', "Tgl. Daftar");
$excel->setActiveSheetIndex(0)->setCellValue('G1', "Nama Pendaftar");
$excel->setActiveSheetIndex(0)->setCellValue('H1', "NISN");
$excel->setActiveSheetIndex(0)->setCellValue('I1', "NIK");
$excel->setActiveSheetIndex(0)->setCellValue('J1', "Tp Lahir");
$excel->setActiveSheetIndex(0)->setCellValue('K1', "Tgl Lahir");
$excel->setActiveSheetIndex(0)->setCellValue('L1', "Jn Kelamin");
$excel->setActiveSheetIndex(0)->setCellValue('M1', "Jm Saudara");
$excel->setActiveSheetIndex(0)->setCellValue('N1', "Anak Ke");
$excel->setActiveSheetIndex(0)->setCellValue('O1', "Cita-cita");
$excel->setActiveSheetIndex(0)->setCellValue('P1', "Hobi");
$excel->setActiveSheetIndex(0)->setCellValue('Q1', "Email");
$excel->setActiveSheetIndex(0)->setCellValue('R1', "No. Hp");
$excel->setActiveSheetIndex(0)->setCellValue('S1', "Gol Darah");
$excel->setActiveSheetIndex(0)->setCellValue('T1', "Rw. Penyakit");
$excel->setActiveSheetIndex(0)->setCellValue('U1', "Provinsi");
$excel->setActiveSheetIndex(0)->setCellValue('V1', "Kabupaten");
$excel->setActiveSheetIndex(0)->setCellValue('W1', "Kecamatan");
$excel->setActiveSheetIndex(0)->setCellValue('X1', "Desa");
$excel->setActiveSheetIndex(0)->setCellValue('Y1', "Sekolah Asal");
$excel->setActiveSheetIndex(0)->setCellValue('Z1', "Status Sekolah");
$excel->setActiveSheetIndex(0)->setCellValue('AA1', "NPSN");
$excel->setActiveSheetIndex(0)->setCellValue('AB1', "Alamat");
$excel->setActiveSheetIndex(0)->setCellValue('AC1', "Kabupaten");
$excel->setActiveSheetIndex(0)->setCellValue('AD1', "No. WA Sekolah");
$excel->setActiveSheetIndex(0)->setCellValue('AE1', "No. KK");
$excel->setActiveSheetIndex(0)->setCellValue('AF1', "No. KIP");
$excel->setActiveSheetIndex(0)->setCellValue('AG1', "Nama Ayah");
$excel->setActiveSheetIndex(0)->setCellValue('AH1', "Tp. Lahir Ayah");
$excel->setActiveSheetIndex(0)->setCellValue('AI1', "Tg. Lahir Ayah");
$excel->setActiveSheetIndex(0)->setCellValue('AJ1', "NIK Ayah");
$excel->setActiveSheetIndex(0)->setCellValue('AK1', "Pendidikan Ayah");
$excel->setActiveSheetIndex(0)->setCellValue('AL1', "Pekerjaan Ayah");
$excel->setActiveSheetIndex(0)->setCellValue('AM1', "Penghasilan Ayah");
$excel->setActiveSheetIndex(0)->setCellValue('AN1', "Nama Ibu");
$excel->setActiveSheetIndex(0)->setCellValue('AO1', "Tp. Lahir Ibu");
$excel->setActiveSheetIndex(0)->setCellValue('AP1', "Tg. Lahir Ibu");
$excel->setActiveSheetIndex(0)->setCellValue('AQ1', "NIK Ibu");
$excel->setActiveSheetIndex(0)->setCellValue('AR1', "Pendidikan Ibu");
$excel->setActiveSheetIndex(0)->setCellValue('AS1', "Pekerjaan Ibu");
$excel->setActiveSheetIndex(0)->setCellValue('AT1', "Penghasilan Ayah");
$excel->setActiveSheetIndex(0)->setCellValue('AU1', "No. Hp Ortu");
$excel->setActiveSheetIndex(0)->setCellValue('AV1', "No. WA Ortu");
$excel->setActiveSheetIndex(0)->setCellValue('AW1', "Info PSB");
$excel->setActiveSheetIndex(0)->setCellValue('AX1', "Alasan Mondok");
$excel->setActiveSheetIndex(0)->setCellValue('AY1', "Status");
$excel->setActiveSheetIndex(0)->setCellValue('AZ1', "Panitia Pendaftaran");

$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('X1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('Y1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('Z1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AA1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AB1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AC1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AD1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AE1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AF1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AG1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AH1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AI1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AJ1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AK1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AL1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AM1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AN1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AO1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AP1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AQ1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AR1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AS1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AT1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AU1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AV1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AW1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AX1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AY1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('AZ1')->applyFromArray($style_col);

$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('7')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('8')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('9')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('10')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('11')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('12')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('13')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('14')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('15')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('16')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('17')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('18')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('19')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('20')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('21')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('22')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('23')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('24')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('25')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('26')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('27')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('28')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('29')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('30')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('31')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('32')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('33')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('34')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('35')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('36')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('37')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('38')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('39')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('40')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('41')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('42')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('43')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('44')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('45')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('46')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('47')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('48')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('49')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('50')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('51')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('52')->setRowHeight(20);

$lbg=$_GET['lembaga'];
$sql = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE lb_daf='$lbg'");

$no=1;
$numrow=2;
while($data=mysqli_fetch_array($sql)){
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no++);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['id_daf']);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['gl_daf']);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['lb_daf']);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['md_daf']);
	$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['tg_daf']);
	$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['nm_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, "'".$data['ns_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, "'".$data['nk_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['tl_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['tg_pdf']." ".$data['bl_pdf']." ".$data['th_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['jk_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data['sd_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data['ak_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data['ct_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data['hb_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data['em_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data['hp_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data['gol_dar']);
	$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data['rw_py']);
	$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data['provinsi']);
	$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data['kota']);
	$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data['kecamatan']);
	$excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data['kelurahan']);
	$excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data['sa_sek']);
	$excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data['st_sek']);
	$excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data['sn_sek']);
	$excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data['al_sek']);
	$excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data['kb_sek']);
	$excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data['nw_sek']);
	$excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, "'".$data['no_ktk']);
	$excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data['no_kip']);
	$excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data['nm_ayh']);
	$excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data['tl_ayh']);
	$excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data['tg_ayh']." ".$data['bl_ayh']." ".$data['th_ayh']);
	$excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, "'".$data['nk_ayh']);
	$excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data['pd_ayh']);
	$excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data['pk_ayh']);
	$excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data['pg_ayh']);
	$excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data['nm_ibu']);
	$excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data['tl_ibu']);
	$excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data['tg_ibu']." ".$data['bl_ibu']." ".$data['th_ibu']);
	$excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, "'".$data['nk_ibu']);
	$excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data['pd_ibu']);
	$excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data['pk_ibu']);
	$excel->setActiveSheetIndex(0)->setCellValue('AT'.$numrow, $data['pg_ibu']);
	$excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data['hp_ortu']);
	$excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, $data['wa_ortu']);
	$excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data['info_psb']);
	$excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data['al_mondok']);
	$excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data['st_pdf']);
	$excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data['pn_pdf']);

	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AD'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AF'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AH'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AI'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AJ'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AK'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AL'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AM'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AN'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AO'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AP'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AQ'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AR'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AS'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AT'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AU'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AV'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AW'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AX'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AY'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('AZ'.$numrow)->applyFromArray($style_row);
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);

	$numrow++;
	
}

$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(12);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(12);
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('S')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('U')->setWidth(40);
$excel->getActiveSheet()->getColumnDimension('V')->setWidth(40);
$excel->getActiveSheet()->getColumnDimension('W')->setWidth(40);
$excel->getActiveSheet()->getColumnDimension('X')->setWidth(45);
$excel->getActiveSheet()->getColumnDimension('Y')->setWidth(45);
$excel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AA')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('AB')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('AC')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('AD')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AE')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AF')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AG')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AH')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AI')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('AK')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AL')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AM')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AN')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AO')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AP')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('AR')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('AS')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AT')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AU')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AV')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AW')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AX')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AY')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(20);

$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

$excel->getActiveSheet(0)->setTitle("Data_Pendaftar");
$excel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data_Pendaftar"_'.$_GET['lembaga'].'.xlsx"');
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');