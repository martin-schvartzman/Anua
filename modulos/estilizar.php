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
$txt=str_replace("�","&Ntilde;",$txt);
$txt=str_replace("�","&Agrave;",$txt);
$txt=str_replace("�","&Aacute;",$txt);
$txt=str_replace("�","&Egrave;",$txt);
$txt=str_replace("�","&Eacute;",$txt);
$txt=str_replace("�","&Igrave;",$txt);
$txt=str_replace("�","&Iacute;",$txt);
$txt=str_replace("�","&Ograve;",$txt);
$txt=str_replace("�","&Oacute;",$txt);
$txt=str_replace("�","&Ugrave;",$txt);
$txt=str_replace("�","&Uacute;",$txt);
$txt=str_replace("�","&ntilde;",$txt);
$txt=str_replace("�","&agrave;",$txt);
$txt=str_replace("�","&aacute;",$txt);
$txt=str_replace("�","&egrave;",$txt);
$txt=str_replace("�","&eacute;",$txt);
$txt=str_replace("�","&igrave;",$txt);
$txt=str_replace("�","&iacute;",$txt);
$txt=str_replace("�","&ograve;",$txt);
$txt=str_replace("�","&oacute;",$txt);
$txt=str_replace("�","&ugrave;",$txt);
$txt=str_replace("�","&uacute;",$txt);
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
$txt=str_replace("�","&Ntilde;",$txt);
$txt=str_replace("�","&Agrave;",$txt);
$txt=str_replace("�","&Aacute;",$txt);
$txt=str_replace("�","&Egrave;",$txt);
$txt=str_replace("�","&Eacute;",$txt);
$txt=str_replace("�","&Igrave;",$txt);
$txt=str_replace("�","&Iacute;",$txt);
$txt=str_replace("�","&Ograve;",$txt);
$txt=str_replace("�","&Oacute;",$txt);
$txt=str_replace("�","&Ugrave;",$txt);
$txt=str_replace("�","&Uacute;",$txt);
$txt=str_replace("�","&ntilde;",$txt);
$txt=str_replace("�","&agrave;",$txt);
$txt=str_replace("�","&aacute;",$txt);
$txt=str_replace("�","&egrave;",$txt);
$txt=str_replace("�","&eacute;",$txt);
$txt=str_replace("�","&igrave;",$txt);
$txt=str_replace("�","&iacute;",$txt);
$txt=str_replace("�","&ograve;",$txt);
$txt=str_replace("�","&oacute;",$txt);
$txt=str_replace("�","&ugrave;",$txt);
$txt=str_replace("�","&uacute;",$txt);
$txt=str_replace("[url]","<a href='",$txt);
$txt=str_replace("[/url]","'>Descarga</a>",$txt);
$txt=str_replace("[br]","<br/>",$txt);
$txt=str_replace("[ws]","&nbsp;",$txt);
return $txt;
}

?>