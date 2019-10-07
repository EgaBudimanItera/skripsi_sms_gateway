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
$pdf->addText(20, 820, 10,'<b>Detail Cicilan Customer</b>');
$pdf->addText(20, 810, 9,'<b>CV.LAUT SELATAN JAYA  </b>');
$pdf->addText(20, 800, 9,'<b>Jl. Laks.Malahayati No.58 Pesawahan Teluk Betung Selatan, Kota Bandar Lampung</b>');
$pdf->line(10, 770, 578, 770);
$pdf->line(10, 50, 578, 50);
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));
$pdf->closeObject();
$pdf->addObject($all, 'all');

$id_orders = $_GET['id_orders'];
mysql_connect("localhost", "root", "12345678");
mysql_select_db("db_lsj_sms_gateway");
					 
$ongkos=mysql_fetch_array(mysql_query("SELECT * FROM orders WHERE id_orders='$id_orders'"));
$bayar = $ongkos['bayar'];
$yasirherwendi = number_format($ongkos['total_order'], 0, ',','.');
$nama_kustomer = $ongkos['nama_kustomer'];
$alamat = $ongkos['alamat'];
$telpon = $ongkos['telpon'];
$nama_toko = $ongkos['nama_toko'];
	
$r2 = mysql_fetch_array(mysql_query("SELECT  sum(konfirmasi.nominal) as total, orders.total_order FROM konfirmasi, orders WHERE konfirmasi.id_orders=orders.id_orders AND konfirmasi.id_orders='$id_orders' "));
//$r2 = mysql_fetch_array(mysql_query("SELECT  * FROM orders WHERE id_orders='$id_orders' "));

$total_order     = number_format($r2['total_order'], 0, ',','.');
$total_transfer  = number_format($r2['total'], 0, ',','.');
$utang = $r2['total_order'] - $r2['total'] ;
$utangnya  = number_format($utang, 0, ',','.');

$sql = mysql_query("SELECT  * FROM konfirmasi, orders WHERE konfirmasi.id_orders=orders.id_orders AND konfirmasi.id_orders='$id_orders' ");	
$i = 1;
while($r = mysql_fetch_array($sql)){

$tgl_konfirmasi  = substr($r['tgl_konfirmasi'],8,2)."-".substr($r['tgl_konfirmasi'],5,2)."-". substr($r['tgl_konfirmasi'],0,4);
$nominal         = number_format($r['nominal'], 0, ',','.');

if ($r['status_order']=='Order') {
$status = 'BELUM LUNAS';
}else{
$status = 'LUNAS';
}

  $data[$i]=array('<b>No</b>'=>$i, 
                  '<b>ID Order</b>'=>$r['id_orders'], 
                  '<b>Tanggal Transfer</b>'=>$tgl_konfirmasi, 
                  '<b>Bank</b>'=>$r['bank'], 
                  '<b>Nominal Transfer</b>'=>$nominal, 
                  '<b>Keterangan</b>'=>$r['keterangan']
				  );
	
  $i++;
}
$pdf->ezText("<b>Nama Customer:</b> $nama_kustomer");
$pdf->ezText("<b>Alamat /telp :</b> $alamat ($telpon)");
$pdf->ezText("<b>Nama Toko    :</b> $nama_toko");
$pdf->ezText("\n\n");
$pdf->ezTable($data, '', 'Rincian Cicilan', '');
$pdf->ezText("\nKETERANGAN CICILAN CUSTOMER :");
$pdf->ezText("Total Order : Rp.$total_order");
$pdf->ezText("Total Transfer : Rp.$total_transfer");
$pdf->ezText("Sisa Pembayaran : Rp.$utangnya");
$pdf->ezText("<b>Status Order : $status</b>");
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
?>
