<?php

function getsubcategorias($id){
$sql="select * from categoria where padre=".$id." order by orden asc";
return query($sql);

}

function addsubcategoria($nom,$ord,$id){
$sql="insert into categoria (orden,nombre,padre) values 
(".antinject($ord).",'".antinject($nom)."',".antinject($id).")";
query($sql);
}

function getcategorias(){
$sql="select * from categoria where padre=0 order by orden asc";
return query($sql);
}


function getcategoria($id){
$sql="select * from categoria where id=".$id;
$x = query($sql);
return $x[0];
}

function delcategoria($id){
delprivicat($id);
$cat=getcategoria($id);
if($cat["mover"] != 0)delcss($cat["mover"]);
delcss($cat["mout"]);
$sub=getsubcategorias($id);
foreach($sub as $s){
	delcategoria($s["id"]);
}
$sql="delete from nif where categoria=".antinject($id);
query($sql);
$sql="delete from categoria where id=".antinject($id);
query($sql);
}

function addcategoria($orden, $nombre, $imagen,$display,$mout,$mover){
$sql="insert into categoria (orden,nombre,imagen,display,mout,mover,padre) values 
(".antinject($orden).",'".antinject($nombre)."','".antinject($imagen)."',".antinject($display).",".antinject($mout).",".antinject($mover).",0)";
query($sql);
}

function editsubcategoria($nombre,$orden,$id){
$sql="update categoria set orden=".antinject($orden).", nombre='".antinject($nombre)."' where id=".$id;
query($sql);
}

function editcategoria($id,$orden, $nombre, $imagen,$display,$mout,$mover){
$c=getcategoria($id);
delcss($c["mout"]);delcss($c["mover"]);

$sql="update categoria set orden=".antinject($orden).", nombre='".antinject($nombre)."', imagen='".antinject($imagen)."', display=".$display.", 
mout=".$mout.", mover=".$mover." where id=".$id;

query($sql);
}

?>