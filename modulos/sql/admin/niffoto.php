<?php

function addfoto($txt,$h,$w,$link){
$sql="insert into foto (texto,width,height,link) values 
('".antinject($txt)."',".antinject($w).",".antinject($h).",'".antinject($link)."')";
query($sql);
return mysql_insert_id();
}

function delfoto($id){

$sql="delete from foto where id=".antinject($id);
query($sql);
}

function getfoto($id){
$sql="select * from foto where id=".antinject($id);
$t=query($sql);
return $t[0];
}


?>