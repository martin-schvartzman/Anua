<?php 
session_start();
include('/modulos/sql/consultas.php');//addusuario("adminis","administra");
$sub="";
$array=explode(".",$_SERVER['HTTP_HOST']);
if(count($array) == 4){
$sub=$array[0];
}
$subdominio=$sub;
if(!(isset($_SESSION["usuario"])) || isset($_POST["user"]) || isset($_POST["pass"])){
$_SESSION["usuario"]=0;
$user=isset($_POST["user"])?$_POST["user"]:"";
$pass=isset($_POST["pass"])?$_POST["pass"]:"";
$_SESSION["usuario"]=idusuario($user,$pass);
}
if($subdominio=="www"){
include("redirect.php");
}else if($subdominio=="admin"){
include("admin.php");
}else if($subdominio=="prueba"){
include("prueba.php");
}else if($subdominio!=""){
include("redirect.php");
}else{

if(isset($_GET["fileinclude"])){
include("/modulos/".$_GET["fileinclude"].".php");
}else{
include("/modulos/main.php");
}

addusuario("martin12","martin12");


function urlear($x){
return str_replace("&aacute;","a",
str_replace("&uacute;","u",
str_replace("&eacute;","e",
str_replace("&oacute;","o",
str_replace("&iacute;","i",
str_replace("&ntilde;","n",
str_replace(" ","-",
$x)))))));
}

function visitar(){
	$ip=$_SERVER['REMOTE_ADDR'];
	$sql="insert into visitas (ip,server) values ('".$ip."','')";
	query($sql);
}


visitar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<link rel="shortcut icon" href="/contenidos/favicon.ico">
		<link rel="stylesheet" type="text/css" href="/css/main.css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script>
		<title><?php titulo(); ?>Asociacion Pro Naciones Unidas Argentina</title>
		<meta name="description" content="<?php descripcion(); ?>" />
		<meta name="keywords" content="<?php keywords(); ?>" />
		<meta name="author" content="Brainstorm-DD" />
		<?php script(); ?>
		<!--<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />-->
	</head>
	<body>
		<center>
			<div id="main">
				<div id="encabezado">
					<object style="float:left;margin-left:49px;" type="application/x-shockwave-flash" data="/contenidos/cabecera/anua-logo.swf" width="132px" height="126px"> 
						<param name="movie" value="/contenidos/cabecera/anua-logo.swf"/> 
						<param name="bgcolor" value="EFEBE7" /> 
						<param name="wmode" value="transparent" />
					</object>
				</div>
				<div id="mainwrap">
					<div id="wrap1">
						<div id="botonera">
						<?php include("/modulos/frame/botonera.php"); ?>
						</div>
						<div id="buscador" style="visibility:hidden;">
							<div style="height:58px;width:185px;background-image:url('/contenidos/buscador/top.gif');"></div>
							<div style="height:33px;">
								<div style="height:33px;float:left;width:25px;background-image:url('/contenidos/buscador/left.gif');"></div>
								<div style="height:33px;float:left;width:152px;">
								<input type="text" style="height:25px;width:130px;background-image:url('/contenidos/buscador/buscar.gif');"/>
								<input type="submit" value="" style="height:25px;width:15px;background-image:url('/contenidos/buscador/boton.gif');"/>
								</div>
								<div style="height:33px;float:left;width:8px;background-image:url('/contenidos/buscador/right.gif');"></div>
							</div>
							<div style="height:49px;width:185px;background-image:url('/contenidos/buscador/bottom.gif');"></div>
						</div>
						<div id="patrocinados1">
						<?php include("/modulos/frame/patrocinados1.php"); ?>
						</div>
					</div>
				<div id="wrap5">
					<div id="wrap4">
						<div id="wrap2">
							<?php // echo '<img src="/imagenes/1.jpg" style="height:420px;"/>'; ?>
							<div id="pageheader" style="height:164px;">
							<?php pageheader(); ?>
							</div>
							<div id="content"  style="min-height:600px;">
							<?php  pagecontent(); ?>
							</div>
						
							<div id="pie">
								<div style="height:19px;">
									<div class="odm" style="background-image:url('/contenidos/imagenes/pie/odm-1.png');">
										<a href="http://magiaytrucos.com.ar/sub-odm/82/Primer-Objetivo.html">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</div>
									<div class="odm" style="background-image:url('/contenidos/imagenes/pie/odm-2.png');">
										<a href="http://magiaytrucos.com.ar/sub-odm/83/Segundo-Objetivo.html">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</div>
									<div class="odm" style="background-image:url('/contenidos/imagenes/pie/odm-3.png');">
										<a href="http://magiaytrucos.com.ar/sub-odm/84/Tercer-Objetivo.html">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</div>
									<div class="odm" style="background-image:url('/contenidos/imagenes/pie/odm-4.png');">
										<a href="http://magiaytrucos.com.ar/sub-odm/85/Cuarto-Objetivo.html">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</div>
									<div class="odm" style="background-image:url('/contenidos/imagenes/pie/odm-5.png');">
										<a href="http://magiaytrucos.com.ar/sub-odm/86/Quinto-Objetivo.html">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</div>
									<div class="odm" style="background-image:url('/contenidos/imagenes/pie/odm-6.png');">
										<a href="http://magiaytrucos.com.ar/sub-odm/87/Sexto-Objetivo.html">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</div>
									<div class="odm" style="background-image:url('/contenidos/imagenes/pie/odm-7.png');">
										<a href="http://magiaytrucos.com.ar/sub-odm/88/Septimo-Objetivo.html">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</div>
									<div class="odm" style="background-image:url('/contenidos/imagenes/pie/odm-8.png');">
										<a href="http://magiaytrucos.com.ar/sub-odm/89/Octavo-Objetivo.html">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</div>
									<div class="odm" style="background-image:url('/contenidos/imagenes/pie/odm-9.png');">
										<a href="http://magiaytrucos.com.ar/sub-odm/90/Noveno-Objetivo.html">
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</div>
								</div>
								<div style="height:21px;background-image:url('/contenidos/imagenes/pie/odm-pie.png');"></div>
								<div style="height:33px;
								background-image:url('/contenidos/imagenes/pie/odm.png');
								background-repeat:no-repeat;"></div>
								<div style="height:25px;background-image:url('/contenidos/imagenes/pie/odm-pie-.png');"></div>
							</div>
						</div>
						<div id="wrap3">
							<div style="height:875px;">
								<div id="wrap3a">
									<div id="seccionmultimedia"><a target="_blank" href="/multimedio/pop_up.html"><div style="height:150px;"></div></a>
										<div style="margin-left:15px;padding-top:56px;">
											
											<div style="float:left;margin-right:34px;">
												<div style="height:13px;width:91px;"><a target="_blank" href="http://anuaobserva.blogspot.com/"><img src="/contenidos/multimedio/anua_observa.jpg"/></a></div>
												<div style="height:13px;width:91px;"><a target="_blank" href="http://bloganua.blogspot.com/"><img src="/contenidos/multimedio/blog_anua.jpg"/></a></div>
											</div>
											<div style="float:left;height:26px;"><a target="_blank" href="http://twitter.com/#!/Anua1946"><img src="/contenidos/multimedio/tw.jpg"/></a></div>
											<div style="float:left;height:26px;"><a target="_blank" href="http://www.facebook.com/group.php?gid=101791829946"><img src="/contenidos/multimedio/fc.jpg"/></a></div>
										</div>
									</div>
									<div id="side">
										<div style="background-image:url('/imagenes/paises.gif');height:18px;width:168px;position:relative;
top: 162px;
left: 6px;"></div>
									<?php pageside(); ?>
									</div>
								</div>
								<div id="wrap3b">
									<a target="_blank" href="http://www.onu.org.ar/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-onu.png"/></a>
									<a target="_blank" href="http://www.undp.org.ar/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-pnud.png"/></a>
									<a target="_blank" href="http://www.unic.org.ar/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-cinu.png"/></a>
									<a target="_blank" href=""><img src="/contenidos/frames/barra-derecha/home-asociaciones-unfpa.png"/></a>
									<a target="_blank" href="http://www.unicef.org/spanish/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-unicef.png"/></a>
									<a target="_blank" href=""><img src="/contenidos/frames/barra-derecha/home-asociaciones-fao.png"/></a>
									<a target="_blank" href="http://www.eclac.org/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-cepal.png"/></a>
									<a target="_blank" href="http://www.acnur.org/t3/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-acnur.png"/></a>
									<a target="_blank" href="http://www.oimconosur.org/inicio/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-iomi.png"/></a>
									<a target="_blank" href="http://www.unesco.org/new/es/unesco/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-unesco.png"/></a>
									<a target="_blank" href="http://www.achnu.cl/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-achnu.png"/></a>
									<a target="_blank" href="http://www.acnu.org.cu/Inicio/tabid/36/Default.aspx"><img src="/contenidos/frames/barra-derecha/home-asociaciones-aenu.png"/></a>
									<a target="_blank" href="http://anuv.net/enlaces_y_contacto.htm"><img src="/contenidos/frames/barra-derecha/home-asociaciones-anuv.png"/></a>
									<a target="_blank" href="http://www.ajnupcusco.es.tl/%BFQuienes-somos-f-.htm/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-fmanu.png"/></a>
									<a target="_blank" href="http://www.amnu.org.mx/"><img src="/contenidos/frames/barra-derecha/home-asociaciones-amnu.png"/></a>
								</div>
							</div>
							<div>
								<div id="homeposts">
									<div><?php include("/modulos/frame/homeposts.php"); ?></div>
								</div>
								<div id="patrocinados2">
									<div><?php include("/modulos/frame/patrocinados2.php"); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				</div>
			</div>
			
		</center>
	</body>
</html>
<?php } ?>
