<?php
$p1=query("select foto from nif where categoria=47");
foreach($p1 as $p){
$f=getfoto($p["foto"]);
echo "<div style='padding:5px;'>";
echo "<img src='".$f["link"]."' style='height:".$f["height"]."px;width:".$f["width"]."px;' />";
echo "</div>";
}


?>