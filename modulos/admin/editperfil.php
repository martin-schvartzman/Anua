<?php 
@session_start();
include("../sql/consultas.php");
?>
<script>
$(document).ready(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","powderBlue");
		});
		$("#nif").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
});
</script>

<?php
if(isadmin($_SESSION["usuario"]) && isset($_POST["editnif"])){


$_SESSION["nif"]=$_POST["editnif"];


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
		var flag=$('#nifgaleria .header input:checked').val() != undefined;
		if(flag){
		$("#nifgaleria .boxcontent").html("Cargando modulos,... Por favor espere...");
		$("#nifgaleria .boxcontent").load("/modulos/admin/addnifgaleria.php");
		}else{
		$("#nifgaleria .boxcontent").html("Cargando modulos,... Por favor espere...");
		$("#nifgaleria .boxcontent").load("/modulos/admin/delnifgaleria.php");
		}
	});
	
	$("#niffoto .boxcontent .edit").click(function(){
		$("#niffoto .boxcontent").html("Cargando modulos,... Por favor espere...");
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
 
<button style="float:right;background-color:green;" onclick="$('#cont').load('/modulos/admin/plantillas.php',{editplan:'asd'});">Listo</button>
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
	<div class="header"><input type="checkbox" 
	<?php if(getniftitulo($_SESSION["nif"])!="0")echo "checked"; ?>/>Titulo</div>
	<div class="boxcontent">
	<?php 
	if(getniftitulo($_SESSION["nif"])!="0"){
	?>
	<script>
	$(document).ready(function(){
		$("#niftitulo .boxcontent").load('/modulos/admin/editniftitulo.php');
	});
	</script>
	<?php
	} ?>
	</div>
</div>

<div class="box" id="nifcontenido">
	<div class="header"><input type="checkbox" 
	<?php if(getnifcontenido($_SESSION["nif"])!="0")echo "checked"; ?>/>Contenido</div>
	<div class="boxcontent">
	<?php 
	if(getnifcontenido($_SESSION["nif"])!="0"){
	?>
	<script>
	$(document).ready(function(){
		$("#nifcontenido .boxcontent").load('/modulos/admin/editnifcontenido.php');
	});
	</script>
	<?php
	} ?>
	</div>
</div>

<div class="box" id="nifgaleria">
	<div class="header"><input type="checkbox" 
	<?php if(getnifgaleria($_SESSION["nif"])!="0")echo "checked"; ?>/>Galeria</div>
	<div class="boxcontent">
	<?php 
	if(getnifgaleria($_SESSION["nif"])!="0"){
	?>
	<script>
	$(document).ready(function(){
		$("#nifgaleria .boxcontent").load('/modulos/admin/editnifgaleria.php');
	});
	</script>
	<?php
	} ?>
	</div>
</div>

<div class="box" id="niffoto">
	<div class="header"><input type="checkbox" 
	<?php if(getniffoto($_SESSION["nif"])!="0")echo "checked"; ?>/>Foto</div>
	<div class="boxcontent">
	<?php 
	if(getniffoto($_SESSION["nif"])!="0"){
	?>
	<script>
	$(document).ready(function(){
		$("#niffoto .boxcontent").load('/modulos/admin/editniffoto.php');
	});
	</script>
	<?php
	} ?>
	</div>
</div>

<div class="box" id="nifvideo">
	<div class="header"><input type="checkbox" 
	<?php if(getnifvideo($_SESSION["nif"])!="0")echo "checked"; ?>/>Video</div>
	<div class="boxcontent">
	<?php 
	if(getnifvideo($_SESSION["nif"])!="0"){
	?>
	<script>
	$(document).ready(function(){
		$("#nifvideo .boxcontent").load('/modulos/admin/editnifvideo.php');
	});
	</script>
	<?php
	} ?>
	</div>
</div>

<div class="box" id="nifaudio">
	<div class="header"><input type="checkbox" 
	<?php if(getnifaudio($_SESSION["nif"])!="0")echo "checked"; ?>/>Audio</div>
	<div class="boxcontent">
	<?php 
	if(getnifaudio($_SESSION["nif"])!="0"){
	?>
	<script>
	$(document).ready(function(){
		$("#nifaudio .boxcontent").load('/modulos/admin/editnifaudio.php');
	});
	</script>
	<?php
	} ?>
	</div>
</div>

<?php
 }else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>