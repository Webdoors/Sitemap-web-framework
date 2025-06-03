<?php
include("functions.php");
// var_dump($_POST);
$email=mysqli_real_escape_string($con,$_POST["email"]);
$password=mysqli_real_escape_string($con,$_POST["password"]);
$password=encrypt_decrypt("encrypt",$password);
if($email!=""){
	$q1=mysqli_query($con,"SELECT id FROM users WHERE email='".$email."' AND password='".$password."'");
	 // echo "SELECT id FROM users WHERE email='".$email."' AND password='".$password."'";
	if(mysqli_num_rows($q1)>0){
		$r1=mysqli_fetch_array($q1);
		$_SESSION["uid"]=$r1["id"];
		$_SESSION["timeout"]=time()+60*60*24*7;
		echo 1;		
	}else{
		echo "მომხმარებლის ელფოსტა ან პაროლი არასწორია";
	}

}else{
		echo "მიუთითეთ ელფოსტა";	
}

?>