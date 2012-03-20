<?php
include("../sql/consultas.php");
$sql="select distinct nif.id as id,nif.fecha as fecha, nif.autor as autor
,titulo.texto as titulo , contenido.texto as cont, nif.estado as estado, categoria.nombre as categoria
 from nif,titulo,contenido,categoria where
 categoria.id=nif.categoria and titulo.id=nif.titulo and contenido.id=nif.contenido and estado=1
 order by nif.fecha desc";

$borr=query($sql);
foreach($borr as $b){
echo "<div class='result' style='height:60px;'>";
$id=$b["id"];
$fecha=$b["fecha"];
$autor=nameusuario($b["autor"]);
$titulo=substr($b["titulo"], 0, 40);
$contenido=substr($b["cont"], 0, 40);;
$estado=$b["estado"];
$categoria=$b["categoria"];
?>

<div style="float:left;width:292px;height:60px;text-align:left;">
<font style="font-size:20px;color:
<?php if($estado==1)echo "green"; else echo "red"; ?>
;"><b>o</b></font>&nbsp;&nbsp;&nbsp;Fecha:<b><?php echo $fecha; ?></b><br/>
Categoria:<b><?php echo $categoria; ?></b><br/>
Autor:<b><?php echo $autor; ?></b><br/>
	
</div>
<div style="float:left;background-color:#eeeeee;width:500px;height:60px;">
	<div style="width:500px;height:40px;text-align:left;">
	Titulo:<b><?php echo $titulo; ?></b><br/>
	Contenido:<?php echo $contenido; ?>
	</div>
	<div style="width:500px;height:20px;">
	<button style="height:20px;float:left;"
	onclick="$('#cont').load('/modulos/admin/editnif.php',{editnif:<?php echo $b["id"]; ?>});">
	Editar</button>
	<button style="height:20px;float:left;"
	onclick="$('#cont').load('/modulos/admin/delnif.php',{delnif:<?php echo $b["id"]; ?>});">
	Eliminar</button>
	<div style="float:right;">ID:<b><?php echo $id; ?></b></div>
	</div>
</div>



 <?php
echo "</div>";
}

?>