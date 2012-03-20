<style>
div#pageheader{
height:100px;
}
</style>
<?php
include_once("estilizar.php");
include_once("main/post.php");
function titulo(){}
function descripcion(){}
function keywords(){}
function script(){}
function pageheader(){
echo "<div style='padding:20px;'>";
$id=$_GET["id"];
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
str_replace(" ","-",
str_replace("ñ","n",
$c["nombre"]))))).
"/".$sub["id"]."/"
.str_replace("&eacute;","e",
str_replace("&oacute;","o",
str_replace("&iacute;","i",
str_replace("&ntilde;","n",
str_replace("ñ","n",
str_replace(" ","-",
$sub["nombre"])))))).
".html'>";
echo $sub["nombre"];
echo "</a>";
echo "</b></div>";
}
echo "</div>";
echo "</div>";
}
function pagecontent(){
echo "<br/><br/><br/>";
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
." limit ".($pag * 15).",".(($pag * 15) + 15)." "
);
//echo "<pre>";
//var_dump($_GET);
echo "<div style='text-align:center;padding:10px;'>";
$num=mysql_num_rows(mysql_query("select distinct nif.id as nif from nif where not nif.id=".$main."
 and nif.categoria=".$_GET["id"]));
$sobra=$num%15;
$num=($num - $sobra) / 15;
if($sobra > 0)$num++;
//echo $num;
for($i=1 ; $i <= $num ; $i++){
	if($i != $pag + 1)
		echo "<a href='http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."_".($i - 1)."'>".$i."</a>";
	else
		echo "".$i."";
	
	if($i != $num)echo " - ";
}

echo "</div>";


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
//var_dump($titulo);
}
//echo "</pre>";

echo "<div style='text-align:center;padding:10px;'>";
$num=mysql_num_rows(mysql_query("select distinct nif.id as nif from nif where not nif.id=".$main."
 and nif.categoria=".$_GET["id"]));
$sobra=$num%15;
$num=($num - $sobra) / 15;
if($sobra > 0)$num++;
for($i=1 ; $i <= $num ; $i++){
	if($i != $pag + 1)
		echo "<a href='http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."_".($i - 1)."'>".$i."</a>";
	else
		echo "".$i."";
	
	if($i != $num)echo " - ";
}

echo "</div>";




}
function pageside(){}

?>