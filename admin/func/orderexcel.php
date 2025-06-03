<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
 session_name("suptaadmin");
session_start();
if($_SESSION['GuserID']!=""){
	include("../../db_open.php");
	require_once("/home/suptaxnn/domains/supta.ge/oldbestsupta/lib/PHPExcel.php");
$status=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
$payed=mysqli_real_escape_string($con,$_REQUEST["payed"]??"");
$method=mysqli_real_escape_string($con,$_REQUEST["method"]??"");
$start=mysqli_real_escape_string($con,$_REQUEST["start"]??"");
$end=mysqli_real_escape_string($con,$_REQUEST["end"]??"");
$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
$WSE="";
$WST="";
$WPA="";
$WME="";
$WSTA="";
$WEND="";
if($KEY!=""){
	$WSE=" AND (t1.title_ka LIKE '%".$KEY."%' OR CONCAT(t3.name, ' ', t3.lastname) LIKE '%".$KEY."%'  OR  t3.name LIKE '%".$KEY."%' OR t3.lastname LIKE '%".$KEY."%' OR t3.company_name LIKE '%".$KEY."%' OR t1.u_group LIKE '%".$KEY."%')";
	// echo $WSE;
}
if($status!=""){

	$WST=" AND t1.status='".$status."'";
}
if($payed!=""){

	$WPA=" AND t1.payed='".$payed."'";
}
if($method!=""){

	$WME=" AND t1.method='".$method."'";
}
if($start!=""){

	$WSTA=" AND from_unixtime(t1.paydate,'%Y%m%d')>=".$start."";
}
if($end!=""){

	$WEND=" AND from_unixtime(t1.paydate,'%Y%m%d')<=".$end."";
}
$stype= mysqli_real_escape_string($con,$_GET["type"]??"");
$srt= strtoupper(mysqli_real_escape_string($con,$_GET["sort"]??""));

switch ($stype){
    case "date":
        $ord="ORDER BY t1.u_group"." ".$srt."";
        break;
    case "owner":
        $ord="ORDER BY owner"." ".$srt."";
        break;
    case "order":
        $ord="ORDER BY owner"." ".$srt."";
        break;
    case "invoice":
        $ord="ORDER BY t1.u_group"." ".$srt."";
        break;
    case "money":
        $ord="ORDER BY totali"." ".$srt."";
        break;
    default:
        $ord="ORDER BY t1.u_group DESC";
}



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
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(12);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(2);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);



		    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'თარიღი');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'შემკვეთი');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'იურ.დასახელება');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'ს.ნ');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'InvoiceN');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'quantity');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Total');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', ' ');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Payed');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Method');	
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'Status');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Personal_ID');

$q1=mysqli_query($con,"SELECT t1.*,t4.*,t6.name as 'meth',t5.name as 'sta' FROM orders as t1 
LEFT JOIN id as t4 ON(t4.id=t1.uid)
LEFT JOIN status as t5 ON(t1.status=t5.id)
LEFT JOIN methods as t6 ON(t1.method=t6.id)
 WHERE t1.id>0 AND t1.status>=3 AND t1.invoice<>0 $WSE $WST $WPA $WME $WSTA $WEND ORDER BY t1.paydate DESC ");


$i=1;
while($r1=mysqli_fetch_array($q1)){
	$total=$r1["grandtotal"]??0;
	if($total<=50){
		$total=$total+5;
	}
	$i++;
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i,date("d.m.Y H:i",intval($r1["paydate"])));
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $r1["name"]." ".$r1["lastname"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i,$r1["company_name"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i,$r1["company_id"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i,$r1["invoice"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $r1["qty"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $r1["amount"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, "₾");
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, ($r1["payed"]==1?"გადახდილია":"გადაუხედელია"));
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, $r1["meth"]);	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$i, $r1["sta"]);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $r1["personal_id"]);

}
			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'."OrderReport_".date('U').'.xlsx');
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