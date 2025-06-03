<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
//require('../../config.php');
$p=isset($_REQUEST["p"])?$_REQUEST["p"]:0;
$ACP=1;

if($p>0){
	$ACP=$p;
}
$PA=20;
$fr=($ACP-1)*$PA;
$status=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
$start=mysqli_real_escape_string($con,$_REQUEST["start"]??"");
$spero=mysqli_real_escape_string($con,$_REQUEST["spero"]??"");
$end=mysqli_real_escape_string($con,$_REQUEST["end"]??"");
$active=mysqli_real_escape_string($con,$_REQUEST["active"]??"");
$WSTA="";
$WEND="";
$WSTAT="";
$WSPE="";
$WACT="";
$WSE="";
$KEY="";
$cid="";
	$key=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
if($key!=""){
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
	$WSE=" AND (t1.personal_id LIKE '%".$KEY."%' OR t1.company_id LIKE '%".$KEY."%' OR t1.company_name LIKE '%".$KEY."%' OR t1.name LIKE '%".$KEY."%' OR t1.lastname LIKE '%".$KEY."%' OR t1.email LIKE '%".$KEY."%' OR t1.mobile_phone LIKE '%".$KEY."%')";
}
if($spero!=""){

	$WSPE=" AND t1.industry='".$spero."'";
}
if($start!=""){

	$WSTA=" AND from_unixtime(t1.date,'%Y%m%d')>=".$start."";
}
if($end!=""){

	$WEND=" AND from_unixtime(t1.date,'%Y%m%d')<=".$end."";
}
if($active!=""){
	if($active=="2"){
		$WACT=" AND (SELECT COUNT(t4.id) FROM orders as t4 WHERE t4.uid=t1.id AND t4.status='4')<1 ";			
	}elseif($active=="3"){
			$WACT=" AND t1.deleted=1 ";		
	}else{
		$WACT=" AND (SELECT COUNT(t4.id) FROM orders as t4 WHERE t4.uid=t1.id AND t4.status='4')>0 ";		
	}
}
if($status!=""){
	if($status=="2"){
		$WSTAT=" AND t1.usertype=2 ";			
	}else{
		$WSTAT=" AND t1.usertype=1 ";		
	}
}
$WHERE=" $WSE $WSTA $WSTAT $WACT $WSPE";

$q1=mysqli_query($con,"SELECT t1.*,(SELECT COUNT(t4.id) FROM orders as t4 WHERE t4.uid=t1.id AND t4.status='4') as 'tsum',(SELECT t3.name FROM usertypes as t3 WHERE t1.usertype=t3.id) as 'utype' FROM id as t1 WHERE t1.id>0 $WHERE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr.""); 
// echo "SELECT t1.* FROM id as t1 WHERE t1.id>0 $WHERE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr.""; 
$q100=mysqli_query($con,"SELECT t1.id FROM id as t1 WHERE t1.id>0  $WHERE ");	
$q3=$q100;
$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;
?>
		<script type="text/javascript" src="/lib/shadowbox/shadowbox.js"></script>

		<link rel="stylesheet" type="text/css" href="/lib/shadowbox/shadowbox.css">
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="row my-2">
		
			<div class="col-sm-2">
				<form><input type="hidden" name="page" value="users"/><input class="form-control SERKEY2" name="key" placeholder="Search" value="<?=$KEY?>"/></form>
			</div>
			<div class="col-sm-1">
				<button class="btn btn-success SER2">Search</button>
			</div>
			
			<div class="col-sm-3">
<input type="text" class="form-control INP" n="deadline" d="?page=users&type=<?=$stype??''?>&sort=<?=$srt??''?>&status=<?=$status?>" name="daterange" value="<?=$start!=""?substr($start,6,2)."/".substr($start,4,2)."/".substr($start,0,4)." - ".substr($end,6,2)."/".substr($end,4,2)."/".substr($end,0,4):""?>" placeholder="" />
			</div>
			<div class="col-sm-2 ">
				<select class="form-select UTY" onchange="location.href='?page=users&spero=<?=$spero?>&key=<?=$key?>&start=<?=$start?>&end=<?=$end?>&status='+$(this).val()+'&active='+$('.UAC').val()">
					<option <?=$status==""?"selected":""?> value="">ყველა მომხმარებელი</option>
					<option <?=$status=="1"?"selected":""?> value="1">ფიზიკური პირი</option>
					<option <?=$status=="2"?"selected":""?> value="2">იურიდიული პირი</option>
					
				</select>
			</div>
			<div class="col-sm-2 px-0">
				<select class="form-select UAC" onchange="location.href='?page=users&spero=<?=$spero?>&key=<?=$key?>&start=<?=$start?>&end=<?=$end?>&status='+$('.UTY').val()+'&active='+$(this).val();">
					<option <?=$active==""?"selected":""?> value="">სტატუსი</option>
					<option <?=$active=="1"?"selected":""?> value="1">აქტიური</option>
					<option <?=$active=="2"?"selected":""?> value="2">არააქტიური</option>
					<option <?=$active=="3"?"selected":""?> value="3">წაშლილი</option>
				</select>
			</div>
			<div class="col-sm-1">
				<a href="?page=users" class="btn btn-danger"><i class="fa text-white fa-sync"></i></a>
			</div>
			<div class="col-sm-1 d-flex justify-content-end">
			<a a href="?page=user" class="btn btn-success me-2"><i class="fa fa-plus "></i></a>
<a tagret="_blank" href="/admin/func/usersexcel.php?cid=<?=$cid!=""?$cid:""?>&spero=<?=$spero?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&active=<?=$active?>"><button class="btn btn-success">Excel</button>	</a>			
			</div>
		</div>
	</div>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
			<th>Count</th>
			<th>id</th>
			<th>Name</th>
			<th>Representator</th>
			<th>Gov.Id</th>
			<th>email</th>
			<th>tel</th>
			<th>
				<select type="text" style="width:140px"  class=" form-control form-select SELSPERO"  >
					<option value="">სფერო</option>
					<option <?=$spero=="horeca"?"selected":""?> value="horeca">ჰორეკა</option>
					<option <?=$spero=="office"?"selected":""?> value="office">ოფისი</option>
					<option <?=$spero=="medical"?"selected":""?> value="medical">სამედიცინო დაწესებულება</option>
					<option <?=$spero=="educational"?"selected":""?> value="educational">სასწავლო დაწესებულება</option>
					<option <?=$spero=="other"?"selected":""?> value="other">სხვა</option>
				</select>			
			</th>
			<th>Reg.date</th>
			<th>usertype</th>
			<th class="">
				Shipped
            </th>
			<th><button class="btn btn-default delusers" d="<?=$r1["id"]?>" n="id"><i class="fa fa-trash text-danger"></i></button></th>
			<th><br><input class="SELALL" title="Select All" type="checkbox"/> </th>
		  </tr>
		</thead>
		<tbody>
<?php
while($r1=mysqli_fetch_array($q1)){
?>
		  <tr>
			<th><?=$cou?></th>
			<th><a href="?page=user&uid=<?=$r1["id"]?>"><?=$r1["id"]?></a></th>
			<th><a href="/admin/?page=getinfo&uid=<?=$r1["id"]?>" rel="shadowbox;width=600;height=400"><?=$r1["company_name"]?><div class="d-block"></div></a> </th>
			<th><a href="?page=user&uid=<?=$r1["id"]?>"><?=$r1["name"]?>  <?=$r1["lastname"]?></a></th>
			<th><a href="?page=user&uid=<?=$r1["id"]?>"><?=$r1["company_id"]==""?$r1["personal_id"]:$r1["company_id"]?></a></th>
			<th><?=$r1["email"]?></th>
			<th><?=$r1["mobile_phone"]?></th>
			<th>
				<select type="text" style="width:140px" class="UPT form-control form-select" t="id" d="<?=$r1["id"]?>" n="industry" name="industry" >
					<option value="">საქმიანობის სფერო</option>
					<option <?=$r1["industry"]=="horeca"?"selected":""?> value="horeca">ჰორეკა</option>
					<option <?=$r1["industry"]=="office"?"selected":""?> value="office">ოფისი</option>
					<option <?=$r1["industry"]=="medical"?"selected":""?> value="medical">სამედიცინო დაწესებულება</option>
					<option <?=$r1["industry"]=="educational"?"selected":""?> value="educational">სასწავლო დაწესებულება</option>
					<option <?=$r1["industry"]=="other"?"selected":""?> value="other">სხვა</option>
				</select>			
			</th>
			<th><?=date("d.m.Y H:i",$r1["date"])?></th>
			<th>
				<select class="form-select UPT"t="id" style="width: 140px;" d="<?=$r1["id"]?>" n="usertype" >
					<option <?=$r1["usertype"]=="1"?"selected":""?> value="1">ფიზიკური პირი</option>
					<option <?=$r1["usertype"]=="2"?"selected":""?> value="2">იურიდიული პირი</option>
					<option <?=$r1["usertype"]=="3"?"selected":""?> value="3">წაშლილი</option>
				</select>			
			</th>
			<th class="">
				<?=$r1["tsum"]?>
			</th>			
			<th><button class="btn btn-default DELETEACCOUNT" d="<?=$r1["id"]?>" n="id"><i class="fa fa-trash text-danger"></i></button></th>
			<th><input class="SUS" type="checkbox" d="<?=$r1["id"]?>"/></th>
		  </tr>
<?php
$cou=$cou-1;
}
?>
		</tbody>
	</table>
	</div>
<?php

$Total=mysqli_num_rows($q100);
?>
	<div class="col-md-12 MID">
	<div class='row'>
	    <div class='col-md-9'>
	<a href="?page=users&p=1&cid=<?=$cid!=""?$cid:""?>&key=<?=$key?>&spero=<?=$spero?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&active=<?=$active?>" class="PG USR">«</a>
	<a href="?page=users&p=<?=$ACP!=1?($ACP-1):$ACP?>&key=<?=$key?>&spero=<?=$spero?>&cid=<?=$cid!=""?$cid:""?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&active=<?=$active?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=users&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>&key=<?=$key?>&spero=<?=$spero?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&active=<?=$active?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=users&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&key=<?=$key?>&spero=<?=$spero?>&cid=<?=$cid!=""?$cid:""?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&key=<?=$key?>&active=<?=$active?>" class="PG USR">›</a>
	<a href="?page=users&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&key=<?=$key?>&cid=<?=$cid!=""?$cid:""?>&spero=<?=$spero?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&active=<?=$active?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
	<div class='col-md-3'>
	   <h5>სულ <?=$Total ?></h5>
	</div>
	</div>
	</div>
</div>
</div>
<br>
<script>
function init_shadowbox()
{
	Shadowbox.init({
	    language: 'en',
		overlayColor:'#000000',
		overlayOpacity: 0,
	    players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'mp4']
	});
}
init_shadowbox();
// hide_tmp_msg();
var global_langs = ["ka","en"]</script>
<script>
$(function() {
	$(".SELSPERO").on("change",function(){
		location.href="?page=users&spero="+$(this).val()+"&status="+$(".UTY").val()+"&active="+$(".UAC").val();
	});
  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
        locale: {
                 "format": "DD/MM/YYYY",
        }
  }, function(start, end, label) {
	location.href=$('input[name="daterange"]').attr("d")+"&start="+start.format('YYYYMMDD')+"&end="+end.format('YYYYMMDD')+"&status="+$(".UTY").val()+"&active="+$(".UAC").val();
  // console.log(Number(start.format('YYYYMMDD'))+" "+Number($(".d1").attr("d"))+"|"+Number(end.format('YYYYMMDD'))+" "+Number($(".d2").attr("d")));

  });
});
</script>