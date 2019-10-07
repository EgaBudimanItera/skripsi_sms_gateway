<script language="javascript">
function validasi(form){
  if (form.nama.value == ""){
    alert("Anda belum mengisikan Nama.");
    form.nama.focus();
    return (false);
  }    
  if (form.alamat.value == ""){
    alert("Anda belum mengisikan Alamat.");
    form.alamat.focus();
    return (false);
  }
  if (form.telpon.value == ""){
    alert("Anda belum mengisikan Telpon.");
    form.telpon.focus();
    return (false);
  }
  if (form.email.value == ""){
    alert("Anda belum mengisikan Email.");
    form.email.focus();
    return (false);
  }
  if (form.jasa.value == 0){
    alert("Anda belum memilih jasa pengiriman barang.");
    form.jasa.focus();
    return (false);
  }
  if (form.kota.value == 0){
    alert("Anda belum mengisikan Kota.");
    form.kota.focus();
    return (false);
  }
    if (form.bank.value == ""){
    alert("lengkapi data konfirmasi.");
    form.bank.focus();
    return (false);
  }

  return (true);
}


function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
    return false;

  return true;
}


$(document).ready(function() {
	$('#jasa').change(function() { 
		var category = $(this).val();
		$.ajax({
			type: 'GET',
			url: 'config/kota.php',
			data: 'perusahaan=' + category, 
			dataType: 'html',
			beforeSend: function() {
				$('#kota').html('<tr><td colspan=2>Loading ....</td></tr>');	
			},
			success: function(response) {
				$('#kota').html(response);
			}
		});
    });
});

</script>

<?php

if ($_GET[module]=='store'){
  	  
		  
  echo "<h4 class='heading colr2'>==========</h4><br />";
  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT 12");
  while ($r=mysql_fetch_array($sql)){
    $harga = format_rupiah($r[harga]);
    $disc     = ($r[diskon]/100)*$r[harga];
    $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
    $stok=$r['stok'];
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
    $tombolhabis="-";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

    $d=$r['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
    $hargadiskon="<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $harga,- <br /></span>&nbsp;<span class='price3'>Diskon $r[diskon]% 
	 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
             <div class='product_img'>
                             <a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'>
               <img src='foto_produk/$r[gambar]' border='0' height=110 width=114  class='tooltip' ></a>
             </div>
             $divharga
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a> 
          </div>
          </div>";
  }
}



elseif ($_GET[module]=='detailproduk'){

	$detail=mysql_query("SELECT * FROM produk,kategori    
                      WHERE kategori.id_kategori=produk.id_kategori 
                      AND id_produk='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);


    $harga = format_rupiah($d[harga]);
    $disc     = ($d[diskon]/100)*$d[harga];
    $hargadisc     = number_format(($d[harga]-$disc),0,",",".");


	echo "<h4 class='heading colr'>Kategori: <a href='kategori-$d[id_kategori]-$d[kategori_seo].html'>$d[nama_kategori]</a></h4></div>";

	echo"<div class='feat_prod_box_details'>";
 	if ($d[gambar]!=''){
		echo "<a href='foto_produk/$d[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$d[nama_produk]'>
		     <img src='foto_produk/$d[gambar]' width=180  class='tooltip'  border='0' rel='clearbox[gallery=Koleksi Produk]' title='$d[nama_produk]'/></a>

                </div>";}
	            echo"<div class='details_big_box'>
            <div class='product_title_big'>$d[nama_produk]</div>
            <div class='details'>$d[deskripsi]</div><br />
                    <div class='table6'>&bull; HARGA: <span class='table7'>Rp. $hargadisc,-</span></div>
			        
                    <div class='table6'>&bull; STOK:<span class='table7'> $d[stok] item</span></div><br />
                    <a href='aksi.php?module=keranjang&act=tambah&id=$d[id_produk]' class='more'><img src='images/beli.gif' alt='' title='' border='0' /></a>
                    <div class='clear'></div>
                    </div>
                    
                    <div class='box_bottom'></div>
                </div> <div class='clear'></div>
            </div><br /> ";

          
          
  $sql=mysql_query("SELECT * FROM produk ORDER BY rand() LIMIT 4");
      
  echo "<h4 class='heading colr'>Produk Lainnya</h4></div>";
      
  while ($r=mysql_fetch_array($sql)){
    $harga = format_rupiah($r[harga]);
    $disc     = ($r[diskon]/100)*$r[harga];
    $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
    $stok=$r['stok'];
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
    $tombolhabis="-";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

    $d=$r['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
    $hargadiskon="<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $harga,- <br /></span>&nbsp;<span class='price3'>Diskon $r[diskon]% 
	 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
             <div class='product_img'>
               <a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'>
               <img src='foto_produk/$r[gambar]' border='0' height=110 width=114  class='tooltip' ></a>
             </div>
             $divharga
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a>            
          </div> 
          </div>";
  }
}


elseif ($_GET[module]=='detailkategori'){
  
  $sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_array($sq);

  echo "<h4 class='heading colr'>Kategori: $n[nama_kategori]</h4></div>";

  
  $p      = new Paging3;
  $batas  = 12;
  $posisi = $p->cariPosisi($batas);

  
 	$sql = mysql_query("SELECT * FROM produk WHERE id_kategori='$_GET[id]' 
            ORDER BY id_produk DESC LIMIT $posisi,$batas");		 
	$jumlah = mysql_num_rows($sql);

	
	if ($jumlah > 0){
  while ($r=mysql_fetch_array($sql)){
    $harga = format_rupiah($r[harga]);
    $disc     = ($r[diskon]/100)*$r[harga];
    $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
    $stok=$r['stok'];
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
    $tombolhabis="-";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

    $d=$r['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
    $hargadiskon="<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $harga,- <br /></span>&nbsp;<span class='price3'>Diskon $r[diskon]% 
	 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
             <div class='product_img'>
               <a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'>
               <img src='foto_produk/$r[gambar]' border='0' height=110 width=114  class='tooltip' ></a>
             </div>
             $divharga
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a>            
          </div> 
          </div>";
  }



  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);

  echo "<div class=halaman>Halaman : $linkHalaman </div><br>";
  }
  else{
    echo "<p align=left><span class='table7'>Belum ada produk pada kategori ini.</p>";
  }
}




if ($_GET['module']=='profilkami'){
 
	$profil = mysql_query("SELECT * FROM modul WHERE id_modul='43'");
	$r      = mysql_fetch_array($profil);

  echo "<h4 class='heading colr'>Profil Kami</h4>
    	  <div class='prod_box_bigx'>
 
            </div>
          <div class='profil'>
              <div>$r[static_content]</div>
			  <div class='bottom_prod_box_big4'></div>
          </div>    
          </div>
          </div>";                             
}


elseif ($_GET['module']=='hasilpoling'){
 echo "<div id='content'>          
          <div id='content-detail'>";
 if (isset($_COOKIE["poling"])) {
   echo "<span class='idtanggal'>Maaf, anda sudah pernah melakukan jajak pendapat ini.";
 }
 else{
  
  
  setcookie("poling", "sudah poling", time() + 3600 * 24);

echo "<h4 class='heading colr'>Hasil Polling</h4></div>";

  echo "<p align=left><span class='pol1'>Terima kasih atas partisipasi anda mengikuti polling kami<br /><br />
       Hasil polling saat ini: </p><br />";
  
  echo "<table width=600px style='border: 1pt dashed #ccc ;padding: 10px;'>";

  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);
  
  $jml_vote=$j[jml_vote];
  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  
  while ($s=mysql_fetch_array($sql)){
  	
  	$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  	$gbr_vote   = $prosentase * 3;

    echo "<tr><td width=200><span class='pol2'>$s[pilihan] ($s[rating]) </td><td> 
          <img src=images/red.jpg width=$gbr_vote height=18 border=0> $prosentase % 
          </td></tr>";  
  }
  echo "</table>
        <p><span class='pol1'>Jumlah Pemilih: <span class='pol2'>$jml_vote</b></p>";
 }
  echo "</div>
    </div>";            
}



elseif ($_GET['module']=='lihatpoling'){
  echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<h4 class='heading colr'>Hasil Polling</h4></div>";

  echo "<p align=left><span class='pol1'>Terima kasih atas partisipasi anda mengikuti polling kami<br /><br />
       Hasil polling saat ini: </p><br />";
  
  echo "<table width=600px style='border: 1pt dashed #ccc ;padding: 10px;'>";

  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);
  
  $jml_vote=$j[jml_vote];
  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  
  while ($s=mysql_fetch_array($sql)){
  	
  	$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  	$gbr_vote   = $prosentase * 3;

    echo "<tr><td width=200><span class='pol2'>$s[pilihan] ($s[rating]) </td><td> 
          <img src=images/red.jpg width=$gbr_vote height=18 border=0> $prosentase % 
          </td></tr>";  
  }
  echo "</table>
        <p><span class='pol1'>Jumlah Pemilih: <span class='pol2'>$jml_vote</b></p>";
  echo "</div>
    </div>";            
}





if ($_GET['module']=='carabeli'){
  
	$cara = mysql_query("SELECT * FROM modul WHERE id_modul='45'");
	$r      = mysql_fetch_array($cara);

  echo "<h4 class='heading colr'>Cara Pembelian</h4>

             <div class='carabeli'>
              <div>$r[static_content]</div>
          </div>    
          </div>
        
			  <div class='bottom_prod_box_big7'></div>
          </div>";                             
}




elseif ($_GET['module']=='semuadownload'){

  echo "<h4 class='heading colr'>Download Katalog</h4>"; 
  $p      = new Paging5;
  $batas  = 20;
  $posisi = $p->cariPosisi($batas);
  
 	$sql = mysql_query("SELECT * FROM download  
                      ORDER BY id_download DESC LIMIT $posisi,$batas");		  
   while($d=mysql_fetch_array($sql)){
      echo "<p class='download'><a href='downlot.php?file=$d[nama_file]'>&bull; $d[judul]</a> <span class='download2'>(didownload: $d[hits]x)</p>";
	 }

	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM download"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[haldownload], $jmlhalaman);

 echo "<div class='halaman'>Halaman : $linkHalaman </div>";
  echo "</div>
    </div>";            
}







elseif ($_GET[module]=='semuaproduk'){
  echo "<h4 class='heading colr'>Semua Produk</h4>";

  $p      = new Paging2;
  $batas  = 16;
  $posisi = $p->cariPosisi($batas);

  $sql=mysql_query("SELECT * FROM produk ORDER BY id_produk DESC LIMIT $posisi,$batas");

  while ($r=mysql_fetch_array($sql)){
    $harga = format_rupiah($r[harga]);
    $disc     = ($r[diskon]/100)*$r[harga];
    $hargadisc     = number_format(($r[harga]-$disc),0,",",".");
    $stok=$r['stok'];
    $tombolbeli="<a class='prod_cart' href=\"aksi.php?module=keranjang&act=tambah&id=$r[id_produk]\">BELI</a>";
    $tombolhabis="-";
      if ($stok!= "0"){
      $tombol=$tombolbeli;
      }else{
      $tombol=$tombolhabis;
      } 

    $d=$r['diskon'];
    $hargatetap="<div class='prod_price'><span class='price'> <br /></span>&nbsp;<span class='price'> Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
    $hargadiskon="<div class='prod_price'><span style='text-decoration:line-through;' class='price'>Rp. $harga,- <br /></span>&nbsp;<span class='price3'>Diskon $r[diskon]% 
	 <br /><span class='price2'>Rp. <b>$hargadisc,-</b></span></div>                        
          </div>";
      if ($d!= "0"){
      $divharga=$hargadiskon;
      }else{
      $divharga=$hargatetap;
      } 

    echo "<div class='prod_box'>
          <div class='top_prod_box'></div> 
          <div class='center_prod_box'>            
             <div class='product_title'><a href='produk-$r[id_produk]-$r[produk_seo].html'>$r[nama_produk]</a></div>
             <div class='product_img'>
               <a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'>
               <img src='foto_produk/$r[gambar]' border='0' height=110 width=114  class='tooltip' ></a>
             </div>
             $divharga
          <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
             <a href='produk-$r[id_produk]-$r[produk_seo].html' class='prod_details'>DETAIL</a>            
          </div> 
          </div>";

  }  
    
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM produk"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halproduk], $jmlhalaman);

  echo "<div class='halaman'>Halaman : $linkHalaman </div>";
}

elseif ($_GET[module]=='keranjangbelanja'){
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  $ketemu=mysql_num_rows($sql);
  if($ketemu < 1){
    echo "<script>window.alert('Keranjang Belanjanya masih kosong. Silahkan Anda berbelanja terlebih dahulu');
        window.location=('index.php')</script>";
    }
  else{  
  
    echo "<h4 class='heading colr'>Keranjang Belanja</h4>
          <form method=post action=aksi.php?module=keranjang&act=update>
		  
		   
	
		  
          <table width=670 border=0 cellpadding=0 cellspacing=1 align=center>
          <tbody>
         <tr  background='images/bg_tab.jpg' align=center height=23><th><span class='table'>No</th><th><span class='table'>Produk</th><th><span class='table'>Nama Produk</th><th><span class='table'>Qty</th>
          <th><span class='table'>Harga</th><th><span class='table'>Sub Total</th><th><span class='table'>Hapus</th></tr>";  
  
  $no=1;
  while($r=mysql_fetch_array($sql)){
    $disc        = ($r[diskon]/100)*$r[harga];
    $hargadisc   = number_format(($r[harga]-$disc),0,",",".");
    $subtotal    = ($r[harga]-$disc) * $r[jumlah];
    $total       = $total + $subtotal;  
    $subtotal_rp = format_rupiah($subtotal);
    $total_rp    = format_rupiah($total);
    $harga       = format_rupiah($r[harga]);
   
    
       echo "<tr background='images/bg_tab2.jpg'  align=center><td><span class='table2'>$no</td><input type=hidden name=id[$no] value=$r[id_orders_temp]>
              <td align=center><a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'><img width=80 class='imgcart' src=foto_produk/$r[gambar]  class='tooltip' ></td>
              <td><span class='table2'>$r[nama_produk]</td>
       			  
              <td><input type=text name='jml[$no]' value=$r[jumlah] size=1 onchange=\"this.form.submit()\" onkeypress=\"return harusangka(event)\"></td>
              <td><span class='table2'>$hargadisc</td>
              <td><span class='table2'>$subtotal_rp</td>
              <td align=center><a href='aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]'><img src=images/kali.png border=0 title=Hapus></a></td>
          </tr>";
    $no++; 
  } 
  echo "<tr><td colspan=5 align=right><br><span class='table3'>Total:</td><td colspan=2><br><span class='table3'>Rp. $total_rp,-</b></td></tr>
        <tr><td colspan=2><br /><a href='index.php'><input style='width: 130px; height: 22px;' class= simplebtn value='LANJUTKAN BELANJA'></a><br /></td>
        <td colspan=4 align=right><br /><a href=selesai-belanja.html><input style='width: 115px; height: 22px;'  class= simplebtn value='SELESAI BELANJA'><br /></td></tr>
        </tbody>
  </table>";
echo "<br /><br /><br /><br /><p>*   Apabila Anda mengubah jumlah (Qty), silahkan isi di kolom QTY <br />
               
              </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big'></div>
           <div class='bottom_prod_box_big3'></div>
          </div>";             

}
}    


elseif ($_GET['module']=='hubungikami'){
  echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<h4 class='heading colr'>Kontak Kami</h4>"; 
  echo "<b> <div class='table5'>Hubungi kami secara online dengan mengisi form di bawah ini:</b>
        <table width=100% style='border: 0pt dashed #0000CC;padding: 10px;'>
        <form action=hubungi-aksi.html method=POST>
        <tr><td><span class='table4'>Nama:</td><td>  <input type=text class='isikoment3' name=nama size=40></td></tr>
        <tr><td><span class='table4'>Email:</td><td>  <input type=text class='isikoment3' name=email size=40></td></tr>
        <tr><td><span class='table4'>Subjek:</td><td>  <input type=text class='isikoment3' name=subjek size=55></td></tr>
        <tr><td valign=top><span class='table4'>Pesan:</td><td><textarea class='isikoment3' name=pesan  style='width: 315px; height: 100px;'></textarea></td></tr>
        <tr><td>&nbsp;</td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td><span class=isikomen>(masukkan 6 kode di atas)<br /><input type=text class='isikoment3' name=kode size=10 maxlength=6><br /></td></tr>
        </td><td colspan=2><p style='padding-top:15px ;'><input style=' width: 85px; height: 23px;' type=submit  class=simplebtn value='KIRIM PESAN'></td></tr>
        </form></table><br />";
  echo "</div>
    <div class='bottom_prod_box_big6'></div>
    </div>";            
}


elseif ($_GET['module']=='hubungiaksi'){
  echo "<div id='content'>          
          <div id='content-detail'>";

$nama=trim($_POST[nama]);
$email=trim($_POST[email]);
$subjek=trim($_POST[subjek]);
$pesan=trim($_POST[pesan]);

if (empty($nama)){
  echo "<span class='table8'>Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
elseif (empty($email)){
  echo "<span class='table8'>Anda belum mengisikan EMAIL<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
elseif (empty($subjek)){
  echo "<span class='table8'>Anda belum mengisikan SUBJEK<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
elseif (empty($pesan)){
  echo "<span class='table8'>Anda belum mengisikan PESAN<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi!</b>";
}
else{
	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){

  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
  echo "<h4 class='heading colr'>Hubungi Kami</h4></span><br />"; 
  echo "<span class='table8'><p align=center><div class='table5'><b>Terima kasih telah menghubungi kami. <br /> Kami akan segera meresponnya.</b></p>";
		}else{
			echo "<span class='table8'>Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
		}
	}else{
		echo "<span class='table8'>Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}
  echo "</div>
<div class='bottom_prod_box_big9'>
    </div>";            
}



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
  $cari .= " ORDER BY id_produk DESC LIMIT 6";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  echo "<h4 class='heading colr'>Hasil Pencarian</h4>";

  if ($ketemu > 0){
  echo "<div class='table3'>Ditemukan <b>$ketemu</b> produk dengan kata <font style='background-color:#D5F1FF'><b>$kata</b></font> <b>:</b> </div>";
    while($t=mysql_fetch_array($hasil)){
      
      $isi_produk = htmlentities(strip_tags($t['deskripsi'])); 
      $isi = substr($isi_produk,0,250); 
      $isi = substr($isi_produk,0,strrpos($isi," ")); 
    	  echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
          <div class='details_big_cari'>
            <div class='product_title_big'><a href=produk-$t[id_produk]-$t[produk_seo].html>$t[nama_produk]</a></div>
            $isi ... <a href=produk-$t[id_produk]-$t[produk_seo].html><span class='table6'>selengkapnya</a>
	
	      </div>
          </div> 
          </div>
          </div>    
          <span class='bottom_prod_box_big_yacari'></div>"; 
      }        
    }                                                          
  else{
    echo "<p><div class='table3'>Tidak ditemukan produk dengan kata <font style='background-color:#D5F1FF'><b>$kata</b></p>
	
	 <div class='bottom_prod_box_big_nocari'></div>";
  }
}

// -->start, Yasir Ali H (www.identikindonesia.com) PT.Herwendi Mitra Teknologi
elseif ($_GET[module]=='login'){
  echo "<h4 class='heading colr'>Form Login Customer</h4>
      <form name=form action=ceek.html method=POST onSubmit=\"return validasi(this)\">
      <table width=650>   
      <tr><td><span class='table4'>Email</td><td>  <input type=text name=email size=30 class='table5' ></td></tr>
      <tr><td><span class='table4'>Password</td><td>  <input type=password name=pass size=30 class='table5' ></td></tr></table><br>";
      echo "<table width=650><tr><td>
          <input style='width: 110px; height: 22px;' type=submit  class= simplebtn value='LOGIN'></td></tr>
      </table>";

}
elseif ($_GET[module]=='yasir_cek'){
$username = $_POST['email'];
$pass     = md5($_POST['pass']);
$login=mysql_query("SELECT * FROM kustomer WHERE email='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

if ($ketemu > 0){
  session_start();  
  $_SESSION[namauser]     = $r[email];
  $_SESSION[namauser]     = $r[email];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[nama_toko]  = $r[nama_toko];
  $_SESSION[alamat]  = $r[alamat];
  $_SESSION[telpon]  = $r[telpon];
  $_SESSION[passuser]     = $r[password];
	$sid_lama = session_id();	
	session_regenerate_id();
	$sid_baru = session_id();

  echo "<script>alert('Selamat Datang $_SESSION[namalengkap]'); window.location = 'media.php?module=store'</script>";
  header('location:media.php?module=store');
}
else{
 echo "<script>alert('Login Gagal, username atau password anda salah'); window.location = 'media.php?module=login'</script>";
}
}
elseif ($_GET[module]=='logout'){
  session_start();
  session_destroy();
  echo "<script>alert('Anda sudah keluar'); window.location = 'media.php?module=store'</script>";

}


elseif ($_GET[module]=='082282999777'){
  echo "<h4 class='heading colr'>Form Pendaftaran Customer</h4>
      <form name=form action=simpan-user.html method=POST onSubmit=\"return validasi(this)\">
      <table width=650>   
	  <tr><td><span class='table4'>Nama Lengkap</td><td>  <input type=text name=nama size=30 class='table5' ></td></tr>
	  <tr><td><span class='table4'>Alamat</td><td>  <input type=text name=alamat size=50 class='table5' ></td></tr>
	  <tr><td><span class='table4'>Email</td><td>  <input type=text name=email size=30 class='table5' ></td></tr>
	  <tr><td><span class='table4'>Telepon</td><td>  <input type=text name=telpon size=20 value='+62' class='table5'></td></tr>   
      <tr><td><span class='table4'>Password</td><td>  <input type=text name=pass size=20 class='table5' ></td></tr>
	  <tr><td><span class='table4'>Nama Toko</td><td>  <input type=text name=nama_toko size=50 class='table5' ></td></tr>
	  </table><br>";
      echo "<table width=650><tr><td>
          <input style='width: 110px; height: 22px;' type=submit  class= simplebtn value='DAFTAR'></td></tr>
      </table>";

}
elseif ($_GET[module]=='poo'){
  echo "<h4 class='heading colr'>Data Order Customer</h4>";
       echo "
          <table width=600 border=1 cellpadding=1 cellspacing=1 align=center>
          <tr background='images/bg_tab3.jpg' align=center height=23>
		  <th><span class='table'>No.Order</th>
		  <th><span class='table'>Nama Konsumen</th>
		  <th><span class='table'>Tgl. Order</th>
		  <th><span class='table'>Total Order</th>
		  <th><span class='table'>Metode Bayar</th>
		  <th><span class='table'>Status Order</th>
		  <th><span class='table'>Bukti Order</th>
		  <th><span class='table'>Detail Cicilan</th>
		  </tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM orders  where nama_kustomer='$_SESSION[namalengkap]' ORDER BY id_orders DESC LIMIT $posisi,$batas");
    $no=0;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_order]);	  
	  $total_order = number_format($r[total_order]);
      echo "<tr height=23>
	            <td align=center>$r[id_orders]</td>
                <td>$r[nama_kustomer]</td>
				<td>$tanggal</td>
                <td>Rp.$total_order</td>";
				if ($r['status_order']=='Order'){
                   echo "<td align=center>$r[bayar]</td>
				         <td align=center>BELUM LUNAS</td>";
				   
				}else{
				
				echo "<td align=center>$r[bayar]</td>
				      <td align=center>$r[status_order]</td>";
				
				}
				
	   echo "		
		        <td align=center><a href=po/poo.php?id_orders=$r[id_orders] target='_blank'><b>Cetak</b></a></td> 
				<td align=center><a href=po/detail.php?id_orders=$r[id_orders] target='_blank'><b>View</b></a></td>
				</tr>";
      $no++;
	  }
 echo "<tr><td colspan=8 align=center>

</td></tr>
</table>";
}
elseif ($_GET[module]=='kepalasayapening'){

  echo "<h4 class='heading colr'>Form Konfirmasi Pembayaran Customer</h4>";
       echo "
          <table width=600 border=1 cellpadding=1 cellspacing=1 align=center>
          <tr background='images/bg_tab3.jpg' align=center height=23><th><span class='table'>No.Order</th><th><span class='table'>Nama Konsumen</th><th><span class='table'>Tgl. Order</th><th><span class='table'>Status Order</th><th><span class='table'>Konfirmasi</th></tr>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil = mysql_query("SELECT * FROM orders  where nama_kustomer='$_SESSION[namalengkap]' and status_order='Order' ORDER BY id_orders DESC LIMIT $posisi,$batas");
    $no=0;
    while($r=mysql_fetch_array($tampil)){
      $tanggal=tgl_indo($r[tgl_order]);	  
      echo "<tr height=23>
	            <td >$r[id_orders]</td>
                <td>$r[nama_kustomer]</td>
				<td>$tanggal</td>
               
                <td align=center>BELUM LUNAS</td>
		        <td align=center><a href=media.php?module=sudahgakpening&id_orders=$r[id_orders]><b>UPLOAD BUKTI</b></a> 
				</tr>";
      $no++;
	  }
 echo "<tr><td colspan=4 align=center>

</td></tr>
</table>";
}
elseif ($_GET[module]=='sudahgakpening'){
    $tampil = mysql_query("SELECT * FROM orders  where id_orders='$_GET[id_orders]' ");
    $ketemu=mysql_fetch_array ($tampil);
	$id_orders   = $ketemu['id_orders'];
	$nama_kustomer   = $ketemu['nama_kustomer'];
	$total_order   = number_format($ketemu['total_order']);

  echo "<h4 class='heading colr'>Form Konfirmasi Pembayaran Customer</h4>
      <form name=form action=konfirmasi.html method=POST enctype='multipart/form-data'>
      <table width=650>   
<tr><td><span class='table4'>ID Order</td><td>  <input type=text name=id_orders size=5 class='table5' value='$id_orders' readonly></td></tr>
<tr><td><span class='table4'>Nama Customer</td><td>  <input type=text name=nama_kustomer size=50 class='table5' value='$nama_kustomer' readonly></td></tr>
<tr><td><span class='table4'>Total Order</td><td>  <input type=text name=total_order size=20 class='table5' value='$total_order' readonly></td></tr>
<tr><td><span class='table4'>&nbsp;</td> <td>  &nbsp;</td></tr>
<tr><td><span class='table4'>Bank Transfer</td><td>  <input type=text name=bank size=30 class='table5' required></td></tr>   
<tr><td><span class='table4'>Nomor Rekening</td><td>  <input type=text name=norek size=30 class='table5' required></td></tr> 
<tr><td><span class='table4'>Pemilik Rekening</td><td>  <input type=text name=pemilik size=30 class='table5' required></td></tr>
<tr><td><span class='table4'>Nominal Transfer</td><td>  <input type=text name=nominal size=30 class='table5' required></td></tr>
<tr><td><span class='table4'>Bukti Transfer</td><td>  <input type=file name='fupload' size=40 class='table5' required></td></tr>
<tr><td><span class='table4'>Keterangan</td><td>  <input type=text name=keterangan size=50 class='table5' required></td></tr>

<tr>
    <td><span class='table4'>Pilihan Bank</td>
	<td>  
	  <select name=bank required>
	  <option value='' selected>Pilihan Bank</option>
	  <option value='Mandiri'>Mandiri - Norek.114.000.456.992.0</option>
	  <option value='BNI'>BNI - Norek.931.2626.1983</option>
	  <option value='BCA'>BCA - Norek.321998069</option>
	  <option value='BRI'>BRI - Norek.112.334.556.7</option>
	  </select>
	</td>
</tr>

</table><br>";
      echo "<table width=650><tr><td>
          <input style='width: 130px; height: 22px;' type=submit  class= simplebtn value='PROSES KONFIRMASI'></td></tr>
      </table>";
}
elseif ($_GET[module]=='simpanuser'){
$nama   = $_POST['nama'];
$alamat = $_POST['alamat'];
$telpon = $_POST['telpon'];
$email = $_POST['email'];
$password=md5($_POST['pass']);
$nama_toko = $_POST['nama_toko'];

mysql_query("INSERT INTO kustomer(nama_lengkap, password, alamat, telpon, email, nama_toko) 
             VALUES('$nama','$password','$alamat','$telpon','$email','$nama_toko')");
			 
			 
 echo "<script>window.alert('Pendaftaran Berhasil,Silahkan LOGIN untuk memulai transaksi')</script>";
 echo "<meta http-equiv='refresh' content='0; url=media.php?module=login'>";

}

elseif ($_GET[module]=='konfirmasi'){
include "config/fungsi_thumb.php";
//if (empty($_POST[id_orders]) || empty($_POST[nama_kustomer]) || empty($_POST[bank]) || empty($_POST[norek]) || empty($_POST[pemilik]) || empty($_POST[nominal]){
//  echo "Data yang Anda isikan belum lengkap<br />
//  	    <a href='konfirmasi.html'><b>Ulangi Lagi</b>";
//}else{
$id_orders   = $_POST['id_orders'];
$nama_kustomer = $_POST['nama_kustomer'];
$bank = $_POST['bank'];
$norek = $_POST['norek'];
$pemilik = $_POST['pemilik'];
$nominal= $_POST['nominal'];
$tgl_konfirmasi = date('Y-m-d');
$keterangan = $_POST['keterangan'];

$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_file   = $_FILES['fupload']['name'];

if (!empty($lokasi_file)){
UploadBukti($nama_file);
mysql_query("INSERT INTO konfirmasi(id_orders,nama_kustomer, bank, norek, pemilik, nominal, gambar, tgl_konfirmasi,keterangan) 
             VALUES('$id_orders','$nama_kustomer','$bank','$norek','$pemilik','$nominal','$nama_file','$tgl_konfirmasi','$keterangan')");
}
  else{
mysql_query("INSERT INTO konfirmasi(id_orders,nama_kustomer, bank, norek, pemilik, nominal, tgl_konfirmasi, keterangan) 
             VALUES('$id_orders','$nama_kustomer','$bank','$norek','$pemilik','$nominal','$tgl_konfirmasi','$keterangan')");
}		  
 echo "<script>window.alert('Terima Kasih Atas Konfirmasinya, Kami akan segera memeriksa data pembayaran anda')</script>";
 echo "<meta http-equiv='refresh' content='0; url=media.php?module=store'>";
//}

}
// -->selesai, Yasir Ali H (www.identikindonesia.com) PT.Herwendi Mitra Teknologi


if ($_GET['module']=='selesaibelanja'){
  $sid = session_id();
  $sql = mysql_query("SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  $ketemu=mysql_num_rows($sql);
  if($ketemu < 1){
   echo "<script> alert('Keranjang belanja masih kosong');window.location='index.php'</script>\n";
   	 exit(0);
	}
	else{


  echo "<h4 class='heading colr'>FORM ORDER CUSTOMER</h4>
      <form name=form action=simpan-transaksi.html method=POST onSubmit=\"return validasi(this)\">
      <table width=650>
      <tr><td><span class='table4'>Nama Customer</td><td>  <input type=text name=nama size=30 class='table5' value='$_SESSION[namalengkap]'></td></tr>
      <tr><td><span class='table4'>Alamat Lengkap</td><td>  <input type=text name=alamat size=70 class='table5' value='$_SESSION[alamat]'></td></tr>
      <tr><td><span class='table4'>Telpon/HP</td><td>  <input type=text name=telpon class='table5' value='$_SESSION[telpon]'></td></tr>
      <tr><td><span class='table4'>Email</td><td>  <input type=text name=email size=30 class='table5' value='$_SESSION[namauser]'></td></tr>
	  <tr><td><span class='table4'>Nama Toko</td><td>  <input type=text name=nama_toko size=30 class='table5' value='$_SESSION[nama_toko]'></td></tr>
	  <tr><td><span class='table4'>Metode Bayar</td>
	  <td>
	  <select name=bayar required>
	  <option value='' selected>Pilih Metode Bayar</option>
	  <option value='CASH'>Cash</option>
	  <option value='CREDIT'>Credit</option>
	  </select>
	  </td>
	  </tr>
      </table>";
		  
     echo "<BR><BR><h4 class='heading colr'>Detail Order/Pesanan Anda</h4>
          <table width=670 border=0 cellpadding=0 cellspacing=1 align=center>
          <tbody>
          <tr background='images/bg_tab.jpg' align=center height=23><th><span class='table'>No</th><th><span class='table'>Nama Produk</th><th><span class='table'>Qty</th>
          <th><span class='table'>Harga</th><th><span class='table'>Sub Total</th></tr>";  
  
  $no=1;
  while($r=mysql_fetch_array($sql)){
     
    $disc        = ($r[diskon]/100)*$r[harga];
    $hargadisc   = number_format(($r[harga]-$disc),0,",","."); 
    $subtotal    = ($r[harga]-$disc) * $r[jumlah];

    $total       = $total + $subtotal;  
	$kredit      = ($total * 0.2) + $total;
	$kredit_rp   = format_rupiah($kredit);
    $subtotal_rp = format_rupiah($subtotal);
    $total_rp    = format_rupiah($total);
    $harga       = format_rupiah($r['harga']);
    $subtotalberat = $r['berat'] * $r['jumlah']; 
    $totalberat  = $totalberat + $subtotalberat;    
    echo "<tr background='images/bg_tab2.jpg' align=center height=23><td><span class='table2'>$no</td><input type=hidden name=id[$no] value=$r[id_orders_temp]>
              <td><span class='table2'>$r[nama_produk]</td>
              <td align=center><span class='table2'>$r[jumlah]</td>
              <td><span class='table2'>$harga</td>
              <td><span class='table2'>$subtotal_rp</td>
          </tr>";
    $no++; 
  }
  echo "<tr>
			
            <td align=right colspan=4><span class='table3'>Total Harga Cash:</td>
			<td align=center><span class='table3'>Rp. $total_rp,- <input type='hidden' name='total_order' value='$total'> </td>
		</tr>	
		<tr>	
			<td align=right colspan=4><span class='table3'>Total Harga Credit:</td>
			<td align=center><span class='table3'>Rp. $kredit_rp,- <input type='hidden' name='total_kredit' value='$kredit'> </td>
		</tr>	
        </tbody></table></div></div></div>
        <div class='bottom_prod_box_big'></div>
        </div>";
    echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
          <div class='center_prod_box_big'>            
          <div class='details_big_cari'><div><table width=520><tr><td><input style='width: 70px; height: 22px;'  class= simplebtn type=button value='KEMBALI' onclick=self.history.back()> 
		  
          <span style='float : right;'><input style='width: 110px; height: 22px;' type=submit  class= simplebtn value='PROSES ORDER'></span></td></tr></table>
          </div></div></div>
        <div class='bottom_prod_box_bigx'></div>
        </div>";        
                 
                               
  }
}      



elseif ($_GET[module]=='simpantransaksi'){
$kar1=strstr($_POST[email], "@");
$kar2=strstr($_POST[email], ".");

if (empty($_POST[nama]) || empty($_POST[alamat]) || empty($_POST[telpon]) || empty($_POST[email]) ){
  echo "Data yang Anda isikan belum lengkap<br />
  	    <a href='selesai-belanja.html'><b>Ulangi Lagi</b>";
}
elseif (!ereg("[a-z|A-Z]","$_POST[nama]")){
  echo "Nama tidak boleh diisi dengan angka atau simbol.<br />
 	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
elseif (strlen($kar1)==0 OR strlen($kar2)==0){
  echo "Alamat email Anda tidak valid, mungkin kurang tanda titik (.) atau tanda @.<br />
 	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
}
else{

function isi_keranjang(){
	$isikeranjang = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM orders_temp WHERE id_session='$sid'");
	
	while ($r=mysql_fetch_array($sql)) {
		$isikeranjang[] = $r;
	}
	return $isikeranjang;
}

$tgl_skrg = date("Ymd");
$jam_skrg = date("H:i:s");

if ($_POST['bayar']=='CASH') {
mysql_query("INSERT INTO orders(nama_kustomer, alamat, telpon, email, tgl_order, jam_order, id_kota, total_order, bayar, nama_toko) 
             VALUES('$_POST[nama]','$_POST[alamat]','$_POST[telpon]','$_POST[email]','$tgl_skrg','$jam_skrg','13', '$_POST[total_order]', '$_POST[bayar]','$_POST[nama_toko]')");
}else{
mysql_query("INSERT INTO orders(nama_kustomer, alamat, telpon, email, tgl_order, jam_order, id_kota, total_order, bayar, nama_toko) 
             VALUES('$_POST[nama]','$_POST[alamat]','$_POST[telpon]','$_POST[email]','$tgl_skrg','$jam_skrg','13', '$_POST[total_kredit]', '$_POST[bayar]','$_POST[nama_toko]')");
}

$id_orders=mysql_insert_id();


$isikeranjang = isi_keranjang();
$jml          = count($isikeranjang);


for ($i = 0; $i < $jml; $i++){
  mysql_query("INSERT INTO orders_detail(id_orders, id_produk, jumlah) 
               VALUES('$id_orders',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");
}
  

for ($i = 0; $i < $jml; $i++) {
  mysql_query("DELETE FROM orders_temp
	  	         WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
}

  echo "<h4 class='heading colr'>Proses Transaksi Selesai</h4>";

    	  echo "<div class='prod_box_big'>
        	<div class='top_prod_box_big'></div>
        <div class='center_prod_box_big'>            
          <div class='details_big_cari'>
              <div>
      Terima Kasih Customer, Data pemesan beserta ordernya adalah sebagai berikut: <br />
      <table>
      <tr><td>Nama           </td><td> : <b>$_POST[nama]</b> </td></tr>
      <tr><td>Alamat Lengkap </td><td> : $_POST[alamat] </td></tr>
      <tr><td>Telpon         </td><td> : $_POST[telpon] </td></tr>
      <tr><td>E-mail         </td><td> : $_POST[email] </td></tr></table><br />
      
      Nomor Order: <b> <span class='table6'>$id_orders</b><br /><br />";

      $daftarproduk=mysql_query("SELECT * FROM orders_detail,produk 
                                 WHERE orders_detail.id_produk=produk.id_produk 
                                 AND id_orders='$id_orders'");

echo "<table width=600 border=0 cellpadding=0 cellspacing=1 align=center>
      <tr background='images/bg_tab3.jpg' align=center height=23>
	  <th><span class='table'>No</th>
	  <th><span class='table'>Nama Produk</th>
	  <th><span class='table'>Qty</th>
	  <th><span class='table'>Harga</th>
	  <th><span class='table'>Sub Total</th></tr>";
      
$pesan="Terimakasih telah melakukan pemesanan online di toko kami<br /><br />  
        Nama: $_POST[nama] <br />
        Alamat: $_POST[alamat] <br/>
        Telpon: $_POST[telpon] <br /><hr />
        
        Nomor Order: $id_orders <br />
        Data order Anda adalah sebagai berikut: <br /><br />";
        
$no=1;
while ($d=mysql_fetch_array($daftarproduk)){
   $subtotalberat = $d[berat] * $d[jumlah];  
   $totalberat  = $totalberat + $subtotalberat; 

  
    $disc        = ($d[diskon]/100)*$d[harga];
    $hargadisc   = number_format(($d[harga]-$disc),0,",","."); 
    $subtotal    = ($d[harga]-$disc) * $d[jumlah];

   $total       = $total + $subtotal;
   $subtotal_rp = format_rupiah($subtotal);    
   $total_rp    = format_rupiah($total);    
   $harga       = format_rupiah($d['harga']);
   

   echo "<tr background='images/bg_tab2.jpg' align=center height=23><td>$no</td><td>$d[nama_produk]</td><td align=center>$d[jumlah]</td><td>Rp. $harga,-</td><td>Rp. $subtotal_rp,-</td></tr>";

   $pesan.="$d[jumlah] $d[nama_produk] -> Rp. $harga -> Subtotal: Rp. $subtotal_rp <br />";
   $no++;
}


//-----------------------------------------------------------------------------
   $k=mysql_fetch_array(mysql_query("SELECT * FROM orders WHERE id_orders='$id_orders'"));
   $bayar = $k['bayar'];
   $pusing = $k['total_order'];
   $pusing_rp = format_rupiah($pusing); 
//------------------------------------------------------------------------------

$ongkos=mysql_fetch_array(mysql_query("SELECT ongkos_kirim FROM kota WHERE id_kota='$_POST[kota]'"));
$ongkoskirim1=$ongkos[ongkos_kirim];
$ongkoskirim = $ongkoskirim1 * $totalberat;

$grandtotal    = $total + $ongkoskirim; 

$ongkoskirim_rp = format_rupiah($ongkoskirim);
$ongkoskirim1_rp = format_rupiah($ongkoskirim1); 
$grandtotal_rp  = format_rupiah($grandtotal);  


echo "<tr><td colspan=4 align=right>Grand Total : Rp. </td><td align=right><b>$pusing_rp</b></td></tr>
	  <tr><td colspan=4 align=right>Metode Bayar: </td><td align=right><b>$bayar</b></td></tr>
      </table>";


//echo "<tr><td colspan=5 align=right>Total : Rp. </td><td align=right><b>$total_rp</b></td></tr>
//	  <tr><td colspan=5 align=right>Total Berat : </td><td align=right><b>$totalberat Kg</b></td></tr>
//      <tr><td colspan=5 align=right>Grand Total : Rp. </td><td align=right><b>$grandtotal_rp</b></td></tr>
//	  <tr><td colspan=5 align=right>Metode Bayar: </td><td align=right><b>$d[bayar]</b></td></tr>
//      </table>";

//if ($bayar='CASH') {

//}else{

//}




$rara=date('Y-m-d');
$n = 30;
$nextN = mktime(0, 0, 0, date("m"), date("d") + $n, date("Y"));
$ning = date("Y-m-d", $nextN);
mysql_query("INSERT INTO sms(no_hp,nama_customer,keterangan,tgl_jto,nominal,tgl_sms,status_sms) VALUES ('$_SESSION[telpon]','$_SESSION[namalengkap]','Total order:','$ning','$grandtotal_rp','$rara','NEW ORDER')");	  
	  
echo "<br /><br /><br /><br />
              <p> - Informasi Nomor Rekening dan Bank Pembayaran Tertera Pada Halaman Utama Website kami.</p>
              <p> - Anda bisa memantau proses order anda lewat menu DATA ORDER yang ada pada sistem kami.</p><br />      
              </div>
          </div>    
          </div>
            <div class='bottom_prod_box_big10'></div>
          </div>";    
		  
}
}

?>
