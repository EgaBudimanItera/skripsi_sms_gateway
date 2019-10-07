
<script language="javascript">
function validasi(form){
  if (form.nama_produk.value == ""){
    alert("Anda belum mengisikan data.");
    form.nama_produk.focus();
    return (false);
  }
  
  if (form.deskripsi.value == ""){
    alert("Anda belum mengisikan data.");
    form.deskripsi.focus();
    return (false);
  }
  
   return (true);
}
</script>

   <script language="JavaScript">
      function konfirmasi(nama_kustomer) {
        tanya = confirm('Anda yakin ingin menghapus '+ nama_kustomer + '?');
        if (tanya == true) return true;
        else return false;
      }
   </script>

<script language="javascript">
function validasi(form){
  if (form.nama_perusahaan.value == ""){
    alert("Anda belum mengisikan nama kategori produknya.");
    form.nama_kategori.focus();
    return (false);
  }
   return (true);
}
</script>

<?

$aksi="modul/mod_konfirmasi/aksi_konfirmasi.php";
$module=$_GET['module'];

switch($_GET['act']){
  
  default:
    echo "<h2>Data Konfirmasi Customer</h2>
          ";
    
    
    $tampil2 = mysql_query("SELECT * FROM konfirmasi");
    $r2=mysql_fetch_array($tampil2);
    if($r2['id_konfirmasi']==0){
		echo"";
		
    }else{
            
            
              echo"<table>
 <tr><th>No</th><th>ID Order</th><th>Nama Customer</th><th>Bank/No.Rekening</th><th>Pemilik</th><th>Nominal</th><th>Keterangan</th><th>Bukti</th><th>Hapus</th></tr>"; 
        $tampil=mysql_query("SELECT * FROM konfirmasi ORDER BY id_konfirmasi DESC");
        $no=1;
        while ($r=mysql_fetch_array($tampil)){
            
           echo "<tr class='$warna'><td>$no</td>
                 <td>$r[id_orders]</td>
				 <td>$r[nama_kustomer]</td>
				 <td>$r[bank]/$r[norek]</td>
				 <td>$r[pemilik]</td>
				 <td>$r[nominal]</td>
				 <td>$r[keterangan]</td>
				 <td><a href='../bukti_transfer/$r[gambar]' target='_blank'> VIEW BUKTI</a></td> 
				 
                 <td> 
    	               <a href=$aksi?module=$module&act=hapus&id=$r[id_konfirmasi] onclick=\"return konfirmasi('".$r[nama_kustomer]."')\"><b>Hapus</b></a>
                 </td></tr>";
          $no++;
        }
        echo "</table>";
    }
    break;
  
  
  case "tambahperusahaan":
    echo "<h2>Tambah Perusahaan Pengiriman Barang</h2>
          <form method=POST action='$aksi?module=$module&act=input' enctype='multipart/form-data' onSubmit=\"return validasi(this)\">
          <table>
          <tr><td>Nama Perusahaan</td><td> : <input type=text name='nama_perusahaan'></td></tr>
          <tr><td colspan=2><input type=submit class='tombol' name=submit value=Simpan>
                            <input type=button class='tombol' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
   
  case "editperusahaan":
    $edit=mysql_query("SELECT * FROM shop_pengiriman WHERE id_perusahaan='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Perusahaan Pengiriman Barang</h2>
          <form method=POST action=$aksi?module=$module&act=update enctype='multipart/form-data' onSubmit=\"return validasi(this)\">
          <input type=hidden name=id value='$r[id_perusahaan]'>
          <table>
          <tr><td>Nama Perusahaan</td><td> : <input type=text name='nama_perusahaan' value='$r[nama_perusahaan]'></td></tr>
          
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit class='tombol' value=Update>
                            <input type=button class='tombol' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}

//}
?>
