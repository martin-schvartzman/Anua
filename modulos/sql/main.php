<?php

function antinject($sql){
$sql=str_replace("\"","&quot;",$sql);
$sql=str_replace("\'","&#39;",$sql);
return $sql;
}

function conexion(){
$con=mysql_connect("localhost","root");
mysql_select_db("anua", $con);
return $con;
}
///////////////////////////////////////////////////////////
function getq($sql){
/*
$sql=str_replace("�","&Ntilde;",$sql);
$sql=str_replace("�","&Agrave;",$sql);
$sql=str_replace("�","&Aacute;",$sql);
$sql=str_replace("�","&Egrave;",$sql);
$sql=str_replace("�","&Eacute;",$sql);
$sql=str_replace("�","&Igrave;",$sql);
$sql=str_replace("�","&Iacute;",$sql);
$sql=str_replace("�","&Ograve;",$sql);
$sql=str_replace("�","&Oacute;",$sql);
$sql=str_replace("�","&Ugrave;",$sql);
$sql=str_replace("�","&Uacute;",$sql);
$sql=str_replace("�","&ntilde;",$sql);
$sql=str_replace("�","&agrave;",$sql);
$sql=str_replace("�","&aacute;",$sql);
$sql=str_replace("�","&egrave;",$sql);
$sql=str_replace("�","&eacute;",$sql);
$sql=str_replace("�","&igrave;",$sql);
//$sql=str_replace("�","&iacute;",$sql);
$sql=str_replace("�","&ograve;",$sql);
$sql=str_replace("�","&oacute;",$sql);
$sql=str_replace("�","&ugrave;",$sql);
$sql=str_replace("�","&uacute;",$sql);
$sql=str_replace("ó","&oacute;",$sql);
$sql=str_replace("é","&eacute;",$sql);
$sql=str_replace("�","&iacute;",$sql);
$sql=str_replace("�","&uacute;",$sql);
$sql=str_replace("zxczxc","&aacute;",$sql);
*/
$con=conexion();
return mysql_query($sql,$con);
}
//////////////////////////////////////////////////////////
function query($sql){
$query=getq($sql);
$array=array();
if(!(is_bool($query))){
$i=0;
while($row=mysql_fetch_array($query)){
$array[$i]=$row;
$i++;
}
}

return $array;
}
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
function prueba(){
echo "ok";
}
?>