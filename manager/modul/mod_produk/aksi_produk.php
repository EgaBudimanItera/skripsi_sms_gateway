<?php
session_start();
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
include "../../../config/fungsi_seo.php";
$module=$_GET[module];
$act=$_GET[act];
if ($module=='produk' AND $act=='hapus'){
  mysql_query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='produk' AND $act=='input'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  $produk_seo      = seo_title($_POST[nama_produk]);
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);
    mysql_query("INSERT INTO produk(nama_produk,
                                    produk_seo,
                                    id_kategori,
                                    berat,
                                    harga,
									diskon,
                                    stok,
                                    deskripsi,
                                    tgl_masuk,
                                    gambar,
									kode_produk) 
                            VALUES('$_POST[nama_produk]',
                                   '$produk_seo',
                                   '$_POST[kategori]',
                                   '$_POST[berat]',
                                   '$_POST[harga]',
								   '$_POST[diskon]',
                                   '$_POST[stok]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang',
                                   '$nama_file_unik',
								   '$_POST[kode_produk]')");
  }
  else{
    mysql_query("INSERT INTO produk(nama_produk,
                                    produk_seo,
                                    id_kategori,
                                    berat,
                                    harga,
									diskon
                                    stok,
                                    deskripsi,
                                    tgl_posting,
									kode_produk) 
                            VALUES('$_POST[nama_produk]',
                                   '$produk_seo',
                                   '$_POST[kategori]',
                                   '$_POST[berat]',                                 
                                   '$_POST[harga]',
								   '$_POST[diskon]',
                                   '$_POST[stok]',
                                   '$_POST[deskripsi]',
                                   '$tgl_sekarang',
								   '$_POST[kode_produk]')");
  }
  header('location:../../media.php?module='.$module);
}
elseif ($module=='produk' AND $act=='update'){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 
  $produk_seo      = seo_title($_POST[nama_produk]);
  if (empty($lokasi_file)){
    mysql_query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   berat       = '$_POST[berat]',
                                   harga       = '$_POST[harga]',
								   diskon      = '$_POST[diskon]',
                                   stok        = '$_POST[stok]',
                                   deskripsi   = '$_POST[deskripsi]',
								   kode_produk = '$_POST[kode_produk]'
                             WHERE id_produk   = '$_POST[id]'");
  }
  else{
    UploadImage($nama_file_unik);
    mysql_query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                   produk_seo  = '$produk_seo', 
                                   id_kategori = '$_POST[kategori]',
                                   berat       = '$_POST[berat]',
                                   harga       = '$_POST[harga]',
                                   diskon      = '$_POST[diskon]',
								   stok        = '$_POST[stok]',
                                   deskripsi   = '$_POST[deskripsi]',
                                   gambar      = '$nama_file_unik'   ,
								   kode_produk = '$_POST[kode_produk]'
                             WHERE id_produk   = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
elseif ($module=='produk' AND $act=='updatee'){
    mysql_query("UPDATE produk SET stok        = stok+'$_POST[stok]' 
                             WHERE id_produk   = '$_POST[id]'");
    mysql_query("INSERT INTO produk_in(id_produk,
                                    jml_in,
                                    tgl_in) 
                            VALUES('$_POST[id]',
                                   '$_POST[stok]',
                                   '$tgl_sekarang')");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='produk' AND $act=='updaatee'){
    mysql_query("UPDATE produk SET stok        = stok+'$_POST[stok]' 
                             WHERE id_produk   = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
