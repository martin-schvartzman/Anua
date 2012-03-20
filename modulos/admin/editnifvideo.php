<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
if($_SESSION["usuario"]>0 && (privilegioscheckedit($_SESSION["usuario"],$cat) || $_SESSION["usuario"] == getnifautor($_SESSION["nif"])) ){

if(isset($_POST["cancel"])){

echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifvideo .boxcontent').load('/modulos/admin/editnifvideo.php');\">Editar</button>";


}else if(isset($_POST["nifvideoedit"])){
//var_dump($_POST);
delvideo(getnifvideo($_SESSION["nif"]));
addnifvideo($_SESSION["nif"],addvideo($_POST["texto"],$_POST["tipo"]));
echo "<h1>[Preview]</h1><br/><button onclick=\"$('#nifvideo .boxcontent').load('/modulos/admin/editnifvideo.php');\">Editar</button>";

}else{

?>
<script>
$(document).ready(function(){

	$("#cancelnifvideo").click(function(){
		$("#nifvideo .boxcontent").load("/modulos/admin/editnifvideo.php",{cancel:'cancel'});
	});
	
	$("#editnifvideo").click(function(){
	var texto=$("#nif_video_texto").val();
	var tipo=$("#nif_video_tipo").val();
	$("#nifvideo .boxcontent").load("/modulos/admin/editnifvideo.php",
	{
	texto:texto,tipo:tipo,
	nifvideoedit:'xxxxxxxxx'
	}
	);
	
	});
});
</script>
<table>
<?php $t=getnifvideo($_SESSION["nif"]);$t=getvideo($t);  ?>
<tr><td colspan="4" style="text-align:center;"><br/><br/>
Youtube: http://www.youtube.com/watch?v=<font style="background-color:yellow;">qvIvUXipEbw</font>&feature=topvideos_music<br/><br/>
Vimeo: http://vimeo.com/<font style="background-color:yellow;">27748544</font><br/><br/>
</td></tr>
<tr><td>Enlace:</td><td><input type="text" id="nif_video_texto" value="<?php echo $t["link"]; ?>"></td>
<td>Tipo:</td><td><select id="nif_video_tipo">
<?php 
if($t["tipo"]==1){
?><option value="1">YouTube</option><?php
}else if($t["tipo"]==2){
?><option value="2">Vimeo</option><?php
}
?>
<option value="1">YouTube</option><option value="2">Vimeo</option>
</select></td>
</tr>
<tr><td><button id="editnifvideo">Enviar</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="cancelnifvideo">Cancelar</button></td><td colspan="3"></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>