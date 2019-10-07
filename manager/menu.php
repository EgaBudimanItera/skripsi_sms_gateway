<?php
include "../config/koneksi.php";
if ($_SESSION[leveluser]=='admin'){
  $sql=mysql_query("select * from modul where aktif='Y' order by urutan");
}
if ($m=mysql_fetch_array($sql)){  
//echo "<li><a href='?module=kategori'><b>Kategori Produk</b></a></li>"; 
//echo "<li><a href='?module=produk'><b>Data Produk</b></a></li>";
//echo "<li><a href='?module=customer'><b>Data Customer</b></a></li>";
//echo "<li><a href='?module=order'><b>Order Masuk</b></a></li>"; 
//echo "<li><a href='?module=konfirmasi'><b>Konfirmasi Pembayaran</b></a></li>";
//echo "<li><a href='?module=sms'><b>SMS Gateway</b></a></li>";
echo "<li><a href='?module=laporan'><b>Laporan</b></a></li>";   
//echo "<li><a href='?module=password'><b>Ganti Password</b></a></li>";	
echo "<li><a href='logout.php'><b>Keluar</b></a></li>";
//echo "<li><a href='?module=bank'><b>Rekening Bank</b></a></li>";
//echo "<li><a href='?module=ongkoskirim'><b>Ongkos Kirim</b></a></li>"; 
//echo "<li><a href='?module=produk_in'><b>History Produk Masuk</b></a></li>";

}
?>
