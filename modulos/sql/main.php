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
$sql=str_replace("ั","&Ntilde;",$sql);
$sql=str_replace("ภ","&Agrave;",$sql);
$sql=str_replace("ม","&Aacute;",$sql);
$sql=str_replace("ศ","&Egrave;",$sql);
$sql=str_replace("ษ","&Eacute;",$sql);
$sql=str_replace("ฬ","&Igrave;",$sql);
$sql=str_replace("อ","&Iacute;",$sql);
$sql=str_replace("า","&Ograve;",$sql);
$sql=str_replace("ำ","&Oacute;",$sql);
$sql=str_replace("ู","&Ugrave;",$sql);
$sql=str_replace("ฺ","&Uacute;",$sql);
$sql=str_replace("๑","&ntilde;",$sql);
$sql=str_replace("เ","&agrave;",$sql);
$sql=str_replace("แ","&aacute;",$sql);
$sql=str_replace("่","&egrave;",$sql);
$sql=str_replace("้","&eacute;",$sql);
$sql=str_replace("์","&igrave;",$sql);
//$sql=str_replace("ํ","&iacute;",$sql);
$sql=str_replace("๒","&ograve;",$sql);
$sql=str_replace("๓","&oacute;",$sql);
$sql=str_replace("๙","&ugrave;",$sql);
$sql=str_replace("๚","&uacute;",$sql);
$sql=str_replace("รณ","&oacute;",$sql);
$sql=str_replace("รฉ","&eacute;",$sql);
$sql=str_replace("ร","&iacute;",$sql);
$sql=str_replace("ํบ","&uacute;",$sql);
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