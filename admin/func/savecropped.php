<?php
	$T=time();
	$a=mysqli_real_escape_string($con,$_POST["a"]??"");
	$b=mysqli_real_escape_string($con,$_POST["b"]??"");
	$ident=$T;

$q2=mysqli_query($con,"SELECT * FROM productimgs WHERE id='".$b."'");
$r2=mysqli_fetch_array($q2);
$filename=explode("/",$r2["img"]);
$filename=end($filename);

$filefolder=str_replace($filename,"",$r2["img"]);
$filefolder=explode("/admin/uploads/",$filefolder);
$filefolder=end($filefolder);


$data=$a;
list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);
$type=explode("/",$type);
$type=$type[1];
$ext=$type;
$data = base64_decode($data);
	// echo $Gfold."s".$ident.".".$type;
$oext=explode(".",$r2["img"]);
$oext=end($oext);
	$id=mysqli_insert_id($con);
	$rand=rand(1111,9999);
	$file="/home/admin/domains/webdoors.ge/public_html/partners/iland/admin/uploads/".$filefolder.$filename;
	$sfile=str_replace(".".$oext,"_n".$rand.".".$ext,$file);
	$file=str_replace(".".$oext,"_n".$rand.".".$ext,$r2["img"]);
	mysqli_query($con,"UPDATE productimgs SET img='".$file."' WHERE id='".$b."'");
file_put_contents($sfile, $data);
	echo $sfile;	
?>