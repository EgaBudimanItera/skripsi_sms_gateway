<?php
class Paging{
function cariPosisi($batas){
if(empty($_GET[halaman])){
	$posisi=0;
	$_GET[halaman]=1;
}
else{
	$posisi = ($_GET[halaman]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}


class Paging2{
function cariPosisi($batas){
if(empty($_GET[halproduk])){
	$posisi=0;
	$_GET[halproduk]=1;
}
else{
	$posisi = ($_GET[halproduk]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=halproduk-$i.html>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}


class Paging3{
function cariPosisi($batas){
if(empty($_GET['halkategori'])){
	$posisi=0;
	$_GET['halkategori']=1;
}
else{
	$posisi = ($_GET['halkategori']-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=halkategori-$_GET[id]-$i.html>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}


class Paging4{
function cariPosisi($batas){
if(empty($_GET[halagenda])){
	$posisi=0;
	$_GET[halagenda]=1;
}
else{
	$posisi = ($_GET[halagenda]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=halagenda-$i.html>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}


class Paging5{
function cariPosisi($batas){
if(empty($_GET[haldownload])){
	$posisi=0;
	$_GET[haldownload]=1;
}
else{
	$posisi = ($_GET[haldownload]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=haldownload-$i.html>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}

?>
