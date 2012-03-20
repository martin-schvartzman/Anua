<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
include_once("picasa.php");
$gp=setup("comunicaciones@anua.org.ar","conexionargentina",$service);
$album=getAlbums($gp);
if($_SESSION["usuario"]>0 && privilegioscheckadd($_SESSION["usuario"],$cat) ){


if(isset($_POST["nifgaleriaadd"])){
//var_dump($_POST);

addnifgaleria($_SESSION["nif"],addgaleria($_POST["texto"]));
echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifgaleria .boxcontent').load('/modulos/admin/editnifgaleria.php');\">Editar</button>";

}else{

?>
<script>
$(document).ready(function(){
	$("#addnifgaleria").click(function(){
	var texto=$("#nif_galeria_picasa").val();
	
	$("#nifgaleria .boxcontent").load("/modulos/admin/addnifgaleria.php",
	{
	texto:texto,
	nifgaleriaadd:'xxxxxxxxx'
	}
	);
	
	});
});
</script>
<table>
<tr><td colspan="2">
	<div class="picasa">
		<?php
			foreach($album as $a){
			if(substr($a["titulo"],0,2)=="G-"){
			echo "<div style='border-bottom:1px solid black;margin-bottom:5px;cursor:hand;cursor:pointer;' onclick=\"";
			echo "$('#nif_galeria_picasa').val('".$a["id"]."');";
			echo "\">";
			echo "<img style='width:50px;height:50px;' src='".$a['img']."'/>";
			echo $a["titulo"];
			echo "</div>";}
			}
			?>
	</div>
</td></tr>
<tr><td>Picasa ID:</td><td><input type="text" id="nif_galeria_picasa"></td></tr>
<tr><td colspan="2"><button id="addnifgaleria">Enviar</button></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>