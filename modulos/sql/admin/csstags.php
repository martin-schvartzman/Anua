<?php
function getcsstags(){
$sql="select * from csstags";
return query($sql);
}

function getcsstag($id){
$sql="select * from csstags where id=".antinject($id);
$x= query($sql);
return $x[0];
}

function delcsstag($id){
$x=getcsstag($id);
delcss($x["css"]);
$sql="delete from csstags where id=".antinject($id);
query($sql);  
}

function addcsstag($nom,$bt,$et,$css){
$sql="insert into csstags (nombre,btext,etext,css) values ('".antinject($nom)."','".antinject($bt)."','".antinject($et)."',".$css.")";
query($sql);
return mysql_insert_id();
}

function editcsstag($id,$nom,$bt,$et,$css){
$c=getcsstag($id);
delcss($c["css"]);
$sql="update csstags set nombre='".antinject($nom)."', btext='".antinject($bt)."', etext='".antinject($et)."', css=".antinject($css)." where id=".antinject($id);
query($sql);
}

?>