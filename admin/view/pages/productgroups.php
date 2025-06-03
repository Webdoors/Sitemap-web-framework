<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$ACP=1;
$p=$_REQUEST["p"]??"";
if($p>0){

	$ACP=$p;

}

$PA=30;

$fr=($ACP-1)*$PA;

include("func/functions.php");

?>

<?php

	$code=mysqli_real_escape_string($con,$_GET["code"]??"");
	$WCO="";
	if($code!=""){
		$WCO=" AND t1.groupcode='".$code."'  ";

	} 
?>
<link href="/js/lightbox/css/lightbox.min.css" rel="stylesheet">
<script src="/js/lightbox/js/lightbox.min.js"></script>
<div class="col-sm-8 mx-auto mt-5">
<table class="table  table-bordered table-condensed">
<thead>
<form method="GET">
<tr>
	<th colspan="2"><input name="page" value="productgroups" type="hidden"/><a href="?page=addgroup"><input value="ჯგუფის შექმნა" type="button" class=" btn btn-success"/></a></th>
	<th><input name="code" class="form-control" value="<?=$code?>" placeholder="search by group code"/></th>
	<th colspan="3"><button type="submit" class="btn btn-success">ძებნა</button></th>
</tr>
</form>
</thead>
<tr>
<th>id</th>
<th>Image</th>
<th>groupcode</th>
<th>nameen</th>
<th>Edit</th>
<th></th>
</tr>
</thead>
<tbody>
<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$q1=mysqli_query($con,"SELECT * FROM productgroups as t1 WHERE t1.id>0 $WCO ORDER BY t1.id DESC LIMIT $PA OFFSET ".$fr."");
while($r1=mysqli_fetch_array($q1))
{
$q2=mysqli_query($con,"SELECT t1.id,t1.nameen FROM products as t1
WHERE t1.groupid='".$r1["id"]."' LIMIT 1 ");
$r2=mysqli_fetch_array($q2);	

	$q3=mysqli_query($con,"SELECT `ident`,`ext`,`img` FROM `productimgs` WHERE `productid`='".$r2["id"]."' AND `main`='1'");
	$r3=$q3?mysqli_fetch_array($q3):[];
	$img=$r3["img"];
	if($img==""){
		$img="uploads/noimg.png";
	}	
?>
<tr>
<th><?=$r1["id"]?></th>
<th><a class="example-image-link" href="<?=$img?>" data-title="<?=$r2["nameen"]?>" data-lightbox="example-1"><img style="max-width:70px" src="<?=$img?>" alt="Main image"/></a></th>
<th><?=$r1["groupcode"]?></th>
<th><input class="form-control UPT" n="nameen" d="<?=$r1["id"]?>" t="productgroups" value="<?=$r1["nameen"]?>"/></th>
<th><a class="btn btn-primary" href="?page=addgroup&gid=<?=$r1["id"]?>">Edit</a></th>
<th><a class="btn btn-danger DGA text-white DELPRO" d="<?=$r1["id"]?>" n="productgroups" ><i class="fa fa-trash"></i></a></th>
</tr>
<?php  }?>
</tbody></table>
<div class="col-md-12 MID TC py-3">

<a href="?page=productgroups&p=1" class="PG USR"><i class="fa fa-angle-double-left"></i></a>

<a href="?page=productgroups&p=<?=$ACP!=1?($ACP-1):$ACP?>" class="PG USR"><i class="fa fa-angle-left"></i></a>

<?php

$q3=mysqli_query($con,"SELECT * FROM productgroups as t1 WHERE t1.id>0 $WCO ");

for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){

	if(($ACP-5)<=$i&&($ACP+5)>=$i){

?>

<a href="?page=productgroups&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>

<?php }

}

?>

<a href="?page=productgroups&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>" class="PG USR"><i class="fa fa-angle-right"></i></a>

<a href="?page=productgroups&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>" class="PG USR"><i class="fa fa-angle-double-right"></i> <?=ceil(mysqli_num_rows($q3)/$PA);?></a>

</div>
</div>