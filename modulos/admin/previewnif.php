<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
if($_SESSION["usuario"]>0 && privilegioscheckadd($_SESSION["usuario"],$cat) || privilegioscheckedit($_SESSION["usuario"],$cat)){
$nif=$_SESSION["nif"];unset($_SESSION["nif"]);
?>
<div>
<button style="background-color:red;" 
onclick="$('#cont').load('/modulos/admin/editnif.php',{editnif:<?php echo $nif; ?>});">
Volver
</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button style="background-color:green;" 
onclick="$('#cont').load('/modulos/admin/nifs.php',{publishnif:<?php echo $nif; ?>});">
Publicar
</button></div>
<div>
<h1>[Preview]</h1>
</div>
<?php
 }else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>