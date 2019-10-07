
<?php
elseif ($_GET['module']=='hasilcari'){
  $kata = trim($_POST['kata']);
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM produk WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "deskripsi LIKE '%$pisah_kata[$i]%' OR nama_produk LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
  $cari .= " ORDER BY id_produk DESC LIMIT 7";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  echo "<div class='center_title_bar'>Hasil Pencarian</div>";

  if ($ketemu > 0){
  echo "<div class='prod_details_cari'>Ditemukan <b>$ketemu</b> produk dengan kata <font style='background-color:#00FFFF'><b>$kata</b></font> : </div>";
    while($t=mysql_fetch_array($hasil)){
      $isi_produk = htmlentities(strip_tags($t['deskripsi'])); 
      $isi = substr($isi_produk,0,250); 
      $isi = substr($isi_produk,0,strrpos($isi," ")); 
    	  echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
          <div class='details_big_cari'>
            <div class='product_title_big'><a href=produk-$t[id_produk]-$t[produk_seo].html>$t[nama_produk]</a></div>
              <div>
              <br />$isi ... <a href=produk-$t[id_produk]-$t[produk_seo].html>selengkapnya</a>
              </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
          </div>";                      
      }        

?>
