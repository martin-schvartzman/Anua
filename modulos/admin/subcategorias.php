<?php
@session_start();
include_once("../sql/consultas.php");
if($_SESSION["usuario"]>0 && isset($_SESSION["sub"])){



if(isset($_POST["editsub"])){

if($_POST["nombre"] != "" && privilegioscheckedit($_SESSION["usuario"],$_SESSION["sub"])  && is_numeric($_POST["orden"])){
editsubcategoria($_POST["nombre"],$_POST["orden"],$_POST["editsub"]);
unset($_POST["editsub"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Consulta realizada con exito</div>";
include("subcategorias.php");
}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Ocurrio un error con su consulta
<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
unset($_POST["editsub"]);
include("subcategorias.php");
}


}else if(isset($_POST["addsub"])){

if($_POST["nombre"] != "" && privilegioscheckadd($_SESSION["usuario"],$_SESSION["sub"]) && is_numeric($_POST["orden"])){
addsubcategoria($_POST["nombre"],$_POST["orden"],$_SESSION["sub"]);
unset($_POST["addsub"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Consulta realizada con exito</div>";
include("subcategorias.php");
}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Ocurrio un error con su consulta
<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
unset($_POST["addsub"]);
include("subcategorias.php");
}

}else if(isset($_POST["delsub"])){

if(privilegioscheckdel($_SESSION["usuario"],$_SESSION["sub"])){
delcategoria($_POST["delsub"]);
unset($_POST["delsub"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Consulta realizada con exito</div>";
include("subcategorias.php");
}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Ocurrio un error con su consulta
<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
unset($_POST["delsub"]);
include("subcategorias.php");
}

}else{
$subs=getsubcategorias($_SESSION["sub"]);
?>

<br/>
Subcategorias
<br/><br/>
<table>
<tr><td>Nombre</td><td>Orden</td><td></td><td></td></tr>
<?php

foreach($subs as $s){
echo "<tr>";

echo "<td>";
echo "<input type='text' id='subnombre".$s["id"]."' value='".$s["nombre"]."'/>";
echo "</td>";



echo "<td>";
echo "<input type='text' id='suborden".$s["id"]."'  value='".$s["orden"]."'/>";
echo "</td>";

echo "<td><button onclick=\"";
?>
$('#subcategorias').load('/modulos/admin/subcategorias.php',
{editsub:'<?php echo $s["id"]; ?>',nombre:$('#subnombre<?php echo $s["id"]; ?>').val(),orden:$('#suborden<?php echo $s["id"]; ?>').val()})
<?php
echo "\" >Editar</button></td>";
echo "<td><button onclick=\"";
?>
$('#subcategorias').load('/modulos/admin/subcategorias.php',
{delsub:'<?php echo $s["id"]; ?>'})
<?php
echo "\" >Eliminar</button></td>";

echo "</tr>";
}

?>
<tr>
<td><input type="text" id="subnombreadd"/></td>
<td><input type="text" id="subordenadd"/></td>
<td>
<button onclick="
$('#subcategorias').load('/modulos/admin/subcategorias.php',
{addsub:'x',nombre:$('#subnombreadd').val(),orden:$('#subordenadd').val()})
">Agregar</button>
</td>
<td></td>
</tr>

</table>
</div>
<?php
}



}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Usted no tiene los permisos necesarios 
para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
}

?>