<?php
session_start();
include("../sql/consultas.php");
include("css.php");
if($_SESSION["usuario"]>0  && isadmin($_SESSION["usuario"]) ){



if(isset($_POST["addcategoria"]) ){
if($_POST["nombre"]!=""
&& $_POST["nombre"] != "url" && $_POST["nombre"] != "br" && $_POST["nombre"] != "ws"){
$id=$_POST["addcategoria"];
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La Etiqueta CSS fue editada exitosamente</div>";

//var_dump($_POST);
$css=addcss($_POST["color"],$_POST["align"],$_POST["font"],$_POST["size"],$_POST["decoration"],$_POST["style"]);
editcsstag($id,$_POST["nombre"],$_POST["btext"],$_POST["etext"],$css);
//echo $css;
}
include("csstags.php");
}else{
?>
<style>
td{padding:4px;}
</style>
<script>
$(document).ready(function (){
	
	$('#canceledit').click(function(){
		$('#cont').load("/modulos/admin/csstags.php");
	});

	$('#content<?php echo $_POST["editid"]; ?> #edit').click(function(){
		var addcategorianombre=$('#addcategoria_nombre').val();
		var addcategoriabtext=$('#addcategoria_btext').val();
		var addcategoriaetext=$('#addcategoria_etext').val();
		var addcategoriacolor=$('#addcategoria_color').val();
		var addcategoriafont=$('#addcategoria_font').val();
		var addcategoriadecoration=$('#addcategoria_decoration').val();
		var addcategoriasize=$('#addcategoria_size').val();
		var addcategoriastyle=$('#addcategoria_style').val();
		var addcategoriaalign=$('#addcategoria_align').val();
		//alert("asd");
		$('#cont').load("/modulos/admin/editcsstag.php",
		{
			addcategoria:<?php echo $_POST["editid"]; ?>,
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

	<?php $tag=getcsstag($_POST["editid"]);//var_dump($_POST);var_dump($tag); ?>
		<table>
			<tr>
				<td>Nombre:</td><td><input type="text" id="addcategoria_nombre" value="<?php echo $tag["nombre"]; ?>"/></td><td rowspan="3"><?php editcss("addcategoria_",$tag["css"]); ?></td>
			</tr>
			<tr>
				<td>Texto de comienzo:</td><td><input type="text" id="addcategoria_btext" value="<?php echo $tag["btext"]; ?>"/></td>
			</tr>
			<tr>
				<td>Texto final:</td><td><input type="text" id="addcategoria_etext" value="<?php echo $tag["etext"]; ?>"/></td>
			</tr>
			<tr>
				<td colspan="4"><button style="height:20px;" id="edit">Enviar</button> <button style="height:20px;" id="canceledit">Cancelar</button></td>
			</tr>
		</table>
		





<?php	

}


}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/>
Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
//var_dump( isadmin($_POST["id"]));
}

?>