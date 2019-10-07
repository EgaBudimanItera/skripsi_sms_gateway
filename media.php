<?php 
  error_reporting(0);
  session_start();	
  include "config/koneksi.php";
  include "config/fungsi_indotgl.php";
  include "config/class_paging.php";
  include "config/fungsi_combobox.php";
  include "config/library.php";
  include "config/fungsi_autolink.php";
  include "config/fungsi_rupiah.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title><?php include "dina_titel.php"; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "dina_meta1.php"; ?>">
<meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
<meta http-equiv="Copyright" content="Identik Indonesia">
<meta name="author" content="Yasir Ali Herwendi">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">


<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<!--// Stylesheet //-->
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/contentslider.css" rel="stylesheet" type="text/css" />
<link href="css/default.advanced.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.ad-gallery.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.fancybox-1.3.1.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/slider.css" rel="stylesheet" type="text/css" />
<!--// Javascript //-->
<script type="text/javascript" src="config/jquery.js"></script>
<script type="text/javascript" src="js/clearbox.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.min14.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/anythingslider.js"></script>
<script type="text/javascript" src="js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="js/contentslider.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/jquery.ad-gallery.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type="text/javascript" src="js/thumbgallery.js"></script>
<script type="text/javascript" src="js/eurofurence_500-eurofurence_700.font_9bc22cbd.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>

<script type="text/javascript" src="js/newsticker.js"></script>

<!--[if lte IE 7]>
<script type="text/javascript" src="js/jquery.dropdown.js"></script>
<![endif]-->


<script type="text/javascript" src="js/easy.js"></script>
<script type="text/javascript">
	$(document).ready(function(){		
		$.easy.tooltip();	
});
</script>





<meta charset="UTF-8">

<style type="text/css">
<!--
.style1 {color: #FF6600}
-->
</style>
</head>

<body>
<a name="top"></a>
<div id="wrapper_sec">
	<div id="head">
	  <div class="logo">
        	<a href="index.php"><img src="images/logo.png" alt="" /></a>
      </div>
        <div class="rightnavi">
            <p class="bold right"><a id="various1" href="#"><input style='width: 150px; height: 30px;' class= tombol2 readonly="readonly" ></a></p>
          <div class="clear">
          </div>
      </div>
        <div class="clear"></div>
        <div class="navigation">
          <ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
            <?php               
        $main=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y'");

        while($r=mysql_fetch_array($main)){
	         echo "<li><b><a href='$r[link]'>$r[nama_menu]</a></b>
                    <ul>";
	         $sub=mysql_query("SELECT * FROM submenu, mainmenu  
                            WHERE submenu.id_main=mainmenu.id_main 
                            AND submenu.id_main=$r[id_main]");
	         while($w=mysql_fetch_array($sub)){
              echo " <li class='clear'><b><a href='$w[link_sub]'>$w[nama_sub]</a></b></li>";
	         }
	       echo "</ul>
            </li>";} ?>

          </ul>
  </div></div>
    <div class="clear"></div>
    <div id="crumb">
    	<ul class="left">
        	<li><p>anda berada di:</p></li>
            </ul>
			<ul class="left2">
              <?php include "breadcrumb.php";?>
      
        </ul>
        <ul class="search right"><form method="POST" action="hasil-pencarian.html">
            	<li><input name="kata" type="text" value="cari produk"  class="bar" onClick="value=''" /></li>
                <li><input type="submit" class="go" value="cari" /></li></form>
      </ul>
  </div>
    <div class="clear"></div>
    <div class="rotating_banner">
            	<div class="anythingSlider">
                  <div class="wrapper">
                    <ul>
                    
		
                       <?php
$header=mysql_query("SELECT * FROM header ORDER BY id_header DESC LIMIT 4");
while($b=mysql_fetch_array($header)){
  echo "<li><img width=940 src='header/$b[gambar]'></li>";
  
}?>
                    
                    </ul>
                  </div>
                </div>
  </div>
    <div class="clear"></div>
    <div id="content_sec">
    	<div class="col1">
        
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="images/spacer.gif" width="1" height="20" /></td>
              </tr>
              <tr>
                <td><span class="center_content2"><?php include "tengah.php";?></td>
              </tr>
            </table>
            <div class="clear"></div>
      </div>
    	<div class="col2">
       	  <div class="mycart">
            	<div class="small_heading">
            		<h5>Keranjang Belanja</h5>
                </div>
           
                <table width="81%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="27%">
                    <?php require_once "item.php";?></td>
                    <td width="73%"><img src="images/beli.png" width="50" height="45" /></td>
                  </tr>
                </table>
       	  </div>
            <div class="myaccount">
            	<div class="small_heading">
            		<h5>Kategori Produk </h5>
                </div>
                <ul>
                
                  <?php
            $kategori=mysql_query("select nama_kategori, kategori.id_kategori, kategori_seo,  
                                  count(produk.id_produk) as jml 
                                  from kategori left join produk 
                                  on produk.id_kategori=kategori.id_kategori 
                                  group by nama_kategori");
            $no=1;
            while($k=mysql_fetch_array($kategori)){
              if(($no % 2)==0){
                echo "<li><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] ($k[jml])</a></li>";
              }
              else{
                echo "<li><a href='kategori-$k[id_kategori]-$k[kategori_seo].html'> $k[nama_kategori] ($k[jml])</a></li>";              
              }
              $no++;
            }
            ?></li>
              
                </ul>
            </div>
			

		  
		  
		  
		  <div class="poll">
            	<div class="small_heading">
            		<h5>Bank Pembayaran </h5>
                </div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><div align="center"><span class="border_box">
                      <?php
      $bank=mysql_query("SELECT * FROM mod_bank ORDER BY id_bank ASC");
      while($b=mysql_fetch_array($bank)){
		    echo "<span class='bank'>$a[nama_bank]</a></div>
         <div class='bank'>
             <img src='foto_banner/$b[gambar]' border='0' >
             </a>
         </div>
         <div class='bank'><span class='bank'>No. Rek : $b[no_rekening]
<div class='bank'><span class='bank'>an. $b[pemilik]</span></div>";
      }

        ?>
                    </span></div></td>
                  </tr>
                </table>
          </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
    	</div>
    	<div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div id="footer">
       
        <div class="contactus">
        	<h5>Kontak Kami </h5>
            <ul>
			    <li class="home"><span class="bold">Office:</span> CV.Laut Selatan Jaya </li>
            	<li class="tel"><span class="bold">Mobile:</span> 0822 82 999 777 </li>
                <li class="email"><span class="bold">Email:</span> <a href="mailto:admin@identikindonesia.co.id">admin@lautselatanjaya.com</a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="copyright_network">
        	<p>Copyright ©2019 </p>
            <ul class="network">
               
                <li><a href="#top" class="top">ke atas</a></li>
            </ul>
        </div>
        <div class="clear"></div>
	</div>
</div>

</body>
</html>

