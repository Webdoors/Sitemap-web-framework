<?php
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,isset($_POST["a"])?$_POST["a"]:"");
	$b=mysqli_real_escape_string($con,isset($_POST["b"])?$_POST["b"]:"");
	$c=mysqli_real_escape_string($con,isset($_POST["c"])?$_POST["c"]:"");
	$d=mysqli_real_escape_string($con,isset($_POST["d"])?$_POST["d"]:"");
	$e=mysqli_real_escape_string($con,isset($_POST["e"])?$_POST["e"]:"");
	$f=mysqli_real_escape_string($con,isset($_POST["f"])?$_POST["f"]:"");
	$g=isset($_POST["g"])?(int)$_POST["g"]:"";
	include("functions.php");
	include("../functions/geotoeng.php");

		if($g==1)
		{ 
			$b1="slug";
			$c1=geotoeng($c);
			mysqli_query($con,"UPDATE $a SET ".$b1."='".$c1."' WHERE id='".$d."'");
		}
if($b=="pass"){
	$c=encrypt_decrypt("encrypt",$c);
}
	if($e!='')
	{ 
		$q1=mysqli_query($con,"SELECT id FROM langs  WHERE tableName='$a' AND tableId='$d' AND tableColumn='$b' AND shortname='$e'");
		$r1=mysqli_fetch_array($q1);
		if($r1==NULL){
			mysqli_query($con,"INSERT INTO langs SET  tableName='$a',tableId='$d',tableColumn='$b', shortname='$e'");
		}
		mysqli_query($con,"UPDATE langs SET columnValue='".$c."' WHERE tableName='$a' AND tableId='$d' AND tableColumn='$b' AND shortname='$e' ");
	}
	else
	{
		echo 1;
			mysqli_query($con,"UPDATE $a SET ".$b."='".$c."' WHERE id='".$d."'");
			if(strpos($b,"title_")!==false&&$a=="products"){
				$ext=explode("_",$b);
				$ext=end($ext);
				$q1=mysqli_query($con,"SELECT sitemapid FROM products WHERE id='".$d."'");
				$r1=mysqli_fetch_array($q1);
				mysqli_query($con,"UPDATE sitemap SET name_$ext='".$c."' WHERE id='".$r1["sitemapid"]."'");				
			}
			if($b=="category"){
				$q1=mysqli_query($con,"SELECT sitemapid FROM products WHERE id='".$d."'");
				$r1=mysqli_fetch_array($q1);
				mysqli_query($con,"UPDATE sitemap SET pid='".$c."' WHERE id='".$r1["sitemapid"]."'");
			}
	}	
	
	echo $f;
}
if($b==="active" && $a==="users" && $f==1){
	$qf=mysqli_query($con,"SELECT * FROM contactus WHERE id='1'");
	$rf=mysqli_fetch_array($qf);
	$res=mysqli_query($con,"SELECT * FROM ".$a." WHERE id =$d ");
	$res=mysqli_fetch_assoc($res);
	//$headers = "MIME-Version: 1.0" . "\r\n";
//	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	//$headers .= 'From: <intelectro@intelectro.ge>' . "\r\n";
	if(	mail($res["email"],"Intelectro - account activation",
		$res["firstname"]." თქვენი ანგარიში აქტიურია, შეგიძლიათ ისარგებლოთ ჩვენი სერვისებით<br><br><br><br>პატივისცემით,<br>შპს ინტელექტრო<br>ტელ:".$rf["tel"]."<br>მისამართი:".$rf["address"],$headers)){
		
	}

}

?>
 