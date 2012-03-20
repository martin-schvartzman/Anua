<?php 
@session_start();
include("../sql/consultas.php");
include("css.php");
$cat=getnifcategoria($_SESSION["nif"]);
if($_SESSION["usuario"]>0 && privilegioscheckadd($_SESSION["usuario"],$cat) ){


if(isset($_POST["niftituloadd"])){
//var_dump($_POST);



$css=addcss($_POST["color"],$_POST["align"],$_POST["font"],$_POST["size"],$_POST["decoration"],$_POST["style"]);
addniftitulo($_SESSION["nif"],addtitulo($_POST["texto"],$css));


echo "<h1>[Preview]</h1><br/><button onclick=\"$('#niftitulo .boxcontent').load('/modulos/admin/editniftitulo.php');\">Editar</button>";

}else{

?>
<script>
$(document).ready(function(){
	$("#addniftitulo").click(function(){
	var texto=$("#nif_titulo_texto").val();
	var color=$("#nif_titulo_color").val();
	var decoration=$("#nif_titulo_decoration").val();
	var style=$("#nif_titulo_style").val();
	var size=$("#nif_titulo_size").val();
	var align=$("#nif_titulo_align").val();
	var font=$("#nif_titulo_font").val();
	
	$("#niftitulo .boxcontent").load("/modulos/admin/addniftitulo.php",
	{
	texto:texto,
	color:color,
	decoration:decoration,
	style:style,
	size:size,
	align:align,
	font:font,
	niftituloadd:'xxxxxxxxx'
	}
	);
	
	});
});
</script>
<table>
<tr><td>Texto:</td><td><input type="text" id="nif_titulo_texto"/></td></tr>
<tr><td colspan="2"><div style="display:none;"><?php printcss("nif_titulo_"); ?></div></td></tr>
<tr><td colspan="2"><button id="addniftitulo">Enviar</button></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>