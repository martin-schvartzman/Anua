<?php

function addcontenido($txt){
$sql="insert into contenido (texto) values ('".antinject(htmlspecialchars($txt))."')";
query($sql);
return mysql_insert_id();
}

function delcontenido($id){

$sql="delete from contenido where id=".antinject($id);
query($sql);
}

function getcontenido($id){
$sql="select * from contenido where id=".antinject($id);
$t=query($sql);
return $t[0];
}


?>