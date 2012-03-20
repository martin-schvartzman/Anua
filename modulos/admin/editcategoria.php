<?php
session_start();
include("../sql/consultas.php");
include("css.php");
if($_SESSION["usuario"]>0    && (isset($_POST["editid"]) || isset($_POST["editcategoria"])) 
 ){

if(isset($_POST["editcategoria"]) && $_POST["orden"] != "" ){

if(isadmin($_SESSION["usuario"])){

if($_POST["nombre"]!=""){
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La categoria fue editada exitosamente</div>";
$mout=addcss($_POST["moutcolor"],$_POST["moutalign"],$_POST["moutfont"],$_POST["moutsize"],$_POST["moutdecoration"],$_POST["moutstyle"]);
if($_POST["checkmover"]=="false")$mover=0;
else
$mover=addcss($_POST["movercolor"],$_POST["moveralign"],$_POST["moverfont"],$_POST["moversize"],$_POST["moverdecoration"],$_POST["moverstyle"]);
$display=1;
if($_POST["display"]=="false")$display=0;
$nombre=$_POST["nombre"];
$img=$_POST["imagen"];
$orden=$_POST["orden"];
editcategoria($_POST["editcategoria"],$orden, $nombre, $img,$display,$mout,$mover);
}
include("categorias.php");


}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Usted no tiene los permisos necesarios 
para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
include("categorias.php");
}

}else{
?>
<style>
td{padding:4px;}
</style>
<script>
$(document).ready(function (){

	$('#canceledit').click(function(){
		$('#cont').load("/modulos/admin/categorias.php");
	});
	
	$('#edit').click(function(){
		var editcategorianombre=$('#editcategoria_nombre').val();
		var editcategoriaimagen=$('#editcategoria_imagen').val();
		var editcategoriaorden=$('#editcategoria_orden').val();
		var editcategoriadisplay=$('#editcategoria_checkdisplay:checked').val() != undefined;
		var editcategoriacheckmover=$('#editcategoria_checkmover:checked').val() != undefined;
		var editcategoriamoutcolor=$('#editcategoria_mout_color').val();
		var editcategoriamoutfont=$('#editcategoria_mout_font').val();
		var editcategoriamoutdecoration=$('#editcategoria_mout_decoration').val();
		var editcategoriamoutsize=$('#editcategoria_mout_size').val();
		var editcategoriamoutstyle=$('#editcategoria_mout_style').val();
		var editcategoriamoutalign=$('#editcategoria_mout_align').val();
		var editcategoriamovercolor=$('#editcategoria_mover_color').val();
		var editcategoriamoverfont=$('#editcategoria_mover_font').val();
		var editcategoriamoverdecoration=$('#editcategoria_mover_decoration').val();
		var editcategoriamoversize=$('#editcategoria_mover_size').val();
		var editcategoriamoverstyle=$('#editcategoria_mover_style').val();
		var editcategoriamoveralign=$('#editcategoria_mover_align').val();
		
		$('#cont').load("/modulos/admin/editcategoria.php",
		{
			editcategoria:<?php echo $_POST["editid"]; ?>,
			nombre:editcategorianombre,
			imagen:editcategoriaimagen,
			orden:editcategoriaorden,
			display:editcategoriadisplay,
			checkmover:editcategoriacheckmover,
			moutcolor:editcategoriamoutcolor,
			moutfont:editcategoriamoutfont,
			moutdecoration:editcategoriamoutdecoration,
			moutsize:editcategoriamoutsize,
			moutstyle:editcategoriamoutstyle,
			moutalign:editcategoriamoutalign,
			movercolor:editcategoriamovercolor,
			moverfont:editcategoriamoverfont,
			moverdecoration:editcategoriamoverdecoration,
			moversize:editcategoriamoversize,
			moverstyle:editcategoriamoverstyle,
			moveralign:editcategoriamoveralign
		}
		);
		

	});
});
</script>
		<?php $cat=getcategoria($_POST["editid"]); ?>
		<table>
			<tr>
				<td>Nombre</td>
				<td><input type="text" id="editcategoria_nombre" value="<?php echo $cat["nombre"]; ?>"/></td>
				<td>Imagen<input type="text" id="editcategoria_imagen" value="<?php echo $cat["imagen"]; ?>"/></td>
				<td>Activar Mouse-over<input type="checkbox"  id="editcategoria_checkmover"  <?php if( $cat["mover"] != 0)echo "checked"; ?>/></td>
			</tr>
			<tr>
				<td colspan="2"><?php editcss("editcategoria_mout_",$cat["mout"]); ?></td>
				<td colspan="2"><?php editcss("editcategoria_mover_",$cat["mover"]); ?></td>
			</tr>
			<tr>
				<td>Orden:</td>
				<td><input type="text" style="width:40px;" id="editcategoria_orden"  value="<?php echo $cat["orden"]; ?>"/></td>
				<td>Display:<input type="checkbox" id="editcategoria_checkdisplay" <?php if( $cat["display"] != 0)echo "checked"; ?> /></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="4"><button style="height:20px;" id="edit">Enviar</button> <button style="height:20px;" id="canceledit">Cancelar</button></td>
			</tr>
		</table>
		
		<div id="subcategorias">
<?php	

$_SESSION["sub"]=$_POST["editid"];

include("subcategorias.php");
?></div>

<?php
}

}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Usted no tiene los permisos necesarios 
para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
//var_dump( isadmin($_POST["id"]));
}
?>