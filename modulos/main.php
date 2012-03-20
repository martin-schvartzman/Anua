<?php
include_once("estilizar.php");
include_once("main/post.php");
function titulo(){}
function descripcion(){}
function keywords(){}
function script(){}
function pageheader(){
?>
<div style="height:95px;">
<object type="application/x-shockwave-flash" data="/contenidos/cabecera/anua.swf" width="525px" height="95px"> 
<param name="movie" value="/contenidos/cabecera/anua.swf"/> 
<param name="bgcolor" value="EFEBE7" /> 
<param name="wmode" value="transparent" />
</object>
</div>
<div style="height:145px;background-image:url('/contenidos/cabecera/bienvenidos.gif');">
	
</div>
<?php
}
function pagecontent(){
include("extra/agenda.php");
$post=query("select distinct nif.id as nif from nif,relniftags,niftags where niftags.tag='home' 
and relniftags.tag=niftags.id and relniftags.nif=nif.id");
?>
<div style="height:32px;width:500px;background-image:url('/imagenes/galeria.jpg');margin-bottom:25px;"></div>

<?php
//echo "<br/><br/><br/><h2>Algunas noticias recomendadas:</h2><br/><br/>";

?><div style=""><?php
foreach($post as $p){
//generate($p["nif"]);
$c=getcategoria(getnifcategoria($p["nif"]));
$titulo=getniftitulo($p["nif"]);
$titulo=gettitulo($titulo);
$texto=str_replace(" ","-",$titulo["texto"]);
$texto=str_replace(".","-",$texto);
$texto=str_replace(",","-",$texto);
$texto=str_replace("\"","-",$texto);
$texto=str_replace("&","",$texto);
$texto=str_replace(";","",$texto);
$c["nombre"]=str_replace("&","",$c["nombre"]);
$c["nombre"]=str_replace(";","",$c["nombre"]);
echo "<a href='/".urlencode($c["nombre"])."/post/".$p["nif"]."/".urlencode($texto).".html' style='margin-left:10px;padding-left:25px;font-family:arial;color:#999999;font-size:16px;'>";
echo $titulo["texto"];
echo "</a><br/><br/>";
}
?></div>
<div style="height:100px;width:500px;background-image:url('/imagenes/fondoinfo.jpg');background-repeat:no-repeat;">
	<div style="height:32px;width:500px;background-image:url('/imagenes/info1.jpg');"></div>
	<div style="height:26px;width:500px;">
		<a href="/sub-Infos-sobre/121/Genero.html"><div style="height:26px;width:88px;background-image:url('/imagenes/info2.jpg');float:left;"></div></a>
		<a href="/sub-Infos-sobre/122/Odm.html"><div style="height:26px;width:55px;background-image:url('/imagenes/info3.jpg');float:left;"></div></a>
		<a href="/sub-Infos-sobre/124/Infancia.html"><div style="height:26px;width:86px;background-image:url('/imagenes/info4.jpg');float:left;"></div></a>
		<a href="/sub-Infos-sobre/125/La-Onu.html"><div style="height:26px;width:52px;background-image:url('/imagenes/info5.jpg');float:left;"></div></a>
		<a href="/sub-Infos-sobre/123/Derechos-Humanos.html"><div style="height:26px;width:175px;background-image:url('/imagenes/info6.jpg');float:left;"></div></a>
		<div style="height:26px;width:44px;background-image:url('/imagenes/info7.jpg');float:left;"></div>
	</div>
</div>
<?php
}
function pageside(){}

?>
