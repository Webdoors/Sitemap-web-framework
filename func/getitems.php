<table class="table table-striped">
	<thead>
		<tr>
			<th>Dates</th>
			<th>Sq.m</th>
			<th>Price</th>
		</tr>
	</thead>
<?php

$a=mysqli_real_escape_string($con,$_POST["a"]);
$q1=mysqli_query($con,"SELECT * FROM orders WHERE id='".$a."'");
$r1=mysqli_fetch_array($q1);
$data=json_decode($r1["datajson"],1);

foreach($data as $item){

?>
<tr>
	<td><?=$item["dates"]?></td>
	<td><?=$item["quantity"]?></td>
	<td><?=number_format($item["price"],2)?>₾</td>
</tr>

<?php
}
?>
	</div>