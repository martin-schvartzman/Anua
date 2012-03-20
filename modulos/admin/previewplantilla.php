<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
?>
<script>
$(document).ready(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","#66CDAA");
		});
		$("#perfil").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
});
</script>

<?php
$nif=$_SESSION["nif"];
if(isadmin($_SESSION["usuario"]) ){


if(isset($_POST["publishplantilla"])){


if($_POST["nombre"]=="")$_POST["nombre"]="plantilla nueva";
addplantilla($_POST["nombre"],$_POST["publishplantilla"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La plantilla fue guardada exitosamente</div>";
unset($_SESSION["nif"]);
include("plantillas.php");
}else{
?>
<div>
<button style="background-color:red;" 
onclick="$('#cont').load('/modulos/admin/editnif.php',{editnif:<?php echo $nif; ?>});">
Volver
</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button style="background-color:green;" 
onclick="$('#cont').load('/modulos/admin/previewplantilla.php',
{publishplantilla:<?php echo $nif; ?>,nombre:$('#nombreplantilla').val()});">
Guardar plantilla
</button></div>
<div>
Nombre:<input type="text" id="nombreplantilla"/>
</div>
<?php
}





 }else{
 ?><button style="background-color:red;" 
onclick="$('#cont').load('/modulos/admin/editnif.php',{nif:<?php echo $nif; ?>});">
Volver
</button><?php
 echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>