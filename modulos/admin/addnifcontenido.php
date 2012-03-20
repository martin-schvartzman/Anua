<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
if($_SESSION["usuario"]>0 && privilegioscheckadd($_SESSION["usuario"],$cat) ){


if(isset($_POST["nifcontenidoadd"])){
//var_dump($_POST);
	query("delete from relniftags where nif=".antinject($_SESSION["nif"]));
	$tags=gettags();
	foreach($tags as $t){
	if($_POST["niftag".$t["id"]]=="true")addrelniftag($t["id"],$_SESSION["nif"]);
	}
addnifcontenido($_SESSION["nif"],addcontenido($_POST["texto"]));
echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifcontenido .boxcontent').load('/modulos/admin/editnifcontenido.php');\">Editar</button>";

}else{

?>
<script>
$(document).ready(function(){
	$("#addnifcontenido").click(function(){
	var texto=$("#nif_contenido_texto").val();
	<?php
	$tags=gettags();
	foreach($tags as $t){
	?>
	var tag<?php echo $t["id"]; ?>=$('#nif_tags_<?php echo $t["id"]; ?>:checked').val() != undefined;
	<?php
	}
	?>
	$("#nifcontenido .boxcontent").load("/modulos/admin/addnifcontenido.php",
	{
	texto:texto,
	<?php
	$tags=gettags();
	foreach($tags as $t){
	?>
	niftag<?php echo $t["id"]; ?>:tag<?php echo $t["id"]; ?>,
	<?php
	}
	?>
	nifcontenidoadd:'xxxxxxxxx'
	}
	);
	
	});
});
</script>
<table style="margin:5px;">
<tr><td>Texto:
<div style="width:700px;min-height:20px;line-height:200%;">
<div class="tagentry" onclick="$('#nif_contenido_texto').val($('#nif_contenido_texto').val() + '[br]')"><b>[br]</b>-salto de linea</div>
<div class="tagentry" onclick="$('#nif_contenido_texto').val($('#nif_contenido_texto').val() + '[ws]')"><b>[ws]</b>-forzar espacio</div>
<div class="tagentry" onclick="$('#nif_contenido_texto').val($('#nif_contenido_texto').val() + '[url][/url]')"><b>[url][/url]</b>-hiperv&iacute;nculo</div>
<?php
$tag=getcsstags();
foreach($tag as $t){
?><div class="tagentry" onclick="$('#nif_contenido_texto').val($('#nif_contenido_texto').val() + 
'[<?php echo $t["nombre"]; ?>][/<?php echo $t["nombre"]; ?>]')" >
<b>[<?php echo $t["nombre"]; ?>][/<?php echo $t["nombre"]; ?>]</b><?php echo estilizar("-[".$t["nombre"]."]estilo[/".$t["nombre"]."]"); ?>
</div>
<?php
}
?>
</div>
<br/><textarea id="nif_contenido_texto" style="width:600px;height:400px;"></textarea>
</td><td>
Tags:<br/>
<?php
$tags=gettags();
foreach($tags as $t){
?>
<input type="checkbox" id="nif_tags_<?php echo $t["id"]; ?>"/><?php echo $t["tag"]; ?><br/>
<?php
}

?>

</td></tr>
<tr><td colspan="2"><button id="addnifcontenido">Enviar</button></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>