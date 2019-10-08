<?php
	session_start();
	
	include "../../../config/koneksi.php";
	include "../../../config/library.php";

	

	$sid = session_id();
	
?>	

<h4 class='heading colr'>Keranjang Belanja</h4>
<form method=post action=modul/mod_ordermanual/aksi.php?module=keranjang&act=update>
	<table width=670 border=0 cellpadding=0 cellspacing=1 align=center>
		<thead>
         	<tr align=center height=23>
         		<td>No</td>
         		<td>Produk</td>
         		<td>Nama Produk</td>
         		<td>Qty</td>
         		<td>Harga</td>
         		<td>Sub Total</td>
         		<td>Hapus</td>
         	</tr>; 
        </thead>
        <tbody>
        	<?php
        		$sql = mysql_query("SELECT * FROM orders_temp, produk
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
        		
        		
        		$no=1;
        		while($r=mysql_fetch_array($sql)){
        			
    $disc        = ($r[diskon]/100)*$r[harga];
    $hargadisc   = number_format(($r[harga]-$disc),0,",",".");
    $subtotal    = ($r[harga]-$disc) * $r[jumlah];
    $total       = $total + $subtotal;  
    $subtotal_rp = format_rupiah($subtotal);
    $total_rp    = format_rupiah($total);
    $harga       = format_rupiah($r[harga]);
   
   

       echo "<tr background='images/bg_tab2.jpg'  align=center><td><span class='table2'>$no</td><input type=hidden name=id[$no] value=$r[id_orders_temp]>
              <td align=center><a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='../foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'><img width=80 class='imgcart' src=../foto_produk/$r[gambar]  class='tooltip' ></td>
              <td><span class='table2'>$r[nama_produk]</td>
       			  
              <td><input type=text name='jml[$no]' value=$r[jumlah] size=1 onchange=\"this.form.submit()\" onkeypress=\"return harusangka(event)\"></td>
              <td><span class='table2'>$hargadisc</td>
              <td><span class='table2'>$subtotal_rp</td>
              <td align=center><a href='modul/mod_ordermanual/aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]'><img src=images/kali.png border=0 title=Hapus></a></td>
          </tr>"; 
          

     
    $no++; 
  } 
  			?>
  			<tr>
  				<td colspan="5"><span class='table3'>Total: </td>
  				<td colspan="2"><span class='table3'> Rp <?php echo $total_rp?></td>
  			</tr>
  			
  			
        </tbody> 
	</table>
</form>

<form method="POST" action="modul/mod_ordermanual/aksi.php?module=keranjang&act=selesai">
	<table width=670 border=0 cellpadding=0 cellspacing=1 align=center>
		<tr>
			<td style="width: 30%;">Nama Kustomer :</td>
			<td style="width: 70%;"><input type="text" name="nama_kustomer" style="width: 300px;" required=""></td>
		</tr>
		<tr>
			<td>Nama Toko :</td>
			<td><input type="text" name="nama_toko" required="" style="width: 300px;"></td>
		</tr>
		<tr>
			<td>Alamat Kustomer :</td>
			<td><textarea name="alamat" required="" style="width: 300px;"></textarea></td>
		</tr>
		<tr>
			<td>Telp Kustomer :</td>
			<td><input type="number" name="telpon" style="width: 100px;" required=""></td>
		</tr>
		<tr>
			<td>Email Kustomer :</td>
			<td><input type="text" name="email" style="width: 300px;"></td>
		</tr>
		<tr>
			<td>Pembayaran :</td>
			<td>
				<select name="bayaran" style="width: 300px">
					<option value="CASH">CASH</option>
					<option value="CREDIT">CREDIT</option>
					
				</select>
				
			</td>
		</tr>
		<tr style="height: 40px;">
  				<td colspan="2">
  					<a href='../administrator/media.php?module=ordermanual' class="simplebtn2">Lanjutkan Belanja</a> &nbsp &nbsp
  					
  					<button type="submit" value="selesai" class="btn-finish">Selesaikan Transaksi</button>
  				</td>
  				
  				
  			</tr>
	</table>
</form>

<style type="text/css">
	.btn-finish{
	padding:2px 10px 2px 10px;
	border:#511a1f solid 1px;
	color:#fff;
	cursor:pointer;
	background-image:url(../images/btn.gif);
	background-repeat:repeat-x;
	background-color:#521a1f;
	display:inline-block;
	height:30px;
}

a.simplebtn2 {
	padding:2px 10px 2px 10px;
	border:#511a1f solid 1px;
	color:#fff;
	cursor:pointer;
	background-image:url(../images/btn.gif);
	background-repeat:repeat-x;
	background-color:#521a1f;
	display:inline-block;
	height:25px;
}
</style>