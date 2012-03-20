<?php
function generate($p){
$cat=getnifcategoria($p);
if(getniftitulo($p)!=0){
$titulo=gettitulo(getniftitulo($p));
$titulo["texto"]="[titulo-global]".$titulo["texto"]."[/titulo-global]";
}

if(getnifcontenido($p)!=0){
$contenido=getcontenido(getnifcontenido($p));
$contenido["texto"]="[contenido-global]".$contenido["texto"]."[/contenido-global]";
}


if(getnifgaleria($p)!=0){
$gal=getgaleria(getnifgaleria($p));
$gal["picasa"]=$gal["picasa"];
}

if(getniffoto($p)!=0){
$foto=getfoto(getniffoto($p));
$foto["texto"]="[foto-global]".$foto["texto"]."[/foto-global]";
}

if(getnifvideo($p)!=0){
$video=getvideo(getnifvideo($p));
}

?>
<div class="post">
	<div class="titulo" style="padding-left:10px;padding-right:20px;">
	<?php
	if(isset($titulo)){
	echo estilizar($titulo["texto"]);
	}
	?>
	</div>
	<div class="video" style="padding:10px;">
	<?php if(isset($video)){ 
	if($video["tipo"]=="2"){
	?>
	<!--vimeo-->
	<iframe src="http://player.vimeo.com/video/<?php echo trim($video["link"]);?>?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
	<?php }
	if($video["tipo"]=="1"){
	?>
	<!--youtube-->
	<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo trim($video["link"]);?>" frameborder="0" allowfullscreen></iframe>
	<?php
	}
	} ?>
	</div>
	<div class="imagen">
	<?php if(isset($foto)){ ?>
		<div style="padding:10px;">
			<div>
			<img 
			alt="<?php echo limpiar($foto["texto"]); ?>"
			src="<?php echo $foto["link"]; ?>"   
			style="width:<?php echo $foto["width"]; ?>px;  
			height:<?php echo $foto["height"]; ?>px;"/>
			</div>
			<div style="width:<?php echo $foto["width"]; ?>px;"><?php
			
			echo estilizar($foto["texto"]);
			
			?></div>
		</div>
	<?php } ?>
	</div>
	<div class="contenido" style="padding-left:10px;padding-right:20px;text-align:justify;">
	<?php
	if(isset($contenido)){
	echo nl2br(estilizar($contenido["texto"]));
	}
	?>
	</div>
	<div class="galeria" style="padding-left:10px;padding-right:20px;">
	<?php if(isset($gal)){ ?>
	<center>
	<embed type="application/x-shockwave-flash" src="https://picasaweb.google.com/s/c/bin/slideshow.swf" 
	width="288" height="192" 
	flashvars="host=picasaweb.google.com&hl=es&feat=flashalbum&RGB=0x000000&feed=https%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F111178065589410357192%2Falbumid%2F<?php echo $gal["picasa"]; ?>%3Falt%3Drss%26kind%3Dphoto%26hl%3Des"
	pluginspage="http://www.macromedia.com/go/getflashplayer"></embed></center>
	<?php } ?>
	</div>
	<div class="audio" style="padding-left:10px;padding-right:20px;"></div>
	
</div>
<?php
}


?>