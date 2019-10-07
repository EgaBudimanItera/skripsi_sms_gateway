<script language="JavaScript">
      function konfirmasi(nama_kustomer) {
        tanya = confirm('Anda yakin ingin menghapus '+ nama_kustomer + '?');
        if (tanya == true) return true;
        else return false;
      }
   </script>
<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_produk/aksi_produk.php";
switch($_GET[act]){
  default:
    echo "<h2>Tambah Produk</h2>
          <input type=button class='tombol' value=' Tambahkan Produk ' onclick=\"window.location.href='?module=produk&act=tambahproduk';\">
          <table>
          <tr><th>No</th><th>Kode Produk</th><th>Nama Produk</th><th>satuan</th><th>Harga Pokok</th><th>Stok</th><th>Aksi</th></tr>";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
    $tampil = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_masuk]);
      $harga=format_rupiah($r[harga]);
      echo "<tr><td>$no</td>
	            <td>$r[kode_produk]</td>
                <td><a href=?module=produk&act=editproduk&id=$r[id_produk]>$r[nama_produk]</a></td>
                <td>$r[satuan]</td>
                <td>$harga</td>
                <td align=center>$r[stok]</td>
		        
				<td><a href=?module=produk&act=editprooduk&id=$r[id_produk]><b>Add Stok</b></a> | 
		                <a href=$aksi?module=produk&act=hapus&id=$r[id_produk] onclick=\"return konfirmasi('".$r[nama_kustomer]."')\"><b>Hapus</a></b></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM produk"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
    break; 
  case "tambahproduk":
    echo "<h2>Tambah Produk</h2>
          <form method=POST action='$aksi?module=produk&act=input' enctype='multipart/form-data'>
          <table>
		  <tr><td width=70>Kode Produk</td>     <td> : <input type=text name='kode_produk' size=60></td></tr>
          <tr><td width=70>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60></td></tr>
		  <tr><td width=70>satuan</td>     <td> : <input type=text name='satuan' size=20></td></tr>
          <tr><td>Kategori</td>  <td> : 
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select></td></tr>
          <input type=hidden name='berat' value='0' size=3>
          <tr><td>Harga</td>     <td> : <input type=text name='harga' size=10></td></tr>
		  <input type=hidden name='stok' value='0' size=3>
          <tr><td>Deskripsi</td>  <td> <textarea name='deskripsi' style='width: 600px; height: 350px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>
          <tr><td colspan=2><input type=submit class='tombol' value=Simpan>
                            <input type=button class='tombol' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;  
  case "editproduk":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Produk</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=update>
          <input type=hidden name=id value=$r[id_produk]>
		  <input type=hidden name='diskon' value=$r[diskon] size=3>
		  <input type=hidden name='stok' value=$r[stok] size=3>
		  <input type=hidden name='berat' value=$r[berat] size=3>
          <table>
		  <tr><td>Kode Produk</td>     <td> : <input type=text name='kode_produk' size=60 value='$r[kode_produk]'></td></tr>
          <tr><td>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60 value='$r[nama_produk]'></td></tr>
		  <tr><td>satuan</td>     <td> : <input type=text name='satuan' size=20 value='$r[satuan]'></td></tr>
          <tr><td>Kategori</td>  <td> : <select name='kategori'>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }
    echo "</select></td></tr>
          
          <tr><td>Harga</td>     <td> : <input type=text name='harga' value=$r[harga] size=10></td></tr>
          <tr><td>Deskripsi</td>   <td> <textarea name='deskripsi' style='width: 600px; height: 350px;'>$r[deskripsi]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  
          <img src='../foto_produk/small_$r[gambar]'></td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2><input type=submit class='tombol' value=Update>
                            <input type=button class='tombol' value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
	case "editprooduk":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Tambah Stok Produk</h2>
          <form name='form1' method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=updatee>
          <input type=hidden name=id value=$r[id_produk]>
		  <input type=hidden name='diskon' value=$r[diskon] size=3>
          <table>
          <tr><td>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60 value='$r[nama_produk]'></td></tr>
         ";
    echo "</select></td></tr>
          <tr><td>Stok Masuk</td>     <td> : <input type=text name='stok' size=3></td></tr>
		  
		  <tr><td>Tanggal Terima</td>       <td> : <script language='JavaScript'>
		                                           new tcal ({
			                                       'formname': 'form1',
			                                       'controlname': 'tgl_in'
		                                                     });
		                                           </script>
												  <input type=text name='tgl_in' size=10>
											</td>
											</tr>
											
		  <tr><td>Nomor Nota Pembelian</td> <td> : <input type=text name='no_nota' size=50></td></tr>

          <tr><td colspan=2><input type=submit class='tombol' value='Update Stok'>
                            <input type=button class='tombol' value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
	case "editprooduuk":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Retur Produk</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=updaatee>
          <input type=hidden name=id value=$r[id_produk]>
		  <input type=hidden name='diskon' value=$r[diskon] size=3>
          <table>
          <tr><td>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60 value='$r[nama_produk]'></td></tr>
         ";
    echo "</select></td></tr>
          <tr><td>Jumlah Retur</td>     <td> : <input type=text name='stok' size=3></td></tr>
          <tr><td colspan=2><input type=submit class='tombol' value='Update Stok'>
                            <input type=button class='tombol' value=Batal onclick=self.history.back()></td></tr>
         </table></form>";
    break;  
}
}
?>
