<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
 //phpinfo();
 session_name("suptaadmin");
	session_start();
	//phpinfo();
	

	include("config.php");
	
	date_default_timezone_set("Asia/Tbilisi");
	mb_internal_encoding("UTF-8");
	
	$Guid=isset($_SESSION['GuserID'])?$_SESSION['GuserID']:""; 

    $pages=isset($permission[0]['page'])?$permission[0]['page']:"";



	$PG="home";
	if(isset($_GET["page"])){
		$PG=$_GET["page"];
	}


	include("view/inc/header.php");	   
 

	include("view/pages/".$PG.".php");
	
?>
<?php
	include("view/inc/footer.php");	


?>