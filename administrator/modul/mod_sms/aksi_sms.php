<?php
session_start();
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='sms' AND $act=='hapus'){
  mysql_query("DELETE FROM sms WHERE id_sms='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='sms' AND $act=='input'){
  mysql_query("INSERT INTO sms(no_hp,nama_customer,keterangan,tgl_jto,nominal,tgl_sms,status_sms) VALUES('$_POST[telpon]','$_POST[nama_lengkap]','$_POST[keterangan]','$_POST[tgl_jto]','$_POST[nominal]','$_POST[tgl_sms]','Terjadwal')");
  header('location:../../media.php?module='.$module);
}

elseif ($module=='sms' AND $act=='update'){
  mysql_query("UPDATE sms SET no_hp = '$_POST[telpon]', 
                              nama_customer = '$_POST[nama_lengkap]',
							  keterangan = '$_POST[keterangan]',
							  tgl_jto = '$_POST[tgl_jto]',
							  nominal = '$_POST[nominal]',
							  tgl_sms = '$_POST[tgl_sms]'
                              WHERE id_sms = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
