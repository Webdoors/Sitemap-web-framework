<?php
if(isset($_SESSION['GuserID'])){
	$a=mysqli_real_escape_string($con,$_POST["a"]);

	mysqli_query($con,"insert into options (pid,memory,color,conditions,price,pricecard,img,quantity,main,nameen	)
select pid,memory,color,conditions,price,pricecard,img,quantity,main,nameen	

from options
where id = $a ");
	$pid=mysqli_insert_id($con);
	echo $pid;
}


?>