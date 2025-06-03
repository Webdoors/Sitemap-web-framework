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
$q1=mysqli_query($con,"SELECT t2.*,(SELECT t3.firstname FROM admins as t3 WHERE t2.uid=t3.id) as 'firstname',(SELECT t3.lastname FROM admins as t3 WHERE t2.uid=t3.id) as 'lastname',(SELECT t3.name FROM id as t3 WHERE t2.uid=t3.id) as 'name',(SELECT t3.lastname FROM id as t3 WHERE t2.uid=t3.id) as 'ulastname' FROM notifications as t2  $WSE  ORDER BY t2.id DESC LIMIT ".$PA." OFFSET ".$fr.""); 
$q100=mysqli_query($con,"SELECT t2.id FROM notifications as t2  WHERE t2.id>0  $WSE ORDER BY t2.id DESC ");	
$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;
?>
<div class="container">
<div class="row justify-content-center"><form class="w-100">
	<div class="col-sm-12">
		<div class="row my-2">
		
		<input name="page" value="notifications" type="hidden"/>
			<div class="col-sm-3">
				<input class="form-control SERKEY2" name="key" placeholder="Search" value="<?=$KEY?>"/>
			</div>
			<div class="col-sm-8">
				<button type="submit" class="btn btn-default ">Search</button>
			</div>
			<div class="col-sm-5 d-none">

			</div>
			<div class="col-sm-1">
				<a href="?page=notifications" class="btn btn-danger"><i class="fa text-white fa-sync"></i></a>
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
			<th>Notification</th>
			<th>წავიკითხე</th>
	



		  </tr>
		</thead>
		<tbody>
<?php
while($r1=mysqli_fetch_array($q1)){
	// mysqli_query($con,"UPDATE notifications SET seen=1 WHERE id='".$r1["id"]."' ");
?>
		  <tr>
<th><?=date("d.m.Y H:i",$r1["date"])?></th>
<th><?=$r1["firstname"]?> <?=$r1["lastname"]?> <a href="?page=user&uid=<?=$r1["uid"]?>"><?=$r1["name"]?> <?=$r1["ulastname"]?></a></th>
<th style="width:600px"><?=$r1["text"]?></th>
<th><input  class="UPT" t="notifications" type="checkbox" d="<?=$r1["id"]?>" n="seen" <?=$r1["seen"]==1?"checked":""?> /></th>
		  </tr>
<?php
$cou=$cou-1;
}
?>
		</tbody>
	</table>
	</div>
<?php
$q3=mysqli_query($con,"SELECT * FROM notifications as t2  WHERE t2.id>0 $WSE");
?>
	<div class="col-md-12 MID">
	<a href="?page=notifications&p=1&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
	<a href="?page=notifications&p=<?=$ACP!=1?($ACP-1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=notifications&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=notifications&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
	<a href="?page=notifications&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
</div>
</div>
<br>
<style>
th{
word-break: break-all;
}
</style>