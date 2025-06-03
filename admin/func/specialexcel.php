<?php
$a=mysqli_real_escape_string($con,$_POST["a"]);
require '../../../../tests/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$T=time();
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load("../".end(explode("/admin/",$a)));
$worksheet=$spreadsheet->getActiveSheet();
$rows = $worksheet->toArray();
$i=0;
foreach($rows as $ar){
	$i++;
	if($i>20){
		if( intval($ar[0])>0){
			//var_dump($ar);
			//echo "<br>".$ar[0]." ".$ar[2]." ".$ar[6]." ".$ar[14]." ".$ar[24]." ".$ar[29]." ".$ar[34]." ".$ar[39]." ".$ar[43]." ".$ar[47];
			$tprice=round(floatval($ar[47])*1.18*2.45,2);
			$q1=mysqli_query($con,"SELECT id FROM special WHERE DESCRIPTION='".$ar[14]."'");
			if(mysqli_num_rows($q1)>0){
				mysqli_query($con,"UPDATE special SET ITEM='".$ar[0]."', CODE='".$ar[2]."', BARCODE='".$ar[6]."', DESCRIPTION='".$ar[14]."', COUNTRY='".$ar[24]."',TARIC='".$ar[29]."', QUANTITY='".$ar[34]."', UNIT='".$ar[39]."', PRICE='".$ar[43]."', TOTAL='".$ar[47]."',TPRICE='".$tprice."' WHERE ITEM='".$ar[0]."'");
				$q2=mysqli_query($con,"SELECT id FROM special WHERE ITEM='".$ar[0]."'");
				$r2=mysqli_fetch_array($q2);
				mysqli_query($con,"INSERT INTO productbase SET name='".$ar[14]."' ,quantity='".$ar[34]."' ,price='".$ar[43]."',date='".$T."'");							
				$q3=mysqli_query($con,"SELECT id FROM qbystore WHERE itemid='".$r2["id"]."'");
				if(mysqli_num_rows($q3)>0){
					mysqli_query($con,"UPDATE qbystore SET quantity=quantity+".$ar[34]." WHERE storeid='1' AND itemid='".$r2["id"]."'");				
				}else{
					mysqli_query($con,"INSERT INTO qbystore SET quantity='".$ar[34]."' ,storeid='1' , itemid='".$r2["id"]."'");					
				}
			}else{
				mysqli_query($con,"INSERT INTO special SET ITEM='".$ar[0]."', CODE='".$ar[2]."', BARCODE='".$ar[6]."', DESCRIPTION='".$ar[14]."', COUNTRY='".$ar[24]."',TARIC='".$ar[29]."', QUANTITY='".$ar[34]."', UNIT='".$ar[39]."', PRICE='".$ar[43]."', TOTAL='".$ar[47]."',TPRICE='".$tprice."'");
				$lid=mysqli_insert_id($con);
				mysqli_query($con,"INSERT INTO qbystore SET quantity='".$ar[34]."' ,storeid='1' , itemid='".$lid."'");		
			}	
		}
				
	}
}
echo 1;
?>