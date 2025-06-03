<?php

if(isset($_SESSION['GuserID'])){
$a=mysqli_real_escape_string($con,$_POST["a"]);
$a=str_replace(array("\n", "\r"), '', $a);
$q3=mysqli_query($con,"SELECT * FROM special as t1 LEFT JOIN productbase as t2 on(t1.ITEM=t2.name) LEFT JOIN productprices as t3 on(t1.ITEM=t3.name)  WHERE t1.BARCODE='".trim($a)."' AND t3.quantity > t3.sold AND t3.quantity > 0 LIMIT 1");
$i=0;
while($r3=mysqli_fetch_array($q3)){
	$i++;
?>
	<tr class="ITMS" d="<?=$r3["BARCODE"]?>" salesprice="<?=$r3["salesprice"]?>" takeprice="<?=$r3["price"]?>">

		<td><?=$r3["name"]?></td>
		<td><?=$r3["brand"]?></td>
		<td><?=$r3["barcode"]?></td>
		<td class="ITMPRI"><?=$r3["salesprice"]?></td>
		<td class=""><strong>Sale&nbsp;&nbsp;</strong><input type="checkbox" d="<?=$i?>" class="SALCHE"/></td>
		<td class=""><div class="col-sm-3"><input class="form-control SALPRI" d="<?=$i?>" disabled /></div></td>

	</tr>
<?php
}
}

?>