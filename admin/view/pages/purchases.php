<?php
	
	$q1=mysqli_query($con,"SELECT * FROM purchases");
	$rows=mysqli_fetch_all($q1,MYSQLI_ASSOC);
	$uid="1";
?>
<div class="container-fluid">
<label class="mt-2">შესყიდვები</label><button class="btn btn-primary m-2">დამატება</button>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Date</th>
			<th>company_name</th>
			<th>company_id</th>
			<th>Invoice</th>
			<th>Total</th>
			<th>დეტალურად</th>
		</tr>
	</thead>
	<tbody>
<?php

	foreach($rows as $r1){

?>

		<tr class="<?=$r1["status"]==0?"bg-danger c-white":"bg-success"?>">
			<th><?=$r1["id"]?></th>
			<th><input type="date" value="<?=date("d.m.Y",$r1["date"])?>"/></th>
			<th><input value="<?=$r1["company_name"]?>"/></th>
			<th><input value="<?=$r1["company_id"]?>"/></th>
			<th><input value="<?=$r1["invoice"]?>"/></th>
			<th><input value="<?=$r1["total"]?>"/></th>
			<th><button class="btn btn-primary">დეტალურად</button></th>
		</tr>
	
<?php		
 };
?>
</tbody>
</table>
</div>