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


$pdf->addText(20, 820, 16,'<b>Kartu Piutang</b>');
$pdf->addText(20, 800, 14,'<b>CV.LAUT SELATAN JAYA</b>');

$pdf->line(10, 795, 578, 795);


$pdf->line(10, 50, 578, 50);

$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();


$pdf->addObject($all, 'all');

$mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
$selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];

mysql_connect("localhost", "root", "12345678");
mysql_select_db("db_lsj_sms_gateway");

					
$sql = mysql_query("SELECT sum(konfirmasi.nominal) as total, konfirmasi.tgl_konfirmasi, orders.nama_kustomer, orders.total_order, orders.status_order FROM konfirmasi,orders WHERE konfirmasi.id_orders=orders.id_orders AND konfirmasi.tgl_konfirmasi BETWEEN '$mulai' AND '$selesai' GROUP BY konfirmasi.id_orders");
					
$jml = mysql_num_rows($sql);
if ($jml >= 1){

$i = 1;
while($r = mysql_fetch_array($sql)){
  $utang = $r['total_order']- $r['total'] ;
  $utangnya  = number_format($utang, 0, ',',',');
  
  $sisa_utang = $utang + $sisa_utang;
  $sisa_utang_rp  = number_format($sisa_utang, 0, ',',',');
  
if ($r['status_order']=='Order') {
$status = 'BELUM LUNAS';
}else{
$status = 'LUNAS';
}


  $data[$i]=array('<b>No</b>'=>$i, 
                  '<b>Tanggal</b>'=>$r[tgl_konfirmasi],
                  '<b>Nama Customer</b>'=>$r[nama_kustomer], 
                  '<b>Sisa Pembayaran</b>'=>$utangnya 
                  );
	
  $i++;
}

$pdf->ezTable($data, '', '', '');
$pdf->ezText("\n                                                      Total Piutang : Rp. $sisa_utang_rp");
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  $m=$_POST[tgl_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[thn_mulai];
  $s=$_POST[tgl_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[thn_selesai];
  echo "Tidak ada data...";
}
?>
