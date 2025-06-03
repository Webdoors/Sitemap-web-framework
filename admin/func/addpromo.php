<?php
     ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
  
$a=(double)$_POST['a'];
$b=(int)$_POST['b'];
$c=(int)$_POST['c'];
$d=(int)$_POST['d'];
$e=(int)$_POST['e'];


$TM=time();
	$i=1;
	$i1=0;
	
	$Total=$f;
if($e==0)
{
$nm="32". hash('crc32',time()) ;
}
else
{
$nm="64". hash('crc32',time()) ;
}
mysqli_query($con,"INSERT INTO promocodes (name, usnambers,percent,active, totalnumber,uid,createdate,multiple) VALUES ('$nm','$i1','$a','$i1','$d','$c','$TM','$e')");



echo 1;
?>