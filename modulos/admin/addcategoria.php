<?php
session_start();
include("../sql/consultas.php");
include("css.php");
if($_SESSION["usuario"]>0  && isadmin($_SESSION["usuario"]) ){



if(isset($_POST["addcategoria"]) && $_POST["nombre"] != "" && $_POST["orden"] != ""){

echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La categoria fue ingresada exitosamente</div>";
$mout=addcss($_POST["moutcolor"],$_POST["moutalign"],$_POST["moutfont"],$_POST["moutsize"],$_POST["moutdecoration"],$_POST["moutstyle"]);
if($_POST["checkmover"]=="false")$mover=0;
else
$mover=addcss($_POST["movercolor"],$_POST["moveralign"],$_POST["moverfont"],$_POST["moversize"],$_POST["moverdecoration"],$_POST["moverstyle"]);
$display=1;
if($_POST["display"]=="false")$display=0;
$nombre=$_POST["nombre"];
$img=$_POST["imagen"];
$orden=$_POST["orden"];
addcategoria($orden, $nombre, $img,$display,$mout,$mover);
include("categorias.php");
}else{
?>
<style>
td{padding:4px;}
</style>
<script>
$(document).ready(function (){
	$('#add').click(function(){
		var addcategorianombre=$('#addcategoria_nombre').val();
		var addcategoriaimagen=$('#addcategoria_imagen').val();
		var addcategoriaorden=$('#addcategoria_orden').val();
		var addcategoriadisplay=$('#addcategoria_checkdisplay:checked').val() != undefined;
		var addcategoriacheckmover=$('#addcategoria_checkmover:checked').val() != undefined;
		var addcategoriamoutcolor=$('#addcategoria_mout_color').val();
		var addcategoriamoutfont=$('#addcategoria_mout_font').val();
		var addcategoriamoutdecoration=$('#addcategoria_mout_decoration').val();
		var addcategoriamoutsize=$('#addcategoria_mout_size').val();
		var addcategoriamoutstyle=$('#addcategoria_mout_style').val();
		var addcategoriamoutalign=$('#addcategoria_mout_align').val();
		var addcategoriamovercolor=$('#addcategoria_mover_color').val();
		var addcategoriamoverfont=$('#addcategoria_mover_font').val();
		var addcategoriamoverdecoration=$('#addcategoria_mover_decoration').val();
		var addcategoriamoversize=$('#addcategoria_mover_size').val();
		var addcategoriamoverstyle=$('#addcategoria_mover_style').val();
		var addcategoriamoveralign=$('#addcategoria_mover_align').val();
		
		$('#cont').load("/modulos/admin/addcategoria.php",
		{
			addcategoria:"xxxxxxxxxxxxx",
			nombre:addcategorianombre,
			imagen:addcategoriaimagen,
			orden:addcategoriaorden,
			display:addcategoriadisplay,
			checkmover:addcategoriacheckmover,
			moutcolor:addcategoriamoutcolor,
			moutfont:addcategoriamoutfont,
			moutdecoration:addcategoriamoutdecoration,
			moutsize:addcategoriamoutsize,
			moutstyle:addcategoriamoutstyle,
			moutalign:addcategoriamoutalign,
			movercolor:addcategoriamovercolor,
			moverfont:addcategoriamoverfont,
			moverdecoration:addcategoriamoverdecoration,
			moversize:addcategoriamoversize,
			moverstyle:addcategoriamoverstyle,
			moveralign:addcategoriamoveralign
		}
		);
		

	});
});
</script>
<div class="box">
	<div class="header">
		Nueva Categoria
		<button onclick="$('#cont').load('./modulos/admin/categorias.php');" style="float:right;">Cancelar</button>
	</div>
	<div class="boxcontent">
	
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" id="addcategoria_nombre"/></td>
				<td>Imagen<input type="text" id="addcategoria_imagen"/></td>
				<td>Activar Mouse-over<input type="checkbox"  id="addcategoria_checkmover"/></td>
			</tr>
			<tr>
				<td colspan="2"><?php printcss("addcategoria_mout_"); ?></td>
				<td colspan="2"><?php printcss("addcategoria_mover_"); ?></td>
			</tr>
			<tr>
				<td>Orden:</td>
				<td><input type="text" style="width:40px;" id="addcategoria_orden" value="0"/></td>
				<td>Display:<input type="checkbox" id="addcategoria_checkdisplay" checked="yes" /></td>
				<td><button id="addcategoria">Enviar</button></td>
			</tr>
			<tr>
				<td colspan="4"><button style="height:20px;" id="add">Enviar</button></td>
			</tr>
		</table>
		
	</div>
</div>



<style>
#addcategoria{display:none;}
</style>
<?php	
include("categorias.php");

}


}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/>
Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
//var_dump( isadmin($_POST["id"]));
include("categorias.php");
}

?>