<?php
include_once("estilizar.php");
include_once("main/post.php");
function titulo(){}
function descripcion(){}
function keywords(){}
function script(){}
function pageheader(){
$category=getcategoria(getnifcategoria($_GET["id"]));
if($category["padre"]==0){
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


echo "<div style='padding:20px;'>";
$id=$category["id"];
$c=getcategoria($id);
echo "<h1 style='text-align:left;color:#d4536e;'>".$c["nombre"]."</h1><br/>";
echo "<div>";
$s=query("select * from categoria where padre=".$id." order by orden asc");
foreach($s as $sub){
echo "<div style='margin-right:-40px;font-size:14px;width:180px;float:left;text-align:left;'><b>";
echo "<a  
style='font-size:11px;color:#a6d514;' 
href='/sub-"
.str_replace("&eacute;","e",
str_replace("&oacute;","o",
str_replace("&iacute;","i",
str_replace("&aacute;","a",
str_replace("&uacute;","u",
str_replace("&ntilde;","n",
str_replace(" ","-",
str_replace("ñ","n",
$c["nombre"])))))))).
"/".$sub["id"]."/"
.str_replace("&eacute;","e",
str_replace("&oacute;","o",
str_replace("&iacute;","i",
str_replace("&ntilde;","n",
str_replace("&aacute;","a",
str_replace("&uacute;","u",
str_replace("ñ","n",
str_replace(" ","-",
$sub["nombre"])))))))).
".html'>";
echo $sub["nombre"];
echo "</a>";
echo "</b></div>";
}
echo "</div>";
echo "</div>";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}else{
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "<div style='padding-top:20px;padding-left:20px;padding-bottom:10px;'>";

$id=$category["id"];
$c=getcategoria($id);
$p=getcategoria($c["padre"]);

echo "<h1 style='text-align:left;'>Volver a ";
echo $p["nombre"];
echo "</h1><br/>";

echo "<div>";
$s=query("select * from categoria where padre=".$c["padre"]." order by orden asc");
foreach($s as $sub){
echo "<div style='margin-right:-40px;font-size:14px;width:180px;float:left;text-align:left;'><b>";

if($sub["id"] != $id){
echo "<a 
style='font-size:11px;color:#a6d514;' 
href='/sub-"
.str_replace("&eacute;","e",
str_replace("&oacute;","o",
str_replace("&iacute;","i",
str_replace("&aacute;","a",
str_replace("&uacute;","u",
str_replace("&ntilde;","i",
str_replace("ñ","n",
str_replace(" ","-",
$p["nombre"])))))))).
"/".$sub["id"]."/"
.str_replace("&eacute;","e",
str_replace("&oacute;","o",
str_replace("&iacute;","i",
str_replace("&ntilde;","n",
str_replace("&aacute;","a",
str_replace("&uacute;","u",
str_replace(" ","-",
str_replace("ñ","n",
$sub["nombre"])))))))).
".html'>";
echo $sub["nombre"];
echo "</a>";
}else{
echo "<font style='font-size:11px;color:#d4536e;'>".$sub["nombre"]."</font>";
}

echo "</b></div>";
}
echo "</div>";
echo "</div>";




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}





}
function pagecontent(){

generate($_GET["id"]);

}
function pageside(){}







?>
