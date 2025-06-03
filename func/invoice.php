<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
session_start();
date_default_timezone_set("Asia/Tbilisi");
// echo getcwd();
		require_once("/home/wizerent/public_html/db_open.php");
mysqli_set_charset($con,"utf8");

	$invoice=mysqli_real_escape_string($con,$_GET["id"]??"");
	$oid=mysqli_real_escape_string($con,$_GET["id"]??"");

if(($p2??"")!=""){
	$invoice=encrypt_decrypt("decrypt",$p2);
	$invoice=json_decode($invoice);
	$invoice=$invoice[0];
	$oid=$invoice;
}
$mid=substr($invoice,6,2);

$q3=mysqli_query($con,"SELECT * FROM orders as t1 WHERE id='".$oid."' ");
$r3=mysqli_fetch_array($q3);
$q4=mysqli_query($con,"SELECT * FROM about as t1 WHERE id='1' ");
$r4=mysqli_fetch_array($q4);
$q2=mysqli_query($con,"SELECT * FROM users as t1 WHERE id='".$r3["uid"]."' ");
$r2=mysqli_fetch_array($q2);	
	$html = '
	<div style="display:inline-block;"><img src="'.$r4["logo"].'" style="height:100px;margin-left:0px;" /><h1>'.$r4["companyname_ka"].'</h1><br><br><br><br>
	Address:'.$r4["address_ka"].'<br>
	Telephone: '.$r4["mobile"].'<br>
	Website: '.$r4["website"].'<br>
	Email: '.$r4["mobile"].'<br>
	Companyid: '.$r4["companyid"].'
	</div>

	<div style="position:absolute;right:70px;top:270px;width:300px;"><strong>Sold To:</strong><br>
	Name: '.($r2["companyname"]==""?$r2["firstname"]." ".$r2["lastname"]:$r2["companyname"]).'<br>
	Gov.Id: '.($r2["companyid"]==""?$r2["pid"]:$r2["companyid"]).'<br>
	Email: '.$r2["email"].'<br>
	Address: '.$r2["address"].'<br>
	Tel: '.$r2["tel"].'<br>
	</div>
	<br>
	<div style="position:absolute;right:70px;top:70px;">Invoice No. <strong>'.$oid.'</strong></div>
		<br><br>
		<br><br>
	<table width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
		<thead>
			<tr>
				<th  >Issue date</th>
				<th>'.date("d.m.Y H:i",$r3["date"]).'</th>
			</tr>
			<tr>
			<th>PRODUCT</th>
			<th></th>
			<th>Dates</th>
			<th>SQ.M</th>
			<th>PRICE</th>
			</tr>
		</thead>
		<tbody>
		';



$data=json_decode($r3["datajson"],1);

foreach($data as $r1){
		$html=$html.'<tr>
			<th>LED ეკრანები</th>
			<th><img style="width:100px" src="/img/v'.($data[0]["option"]=="დასაკიდი"?"1":"2").'.png"></th>
			<th>'.$data[0]["dates"].'</th>
			<th>'.$r1["quantity"].'</th>
	<th>'.floatval($r1["price"])*$r1["quantity"].'</th>
		</tr>';
			
	}

		

	
		
		$html=$html.'
		<tr>
			<td></td>
			<td></td>
			<td>Grand Total</td>
			<td>'.$r3["total"].'ლ</td>
		</tr>
		</tbody>
	</table>
		<br>
		<div style="position:relative;margin-top:100px;">
		საბანკო რეკვიზიტები<br><br>
		<strong>ბანკი</strong>: საქართველოს ბანკი<br>
		<strong>კოდი</strong>: BAGAGE22<br>
		<strong>IBAN</strong>: GE36BG0000000470290500
</div>
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


// echo $html;

	//==============================================================
	//==============================================================
	//==============================================================

require_once '/home/wizerent/public_html/vendor/autoload.php';

 $mpdf = new \Mpdf\Mpdf(['tempDir' => '/home/wizerent/public_html/tmp']);
 $mpdf->allow_charset_conversion = true;
 $mpdf->charset_in = 'utf-8';
	// // $mpdf=new mPDF('utf-8'); 

	$mpdf->SetDisplayMode('fullpage');


	 $stylesheet = file_get_contents('/home/wizerent/public_html/css/style.css');
	 $mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

	$mpdf->WriteHTML($html);
    $docname="invice".$oid.".pdf";
	$mpdf->Output($docname,"I");

    header('Content-Type: application/pdf');
    header("Content-Disposition:inline;filename='$docname");
    readfile("$docname");
exit;
	//==============================================================
	//==============================================================
	//==============================================================*/

		require_once("/home/wizerent/public_html/db_close.php");
		
?>