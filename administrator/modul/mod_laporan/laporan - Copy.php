<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
   echo "<h2>LAPORAN TRANSAKSI</h2>
          <form method=POST action='modul/mod_laporan/pdf_toko.php' target='_blank'>
          <table>
          <tr><td>Dari Tanggal</td><td> : ";        
          combotgl(1,31,'tgl_mulai',$tgl_skrg);
          combonamabln(1,12,'bln_mulai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);

    echo "</td></tr>
          <tr><td>s/d Tanggal</td><td> : ";
          combotgl(1,31,'tgl_selesai',$tgl_skrg);
          combonamabln(1,12,'bln_selesai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

    echo "</td></tr>
          <tr><td colspan=2><input type=submit class=tombol value=' CETAK LAPORAN '>
          </td></tr>
          </table>
          </form>";
		  
	
	echo "<h2>LAPORAN PENERIMAAN KAS</h2>
          <form method=POST action='modul/mod_laporan/pdf_bayar.php' target='_blank'>
          <table>
          <tr><td>Dari Tanggal</td><td> : ";        
          combotgl(1,31,'tgl_mulai',$tgl_skrg);
          combonamabln(1,12,'bln_mulai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);

    echo "</td></tr>
          <tr><td>s/d Tanggal</td><td> : ";
          combotgl(1,31,'tgl_selesai',$tgl_skrg);
          combonamabln(1,12,'bln_selesai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

    echo "</td></tr>
          <tr><td colspan=2><input type=submit class=tombol value=' CETAK LAPORAN '>
          </td></tr>
          </table>
          </form>";

	
	
	echo "<h2>KARTU PIUTANG</h2>
          <form method=POST action='modul/mod_laporan/pdf_kartu_piutang.php' target='_blank'>
          <table>
          <tr><td>Dari Tanggal</td><td> : ";        
          combotgl(1,31,'tgl_mulai',$tgl_skrg);
          combonamabln(1,12,'bln_mulai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);

    echo "</td></tr>
          <tr><td>s/d Tanggal</td><td> : ";
          combotgl(1,31,'tgl_selesai',$tgl_skrg);
          combonamabln(1,12,'bln_selesai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

    echo "</td></tr>
          <tr><td colspan=2><input type=submit class=tombol value=' CETAK LAPORAN '>
          </td></tr>
          </table>
          </form>";



	//echo "<h2>KARTU PIUTANG PER CUSTOMER</h2>
    //      <form method=POST action='modul/mod_laporan/pdf_kartu_piutang_customer.php' target='_blank'>
    //      <table>
    //      <tr>
		  
	//	  <td> Pilih Customer :
	//	  <select name='id_kustomer' required>
	//	  <option value='' selected>- Pilih Customer -</option>";
   //         $tampil=mysql_query("SELECT * FROM kustomer ORDER BY nama_lengkap ASC");
   //         while($r=mysql_fetch_array($tampil)){
   //           echo "<option value=$r[id_kustomer]>$r[nama_lengkap]</option>";
   //         }
	//echo "</select>
	//	  </td>
	//	  <tr>
	//	  ";      
		    
   // echo "
   //       <tr><td colspan=2><input type=submit class=tombol value=' CETAK LAPORAN '>
   //       </td></tr>
  //        </table>
  //        </form>";
		
		
	echo "<h2>KARTU PERSEDIAAN BARANG</h2>
          <form method=POST action='modul/mod_laporan/pdf_stok_barang.php' target='_blank'>
          <table>
          <tr><td>Dari Tanggal</td><td> : ";        
          combotgl(1,31,'tgl_mulai',$tgl_skrg);
          combonamabln(1,12,'bln_mulai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_mulai',$thn_sekarang);

    echo "</td></tr>
          <tr><td>s/d Tanggal</td><td> : ";
          combotgl(1,31,'tgl_selesai',$tgl_skrg);
          combonamabln(1,12,'bln_selesai',$bln_sekarang);
          combothn(2000,$thn_sekarang,'thn_selesai',$thn_sekarang);

    echo "</td></tr>
          <tr><td colspan=2><input type=submit class=tombol value=' CETAK LAPORAN '>
          </td></tr>
          </table>
          </form>";
	
		


    break;
  

}
?>
