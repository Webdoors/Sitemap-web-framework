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
$status=mysqli_real_escape_string($con,isset($_REQUEST["status"])?$_REQUEST["status"]:"");
$start=mysqli_real_escape_string($con,isset($_REQUEST["start"])?$_REQUEST["start"]:"");
$end=mysqli_real_escape_string($con,isset($_REQUEST["end"])?$_REQUEST["end"]:"");
$active=mysqli_real_escape_string($con,isset($_REQUEST["active"])?$_REQUEST["active"]:"");
$itemtype=mysqli_real_escape_string($con,isset($_REQUEST["itemtype"])?$_REQUEST["itemtype"]:"");
$pid=mysqli_real_escape_string($con,isset($_REQUEST["pid"])?$_REQUEST["pid"]:"");
$L=mysqli_real_escape_string($con,isset($_REQUEST["lang"])?$_REQUEST["lang"]:"ka");
$WSTA="";
$WEND="";
$WSTAT="";
$WACT="";
$WSE="";
$WIT="";
$WPI="";
$KEY="";
	$key=mysqli_real_escape_string($con,isset($_REQUEST["key"])?$_REQUEST["key"]:"");
if($key!=""){
	$KEY=mysqli_real_escape_string($con,isset($_REQUEST["key"])?$_REQUEST["key"]:"");
	$WSE=" AND (t1.slug_en LIKE '%".$KEY."%' OR t1.slug_ka LIKE '%".$KEY."%' OR t1.title_ka LIKE '%".$KEY."%' OR t1.name_ka LIKE '%".$KEY."%' OR t1.title_en LIKE '%".$KEY."%' OR t1.name_en LIKE '%".$KEY."%')";
}
if($itemtype!=""){
	$WIT=" AND t1.itemtype='".$itemtype."'";
}
if($pid!=""){
	$q5=mysqli_query($con,"SELECT * FROM sitemap WHERE pid='".$pid."' ");
	$r5=mysqli_fetch_all($q5,MYSQLI_ASSOC);
   
	$q6=mysqli_query($con,"SELECT * FROM sitemap WHERE pid in ('".implode(",",array_column($r5,"id"))."') ");
	$r6=mysqli_fetch_all($q6,MYSQLI_ASSOC);
	$WPI=" AND (t1.pid='".$pid."' OR t1.id in ('".implode(",",array_column($r6,"id"))."') OR t1.pid in ('".implode(",",array_column($r5,"id"))."')  )";
}

$WHERE=" WHERE t1.id>0 $WSE $WIT $WPI";
// echo $WHERE;
$q1=mysqli_query($con,"SELECT t1.*,t2.name_ka as 'parent',(SELECT t3.id FROM posts as t3 WHERE t3.sitemapid=t1.id LIMIT 1) as 'pid' FROM `sitemap` as t1 LEFT JOIN sitemap as t2 ON(t1.pid=t2.id) $WHERE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr.""); 
// echo "SELECT t1.* FROM id as t1 WHERE t1.id>0 $WHERE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr.""; 
$q100=mysqli_query($con,"SELECT t1.id FROM `sitemap` as t1  $WHERE ");	
$q3=$q100;
$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;
?>
<div class="container-fluid my-3">
	<div class="my-3 row">
	<div class="col-3">
		<div class="row">
			<div class="D2 col-8  pr-0" ><input placeholder="ლინკის სახელი" class="ADN form-control"/></div>
			<div class="D6 col-4 pr-0" ><input value="დამატება" type="button" t="sitemap" n="name_ka" class="ADR btn btn-success text-white"/>
			</div>
		</div>
	</div>
	<div class="col-3">

		<form class="row">
		<input type="hidden" name="page" value="sitemaplist"/>
		<input type="hidden" name="lang" value="<?=$L?>"/>
		<div class="D2 col-7 pr-0" ><input placeholder="ძებნა" name="key" value="<?=$key?>" class="form-control"/></div>
		<div class="D6 col-4 pr-0" ><input value="ძებნა" type="submit"  class=" btn btn-primary text-white"/></div>
		</form>

		</div>
	<div class="col-2">

				<select class="form-control UTY" onchange="location.href='?page=sitemaplist&key=<?=$key?>&itemtype='+$(this).val()+'&pid='+$('.UTY2').val()">
					<option <?=$itemtype==""?"selected":""?> value="">ყველა ტიპი</option>
<?php
$q4=mysqli_query($con,"SELECT * FROM itemtypes");
while($r4=mysqli_fetch_array($q4)){
?>
<option value="<?=$r4["id"]?>" <?=$r4["id"]==$itemtype?"selected":""?> ><?=$r4["nameka"]?></option>

<?php
}
?>
				</select>
		</div>
	<div class="col-2">

				<select class="form-control UTY2" onchange="location.href='?page=sitemaplist&key=<?=$key?>&pid='+$(this).val()+'&itemtype='+$('.UTY').val()">
					<option <?=$itemtype==""?"selected":""?> value="">ყველა კატეგორია</option>
<?php
$q4=mysqli_query($con,"SELECT * FROM sitemap WHERE pid=2");
while($r4=mysqli_fetch_array($q4)){
?>
<option value="<?=$r4["id"]?>" <?=$r4["id"]==$pid?"selected":""?> ><?=$r4["name_ka"]?></option>

<?php
}
?>
				</select>
		</div>
	<div class="col-1">

				<a href="?page=sitemaplist" class="btn btn-danger"><i class="fa fa-sync-alt"></i></a>
		</div>
	</div>
<div class="row justify-content-center">
	<div class="col-sm-12">

<ul class="nav nav-tabs">
<?php
$flags=["ka"=>"ge","en"=>"gb","ru"=>"ru","fr"=>"fr"];
$q4=mysqli_query($con,"SELECT * FROM languages WHERE active=1");
while($r4=mysqli_fetch_array($q4)){
?>
  <li class="nav-item me-1">
 <a href="?page=sitemaplist&key=<?=$key?>&p=<?=$p?>&lang=<?=$r4["shortname"]?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=$flags[$r4["shortname"]]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>
	</div>
	<div class="col-sm-12">
	<table class="table mt-3 table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
<th>N</th>
<th>Id</th>
<th>name<?=$L?></th>
<th>parent</th>
<th>slug<?=$L?></th>
<th>title<?=$L?></th>
<th>keywords<?=$L?></th>
<th>description<?=$L?></th>
<th>schema<?=$L?></th>
<th>img</th>
<th>Old Link</th>
<th>System File</th>
<th>itemtype</th>
<th>Menu</th>
<th>Pos</th>
<th></th>
<th></th>


		  </tr>
		</thead>
		<tbody>
<?php
while($r1=mysqli_fetch_array($q1)){
?>
		  <tr style="<?=$r1["itemtype"]==4?($r1["pid"]!=""?"background:#0cff0ca3":"background:#f443368a"):""?>">
			<th><?=$cou?></th>
			<th><?=$r1["id"]?></th>
			<th><textarea class="form-control UPT" t="sitemap" d="<?=$r1["id"]?>" n="name_<?=$L?>" ><?=$r1["name_".$L]?></textarea><?=$r1["name_ka"]?></th>
			<th><?=$r1["parent"]?></th>
			<th><textarea class="form-control UPT" t="sitemap" d="<?=$r1["id"]?>" n="slug_<?=$L?>" ><?=$r1["slug_".$L]?></textarea></th>
			<th><textarea class="form-control UPT" t="sitemap" d="<?=$r1["id"]?>" n="title_<?=$L?>" ><?=$r1["title_".$L]?></textarea></th>
			<th><textarea class="form-control UPT" t="sitemap" d="<?=$r1["id"]?>" n="keywords_<?=$L?>" ><?=$r1["keywords_".$L]?></textarea></th>
			<th><textarea class="form-control UPT" t="sitemap" d="<?=$r1["id"]?>" n="description_<?=$L?>" ><?=$r1["description_".$L]?></textarea></th>
			<th><textarea class="form-control UPT" t="sitemap" d="<?=$r1["id"]?>" n="schema_<?=$L?>" ><?=$r1["schema_".$L]?></textarea></th>
			<th><textarea class="form-control UPT" t="sitemap" d="<?=$r1["id"]?>" n="img<?=$L?>" ><?=$r1["img".$L]?></textarea></th>
			<th><textarea class="form-control UPT" t="sitemap" d="<?=$r1["id"]?>" n="oldlink_<?=$L?>" ><?=$r1["oldlink_".$L]?></textarea></th>
			<th><textarea class="form-control UPT" t="sitemap" d="<?=$r1["id"]?>" n="systemfile" ><?=$r1["systemfile"]?></textarea></th>
			<th><select class="UPT" d="<?=$r1["id"]?>" n="itemtype" t="sitemap" ><option value=""  >ტიპი</option>
<?php
$q4=mysqli_query($con,"SELECT * FROM itemtypes");
while($r4=mysqli_fetch_array($q4)){
?>
<option value="<?=$r4["id"]?>" <?=$r4["id"]==$r1["itemtype"]?"selected":""?> ><?=$r4["nameka"]?></option>

<?php
}
?>			
			</select></th>
			<th><input class=" UPT" type="checkbox" t="sitemap" d="<?=$r1["id"]?>" n="top" <?=$r1["top"]==1?"checked":""?> /></th>
			<th><input class="form-control UPT" type="number" t="sitemap" d="<?=$r1["id"]?>" n="pos" value="<?=$r1["pos"]?>" /></th>
			<th><a href="?page=sitemapedit&id=<?=$r1["id"]?>&lang=<?=$L?>" class="btn btn-primary"><i class="fa fa-edit text-white"></i></a></th>
			<th><button class="btn btn-danger DGA" d="<?=$r1["id"]?>" n="sitemap"><i class="fa fa-trash text-white"></i></button></th>
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
	<a href="?page=sitemaplist&lang=<?=$L?>&p=1&key=<?=$key?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&active=<?=$active?>&itemtype=<?=$itemtype?>" class="PG USR">«</a>
	<a href="?page=sitemaplist&lang=<?=$L?>&p=<?=$ACP!=1?($ACP-1):$ACP?>&key=<?=$key?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&active=<?=$active?>&itemtype=<?=$itemtype?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=sitemaplist&lang=<?=$L?>&p=<?=$i?>&key=<?=$key?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&active=<?=$active?>&itemtype=<?=$itemtype?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=sitemaplist&lang=<?=$L?>&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&key=<?=$key?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&key=<?=$key?>&active=<?=$active?>&itemtype=<?=$itemtype?>" class="PG USR">›</a>
	<a href="?page=sitemaplist&lang=<?=$L?>&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&key=<?=$key?>&status=<?=$status?>&start=<?=$start?>&end=<?=$end?>&active=<?=$active?>&itemtype=<?=$itemtype?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
	<div class='col-md-3'>
	   <h5>სულ <?=$Total ?></h5>
	</div>
	</div>
	</div>
</div>
</div>