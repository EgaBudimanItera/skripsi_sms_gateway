<?php
error_reporting(0);
mysql_connect("localhost", "root", "root");
mysql_select_db("db_lsj_sms_gateway");
include ('class.ezpdf.php');
include "rupiah.php";
$pdf = new Cezpdf();
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('fonts/Courier.afm');
$all = $pdf->openObject();
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addText(200, 820, 16,'<b>KARTU PERSEDIAAN BARANG</b>');
$pdf->addText(220, 800, 14,'<b>CV. LAUT SELATAN JAYA</b>');
$pdf->line(10, 760, 578, 760);
$pdf->line(10, 50, 830, 50);
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();
$pdf->addObject($all, 'all');
$sql=mysql_query("SELECT * FROM produk ORDER BY nama_produk ASC");	
$rx = mysql_num_rows($sql);
if ($rx >= 1){
$i = 1;
while($r = mysql_fetch_array($sql)){

  $data[$i]=array('<b>No</b>'=>$i, 
                  '<b>Nama Produk</b>'=>$r[nama_produk], 
                  '<b>Harga</b>'=>$r[harga], 
				  '<b>Stok Tersedia</b>'=>$r[stok]		  
                  );
  $i++;
}
$pdf->ezText("\n\n");
$pdf->ezTable($data, '', '', '');
$tot=rp($total);
$tot2=$total2;
$pdf->ezText("\n\n\n\nDibuat Oleh,");
$pdf->ezText("\n\n\n(. . . . . . .)");

$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  $m=$_POST[tgl_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[thn_mulai];
  $s=$_POST[tgl_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[thn_selesai];
  echo "tidak ada data transaksi";
}
?>
