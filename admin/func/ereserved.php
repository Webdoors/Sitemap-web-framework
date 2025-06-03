<?php
session_start();
session_name("kikalastudioadmin");
include("../../db.php");
require '../../../../tests/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
//include the file that loads the PhpSpreadsheet classes


//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();

//add some data in excel cells
	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A1', 'Contragent')
	//->setCellValue('B1', 'Lastname')
	//->setCellValue('C1', 'Tel')
	->setCellValue('B1', 'Details')
	->setCellValue('C1', 'Date')
	->setCellValue('D1', 'Quantity')
	->setCellValue('E1', 'Comment')
	->setCellValue('F1', 'Item')
	->setCellValue('G1', 'Store')
	->setCellValue('H1', 'Orderid');


	$i=1;
	//$q2=mysqli_query($con,"SELECT t1.*,t3.name as 'store',(SELECT DESCRIPTION FROM special as t4 WHERE t2.itemid=t4.id) as 'item' ,  (SELECT id FROM special as t4 WHERE t2.itemid=t4.id) as 'itemid'  FROM info as t1 left join qbystore as t2 on(t1.qbystoreid=t2.id) left join stores as t3 on(t2.storeid=t3.id) WHERE t1.preorder=1");
	$q2=mysqli_query($con,"SELECT t1.*,  t3.quantity, t3.itemid, (SELECT name FROM stores as t4 where t1.place=t4.id) as storename FROM orders as t1  left join special as t2 on(t1.itemname=t2.ITEM) left join  qbystore as t3 on(t2.id=t3.itemid)  WHERE t1.status=12");

	while($r2=mysqli_fetch_array($q2)){
		$i++;
		 

	$spreadsheet->setActiveSheetIndex(0)
	->setCellValue('A'.$i, $r2["contragent"])
	//->setCellValue('B'.$i, $r2["lastname"])
	//->setCellValue('C'.$i, $r2["tel"])
	->setCellValue('B'.$i, $r2["Details"])
	->setCellValue('C'.$i, $r2["date"])
	->setCellValue('D'.$i, $r2["quantity"])
	->setCellValue('E'.$i, $r2["comment"])
	->setCellValue('F'.$i, $r2["itemname"])
	->setCellValue('G'.$i, $r2["storename"])
	->setCellValue('h'.$i, $r2["id"]);

	}



//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);

$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reserved.xlsx"');
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