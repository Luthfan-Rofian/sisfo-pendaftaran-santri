<?php
require('assets/fpdf/fpdf.php');
include 'config/koneksi.php';

$idpdf=$_GET['idpdf'];

function tgl_indo($tanggal){
    $bulan=array (
        1=>'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan=explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->Cell(15,9,'',0,1);

$yayasan=mysqli_query($conn, "SELECT * FROM tb_yayasan");
$lg=mysqli_fetch_array($yayasan);

$logo=$lg['lg_yayasan'];
$folder='assets/images/'.$logo;
if (is_file($folder)) {
    $pdf->Image($folder,99,9,16);
}

$pdf->SetFont('Times','B',13);
$pdf->MultiCell(15,9,'',0);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(190,9,'BUKTI PENDAFTARAN',0,0,'C');

$mutasi=mysqli_query($conn, "SELECT * FROM tb_daftar WHERE id_p='$idpdf'");
$row=mysqli_fetch_array($mutasi);

    $pdf->SetFont('Times','B',12);
    $pdf->MultiCell(15,9,'',0);

    $pdf->Cell(45,7,'ID',1,0,'L');
    $pdf->Cell(145,7,$row['id_daf'],1,0);

    $pdf->SetFont('Times','B',12);
    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,7,'Nama',1,0,'L');
    $pdf->Cell(145,7,$row['nm_pdf'],1,0);

    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,7,'Jenis kelamin',1,0,'L');
    $pdf->Cell(145,7,$row['jk_pdf'],1,0);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,7,'No. Hp.',1,0,'L');
    $pdf->Cell(145,7,$row['hp_pdf'],1,0);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,7,'Asal sekolah',1,0,'L');
    $pdf->Cell(145,7,$row['sa_sek'],1,0);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,7,'Alamat',1,0,'L');
    $pdf->Cell(145,7,$row['kelurahan'].' '.$row['kecamatan'].' '.$row['kota'].' '.$row['provinsi'],1,0);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,7,'Tanggal daftar',1,0,'L');
    $pdf->Cell(145,7,tgl_indo($row['tg_daf']),1,0);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,7,'Gelombang',1,0,'L');
    $pdf->Cell(145,7,$row['gl_daf'],1,0);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,7,'Diterima oleh',1,0,'L');
    $pdf->Cell(145,7,$row['pn_pdf'],1,0);

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,7,'',0,0,'L');

    $pdf->SetFont('Times','',8);
    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,20,'Tanda Tangan :',1,0,'L');

    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(45,20,'',0,0,'L');

    $pdf->SetFont('Times','B',14);
    $pdf->MultiCell(15,7,'',0);
    $pdf->Cell(190,20,'Cetak kartu ini dan bawa saat daftar ulang',0,0,'C');



$pdf->Output('D','Bukti_'.strtolower($row['nm_pdf']).'.pdf');

?>