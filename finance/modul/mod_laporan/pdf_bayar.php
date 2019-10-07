<?php
error_reporting(0);

include ('class.ezpdf.php');
include "rupiah.php";
  
$pdf = new Cezpdf();
 

$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('fonts/Courier.afm');

$all = $pdf->openObject();


$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addJpegFromFile('logo.jpg',20,800,69);


$pdf->addText(190, 820, 16,'<b>Laporan Pembayaran Order</b>');
$pdf->addText(220, 800, 14,'<b>CV.LAUT SELATAN JAYA</b>');

$pdf->line(10, 795, 578, 795);


$pdf->line(10, 50, 578, 50);

$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();


$pdf->addObject($all, 'all');

$mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
$selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];

mysql_connect("localhost", "root", "12345678");
mysql_select_db("db_lsj_sms_gateway");

					
$sql = mysql_query("select * from konfirmasi where tgl_konfirmasi BETWEEN '$mulai' AND '$selesai' ");
					
$jml = mysql_num_rows($sql);

if ($jml >= 1){
$i = 1;
while($r = mysql_fetch_array($sql)){
  $nominal=rp($r[nominal]); 

  $data[$i]=array('<b>No</b>'=>$i, 
                 // '<b>No.Order</b>'=>$r[id_orders], 
                  '<b>Tanggal</b>'=>$r[tgl_konfirmasi], 
                  '<b>Customer</b>'=>$r[nama_kustomer], 
                  '<b>Bank</b>'=>$r[bank], 
                  '<b>Norek</b>'=>$r[norek],
                  '<b>Jml.Transfer</b>'=>$nominal);
	
  $i++;
}

$pdf->ezTable($data, '', '', '');

$tot=rp($total);
//$pdf->ezText("\n\nTotal keseluruhan : Rp. {$tot}");
//$pdf->ezText("\nJumlah yang terjual : {$jml} unit");


$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  $m=$_POST[tgl_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[thn_mulai];
  $s=$_POST[tgl_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[thn_selesai];
  echo "Tidak ada transaksi pembayaran pada Tanggal $m s/d $s";
}
?>
