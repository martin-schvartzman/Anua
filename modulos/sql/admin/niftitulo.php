<?php

function addtitulo($txt,$css){
$sql="insert into titulo (texto,css) values ('".antinject(htmlspecialchars($txt))."',".antinject($css).")";
query($sql);
return mysql_insert_id();
}

function deltitulo($id){

$titulo=gettitulo($id);
if($titulo["css"] != "0")delcss($titulo["css"]);
$sql="delete from titulo where id=".antinject($id);
query($sql);
}

function gettitulo($id){
$sql="select * from titulo where id=".antinject($id);
$t=query($sql);
return $t[0];
}


?>