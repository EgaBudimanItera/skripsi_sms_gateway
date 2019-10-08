<?php
	session_start();
	error_reporting(0);
	include "../../../config/koneksi.php";
	include "../../../config/library.php";

	$module=$_GET[module];
	$act=$_GET[act];
	$idprod=$_GET[id];

	if ($module=='keranjang' AND $act=='tambah'){
		
		$sql2 = mysql_query("SELECT stok FROM produk WHERE id_produk='$_GET[id]'");

		$r=mysql_fetch_array($sql2);
		
		$stok=$r[stok];

		$sid = session_id();
		if ($stok == 0){
      		echo "stok habis";
  		}
  		else{
			$sql = mysql_query("SELECT id_produk FROM orders_temp
					WHERE id_produk='$_GET[id]' AND id_session='$sid'");
			$ketemu=mysql_num_rows($sql);
			if ($ketemu==0){
				mysql_query("INSERT INTO orders_temp (id_produk, jumlah, id_session, tgl_order_temp, jam_order_temp, stok_temp)
						VALUES ('$_GET[id]', 1, '$sid', '$tgl_sekarang', '$jam_sekarang', '$stok')");
			} else {
				mysql_query("UPDATE orders_temp 
				        SET jumlah = jumlah + 1
						WHERE id_session ='$sid' AND id_produk='$_GET[id]'");		
			}	
			deleteAbandonedCart();
			header('location:../../media.php?module=ordermanual');
		}	
	}

	if($module=="pesan"){
		$sid = session_id();
		$sql = mysql_query("SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
  		$ketemu=mysql_num_rows($sql);
  		if($ketemu < 1){
    		echo "<script>window.alert('Keranjang Belanjanya masih kosong. Silahkan Anda berbelanja terlebih dahulu');
    		
        	</script>";
        	header('location:../../media.php?module=ordermanual');
    	}
  		else{  
  			header('location:../../media.php?module=isipesan');
    	      

		}
	}

	if($module=='keranjang' AND $act=='update'){
		$id       = $_POST[id];
  		$jml_data = count($id);
 	 	$jumlah   = $_POST[jml]; 
 	 	for ($i=1; $i <= $jml_data; $i++){
 	 		$sql2 = mysql_query("SELECT stok_temp FROM orders_temp	WHERE id_orders_temp='".$id[$i]."'");
 	 		while($r=mysql_fetch_array($sql2)){
 	 			if ($jumlah[$i] > $r[stok_temp]){
 	 				echo "<script>window.alert('Jumlah yang dibeli melebihi stok yang ada');
					";
					header('location:../../media.php?module=ordermanual');
 	 			}elseif($jumlah[$i] == 0){
 	 				echo "<script>window.alert('Anda tidak boleh menginputkan angka 0 atau mengkosongkannya!');
					</script>";
					header('location:../../media.php?module=ordermanual');
 	 			}else{
 	 				mysql_query("UPDATE orders_temp SET jumlah = '".$jumlah[$i]."'
						WHERE id_orders_temp = '".$id[$i]."'");
					header('location:../../media.php?module=isipesan');
 	 			}
 	 		}
 	 	}
	}

	if($module=='keranjang' AND $act=='hapus'){
		mysql_query("DELETE FROM orders_temp WHERE id_orders_temp='$_GET[id]'");
		header('location:../../media.php?module=isipesan');	
	}

	if($module=='keranjang' AND $act=='selesai'){
		$nama_kustomer=$_POST[nama_kustomer];
		$alamat=$_POST[alamat];
		$telpon=$_POST[telpon];
		$email=$_POST[email];
		$bayar=$_POST[bayaran];
		$nama_toko=$_POST[nama_toko];

		

		$sid = session_id();
		$sql = mysql_query("SELECT * FROM orders_temp, produk 
			                WHERE id_session='$sid' AND orders_temp.id_produk=produk.id_produk");
		$ketemu=mysql_num_rows($sql);
  		if($ketemu < 1){
   			echo "<script> alert('Keranjang belanja masih kosong');</script>\n";
   			header('location:../../media.php?module=ordermanual');
   	 		exit(0);

		}else{

			$no=1;
  			while($r=mysql_fetch_array($sql)){
     
			    $disc        = ($r[diskon]/100)*$r[harga];
			    $hargadisc   = number_format(($r[harga]-$disc),0,",","."); 
			    $subtotal    = ($r[harga]-$disc) * $r[jumlah];

			    $total       = $total + $subtotal;  
				$kredit      = ($total * 0.2) + $total;
				
			    $subtotalberat = $r['berat'] * $r['jumlah']; 
			    $totalberat  = $totalberat + $subtotalberat; 
			    $no++;   
			    
			}
			
			$tgl_skrg = date("Ymd");
			$jam_skrg = date("H:i:s");

			if($bayar=="CASH"){
				mysql_query("INSERT INTO orders(nama_kustomer, alamat, telpon, email, tgl_order, jam_order, id_kota, total_order, bayar, nama_toko) 
             		VALUES('$nama_kustomer','$alamat','$telpon','$email','$tgl_skrg','$jam_skrg','13', '$total', '$bayar','$nama_toko')");
				
			}else{
				mysql_query("INSERT INTO orders(nama_kustomer, alamat, telpon, email, tgl_order, jam_order, id_kota, total_order, bayar, nama_toko) 
             		VALUES('$nama_kustomer','$alamat','$telpon','$email','$tgl_skrg','$jam_skrg','13', '$kredit', '$bayar','$nama_toko')");
				
			}

			function isi_keranjang(){
				$isikeranjang = array();
				$sid = session_id();
				$sql = mysql_query("SELECT * FROM orders_temp WHERE id_session='$sid'");
				
				while ($r=mysql_fetch_array($sql)) {
					$isikeranjang[] = $r;
				}
				return $isikeranjang;
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

			echo "<script> alert('Proses Transaksi Selesai');window.location='administrator/media.php?module=ordermanual'</script>\n";
		}
	}

	function deleteAbandonedCart(){
		$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
		mysql_query("DELETE FROM orders_temp 
	        WHERE tgl_order_temp < '$kemarin'");
	}
?>