<?php

$T=time();

$a=mysqli_real_escape_string($con,$_POST["doc"]);

$b=mysqli_real_escape_string($con,$_POST["doc"]);

mysqli_query($con,"INSERT INTO excel SET catid='$a',link='$b'");

$INF="../uploads/language/EXCEL/".explode("/language/EXCEL/",$b)[1];

// echo $INF;

// error_reporting(E_ALL);

// ini_set('display_errors', TRUE);

// ini_set('display_startup_errors', TRUE);

date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')

	die('This example should only be run from a Web Browser');

require_once dirname(__FILE__) . '/excel/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$objReader = new PHPExcel_Reader_Excel2007();

$sheetnames = $objReader->listWorksheetNames(urldecode($INF));

$objReader->setLoadSheetsOnly($sheetnames[0]);

$objPHPExcel = $objReader->load(urldecode($INF)); 

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

$i=0;

mysqli_query($con,"DELETE FROM unibat");
$en=[];
$ge=[];
foreach($sheetData as $row){

	$i++;

	$A=mysqli_real_escape_string($con,$row["A"]);

	$B=mysqli_real_escape_string($con,$row["B"]);

	$C=mysqli_real_escape_string($con,$row["C"]);


	if($i>1){
		if(trim($A)!=""){

			$en[$A]=$B;		
			$ge[$A]=$C;		

		}
	}
}	

file_put_contents("../../lang/en.php",'<?php $w= ' . var_export($en, true)."; \n\r ?>");
file_put_contents("../../lang/ge.php",'<?php $w= ' . var_export($ge, true)."; \n\r ?>");
echo 1;

?>