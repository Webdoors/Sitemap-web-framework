<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("functions.php");
$T=time();
$email=mysqli_real_escape_string($con,$_POST["email"]??"");
$name=mysqli_real_escape_string($con,$_POST["name"]??"");
$lastname=mysqli_real_escape_string($con,$_POST["lastname"]??"");
$companyname=mysqli_real_escape_string($con,$_POST["companyname"]??"");
$companyid=mysqli_real_escape_string($con,$_POST["companyid"]??"");
$tel=mysqli_real_escape_string($con,$_POST["tel"]??"");
$personalid=mysqli_real_escape_string($con,$_POST["personalid"]??"");
$password=mysqli_real_escape_string($con,$_POST["password"]??"");
$smscode=mysqli_real_escape_string($con,$_POST["smscode"]??"");
$password=encrypt_decrypt("encrypt",$password);
$q1=mysqli_query($con,"SELECT * FROM users WHERE email='".$email."' or pid='".$personalid."' ".($companyid!=""?" or companyid='".$companyid."'":"")."");
$q2=mysqli_query($con,"SELECT * FROM sms WHERE code='".$smscode."' AND tel='".$tel."' AND date>".(time()-60*3)." ");
// echo "SELECT * FROM sms WHERE code='".$smscode."' AND tel='".$tel."' AND date>".(time()-60*3)." ";
$cou=$q2?mysqli_num_rows($q2):0;
$cou=1;
if($cou>0){
	if(
		mysqli_num_rows($q1)<1
	){
		$usertype="1";
		if($companyid!=""){
			$usertype="2";
		}
		mysqli_query($con,"INSERT INTO users SET date='".$T."',firstname='".$name."',lastname='".$lastname."',companyid='".$companyid."',companyname='".$companyname."',email='".$email."',tel='".$tel."',password='".$password."',pid='".$personalid."',usertype='".$usertype."', country=79");

		$_SESSION["uid"]=mysqli_insert_id($con);
		$_SESSION["timeout"]=time()+60*60*24*7;
		echo 1;
	}else{
		if(mysqli_num_rows($q1)>0){
			echo "Existing user is already registered in the database";
		}else{
			echo "Fill all the fields correctly";		
		}
		
	}	
}else{
	echo "incorrect sms code";
}



?>