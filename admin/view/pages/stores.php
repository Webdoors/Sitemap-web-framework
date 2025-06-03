<div class="col-md-12">
<br>
	<div class="col-md-4">
		<input class="form-control STR" placeholder="Store Name"/>
	</div>
	<div class="col-md-4">
		<div class="btn btn-default AST">საწყობის დამატება</div>
	</div>
</div>
<div class="col-md-12">
<br>
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>STORE NAME</th>	
				<th>Quantity</th>	
				<th>Reserved</th>	
				<th>Preordered</th>	
				<th>Total Value</th>	
				<th>DELETE</th>									
			</tr>
		</thead>
		<tbody>
<?php
$ts=0;
$tq=0;
$tr=0;
$tp=0;
$q1=mysqli_query($con,"SELECT * FROM stores ORDER BY id DESC");
while($r1=mysqli_fetch_array($q1)){
$q2=mysqli_query($con,"SELECT SUM(quantity) as 'q', SUM(reserve) as 'r', SUM(preorder) as 'p' FROM qbystore WHERE storeid='".$r1["id"]."'");
$r2=mysqli_fetch_array($q2);
$q3=mysqli_query($con,"SELECT SUM(price) as 'SUMP' FROM (SELECT ((SELECT PRICE FROM special as t2 WHERE t1.itemid=t2.id)*t1.quantity) as 'price' FROM `qbystore` as t1 WHERE t1.storeid=".$r1["id"].") as t4");
$r3=mysqli_fetch_array($q3);
$ts=$ts+$r3["SUMP"];
$tq=$tq+$r2["q"];
$tr=$tr+$r2["r"];
$tp=$tp+$r2["p"];
?>
			<tr>
				<th><?=$r1["id"]?></th>
				<th><?=$r1["name"]?></th>	
				<th><?=$r2["q"]?></th>	
				<th><?=$r2["r"]?></th>	
				<th><?=$r2["p"]?></th>	
				<th><?=round($r3["SUMP"],2) ?></th>	
				<th><?php if($r1["id"]!="1"){?><div class="btn btn-default DEL" t="stores" d="<?=$r1["id"]?>">Delete</div><?php }?></th>									
			</tr>
<?php
}
?>		
		</tbody>
		<tfoot>
			<tr>
				<th>Total</th>
				<th></th>	
				<th><?=$tq?></th>	
				<th><?=$tr?></th>	
				<th><?=$tp?></th>	
				<th><?=round($ts,2)?></th>	
				<th></th>									
			</tr>
		</tfoot>
</table>
</div>