<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
date_default_timezone_set("Asia/Tbilisi");
		include("/home/admin/domains/webdoors.ge/public_html/partners/dunia/db.php");
mysqli_set_charset($con,"utf8");
$invoice=mysqli_real_escape_string($con,$_GET["invoice"]);
$mid=substr($invoice,6,2);

$q2=mysqli_query($con,"SELECT * FROM aboutmerchant as t1 ");
$r2=mysqli_fetch_array($q2);	
	$html = '
	<div style="display:inline-block;"><h1>სს ვებდორსი</h1><br><br><br><br>
	Address: წერეთლის 97<br>
	Telephone: +995599339099<br>
	Website: https://qcash.ge<br>
	Email: contact@webdoors.ge
	Companyid: 405281216
	</div>

	<div style="position:absolute;right:70px;top:200px;"><strong>Sold To:</strong><br>
	Company: '.$r2["companyname"].'<br>
	Gov.Reg.Id: '.$r2["companyid"].'<br>
	Representator: '.$r2["representator"].'<br>
	Personal Id: '.$r2["personalid"].'<br>
	Email: '.$r2["email"].'
	Address: '.$r2["address"].'
	Tel: '.$r2["tel"].'
	</div>
	<br>
	<div style="position:absolute;right:70px;top:70px;">Invoice No. <strong>'.$invoice.'</strong></div>
		<br><br>
		<br><br>
	<table width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
		<thead>
			<tr>
				<th colspan=2 >Issue date</th>
				<th>'.cal_days_in_month(CAL_GREGORIAN, substr($invoice,4,2), substr($invoice,0,4)).'.'.substr($invoice,4,2).'.'.substr($invoice,0,4).'</th>
			</tr>
			<tr>
			<th>Month</th>
			<th>Year</th>
			<th>Users</th>
			<th>Billed</th>
			<th>Server</th>
			<th>Total Billed</th>
			</tr>
		</thead>
		<tbody>
		';



	$q1=mysqli_query($con,"SELECT * FROM billing WHERE from_unixtime(date,'%m%Y')='".date("mY")."'");
	$rows=mysqli_fetch_all($q1,MYSQLI_ASSOC);
	$uid="1";

	foreach($rows as $r1){
		$html=$html.'<tr>
			<td>'.date("F",$r1["date"]).'</td>
			<td>'.date("Y",$r1["date"]).'</td>
			<td>'.$r1["users"].'</td>
			<td>'.$r1["billed"].' GEL</td>
			<td>'.$r1["server"].' GEL</td>
			<td>'.number_format($r1["total"],2).' GEL</td>
		</tr>';
			
	}

		

	
		
		$html=$html.'</tbody>
	</table>
		<br>
	<style>
		td{
			text-align:center;
		}
		table {
			border: 0.1mm solid #000000;
		}
		td,tr,th {
			border: 0.1mm solid #000000;
		}
	</style>
	';	




	//==============================================================
	//==============================================================
	//==============================================================

require_once '/home/admin/domains/webdoors.ge/public_html/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['tempDir' => '/home/admin/domains/webdoors.ge/public_html/partners/wishlist/tmp']);
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'utf-8';
	// $mpdf=new mPDF('utf-8'); 

	$mpdf->SetDisplayMode('fullpage');

	// LOAD a stylesheet
	$stylesheet = file_get_contents('/var/www/lightspeed.ge/merchant/css/mpdfstyleA4.css');
	$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

	$mpdf->WriteHTML($html);

	$mpdf->Output();

	exit;
	//==============================================================
	//==============================================================
	//==============================================================*/

		include("/home/admin/domains/webdoors.ge/public_html/partners/dunia/db_close.php");
?>