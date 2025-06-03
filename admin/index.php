<?php  
// ini_set('display_errors', 1);
 // ini_set('display_startup_errors', 1);
 // error_reporting(E_ALL); 
 //phpinfo();

if (session_status() == PHP_SESSION_NONE) {
    // Set the session name before starting the session
    session_name('suptaadmin');
    session_start();
}
	//phpinfo();
	include("../db_open.php");
	
	date_default_timezone_set("Asia/Tbilisi");
	mysqli_set_charset($con,"utf8");
	mb_internal_encoding("UTF-8");
	
	$Guid=isset($_SESSION['GuserID'])?$_SESSION['GuserID']:""; 
	
	include("functions/permissions.php");
	$permission=permissions($Guid,$con);
    $pages=isset($permission[0]['page'])?$permission[0]['page']:"";

	$q1=mysqli_query($con,"SELECT * FROM admins WHERE id='$Guid'");
	$dir="pages/";
	$gtimeout=isset($_SESSION['Gtimeout'])?$_SESSION['Gtimeout']:"";
if($gtimeout<time()){
	session_unset(); 
	session_destroy(); 
}
if(mysqli_num_rows($q1)>0){

	$PG="about";
	if(isset($_GET["page"])){
		$PG=$_GET["page"];
	}
   $page=getpages($Guid,$PG,$pages,$con);
   $permissions=getprm($Guid,$con,"");

	include("view/inc/head.php");	   
 

	include("view/pages/".$PG.".php");
	

	include("view/inc/foot.php");	
}else{
 include("view/pages/Glogin.php");
}
	include("../db_close.php");
?>