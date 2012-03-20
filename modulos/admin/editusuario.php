<?php
session_start();
include("../sql/consultas.php");
if($_SESSION["usuario"]>0  && isadmin($_SESSION["usuario"])  && (isset($_POST["editid"]) || isset($_POST["editusuario"])) ){
		$cat=getcategorias();
		
		if(isset($_POST["editusuario"])){
			$id=$_POST["editusuario"];
			
			if(
			(isadmin($_SESSION["usuario"]) && !(isadmin($_POST["editusuario"]))) ||
			($_SESSION["usuario"]==$_POST["editusuario"])                        &&
			($_POST["edit_pass"] != "")
			)
			editusuario($_POST["editusuario"],$_POST["edit_pass"]);
			
			if($_POST["edit_admin"]=="false"){
			deladmin($id);
			if(!isadmin($id)){
				foreach($cat as $c){
				
				$add=$_POST["edit_privadd".$c["id"]]=="true"?1:0;
				$edit=$_POST["edit_privedit".$c["id"]]=="true"?1:0;
				$del=$_POST["edit_privdel".$c["id"]]=="true"?1:0;
				addprivilegios($id,$c["id"],$add,$del,$edit);
				}
				
			}
				
			}else{
			if($_SESSION["usuario"])
				makeadmin($id);
			}
			//var_dump($_POST);
			//echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>OK</div>";
			
		}else{
		?>
		<script>
		$(document).ready(function(){
			
			$("#canceledituser").click(function(){
			
				$("#content<?php echo $_POST["editid"]; ?>").html("");
				
			});
				
			$("#content<?php echo $_POST["editid"]; ?> #sendedituser").click(function(){
			
				var edituser=$("#edit_user").val();
				var editpass=$("#edit_pass").val();
				var editrepass=$("#edit_repass").val();
				var editadmin=$("#edit_admin:checked").val() != undefined;
				//alert(editadmin);
				<?php
				
				//var_dump($cat);
				foreach($cat as $c){
				
				echo "var editprivadd".$c["id"]."=$('#edit_privadd".$c["id"].":checked').val() != undefined;";
				echo "var editprivedit".$c["id"]."=$('#edit_privedit".$c["id"].":checked').val() != undefined;";
				echo "var editprivdel".$c["id"]."=$('#edit_privdel".$c["id"].":checked').val() != undefined;";
				
				}
				?>
				$("#content<?php echo $_POST["editid"]; ?>").load("/modulos/admin/editusuario.php",
				{
					editusuario:<?php echo $_POST["editid"]; ?>,
					edit_pass:editpass,
					edit_admin:editadmin
					<?php
					$cat=getcategorias();
					foreach($cat as $c){
					
					
					echo ",edit_privadd".$c["id"].":editprivadd".$c["id"];
					echo ",edit_privedit".$c["id"].":editprivedit".$c["id"];
					echo ",edit_privdel".$c["id"].":editprivdel".$c["id"];
				
					}
					?>
				}
				);
			});
		
		});
		</script>
		
		
			<table>
				<?php //echo $_POST["editid"]; ?> 
				<tr><td>Nueva Password</td><td><input type="password" id="edit_pass" value=""/></td></tr>
				<tr><td>Administrador</td><td><center><input type="checkbox" id="edit_admin" <?php if(isadmin($_POST["editid"])) 
				{echo "checked";}
				else
				{echo "";}?>></center></td></tr>
				<?php
				
				
				//var_dump($cat);
				foreach($cat as $c){
					$usr=$_POST["editid"];
					$add=privilegioscheckadd($usr,$c["id"])?"checked":"";
					$del=privilegioscheckdel($usr,$c["id"])?"checked":"";
					$edit=privilegioscheckedit($usr,$c["id"])?"checked":"";
					echo "<tr>";
						echo "<td>";
						echo $c["nombre"];
						echo "</td>";
						echo "<td>";
							echo "Add<input type=\"checkbox\" id=\"edit_privadd".$c["id"]."\" ".$add."> ";
							echo "Edit<input type=\"checkbox\" id=\"edit_privedit".$c["id"]."\" ".$edit."> ";
							echo "Delete<input type=\"checkbox\" id=\"edit_privdel".$c["id"]."\" ".$del."> ";
						echo "</td>";
					echo "</tr>";
				}
				
				?>
				<tr><td><br/><button id="sendedituser">Enviar</button></td><td><br/><button id="canceledituser">Cancelar</button></td></tr>
			</table>
		
		
		
		<?php
		
		
		}
		  
		  
		  
}else{
echo "<div class='msj' onclick='$(this).css(\"display\",\"none\");'>Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar</div>";
//var_dump( isadmin($_POST["id"]));
}
?>