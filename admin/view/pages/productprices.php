<?php
$ACP=1;
if($_REQUEST["p"]>0){
	$ACP=$_REQUEST["p"];
}
$fr=($ACP-1)*100;
$PA=100;
$key = mysqli_real_escape_string($con, $_GET["key"]);
//$key =urldecode($_SERVER['REQUEST_URI']);


if($key!=""){
	$WSE="AND t1.name LIKE '%".$key."%' OR t1.barcode LIKE '%".$key."%'";
}

?>
<br>
<div class="col-md-12 ">
	<div class="col-md-3 NOP">
		<input class="form-control SERKK" value="<?=$key?>" placeholder="Search">
	</div>
	<div class="col-md-1">
		<div class="btn btn-default SEEP">Search</div>
	</div>

</div>
<br>&nbsp;
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
<th>N</th>
<th>name</th>
<th>barcode</th>
<th>quantity</th>
<th>real quantity</th>
<th>price</th>
<th>date</th>
<th>sold</th>						
			</tr>
		</thead>
		<tbody>
<?php
$drr=1;
if(isset($_REQUEST['p']))
{  if($_REQUEST['p']>1)
	{
	 $drr=($_REQUEST['p']-1) *100+1 ;
    }
	}

$q1=mysqli_query($con,"SELECT * FROM productprices as t1 WHERE t1.id>0 $WSE ORDER BY id DESC LIMIT 100 OFFSET ".$fr." ");
while($r1=mysqli_fetch_array($q1)){
	
?> 
			<tr>
<th><?=$drr ?></th>
<th><?=$r1["name"]?></th>
<th><?=$r1["barcode"]?></th>
<th><?=$r1["quantity"]?></th>
<th><?=$r1["quantity"]-$r1['sold'] ?></th>
<th><?=$r1["price"]?></th>
<th><?=date("d/m/Y H:i:s",$r1["date"])?></th>
<th><?=$r1["sold"]?></th>								
			</tr>
<?php
$drr++;
}
?>		
		</tbody>
		<tfoot>
			<tr>
<th>N</th>
<th>name</th>
<th>barcode</th>
<th>quantity</th>
<th>real quantity</th>
<th>price</th>
<th>date</th>
<th>sold</th>																		
			</tr>
		</tfoot>
</table>
<?php
$q3=mysqli_query($con,"SELECT * FROM productprices t1 WHERE t1.id>0 $WSE  ORDER BY t1.id DESC");
?>
	<div class="col-md-12 MID NOP text-center">
	<a href="?page=productprices&key=<?=$key?>&p=1&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
	<a href="?page=productprices&key=<?=$key?>&p=<?=$ACP!=1?($ACP-1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=productprices&key=<?=$key?>&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=productprices&key=<?=$key?>&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
	<a href="?page=productprices&key=<?=$key?>&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
	<br>&nbsp;
	<br>&nbsp;
	<style>
	.ACP{
		background:#FFF;
	}
	</style>