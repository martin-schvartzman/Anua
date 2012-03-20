<?php

function contarvisitas(){
	$sql="select count(distinct ip) as vis from visitas";
	$t=query($sql);
	return $t[0]["vis"];
}

?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<style>
#banner{width:900px;height:120px;background-color:orange;}
.picasa {background-color:white;width:500px;}
.picasa .photo{float:left;padding:5px;}
.picasa .photo img{height:75px;width:75px;cursor:hand;cursor:pointer;padding:5px;}
.picasa .photo img:hover{background-color:blue;}
.tagentry{display:inline;margin-left:3px;padding:4px;background-color:grey;cursor:hand;cursor:pointer;}
.tagentry:hover{background-color:orange;}
#result{padding:20px;}
.result{border:1px solid black;margin:3px;}
body{background-color:#dddddd;font-family:verdana;}
input[type="password"] , input[type="text"], select,textarea{border: 2px inset;}
*{border:0px;margin:0px;padding:0px;}
#main{width:900px;padding:50px;padding-top:10px;}
#btns{height:40px;}
#btns div{margin-left:5px;float:left;background-color:powderBlue;height:30px;padding:5px;cursor:pointer;cursor:hand;font-size:16px;font-family:verdana bold;}
#btns div:hover{color:blue;}
#cont{background-color:GhostWhite;min-height:400px;padding:30px;width:840px;}
.box{margin-top:10px;width:834px;padding:3px;border:0px solid black;background-color:#B0E0E6;}
.header{background-color:#4682B4;width:830px;height:24px;font-size:20px;text-align:left;padding:2px;color:white;}
.header button{float:right;margin-left:5px;}
.boxcontent{min-height:0px;width:834px;}
button{border: 2px outset buttonface;cursor:pointer;cursor:hand;}
.msj{margin-top:10px;margin-bottom:10px;width:800px;padding:3px;border:0px solid black;background-color:red;color:white;cursor:pointer;cursor:hand;}
</style>
<?php if($_SESSION["usuario"]==0){ 
session_destroy();
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<center>
<div id="banner"><img src="/imagenes/admin/encabezado.png" /></div>
<div id="main">
<div id="btns"></div>
<div id="cont">
<div class="box">
<div class="header">Iniciar Sesion</div>
<div class="boxcontent">
<form action="" method="POST">
<table>
	<tr><td>Usuario:</td><td><input type="text" name="user" /></td></tr>
	<tr><td>Password:</td><td><input type="password" name="pass" /></td></tr>
	<tr><td><input type="submit" style="border: 2px outset buttonface;"  value="Aceptar"/></td><td></td></tr>
</table>
</form>
</div>
</div>
</div>
</div>
<div id="footer">
		<!--
		<a href="http://brainstormwebs.com.ar/" style="position:relative;width:150px;">
			<img src="/imagenes/brainstorm.png" style="width:150px;">
		</a>
		-->
	</div>
</center>
<?php }else if($_SESSION["usuario"]>0){ ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////?>
<script>
$(document).ready(function (){
	
	$("#usuarios").click(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","powderBlue");
		});
		$("#usuarios").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
		$("#cont").html("Cargando ventana de Usuarios...");
		$("#cont").load("/modulos/admin/usuarios.php");
	});
	
	$("#categorias").click(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","powderBlue");
		});
		$("#categorias").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
		$("#cont").html("Cargando ventana de Categorias...");
		$("#cont").load("/modulos/admin/categorias.php");
	});
	
	$("#nif").click(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","powderBlue");
		});
		$("#nif").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
		$("#cont").html("Cargando ventana de Post...");
		$("#cont").load("/modulos/admin/nifs.php");
	});
	
	$("#perfil").click(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","powderBlue");
		});
		$("#perfil").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
		$("#cont").load("/modulos/admin/plantillas.php");
	});
	
	$("#textags").click(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","powderBlue");
		});
		$("#textags").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
		$("#cont").html("Cargando ventana de CSS tags...");
		$("#cont").load("/modulos/admin/csstags.php");
	});
	
	$("#niftags").click(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","powderBlue");
		});
		$("#niftags").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
		$("#cont").html("Cargando ventana de Post tags...");
		$("#cont").load("/modulos/admin/niftags.php");
	});
	
	$("#search").click(function(){
		$("#btns div").each(function(index){
			$(this).css("background-color","powderBlue");
		});
		$("#search").css("background-color","GhostWhite");
		$("#sessionout").css("background-color","transparent");
		$("#cont").html("Cargando ventana de Busqueda...");
		$("#cont").load("/modulos/admin/search.php");
	});
	
	$("#cont").load("/modulos/admin/search.php");
});
</script>
<center>
	<div id="banner">
	<img src="/imagenes/admin/encabezado.png" />
			<div style="float:left;">Visitas hasta el dia de hoy:<?php echo contarvisitas(); ?></div>
			<div id="sessionout" style="float:right;background-color:transparent;">
			<form action="" method="POST">
			<input type="hidden" name="user" value="xxxxxxxxxxxxxxxxxxxxxxxxx" />
			<b><u><?php echo nameusuario($_SESSION["usuario"]); ?></u></b>
			<input type="submit" style="border: 2px outset buttonface;
			cursor:pointer;cursor:hand;" value="Cerrar Sesi&oacute;n"/></form></div>
	</div>
	<div id="main">
		<div id="btns">
			<div id="categorias">Categorias</div>
			<div id="nif">Entradas</div>
			<div id="perfil">Plantillas</div>
			<div id="textags">CSS Tags</div>
			<div id="niftags">Post Tags</div>
			<div id="search" style="background-color:GhostWhite;">B&uacute;squeda</div>
			<div id="usuarios">Usuarios</div>
			<div id="rules">Reglas de uso</div>
		</div>
		<div id="cont">
		</div>
	</div>
	<div id="footer">
		<!--
		<a href="http://brainstormwebs.com.ar/" style="position:relative;width:150px;">
			<img src="/imagenes/brainstorm.png" style="width:150px;">
		</a>
		-->
	</div>
</center>
<?php } ?>