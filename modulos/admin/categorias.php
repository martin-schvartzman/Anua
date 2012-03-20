<?php 
@session_start();
include("../sql/consultas.php");
if($_SESSION["usuario"]>0){
?>
<script>
$(document).ready(function (){
	$(".header button.edit").click(function(){
		$(".boxcontent").each(function(index){
			$(this).html("");
		});
		$("#content" + $(this).attr("cod")).html("Cargando consulta");
		$("#content" + $(this).attr("cod")).load("./modulos/admin/editcategoria.php",{editid:$(this).attr("cod")});
	});
	$(".header button.del").click(function(){
		$("#cont").html("Cargando consulta");
		$("#cont").load("./modulos/admin/delcategoria.php",{id:$(this).attr("cod")});
	});
	$("button.add").click(function(){
		$("#cont").html("Cargando consulta");
		$("#cont").load("./modulos/admin/addcategoria.php");
	});
});
</script>
<br/>
<button class="add" id="addcategoria">
Nueva Categoria
</button>
<?php
$usrs=getcategorias();
foreach($usrs as $u){
?>
<div class="box">
	<div class="header"><?php echo $u["nombre"]; ?>
		<button class="edit" cod="<?php echo $u["id"]; ?>">Editar</button>
		<button class="del" cod="<?php echo $u["id"]; ?>">Eliminar</button></div>
	<div class="boxcontent" id="content<?php echo $u["id"]; ?>"></div>
</div>
<?php
}


 }else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>