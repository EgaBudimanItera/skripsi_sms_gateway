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
$pdf->addText(20, 820, 10,'<b>CV.LAUT SELATAN JAYA</b>');
$pdf->addText(20, 810, 9,'<b>Tanda Bukti Order Customer</b>');
$pdf->addText(20, 800, 9,'<b>Jl. Laks.Malahayati No.58 Pesawahan Teluk Betung Selatan, Kota Bandar Lampung</b>');
$pdf->line(10, 770, 578, 770);
$pdf->line(10, 50, 578, 50);
$pdf->addText(30,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));
$pdf->closeObject();
$pdf->addObject($all, 'all');
$id_orders = $_GET['id_orders'];
mysql_connect("localhost", "root", "12345678");
mysql_select_db("db_lsj_sms_gateway");
					 
$sql = mysql_query("SELECT orders.id_orders, orders.status_order, orders.tgl_order, orders_detail.id_orders, orders_detail.jumlah, orders_detail.id_produk, produk.id_produk, produk.nama_produk, produk.harga FROM orders,orders_detail,produk WHERE orders.id_orders=orders_detail.id_orders and orders_detail.id_produk=produk.id_produk and orders_detail.id_orders=$id_orders");	

$sql2=mysql_query("SELECT * FROM orders_detail, produk 
                     WHERE orders_detail.id_produk=produk.id_produk 
                     AND orders_detail.id_orders='$_GET[id_orders]'");
while($s=mysql_fetch_array($sql2)){
  $subtotalberat = $s[berat] * $s[jumlah];
  $totalberat  = $totalberat + $subtotalberat;
  $total2      = $total2 + $subtotal;
  //$subtotal_rp = number_format($subtotal, 0, ',','.');    
 // $total_rp    = number_format($total, 0, ',','.');    
 // $harga       = number_format($s[harga], 0, ',','.');

}

$ongkos=mysql_fetch_array(mysql_query("SELECT * FROM orders WHERE id_orders='$_GET[id_orders]'"));
$bayar = $ongkos['bayar'];
$yasirherwendi = number_format($ongkos['total_order'], 0, ',','.');
$nama_kustomer = $ongkos['nama_kustomer'];
$alamat = $ongkos['alamat'];
$telpon = $ongkos['telpon'];
$nama_toko = $ongkos['nama_toko'];
//$ongkos=mysql_fetch_array(mysql_query("SELECT * FROM kota,orders WHERE orders.id_kota=kota.id_kota AND id_orders='$_GET[id_orders]'"));
//$ongkoskirim1 = $ongkos[ongkos_kirim];
//$ongkoskirim  = $ongkoskirim1 * $totalberat;
//$grandtotal   = $total2 + $ongkoskirim; 
//$ongkoskirim_rp    = number_format($r['ongkos_kirim'], 0, ',','.');
//$grandtotal_rp     = number_format($grandtotal, 0, ',','.'); 
//$ongkoskirim1_rp   = number_format($ongkoskirim1, 0, ',','.');    


$jml = mysql_num_rows($sql);
if ($jml >= 1){
$i = 1;
while($r = mysql_fetch_array($sql)){

$tgl_b = substr($r['tgl_order'],8,2)."-".substr($r['tgl_order'],5,2)."-". substr($r['tgl_order'],0,4);
$id_produk = $r['id_produk'];
$id_orders = $r['id_orders'];
$tgl_order = $r['tgl_order'];
$nama_produk = $r['nama_produk'];
$harga       = number_format($r['harga'], 0, ',','.');
$subtotal    = ($r[harga]) * $r[jumlah];  
$hargax      = number_format($subtotal, 0, ',','.');

$total       = $total + $subtotal;
$tot       = number_format($total, 0, ',','.');
//$yasir       = $total + $grandtotal;
//$yasirherwendi = number_format($yasir, 0, ',','.');

  $data[$i]=array('<b>No</b>'=>$i, 
                  '<b>Kode Barang</b>'=>'BRG'.$id_produk, 
                  '<b>Tanggal Order</b>'=>$tgl_b, 
                  '<b>Nama Produk</b>'=>$r[nama_produk], 
                  '<b>Qty</b>'=>$r[jumlah], 
                  '<b>Harga</b>'=>$harga,
                  '<b>Sub Total</b>'=>$hargax
				  );
	
  $i++;
}
$pdf->ezText("<b>Nama Customer:</b> $nama_kustomer");
$pdf->ezText("<b>Alamat /telp :</b> $alamat ($telpon)");
$pdf->ezText("<b>Nama Toko    :</b> $nama_toko");
$pdf->ezText("<b>Kode Order   :</b> $id_orders");
$pdf->ezText("\n\n");
$pdf->ezTable($data, '', 'Tabel Rincian Order Produk', '');
$pdf->ezText("\n\n");
//$pdf->ezText("\nTotal Biaya : Rp.{$tot}");
//$pdf->ezText("Ongkos Kirim Ke Kota Tujuan : Rp.{$ongkoskirim1_rp}/Kg");
//$pdf->ezText("Total Berat Barang : $totalberat Kg");
//$pdf->ezText("Total Ongkos Kirim : Rp.{$grandtotal_rp}");
$pdf->ezText("<b>GRAND TOTAL : Rp. {$yasirherwendi}</b>");
$pdf->ezText("<b>METODE BAYAR: $bayar</b>");

$pdf->ezText("\nSilahkan lakukan pembayaran maksimal 1 hari dari tanggal order anda, untuk menghindari proses pembatalan order oleh petugas kami.");
$pdf->ezText("\nPILIHAN REKENING PEMBAYARAN : ");
$pdf->ezText("\nBank : MANDIRI");
$pdf->ezText("Nomor Rekening : 114.000.456.992.0");
$pdf->ezText("a/n. CV.LAUT SELATAN JAYA");

$pdf->ezText("\nBank : BNI");
$pdf->ezText("Nomor Rekening : 931.2626.1983");
$pdf->ezText("a/n. CV.LAUT SELATAN JAYA");

$pdf->ezText("\nBank : BCA");
$pdf->ezText("Nomor Rekening : 321998069");
$pdf->ezText("a/n. CV.LAUT SELATAN JAYA");

$pdf->ezText("\nBank : BRI");
$pdf->ezText("Nomor Rekening : 112.334.556.7");
$pdf->ezText("a/n. CV.LAUT SELATAN JAYA");

$pdf->ezText("\nLakukan konfirmasi pembayaran lewat menu Konfirmasi Order,jika anda sudah melakukan Transfer Pembayaran.");

$pdf->ezText("\n\n\nTerima Kasih,");
$pdf->ezText("\n\n\n(Bag.admin)");

$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
}
else{
  echo "Tidak ada data...";
}

?>
