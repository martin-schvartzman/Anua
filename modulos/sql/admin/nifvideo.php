<?php

function addvideo($txt,$tipo){
$sql="insert into video (link,tipo) values ('".antinject($txt)."',".antinject($tipo).")";
query($sql);
return mysql_insert_id();
}

function delvideo($id){

$sql="delete from video where id=".antinject($id);
query($sql);
}

function getvideo($id){
$sql="select * from video where id=".antinject($id);
$t=query($sql);
return $t[0];
}


?>