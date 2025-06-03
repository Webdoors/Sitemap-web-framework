<?php
$ACP=1;
$p=$_REQUEST["p"]??1;
if($p>0){
	$ACP=$p;
}
$PA=30;
$fr=($ACP-1)*$PA;
$STATUS=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
$key=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
$cid=mysqli_real_escape_string($con,$_REQUEST["cid"]??"");
$WSE="";
$KEY="";
if($key!=""){
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
	$WSE=" AND (t1.personal_id LIKE '%".$KEY."%' OR t1.company_id LIKE '%".$KEY."%' OR t1.name LIKE '%".$KEY."%' OR t1.lastname LIKE '%".$KEY."%' OR t1.email LIKE '%".$KEY."%' OR t1.mobile_phone LIKE '%".$KEY."%' OR t2.invoice LIKE '%".$KEY."%')";
}
$q1=mysqli_query($con,"SELECT t2.*,t1.name,t1.lastname,t1.personal_id,t1.company_id,t1.company_name,(SELECT name FROM status as t3 WHERE t3.id=t2.status) as 'st' FROM ipay as t2 LEFT JOIN id as t1 ON(t1.id=t2.uid) WHERE t2.id>0 $WSE  ORDER BY t2.id DESC LIMIT ".$PA." OFFSET ".$fr.""); 
$q100=mysqli_query($con,"SELECT t2.id FROM ipay as t2 LEFT JOIN id as t1 ON(t1.id=t2.uid) WHERE t2.id>0  $WSE ORDER BY t2.id DESC ");	
$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;
?>
<div class="container-fluid">
<div class="row justify-content-center"><form class="w-100">
	<div class="col-sm-12">
		<div class="row my-2">
		
		<input name="page" value="ipay" type="hidden"/>
			<div class="col-sm-3">
				<input class="form-control SERKEY2" name="key" placeholder="Search" value="<?=$KEY?>"/>
			</div>
			<div class="col-sm-8">
				<button type="submit" class="btn btn-default ">Search</button>
			</div>
			<div class="col-sm-5 d-none">

			</div>
			<div class="col-sm-1">
				<a href="?page=ipay" class="btn btn-danger"><i class="fa text-white fa-sync"></i></a>
			</div>
			<div class="col-sm-1 d-flex justify-content-end">
		
			</div>
		
		</div>
	</div></form>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
<th>date</th>
<th>uid</th>
			<th>Name</th>
			<th>Gov.id</th>

<th>order_id</th>
<th>amount</th>
<th>invoice</th>
<th>status</th>
<th>checked</th>
<th>description</th>
<th></th>

		  </tr>
		</thead>
		<tbody>
<?php
while($r1=mysqli_fetch_array($q1)){
?>
		  <tr>
<th><?=date("d.m.Y H:i",$r1["date"])?></th>
<th><a href="?page=user&uid=<?=$r1["uid"]?>"><?=$r1["uid"]?></a></th>
			<th><a href="?page=user&uid=<?=$r1["uid"]?>"><?=$r1["company_id"]==""?$r1["name"]." ".$r1["lastname"]:$r1["company_name"]?></a></th>
			<th><a href="?page=user&uid=<?=$r1["uid"]?>"><?=$r1["company_id"]==""?$r1["personal_id"]:$r1["company_id"]?></a></th>
			
<th><?=$r1["order_id"]?></th>
<th><?=$r1["amount"]?></th>
<th><?=$r1["invoice"]?></th>
<th><?=$r1["st"]?></th>
<th><?=$r1["checked"]?></th>
<th><?=$r1["description"]?></th>
<th><button d="<?=$r1["order_id"]?>" class="btn btn-warning IPAY ">IPAY</button></th>

		  </tr>
<?php
$cou=$cou-1;
}
?>
		</tbody>
	</table>
	</div>
<?php
$q3=mysqli_query($con,"SELECT * FROM ipay as t2 LEFT JOIN id as t1 ON(t1.id=t2.uid) WHERE t2.id>0 $WSE");
?>
	<div class="col-md-12 MID">
	<a href="?page=ipay&p=1&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
	<a href="?page=ipay&p=<?=$ACP!=1?($ACP-1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=ipay&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=ipay&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
	<a href="?page=ipay&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
</div>
</div>
<br>