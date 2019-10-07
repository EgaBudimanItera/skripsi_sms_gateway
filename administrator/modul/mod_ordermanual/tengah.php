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
                             <a href='produk-$r[id_produk]-$r[produk_seo].html'><a href='../foto_produk/$r[gambar]' rel='clearbox[gallery=Koleksi Produk]' title='$r[nama_produk]'>
               <img src='../foto_produk/$r[gambar]' border='0' height=110 width=114  class='tooltip' ></a>
             </div>
             $divharga
         <div class='bottom_prod_box'></div>
          <div class='prod_details_tab'>
             $tombol            
           
          </div>
          </div>";
     

  }
?>
