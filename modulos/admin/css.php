<?php

function printcss($pre){
?>	
	<style>
	.colores div{float:left;height:15px;width:15px;border:1px solid black;cursor:pointer;cursor:hand;}
	</style>
	<div>
		<table style="border:1px solid black;width:400px;">
			<tr>
				<td>
					color: #<input type="text" style="width:50px;" id="<?php echo $pre; ?>color" value="000000" /><br/>
					<div class="colores">
						<div title="blanco" style="background-color:#ffffff;" onclick="$('#<?php echo $pre; ?>color').attr('value','ffffff');"></div>
						<div title="negro" style="background-color:#000000;" onclick="$('#<?php echo $pre; ?>color').attr('value','000000');"></div>
						<div title="rojo" style="background-color:#ff0000;" onclick="$('#<?php echo $pre; ?>color').attr('value','ff0000');"></div>
						<div title="verde" style="background-color:#00ff00;" onclick="$('#<?php echo $pre; ?>color').attr('value','00ff00');"></div>
						<div title="azul" style="background-color:#0000ff;" onclick="$('#<?php echo $pre; ?>color').attr('value','0000ff');"></div>
						<div title="cian" style="background-color:#00ffff;" onclick="$('#<?php echo $pre; ?>color').attr('value','00ffff');"></div>
						<div title="magenta" style="background-color:#ff00ff;" onclick="$('#<?php echo $pre; ?>color').attr('value','ff00ff');"></div>
						<div title="amarillo" style="background-color:#ffff00;" onclick="$('#<?php echo $pre; ?>color').attr('value','ffff00');"></div>
					</div>
				</td>
				<td>text-decoration:
					<select id="<?php echo $pre; ?>decoration">
						<option value="none">none</option>
						<option value="none">none</option>
						<option value="overline">overline</option>
						<option value="line-through">line-through</option>
						<option value="underline">underline</option>
					</select>
				</td></tr>
			<tr>
				<td>font-size:<input type="text" style="width:50px;" value="15" id="<?php echo $pre; ?>size" />px</td>
				<td>font-style:
					<select  style="width:80px;" id="<?php echo $pre; ?>style">
						<option value="normal">normal</option>
						<option value="italic">italic</option>
						<option value="oblique">oblique</option>
					</select>
				</td></tr>
			<tr>
				<td>text-align:
				<select style="width:50px;" id="<?php echo $pre; ?>align">
						<option value="left">left</option>
						<option value="right">right</option>
						<option value="justify">justify</option>
					</select>
			</td>
			<td>Font-family:
			<select style="width:100px;" id="<?php echo $pre; ?>font">
						<option value="Palatino Linotype, Book Antiqua, Palatino, serif">
						Palatino Linotype, Book Antiqua, Palatino, serif
						</option>
						<option value="Georgia, serif">
						Georgia, serif
						</option>
						<option value="Times New Roman, Times, serif">
						"Times New Roman", Times, serif
						</option>
						<option value="Arial, Helvetica, sans-serif">
						Arial, Helvetica, sans-serif
						</option>
						<option value="Arial Black, Gadget, sans-serif">
						Arial Black, Gadget, sans-serif
						</option>
						<option value="Comic Sans MS, cursive, sans-serif">
						"Comic Sans MS", cursive, sans-serif
						</option>
						<option value="Impact, Charcoal, sans-serif">
						Impact, Charcoal, sans-serif
						</option>
						<option value="Lucida Sans Unicode, Lucida Grande, sans-serif">
						"Lucida Sans Unicode", "Lucida Grande", sans-serif
						</option>
						<option value="Tahoma, Geneva, sans-serif">
						Tahoma, Geneva, sans-serif
						</option>
						<option value="Trebuchet MS, Helvetica, sans-serif">
						"Trebuchet MS", Helvetica, sans-serif
						</option>
						<option value="Verdana, Geneva, sans-serif">
						Verdana, Geneva, sans-serif
						</option>
						<option value="Courier New, Courier, monospace">
						"Courier New", Courier, monospace
						</option>
						<option value="Lucida Console, Monaco, monospace">
						"Lucida Console", Monaco, monospace
						</option>
			</select>
			</td></tr>
		</table>
	</div>
<?php
}



function editcss($pre,$id){
if($id==0){printcss($pre);}else{
$css=getcss($id);
?>
	<style>
	.colores div{float:left;height:15px;width:15px;border:1px solid black;cursor:pointer;cursor:hand;}
	</style>
	<div>
		<table style="border:1px solid black;width:400px;">
			<tr>
				<td>
					color: #<input type="text" style="width:50px;" id="<?php echo $pre; ?>color" value="<?php echo $css["color"]; ?>" /><br/>
					<div class="colores">
						<div title="blanco" style="background-color:#ffffff;" onclick="$('#<?php echo $pre; ?>color').attr('value','ffffff');"></div>
						<div title="negro" style="background-color:#000000;" onclick="$('#<?php echo $pre; ?>color').attr('value','000000');"></div>
						<div title="rojo" style="background-color:#ff0000;" onclick="$('#<?php echo $pre; ?>color').attr('value','ff0000');"></div>
						<div title="verde" style="background-color:#00ff00;" onclick="$('#<?php echo $pre; ?>color').attr('value','00ff00');"></div>
						<div title="azul" style="background-color:#0000ff;" onclick="$('#<?php echo $pre; ?>color').attr('value','0000ff');"></div>
						<div title="cian" style="background-color:#00ffff;" onclick="$('#<?php echo $pre; ?>color').attr('value','00ffff');"></div>
						<div title="magenta" style="background-color:#ff00ff;" onclick="$('#<?php echo $pre; ?>color').attr('value','ff00ff');"></div>
						<div title="amarillo" style="background-color:#ffff00;" onclick="$('#<?php echo $pre; ?>color').attr('value','ffff00');"></div>
					</div>
				</td>
				<td>text-decoration:
					<select id="<?php echo $pre; ?>decoration">
						<option value="<?php echo $css["decoration"]; ?>"><?php echo $css["decoration"]; ?></option>
						<option value="none">none</option>
						<option value="overline">overline</option>
						<option value="line-through">line-through</option>
						<option value="underline">underline</option>
					</select>
				</td></tr>
			<tr>
				<td>font-size:<input type="text" style="width:50px;" value="<?php echo $css["size"]; ?>" id="<?php echo $pre; ?>size" />px</td>
				<td>font-style:
					<select  style="width:80px;" id="<?php echo $pre; ?>style">
						<option value="<?php echo $css["style"]; ?>"><?php echo $css["style"]; ?></option>
						<option value="normal">normal</option>
						<option value="italic">italic</option>
						<option value="oblique">oblique</option>
					</select>
				</td></tr>
			<tr>
				<td>text-align:
				<select style="width:50px;" id="<?php echo $pre; ?>align">
				<option value="<?php echo $css["align"]; ?>"><?php echo $css["align"]; ?></option>
						<option value="left">left</option>
						<option value="right">right</option>
						<option value="justify">justify</option>
					</select>
			</td>
			<td>Font-family:
			<select style="width:100px;" id="<?php echo $pre; ?>font">
			<option value="<?php echo $css["font"]; ?>"><?php echo $css["font"]; ?></option>
						<option value="Palatino Linotype, Book Antiqua, Palatino, serif">
						Palatino Linotype, Book Antiqua, Palatino, serif
						</option>
						<option value="Georgia, serif">
						Georgia, serif
						</option>
						<option value="Times New Roman, Times, serif">
						"Times New Roman", Times, serif
						</option>
						<option value="Arial, Helvetica, sans-serif">
						Arial, Helvetica, sans-serif
						</option>
						<option value="Arial Black, Gadget, sans-serif">
						Arial Black, Gadget, sans-serif
						</option>
						<option value="Comic Sans MS, cursive, sans-serif">
						"Comic Sans MS", cursive, sans-serif
						</option>
						<option value="Impact, Charcoal, sans-serif">
						Impact, Charcoal, sans-serif
						</option>
						<option value="Lucida Sans Unicode, Lucida Grande, sans-serif">
						"Lucida Sans Unicode", "Lucida Grande", sans-serif
						</option>
						<option value="Tahoma, Geneva, sans-serif">
						Tahoma, Geneva, sans-serif
						</option>
						<option value="Trebuchet MS, Helvetica, sans-serif">
						"Trebuchet MS", Helvetica, sans-serif
						</option>
						<option value="Verdana, Geneva, sans-serif">
						Verdana, Geneva, sans-serif
						</option>
						<option value="Courier New, Courier, monospace">
						"Courier New", Courier, monospace
						</option>
						<option value="Lucida Console, Monaco, monospace">
						"Lucida Console", Monaco, monospace
						</option>
			</select>
			</td></tr>
		</table>
	</div>
<?php
}
}

?>