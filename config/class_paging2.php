<?php
class Paging{
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1><< First</a> | 
                    <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$prev>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev | ";
}

$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$next>Next ></a> | 
                     <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}


class Paging10{
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1&kata=$_GET[kata]><< First</a> | 
                    <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$prev&kata=$_GET[kata]>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev | ";
}

$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i&kata=$_GET[kata]>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i&kata=$_GET[kata]>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman&kata=$_GET[kata]>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$next&kata=$_GET[kata]>Next ></a> | 
                     <a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman&kata=$_GET[kata]>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}

class paging2{
function cariPosisi($batas){
if(empty($_GET[halberita])){
	$posisi=0;
	$_GET[halberita]=1;
}
else{
	$posisi = ($_GET[halberita]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";


if ($halaman_aktif > 1)
{
$link_halaman .= "<span class=prevnext><a href=halberita-1.html>&laquo; First</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; First</span> ";
}
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<span class=prevnext><a href=halberita-$previous.html>&laquo; Prev</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; Previous</span> ";
}

$angka =($halaman_aktif > 3?"<a href=halberita-1.html>1</a>...":""); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	$angka .= "<a href=halberita-$i.html>$i</a></span>";
  }
	$angka .= "<span class=current>$halaman_aktif</span>";
for($i=$halaman_aktif + 1; $i < ($halaman_aktif + 3); $i++){
if($i > $jmlhalaman)
break;
	$angka .="<a href=halberita-$i.html>$i</a>";
}
	$angka .=($halaman_aktif+2<$jmlhalaman?"...<a href=halberita-$jmlhalaman.html>$jmlhalaman</a>":"");
	
$link_halaman .= "$angka";
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= " | <span class=prevnext><a href=halberita-$next.html>Next &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Next &raquo;</span> ";
}
if (($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0))
{
$link_halaman .= " | <span class=prevnext><a href=halberita-$jmlhalaman.html>Last &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Last &raquo;</span> ";
}
return $link_halaman;
}
}


class paging3{
function cariPosisi($batas){
if(empty($_GET[halkategori])){
	$posisi=0;
	$_GET[halkategori]=1;
}
else{
	$posisi = ($_GET[halkategori]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";


if ($halaman_aktif > 1)
{
$link_halaman .= "<span class=prevnext><a href=halkategori-$_GET[id]-1.html>&laquo; First</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; First</span> ";
}
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<span class=prevnext><a href=halkategori-$_GET[id]-$previous.html>&laquo; Prev</a></span>| ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; Previous</span> ";
}

$angka =($halaman_aktif > 3?"<a href=halkategori-$_GET[id]-1.html>1</a>...":""); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	$angka .= "<a href=halkategori-$_GET[id]-$i.html>$i</a></span>";
  }
	$angka .= "<span class=current>$halaman_aktif</span>";
for($i=$halaman_aktif + 1; $i < ($halaman_aktif + 3); $i++){
if($i > $jmlhalaman)
break;
	$angka .="<a href=halkategori-$_GET[id]-$i.html>$i</a>";
}
	$angka .=($halaman_aktif+2<$jmlhalaman?"...<a href=halkategori-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a>":"");
	
$link_halaman .= "$angka";
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= " | <span class=prevnext><a href=halkategori-$_GET[id]-$next.html>Next &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Next &raquo;</span> ";
}
if (($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0))
{
$link_halaman .= " | <span class=prevnext><a href=halkategori-$_GET[id]-$jmlhalaman.html>Last &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Last &raquo;</span> ";
}
return $link_halaman;
}
}


class paging4{
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


if ($halaman_aktif > 1)
{
$link_halaman .= "<span class=prevnext><a href=halagenda-1.html>&laquo; First</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; First</span> ";
}
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<span class=prevnext><a href=halagenda-$previous.html>&laquo; Prev</a></span>| ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; Previous</span> ";
}

$angka =($halaman_aktif > 3?"<a href=halagenda-1.html>1</a>-":""); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	$angka .= "<a href=halagenda-$i.html>$i</a></span>";
  }
	$angka .= "<span class=current>$halaman_aktif</span>";
for($i=$halaman_aktif + 1; $i < ($halaman_aktif + 3); $i++){
if($i > $jmlhalaman)
break;
	$angka .="<a href=halagenda-$i.html>$i</a>";
}
	$angka .=($halaman_aktif+2<$jmlhalaman?"...<a href=halagenda-$jmlhalaman.html>$jmlhalaman</a>":"");
	
$link_halaman .= "$angka";
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= " | <span class=prevnext><a href=halagenda-$next.html>Next &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Next &raquo;</span> ";
}
if (($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0))
{
$link_halaman .= " | <span class=prevnext><a href=halagenda-$jmlhalaman.html>Last &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Last &raquo;</span> ";
}
return $link_halaman;
}
}


class paging5{
function cariPosisi($batas){
if(empty($_GET[halberita])){
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


if ($halaman_aktif > 1)
{
$link_halaman .= "<span class=prevnext><a href=haldownload-1.html>&laquo; First</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; First</span> ";
}
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<span class=prevnext><a href=haldownload-$previous.html>&laquo; Prev</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; Previous</span> ";
}

$angka =($halaman_aktif > 3?"<a href=haldownload-1.html>1</a>...":""); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	$angka .= "<a href=haldownload-$i.html>$i</a></span>";
  }
	$angka .= "<span class=current>$halaman_aktif</span>";
for($i=$halaman_aktif + 1; $i < ($halaman_aktif + 3); $i++){
if($i > $jmlhalaman)
break;
	$angka .="<a href=haldownload-$i.html>$i</a>";
}
	$angka .=($halaman_aktif+2<$jmlhalaman?"...<a href=haldownload-$jmlhalaman.html>$jmlhalaman</a>":"");
	
$link_halaman .= "$angka";
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= " | <span class=prevnext><a href=haldownload-$next.html>Next &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Next &raquo;</span> ";
}
if (($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0))
{
$link_halaman .= " | <span class=prevnext><a href=haldownload-$jmlhalaman.html>Last &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Last &raquo;</span> ";
}
return $link_halaman;
}
}


class paging6{
function cariPosisi($batas){
if(empty($_GET[halgaleri])){
	$posisi=0;
	$_GET[halgaleri]=1;
}
else{
	$posisi = ($_GET[halgaleri]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";


if ($halaman_aktif > 1)
{
$link_halaman .= "<span class=prevnext><a href=halgaleri-$_GET[id]-1.html>&laquo; First</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; First</span> ";
}
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<span class=prevnext><a href=halgaleri-$_GET[id]-$previous.html>&laquo; Prev</a></span>| ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; Previous</span> ";
}

$angka =($halaman_aktif > 3?"<a href=halgaleri-$_GET[id]-1.html>1</a>...":""); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	$angka .= "<a href=halgaleri-$_GET[id]-$i.html>$i</a></span>";
  }
	$angka .= "<span class=current>$halaman_aktif</span>";
for($i=$halaman_aktif + 1; $i < ($halaman_aktif + 3); $i++){
if($i > $jmlhalaman)
break;
	$angka .="<a href=halgaleri-$_GET[id]-$i.html>$i</a>";
}
	$angka .=($halaman_aktif+2<$jmlhalaman?"...<a href=halgaleri-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a>":"");
	
$link_halaman .= "$angka";
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= " | <span class=prevnext><a href=halgaleri-$_GET[id]-$next.html>Next &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Next &raquo;</span> ";
}
if (($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0))
{
$link_halaman .= " | <span class=prevnext><a href=halgaleri-$_GET[id]-$jmlhalaman.html>Last &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Last &raquo;</span> ";
}
return $link_halaman;
}
}

class Paging7{
function cariPosisi($batas){
if(empty($_GET[halpencarian])){
	$posisi=0;
	$_GET[halpencarian]=1;
}
else{
	$posisi = ($_GET[halpencarian]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($ketemu2, $batas){
$jmlhalaman = ceil($ketemu2/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=halpencarian-hal-$i.html>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}


class paging8{
function cariPosisi($batas){
if(empty($_GET[halhadits])){
	$posisi=0;
	$_GET[halhadits]=1;
}
else{
	$posisi = ($_GET[halhadits]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";


if ($halaman_aktif > 1)
{
$link_halaman .= "<span class=prevnext><a href=halhadits-1.html>&laquo; First</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; First</span> ";
}
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<span class=prevnext><a href=halhadits-$previous.html>&laquo; Prev</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; Previous</span> ";
}

$angka =($halaman_aktif > 3?"<a href=halhadits-1.html>1</a>...":""); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	$angka .= "<a href=halhadits-$i.html>$i</a></span>";
  }
	$angka .= "<span class=current>$halaman_aktif</span>";
for($i=$halaman_aktif + 1; $i < ($halaman_aktif + 3); $i++){
if($i > $jmlhalaman)
break;
	$angka .="<a href=halhadits-$i.html>$i</a>";
}
	$angka .=($halaman_aktif+2<$jmlhalaman?"...<a href=halhadits-$jmlhalaman.html>$jmlhalaman</a>":"");
	
$link_halaman .= "$angka";
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= " | <span class=prevnext><a href=halhadits-$next.html>Next &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Next &raquo;</span> ";
}
if (($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0))
{
$link_halaman .= " | <span class=prevnext><a href=halhadits-$jmlhalaman.html>Last &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Last &raquo;</span> ";
}
return $link_halaman;
}
}

class paging9{
function cariPosisi($batas){
if(empty($_GET[halkomentar])){
	$posisi=0;
	$_GET[halkomentar]=1;
}
else{
	$posisi = ($_GET[halkomentar]-1) * $batas;
}
return $posisi;
}

function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";


if ($halaman_aktif > 1)
{
$link_halaman .= "<span class=prevnext><a href=halkomentar-$_GET[id]-1.html>&laquo; Last</a></span> | ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; Last</span> ";
}
if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<span class=prevnext><a href=halkomentar-$_GET[id]-$previous.html>&laquo; Prev</a></span>| ";
}
else{ 
	 $link_halaman.= "<span class=disabled>&laquo; Previous</span> ";
}

$angka =($halaman_aktif > 3?"<a href=halkomentar-$_GET[id]-1.html>1</a>...":""); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	$angka .= "<a href=halkomentar-$_GET[id]-$i.html>$i</a></span>";
  }
	$angka .= "<span class=current>$halaman_aktif</span>";
for($i=$halaman_aktif + 1; $i < ($halaman_aktif + 3); $i++){
if($i > $jmlhalaman)
break;
	$angka .="<a href=halkomentar-$_GET[id]-$i.html>$i</a>";
}
	$angka .=($halaman_aktif+2<$jmlhalaman?"...<a href=halkomentar-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a>":"");
	
$link_halaman .= "$angka";
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= " | <span class=prevnext><a href=halkomentar-$_GET[id]-$next.html>Next &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>Next &raquo;</span> ";
}
if (($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0))
{
$link_halaman .= " | <span class=prevnext><a href=halkomentar-$_GET[id]-$jmlhalaman.html>First &raquo;</a></span> ";
}
else{ 
	 $link_halaman.= "<span class=disabled>First &raquo;</span> ";
}
return $link_halaman;
}
}

?>