<?php

function addgaleria($txt){
$sql="insert into galeria (picasa) values ('".antinject($txt)."')";
query($sql);
return mysql_insert_id();
}

function delgaleria($id){

$sql="delete from galeria where id=".antinject($id);
query($sql);
}

function getgaleria($id){
$sql="select * from galeria where id=".antinject($id);
$t=query($sql);
return $t[0];
}


?>