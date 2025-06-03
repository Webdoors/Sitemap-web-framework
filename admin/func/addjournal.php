<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dr=getcwd();
define("BASE_PATH", "/var/www/folkmagazine.ge/public_html/");
//echo BASE_PATH ."--";
ini_set('max_execution_time',"3660");
// echo ini_get("disable_functions");
$pdf=mysqli_real_escape_string($con,$_POST["pdf"]);
$t=time();
mysqli_query($con,"INSERT INTO journals SET pdf_link='".$pdf."', date='$t'");
$jid=mysqli_insert_id($con);
$pdf=explode("/",$pdf);
$pdf=end($pdf);
// echo $pdf;
$pdf=urldecode($pdf);
mkdir("../media/journal/".$jid);
// echo getcwd();
try{
	shell_exec("pdftoppm -jpeg /var/www/folkmagazine.ge/public_html/admin/uploads/$pdf /var/www/folkmagazine.ge/public_html/admin/media/journal/$jid/page  "); 
	
$output = shell_exec("pdftoppm -jpeg /var/www/folkmagazine.ge/public_html/admin/uploads/$pdf /var/www/folkmagazine.ge/public_html/admin/media/journal/$jid/page    2>&1 1> /dev/null");

echo $pdf ."--".$jid;
}catch(Exception $e) {
	 var_dump($e);
}
// $jid="54";
$files=glob("../media/journal/".$jid."/*.jpg");
foreach($files as $img){
	 spliter($img,$jid);
}  
function spliter($img,$jid){
	require_once("imgresizer.php");
	$im = imagecreatefromjpeg($img);
	$imgname=explode("/",$img);
	$imgname=end($imgname);
	if(imagesx($im)>imagesy($im)){
		$size = min(imagesx($im), imagesy($im));
		$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => 1239.5, 'height' => $size]);
		if ($im2 !== FALSE) {
			$new="../media/journal/".$jid."/p-".$imgname;
			$new=str_replace(".","1.",$imgname);
			$new="../media/journal/".$jid."/p-".$new;
			imagejpeg($im2, $new);
			 imagedestroy($im2);
		}
		imagedestroy($im);
		$im = imagecreatefromjpeg($img);
		$size = min(imagesx($im), imagesy($im));
		$im2 = imagecrop($im, ['x' => 1239.5, 'y' => 0, 'width' => 1239.5, 'height' => $size]);
		if ($im2 !== FALSE) {
			$new=$imgname;
			$new=str_replace(".","2.",$imgname);
			$new="../media/journal/".$jid."/p-".$new;
			imagejpeg($im2,$new);
			 imagedestroy($im2);
			 
		}
		 imagedestroy($im);
		 		
	}else{
		rename($img,"../media/journal/".$jid."/p-".$imgname);
		$new="../media/journal/".$jid."/p-".$imgname;
	}
	// $image=new SimpleImage();
	// $image->load($new);
	// $image->resizeToWidth(650);
	// $image->save($new);
	 // echo $img."<br>";
	 // echo "../media/journal/".$jid."/p-".$imgname."<br>";
	 unlink($img);
}
echo 1;
// echo "pdftoppm -jpeg /home/admin/domains/4seasonsgeorgia.ge/public_html".$pdf." page";
// "/home/admin/domains/4seasonsgeorgia.ge/public_html/admin";
// var_dump($_POST);
?>