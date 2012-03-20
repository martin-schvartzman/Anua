<?php 
@session_start();
include("../sql/consultas.php");
if($_SESSION["usuario"]>0){
if(isset($_POST["deletenif"]))
{delnif($_SESSION["nif"]);unset($_SESSION["nif"]);}

?>
<script>
$(document).ready(function(){
	$("#addnif").click(function(){
	
		$("#cont").load("/modulos/admin/addnif.php",{categoria:$("#idcategoria").val()});
	
	});
	$("#addnifperfil").click(function(){
		$("#cont").load("/modulos/admin/addnifperfil.php",{perfil:$("#idperfil").val()});
	});
});
</script>
<div>
<select id="idcategoria">
<?php
$cat=getcategorias();
foreach($cat as $c){


if(privilegioscheckadd($_SESSION["usuario"],$c["id"])){
echo "<option value='".$c["id"]."'>";
echo $c["nombre"];
echo "</option>";
$sub=getsubcategorias($c["id"]);
foreach($sub as $s){
echo "<option value='".$s["id"]."'>";
echo $c["nombre"]."---".$s["nombre"];
echo "</option>";
}


}




}

?>
</select>
<button class="add" id="addnif">
Nueva Entrada
</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select id="idperfil">
<?php
$pla=getplantillas();
foreach($pla as $p){


if(privilegioscheckadd($_SESSION["usuario"],getnifcategoria($p["nif"]))){
echo "<option value='".$p["id"]."'>";
echo $p["nombre"];
echo "</option>";
}

}
?>
</select>
<button class="add" id="addnifperfil">
Cargar Plantilla
</button>
</div>
<?php
if(isset($_POST["publishnif"])){
$cat=getnifcategoria($_POST["publishnif"]);
if($_SESSION["usuario"]>0 && privilegioscheckadd($_SESSION["usuario"],$cat) ||  privilegioscheckedit($_SESSION["usuario"],$cat)  ){
addnifestado($_POST["publishnif"],1);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La entrada fue publicada exitosamente</div>";
}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Consulta erronea<br/>La entrada se ha guardado como borrador</div>";
}
}


?>

<?php
 }else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>