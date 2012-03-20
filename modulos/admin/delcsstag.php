<?php
session_start();
include("../sql/consultas.php");
if($_SESSION["usuario"]>0 && isset($_POST["id"]) && 
	privilegioscheckdel($_SESSION["usuario"],$_POST["id"])){
	
	delcsstag($_POST["id"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La Etiqueta CSS fue eliminada correctamente</div>";
include("csstags.php");
	
	}else{
	
	echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
//var_dump( isadmin($_POST["id"]));
include("csstags.php");
	
	}
?>