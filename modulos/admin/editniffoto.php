<?php 
@session_start();
include("../sql/consultas.php");
$cat=getnifcategoria($_SESSION["nif"]);
include_once("picasa.php");
$gp=setup("comunicaciones@anua.org.ar","conexionargentina",$service);
$album=getAlbums($gp);
if($_SESSION["usuario"]>0 && (privilegioscheckedit($_SESSION["usuario"],$cat) || $_SESSION["usuario"] == getnifautor($_SESSION["nif"])) ){

if(isset($_POST["cancel"])){

echo "<h1>[Preview]</h1><br/><button onclick=\"$('#niffoto .boxcontent').html('Cargando modulos,... Por favor espere...');$('#niffoto .boxcontent').load('/modulos/admin/editniffoto.php');\">Editar</button>";


}else if(isset($_POST["niffotoedit"])){
//var_dump($_POST);

if(is_numeric($_POST["h"]) && is_numeric($_POST["w"])){

if($_POST["h"]>800)$_POST["h"]=800;
if($_POST["w"]>800)$_POST["w"]=800;
if($_POST["h"]<25)$_POST["h"]=25;
if($_POST["w"]<25)$_POST["w"]=25;
delfoto(getniffoto($_SESSION["nif"]));
$foto=addfoto($_POST["texto"],$_POST["h"],$_POST["w"],$_POST["link"]);
addniffoto($_SESSION["nif"],$foto);
echo "<h1>[Preview]</h1><br/><button onclick=\"$('#niffoto .boxcontent').html('Cargando modulos,... Por favor espere...');$('#niffoto .boxcontent').load('/modulos/admin/editniffoto.php');\">Editar</button>";
}else{
unset($_POST["niffotoadd"]);include("addniffoto.php");
}


}else{

?>
<script>
$(document).ready(function(){

	$("#cancelniffoto").click(function(){
		$('#niffoto .boxcontent').html('Cargando modulos,... Por favor espere...');
		$("#niffoto .boxcontent").load("/modulos/admin/editniffoto.php",{cancel:'cancel'});
	});
	
	$("#editniffoto").click(function(){
	var texto=$("#nif_foto_texto").val();
	var w=$("#nif_foto_w").val();
	var h=$("#nif_foto_h").val();
	var link=$("#nif_foto_link").val();	
	$('#niffoto .boxcontent').html('Cargando modulos,... Por favor espere...');
	$("#niffoto .boxcontent").load("/modulos/admin/editniffoto.php",
	{
	texto:texto,
	h:h,
	w:w,
	link:link,
	niffotoedit:'xxxxxxxxx'
	}
	);
	
	});
});
</script>
<table>
<?php $t=getniffoto($_SESSION["nif"]);$t=getfoto($t);  ?>
<tr>
	<td colspan="2" rowspan="3">Fotos<br/>
		<div class="picasa">
			<?php
			foreach($album as $a){
			if(substr($a["titulo"],0,2)=="F-"){
			echo "<div style='border-bottom:1px solid black;margin-bottom:5px;cursor:hand;cursor:pointer;' onclick=\"";
			echo "if($('#".$a["id"]."').css('display')=='none')$('#".$a["id"]."').css('display','block'); else $('#".$a["id"]."').css('display','none');";
			echo "\">";
			echo "<img style='width:50px;height:50px;' src='".$a['img']."'/>";
			echo $a["titulo"];
				echo "<div id='".$a["id"]."' style='display:none;padding:10px;'>";
				$fotos=getAlbum($gp,$a["id"]);
				$i=0;
				foreach($fotos as $f){
				if($i==0)echo "<div style='height:100px;'>";
				$i++;
				echo "<div class='photo' onclick=\"$('#nif_foto_link').val('".$f["img"]."');";
				echo "$('#nif_foto_h').val(".$f["h"].");$('#nif_foto_w').val(".$f["w"].");";
				echo "\"";
				echo ">";
				echo "<img src='".$f['thumb']."'/>";
				echo "</div>";
				if($i==5){$i=0;echo "</div>";}
				}
				if($i!=0)echo "</div>";
				echo "</div>";
			echo "</div>";
			}
			}
			?>
		</div>
	</td>
	<td>W:</td>
	<td><input type="text" style="width:75px" value="<?php echo $t["width"]; ?>" id="nif_foto_w"/>px</td>
	<td></td>
</tr>
<tr>
	<td>H:</td>
	<td><input type="text" style="width:75px" value="<?php echo $t["height"]; ?>" id="nif_foto_h"/>px</td>
	<td></td>
</tr>
<tr>
	<td colspan="3" rowspan="2">Texto<br/>
	<textarea id="nif_foto_texto" style="width:300px;height:150px;">
		<?php echo $t["texto"]; ?>
	</textarea>
	</td>
</tr>
<tr>
	<td>Enlace:</td>
	<td><input type="text" style="width:300px" value="<?php echo $t["link"]; ?>" id="nif_foto_link"/></td>
</tr>
<tr><td><button id="editniffoto">Enviar</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="cancelniffoto">Cancelar</button></td><td></td></tr>
</table>
<?php
}



}else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>