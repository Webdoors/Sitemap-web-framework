<?php
// ini_set('display_errors', 1);
 // ini_set('display_startup_errors', 1);
 // error_reporting(E_ALL);

session_name("kikalastudioadmin");
session_start();
include("../db.php");
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//include the file that loads the PhpSpreadsheet classes
	$from=mysqli_real_escape_string($con,$_GET["from"]??"");
	$to=mysqli_real_escape_string($con,$_GET["to"]??"");
	$ACC="";
	$mtdss='';
	$strrr='';
	$DFR='';
	$DTO='';
	if($from!=""){
		$cstart=$from." 00:00:00";
		$DFR=" AND from_unixtime(t1.udate)>='".$cstart."'";
	}
	if($to!=""){
		$cend=$to." 23:59:59";
		$DTO=" AND from_unixtime(t1.udate)<='".$cend."'";
	}
	if(($_GET['method']??"")!='')
	{
      $mtds=(int)$_GET['method'];
	  $mtdss=" AND t1.method='$mtds'";
	}
    if(($_GET['store']??"")!='')
	{
     $strr=(int)($_GET['store']??"");
	 $strrr=" AND t1.place='$strr'";
	}
//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();

//add some data in excel cells
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A1', 'ფინა Id')
	->setCellValue('B1', 'თარიღი')
	->setCellValue('C1', 'ინვოისის ნომერი')
	->setCellValue('D1', 'მისამართი')
	->setCellValue('E1', 'ტელ')
	->setCellValue('F1', 'ქალაქი')
	->setCellValue('G1', 'ჯამში')
	->setCellValue('H1', 'შენიშვნა/კომენტარი');

	$i=1;
	$q1=mysqli_query($con,"SELECT t1.*,t2.address,t2.tel,t2.firstname,t2.lastname,t2.companyname,t2.companyid,t2.personalid FROM orders as t1 LEFT JOIN users as t2 ON(t1.uid=t2.id)
	WHERE t1.id>0 ".$strrr." ".$mtdss." ".$DFR." ".$DTO." ORDER BY id DESC
	");

$rows2=mysqli_fetch_all($q1,MYSQLI_ASSOC);

	foreach($rows2 as $r1){
		$i++;

// echo (trim($r2["itemname"])=="").$item." ".$takeprice."-<br>";
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $r1["finaid"])
	->setCellValue('B'.$i,date("d.m.Y H:i",$r1["udate"]))
	->setCellValue('C'.$i, ($r1["firstname"]." ".$r1["lastname"]." ".$r1["personalid"]." ".$r1["companyname"]." ".$r1["companyid"]))
	->setCellValue('D'.$i, (trim($r1["details"])==""?$r1["address"]:$r1["details"]))
	->setCellValue('E'.$i, $r1["tel"])
	->setCellValue('F'.$i, $r1["city"])
	->setCellValue('G'.$i, $r1["total"])
	->setCellValue('H'.$i, $r1["comment"]);

	}



//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
//$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);

$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Orders.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
//make object of the Xlsx class to save the excel file
$writer = new Xlsx($spreadsheet);
$fxls ='excel-file_1.xlsx';
 
 $writer->save('php://output');
	mysqli_close($con);
?>