<?php
include "../../config/koneksi.php";

require '../../assets/PHPExcel/PHPExcel2/PHPExcel.php';

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Kang Mahmud')
					   ->setLastModifiedBy('Kang Mahmud')
					   ->setTitle("Rekap Pendaftar")
					   ->setSubject("Rekapitulasi")
					   ->setDescription("Rekap Pendaftar")
					   ->setKeywords("Rekap Pendaftar");

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

$excel->setActiveSheetIndex(0)->setCellValue('A1', "No."); 
$excel->setActiveSheetIndex(0)->setCellValue('B1', "Unit Lembaga"); 
$excel->setActiveSheetIndex(0)->setCellValue('C1', "Putra");
$excel->setActiveSheetIndex(0)->setCellValue('D1', "Putri");
$excel->setActiveSheetIndex(0)->setCellValue('E1', "Jumlah");

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
$sql = mysqli_query($conn, "SELECT * FROM tb_daftar WHERE lb_daf='$lbg' GROUP BY lb_daf");

$no=1;
$numrow=2;
while($data=mysqli_fetch_array($sql)){
	$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no++);
	$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['lb_daf']);

	$lbg=$data['lb_daf'];
	$Putra=mysqli_query($conn, "SELECT COUNT(jk_pdf) AS putra FROM tb_daftar WHERE lb_daf='$lbg' && jk_pdf='Laki-laki'
	");
	$pa=mysqli_fetch_array($Putra);
	$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $pa['putra']);

	$Putri=mysqli_query($conn, "SELECT COUNT(jk_pdf) AS putri FROM tb_daftar WHERE lb_daf='$lbg' && jk_pdf='Perempuan'
	");
	$pi=mysqli_fetch_array($Putri);
	$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $pi['putri']);

	$Total=mysqli_query($conn, "SELECT COUNT(id_p) AS total FROM tb_daftar WHERE lb_daf='$lbg'");
	$tt=mysqli_fetch_array($Total);
	$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $tt['total']);

	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
	$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
	
	$excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);

	$numrow++;
	
}

$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);

$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

$excel->getActiveSheet(0)->setTitle("Rekap_Pendaftar");
$excel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rekap_Pendaftar"_'.$_GET['lembaga'].'.xlsx"');
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');