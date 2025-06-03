<?php
$ACP=1;
$p=$_REQUEST["p"]??"";
if($p>0){

	$ACP=$p;

}
$PA=30;
$fr=($ACP-1)*$PA;
$table="sections";
$table=$_GET["name"];
$WHERE="";
$q1=mysqli_query($con,"DESCRIBE ".$table.";");
$rq1=mysqli_fetch_all($q1,MYSQLI_ASSOC);
$q2=mysqli_query($con,"SELECT * FROM ".$table." as t1 WHERE t1.id>0 $WHERE ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");
$rq2=mysqli_fetch_all($q2,MYSQLI_ASSOC);
	

?>
<div class="container-fluid">
<div class="row">
	<h1 class="w-100  text-center my-4"><?=ucfirst($table)?></h1>

	<div class="col-3 pr-0" ><input placeholder="<?=$rq1[1]["Field"]?>" class=" form-control ITEM" n="<?=$rq1[1]["Field"]?>" t="<?=$table?>" d=""  /></div>
	<div class="col-7 pr-0" ><input value="ADD" type="button" class="ADDITEM btn btn-primary"/></div>
<div class="col-12 mt-2" >
<table class="table table-sm table-striped table-bordered table-condensed table-hover">
	<thead>
	  <tr>
<?php
foreach($rq1 as $r1){
?>
		<th><?=$r1["Field"]?></th>
<?php
}
?>

	</tr>
	</thead>
	<tbody>
<?php
foreach($rq2 as $r2){
?>
	  <tr>
<?php
foreach($rq1 as $r1){
	if($r1["Type"]=="text"){
?>
		<th><textarea class="form-control UPT" d="<?=$r2["id"]?>" t="<?=$table?>" n="<?=$r1["Field"]?>" ><?=$r2[$r1["Field"]]?></textarea></th>
<?php		
	}else{
?>
		<th><input class="form-control UPT" d="<?=$r2["id"]?>" t="<?=$table?>" n="<?=$r1["Field"]?>" value="<?=$r2[$r1["Field"]]?>"/></th>
<?php
	}
}
?>
			<th><button class="btn btn-danger px-1 py-0 DGA" d="<?=$r2["id"]?>" n="<?=$table?>"><i class="fa fa-trash "></i></button></th>
	</tr>
<?php
}
?>	
	</tbody>
</table>
<?php
$q3=mysqli_query($con,"SELECT * FROM $table as t1 WHERE t1.id>0 $WHERE");
?>
	<div class="col-md-12 MID px-0">
	<a href="?page=<?=$table?>&key=<?=$KEY?>&p=1&category=<?=$category!=""?$category:""?>" class="PG USR">«</a>
	<a href="?page=<?=$table?>&key=<?=$KEY?>&p=<?=$ACP!=1?($ACP-1):$ACP?>&category=<?=$category!=""?$category:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=<?=$table?>&key=<?=$KEY?>&p=<?=$i?>&category=<?=$category!=""?$category:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=<?=$table?>&key=<?=$KEY?>&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&category=<?=$category!=""?$category:""?>" class="PG USR">›</a>
	<a href="?page=<?=$table?>&key=<?=$KEY?>&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&category=<?=$category!=""?$category:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div> 
</div>
</div>
</div>
