<?php 
@session_start();
include("../sql/consultas.php");
if($_SESSION["usuario"]>0 && privilegioscheckadd($_SESSION["usuario"],$_POST["categoria"]) 
&& $_POST["categoria"] != "" && is_numeric($_POST["categoria"])){


$_SESSION["nif"]=addnif($_SESSION["usuario"]);
addnifcategoria($_SESSION["nif"],$_POST["categoria"]);


?>
<script>
$(document).ready(function(){

	$("#nifcategoria .boxcontent .edit").click(function(){
		$("#nifcategoria .boxcontent").load("/modulos/admin/editnifcategoria.php");
	});
	
	
	
	$("#niftitulo .boxcontent .edit").click(function(){
		$("#niftitulo .boxcontent").load("/modulos/admin/editniftitulo.php");
	});
	$("#niftitulo .header input").click(function(){
		var flag=$('#niftitulo .header input:checked').val() != undefined;
		if(flag){
		$("#niftitulo .boxcontent").load("/modulos/admin/addniftitulo.php");
		}else{
		$("#niftitulo .boxcontent").load("/modulos/admin/delniftitulo.php");
		}
	});
	
	$("#nifcontenido .boxcontent .edit").click(function(){
		$("#nifcontenido .boxcontent").load("/modulos/admin/editnifcontenido.php");
	});
	$("#nifcontenido .header input").click(function(){
		var flag=$('#nifcontenido .header input:checked').val() != undefined;
		if(flag){
		$("#nifcontenido .boxcontent").load("/modulos/admin/addnifcontenido.php");
		}else{
		$("#nifcontenido .boxcontent").load("/modulos/admin/delnifcontenido.php");
		}
	});
	
	$("#nifgaleria .boxcontent .edit").click(function(){
		$("#nifgaleria .boxcontent").load("/modulos/admin/editnifgaleria.php");
	});
	$("#nifgaleria .header input").click(function(){
		$("#nifgaleria .boxcontent").html("Cargando modulos,... Por favor espere...");
		var flag=$('#nifgaleria .header input:checked').val() != undefined;
		if(flag){
		$("#nifgaleria .boxcontent").load("/modulos/admin/addnifgaleria.php");
		}else{
		$("#nifgaleria .boxcontent").load("/modulos/admin/delnifgaleria.php");
		}
	});
	
	$("#niffoto .boxcontent .edit").click(function(){
		$("#niffoto .boxcontent").load("/modulos/admin/editniffoto.php");
	});
	$("#niffoto .header input").click(function(){
		var flag=$('#niffoto .header input:checked').val() != undefined;
		if(flag){
		$("#niffoto .boxcontent").html("Cargando modulos,... Por favor espere...");
		$("#niffoto .boxcontent").load("/modulos/admin/addniffoto.php");
		}else{
		$("#niffoto .boxcontent").html("Cargando modulos,... Por favor espere...");
		$("#niffoto .boxcontent").load("/modulos/admin/delniffoto.php");
		}
	});
	
	$("#nifvideo .boxcontent .edit").click(function(){
		$("#nifvideo .boxcontent").load("/modulos/admin/editnifvideo.php");
	});
	$("#nifvideo .header input").click(function(){
		var flag=$('#nifvideo .header input:checked').val() != undefined;
		if(flag){
		$("#nifvideo .boxcontent").load("/modulos/admin/addnifvideo.php");
		}else{
		$("#nifvideo .boxcontent").load("/modulos/admin/delnifvideo.php");
		}
	});
	
	$("#nifaudio .boxcontent .edit").click(function(){
		$("#nifaudio .boxcontent").load("/modulos/admin/editnifaudio.php");
	});
	$("#nifaudio .header input").click(function(){
		var flag=$('#nifaudio .header input:checked').val() != undefined;
		if(flag){
		$("#nifaudio .boxcontent").load("/modulos/admin/addnifaudio.php");
		}else{
		$("#nifaudio .boxcontent").load("/modulos/admin/delnifaudio.php");
		}
	});

});
</script>

<button onclick="$('#cont').load('/modulos/admin/nifs.php',{deletenif:'xxxxxx'});" style="float:right;background-color:red;">Cancelar</button>
<button style="float:right;background-color:yellow;" onclick="$('#cont').load('/modulos/admin/previewplantilla.php');">Guardar como plantilla</button> 
<button style="float:right;background-color:green;" onclick="$('#cont').load('/modulos/admin/previewnif.php');">Continuar</button>
<br/><br/>
<div class="box" id="nifcategoria">
	<div class="header">Categoria</div>
	<div class="boxcontent">
	<h1>
	<?php 
	//echo $_POST["categoria"];
	$cat=getcategoria(getnifcategoria($_SESSION["nif"])); 
	echo $cat["nombre"]; ?>
	</h1></br>
	Mostrar Autor:<?php if(getnifautordisplay($_SESSION["nif"])=="1")echo "SI";else echo "NO"; ?></br>
	Mostrar Fecha:<?php if(getniffechadisplay($_SESSION["nif"])=="1")echo "SI";else echo "NO"; ?></br>
	<button class="edit">Editar</button>
	</div>
</div>

<div class="box" id="niftitulo">
	<div class="header"><input type="checkbox"/>Titulo</div>
	<div class="boxcontent"></div>
</div>

<div class="box" id="nifcontenido">
	<div class="header"><input type="checkbox"/>Contenido</div>
	<div class="boxcontent"></div>
</div>

<div class="box" id="niffoto">
	<div class="header"><input type="checkbox"/>Foto</div>
	<div class="boxcontent"></div>
</div>

<div class="box" id="nifgaleria">
	<div class="header"><input type="checkbox"/>Galeria</div>
	<div class="boxcontent"></div>
</div>

<div class="box" id="nifvideo">
	<div class="header"><input type="checkbox"/>Video</div>
	<div class="boxcontent"></div>
</div>

<div class="box" id="nifaudio">
	<div class="header"><input type="checkbox"/>Audio</div>
	<div class="boxcontent"></div>
</div>

<?php
 }else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>