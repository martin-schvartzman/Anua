<?php
@session_start();
include("../sql/consultas.php");

if(privilegioscheckdel($_SESSION["usuario"],getnifcategoria($_POST["delnif"])) ||
(getnifautor($_POST["delnif"])==$_SESSION["usuario"] && getnifestado($_POST["delnif"])=="0")
){
 
delnif($_POST["delnif"]);
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>La entrada fue eliminada exitosamente</div>";
include("search.php");

}else{

echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Consulta erronea</div>";
include("search.php");
}
?>