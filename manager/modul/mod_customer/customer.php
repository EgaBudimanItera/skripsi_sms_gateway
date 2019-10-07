
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
      function konfirmasi(nama_lengkap) {
        tanya = confirm('Anda yakin ingin menghapus '+ nama_lengkap + '?');
        if (tanya == true) return true;
        else return false;
      }
   </script>
<?php
session_start();

?>



<?

$aksi="modul/mod_customer/aksi_customer.php";
$module=$_GET['module'];

switch($_GET['act']){
  
  default:
    echo "<h2>Data Customer</h2>
          ";
    
            
            
              echo"<table>
              <tr><th>No</th><th>Nama Customer</th><th>email</th><th>Telepon</th><th>Aksi</th></tr>"; 
        $tampil=mysql_query("SELECT * FROM kustomer ORDER BY nama_lengkap ASC");
        $no=1;
        while ($r=mysql_fetch_array($tampil)){
            
           
           
            
           echo "<tr ><td>$no</td>
                 <td>$r[nama_lengkap]</td>
				 <td>$r[email]</td>
				 <td>$r[telpon]</td>
                 <td> | 
    	               <a href=$aksi?module=$module&act=hapus&id=$r[id_kustomer] onclick=\"return konfirmasi('".$r[nama_lengkap]."')\"><b>Hapus</b></a>
                 </td></tr>";
          $no++;
        }
      echo "</table>";
    break;
  
  
  
}
?>
