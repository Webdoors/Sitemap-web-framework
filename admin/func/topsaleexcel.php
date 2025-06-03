<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
 session_name("suptaadmin");
session_start();
if($_SESSION['GuserID']!=""){
	include("../../db_open.php");
$start=mysqli_real_escape_string($con,$_REQUEST["start"]??"");
$end=mysqli_real_escape_string($con,$_REQUEST["end"]??"");
$WSTA="";
$WEND="";
if($start!=""){
	$WSTA=" AND from_unixtime(t1.u_group,'%Y%m%d')>=".$start."";
	$WSTA2=" AND from_unixtime(t3.u_group,'%Y%m%d')>=".$start."";
}
if($end!=""){
	$WEND=" AND from_unixtime(t1.u_group,'%Y%m%d')<=".$end."";
	$WEND2=" AND from_unixtime(t3.u_group,'%Y%m%d')<=".$end."";
}
	
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
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
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
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Sales');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'InOrders');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'თანხა');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', '₾');


$WSE="";
$WCA="";
$CAT=(int)$_REQUEST["category"]??"";
if($CAT!=""&&$CAT!="0"){
	$WCA=" AND (t1.category='".$CAT."' OR t1.category in (SELECT id FROM sitmaps WHERE pid='".$CAT."'))";
}
$STATUS=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
$quantity=mysqli_real_escape_string($con,$_REQUEST["volume"]??"");
if($_REQUEST["key"]!=""){
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]);
	$WSE=" AND (t1.title_ka LIKE '%".$KEY."%' OR t1.good_n LIKE '%".$KEY."%')";
}
$WVO="";


if($quantity!=""){
	if($quantity=="1"){
		$WVO=" AND t1.quantity>0 ";		
	}elseif($quantity=="0"){
		$WVO=" AND t1.quantity=0 ";
	}

}
$WHERE=" $WSE $WVO $WCA $WSTA $WEND";

 $WHERE2=" $WSE $WVO $WCA $WSTA2 $WEND2 ";
$q1=mysqli_query($con,"SELECT  t1.good_id,t1.quantity, SUM(t1.price * t1.quantity*(SELECT t4.inbatch FROM products as t4 WHERE t4.id=t1.good_id )) AS total_revenue,
       SUM(t1.quantity) AS total_quantity_sold,
	  (SELECT COUNT(DISTINCT(t3.orderid)) FROM orderproducts as t3 WHERE t3.good_id=t1.good_id  $WHERE2) as in_orders
FROM orderproducts as t1

 WHERE t1.good_id is not null AND (SELECT count(t2.id) FROM orders as t2 WHERE t1.orderid=t2.id AND t2.status=4)>0  $WHERE
GROUP BY t1.good_id
ORDER BY total_revenue DESC  "); 
$i=1;
while($r1=mysqli_fetch_array($q1)){
	$q2=mysqli_query($con,"SELECT t1.*,(SELECT title_ka FROM filters as t2 WHERE t2.id=t1.group_id) as 'group' FROM goods_prices t1 where t1.good_id='".$r1["id"]."'");
	$rows=mysqli_fetch_all($q2,MYSQLI_ASSOC);
	$i++;
	$date="";	
	$q5=mysqli_query($con,"SELECT t1.*,(SELECT t2.name_ka FROM sitemap as t2 WHERE t1.category=t2.id AND t2.itemtype=2 )as 'menu' FROM products as t1 WHERE t1.id='".$r1["good_id"]."'");
	$r5=mysqli_fetch_array($q5);

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $r1['id']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $r5['menu']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $r5['title_ka']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $r5['good_n']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $r1['quantity']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $r5['inbatch']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $r1["total_quantity_sold"]*$r5["inbatch"]??"");
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, $r1["in_orders"]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, $r1["total_revenue"]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, "₾");

}
			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'."TopSaleReport_".date('U').'.xlsx');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 31 Dec 2019 12:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0
			include("../../db_close.php");
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit();	

}

?>