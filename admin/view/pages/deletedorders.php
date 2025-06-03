<?php
$ACP=1;
if($_REQUEST["p"]>0){
	$ACP=$_REQUEST["p"];
}
$fr=($ACP-1)*100;
$PA=100;
$key = mysqli_real_escape_string($con,$_GET["key"]);
if($key!=""){
	$WSE=" AND (t1.uid in (select id FROM admins WHERE name LIKE '%".$key."%' OR lastname LIKE '%".$key."%') OR t1.com LIKE '%".$key."%' OR	t1.date LIKE '%".$key."%' OR t1.opertype in (SELECT id FROM opertypes WHERE name LIKE '%".$key."%') OR t1.storeid in (SELECT id FROM stores WHERE name LIKE '%".$key."%')  OR t1.itemid in (SELECT id FROM special WHERE DESCRIPTION LIKE '%".$key."%') OR t1.itemid LIKE '%".$key."%' OR t1.amount LIKE '%".$key."%' )";
}
?>
<br>
<div class="col-md-12 ">
	<div class="col-md-3 NOP">
		<input class="form-control SER SEZ" value="<?=$key?>" placeholder="Search">
	</div>
	<div class="col-md-1">
		<div class="btn btn-default SEE">Search</div>
	</div>
</div>
<br>&nbsp;
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>orderid</th>
				<th>User</th>
				<th>opertype</th>
				<th>date</th>
				<th>store</th>
				<th>comment</th>
				<th>amount</th>
				<th>item</th>								
				<th>itemid</th>								
				<th>id</th>								
			</tr>
		</thead>
		<tbody>
<?php
$q1=mysqli_query($con,"SELECT t1.*,(SELECT name FROM opertypes as t2 WHERE t1.opertype=t2.id) as 'opera',(SELECT name FROM stores as t2 WHERE t1.storeid=t2.id) as 'store',(SELECT t2.DESCRIPTION FROM special as t2 WHERE t1.itemid=t2.id) as 'item',(SELECT CONCAT_WS(".'"'." ".'"'.",t2.name,t2.lastname) FROM admins as t2 WHERE t1.uid=t2.id) as 'fullname' FROM journal as t1 WHERE opertype=10 AND t1.id>0 $WSE ORDER BY id DESC LIMIT 100 OFFSET ".$fr." ");
while($r1=mysqli_fetch_array($q1)){
?>
			<tr>
				<th><?=$r1["orderid"]?></th>
				<th><?=$r1["fullname"]?></th>
				<th><?=$r1["opera"]?></th>
				<th><?=date("d-m-Y H:i:s",$r1["date"])?></th>
				<th><?=$r1["store"]?></th>
				<th><?=$r1["com"]?></th>
				<th><?=$r1["amount"]?></th>
				<th><?=$r1["item"]?></th>									
				<th><?=$r1["itemid"]?></th>									
				<th><?=$r1["id"]?></th>									
			</tr>
<?php
}
?>		
		</tbody>
		<tfoot>
			<tr>
				<th>orderid</th>
				<th>User</th>
				<th>opertype</th>
				<th>date</th>
				<th>store</th>
				<th>comment</th>
				<th>amount</th>
				<th>item</th>																		
				<th>itemid</th>																		
				<th>id</th>																		
			</tr>
		</tfoot>
</table>
<?php
$q3=mysqli_query($con,"SELECT *,(SELECT name FROM opertypes as t2 WHERE t1.opertype=t2.id) as 'opera',(SELECT name FROM stores as t2 WHERE t1.storeid=t2.id) as 'store',(SELECT t2.DESCRIPTION FROM special as t2 WHERE t1.itemid=t2.id) as 'item',(SELECT CONCAT_WS(".'"'." ".'"'.",t2.name,t2.lastname) FROM admins as t2 WHERE t1.uid=t2.id) as 'fullname' FROM journal as t1 ORDER BY id DESC");
?>
	<div class="col-md-12 MID NOP text-center">
	<a href="?page=journal&p=1&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
	<a href="?page=journal&p=<?=$ACP!=1?($ACP-1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=journal&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=journal&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
	<a href="?page=journal&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
	<br>&nbsp;
	<br>&nbsp;
	<style>
	.ACP{
		background:#FFF;
	}
	</style>