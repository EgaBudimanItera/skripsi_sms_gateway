<?php
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo "
	<a href='daftar.html'><span class='keranjang'>Form Daftar</a><br />
	<a href='l0gin.html'><span class='keranjang'>Login Customer</a><br />
          <span class='border_cart'></span>
        ";
		}
else{
echo "
	<span class='keranjang'>$_SESSION[namalengkap]<br />
	<span class='keranjang'><a href='poo.html'>Data Order</a><br />
	<span class='keranjang'><a href='pening.html'>Konfirmasi Bayar</a><br />
	<a href='l090ut.html'><span class='keranjang'>Logout</a><br />
	<span class='border_cart'></span>";
	$sid = session_id();
	$sql = mysql_query("SELECT SUM(jumlah*harga) as total,SUM(jumlah) as totaljumlah FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
			                
	while($r=mysql_fetch_array($sql)){

  if ($r['totaljumlah'] != ""){
     $total_rp    = format_rupiah($total);
echo "<span class='keranjangitem'>&nbsp; &nbsp; $r[totaljumlah]<span class='keranjang3'>&nbsp; &nbsp; item produk<br />
    <span class='border_cart'></span>
        
<a href='keranjang-belanja.html'><span class='keranjang'>lihat pesanan</a><br />";
  
  }
 
  }
  }
?>
