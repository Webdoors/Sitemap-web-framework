<?php

if(isset($_SESSION['GuserID'])){
		$word=mysqli_real_escape_string($con,$_POST["word"]);
		require_once("../../lang/main.php");
	    $W[$word]="";
        file_put_contents("../../lang/main.php",'<?php $W= ' . var_export($W, true)."; \n\r ?>");
	
	$languages=mysqli_query($con,"SELECT * FROM languages");
	
	while($rlang=mysqli_fetch_assoc($languages))
	{
	if(!file_exists("../../lang/".$rlang['shortname'].".php")) 
	{
		$myfile = fopen("../../lang/".$rlang['shortname'].".php", "w");
		
	}
	

	require_once("../../lang/".$rlang['shortname'].".php");
	$W[$word]="";
file_put_contents("../../lang/".$rlang['shortname'].".php",'<?php $W= ' . var_export($W, true)."; \n\r ?>");


}
}
echo 1;
?>
