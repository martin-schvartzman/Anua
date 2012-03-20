<?php


function addprivilegios($usr,$cat,$a,$d,$e){
delprivilegios($usr,$cat);
$sql="insert into privilegios (usuario,categoria,agr,del,edit) values (".$usr.",".$cat.",".$a.",".$d.",".$e.")";
query($sql);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function delprivilegios($usr,$cat){
$sql="delete from privilegios where usuario=".$usr." and categoria=".$cat;
query($sql);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function delpriviusr($usr){
$sql="delete from privilegios where usuario=".$usr;
query($sql);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function delprivicat($cat){
$sql="delete from privilegios where categoria=".$cat;
query($sql);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function usercanadd($usr){
$cat=getcategorias();
foreach($cat as $c){
if(privilegioscheckadd($usr,$c["id"]))return true;
}
return false;
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

function privilegioscheckadd($usr,$cat){
if(isadmin($usr)){return true;}else{

$sql="select agr as chk from privilegios where usuario=".$usr." and categoria=".$cat;
$chk=query($sql);
if(isset($chk[0]["chk"])==false)return false;
if($chk[0]["chk"]==1)
	return true;
else
	return false;

}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function privilegioscheckdel($usr,$cat){
if(isadmin($usr)){return true;}else{

$sql="select del as chk from privilegios where usuario=".$usr." and categoria=".$cat;
$chk=query($sql);
if(isset($chk[0]["chk"])==false)return false;
if($chk[0]["chk"]==1)
	return true;
else
	return false;

}
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
function privilegioscheckedit($usr,$cat){
if(isadmin($usr)){return true;}else{

$sql="select edit as chk from privilegios where usuario=".$usr." and categoria=".$cat;
$chk=query($sql);
if(isset($chk[0]["chk"])==false)return false;
if($chk[0]["chk"]==1)
	return true;
else
	return false;

}
}


?>