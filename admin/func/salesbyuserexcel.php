<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
 session_name("suptaadmin");
session_start();
if($_SESSION['GuserID']!=""){
	$WSTA="";
$WEND="";
$WSTAT="";
$WSPE="";
$WACT="";
$WSE="";
$KEY="";
$cid="";
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
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);




$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'id');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'date');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'price_group');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'company_name');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'company_id');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'shipped');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'name');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'lastname');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'email');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'personal_id');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', 'mobile_phone');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', 'Spero');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', 'current_address');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', 'ბრუნვა');

$status='';
$start='';
$end='';
$active='';
if(isset($_REQUEST["status"]))
{
$status=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
}
if(isset($_REQUEST['start']))
{
$start=mysqli_real_escape_string($con,$_REQUEST["start"]??"");
}
if(isset($_REQUEST['end']))
{

$end=mysqli_real_escape_string($con,$_REQUEST["end"]??"");
}
if(isset($_REQUEST['active']))
{
$active=mysqli_real_escape_string($con,$_REQUEST["active"]??"");
}
$status=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
$active=mysqli_real_escape_string($con,$_REQUEST["active"]??"");
$spero=mysqli_real_escape_string($con,$_REQUEST["spero"]??"");
if($spero!=""){

	$WSPE=" AND t1.industry='".$spero."'";
}
if($active!=""){
	if($active=="2"){
		$WACT=" AND (SELECT COUNT(t4.id) FROM orders as t4 WHERE t4.uid=t1.id AND t4.status='4')<1 ";			
	}elseif($active=="3"){
			$WACT=" AND t1.deleted=1 ";		
	}else{
		$WACT=" AND (SELECT COUNT(t4.id) FROM orders as t4 WHERE t4.uid=t1.id AND t4.status='4')>0 ";		
	}
}
if($status!=""){
	if($status=="2"){
		$WSTAT=" AND t1.usertype=2 ";				
	}else{
		$WSTAT=" AND t1.usertype=1 ";		
	}

}
if(($_REQUEST["key"]??"")!=""){
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]);
	$WSE=" AND (t1.personal_id LIKE '%".$KEY."%' OR t1.company_id LIKE '%".$KEY."%' OR t1.name LIKE '%".$KEY."%' OR t1.lastname LIKE '%".$KEY."%' OR t1.email LIKE '%".$KEY."%' OR t1.mobile_phone LIKE '%".$KEY."%')";
}
if($start!=""){

	$WSTA=" AND from_unixtime(t1.date,'%Y%m%d')>=".$start."";
}

if($end!=""){

	$WEND=" AND from_unixtime(t1.date,'%Y%m%d')<=".$end."";
}




$WHERE=" $WSE $WSTA $WEND $WSTAT $WACT $WSPE";


$q1=mysqli_query($con,"SELECT t1.*,(SELECT COUNT(t4.id) FROM orders as t4 WHERE t4.uid=t1.id AND t4.status='4') as 'tsum',(SELECT SUM(t4.amount) FROM orders as t4 WHERE t4.uid=t1.id AND t4.status='4') as 'totalsales',(SELECT t3.name FROM usertypes as t3 WHERE t1.usertype=t3.id) as 'utype',(SELECT t5.title_ka FROM filters as t5 WHERE t5.id=t1.price_group LIMIT 1) as 'pgroup' FROM id as t1 WHERE t1.id>0 $WHERE  ORDER BY t1.id DESC ");
$i=1;
while($r1=mysqli_fetch_array($q1)){
	$i++;

$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $r1['id']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, date("d/m/Y",$r1['date']));
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $r1['pgroup']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $r1['company_name']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $r1['company_id']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $r1['tsum']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $r1['name']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, $r1['lastname']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, $r1['email']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, $r1['personal_id']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$i, $r1['mobile_phone']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $r1['industry']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i, $r1['current_address']);
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$i, number_format(($r1["totalsales"]??0),2));


}
			// Redirect output to a client’s web browser (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'."SalesbyUserReport_".date('U').'.xlsx');
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
	include("../../db_close.php");
}

?>