<?php
session_start();
include("../sql/consultas.php");
include("css.php");
if($_SESSION["usuario"]>0  && isadmin($_SESSION["usuario"]) ){



if(isset($_POST["addcategoria"]) && $_POST["nombre"] != "" 
&& $_POST["nombre"] != "url" && $_POST["nombre"] != "br" && $_POST["nombre"] != "ws"){

echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La Etiqueta CSS fue ingresada exitosamente</div>";

//var_dump($_POST);
$css=addcss($_POST["color"],$_POST["align"],$_POST["font"],$_POST["size"],$_POST["decoration"],$_POST["style"]);
addcsstag($_POST["nombre"],$_POST["btext"],$_POST["etext"],$css);

include("csstags.php");
}else{
?>
<style>
td{padding:4px;}
</style>
<script>
$(document).ready(function (){
	$('#add').click(function(){
		var addcategorianombre=$('#addcategoria_nombre').val();
		var addcategoriabtext=$('#addcategoria_btext').val();
		var addcategoriaetext=$('#addcategoria_etext').val();
		var addcategoriacolor=$('#addcategoria_color').val();
		var addcategoriafont=$('#addcategoria_font').val();
		var addcategoriadecoration=$('#addcategoria_decoration').val();
		var addcategoriasize=$('#addcategoria_size').val();
		var addcategoriastyle=$('#addcategoria_style').val();
		var addcategoriaalign=$('#addcategoria_align').val();
		//alert
		$('#cont').load("/modulos/admin/addcsstag.php",
		{
			addcategoria:"xxxxxxxxxxxxx",
			nombre:addcategorianombre,
			btext:addcategoriabtext,
			etext:addcategoriaetext,
			color:addcategoriacolor,
			font:addcategoriafont,
			decoration:addcategoriadecoration,
			size:addcategoriasize,
			style:addcategoriastyle,
			align:addcategoriaalign
		}
		);
		

	});
});
</script>
<div class="box">
	<div class="header">
		Nueva Etiqueta CSS
		<button onclick="$('#cont').load('./modulos/admin/csstags.php');" style="float:right;">Cancelar</button>
	</div>
	<div class="boxcontent">
	
		<table>
			<tr>
				<td>Nombre:</td><td><input type="text" id="addcategoria_nombre"/></td><td rowspan="3"><?php printcss("addcategoria_"); ?></td>
			</tr>
			<tr>
				<td>Texto de comienzo:</td><td><input type="text" id="addcategoria_btext"/></td>
			</tr>
			<tr>
				<td>Texto final:</td><td><input type="text" id="addcategoria_etext"/></td>
			</tr>
			<tr>
				<td colspan="4"><button style="height:20px;" id="add">Enviar</button></td>
			</tr>
		</table>
		
	</div>
</div>



<style>
#addccsstag{display:none;}
</style>
<?php	
include("csstags.php");

}


}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/>
Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
//var_dump( isadmin($_POST["id"]));
include("csstags.php");
}

?>