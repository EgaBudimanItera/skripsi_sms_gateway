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
    echo "<h2>History Produk Masuk</h2>
          <table>
          <tr><th>No</th><th>Nama Produk</th><th>Stok</th><th>View History</th></tr>";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
    $tampil = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_masuk]);
      $harga=format_rupiah($r[harga]);
      echo "<tr><td>$no</td>
                <td>$r[nama_produk]</td>
                <td align=center>$r[stok]</td>
				<td><a href=?module=produk_in&act=view_&id=$r[id_produk]><b>View History</b></a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM produk"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
    break; 
	
  
  case "editproduk":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Produk</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=update>
          <input type=hidden name=id value=$r[id_produk]>
		  <input type=hidden name='diskon' value=$r[diskon] size=3>
		  <input type=hidden name='stok' value=$r[stok] size=3>
          <table>
          <tr><td>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60 value='$r[nama_produk]'></td></tr>
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
          <tr><td>Berat</td>     <td> : <input type=text name='berat' value=$r[berat] size=3></td></tr>
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
	case "view_":
    echo "<h2>History Produk Masuk</h2>
          <table>
          <tr><th>No</th><th>Nama Produk</th><th>Stok Masuk</th><th>Tanggal Masuk</th></tr>";
    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
    $tampil = mysql_query("SELECT * FROM produk_in,produk WHERE produk_in.id_produk=produk.id_produk AND produk_in.id_produk='$_GET[id]' ORDER BY tgl_in DESC LIMIT $posisi,$batas");  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_in]);
      $harga=format_rupiah($r[harga]);
      echo "<tr><td>$no</td>
                <td>$r[nama_produk]</td>
                <td >$r[jml_in]</td>
				<td>$tanggal</td>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata = mysql_num_rows(mysql_query("SELECT * FROM produk_in,produk WHERE produk_in.id_produk=produk.id_produk AND produk_in.id_produk='$_GET[id]'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    echo "<div id=paging>Hal: $linkHalaman</div><br>";
     break;  
	case "editprooduk":
    $edit = mysql_query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Tambah Stok Produk</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=produk&act=updatee>
          <input type=hidden name=id value=$r[id_produk]>
		  <input type=hidden name='diskon' value=$r[diskon] size=3>
          <table>
          <tr><td>Nama Produk</td>     <td> : <input type=text name='nama_produk' size=60 value='$r[nama_produk]'></td></tr>
         ";
    echo "</select></td></tr>
          <tr><td>Stok Masuk</td>           <td> : <input type=text name='stok' size=3></td></tr>
		  <tr><td>Tanggal Terima</td>       <td> : <input type=text name='tgl_in' size=3></td></tr>
		  <tr><td>Nomor Nota Pembelian</td> <td> : <input type=text name='no_nota' size=3></td></tr>
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
