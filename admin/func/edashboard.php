<?php
session_start();
session_name("kikalastudioadmin");
include("../../db.php");
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//include the file that loads the PhpSpreadsheet classes
$itrr=(int)$_GET['store'];
$str=mysqli_query($con, "SELECT name FROM stores WHERE id='".$itrr."'");
$ritrr=mysqli_fetch_assoc($str);
//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();

//add some data in excel cells
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A1', 'Count')
	->setCellValue('B1', 'BARCODE')
	->setCellValue('C1', 'ITEM')
	->setCellValue('D1', 'BRAND')
	->setCellValue('E1', 'QUANTITY')
	->setCellValue('F1', 'PRICE')
	->setCellValue('G1', 'SALES PRICE')
	->setCellValue('H1', 'TOTAL T.PRICE')
	->setCellValue('I1', 'RESERVE')
	->setCellValue('J1', 'PRE-ORDER');

	$i=1;
	$SQ=0;
    $SR=0;
    $SP=0;
    $TP=0;
    $TT=0;
    $TTP=0;
	$q2=mysqli_query($con,"SELECT t1.*, t2.storeid FROM special as t1 LEFT JOIN qbystore as t2 on (t2.itemid=t1.id AND t2.storeid='".$itrr."' AND t2.quantity>0) WHERE t2.storeid='".$itrr."' AND  t1.id>0");
    $ca=0;
	$q3=mysqli_query($con,"SELECT SUM(reserve) as 'res',SUM(preorder) as 'pre',SUM(quantity) as 'qnty' FROM `qbystore` WHERE itemid='".$r2["id"]."'");
	$r3=mysqli_fetch_array($q3);
	$qua=$r2["QUANTITY"];
	$SQ=$SQ+$r2["QUANTITY"];
	$SR=$SR+($r3["res"]?$r3["res"]:0);
	$SP=$SP+($r3["pre"]?$r3["pre"]:0);
	$TP=$TP+$r2["PRICE"]*$r2["QUANTITY"];
	$TT=$TT+$r2["PRICE"]*$r3["qnty"];
	$TTP=$TTP+$r2["TPRICE"]*$r2["QUANTITY"];

	
	while($r2=mysqli_fetch_array($q2)){
		$i++;
		$ca++;

	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $ca)
	->setCellValue('B'.$i, $r2["BARCODE"])
	->setCellValue('C'.$i, $r2["ITEM"])
	->setCellValue('D'.$i, $r2["brand"])
	->setCellValue('E'.$i, $r3["cnty"])
	->setCellValue('F'.$i, round($r2["PRICE"],2))
	->setCellValue('G'.$i, round($r2['salesprice'],2))
	->setCellValue('H'.$i, round($r2['price']*r3['qnty'],2))
	->setCellValue('I'.$i, ($r3["res"]?$r3["res"]:0) )
	->setCellValue('J'.$i, ($r3["pre"]?$r3["pre"]:0) );

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
header('Content-Disposition: attachment;filename="'.$ritrr['name'].'.xlsx"');
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