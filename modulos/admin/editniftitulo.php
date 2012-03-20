<?php 
@session_start();
include("../sql/consultas.php");
include("css.php");
$cat=getnifcategoria($_SESSION["nif"]);
if($_SESSION["usuario"]>0 && (privilegioscheckedit($_SESSION["usuario"],$cat) || $_SESSION["usuario"] == getnifautor($_SESSION["nif"]))  ){

if(isset($_POST["cancel"])){

echo "<h1>[Preview]</h1><br/><button onclick=\"$('#niftitulo .boxcontent').load('/modulos/admin/editniftitulo.php');\">Editar</button>";


}else if(isset($_POST["niftituloedit"])){
//var_dump($_POST);




if(isadmin($_SESSION["usuario"])){
deltitulo(getniftitulo($_SESSION["nif"]));
$css=addcss($_POST["color"],$_POST["align"],$_POST["font"],$_POST["size"],$_POST["decoration"],$_POST["style"]);
addniftitulo($_SESSION["nif"],addtitulo($_POST["texto"],$css));
}else{
$css=gettitulo(getniftitulo($_SESSION["nif"]));
deltitulo(getniftitulo($_SESSION["nif"]));
addniftitulo($_SESSION["nif"],addtitulo($_POST["texto"],$css["css"]));
}


echo "<h1>[Preview]</h1><br/><button onclick=\"$('#niftitulo .boxcontent').load('/modulos/admin/editniftitulo.php');\">Editar</button>";

}else{

?>
<script>
$(document).ready(function(){

	$("#cancelniftitulo").click(function(){
		$("#niftitulo .boxcontent").load("/modulos/admin/editniftitulo.php",{cancel:'cancel'});
	});
	
	$("#editniftitulo").click(function(){
	var texto=$("#nif_titulo_texto").val();
	var color=$("#nif_titulo_color").val();
	var decoration=$("#nif_titulo_decoration").val();
	var style=$("#nif_titulo_style").val();
	var size=$("#nif_titulo_size").val();
	var align=$("#nif_titulo_align").val();
	var font=$("#nif_titulo_font").val();
	
	$("#niftitulo .boxcontent").load("/modulos/admin/editniftitulo.php",
	{
	texto:texto,
	color:color,
	decoration:decoration,
	style:style,
	size:size,
	align:align,
	font:font,
	niftituloedit:'xxxxxxxxx'
	}
	);
	
	});
});
</script>
<table>
<?php $t=getniftitulo($_SESSION["nif"]);$t=gettitulo($t);  ?>
<tr><td>Texto:</td><td><input type="text" id="nif_titulo_texto" value="<?php echo $t["texto"]; ?>"/></td></tr>
<tr><td colspan="2"><div style="display:none;"><?php editcss("nif_titulo_",$t["css"]); ?></div></td></tr>
<tr><td><button id="editniftitulo">Enviar</button></td><td><button id="cancelniftitulo">Cancelar</button></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>