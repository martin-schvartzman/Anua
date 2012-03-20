<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
include_once("picasa.php");
$gp=setup("comunicaciones@anua.org.ar","conexionargentina",$service);
$album=getAlbums($gp);
if($_SESSION["usuario"]>0 && (privilegioscheckedit($_SESSION["usuario"],$cat) || $_SESSION["usuario"] == getnifautor($_SESSION["nif"])) ){

if(isset($_POST["cancel"])){

echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifgaleria .boxcontent').load('/modulos/admin/editnifgaleria.php');\">Editar</button>";


}else if(isset($_POST["nifgaleriaedit"])){
//var_dump($_POST);
delgaleria(getnifgaleria($_SESSION["nif"]));
addnifgaleria($_SESSION["nif"],addgaleria($_POST["texto"]));
echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifgaleria .boxcontent').load('/modulos/admin/editnifgaleria.php');\">Editar</button>";

}else{

?>
<script>
$(document).ready(function(){

	$("#cancelnifgaleria").click(function(){
		$("#nifgaleria .boxcontent").load("/modulos/admin/editnifgaleria.php",{cancel:'cancel'});
	});
	
	$("#editnifgaleria").click(function(){
	var texto=$("#nif_galeria_texto").val();
	$("#nifgaleria .boxcontent").load("/modulos/admin/editnifgaleria.php",
	{
	texto:texto,
	nifgaleriaedit:'xxxxxxxxx'
	}
	);
	
	});
});
</script>
<table>
<?php $t=getnifgaleria($_SESSION["nif"]);$t=getgaleria($t);  ?>
<tr><td colspan="2">
	<div class="picasa">
		<?php
			foreach($album as $a){
			if(substr($a["titulo"],0,2)=="F-"){
			echo "<div style='border-bottom:1px solid black;margin-bottom:5px;cursor:hand;cursor:pointer;' onclick=\"";
			echo "$('#nif_galeria_texto').val('".$a["id"]."');";
			echo "\">";
			echo "<img style='width:50px;height:50px;' src='".$a['img']."'/>";
			echo $a["titulo"];
			echo "</div>";}
			}
			?>
	</div>
</td></tr>
<tr><td>Picasa ID:</td><td><input type="text" id="nif_galeria_texto" value="<?php echo $t["picasa"]; ?>"></td></tr>
<tr><td><button id="editnifgaleria">Enviar</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="cancelnifgaleria">Cancelar</button></td><td></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>