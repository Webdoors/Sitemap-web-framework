<?php
include("../../db_open.php");
$q1=mysqli_query($con,"SELECT img,ITEM FROM special");
	while($r1=mysqli_fetch_array($q1)){
		if($r1["img"]!=""){
			$img=str_replace("https://chvenebi.ge","/home/admin/domains/chvenebi.ge/public_html",$r1["img"]);
		}else{
			$img="/home/admin/domains/chvenebi.ge/public_html/admin/uploads/products/".str_replace(" ","-",substr($r1["ITEM"],0,6)).".jpg";	
		}
		$filepath=$img;
		$stamp = imagecreatefrompng('/home/admin/domains/chvenebi.ge/public_html/img/mark.png');
		$image_info=getimagesize($filepath)[2];
		if ($image_info == IMAGETYPE_JPEG)
		{
			$im = imagecreatefromjpeg($filepath);
		}else{
			$im = imagecreatefrompng($filepath);
		}
		$marge_right = 10;
		$marge_bottom = 10;
		$sx = imagesx($stamp);
		$sy = imagesy($stamp);
		imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
		imagejpeg($im,$filepath);
		imagedestroy($im);
	}
// $filepath="/home/admin/domains/chvenebi.ge/public_html/admin/uploads/eng_pl_-p-Garden-Trampoline-180-183cm-6ft-Net-Ladder-2215-p-11463_3.jpg";
// $stamp = imagecreatefrompng('/home/admin/domains/chvenebi.ge/public_html/img/mark.png');
// $im = imagecreatefromjpeg($filepath);

// // Set the margins for the stamp and get the height/width of the stamp image
// $marge_right = 10;
// $marge_bottom = 10;
// $sx = imagesx($stamp);
// $sy = imagesy($stamp);

// // Copy the stamp image onto our photo using the margin offsets and the photo 
// // width to calculate positioning of the stamp. 
// imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
// // header('Content-type: image/jpg');
// imagejpeg($im,$filepath);
// imagedestroy($im);
include("../../db_close.php");
?>