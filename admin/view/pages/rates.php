<?php
$ACP=1;
$p=$_REQUEST["p"]??"1";
if($p>0){
	$ACP=$p;
}
$fr=($ACP-1)*30;

?>
<?php
	$q2=mysqli_query($con,"SELECT * FROM currency ");
	$r2=mysqli_fetch_all($q2,MYSQLI_ASSOC);
	$partners=$r2;

		

		$json=json_encode($partners);

	 // echo $json;
?>
<div class="container">
<div class="row">
	<h2 class="w-100  text-center my-4">ენები</h2>
<div class="col-md-12">
	<div class="bgbox ctg row">
	<div class="D2 col-3 pr-0" ><input placeholder="ენის მოკლე სახელი" maxlength="2" class="ADN form-control"/></div>
	<div class="D6 col-7 pr-0" ><input value="დამატება" type="button" class="APA btn btn-primary"/></div>
	<div class="D6 col-2 pr-0 d-flex justify-content-end" ><input value="დამახსოვრება" type="button" class="SAVESET btn btn-success"/></div>
<div class="col-md-12 pr-0 pb-2 LIST mt-3">
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>

			<th>id</th>
			<th>name</th>
			<th>shortname</th>
			<th>active</th>
			<th>main</th>			
			<th>position</th>
			<th>წაშლა</th>

			</tr>
		</thead>
		<tbody>
	
<?php
$q2=mysqli_query($con,"SELECT * FROM currency");
			while($r2=mysqli_fetch_array($q2)){
?>

			<tr>
	<th><?=$r2["id"]?></th>
				<td><input class="form-control UPTNO" placeholder="სახელი" d="<?=$r2["id"]?>" t="currency" n="name" value="<?=$r2["name"]?>"/></td>
				<td><input class="form-control UPTNO" placeholder="ყიდვა" d="<?=$r2["id"]?>" t="currency" n="shortname" value="<?=$r2["buy"]?>"/></td>
                <td><input class="form-control UPTNO" placeholder="გაყიდვა" d="<?=$r2["id"]?>" t="currency" n="shortname" value="<?=$r2["sell"]?>"/></td>
<?php
	}
?>
		</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
