<?php

function addcss($c,$a,$f,$s,$d,$st){
$sql="insert into css (color,align,font,size,decoration,style) values 
('".antinject($c)."','".antinject($a)."','".antinject($f)."','".antinject($s)."','".antinject($d)."','".antinject($st)."')";
query($sql);
return mysql_insert_id();
}

function delcss($id){
if($id != 0){
$sql="delete from css where id=".$id;
query($sql);}
}

function getcss($id){
$sql="select * from css where id=".$id;
$x=query($sql);
return $x[0];
}

?>