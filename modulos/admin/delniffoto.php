<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
if($_SESSION["usuario"]>0 && privilegioscheckadd($_SESSION["usuario"],$cat) ){

if(getniffoto($_SESSION["nif"])!= "0"){

delfoto(getniffoto($_SESSION["nif"]));
addniffoto($_SESSION["nif"],0);

}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>