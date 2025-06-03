<?php

if(isset($_SESSION['GuserID'])){
	$productid=mysqli_real_escape_string($con,$_POST["productid"]??"");
	$ITEM=mysqli_real_escape_string($con,$_POST["namege"]??"");
			
	$BARCODE=mysqli_real_escape_string($con,$_POST["BARCODE"]??"");
	$price=mysqli_real_escape_string($con,$_POST["price"]??"");
	$instock=mysqli_real_escape_string($con,$_POST["instock"]??"");
	$price=(double)$_POST["price"]??"";

	$img=mysqli_real_escape_string($con,$_POST["img"]??"");
	$DESCRIPTION=mysqli_real_escape_string($con,$_POST["DESCRIPTION"]??"");
	$smalldesc=mysqli_real_escape_string($con,$_POST["smalldesc"]??"");
	$category=mysqli_real_escape_string($con,$_POST["category"]??"");
	$keywords=mysqli_real_escape_string($con,$_POST["keywords"]??"");
	$titlege=mysqli_real_escape_string($con,$_POST["titlege"]??"");
	$slug=mysqli_real_escape_string($con,$_POST["slug"]??"");
	$complect=mysqli_real_escape_string($con,$_POST["complect"]??"");
	$size=mysqli_real_escape_string($con,$_POST["size"]??"");
	$color=mysqli_real_escape_string($con,$_POST["color"]??"");
	$smalltexten=mysqli_real_escape_string($con,$_POST["smalltexten"]??"");
	$smalltextge=mysqli_real_escape_string($con,$_POST["smalltextge"]??"");
	$CODE=mysqli_real_escape_string($con,$_POST["code"]??"");
	$groupid=mysqli_real_escape_string($con,$_POST["groupid"]??"");
	$conditions=mysqli_real_escape_string($con,$_POST["conditions"]??"");
	$invoiceprice=mysqli_real_escape_string($con,$_POST["invoiceprice"]??"");
	$invoicepriceusd=mysqli_real_escape_string($con,$_POST["invoicepriceusd"]??"");
	$cardpriceusd=mysqli_real_escape_string($con,$_POST["cardpriceusd"]??"");
	$cardprice=mysqli_real_escape_string($con,$_POST["cardprice"]??"");
	$charachteristics=mysqli_real_escape_string($con,$_POST["charachteristics"]??"");
	$installmentpriceusd=mysqli_real_escape_string($con,$_POST["installmentpriceusd"]??"");
	
	if($slug==""){
	$slug=geotoeng($ITEM);		
	}
	// echo 11;
	// echo $slug;
	$q1=mysqli_query($con,"SELECT slug FROM products WHERE id='".$productid."'");
	$r1=mysqli_fetch_array($q1);
	if($r1["slug"]==""){
	////sitemap
	$content = file_get_contents("/home/admin/domains/webdoors.ge/public_html/partners/iland/sitemap.xml");
	$sitemap = simplexml_load_string($content);
	$myNewUri = $sitemap->addChild("url");
	$myNewUri->addChild("loc", "https://webdoors.ge/public_html/partners/iland/".$productid."/".$slug);
	// $myNewUri->addChild("lastmod", date("DATE_W3C"));
	$myNewUri->addChild("changefreq", "daily");
	$myNewUri->addChild("priority", "0.51");
	$sitemap->asXml("/home/admin/domains/webdoors.ge/public_html/partners/iland/sitemap.xml");
		
	}	

	mysqli_query($con,"UPDATE products SET charachteristics='".$charachteristics."',nameen='".$ITEM."',groupid='".$groupid."', code='".$CODE."', BARCODE='".$BARCODE."',price='".$price."',category='".$category."',slug='".$slug."', instock='".$instock."' WHERE id='".$productid."'  ");

	//mysqli_query($con,"UPDATE ptexts SET smalltexten='".$smalldesc."',smalltextge='".$smalldesc."',smalltextru='".$smalldesc."',bigtexten='".$DESCRIPTION."',bigtextge='".$DESCRIPTION."',bigtextru='".$DESCRIPTION."' WHERE pid='".$productid."'  ");



	
	//include("imagewatermarks.php");	
	echo 1;
}
function geotoeng($word){
	$alpha = array("ა"=>'a',"ბ"=>'b',"ც"=>'c',"დ"=>'d',"ე"=>'e',"ფ"=>'f',"გ"=>'g',"ჰ"=>'h',"ი"=>'i','j',"კ"=>'k',"ლ"=>'l',"მ"=>'m',"ნ"=>'n',"ო"=>'o',"პ"=>'p',"ქ"=>'q',"რ"=>'r',"ს"=>'s',"თ"=>'t',"უ"=>'u',"ვ"=>'v','w','x',"ყ"=>'y',"ზ"=>'z',"ჟ"=>"zh","ტ"=>"t","ხ"=>"kh","შ"=>"sh","ღ"=>"gh","ჯ"=>"j","ძ"=>"dz","წ"=>"ts","ჭ"=>"ch","ჩ"=>"ch","a"=>"a","b"=>"b","c"=>"c","d"=>"d","e"=>"e","f"=>"f","g"=>"g","h"=>"h","i"=>"i","j"=>"j","k"=>"k","l"=>"l","m"=>"m","n"=>"n","o"=>"o","p"=>"p","q"=>"q","r"=>"r","s"=>"s","t"=>"t","u"=>"u","v"=>"v","w"=>"w","x"=>"x","y"=>"y","z"=>"z","-"=>"-","0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9");
	$word=str_replace(" ","-",$word);
	$word = preg_split('//u', $word);
	foreach($word as $key=>$value){
		if(array_key_exists(strtolower($value),$alpha)){
			$newF[$key]=$alpha[strtolower($value)];
		}
	}
	$newW=implode("",$newF);
	return $newW;	
}
?>