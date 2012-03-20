<?php

function addusuario($user,$pass){

$sql="select count(id) as cant from usuarios where user='".antinject($user)."'";
$r=query($sql);
if($r[0]["cant"]==0){
$sql="insert into usuarios (admin,user,pass) values (1,'".antinject($user)."','".crypt($pass)."')";
query($sql);
return mysql_insert_id();
}
return -1;

}

function useravailable($usr){
$sql="select count(id) as cant from usuarios where user='".antinject($usr)."'";
$r=query($sql);
if($r[0]["cant"]==0)return true;

return false;
}

function getusuarios(){
$sql="select * from usuarios";
return query($sql);
}

function nameusuario($id){
$sql="select user from usuarios where id=".$id;
$x = query($sql);
return $x[0]["user"];
}

function idusuario($user,$pass){
if($user=="" || $pass=="")return 0;
$sql="select count(id) as cant from usuarios where user='".antinject($user)."'";
$r=query($sql);
if($r[0]["cant"]==0)return 0;
$sql="select pass,id from usuarios where user='".antinject($user)."'";
$pwd=query($sql);
if(crypt($pass,$pwd[0]["pass"])==$pwd[0]["pass"]){
return $pwd[0]["id"];
}
return 0;
}

function delusuario($id){
delpriviusr($id);
$sql="delete from usuarios where id=".$id;
return query($sql);
}

function editusuario($id,$pass){
$sql="update usuarios set pass='".crypt($pass)."' where id=".$id;
return query($sql);
}

function isadmin($usr){
$sql="select admin from usuarios where id=".$usr;
$x=query($sql);
if($x[0]["admin"]==1)
	return true;
else
	return false;
}

function makeadmin($u){
$sql="delete from privilegios where usuario=".$u;
query($sql);
$sql="update usuarios set admin=1 where id=".$u;
query($sql);
}

function deladmin($u){
$sql="update usuarios set admin=0 where id=".$u;
query($sql);
}


?>