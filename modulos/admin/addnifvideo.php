<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
if($_SESSION["usuario"]>0 && privilegioscheckadd($_SESSION["usuario"],$cat) ){


if(isset($_POST["nifvideoadd"])){
//var_dump($_POST);

addnifvideo($_SESSION["nif"],addvideo($_POST["texto"],$_POST["tipo"]));
echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifvideo .boxcontent').load('/modulos/admin/editnifvideo.php');\">Editar</button>";

}else{

?>
<script>
$(document).ready(function(){
	$("#addnifvideo").click(function(){
	var texto=$("#nif_video_texto").val();
	var tipo=$("#nif_video_tipo").val();
	$("#nifvideo .boxcontent").load("/modulos/admin/addnifvideo.php",
	{
	texto:texto,tipo:tipo,
	nifvideoadd:'xxxxxxxxx'
	}
	);

	});
});
</script>
<table>
<tr><td colspan="4" style="text-align:center;"><br/><br/>
Youtube: http://www.youtube.com/watch?v=<font style="background-color:yellow;">qvIvUXipEbw</font>&feature=topvideos_music<br/><br/>
Vimeo: http://vimeo.com/<font style="background-color:yellow;">27748544</font><br/><br/>
</td></tr>
<tr><td>Enlace:</td><td><input type="text" id="nif_video_texto"></td>
<td>Tipo:</td><td><select id="nif_video_tipo">
<option value="1">YouTube</option><option value="2">Vimeo</option>
</select></td></tr>
<tr><td colspan="4"><button id="addnifvideo">Enviar</button></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>