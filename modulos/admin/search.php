<?php 
@session_start();
include("../sql/consultas.php");
if($_SESSION["usuario"]>0){
?>
<div id="query">
<center>
<table>
<tr>
	<td rowspan="2">
		<button  style="width:100px;" onclick="$('#result').load('/modulos/admin/gettodos.php');">
		Todos</button>
	</td>
	<td rowspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td rowspan="4">
		<button  style="width:150px;"
		onclick="$('#result').load('/modulos/admin/adminsearch.php',
		{
		aut:$('#autor').val(),
		cat:$('#categoria').val(),
		tag:$('#tag').val(),
		key:$('#keyword').val()
		}
		);"
		>Buscar</button>&nbsp;&nbsp;&nbsp;
	</td>
	<td>
		Autor:
	</td>
	<td>
		<select  style="width:200px;" id="autor">
		<option value="0">-------------</option>
		<?php
		$usr=getusuarios();
		foreach($usr as $u){
		echo "<option value='".$u["id"]."'>";
		echo $u["user"];
		echo "</option>";
		}
		?>
		</select>
	</td>
</tr>
<tr>
	<td>
		Categoria:
	</td>
	<td>
		<select  style="width:200px;" id="categoria">
		<option value="0">-------------</option>
		<?php
		$cat=getcategorias();
		foreach($cat as $c){
		echo "<option value='".$c["id"]."'>";
		echo $c["nombre"];
		echo "</option>";
		$sub=getsubcategorias($c["id"]);
		foreach($sub as $s){
		echo "<option value='".$s["id"]."'>";
		echo $c["nombre"]."---".$s["nombre"];
		echo "</option>";
		}
	
		}
		?>
		</select>
	</td>
</tr>
<tr>
	<td rowspan="2">
		<button  style="width:100px;" onclick="$('#result').load('/modulos/admin/getborradores.php');">
		Borradores</button>
	</td>
	<td>
		Tag:
	</td>
	<td>
		<select  style="width:200px;" id="tag">
		<option value="0">-------------</option>
		<?php
		$tag=gettags();
		foreach($tag as $t){
		echo "<option value='".$t["id"]."'>";
		echo $t["tag"];
		echo "</option>";
		}
		?>
		</select>
	</td>
</tr>
<tr>
	<td>
		Keywords:
	</td>
	<td>
		<input type="text" id="keyword" style="width:200px;"/>
	</td>
</tr>
	
</table>
</center>
</div>
<div id="result"></div>
<?php
 }else{echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";};
 
 ?>