<?php
include "../config/koneksi.php";
$id_kustomer = $_GET["id_kustomer"];
$sql = mysql_query("SELECT * FROM kustomer WHERE id_kustomer='$id_kustomer'");
while($r = mysql_fetch_array($sql)){
    echo "$r[nama_lengkap]";
}
?>
