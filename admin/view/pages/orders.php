<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ACP=1;
$p=$_REQUEST["p"]??0;
if($p>0){
	$ACP=$p;
}
$PA=30;
$fr=($ACP-1)*$PA;
$status=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
$payed=mysqli_real_escape_string($con,$_REQUEST["payed"]??"");
$method=mysqli_real_escape_string($con,$_REQUEST["method"]??"");
$start=mysqli_real_escape_string($con,$_REQUEST["start"]??"");
$end=mysqli_real_escape_string($con,$_REQUEST["end"]??"");
$KEY="";
$WST="";
$WPA="";
$WME="";
$WSTA="";
$WEND="";
$WSE="";
$cid="";
if(($_REQUEST["key"]??"")!=""){
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
	$WSE=" AND ( CONCAT(t3.name, ' ', t3.lastname) LIKE '%".$KEY."%'  OR  t3.name LIKE '%".$KEY."%' OR t3.lastname LIKE '%".$KEY."%' OR t3.company_name LIKE '%".$KEY."%' OR t3.company_id LIKE '%".$KEY."%' OR t1.invoice LIKE '%".$KEY."%')";
	// echo $WSE;
}
if($status!=""){

	$WST=" AND t1.status='".$status."'";
}
if($payed!=""){

	$WPA=" AND t1.payed='".$payed."'";
}
if($method!=""){
	// if($method=="2"||$method=="7"){
		$WME=" AND t1.method='".$method."'";
	// }else{
		// $WME=" AND t1.method<>2 ";
	// }
}
if($start!=""){

	$WSTA=" AND from_unixtime(t1.date,'%Y%m%d')>=".$start."";
}
if($end!=""){

	$WEND=" AND from_unixtime(t1.date,'%Y%m%d')<=".$end."";
}
$stype= mysqli_real_escape_string($con,$_GET["type"]??"");
$srt= strtoupper(mysqli_real_escape_string($con,$_GET["sort"]??""));

switch ($stype){
    case "date":
        $ord="ORDER BY t1.date"." ".$srt."";
        break;
    case "paydate":
        $ord="ORDER BY t1.paydate"." ".$srt."";
        break;
    case "owner":
        $ord="ORDER BY uid"." ".$srt."";
        break;
    case "order":
        $ord="ORDER BY owner"." ".$srt."";
        break;
    case "invoice":
        $ord="ORDER BY t1.date"." ".$srt."";
        break;
    case "money":
        $ord="ORDER BY amount"." ".$srt."";
        break;
    default:
        $ord="ORDER BY t1.date DESC";
}
$WHERE="$WPA $WSE $WME $WSTA $WEND $WST";
// echo $WHERE;
// echo getcwd();
$q1=mysqli_query($con,"SELECT t1.paydate,t1.*,t3.name,t3.lastname,t3.company_name,t3.mobile_phone,t3.company_id,t3.personal_id,(SELECT COUNT(t4.id) FROM orders as t4 WHERE t4.uid=t1.uid AND t4.status='4') as 'tsum', (SELECT COUNT(t4.id) FROM orderproducts as t4 WHERE t4.orderid=t1.id AND t4.comment!='') as 'iscom' FROM orders as t1
LEFT JOIN id as t3 ON(t3.id=t1.uid)
WHERE t1.id>0 AND t1.status>=3 AND t1.status!=9  $WHERE  $ord  LIMIT ".$PA." OFFSET ".$fr."");

?>
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="row my-2">
			<div class="col-sm-3">
				<input class="form-control SERKEY4" placeholder="Search" value="<?=$KEY?>"/>
			</div>
			<div class="col-sm-5">
				<button class="btn btn-success SER4">Search</button>
<a tagret="_blank" class="btn btn-danger mx-2" href="/admin/?page=orders"><i class="fa fa-sync text-white"></i></a>

			</div>
			<div class="col-sm-3">
<input type="text" class="form-control INP" n="deadline" d="?page=orders&type=<?=$stype?>&sort=<?=$srt?>&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>" name="daterange" value="<?=$start!=""?substr($start,6,2)."/".substr($start,4,2)."/".substr($start,0,4)." - ".substr($end,6,2)."/".substr($end,4,2)."/".substr($end,0,4):""?>" placeholder="" />
			</div>
			<div class="col-sm-5 d-none">
				<select class="form-control form-select UTY">
					<option <?=$UTYPE==""?"selected":""?> value="">ყველა მომხმარებელი</option>
					<option <?=$UTYPE=="1"?"selected":""?> value="1">ფიზიკური პირი</option>
					<option <?=$UTYPE=="2"?"selected":""?> value="2">იურიდიული პირი</option>
				</select>
			</div>
			<div class="col-sm-1 d-flex justify-content-end">
<a tagret="_blank" href="/admin/func/orderexcel.php?type=<?=$stype?>&sort=<?=$srt?>&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>"><button class="btn btn-success">Excel</button>	</a>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
			<th>
				<div class="row m-0 justify-content-between">

                Date
                <div style="display:block; font-size: 22px; width:7%;position: relative;margin:0 10px ">
                    <i class="fas fa-sort-up" onclick="location.href='?page=orders&type=date&sort=asc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>'" style=""></i>
                    <i class="fas fa-sort-down"onclick="location.href='?page=orders&type=date&sort=desc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>'" style=""></i>                
                </div>
							</div>
            </th>
			<th>
				<div class="row m-0 justify-content-between">

               Pay Date
                <div style="display:block; font-size: 22px; width:7%;position: relative;margin:0 10px ">

                    <i class="fas fa-sort-up" onclick="location.href='?page=orders&type=paydate&sort=asc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>'" style=""></i>
                      

                    <i class="fas fa-sort-down" onclick="location.href='?page=orders&type=paydate&sort=desc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>'" style=""></i>
                       
                </div>
							</div>
            </th>
			<th>
				<div class="row m-0 justify-content-between">

				Owner
                <span style="display:block; font-size: 22px;width:7%; position: relative;margin:0 10px ">
                    <a href="?page=orders&type=owner&sort=asc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>">
                    <i class="fas fa-sort-up" style="position: absolute; "></i>
                        </a>
                    <a href="?page=orders&type=owner&sort=desc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>">
                    <i class="fas fa-sort-down" style="position: absolute bottom:0;"></i>
                        </a>
                </span>
							</div>
            </th>

			<th class="d-none">
				Order
            </th>
			<th class="">
				
            </th>
			<th style="width:140px">
				<div class="row m-0 justify-content-between">

				Invoice Number
                <span style="display:block; font-size: 22px;width:7%; position: relative;margin:0 10px ">
                    <a href="?page=orders&type=invoice&sort=asc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>">
                    <i class="fas fa-sort-up" style="position: absolute; "></i>
                        </a>
                    <a href="?page=orders&type=invoice&sort=desc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>">
                    <i class="fas fa-sort-down" style="position: absolute bottom:0;"></i>
                        </a>
                </span>
							</div>
            </th>
			<th style="width:100px">
				<div class="row m-0 justify-content-between">

				Total
                <span style="display:block; font-size: 22px;width:7%; position: relative;margin:0 10px ">
                    <a href="?page=orders&type=money&sort=asc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>">
                    <i class="fas fa-sort-up" style="position: absolute;"></i>
                        </a>
                    <a href="?page=orders&type=money&sort=desc&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>">
                    <i class="fas fa-sort-down" style="position: absolute bottom:0;"></i>
                        </a>
                </span>
							</div>
            </th>
			<th style="width: 132px;">Payed
			<select class='form-control form-select PAYED' n="payed" onchange="location.href='?page=orders&key=<?=$KEY?>&start=<?=$start?>&end=<?=$end?>&status='+$('.STATUS').val()+'&method='+$('.METHOD').val()+'&payed='+$('.PAYED').val();" d="?page=orders&type=<?=$stype?>&sort=<?=$srt?>&start=<?=$start?>&end=<?=$end?>">
				<option <?=$payed==""?"selected":""?>></option>
				<option <?=$payed=="0"?"selected":""?> value="0">გადაუხდელი</option>
				<option <?=$payed==1?"selected":""?> value="1">გადახდილი</option>
			</select>
			</th>
			<th style="width:100px">Method
			<select class='form-control form-select METHOD' onchange="location.href='?page=orders&key=<?=$KEY?>&start=<?=$start?>&end=<?=$end?>&status='+$('.STATUS').val()+'&method='+$('.METHOD').val()+'&payed='+$('.PAYED').val();" n="method" d="?page=orders&type=<?=$stype?>&sort=<?=$srt?>&start=<?=$start?>&end=<?=$end?>" >
				<option></option>
<?php
$q5=mysqli_query($con,"SELECT * FROM methods WHERE active='1'");
while($r5=mysqli_fetch_array($q5)){
?>
				<option <?=$method==$r5["id"]?"selected":""?> value="<?=$r5["id"]?>"><?=$r5["name"]?></option>
			
<?php
}
?>
			</select>
			</th>
			<th>Order Status
			<select class='form-control STATUS' n="status" onchange="location.href='?page=orders&key=<?=$KEY?>&start=<?=$start?>&end=<?=$end?>&status='+$('.STATUS').val()+'&method='+$('.METHOD').val()+'&payed='+$('.PAYED').val();" d="?page=orders&type=<?=$stype?>&sort=<?=$srt?>&start=<?=$start?>&end=<?=$end?>">
				<option value=""></option>
<?php
$q4=mysqli_query($con,"SELECT * FROM status");
while($r4=mysqli_fetch_array($q4)){
	if(in_array($r4["id"],[3,4,6])){
?>
				<option <?=$r4["id"]==$status?"selected":""?> value="<?=$r4["id"]?>"><?=$r4["name"]?></option>
<?php
	}
}
?>
			</select>
			</th>
			<th>Check</th>
			<th>All&nbsp;<br><input class="SELALL" type="checkbox"/> </th>
			<th> <button class='btn btn-default delorders' d='<?=$r1["invoice"]?>' ><i class="fa fa-trash text-danger"></i></button></th>
		  </tr>
		</thead>
		<tbody>
<?php
$cou=0;
while($r1=mysqli_fetch_array($q1)){
	// var_dump($r1);
	$q6=mysqli_query($con,"SELECT t5.order_id FROM ipay as t5 WHERE t5.invoice='".$r1["invoice"]."' ORDER BY id DESC LIMIT 1");
	$r6=mysqli_fetch_array($q6);
?>
		  <tr>
			<th><?=date("d.m.Y H:i",$r1["date"])?></th>
			<th><?=$r1["paydate"]!=$r1["date"]&&$r1["paydate"]!=""?date("d.m.Y H:i",$r1["paydate"]):""?></th>
			<th><a href="?page=user&uid=<?=$r1["uid"]?>"><?=trim($r1["company_name"]??"")==""?$r1["name"]." ".$r1["lastname"]:$r1["company_name"]?> <?=trim((trim($r1["company_id"]??"")==""?($r1["personal_id"]==""?$r1["mobile_phone"]:$r1["personal_id"]):(($r1["company_id"])==""?($r1["mobile_phone"]??""):""))??"")?></a></th>
			<th ><small d="<?=$r1["id"]?>" class="GETDET btn btn-outline-primary label CP"><i class="fa fa-search"></i><i class="fa fa-message text-danger position-absolute <?=$r1["iscom"]==1?"":"d-none"?>" style="margin-top:-2px;margin-left:4px"></i></small></th>
			<th ><a target="_blank" href="/func/excel.php?id=<?=$r1["id"]?>"><?=$r1["invoice"]?></a></th>
			<th ><?=number_format($r1["amount"]??0,2)?> ₾</th>
			<th class="text-white <?=$r1["payed"]==1?"bg-success":"bg-danger"?>">
			<select class='form-control form-select UPDPAY' style="width:130px" d="<?=$r1["invoice"]?>" >
				<option></option>
				<option <?=$r1["payed"]==0?"selected":""?> value="0">გადაუხდელი</option>
				<option <?=$r1["payed"]==1?"selected":""?> value="1">გადახდილი</option>
			</select>
			</th>
			<th >
			<select class='form-control form-select UPDMET' style="width:80px" d="<?=$r1["invoice"]?>">
				<option></option>
<?php
$q5=mysqli_query($con,"SELECT * FROM methods WHERE active='1'");
while($r5=mysqli_fetch_array($q5)){
?>
				<option <?=$r1["method"]==$r5["id"]?"selected":""?> value="<?=$r5["id"]?>"><?=$r5["name"]?></option>
			
<?php
}
?>

			</select>
			</th>
			<th >
			<select class='form-control form-select UPDSTA' style="width:110px" d="<?=$r1["invoice"]?>">

<?php
$q4=mysqli_query($con,"SELECT * FROM status");
while($r4=mysqli_fetch_array($q4)){
	if(in_array($r4["id"],[3,4,6])){
?>
				<option <?=$r4["id"]==$r1["status"]?"selected":""?> value="<?=$r4["id"]?>"><?=$r4["name"]?></option>
<?php
	}
}
?>
			</select>
			</th>
			<th><button d="<?=$r6["order_id"]?>" class="btn btn-warning IPAY <?=$r1["method"]=="2"&&$r6["order_id"]!=""?"":"d-none"?>">IPAY</button></th>
			<th><input class="SUS" type="checkbox" d="<?=$r1["invoice"]?>"/></th>
			<th><button class='btn btn-default DGA' d='<?=$r1["id"]?>' n="orders" ><i class="fa fa-trash text-danger"></i></button></th>
		  </tr> 
<?php
$cou=$cou-1;
}
?>
		</tbody>
	</table>
	</div>
<?php
$q3=mysqli_query($con,"SELECT t1.id FROM orders as t1
LEFT JOIN id as t3 ON(t3.id=t1.uid)
 WHERE t1.id>0 AND t1.status>=3 AND t1.status!=9  $WHERE $ord  ");
?>
	<div class="col-md-12 MID">
	  <div class='row'>
	    <div class='col-md-9'>
	<a href="?page=orders&type=<?=$stype?>&sort=<?=$srt?>&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&p=1&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
	<a href="?page=orders&type=<?=$stype?>&sort=<?=$srt?>&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&p=<?=$ACP!=1?($ACP-1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=orders&type=<?=$stype?>&sort=<?=$srt?>&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=orders&type=<?=$stype?>&sort=<?=$srt?>&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
	<a href="?page=orders&type=<?=$stype?>&sort=<?=$srt?>&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	  </div>
	  <div class="row col-md-3 ">
	  
	  <?php
	  $q5=mysqli_query($con,"SELECT t1.id FROM orders as t1
LEFT JOIN id as t3 ON(t3.id=t1.uid)
 WHERE t1.id>0 AND t1.status>=3 AND t1.status!=9  $WHERE  $ord  ");
 $Total=mysqli_num_rows($q5);
	  $q5=mysqli_query($con,"SELECT t1.amount FROM orders as t1
LEFT JOIN id as t3 ON(t3.id=t1.uid)
 WHERE t1.id>0 AND t1.status>=3 AND t1.status!=9  $WHERE  $ord  ");

 $r1=mysqli_fetch_all($q5,MYSQLI_ASSOC);
 $sum = array_column($r1, 'amount');
  $sum =array_sum($sum);
	  ?>
	   <h5>ჯამი <?=$Total ?></h5>
	   <h5 class="ml-3">თანხა <?=$sum?></h5>
	</div>
	  </div>
	</div>
	
</div>
</div>
<br>
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left',
        locale: {
                 "format": "DD/MM/YYYY",
        }
  }, function(start, end, label) {
	location.href=$('input[name="daterange"]').attr("d")+"&start="+start.format('YYYYMMDD')+"&end="+end.format('YYYYMMDD');
  // console.log(Number(start.format('YYYYMMDD'))+" "+Number($(".d1").attr("d"))+"|"+Number(end.format('YYYYMMDD'))+" "+Number($(".d2").attr("d")));

  });
});
</script>
