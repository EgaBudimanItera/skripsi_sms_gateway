<?php
	session_start();
	error_reporting(0);
	include "../../../config/koneksi.php";
	include "../../../config/library.php";

	$sid = session_id();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "
	<a href='daftar.html'><span class='keranjang'>Form Daftar</a><br />
	<a href='l0gin.html'><span class='keranjang'>Login Customer</a><br />
          <span class='border_cart'></span>
        ";
		}
else{
	$sql = mysql_query("SELECT count(*) as jumlahbarang FROM orders_temp, produk 
			                WHERE  orders_temp.id_produk=produk.id_produk and id_session='$sid'");
	$r=mysql_fetch_array($sql);
	

	echo "
		<span class='keranjang'>$_SESSION[namalengkap]<br />
	
		<span class='keranjang'><a href='../administrator/modul/mod_ordermanual/aksi.php?module=pesan'> Jumlah Order Barang ($r[jumlahbarang])</a><br />
		
		
		";
		
}
?>
