<?php
error_reporting(0);
mysql_connect("localhost", "root", "12345678");
mysql_select_db("db_lsj_sms_gateway");
$mulai=$_POST[thn_mulai].'-'.$_POST[bln_mulai].'-'.$_POST[tgl_mulai];
$selesai=$_POST[thn_selesai].'-'.$_POST[bln_selesai].'-'.$_POST[tgl_selesai];
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="10"><div align="center">KARTU PERSEDIAAN BARANG </div></td>
  </tr>
  <tr>
    <td colspan="10"><div align="center">CV. LAUT SELATAN JAYA </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
<thead>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><div align="center">Pembelian</div></td>
    <td colspan="3"><div align="center">Harga Pokok Penjualan </div></td>
    <td colspan="3"><div align="center">Saldo Persediaan </div></td>
  </tr>
  <tr>
    <td><div align="center">Tgl</div></td>
    <td><div align="center">Unit</div></td>
    <td><div align="center">HP</div></td>
    <td><div align="center">Total</div></td>
    <td><div align="center">Unit</div></td>
    <td><div align="center">HP</div></td>
    <td><div align="center">Total</div></td>
    <td><div align="center">Unit</div></td>
    <td><div align="center">HP</div></td>
    <td><div align="center">Total</div></td>
  </tr>
 </thead>
 
 <tbody>	

<?php
$sql=mysql_query("SELECT produk.nama_produk, produk.harga, produk.stok, SUM(produk_in.jml_in) as masuk, sum(orders_detail.jumlah) as keluar, orders.tgl_order FROM produk,produk_in,orders,orders_detail WHERE produk.id_produk=produk_in.id_produk AND produk.id_produk=orders_detail.id_produk AND orders.tgl_order BETWEEN '$mulai' AND '$selesai' GROUP BY orders.tgl_order ");	
$rx = mysql_num_rows($sql);
if ($rx >= 1){
$i = 1;
while($r = mysql_fetch_array($sql)){
$tgl= substr($r['tgl_order'],8,2)."-".substr($r['tgl_order'],5,2);
$total_masuk = $r['masuk'] * $r['harga'];
$total_keluar = $r['keluar'] * $r['harga'];
$total_stok = $r['stok'] * $r['harga'];
?>
 
  <tr>
    <td align="center"><?php echo "$tgl"; ?></td>
    <td align="center"><?php echo "$r[masuk]"; ?></td>
    <td align="right"><?php echo number_format($r['harga']); ?></td>
    <td align="right"><?php echo number_format($total_masuk); ?></td>
    <td align="center"><?php echo "$r[keluar]"; ?></td>
    <td align="right"><?php echo number_format($r['harga']); ?></td>
    <td align="right"><?php echo number_format($total_keluar); ?></td>
    <td align="center"><?php echo "$r[stok]"; ?></td>
    <td align="right"><?php echo number_format($r['harga']); ?></td>
    <td align="right"><?php echo number_format($total_stok); ?></td>
  </tr>
  
<?php } } ?>

 </tbody>	
</table>
