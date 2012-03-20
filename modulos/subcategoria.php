<?php
include_once("estilizar.php");
include_once("main/post.php");
function titulo(){}
function descripcion(){}
function keywords(){}
function script(){}
function pageheader(){
echo "<div style='padding-top:20px;padding-left:20px;padding-bottom:10px;'>";

$id=$_GET["id"];
$c=getcategoria($id);
$p=getcategoria($c["padre"]);

echo "<h1 id='volversubcat' style='text-align:left;'>Volver a ";
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
str_replace("&ntilde;","i",
str_replace("ñ","n",
str_replace(" ","-",
$p["nombre"])))))).
"/".$sub["id"]."/"
.str_replace("&eacute;","e",
str_replace("&oacute;","o",
str_replace("&iacute;","i",
str_replace("&ntilde;","n",
str_replace(" ","-",
str_replace("ñ","n",
$sub["nombre"])))))).
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
}
function pagecontent(){
//echo "<br/><br/><br/>";
$main=0;
$post=query("select nif.id as nif from nif,relniftags,niftags where niftags.tag='main' 
and relniftags.tag=niftags.id and relniftags.nif=nif.id and nif.categoria=".$_GET["id"]);
if(isset($post[0]["nif"])){
generate($post[0]["nif"]);$main=$post[0]["nif"];}
$id=$_GET["id"];
$pag=$_GET["pag"];
$c=getcategoria($id);
$post=query("select distinct nif.id as nif from nif where not nif.id=".$main."
 and nif.categoria=".$_GET["id"]
." limit ".($pag * 15).",".($pag + 15)." "
);
/*
echo "select distinct nif.id as nif from nif where not nif.id=".$main."
 and nif.categoria=".$_GET["id"]
." limit ".($pag * 15).",".( ($pag * 15) + 15)." ";
*/
//var_dump($_GET);
echo "<div style='text-align:center;padding:10px;'>";
$num=mysql_num_rows(mysql_query("select distinct nif.id as nif from nif where not nif.id=".$main."
and nif.categoria=".$_GET["id"]));
$sobra=$num%15;
$num=($num - $sobra) / 15;
if($sobra > 0)$num++;

for($i=1 ; $i <= $num ; $i++){
	if($i - 1 != 0) $print="_".($i - 1); else $print="";
	if($i - 1 != $pag){
		echo "<a href='http://".$_SERVER['SERVER_NAME'].preg_replace("/.html_[0-9]+/",".html",$_SERVER['REQUEST_URI']).$print."'>".$i."</a>";
	}else{
		echo "".$i."";
	}
	if($i != $num)echo " - ";
}

echo "</div>";



//echo "<pre>";
foreach($post as $p){

$titulo=getniftitulo($p["nif"]);
$titulo=gettitulo($titulo);
$texto=str_replace(" ","-",$titulo["texto"]);
$texto=str_replace(".","-",$texto);
$texto=str_replace("ñ","n",$texto);
$texto=str_replace("&ntilde;","n",$texto);
echo "<a href='/".$c["nombre"]."/post/".$p["nif"]."/".$texto.".html' style='padding-left:10px;'>";
echo $titulo["texto"];
echo "</a><br/><br/>";
//var_dump($post);
}
//echo "</pre>";

echo "<div style='text-align:center;padding:10px;'>";
$num=mysql_num_rows(mysql_query("select distinct nif.id as nif from nif where not nif.id=".$main."
 and nif.categoria=".$_GET["id"]));
$sobra=$num%15;
$num=($num - $sobra) / 15;
if($sobra > 0)$num++;
for($i=1 ; $i <= $num ; $i++){
	if($i - 1 != 0) $print="_".($i - 1); else $print="";
	if($i != $pag + 1)
		echo "<a href='http://".$_SERVER['SERVER_NAME'].preg_replace("/.html_[0-9]+/",".html",$_SERVER['REQUEST_URI']).$print."'>".$i."</a>";
	else
		echo "".$i."";
	
	if($i != $num)echo " - ";
}

echo "</div>";

}
function pageside(){}

?>