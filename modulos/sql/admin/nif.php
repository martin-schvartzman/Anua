<?php

function addnif($autor){

$sql="insert into nif (estado,foto,audio,video,galeria,contenido,titulo,categoria,
autor,displayautor,fecha,displayfecha)
values (0,0,0,0,0,0,0,0,".$autor.",0,'".date("Y")."-".date("m")."-".date("d")."',0)";
query($sql);
return mysql_insert_id();

}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function delnif($id){
if(getniftitulo($id) != 0)deltitulo(getniftitulo($id));
if(getnifcontenido($id) != 0)delcontenido(getnifcontenido($id));
if(getnifvideo($id) != 0)delvideo(getnifvideo($id));
if(getnifaudio($id) != 0)delaudio(getnifaudio($id));
if(getniffoto($id) != 0)delfoto(getniffoto($id));
if(getnifgaleria($id) != 0)delgaleria(getnifgaleria($id));
query("delete from relniftags where nif=".antinject($id));


$sql="delete from nif where id=".$id;
query($sql);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addnifestado($id,$x){
$sql="update nif set estado=".$x." where id=".$id;
query($sql);
}

function getnifestado($id){
$sql="select estado from nif where id=".$id;
$ret=query($sql);
return $ret[0]["estado"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addniffoto($id,$x){
$sql="update nif set foto=".$x." where id=".$id;
query($sql);
}

function getniffoto($id){
$sql="select foto from nif where id=".$id;
$ret=query($sql);
return $ret[0]["foto"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addnifaudio($id,$x){
$sql="update nif set audio=".$x." where id=".$id;
query($sql);
}

function getnifaudio($id){
$sql="select audio from nif where id=".$id;
$ret=query($sql);
return $ret[0]["audio"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addnifvideo($id,$x){
$sql="update nif set video=".$x." where id=".$id;
query($sql);
}

function getnifvideo($id){
$sql="select video from nif where id=".$id;
$ret=query($sql);
return $ret[0]["video"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addnifgaleria($id,$x){
$sql="update nif set galeria=".$x." where id=".$id;
query($sql);
}

function getnifgaleria($id){
$sql="select galeria from nif where id=".$id;
$ret=query($sql);
return $ret[0]["galeria"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addnifcontenido($id,$x){
$sql="update nif set contenido=".$x." where id=".$id;
query($sql);
}

function getnifcontenido($id){
$sql="select contenido from nif where id=".$id;
$ret=query($sql);
return $ret[0]["contenido"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addniftitulo($id,$x){
$sql="update nif set titulo=".$x." where id=".$id;
query($sql);
}

function getniftitulo($id){
$sql="select titulo from nif where id=".$id;
$ret=query($sql);
return $ret[0]["titulo"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addnifcategoria($id,$x){
$sql="update nif set categoria=".$x." where id=".$id;
query($sql);
}

function getnifcategoria($id){
$sql="select categoria from nif where id=".$id;
$ret=query($sql);
return $ret[0]["categoria"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addnifautor($id,$x){
$sql="update nif set autor=".$x." where id=".$id;
query($sql);
}

function getnifautor($id){
$sql="select autor from nif where id=".$id;
$ret=query($sql);
return $ret[0]["autor"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addnifautordisplay($id,$x){
$sql="update nif set displayautor=".$x." where id=".$id;
query($sql);
}

function getnifautordisplay($id){
$sql="select displayautor from nif where id=".$id;
$ret=query($sql);
return $ret[0]["displayautor"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addniffecha($id){
$sql="update nif set fecha='".date("Y")."-".date("m")."-".date("d")."' where id=".$id;
query($sql);
}

function editniffecha($id,$d,$m,$y){
$sql="update nif set fecha='".$y."-".$m."-".$d."' where id=".$id;
query($sql);
}

function getniffecha($id){
$sql="select fecha from nif where id=".$id;
$ret=query($sql);
return $ret[0]["fecha"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function addniffechadisplay($id,$x){
$sql="update nif set displayfecha=".$x." where id=".$id;
query($sql);
}

function getniffechadisplay($id){
$sql="select displayfecha from nif where id=".$id;
$ret=query($sql);
return $ret[0]["displayfecha"];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
?>