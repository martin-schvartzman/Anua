<?php

function addplantilla($nom,$nif){
$sql="insert into perfil (nombre,nif) values 
('".antinject($nom)."',".antinject($nif).")";
query($sql);
return mysql_insert_id();
}

function delplantilla($id){
$p=getplantilla($id);
delnif($p["nif"]);
$sql="delete from perfil where id=".antinject($id);
query($sql);
}

function getplantilla($id){
$sql="select * from perfil where id=".antinject($id);
$t=query($sql);
return $t[0];
}

function getplantillas(){
$sql="select * from perfil";
return query($sql);
}
?>