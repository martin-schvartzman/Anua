<?php 
@session_start();
include("../sql/consultas.php");
if($_SESSION["usuario"]>0 && isset($_SESSION["nif"])){

if(isset($_POST["editcategoria"])){

if( !privilegioscheckadd($_SESSION["usuario"],$_POST["editcategoria"]) )$_POST["editcategoria"]="0";

if($_POST["editcategoria"]=="0"){
?>	<h1>
	<?php 
	$cat=getcategoria(getnifcategoria($_SESSION["nif"])); 
	echo $cat["nombre"]; ?>
	</h1></br>
	Mostrar Autor:<?php if(getnifautordisplay($_SESSION["nif"])=="1")echo "SI";else echo "NO"; ?></br>
	Mostrar Fecha:<?php if(getniffechadisplay($_SESSION["nif"])=="1")echo "SI";else echo "NO"; ?></br>
	<button onclick="$('#nifcategoria .boxcontent').load('/modulos/admin/editnifcategoria.php');">Editar</button>
<?php
}else{
if($_POST["f"]=="true"){addniffechadisplay($_SESSION["nif"],1);}else{addniffechadisplay($_SESSION["nif"],0);}
if($_POST["a"]=="true"){addnifautordisplay($_SESSION["nif"],1);}else{addnifautordisplay($_SESSION["nif"],0);}
editniffecha($_SESSION["nif"],$_POST["d"],$_POST["m"],$_POST["y"]);
addnifcategoria($_SESSION["nif"],$_POST["editcategoria"]);
?>
	<h1>
	<?php 
	$cat=getcategoria(getnifcategoria($_SESSION["nif"])); 
	echo $cat["nombre"]; ?>
	</h1></br>
	Mostrar Autor:<?php if(getnifautordisplay($_SESSION["nif"])=="1")echo "SI";else echo "NO"; ?></br>
	Mostrar Fecha:<?php if(getniffechadisplay($_SESSION["nif"])=="1")echo "SI";else echo "NO"; ?></br>

	<button onclick="$('#nifcategoria .boxcontent').load('/modulos/admin/editnifcategoria.php');">Editar</button>
<?php
}

}else{
?>
<script>
$(document).ready(function(){
	$("#sendnewcategoria").click(function(){
		var autor=$('#autor:checked').val() != undefined;
		var fecha=$('#fecha:checked').val() != undefined;
		var dia=$('#d').val();
		var mes=$('#m').val();
		var anio=$('#y').val();
		$("#nifcategoria .boxcontent").load("/modulos/admin/editnifcategoria.php",
		{editcategoria:$("#idcategoria").val(),a:autor,f:fecha,d:dia,m:mes,y:anio});
	});
	$("#cancelnewcategoria").click(function(){
		$("#nifcategoria .boxcontent").load("/modulos/admin/editnifcategoria.php",
		{editcategoria:0});
	});
});

</script>
<br/><br/>
Categoria:
<select id="idcategoria">
<?php
$ca=getcategoria(getnifcategoria($_SESSION["nif"]));
echo "<option value='".$ca["id"]."'>";
echo $ca["nombre"];
echo "</option>";
$cat=getcategorias();
foreach($cat as $c){


if(privilegioscheckadd($_SESSION["usuario"],$c["id"]) ){

if($c["id"] != $ca["id"]){
echo "<option value='".$c["id"]."'>";
echo $c["nombre"];
echo "</option>";
}


$sub=getsubcategorias($c["id"]);
foreach($sub as $s){


if($s["id"] != $ca["id"]){
echo "<option value='".$s["id"]."'>";
echo $c["nombre"]."---".$s["nombre"];
echo "</option>";
}


}

}




}
?>
</select>

<input type="checkbox" id="autor" 
<?php if(getnifautordisplay($_SESSION["nif"])=="1")echo "checked"; ?>
/>Display Autor 
<input type="checkbox" id="fecha" 
<?php if(getniffechadisplay($_SESSION["nif"])=="1")echo "checked"; ?>
/>Display Fecha<br/>
	Dia<select id="d">
	<?php $fech= new DateTime(getniffecha($_SESSION["nif"])); ?>
	<?php echo "<option value='".$fech->format('d')."'>".$fech->format('d')."</option>"; ?>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
	</select>
	Mes<select id="m">
	<?php echo "<option value='".$fech->format('m')."'>".$fech->format('m')."</option>"; ?>
	<option value="1">enero</option>
	<option value="2">febrero</option>
	<option value="3">marzo</option>
	<option value="4">abril</option>
	<option value="5">mayo</option>
	<option value="6">junio</option>
	<option value="7">julio</option>
	<option value="8">agosto</option>
	<option value="9">septiembre</option>
	<option value="10">octubre</option>
	<option value="11">noviembre</option>
	<option value="12">diciembre</option>
	</select>
	Anio<select id="y">
	<?php echo "<option value='".$fech->format('Y')."'>".$fech->format('Y')."</option>"; ?>
	<?php
	for($i=1985;$i<2020;$i++){
	echo "<option value=".$i.">".$i."</option>";
	}
	?></select><br/>
<br/><br/>
<button id="sendnewcategoria">Enviar</button> <button id="cancelnewcategoria">Cancelar</button>

<?php
}


 }else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/>
Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>