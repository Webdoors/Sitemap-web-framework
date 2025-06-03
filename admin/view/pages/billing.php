<?php
	
	$q1=mysqli_query($con,"SELECT * FROM billing");
	$rows=mysqli_fetch_all($q1,MYSQLI_ASSOC);
	$uid="1";
?>
<div class="container-fluid">
<label>Billing</label>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Month</th>
			<th>Year</th>
			<th>Users</th>
			<th>Server</th>
			<th>Total Billed</th>
			<th>InvoiceN</th>
			<th>Invoice</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
<?php

	foreach($rows as $r1){

?>

		<tr class="<?=$r1["status"]==0?"bg-danger c-white":"bg-success"?>">
			<td><?=date("F",$r1["date"])?></td>
			<td><?=date("Y",$r1["date"])?></td>
			<td><?=$r1["users"]?></td>
			<td><?=$r1["server"]?></td>
			<td><?=number_format($r1["total"],2)?> &#8382;</td>
			<td><?=date("Ym",$r1["date"]).$uid?></td>
			<td><a class="btn btn-primary" href="func/invoice.php?invoice=<?=date("Ym",$r1["date"]).$uid?>">PDF Invoice</a></td>
			<td><?=$r1["status"]==0?"გადასახდელი":"გადახდილი"?></td>
		</tr>
	
<?php		
 };
?>
</tbody>
</table>
</div>