<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
if($_SESSION["usuario"]>0 && (privilegioscheckedit($_SESSION["usuario"],$cat) || $_SESSION["usuario"] == getnifautor($_SESSION["nif"]))  ){

if(isset($_POST["cancel"])){

echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifaudio .boxcontent').load('/modulos/admin/editnifaudio.php');\">Editar</button>";


}else if(isset($_POST["nifaudioedit"])){
//var_dump($_POST);
delaudio(getnifaudio($_SESSION["nif"]));
addnifaudio($_SESSION["nif"],addaudio($_POST["texto"]));
echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifaudio .boxcontent').load('/modulos/admin/editnifaudio.php');\">Editar</button>";

}else{

?>
<script>
$(document).ready(function(){

	$("#cancelnifaudio").click(function(){
		$("#nifaudio .boxcontent").load("/modulos/admin/editnifaudio.php",{cancel:'cancel'});
	});
	
	$("#editnifaudio").click(function(){
	var texto=$("#nif_audio_texto").val();
	
	$("#nifaudio .boxcontent").load("/modulos/admin/editnifaudio.php",
	{
	texto:texto,
	nifaudioedit:'xxxxxxxxx'
	}
	);
	
	});
});
</script>
<table>
<?php $t=getnifaudio($_SESSION["nif"]);$t=getaudio($t);  ?>
<tr><td>Enlace:</td><td><input type="text" id="nif_audio_texto" value="<?php echo $t["link"]; ?>"></td></tr>
<tr><td><button id="editnifaudio">Enviar</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="cancelnifaudio">Cancelar</button></td><td></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>