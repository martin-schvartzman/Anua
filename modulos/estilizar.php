<?php

function limpiar($txt){


$tags=getcsstags();
foreach($tags as $t){
$n=$t["nombre"];
$b=$t["btext"];
$e=$t["etext"];
$css=getcss($t["css"]);
$css=" style='color:#".$css["color"].";
text-align:".$css["align"].";
font:".$css["font"].";
text-decoration:".$css["decoration"].";
font-style:".$css["style"].";
font-size:".$css["size"]."px;' ";
$txt=str_replace("[".$n."]",$b,$txt);
$txt=str_replace("[/".$n."]",$e,$txt);
}

$txt=htmlspecialchars($txt);
/*
$txt=str_replace("Ñ","&Ntilde;",$txt);
$txt=str_replace("À","&Agrave;",$txt);
$txt=str_replace("Á","&Aacute;",$txt);
$txt=str_replace("È","&Egrave;",$txt);
$txt=str_replace("É","&Eacute;",$txt);
$txt=str_replace("Ì","&Igrave;",$txt);
$txt=str_replace("Í","&Iacute;",$txt);
$txt=str_replace("Ò","&Ograve;",$txt);
$txt=str_replace("Ó","&Oacute;",$txt);
$txt=str_replace("Ù","&Ugrave;",$txt);
$txt=str_replace("Ú","&Uacute;",$txt);
$txt=str_replace("ñ","&ntilde;",$txt);
$txt=str_replace("à","&agrave;",$txt);
$txt=str_replace("á","&aacute;",$txt);
$txt=str_replace("è","&egrave;",$txt);
$txt=str_replace("é","&eacute;",$txt);
$txt=str_replace("ì","&igrave;",$txt);
$txt=str_replace("í","&iacute;",$txt);
$txt=str_replace("ò","&ograve;",$txt);
$txt=str_replace("ó","&oacute;",$txt);
$txt=str_replace("ù","&ugrave;",$txt);
$txt=str_replace("ú","&uacute;",$txt);
*/
$txt=str_replace("[url]","<a href='",$txt);
$txt=str_replace("[/url]","'>Descarga</a>",$txt);
$txt=str_replace("[br]","<br/>",$txt);
$txt=str_replace("[ws]","&nbsp;",$txt);
return $txt;
}

function estilizar($txt){
$tags=getcsstags();
foreach($tags as $t){
$n=$t["nombre"];
$b=$t["btext"];
$e=$t["etext"];
$css=getcss($t["css"]);
$css=" style='color:#".$css["color"].";
text-align:".$css["align"].";
font:".$css["font"].";
text-decoration:".$css["decoration"].";
font-style:".$css["style"].";
font-size:".$css["size"]."px;' ";
$txt=str_replace("[".$n."]","<font".$css.">".$b,$txt);
$txt=str_replace("[/".$n."]",$e."</font>",$txt);
}
$txt=str_replace("Ñ","&Ntilde;",$txt);
$txt=str_replace("À","&Agrave;",$txt);
$txt=str_replace("Á","&Aacute;",$txt);
$txt=str_replace("È","&Egrave;",$txt);
$txt=str_replace("É","&Eacute;",$txt);
$txt=str_replace("Ì","&Igrave;",$txt);
$txt=str_replace("Í","&Iacute;",$txt);
$txt=str_replace("Ò","&Ograve;",$txt);
$txt=str_replace("Ó","&Oacute;",$txt);
$txt=str_replace("Ù","&Ugrave;",$txt);
$txt=str_replace("Ú","&Uacute;",$txt);
$txt=str_replace("ñ","&ntilde;",$txt);
$txt=str_replace("à","&agrave;",$txt);
$txt=str_replace("á","&aacute;",$txt);
$txt=str_replace("è","&egrave;",$txt);
$txt=str_replace("é","&eacute;",$txt);
$txt=str_replace("ì","&igrave;",$txt);
$txt=str_replace("í","&iacute;",$txt);
$txt=str_replace("ò","&ograve;",$txt);
$txt=str_replace("ó","&oacute;",$txt);
$txt=str_replace("ù","&ugrave;",$txt);
$txt=str_replace("ú","&uacute;",$txt);
$txt=str_replace("[url]","<a href='",$txt);
$txt=str_replace("[/url]","'>Descarga</a>",$txt);
$txt=str_replace("[br]","<br/>",$txt);
$txt=str_replace("[ws]","&nbsp;",$txt);
return $txt;
}

?>