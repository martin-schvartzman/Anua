
<?php
$sql="select distinct nif.id as nif,
nif.titulo as titulo,
nif.categoria as cat,
nif.foto as foto,
 dayofmonth(nif.fecha) as d,
 month(nif.fecha) as m,
 year(nif.fecha) as y
from nif
where nif.id in(select nif from relniftags where tag=2) and 
nif.fecha > now() - interval 50 week 
order by fecha desc";
$post=query($sql);
$cant=mysql_num_rows(mysql_query($sql));
?>
<script>
var cant=<?php echo $cant; ?>;
var curr=1;
$(document).ready(function (){
	$(".agenda_evento").mouseover(function (){
		//$(this).children(".agenda_foto").css("border","10px solid black");
		$(this).children(".agenda_descripcion").css("background","url('/contenidos/agenda/boton.png') -120px 0");
		$(this).children(".agenda_fecha").css("background","url('/contenidos/agenda/fecha.png') -120px 0");
	});
	$(".agenda_evento").mouseout(function (){
		//$(this).children(".agenda_foto").css("border","0px solid black");
		$(this).children(".agenda_descripcion").css("background","url('/contenidos/agenda/boton.png')");
		$(this).children(".agenda_fecha").css("background","url('/contenidos/agenda/fecha.png')");
	});
	$("#agenda_prev").click(function (){
		$("#agenda_eventos").scrollLeft($("#agenda_eventos").scrollLeft() - 120);
		//alert($("#agenda_eventos").scrollLeft());
	});
	$("#agenda_next").click(function (){
		$("#agenda_eventos").scrollLeft($("#agenda_eventos").scrollLeft() + 120);
		//alert($("#agenda_eventos").scrollLeft());
	});
});
</script>
<!--
<div class="agenda_evento">
	<div class="agenda_foto">
		<img style="width:118px;height:48px;" src="/contenidos/agenda/prueba.png" />
	</div>
	<div class="agenda_fecha">
		01 / 10 / 2010
	</div>
	<div class="agenda_descripcion"></div>
</div>
-->
<div id="agenda">
	<div id="agenda_contenido">
		<div id="agenda_eventos">
			<div id="agenda_slide">
				<?php
				//var_dump($post);
				foreach($post as $p){
					if($p["foto"] == 0)
					$foto["link"]="https://lh6.googleusercontent.com/-s-EscXmA6E0/Tm0h35eJyuI/AAAAAAAAAVM/-I99EOorZu8/anua_STIKER.png"; 
					else 
					$foto=getfoto($p["foto"]);
					
					if($p["titulo"] == 0)
					$tit["texto"]="";
					else
					$tit=gettitulo($p["titulo"]);
					$c=getcategoria(getnifcategoria($p["nif"]));
					$titulo=getniftitulo($p["nif"]);
					$titulo=gettitulo($titulo);
					$texto=str_replace(" ","-",$titulo["texto"]);
					$texto=str_replace(".","-",$texto);
					$texto=str_replace("ñ","n",$texto);
					$texto=str_replace("&ntilde;","n",$texto);
					//if($c["padre"]==0)
						$url="/".$c["nombre"]."/post/".$p["nif"]."/".$texto.".html";
						$url=str_replace(" ","-",$url);
						$url=str_replace("&eacute;","e",$url);
						$url=str_replace("&aacute;","a",$url);
						$url=str_replace("&iacute;","i",$url);
						$url=str_replace("&oacute;","o",$url);
						$url=str_replace("&uacute;","u",$url);
						$url=str_replace("%","-",$url);
						$url=str_replace(" ","-",$url);
						$url=str_replace(".","-",$url);
						
					?>
					<a href="<?php echo $url;?>">
					<div class="agenda_evento">
						<div class="agenda_foto">
							<img style="width:118px;height:48px;" src="<?php echo $foto["link"]; ?>" />
						</div>
						<div class="agenda_fecha">
						<?php echo $p["d"]." / ".$p["m"]." / ".$p["y"]; ?>
						</div>
						<div class="agenda_descripcion"><?php echo $tit["texto"]; ?></div>
					</div>
					</a>
					<?php
				}
				?>
			</div>
			
		</div>
		<div id="agenda_barra">
			<div id="agenda_barra_info">mostrando 4 de <?php echo $cant; ?></div>
			<div id="agenda_barra_botones">
				<div id="agenda_prev"></div>
				<div id="agenda_next"></div>
			</div>
		</div>
	</div>
</div>

<style>
#agenda{
background-image:url('/contenidos/agenda.jpg');
height:165px;
width:500px;
padding-top:45px;
}

#agenda_contenido{
height:175px;
width:480px;
}

#agenda_eventos{
height:140px;
width:480px;
overflow:hidden;
}
#agenda_barra{
padding-top:4px;
height:21px;
width:480px;
background-image:url('/contenidos/agenda/barra.png');
}

#agenda_barra_info{
height:20px;
float:left;
}

#agenda_barra_botones{
height:20px;
width:60px;
float:right;
background-image:url('/contenidos/agenda/barra.png');
}

#agenda_prev{
float:left;
width:30px;
height:20px;
background-image:url('/contenidos/agenda/flecha-prev.png');
cursor:hand;
cursor:pointer;
}
#agenda_next{
float:left;
width:30px;
height:20px;
background-image:url('/contenidos/agenda/flecha-next.png');
cursor:hand;
cursor:pointer;
}

.agenda_evento{
height:140px;
width:120px;
float:left;
cursor:hand;
cursor:pointer;
}

.agenda_foto{
height:48px;
width:118px;
padding:1px;
}

.agenda_foto:hover{
cursor:hand;
cursour:pointer;
}

.agenda_descripcion{
background-image:url('/contenidos/agenda/boton.png');
height:60px;
width:120px;
}

.agenda_descripcion:hover{
background:url('/contenidos/agenda/boton.png') -120px 0;
cursor:hand;
cursor:pointer;
}

.agenda_fecha{
background-image:url('/contenidos/agenda/fecha.png');
padding-top:10px;
height:20px;
width:120px;
text-align:left;
}
#agenda_slide{
width:<?php echo ($cant * 120) + 50; ?>px;
height:140px;
}
</style>