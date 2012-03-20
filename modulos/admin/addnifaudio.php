<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
if($_SESSION["usuario"]>0 && privilegioscheckadd($_SESSION["usuario"],$cat) ){


if(isset($_POST["nifaudioadd"])){
//var_dump($_POST);

addnifaudio($_SESSION["nif"],addaudio($_POST["texto"]));
echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifaudio .boxcontent').load('/modulos/admin/editnifaudio.php');\">Editar</button>";

}else{

?>
<script>
$(document).ready(function(){
	$("#addnifaudio").click(function(){
	var texto=$("#nif_audio_texto").val();
	
	$("#nifaudio .boxcontent").load("/modulos/admin/addnifaudio.php",
	{
	texto:texto,
	nifaudioadd:'xxxxxxxxx'
	}
	);
	
	});
});
</script>
<table>
<tr><td>Enlace:</td><td><input type="text" id="nif_audio_texto"></td></tr>
<tr><td colspan="2"><button id="addnifaudio">Enviar</button></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>