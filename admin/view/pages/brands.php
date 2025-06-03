<?php
$ACP=1;
$p=$_REQUEST["p"]??"";
if($p>0){
	$ACP=$p;
}
$PA=30;
$L=mysqli_real_escape_string($con,$_GET["lang"]??"ka");
$fr=($ACP-1)*$PA;
$cid="";
$key="";
$WSE="";
$KEY="";
$cid="";
	$key=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
if($key!=""){
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
	$WSE=" AND (t1.name_ka LIKE '%".$KEY."%' OR t1.name_en LIKE '%".$KEY."%')";
}
$WHERE="WHERE t1.id>0 $WSE ";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="/admin/minipan/minipan.js"></script>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
	<h2 class="w-100  text-center my-4">ბრენდები</h2>
	<div class="bgbox ctg row">
	<div class="D2 col-3 pl-0" ><input placeholder="ბრენდის სახელი" class="ADN BRN form-control"/></div>
	<div class="D6 col-2 pr-0" ><input value="დამატება" type="button" class="ABR btn btn-primary"/></div>
	
	<div class="D2 col-4 pl-0" ><form ><input type="hidden" name="lang" value="<?=$L?>"/><input type="hidden" name="page" value="brands"/><input placeholder="ბრენდის სახელი" value="<?=$key?>" name="key" class="ADN w-50 BRN d-inline-block form-control"/><button type="submit" value="" type="button" class="d-inline-block ms-2 w-25 btn btn-success">ძებნა</button><a href="?page=brands" class="btn ms-1 btn-danger"><i class="fa text-white fa-sync"></i></a></form></div>

	
	<div class="D6 col-2 pr-0 d-flex justify-content-end" ><input value="დამახსოვრება" type="button" class="SAVESET btn btn-success"/></div>
	   <div class="col-sm-12 mt-3 px-3">
    <div class='row'>

	<div class="col-sm-12">

<ul class="nav nav-tabs">
<?php
$flags=["ka"=>"ge","en"=>"gb","ru"=>"ru"];
$q4=mysqli_query($con,"SELECT * FROM languages WHERE active=1");
while($r4=mysqli_fetch_array($q4)){
?>
  <li class="nav-item me-1">
 <a href="?page=brands&lang=<?=$r4["shortname"]?>&hidemenu=<?=($_GET["hidemenu"]??"")?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=$flags[$r4["shortname"]]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>
	</div>
	</div>
   </div> 
<div class="col-md-12 mt-3 pb-2 LIST">
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>

			<th>id</th>
			<th>name <?=$L?></th>
			<th>img</th>
			<th>link</th>
			<th>Url</th>
			<th>მთავარზე</th>
			<th>ფილტრში</th>
			<th>წაშლა</th>

			</tr>
		</thead>
		<tbody>
	
<?php
$q2=mysqli_query($con,"SELECT * FROM brands as t1 $WHERE ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");
$q100=mysqli_query($con,"SELECT * FROM brands");
			while($r2=mysqli_fetch_array($q2)){
?>

			<tr>
	<th><?=$r2["id"]?></th>
				<td><input class="form-control UPTNO" placeholder="სახელი" d="<?=$r2["id"]?>" t="brands" n="name_<?=$L?>" value="<?=$r2["name_".$L]?>"/><small><?=$r2["name_ka"]?></small></td>
			<th>
				<div>
<div class="input-group">
<input type="text" class="form-control UPTNO" d="<?=$r2["id"]?>" placeholder="სურათის ლინკი"  n="img" t="brands"  value="<?=$r2["img"]?>" id="example4<?=$r2["id"]?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" target="example4<?=$r2["id"]?>" type="button" id="minipan">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.minipan4<?=$r2["id"]?>').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#example4<?=$r2["id"]?>',
		});
	});
</script>
			  </div>		
			</th>
			<th><input class="form-control UPTNO" placeholder="ლინკი" d="<?=$r2["id"]?>" t="brands" n="link" value="<?=$r2["link"]?>"/></th>
			<th><input class="form-control UPTNO" placeholder="გარე ლინკი" d="<?=$r2["id"]?>" t="brands" n="url" value="<?=$r2["url"]?>"/></th>
				<td><input type="checkbox" class="UPT" d="<?=$r2["id"]?>" <?=$r2["main"]==1?"checked":""?> t="brands" n="main"/></td>
				<td><input type="checkbox" class="UPT" d="<?=$r2["id"]?>" <?=$r2["filter"]==1?"checked":""?> t="brands" n="filter"/></td>
				<td><div class="btn btn-outline-danger DEL" t="brands" d="<?=$r2["id"]?>"><i class="fa fa-trash"></i></div></td>
			</tr>
<?php
	}
?>
		</tbody>
</table>
<?php
$q3=$q100;
$Total=mysqli_num_rows($q100);
?>
	<div class="col-md-12 MID">
	<div class='row'>
	    <div class='col-md-9'>
	<a href="?page=brands&lang=<?=$L?>&p=1&cid=<?=$cid!=""?$cid:""?>&key=<?=$key?>" class="PG USR">«</a>
	<a href="?page=brands&lang=<?=$L?>&p=<?=$ACP!=1?($ACP-1):$ACP?>&key=<?=$key?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=brands&lang=<?=$L?>&p=<?=$i?>&cid=<?=$cid!=""?$cid:""?>&key=<?=$key?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=brands&lang=<?=$L?>&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&key=<?=$key?>&cid=<?=$cid!=""?$cid:""?>&key=<?=$key?>" class="PG USR">›</a>
	<a href="?page=brands&lang=<?=$L?>&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&key=<?=$key?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
	<div class='col-md-3'>
	   <h5>სულ <?=$Total ?></h5>
	</div>
	</div>
	</div>
</div>

<div class="col-12 px-0 d-none GRID">
	<div class="row">
        <?php
        $q2=mysqli_query($con,"SELECT * FROM categories ORDER BY id DESC"); // amis optimizacia sheidzleba
        while($r2=mysqli_fetch_array($q2)) {
            ?>
            <div class=" col-3">
                <div class="Cate p-2">
                    <a href="<?= "?page=", $page, "&id=", $r2["id"] ?>"><?= $r2["name"] ?></a>
                    <div class="btn dlt DEL"><h4><i class="fa fa-trash" aria-hidden="true" t="categories"
                                                    d="<?= $r2["id"] ?>"></i></h4></div>
                </div>
            </div>
        <?php
        }
        ?>
	</div>
</div>

</div>
</div>
</div>
</div>
