<?php
session_start();
session_name("kikalastudioadmin");
include("../../db.php");
require '../../../../tests/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//include the file that loads the PhpSpreadsheet classes
	$from=mysqli_real_escape_string($con,$_GET["from"]);
	$to=mysqli_real_escape_string($con,$_GET["to"]);
	$ACC="";
	if($from!=""){
		$cstart=$from." 00:00:00";
		$DFR=" AND from_unixtime(t1.udate)>='".$cstart."'";
	}
	if($to!=""){
		$cend=$to." 23:59:59";
		$DTO=" AND from_unixtime(t1.udate)<='".$cend."'";
	}

//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();

//add some data in excel cells
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A1', 'თარიღი')
	->setCellValue('B1', 'სტატუსი')
	->setCellValue('C1', 'ინვოისის ნომერი')
	->setCellValue('D1', 'კონტრაგენტი')
	->setCellValue('E1', 'მისამართი, პირადი ნომერი, ტელ, ნომერი')
	->setCellValue('F1', 'ნივთის დასახელება')
	->setCellValue('G1', 'მომწოდებელი')
	->setCellValue('H1', 'ასაღები ფასი')
	->setCellValue('I1', 'გასაყიდი ფასი')
	->setCellValue('J1', 'მოგება')
	->setCellValue('K1', 'გადახდის ტიპი')
	->setCellValue('L1', 'თანხის შემოსვლა')
	->setCellValue('M1', 'კურიერი')
	->setCellValue('N1', 'შეკვეთის მიმღები')
	->setCellValue('O1', 'გაყიდვის ადგილი')
	->setCellValue('P1', 'შენიშვნა/კომენტარი')
	->setCellValue('Q1', 'ჯარიმა')
	->setCellValue('R1', 'ჩამოწერა')
	->setCellValue('S1', 'Orderid');

	$i=1;
	$q2=mysqli_query($con,"SELECT t1.*,t2.name as 'cur',t3.name as 'sta',t4.name as 'meth',t5.name as 'pla', t6.name as own FROM orders as t1
	LEFT JOIN curriers as t2 ON (t1.currier=t2.id)
	LEFT JOIN status as t3 ON (t1.status=t3.id)
	LEFT JOIN methods as t4 ON (t1.method=t4.id)
	LEFT JOIN stores as t5 ON (t1.place=t5.id)
	LEFT JOIN sellers as t6 ON (t1.owner=t6.id)
	WHERE t1.id>0 ".$DFR." ".$DTO."
	");
	while($r2=mysqli_fetch_array($q2)){
		$i++;
		

	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $r2["date"])
	->setCellValue('B'.$i, $r2["sta"])
	->setCellValue('C'.$i, $r2["invoice"])
	->setCellValue('D'.$i, $r2["contragent"])
	->setCellValue('E'.$i, $r2["details"])
	->setCellValue('F'.$i, $r2["itemname"])
	->setCellValue('G'.$i, $r2["supplier"])
	->setCellValue('H'.$i, $r2["takeprice"])
	->setCellValue('I'.$i, ($r2["sale"]=="1"?$r2["saleprice"]:$r2["price"]))
	->setCellValue('J'.$i, $r2["profit"])
	->setCellValue('K'.$i, $r2["meth"])
	->setCellValue('L'.$i, $r2["income"])
	->setCellValue('M'.$i, $r2["cur"])
	->setCellValue('N'.$i, $r2["own"]!=""?$r2["own"]:$r2["owner"])
	->setCellValue('O'.$i, $r2["pla"])
	->setCellValue('P'.$i, $r2["comment"])
	->setCellValue('Q'.$i, $r2["fine"])
	->setCellValue('R'.$i, 'ჩამოწერა')
	->setCellValue('S'.$i, $r2['id']);

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