<?php

function addaudio($txt){
$sql="insert into audio (link) values ('".antinject($txt)."')";
query($sql);
return mysql_insert_id();
}

function delaudio($id){

$sql="delete from audio where id=".antinject($id);
query($sql);
}

function getaudio($id){
$sql="select * from audio where id=".antinject($id);
$t=query($sql);
return $t[0];
}


?>