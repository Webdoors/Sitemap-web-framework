<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
 session_name("suptaadmin");
session_start();
if($_SESSION['GuserID']!=""){
	include("../../db_open.php");

	require_once("/home/suptaxnn/domains/supta.ge/oldbestsupta/lib/PHPExcel.php");

		$objPHPExcel = new PHPExcel();

			// Set document properties
			$objPHPExcel->getProperties()->setCreator("Supta.ge")
										 ->setLastModifiedBy("Web-site supta.ge")
										 ->setTitle("Supta.ge INVOICE")
										 ->setSubject("Invoice")
										 ->setDescription("")
										 ->setKeywords("")
										 ->setCategory("");


			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(2);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);



$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'id');	
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'კატეგორია');	
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'დასახელება');	
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'საქონლის კოდი');	
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'რაოდენობა');	
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'შეკვრაში');	
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'სულ გაყიდული ერთ');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'სულ');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', '₾');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'ბრენდი');
	$q2=mysqli_query($con,"SELECT title_ka as 'group' FROM filters");
	$rows=mysqli_fetch_all($q2,MYSQLI_ASSOC);
$arr=["J","K","L","M"];
$b=0;
	foreach($rows as $r2){
		// $data.=$r2["group"]." ".number_format($r2["price"],2)." ₾,";
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($arr[$b]."1", $r2["group"]);
		$b++;
	}


$CAT=(int)$_REQUEST["category"]??"";
if($CAT!="0"){
	$WCA=" AND (t1.sitemapid='".$CAT."' OR t1.sitemapid in (SELECT id FROM sitemap WHERE pid='".$CAT."'))";
}
$STATUS=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
$quantity=mysqli_real_escape_string($con,$_REQUEST["volume"]??"");
if($_REQUEST["key"]!=""){
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]);
	$WSE=" AND (t1.title_ka LIKE '%".$KEY."%' OR t1.good_n LIKE '%".$KEY."%')";
}
$WVO="";
$WSE="";
$WCA="";
if($quantity!=""){
	if($quantity=="1"){
		$WVO=" AND t1.quantity>0 ";		
	}elseif($quantity=="0"){
		$WVO=" AND t1.quantity=0 ";
	}

}
$WHERE=" $WSE $WVO $WCA ";



$q1=mysqli_query($con,"SELECT t1.*,t2.title_ka as 'cat',
(SELECT SUM(quantity) FROM orderproducts as t2 WHERE t1.id=t2.good_id ) as 'tot' ,
(SELECT t2.name FROM brands as t2 WHERE t1.brand=t2.id ) as 'brandi' ,
(SELECT SUM(price*quantity) FROM orderproducts as t2 WHERE t1.id=t2.good_id ) as 'totp' 
FROM products as t1
LEFT JOIN sitemap as t2 ON(t1.sitemapid=t2.id) WHERE t1.id>0 $WHERE ");
$i=1;
while($r1=mysqli_fetch_array($q1)){
	  // var_dump($r1);
	$q2=mysqli_query($con,"SELECT t1.*,(SELECT title_ka FROM filters as t2 WHERE t2.id=t1.group_id) as 'group' FROM goods_prices t1 where t1.good_id='".$r1["id"]."' LIMIT 4");
	$rows=mysqli_fetch_all($q2,MYSQLI_ASSOC);
	$i++;
	$date="";

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $r1['id']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $r1['cat']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $r1['title_ka']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $r1['good_n']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $r1['volume']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $r1['inbatch']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $r1['tot']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, $r1['totp']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, "₾");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$i, $r1['brandi']);
$arr=["0"=>"J","1"=>"K","2"=>"L","3"=>"M"];
$b=0;
// var_dump($rows);

	foreach($rows as $r2){
		// $data.=$r2["group"]." ".number_format($r2["price"],2)." ₾,";
		// echo $arr[$b].$i;
		// var_dump($r2);
		// echo $arr[$b].$i."<br>";
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($arr[$b].$i, $r2["price"]);
		$b++;
	}

}
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'."ProductsReport_".date('U').'.xlsx');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 31 Dec 2019 12:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0
		
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit();	

}
	include("../../db_close.php");
?>