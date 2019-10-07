<?php
if (isset($_GET['id'])){
    $sql = mysql_query("select nama_produk from produk where id_produk='$_GET[id]'");
    $j   = mysql_fetch_array($sql);
    if ($j) {
        echo "$j[nama_produk]";
    } else
		echo "CV.Laut Selatan Jaya";
}
else{
		echo "CV.Laut Selatan Jaya";
}

?>
