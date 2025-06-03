<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
		include("/home/intelect/public_html/admin/db.php");
require '../../vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



$orderid=mysqli_real_escape_string($con,$_GET["orderid"]??"");

$q1=mysqli_query($con,"SELECT t1.* FROM orders as t1 WHERE t1.id='".$orderid."' ");
$r1=mysqli_fetch_array($q1);
$q3=mysqli_query($con,"SELECT t1.* FROM users as t1 WHERE t1.id='".$r1["uid"]."' ");
$r3=mysqli_fetch_array($q3);
$uid=$r1["uid"];
$spreadsheet = new Spreadsheet();

	
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('C1', 'ინვოისი');
$sheet->setCellValue('C3', 'გადამხდელი');
$sheet->setCellValue('D3', ($r3["companyname"]!=""?$r3["companyname"]:$r3["firstname"]." ".$r3["lastname"]));
$sheet->setCellValue('C4', '');
$sheet->setCellValue('D4', $r3["companyid"]!=""?$r3["companyid"]:$r3["personalid"]);
$sheet->getColumnDimension('D')->setWidth(10);
$sheet->setCellValue('C5', '');
$sheet->setCellValue('D5', $r3["address"]);
$sheet->setCellValue('C7', 'თარიღი');
$sheet->setCellValue('D7', date("m/d/Y",$r1["udate"]));
$sheet->setCellValue('C8', 'ნომერი');
$sheet->setCellValue('D8', $orderid);
$sheet->setCellValue('C9', 'გადახდის ვადა');
$sheet->setCellValue('D9', "3დღე");
$sheet->getStyle("C1")->getFont()->setSize(36);
$sheet->setCellValue('A11', 'N');
$sheet->setCellValue('B11', 'დასახელება');	
$sheet->getColumnDimension('B')->setWidth(40);
$sheet->getColumnDimension('C')->setWidth(18);
$sheet->setCellValue('C11', 'საზომი ერთეული');	
$sheet->setCellValue('D11', 'რაოდენობა');	
$sheet->setCellValue('E11', 'ფასი');
$sheet->setCellValue('F11', 'თანხა');	
$sheet->getStyle('A11:F11')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('1f69a3');
$sheet->getStyle('A11:F11')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);	


$q2=mysqli_query($con,"SELECT t1.* FROM orderproducts as t1 WHERE t1.orderid='".$orderid."' ");

$i=11;
$orderstatus=["0"=>"","1"=>"დასადასტურებელი","2"=>"დადასტურებული","3"=>"გაუქმებული"];
$deliverystatus=["0"=>"","1"=>"გასაგზავნია","2"=>"გაგზავნილია","3"=>"მიტანილია","4"=>"დაბრუნებულია"];
// echo getcwd();
$v=0;
while($r2=mysqli_fetch_array($q2)){

	if($uid!=""){
		$q11=mysqli_query($con,"select status FROM users as t1 where t1.id='".$uid."' ");
		$q22=mysqli_query($con,"select * FROM products as t1 where t1.code='".$r2["code"]."' ");
		$r11=mysqli_fetch_array($q11);
		$r22=mysqli_fetch_array($q22);
		$sacalo=$r22["sacalo"];
		if($r11["status"]=="1"){
			$fasi=$r22["sacalo"];
		}elseif($r11["status"]=="2"){
			$fasi=$r22["mcire"];	
		}elseif($r11["status"]=="3"){
			$fasi=$r22["sabitumo"];	
		}elseif($r11["status"]=="4"){
			$fasi=$r22["sadistribucio"];	
		}			
	}else{
		$fasi=0;
		$sacalo=0;
	}

	$price=["price"=>$fasi,"sacalo"=>$sacalo];	
	$i++;
	$v++;
	$sheet->setCellValue('A'.$i, "$v" );
	$sheet->setCellValue('B'.$i,$r2["item"]);	
	$sheet->setCellValue('C'.$i, 'ცალი');	
	$sheet->setCellValue('D'.$i, $r2["quantity"]);	
	$sheet->setCellValue('E'.$i, $price["price"]);	
	$sheet->setCellValue('F'.$i, number_format($r2["quantity"]*$price["price"],2));

}
	$sheet->setCellValue('E'.$i+1, "ჯამი (GEL)");	
	$sheet->setCellValue('F'.$i+1, number_format($r1["total"],2));
	$k=$i+5;
	$sheet->setCellValue('B'.$k, "მიმღები შპს ინტელექტრო");	
	$sheet->setCellValue('B'.$k+1, "პროკრედიტ ბანკი MIBGGE22");	
	$sheet->setCellValue('B'.$k+2, "GE62PC0453600100001058");	
	$sheet->setCellValue('C'.$k+2, "მადლობა თანამშრომლობისთვის");	
	$sheet->getStyle('C'.$k+2)->getFont()->setSize(12);
	$sheet->setCellValue('B'.$k+4, "200264356");	
	
	$style = array(
		'alignment' => array(
			'horizontal' =>\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
		)
	);
	$sheet->getStyle('B'.$k+4)->applyFromArray($style);	
	
	$sheet->setCellValue('B'.$k+5, "თბილისი, გურამიშვილის გამზ.78");	
	$sheet->setCellValue('C'.$k+5, "ხელმოწერა");	
	$sheet->setCellValue('B'.$k+6, "032 2152818");	
	$sheet->setCellValue('B'.$k+7, "intelectro@intelectro.ge");	
$styleArray = array(
    'borders' => array(
        'inside' => array(
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => array('argb' => '000000'),
        ),
        'outline' => array(
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => array('argb' => '000000'),
        )
    ),
);
// $styleArray2 = array(
    // 'borders' => array(
        // 'inside' => array(
            // 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            // 'color' => array('argb' => '000000'),
        // ),
        // 'outline' => array(
            // 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            // 'color' => array('argb' => '000000'),
        // )
    // ),
// );

// $sheet = $sheet ->getStyle('A:Z')->applyFromArray($styleArray2);
	
$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setPath('../../img/intlogo.png'); // put your path and image here
$drawing->setCoordinates('A1');
$drawing->setWorksheet($spreadsheet->getActiveSheet());	

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setOffsetX(100);
$drawing->setPath('../../img/d1.png'); // put your path and image here
$drawing->setCoordinates('C4');
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setOffsetX(100);
$drawing->setPath('../../img/d2.png'); // put your path and image here
$drawing->setCoordinates('C5');
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setOffsetX(40);
$drawing->setPath('../../img/d1.png'); // put your path and image here
$drawing->setCoordinates('A21');
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setOffsetX(40);
$drawing->setPath('../../img/d2.png'); // put your path and image here
$drawing->setCoordinates('A22');
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setOffsetX(40);
$drawing->setPath('../../img/d3.png'); // put your path and image here
$drawing->setCoordinates('A23');
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setOffsetX(40);
$drawing->setPath('../../img/d4.png'); // put your path and image here
$drawing->setCoordinates('A24');
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$writer = new Xlsx($spreadsheet);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="invoice'.$orderid.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 31 Dec 2019 12:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

		include("/home/intelect/public_html/admin/db_close.php");
$writer->save('php://output');
exit();