<?php
$a=mysqli_real_escape_string($con,$_POST["a"]);
require_once '/home/admin/domains/webdoors.ge/public_html/vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$T=time();
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(true);
// echo "../".urldecode(end(explode("/admin/",$a)));
$spreadsheet = $reader->load("../".urldecode(end(explode("/admin/",$a))));
$worksheet=$spreadsheet->getActiveSheet();
$rows = $worksheet->toArray(null,true,true,true);
$i=0;
 // var_dump($rows);
foreach($rows as $ar){
	$i++;		
	if($i>1){	
		$slug=strtolower($ar["B"]);
		$slug=str_replace(" ","-",$slug);
		$slug=geotoeng($slug);		
			// var_dump($ar);
			// echo "<br>".$ar["A"]." ".$ar["C"]." ".$ar[6]." ".$ar["A"]." ".$ar[24]." ".$ar[29]." ".(int)$ar["B"]." ".$ar[39]." ".$ar["C"]." ".$ar["D"];
			// $ar["D"]=round(floatval($ar["D"])*1.18*2.45,2);
			$q4=mysqli_query($con,"SELECT id FROM stores WHERE name='".trim($ar["F"])."'");
			// echo "SELECT id FROM stores WHERE name='".trim($ar[5])."'";
			$r4=mysqli_fetch_array($q4);
			$q5=mysqli_query($con,"SELECT id FROM categories WHERE name='".trim($ar["H"])."'");
			// echo "SELECT id FROM stores WHERE name='".trim($ar[5])."'";
			$r5=mysqli_fetch_array($q5);
			$sto=$r4["id"];
			if($r4["id"]==""){
				$sto="1";
			}		
			mysqli_query($con,"INSERT INTO productprices SET name='".$ar["B"]."',barcode='".$ar["A"]."',quantity='".(int)$ar["C"]."',price='".$ar["D"]."',date='".$T."' ");
			$q1=mysqli_query($con,"SELECT id FROM special WHERE BARCODE='".$ar["A"]."'");
			// echo "SELECT id FROM special WHERE BARCODE='".$ar["A"]."'";
			// echo "SELECT id FROM special WHERE DESCRIPTION='".$ar["A"]."'";
			$price=str_replace(",",".",$ar["D"]);
			$tprice=str_replace(",",".",$ar[6]);
			$sprice=str_replace(",",".",$ar[7]);
			if(mysqli_num_rows($q1)>0){ 

				mysqli_query($con,"UPDATE special SET BARCODE='".$ar["A"]."',ITEM='".$ar["B"]."',brand='".$ar["E"]."',   DESCRIPTION='".$ar["J"]."', COUNTRY='',TARIC='', QUANTITY='".(int)$ar["C"]."', UNIT='', PRICE='".$price."', TOTAL='".$ar["E"]."',TPRICE='".$tprice."',salesprice='".$sprice."',category='".$r5["id"]."',keywords='".$ar["I"]."',slug='".$slug."' WHERE barcode='".$ar["A"]."'");

				$q2=mysqli_query($con,"SELECT id FROM special WHERE barcode='".$ar["A"]."'");
				$r2=mysqli_fetch_array($q2);
				mysqli_query($con,"INSERT INTO productbase SET barcode='".$ar["A"]."',name='".$ar["B"]."' ,brand='".$ar["E"]."',quantity='".(int)$ar["C"]."' ,price='".$ar["D"]."',date='".$T."'");							
				$q3=mysqli_query($con,"SELECT id FROM qbystore WHERE itemid='".$r2["id"]."' AND storeid='".$sto."'");
				if(mysqli_num_rows($q3)>0){
					mysqli_query($con,"UPDATE qbystore SET quantity=quantity+".(int)$ar["C"]." WHERE storeid='".$sto."' AND itemid='".$r2["id"]."'");				
				}else{
					mysqli_query($con,"INSERT INTO qbystore SET quantity='".(int)$ar["C"]."' ,storeid='".$sto."' , itemid='".$r2["id"]."'");					
				}
			}else{
				mysqli_query($con,"INSERT INTO special SET BARCODE='".$ar["A"]."',ITEM='".$ar["B"]."',brand='".$ar["E"]."', CODE='',  DESCRIPTION='".$ar["J"]."', COUNTRY='',TARIC='', QUANTITY='".(int)$ar["C"]."', UNIT='".$ar["B"]."', PRICE='".$price."', TOTAL='".$ar["E"]."',TPRICE='".$tprice."',salesprice='".$sprice."',category='".$r5["id"]."',keywords='".$ar["I"]."',slug='".$slug."' ");
	
			
				$lid=mysqli_insert_id($con);
				mysqli_query($con,"INSERT INTO productbase SET barcode='".$ar["A"]."',name='".$ar["B"]."' ,brand='".$ar["E"]."',quantity='".(int)$ar["C"]."' ,price='".$ar["D"]."',date='".$T."'");
				mysqli_query($con,"INSERT INTO qbystore SET quantity='".(int)$ar["C"]."' ,storeid='".$sto."' , itemid='".$lid."'");		
			}	
			mysqli_query($con,"INSERT INTO journal SET date='".$T."',opertype='11',uid='".$_SESSION['GuserID']."',com='".$a."'");
				
	}
}
	
function geotoeng($word){
	$alpha = array("ა"=>'a',"ბ"=>'b','c',"დ"=>'d',"ე"=>'e',"ფ"=>'f',"გ"=>'g',"ჰ"=>'h',"ი"=>'i','j',"კ"=>'k',"ლ"=>'l',"მ"=>'m',"ნ"=>'n',"ო"=>'o',"პ"=>'p',"ქ"=>'q',"რ"=>'r',"ს"=>'s',"თ"=>'t',"უ"=>'u',"ვ"=>'v','w','x',"ყ"=>'y',"ზ"=>'z',"ჟ"=>"zh","ტ"=>"t","ხ"=>"kh","შ"=>"sh","ღ"=>"gh","ჯ"=>"j","ძ"=>"dz","წ"=>"ts","ჭ"=>"ch","ჩ"=>"ch","a"=>"a","b"=>"b","c"=>"c","d"=>"d","e"=>"e","f"=>"f","g"=>"g","h"=>"h","i"=>"i","j"=>"j","k"=>"k","l"=>"l","m"=>"m","n"=>"n","o"=>"o","p"=>"p","q"=>"q","r"=>"r","s"=>"s","t"=>"t","u"=>"u","v"=>"v","w"=>"w","x"=>"x","y"=>"y","z"=>"z","-"=>"-","0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9");
	$word=str_replace(" ","-",$word);
	$word = preg_split('//u', $word);
	foreach($word as $key=>$value){
		if(array_key_exists($value,$alpha)){
			$newF[$key]=$alpha[$value];
		}
	}
	$newW=implode("",$newF);
	return $newW;	
}
echo 1;
?>
