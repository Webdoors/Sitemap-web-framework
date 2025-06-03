<?php
if($_SESSION['GuserID']!=""){
	$orderid=mysqli_real_escape_string($con,$_POST["orderid"]);

	$q1=mysqli_query($con,"SELECT t5.*,t1.*,(SELECT inbatch FROM products as t2 WHERE t1.good_id=t2.id) as 'inbatch',t1.price as 'rprice' FROM orderproducts as t1	
	LEFT JOIN orders as t4 ON(t1.orderid=t4.id)
	LEFT JOIN products as t5 ON(t1.good_id=t5.id)
	LEFT JOIN id as t2 ON(t1.uid=t2.id)
	LEFT JOIN goods_prices as t3 ON(t3.group_id=t2.price_group AND t1.good_id=t3.good_id)
	WHERE t1.orderid='".$orderid."'");
?>


<table class="table table-bordered table-striped">
<tr>
	<td>Img</td>
	<td>პროდუქტი</td>
	<td>რაოდენობა</td>
	<td>შეკვრაში</td>
	<td>ფასი</td>
	<td>სულ</td>
	<td>კომენ.</td>
</tr>
<?php
while($r1=mysqli_fetch_array($q1)){
	$sul=$r1["sul"]??"0";
	$output = preg_replace_callback('/u([0-9a-fA-F]{4})/', function ($matches) {
		return json_decode('"\u' . $matches[1] . '"');
	}, $r1["comment"]??"");
?>
<tr d="<?=$r1["good_id"]?>">
	<td><img style="width:50px" src="/img/<?=str_replace(["https://supta.ge/img/","https://new.supta.ge/img/"],"",$r1["image1"])?>"/></td>
	<td><a href="/admin/?page=product&id=<?=$r1["good_id"]?>" target="_blank"><?=$r1["title_ka"]?></a></td>
	<td><?=$r1["quantity"]?></td>
	<td><?=$r1["inbatch"]?></td>
	<td><?=$r1["rprice"]?></td>
	<td><?=number_format($r1["rprice"]*$r1["inbatch"]*$r1["quantity"],2)?></td>
	<td><?=$output??""?></td>
</tr>
<?php
}
?>
</table>


<?php
}
?>