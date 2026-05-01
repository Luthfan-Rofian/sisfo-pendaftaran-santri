<?php
include "../../config/koneksi.php";

require '../../assets/PHPExcel/PHPExcel2/PHPExcel.php';

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Kang Mahmud')
					   ->setLastModifiedBy('Kang Mahmud')
					   ->setTitle("Data Berkas Santri")
					   ->setSubject("Santri")
					   ->setDescription("Data Berkas Santri")
					   ->setKeywords("Data Berkas Santri");

require '../../assets/PHPExcel/PHPExcel2/FungsiWarna1.php';

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

$excel->setActiveSheetIndex(0)->setCellValue('A1', "Nama Pendaftar"); 
$excel->setActiveSheetIndex(0)->setCellValue('B1', "Bukti");
$excel->setActiveSheetIndex(0)->setCellValue('C1', "Akta Lahir");
$excel->setActiveSheetIndex(0)->setCellValue('D1', "KK");
$excel->setActiveSheetIndex(0)->setCellValue('E1', "SKL");

$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);

$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);

$lbg=$_GET['lembaga'];
$sql = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE lb_daf='$lbg'");

$numrow=2;
while($data=mysqli_fetch_array($sql)){
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data['nm_pdf']);

	if(!empty($data['bp_berkas'])){
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, 'Ada');
	}else{
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, '-');
	}
	if(!empty($data['ak_berkas'])){
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, 'Ada');
	}else{
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, '-');
	}
	if(!empty($data['kk_berkas'])){
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, 'Ada');
	}else{
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, '-');
	}
	if(!empty($data['sk_berkas'])){
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, 'Ada');
	}

	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);

	$numrow++;
	
}

$excel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

$excel->getActiveSheet(0)->setTitle("Data_Berkas");
$excel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data_Berkas"_'.$_GET['lembaga'].'.xlsx"');
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');