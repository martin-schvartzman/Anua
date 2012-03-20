<?php
require_once 'picasa.php';
$user = "martin.schvartzman@gmail.com";
$pass = "hp116110a";
// update the second argument to be CompanyName-ProductName-Version
$gp = setup($user,$pass,$service);
$x=getAlbums($gp);
foreach($x as $album){

//var_dump($a);
echo $album["img"]."</br>";
//
}
echo "<br/>";
$x=getAlbum($gp,"5607795159417921073");
foreach($x as $album){

//var_dump($a);
echo $album["thumb"]."</br>";
//
}
echo "<br/>";
$x=getPhoto($gp,"5607795247536105442","5607795159417921073");


echo $x["thumb"];



/*

//var_dump($gp);
$query = $gp->newAlbumQuery();

$query->setUser("default");
$query->setAlbumName("galeria");

$albumFeed = $gp->getAlbumFeed($query);
foreach ($albumFeed as $albumEntry) {
    echo $albumEntry->getGphotoId( )."</br>";
	echo $albumEntry->getGphotoAlbumId( )."</br>";
	echo $albumFeed->getGphotoUser()."</br></br>";
}
// In version 1.5+, you can enable a debug logging mode to see the
// underlying HTTP requests being made, as long as you're not using
// a proxy server
/**/

?>