<?php 
@session_start();
include("../sql/consultas.php");
if($_SESSION["usuario"]>0 && isset($_POST["perfil"]) ){
if($_POST["perfil"] != "" && is_numeric($_POST["perfil"])){
$perfil=getplantilla($_POST["perfil"]);
$perfil=$perfil["nif"];
$nif=addnif($_SESSION["usuario"]);

if(getniffoto($perfil)!=0){
$foto=getniffoto($perfil);
$foto=getfoto($foto);
$foto=addfoto($foto["texto"],$foto["height"],$foto["width"],$foto["link"]);
addniffoto($nif,$foto);
}

if(getnifgaleria($perfil)!=0){
$galeria=getnifgaleria($perfil);
$galeria=getgaleria($galeria);
$galeria=addgaleria($galeria["picasa"]);
addnifgaleria($nif,$galeria);
}

if(getnifaudio($perfil)!=0){
$audio=getnifaudio($perfil);
$audio=getaudio($audio);
$audio=addaudio($audio["link"]);
addnifaudio($nif,$audio);
}

if(getnifvideo($perfil)!=0){
$video=getnifvideo($perfil);
$video=getvideo($video);
$video=addvideo($video["link"]);
addnifvideo($nif,$video);
}

if(getniftitulo($perfil)!=0){
$titulo=getniftitulo($perfil);
$titulo=gettitulo($titulo);
$css=getcss($titulo["css"]);
$css=addcss($css["color"],$css["align"],$css["font"],$css["size"],$css["decoration"],$css["style"]);
$titulo=addtitulo($titulo["texto"],$css);
addniftitulo($nif,$titulo);
}

if(getnifcontenido($perfil)!=0){
$contenido=getnifcontenido($perfil);
$contenido=getcontenido($contenido);
$contenido=addcontenido($contenido["texto"]);
addnifcontenido($nif,$contenido);
}

addnifautordisplay($nif,getnifautordisplay($perfil));
addniffechadisplay($nif,getniffechadisplay($perfil));
addnifcategoria($nif,getnifcategoria($perfil));
$relniftag=query("select * from relniftags where nif=".$perfil);
foreach($relniftag as $r){
addrelniftag($r["tag"],$nif);
}

?>
<script>
$(document).ready(function(){
	$("#cont").load("/modulos/admin/editnif.php",{editnif:<?php echo $nif; ?>});
});
</script>
<?php

}else{
echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";
}

}else{
echo "Usted no tiene los permisos necesarios para acceder a esta pantalla.<br/> Ante cualquier duda comuniquese a soporte@anua.org.ar";
}
?>