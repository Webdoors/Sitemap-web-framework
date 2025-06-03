
<?php

if(isset($_SESSION['GuserID'])){

	$jsn=$_POST["a"];
	$jsnlang=$_POST["b"];
	$table=mysqli_real_escape_string($con,$_POST["c"]);
	
	$pos=1;
	$jsnarr=json_decode($jsn,true);
	$addarr='';
	foreach($jsnarr AS $key => $val )
	{
		$val=mysqli_real_escape_string($con,$val);
	   	$addarr.="$key='".$val."',";
	}

     $addarr=rtrim($addarr,",");
	 echo $jsnlang;
	
   $alsld=mysqli_query($con,"SELECT * FROM $table ORDER BY position DESC");
	if(mysqli_num_rows($alsld)>0)
	{
	$ralsld=mysqli_fetch_assoc($alsld);
	$pos=++$ralsld['position'];
	
	}
	$addarr.=", position='$pos'";
	
		$tms=mysqli_query($con,"INSERT INTO $table SET $addarr");
		echo "INSERT INTO slider SET $addarr";
	
	$tmsid=(int)mysqli_insert_id($con);
	$jsnarrlang=json_decode($jsnlang,true);
	
	if(count($jsnarrlang)>0)
	{
		$itmlang=mysqli_prepare($con,"INSERT INTO langs (name,short_name,table_name,table_id,table_column,column_value) VALUES (?,?,?,?,?,?)");
		
		foreach($jsnarrlang AS $key => $val )
	{
		$shrt=explode("-",$key);
		$val=mysqli_real_escape_string($con,$val);
	    mysqli_stmt_bind_param($itmlang, "sssiss", $name, $short_name, $table_name,$table_id,$table_column,$column_value);
		
		$name='';
		$short_name=$shrt[1];
		$table_column=$shrt[0];
		$table_name=$table;
		$column_value=$val;
		$table_id=$tmsid;
		
		mysqli_stmt_execute($itmlang);
		
		//echo "<br/>". $name .' - ' . $short_name . ' - '
	}
		
		mysqli_stmt_close($itmlang);

		
	}

	echo 1;
}

?>
