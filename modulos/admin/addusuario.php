<?php
session_start();
include("../sql/consultas.php");
if($_SESSION["usuario"]>0  && isadmin($_SESSION["usuario"]) ){
		$cat=getcategorias();

		$checkerrors=false;
		if(isset($_POST["add_user"])){
		$checkerrors=useravailable($_POST["add_user"]);
		}
		if(isset($_POST["add_pass"]) && isset($_POST["add_repass"]) && $checkerrors){
		if($_POST["add_pass"] == ""){$checkerrors=false;}
		else{if($_POST["add_pass"] != $_POST["add_repass"] || !$checkerrors){$checkerrors=false;}}
		}
		
		if(isset($_POST["addusuario"]) && $checkerrors){
			
			
			$id=addusuario($_POST["add_user"],$_POST["add_pass"]);
			if($_POST["add_admin"]=="false"){
			deladmin($id);
				foreach($cat as $c){
				
				$add=$_POST["add_privadd".$c["id"]]=="true"?1:0;
				$edit=$_POST["add_privedit".$c["id"]]=="true"?1:0;
				$del=$_POST["add_privdel".$c["id"]]=="true"?1:0;
				
				addprivilegios($id,$c["id"],$add,$del,$edit);
				}
			}
			
			echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>OK</div>";
			include("usuarios.php");
			
		}else{
		?>
		<script>
		$(document).ready(function(){
			
			$("#cancelnewuser").click(function(){
				$("#cont").load("/modulos/admin/usuarios.php");
			});
			
			$("#sendnewuser").click(function(){
			
				var adduser=$("#add_user").val();
				var addpass=$("#add_pass").val();
				var addrepass=$("#add_repass").val();
				var addadmin=$("#add_admin:checked").val() != undefined;
				//alert(addadmin);
				<?php
				
				//var_dump($cat);
				foreach($cat as $c){
				
				echo "var addprivadd".$c["id"]."=$('#add_privadd".$c["id"].":checked').val() != undefined;";
				echo "var addprivedit".$c["id"]."=$('#add_privedit".$c["id"].":checked').val() != undefined;";
				echo "var addprivdel".$c["id"]."=$('#add_privdel".$c["id"].":checked').val() != undefined;";
				
				}
				?>
				$("#cont").load("/modulos/admin/addusuario.php",
				{
					addusuario:"hola",
					add_user:adduser,
					add_pass:addpass,
					add_repass:addrepass,
					add_admin:addadmin
					<?php
					$cat=getcategorias();
					foreach($cat as $c){
					
					
					echo ",add_privadd".$c["id"].":addprivadd".$c["id"];
					echo ",add_privedit".$c["id"].":addprivedit".$c["id"];
					echo ",add_privdel".$c["id"].":addprivdel".$c["id"];
				
					}
					?>
				}
				);
			});
		
		});
		</script>
		<div class="box">
			<div class="header">Nuevo Usuario<button onclick="$('#cont').load('./modulos/admin/usuarios.php');" style="float:right;">Cancelar</button></div>
		<div class="boxcontent">
		
			<table>
				<tr><td>Usuario</td><td><input type="text" id="add_user"/></td></tr>
				<tr><td>Password</td><td><input type="password" id="add_pass"/></td></tr>
				<tr><td>Reingrese Password</td><td><input type="password" id="add_repass"/></td></tr>
				<tr><td>Administrador</td><td><center><input type="checkbox" id="add_admin" value=""></center></td></tr>
				<?php
				
				
				//var_dump($cat);
				foreach($cat as $c){
					echo "<tr>";
						echo "<td>";
						echo $c["nombre"];
						echo "</td>";
						echo "<td>";
							echo "Add<input type=\"checkbox\" id=\"add_privadd".$c["id"]."\"> ";
							echo "Edit<input type=\"checkbox\" id=\"add_privedit".$c["id"]."\"> ";
							echo "Delete<input type=\"checkbox\" id=\"add_privdel".$c["id"]."\"> ";
						echo "</td>";
					echo "</tr>";
				}
				
				?>
				<tr><td><br/><button id="sendnewuser">Enviar</button></td><td></td></tr>
			</table>
		
		</div>
		</div>
		<style>
		#addusuario{display:none;}
		</style>
		<?php
		
		include("usuarios.php");
		}
		  
		  
		  
}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
//var_dump( isadmin($_POST["id"]));
include("usuarios.php");
}
?>