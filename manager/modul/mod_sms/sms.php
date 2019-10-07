<script language="JavaScript">
      function konfirmasi(nama_kustomer) {
        tanya = confirm('Anda yakin ingin menghapus '+ nama_kustomer + '?');
        if (tanya == true) return true;
        else return false;
      }
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#id_kustomer").change(function(){
    var id_kustomer = $("#id_kustomer").val();
    $.ajax({
        url: "yasir1.php",
        data: "id_kustomer=" + id_kustomer,
        success: function(data){
            $("#nama_lengkap").val(data);
        }
    });
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#id_kustomer").change(function(){
    var id_kustomer = $("#id_kustomer").val();
    $.ajax({
        url: "yasir2.php",
        data: "id_kustomer=" + id_kustomer,
        success: function(data){
            $("#telpon").val(data);
        }
    });
  });
});
</script>

<?php
$aksi="modul/mod_sms/aksi_sms.php";
switch($_GET[act]){
  
  default:
    echo "<h2>Data SMS Gateway</h2>
          <input type=button class='tombol' value='Tambah SMS' 
          onclick=\"window.location.href='?module=sms&act=tambahsms';\">
          <table>
          <tr><th>No</th><th>Nomor HP</th><th>Nama Customer</th><th>Keterangan</th><th>Tgl.Jto</th><th>Nominal</th><th>Tgl.SMS</th><th>Status</th><th>Aksi</th></tr>"; 
    $tampil=mysql_query("SELECT * FROM sms ORDER BY tgl_sms ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td>$no</td>
             <td>$r[no_hp]</td>
			 <td>$r[nama_customer]</td>
			 <td>$r[keterangan]</td>
			 <td>$r[tgl_jto]</td>
			 <td>$r[nominal]</td>
			 <td>$r[tgl_sms]</td>
			 <td>$r[status_sms]</td>
             <td><a href=?module=sms&act=editsms&id=$r[id_sms]><b>Edit</b></a> | 
	               <a href=$aksi?module=sms&act=hapus&id=$r[id_sms] onclick=\"return konfirmasi('".$r[nama_kustomer]."')\"><b>Hapus</b></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  
  case "tambahsms":
    echo "<h2>Tambah SMS</h2>
          <form name='form1' method=POST action='$aksi?module=sms&act=input'>
          <table>
          <tr>
		  <td width='70'>Nama :</td>
		  <td> 
		  <select id='id_kustomer' name='id_kustomer'>
            <option value='' selected>- Pilih Customer -</option>";
            $tampil=mysql_query("SELECT * FROM kustomer ORDER BY nama_lengkap ASC");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value='$r[id_kustomer]'>$r[nama_lengkap]</option>";
            }
	echo "</select>
		  </td>
		  </tr>
		  
		  <tr><td width='70'>No.HP</td>     
		  <td> : <input type=hidden id='nama_lengkap' name='nama_lengkap' size=50>
		         <input type=text id='telpon' name='telpon' >
		  </td>
		  </tr>
		  
		  <tr>
		  <td width='70'>Keterangan</td>     
		  <td> : <input type=text id='keterangan' name='keterangan' size=50></td>
		  </tr>
		  
		  <tr>
		  <td width='70'>Tgl.Jto</td>     
		  <td> : 
		  <script language='JavaScript'>
		new tcal ({
			'formname': 'form1',
			'controlname': 'tgl_jto'
		});
		</script>
		<input type=text id='tgl_jto' name='tgl_jto'>
		</td>
		  </tr>
		  
		  <tr>
		  <td width='70'>Nominal</td>     
		  <td> : <input type=text id='nominal' name='nominal'></td>
		  </tr>
		  
		  <tr>
		  <td width='70'>Tgl SMS</td>     
		  <td> : 
		  <script language='JavaScript'>
		new tcal ({
			'formname': 'form1',
			'controlname': 'tgl_sms'
		});
		</script>
		<input type=text id='tgl_sms' name='tgl_sms'>
		</td>
		  </tr>
		  
          <tr><td colspan=2><input type=submit name=submit class='tombol'  value=Simpan>
                            <input type=button class='tombol'  value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
  
   
  case "editsms":
    $edit=mysql_query("SELECT * FROM sms WHERE id_sms='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit SMS</h2>
          <form name='form1' method=POST action=$aksi?module=sms&act=update>
          <input type=hidden name=id value='$r[id_sms]'>
          <table>
		  
		  
		  <tr>
		  <td width='70'>Nama :</td>
		  <td> 
		  <select id='id_kustomer' name='id_kustomer'>
            <option value='$r[nama_customer]' selected>$r[nama_customer]</option>";
            $tampil=mysql_query("SELECT * FROM kustomer ORDER BY nama_lengkap ASC");
            while($rx=mysql_fetch_array($tampil)){
              echo "<option value='$rx[id_kustomer]'>$rx[nama_lengkap]</option>";
            }
	echo "</select>
		  </td>
		  </tr>
		  
		  <tr><td width='70'>No.HP</td>     
		  <td> : <input type=hidden id='nama_lengkap' name='nama_lengkap' size=50 value='$r[nama_customer]'>
		         <input type=text id='telpon' name='telpon' value='$r[no_hp]' >
		  </td>
		  </tr>
		  
		  <tr>
		  <td width='70'>Keterangan</td>     
		  <td> : <input type=text id='keterangan' name='keterangan' size=50 value='$r[keterangan]'></td>
		  </tr>
		  
		  <tr>
		  <td width='70'>Tgl.Jto</td>     
		  <td> : 
		  <script language='JavaScript'>
		new tcal ({
			'formname': 'form1',
			'controlname': 'tgl_jto'
		});
		</script>
		<input type=text id='tgl_jto' name='tgl_jto' value='$r[tgl_jto]'>
		</td>
		  </tr>
		  
		  <tr>
		  <td width='70'>Nominal</td>     
		  <td> : <input type=text id='nominal' name='nominal' value='$r[nominal]'></td>
		  </tr>
		  
		  <tr>
		  <td width='70'>Tgl SMS</td>     
		  <td> : 
		  <script language='JavaScript'>
		new tcal ({
			'formname': 'form1',
			'controlname': 'tgl_sms'
		});
		</script>
		<input type=text id='tgl_sms' name='tgl_sms' value='$r[tgl_sms]'>
		</td>
		  </tr>
		  
		  
          <tr><td colspan=2><input type=submit class='tombol' value=Update>
                            <input type=button class='tombol' value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
?>
