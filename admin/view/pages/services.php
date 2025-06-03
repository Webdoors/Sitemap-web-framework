<?php
$L=mysqli_real_escape_string($con,$_GET["lang"]??"ka");
$ACP=1;
$p=$_REQUEST["p"]??"";
if($p>0){
	$ACP=$p;
}
$fr=($ACP-1)*30;
?>
<?php
	$q2=mysqli_query($con,"SELECT id,name_$L as 'content' FROM services ORDER BY position ASC");
	$r2=mysqli_fetch_all($q2,MYSQLI_ASSOC);
	$services=$r2;

		

		$json=json_encode($services);

	 // echo $json;
?>
<div class="container">
<div class="row">
	<h2 class="w-100  text-center my-4">სერვისები</h2>
<div class="col-md-12">
	<div class="bgbox ctg row">
	<div class="D6 col-7 pr-0" ><a href="?page=servicesedit"><input value="დამატება" type="button" t="services" n="name_ka" class="btn btn-primary"/></a></div>
	<div class="D6 col-2 pr-0 d-flex justify-content-end" ><input value="დამახსოვრება" type="button" class="SAVESET btn btn-success"/></div>
	   <div class="col-sm-12 mt-3 px-3">
    <div class='row mb-3'>

	<div class="col-sm-12">

<ul class="nav nav-tabs">
<?php
$flags=["ka"=>"ge","en"=>"gb","ru"=>"ru"];
$q4=mysqli_query($con,"SELECT * FROM languages WHERE active=1");
while($r4=mysqli_fetch_array($q4)){
?>
  <li class="nav-item me-1">
 <a href="?page=services&lang=<?=$r4["shortname"]?>&hidemenu=<?=($_GET["hidemenu"]??"")?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=$flags[$r4["shortname"]]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>
	</div>
	</div>
   </div> 
<div class="col-md-12 pr-0 pb-2 LIST">
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>

			<th>id</th>
			<th>name <?=$L?></th>
			<th>img</th>

			<th>რედაქტირება</th>
			<th>წაშლა</th>

			</tr>
		</thead>
		<tbody>
	
<?php
$q2=mysqli_query($con,"SELECT * FROM services ORDER BY position ASC");
			while($r2=mysqli_fetch_array($q2)){
?>

			<tr>
	<th><?=$r2["id"]?></th>
				<td><input class="form-control UPTNO" placeholder="სახელი" d="<?=$r2["id"]?>" t="services" n="name_<?=$L?>" value="<?=$r2["name_".$L]?>"/><small><?=$r2["name_ka"]?></small></td>
			<th>
		<div class="input-append row mx-2">
			<div class="col-md-6 NOP">
				<input id="YDA<?=$r2["id"]?>" class="form-control UPTNO" d="<?=$r2["id"]?>" t="services" n="img" placeholder="სურათის ლინკი" type="text" value="<?=$r2["img"]?>">			
			</div>
			<div class="col-md-3 NOP">
			<a class="btn iframe-btn btn-primary FILESELECT" target="YDA<?=$r2["id"]?>" type="button">Select</a>
		</div>			
		</div>			
			</th>

				<td><a class="btn btn-outline-primary " href="?page=servicesedit&id=<?=$r2["id"]?>" t="services" d="<?=$r2["id"]?>"><i class="fa fa-edit"></i></a></td> 
				<td><div class="btn btn-outline-danger DEL" t="services" d="<?=$r2["id"]?>"><i class="fa fa-trash"></i></div></td> 
			</tr>
<?php
	}
?>
		</tbody>
</table>
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
