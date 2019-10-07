<?php
error_reporting(0);
mysql_connect("localhost", "root", "12345678");
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
$mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
$selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];

//$sql=mysql_query("SELECT produk.kode_produk, produk.nama_produk, produk.harga, produk.stok, SUM(produk_in.jml_in) as masuk, orders.tgl_order FROM produk,produk_in,orders,orders_detail WHERE produk.id_produk=produk_in.id_produk AND produk.id_produk=orders_detail.id_produk AND orders.tgl_order BETWEEN '$mulai' AND '$selesai' GROUP BY produk.id_produk");	

$sql=mysql_query("SELECT * FROM produk, orders,orders_detail WHERE produk.id_produk=orders_detail.id_produk AND orders.id_orders=orders_detail.id_orders AND orders.tgl_order BETWEEN '$mulai' AND '$selesai' GROUP BY produk.id_produk");	



$rx = mysql_num_rows($sql);
if ($rx >= 1){
$i = 1;
while($r = mysql_fetch_array($sql)){

$rs=mysql_fetch_array(mysql_query("SELECT SUM(produk_in.jml_in) as masuk FROM produk_in WHERE produk_in.id_produk='$r[id_produk]' GROUP BY produk_in.id_produk "));

$keluar_banyak = $rs['masuk'] - $r['stok'];


//$ry=mysql_fetch_array(mysql_query("SELECT SUM(orders_detail.jumlah) as keluar_banyak FROM orders_detail,produk WHERE orders_detail.id_orders='$r[id_orders]' AND orders_detail.id_produk=produk.id_produk GROUP BY orders_detail.id_produk "));	

  $data[$i]=array('<b>No</b>'=>$i, 
                  '<b>Kode Produk</b>'=>$r[kode_produk],
                  '<b>Nama Produk</b>'=>$r[nama_produk], 
                  '<b>Harga</b>'=>'Rp.'.number_format($r[harga]), 
				  '<b>Total Barang Masuk</b>'=>$rs[masuk],
				  '<b>Total Barang Keluar</b>'=>$keluar_banyak,
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
