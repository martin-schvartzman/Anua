<?php 
@session_start();
include("../sql/consultas.php");
if(isadmin($_SESSION["usuario"])){



if(isset($_POST["deltag"])){
deltag($_POST["deltag"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La etiqueta fue eliminada exitosamente</div>";
}

if(isset($_POST["addtag"])){if($_POST["addtag"] != ""){
addtag($_POST["addtag"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La etiqueta fue ingresada exitosamente</div>";
}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Consulta erronea<br/>Debe ingresar algun texto</div>";
}}

if(isset($_POST["edittag"])){if($_POST["txt"] != ""){
edittag($_POST["edittag"],$_POST["txt"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La etiqueta fue editada exitosamente</div>";
}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Consulta erronea<br/>Debe ingresar algun texto</div>";
}}



?><table>
<tr>
<td>-home</td>
<td></td>
<td></td>
</tr>
<tr>
<td>-agenda</td>
<td></td>
<td></td>
</tr>
<?php
$tags=gettags();
foreach($tags as $t){if($t["id"]!="1" && $t["id"]!="2"){
?>
<tr>
	<td>-<input type="text" id="tag<?php echo $t["id"]; ?>" value="<?php echo $t["tag"]; ?>" /></td>
	<td>
		<button onclick="$('#cont').load('/modulos/admin/niftags.php',
		{edittag:<?php echo $t["id"]; ?>,txt:$('#tag<?php echo $t["id"]; ?>').val()})">
		Editar
		</button>
	</td>
	<td>
		<button onclick="$('#cont').load('/modulos/admin/niftags.php',{deltag:<?php echo $t["id"]; ?>})">
		Eliminar
		</button>
	</td>
</tr>
<?php
}}
?>
<tr>
	<td>
		-<input type="text" id="tagadd"/>
	</td>
	<td colspan="2">
		<button onclick="$('#cont').load('/modulos/admin/niftags.php',{addtag:$('#tagadd').val()})">
		Agregar
		</button>
	</td>
</tr>
</table>
<?php



 }else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>