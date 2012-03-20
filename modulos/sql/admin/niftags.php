<?php

function edittag($id,$txt){
$sql="update niftags set tag='".antinject($txt)."' where id=".antinject($id);
query($sql);
}


function addtag($txt){
$sql="insert into niftags (tag) values('".antinject($txt)."')";
query($sql);
}

function deltag($id){
if($id != 1 && $id != 2){
$sql="delete from niftags where id=".antinject($id);
query($sql);
$sql="delete from relniftags where tag=".antinject($id);
query($sql);
}
}

function gettags(){
$sql="select * from niftags";
return query($sql);
}

function hastag($tag,$nif){
$sql="select count(*) as cant from relniftags where tag=".antinject($tag)." and nif=".antinject($nif);
$x=query($sql);
if($x[0]["cant"]=="1")return true;
return false;
}

function addrelniftag($tag,$nif){
$sql="insert into relniftags (nif,tag) values (".antinject($nif).",".antinject($tag).")";
query($sql);
}

?>