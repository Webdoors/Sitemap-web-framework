<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ACP=1;
$p=$_REQUEST["p"]??"";
if($p>0){
	$ACP=$p;
}
$PA=20;
$fr=($ACP-1)*$PA;
$start=mysqli_real_escape_string($con,$_REQUEST["start"]??date("Ymd"));
$end=mysqli_real_escape_string($con,$_REQUEST["end"]??date("Ymd"));
$STATUS=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
$volume=mysqli_real_escape_string($con,$_REQUEST["volume"]??"");
$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
$CAT=(int)($_REQUEST["category"]??"");
$payed="";
$method="";
$stype="";
$status="";
$srt="";
$WCA="";
$WSE="";
$cid="";
$category='';
$WCA="";
$WSTA="";
$WEND="";
if($start!=""){
	$WSTA=" AND from_unixtime(t1.u_group,'%Y%m%d')>=".$start."";
	$WSTA2=" AND from_unixtime(t3.u_group,'%Y%m%d')>=".$start."";
}
if($end!=""){
	$WEND=" AND from_unixtime(t1.u_group,'%Y%m%d')<=".$end."";
	$WEND2=" AND from_unixtime(t3.u_group,'%Y%m%d')<=".$end."";
}
if($CAT!=""&&$CAT!=""){
	// $WCA=" AND (t1.category='".$CAT."' OR t1.category in (SELECT id FROM categories WHERE pid='".$CAT."'))";
}
if(($_REQUEST["key"]??"")!=""){
	$KEY=mysqli_real_escape_string($con,($_REQUEST["key"]??""));
	$WSE=" AND (t1.title_ka LIKE '%".$KEY."%' OR t1.good_n LIKE '%".$KEY."%')";
}
$WVO="";
if($volume!=""){
	if($volume=="1"){
		$WVO=" AND t1.volume>0 ";		
	}elseif($volume=="0"){
		$WVO=" AND t1.volume<1 ";
	}

}
 $WHERE=" $WSE $WVO $WCA $WSTA $WEND ";
 $WHERE2=" $WSE $WVO $WCA $WSTA2 $WEND2 ";

$q1=mysqli_query($con,"    SELECT  t1.good_id, SUM(t1.price * t1.quantity*(SELECT t4.inbatch FROM products as t4 WHERE t4.id=t1.good_id )) AS total_revenue,
       SUM(t1.quantity) AS total_quantity_sold,
	  (SELECT COUNT(DISTINCT(t3.orderid)) FROM orderproducts as t3 WHERE t3.good_id=t1.good_id  $WHERE2) as in_orders
FROM orderproducts as t1

 WHERE t1.good_id is not null AND (SELECT count(t2.id) FROM orders as t2 WHERE t1.orderid=t2.id AND t2.status=4)>0  $WHERE
GROUP BY t1.good_id
ORDER BY total_revenue DESC    LIMIT ".$PA." OFFSET ".$fr." "); 

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="row my-2">

			<div class="col-sm-4">	
				<form class="d-flex">
					<input type="hidden" name="page" value="topsale"/>
					<input class="form-control w-75" placeholder="Search" name="key" value="<?=$KEY?>"/>
					<button class="btn btn-default d-inline ml-2">Search</button>
				</form>
			</div>
		
			<div class="col-sm-4">
				<a href="?page=topsale" class="btn btn-danger SER3"><i class="fa text-white fa-sync"></i></a>
			</div>
			<div class="col-sm-5 d-none">
				<select class="form-control UTY">
					<option <?=$UTYPE==""?"selected":""?> value="">ყველა მომხმარებელი</option>
					<option <?=$UTYPE=="1"?"selected":""?> value="1">ფიზიკური პირი</option>
					<option <?=$UTYPE=="2"?"selected":""?> value="2">იურიდიული პირი</option>
				</select>
			</div>
			<div class="col-sm-3">
<input type="text" class="form-control INP" n="deadline" d="?page=topsale&p=<?=$p?>&type=<?=$stype?>&sort=<?=$srt?>&payed=<?=$payed?>&method=<?=$method?>&status=<?=$status?>" name="daterange" value="<?=$start!=""?substr($start,6,2)."/".substr($start,4,2)."/".substr($start,0,4)." - ".substr($end,6,2)."/".substr($end,4,2)."/".substr($end,0,4):""?>" placeholder="" />
			</div>
			<div class="col-sm-1 d-flex justify-content-end">
<a tagret="_blank" href="/admin/func/topsaleexcel.php?status=<?=$STATUS ?>&volume=<?=$volume ?>&key=<?=$KEY ?>&category=<?=$CAT ?>&start=<?=$start?>&end=<?=$end?>"><button class="btn btn-success">Excel</button>	</a>			
			</div>
		</div>
	</div>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
			<th>Image</th>
			<th>დასახელება</th>
			<th>კატეგორია
<select class="form-control p-1 CAT" onchange="location.href='?page=topsale&key='+$('.SERKEY3').val()+'&volume='+$('.VOLUME').val()+'&category='+$('.CAT').val()">
	<option value="" <?=$CAT==""?"selected":""?> >ყველა</option>
<?php
$q4=mysqli_query($con,"SELECT * FROM menu WHERE parent_id='2' OR parent_id in(SELECT id FROM menu WHERE parent_id='2')");
while($r4=mysqli_fetch_array($q4)){

?>
	<option value=<?=$r4["id"]?> <?=$CAT==$r4['id']?"selected":""?> ><?=$r4["title_ka"]?> </option>
<?php
}
?>
</select>			
			</th>
			<th>საქონლის კოდი</th>
			<th>შეკვრაში</th>
			<th>რ-ბა (შეკვრა)</th>
			<th>სულ რ-ბა</th>
			<th>InOrders</th>
			<th>თანხა</th>
			<th>Select All&nbsp;<br><input class="SELALL" type="checkbox"/> </th>
		  </tr>
		</thead>
		<tbody>
<?php
while($r1=mysqli_fetch_array($q1)){
	$q2=mysqli_query($con,"SELECT t1.*,
	(SELECT title_ka FROM filters as t2 WHERE t2.id=t1.group_id) as 'group'
	FROM goods_prices t1 where t1.good_id='".$r1["good_id"]."'");
	$rows=mysqli_fetch_all($q2,MYSQLI_ASSOC);
	$q5=mysqli_query($con,"SELECT t1.*,(SELECT t2.name_ka FROM sitemap as t2 WHERE t1.category=t2.id AND t2.itemtype=2 )as 'menu' FROM products as t1 WHERE t1.id='".$r1["good_id"]."'");
	$r5=mysqli_fetch_array($q5);
	
?>
		  <tr>
			<th>
				<a target="_blank" href="https://supta.ge/">
					<img style="width:61px" src="/img/<?=str_replace(["https://supta.ge/img/","https://new.supta.ge/img/"],"",$r5["image1"])?>" />
				</a>
			</th>
			<th><a  href="?page=product&id=<?=$r5["id"]??""?>"><?=$r5["title_ka"]??""?></a></th>
			<th><a href="?page=products&key=&volume=&category=<?=$r5["category"]??""?>"><?=$r5["menu"]??""?></a></th>
			<th><?=$r5["good_n"]??""?><a class="PROPOP" d="<?=$r5["id"]??""?>"><div class="ml-1 d-inline btn btn-primary px-1 py-0"><i class=" fa fa-eye"></i></div></a></th>
			<th><?=$r5["inbatch"]??""?></th>
			<th><?=$r1["total_quantity_sold"]??""?></th>
			<th><span class="badge bg-primary" style="font-size:14px"><?=$r1["total_quantity_sold"]*$r5["inbatch"]??""?></span></th>
			<th><span class="badge bg-info" style="font-size:14px"><?=intval($r1["in_orders"])?></span></th>
			<th><span class="badge bg-warning" style="font-size:14px"><?=number_format($r1["total_revenue"],2)?></span></th>
			<th class="d-none"><input class="UPT" n="top" d="<?=$r5["id"]?>" <?=$r5["top"]=="1"?"checked":""?> t="goods" type="checkbox"/></th>
			<th><input class="SUS" type="checkbox" d="<?=$r5["id"]?>"/></th>
		  </tr>
<?php

}
?>
		</tbody>
	</table>
	</div>
<?php
$q3=mysqli_query($con,"SELECT t1.id FROM orderproducts as t1  WHERE t1.good_id is not null  $WHERE GROUP BY t1.good_id  ");

$Total=mysqli_num_rows($q3);
?>
	<div class="col-md-12 MID">
	<div class='row'>
	    <div class='col-md-9'>
	<a href="?page=topsale&p=1&category=<?=$CAT?>&start=<?=$start?>&end=<?=$end?>&volume=<?=$volume?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
	<a href="?page=topsale&p=<?=$ACP!=1?($ACP-1):$ACP?>&start=<?=$start?>&end=<?=$end?>&category=<?=$CAT?>&volume=<?=$volume?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=topsale&p=<?=$i?>&start=<?=$start?>&end=<?=$end?>&volume=<?=$volume?>&category=<?=$CAT?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=topsale&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&start=<?=$start?>&end=<?=$end?>&category=<?=$CAT?>&volume=<?=$volume?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
	<a href="?page=topsale&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&start=<?=$start?>&end=<?=$end?>&category=<?=$CAT?>&volume=<?=$volume?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
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
$(function() {
  $('input[name="daterange"]').daterangepicker({
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    "alwaysShowCalendars": true,
    opens: 'left',
        locale: {
                 "format": "DD/MM/YYYY",
        }
  }, function(start, end, label) {
	location.href=$('input[name="daterange"]').attr("d")+"&start="+start.format('YYYYMMDD')+"&end="+end.format('YYYYMMDD');
  console.log(Number(start.format('YYYYMMDD'))+" "+Number($(".d1").attr("d"))+"|"+Number(end.format('YYYYMMDD'))+" "+Number($(".d2").attr("d")));

  });
});
</script>