<?php

$cat=getcategorias();
foreach($cat as $c){

if($c["id"]==127){
?>
<a href="/">
<div class="categoria" id="cat<?php echo $c["id"]; ?>"
style="background-image:url('<?php echo $c["imagen"]; ?>');
<?php
/*
$cs=query("select * from csstags where nombre='menu1'");
$css=getcss($cs[0]["css"]);?>
color:#ffffff;
text-align:<?php echo $css["align"]; ?>;
font-family:<?php echo $css["font"]; ?>;
text-decoration:<?php echo $css["decoration"]; ?>;
font-style:<?php echo $css["style"]; ?>;
font-size:<?php echo $css["size"];*/ ?>"
>
<?php
//echo $cs[0]["btext"];
 echo $c["nombre"]; 
//echo $cs[0]["etext"]; 
 ?>
</div>
</a>


<?php
}else{

if($c["display"]==1){
?>
<a href="/categoria/<?php echo $c["id"]; ?>/<?php echo str_replace("&eacute;","e",str_replace("&oacute;","o",str_replace("&iacute;","i",str_replace(" ","-",$c["nombre"])))); ?>.html">
<div class="categoria" id="cat<?php echo $c["id"]; ?>"
style="background-image:url('<?php echo $c["imagen"]; ?>');<?php

if($c["orden"] <= 500){
//menu1
$cs=query("select * from csstags where nombre='menu1'");
$css=getcss($cs[0]["css"]);
}else if($c["orden"] > 500 && $c["orden"] <= 1000){
//menu2
$cs=query("select * from csstags where nombre='menu2'");
$css=getcss($cs[0]["css"]);
}else if($c["orden"] > 1000){
$cs=query("select * from csstags where nombre='menu3'");
$css=getcss($cs[0]["css"]);
}

?>
color:#<?php echo $css["color"]; ?>;
text-align:<?php echo $css["align"]; ?>;
font-family:<?php echo $css["font"]; ?>;
text-decoration:<?php echo $css["decoration"]; ?>;
font-style:<?php echo $css["style"]; ?>;
font-size:<?php echo $css["size"]; ?>px;"
>
<?php
echo $cs[0]["btext"];
 echo $c["nombre"]; 
echo $cs[0]["etext"]; 
 ?>
</div>
</a>
<?php

}}




}

?>