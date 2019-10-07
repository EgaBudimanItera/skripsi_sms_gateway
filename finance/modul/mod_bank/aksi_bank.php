<?php
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";

$module=$_GET[module];
$act=$_GET[act];


if ($module=='bank' AND $act=='hapus'){
  mysql_query("DELETE FROM mod_bank WHERE id_bank='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}


elseif ($module=='bank' AND $act=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  
  if (!empty($lokasi_file)){
    UploadBanner($nama_file);
    mysql_query("INSERT INTO mod_bank(nama_bank,
                                    no_rekening,
                                    pemilik,
                                    gambar) 
                            VALUES('$_POST[nama_bank]',
                                   '$_POST[no_rekening]',
                                   '$_POST[pemilik]',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO mod_bank(nama_bank,
                                    no_rekening,
                                    pemilik) 
                            VALUES($_POST[nama_bank]',
                                   '$_POST[no_rekening]',
                                   '$_POST[pemilik]')");
  }
  header('location:../../media.php?module='.$module);
}


elseif ($module=='bank' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

 
  if (empty($lokasi_file)){
    mysql_query("UPDATE mod_bank SET nama_bank     = '$_POST[nama_bank]',
                                   no_rekening       = '$_POST[no_rekening]',
                                   pemilik       = '$_POST[pemilik]'                                   
                             WHERE id_bank = '$_POST[id]'");
  }
  else{
    UploadBanner($nama_file);
    mysql_query("UPDATE mod_bank SET nama_bank     = '$_POST[nama_bank]',
                                   no_rekening       = '$_POST[no_rekening]',
                                   pemilik       = '$_POST[pemilik]',
                                   gambar       = '$nama_file'
                             WHERE id_banner = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
?>
