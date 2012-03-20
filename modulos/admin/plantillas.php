<?php 
@session_start();
include("../sql/consultas.php");
?>
<script>
$(document).ready(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","powderBlue");
		});
		$("#perfil").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
});
</script>

<?php
if( isadmin($_SESSION["usuario"]) ){

if(isset($_POST["delplantilla"])){
delplantilla($_POST["delplantilla"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La plantilla fue eliminada exitosamente</div>";
}

if(isset($_POST["editplan"])){
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La plantilla fue editada exitosamente</div>";
}

$pla=getplantillas();
foreach($pla as $p){
?>
<div class="box">
	<div class="header">
	
	<div id="nombre" style="float:left;">
	<?php echo $p["nombre"] ?>
	</div>
	
	<div style="float:right;">
	<button onclick="$('#cont').load('/modulos/admin/editperfil.php',{editnif:<?php echo $p["nif"]; ?>});">Editar</button>
	<button onclick="$('#cont').load('/modulos/admin/plantillas.php',{delplantilla:<?php echo $p["id"]; ?>});">Eliminar</button>
	</div>
	</div>
</div>
<?php
}

 }else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> 
 Ante cualquier duda comuniquese a soporte@anua.org.ar";
 
 }
 
 ?>