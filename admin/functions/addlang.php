	<?php

function addlang( $table,$jsnarrlang,$tmsid,$slug,$con)
{
	
	$slugarr=explode("/",$slug);
	$slugarr="";
	$slugcol=""; 
	$sluglang="";
	if($slug!="")
	{
	$slugarr=explode("/",$slug);
	$slugcol=$slugarr[0];
	$sluglang=$slugarr[1];
	}
	//echo $slug;
	$itmlang=mysqli_prepare($con,"INSERT INTO langs (shortname,tableName,tableId,tableColumn,columnValue) VALUES (?,?,?,?,?)");
		
		foreach($jsnarrlang AS $key => $val )
	{
		$shrt=explode("-",$key);
		$key=explode("_",$key);
		$key=$key[0];
		$val=$val=requestype($key,$val);
		//echo 1;
		if($shrt[1]==$sluglang&&$shrt[0]==$slugcol&&$slug!="")
						{
							$val1=geotoeng($val);
							$key1='slug';
							
							$tms=mysqli_query($con,"UPDATE $table SET $key1='$val1' WHERE id='$tmsid' ");
							//echo "UPDATE $table SET $key1='$val1' WHERE id='$tmsid' ";
							
						}
	    mysqli_stmt_bind_param($itmlang, "ssiss", $shortname, $table_name,$table_id,$table_column,$column_value);
		
		
		$shortname=$shrt[1];
		$table_column=$shrt[0];
		$table_name=$table;
		$column_value=$val;
		$table_id=$tmsid;
		mysqli_stmt_execute($itmlang);	
	}
		
		mysqli_stmt_close($itmlang);	
		
}	
		?>