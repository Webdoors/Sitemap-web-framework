<?php if($r12["users"]==1){ ?>
<?php
$ACP=1;
if(isset($_REQUEST["p"])){
	$ACP=$_REQUEST["p"];
}
$PA=30;
$fr=($ACP-1)*$PA;
?>
<div class="container-fluid mt-3">
	<div class="row ">
	<div class="col-md-12 ">
	<table class="table table-bordered table-striped table-condensed">
	<tr>
		<th>რაოდ.</th>
		<th>FinaId</th>
		<th>სახელი</th>
		<th>გვარი</th>
		<th>ელფოსტა</th>
		<th >ფასის ტიპი</th>
		

		<th>მობილური</th>
		<th>მისამართი</th>
		<th>კომპანია</th>
		<th>კომპანიის ს/ნ</th>
		<th>SMS</th>
		<th>აქტიური</th>

		<th></th>	
	</tr>

	<?php
	$cou=0;
	$q1=mysqli_query($con,"SELECT t1.*, (SELECT title FROM userstatus WHERE id=t1.status) AS ustatus FROM users  AS t1 ORDER BY t1.id DESC LIMIT $PA OFFSET ".$fr."");
    $q3=mysqli_query($con,"SELECT id FROM users");
	$cou=mysqli_num_rows($q3)-($ACP-1)*$PA;
	while($r1=mysqli_fetch_array($q1)){
	?>
	<tr>
		<td><?=$cou?></td>
		<td><?=$r1["finaid"]?></td>
		<td><?=$r1["firstname"]?></td>
		<td><?=$r1["lastname"]?></td>
		<td><?=$r1["email"]?></td>
<?php
     $st=mysqli_query($con, "SELECT * FROM pricestatus");

?>		
		<td >
		<select class="UPT" d="<?=$r1['id']?>" t="users" n="status">
		<?php
		while($rst=mysqli_fetch_assoc($st))
		{
		?>
		    <option <?=$rst['id']==$r1['status']?"selected":"" ?> value="<?=$rst['id']?>">       <?=$rst['name'] ?></option>
		 <?php
		}
		?>	
       </select>		
		</td>
  

		<td><?=$r1["tel"]?></td>
		<td><?=$r1["address"]?></td>
		<td><?=$r1["companyname"]?></td>
		<td><?=$r1["companyid"]?></td>
		<td><input type="checkbox"class="form-control UPT" n="sms" t="users" d="<?=$r1["id"]?>" <?=$r1["sms"]==1?"checked":""?> /></td>
		<td><input type="checkbox"class="form-control UPT" n="active" t="users" d="<?=$r1["id"]?>" <?=$r1["active"]==1?"checked":""?> /></td>

		<td><a class="DGA btn btn-danger px-1 py-0" n="users" d="<?=$r1["id"]?>" ><i class="fa text-white fa-trash"></i></a></td>
	</tr>
	<?php
	$cou=$cou-1;  
	}
	?>
	</table>
	<ul class="col-md-12 pagination LIS P">
	<?php
	$q3=mysqli_query($con,"SELECT id FROM users ");
	
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/30);$i++){
	?><li>
	<a href="?page=clients&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> AMI"><?=$i?></a>
	</li>
	<?php
	}
	
	?>
	<li class="next"><a href="?page=clients&p=1"><i class="fa fa-angle-right"></i></a></li>
	<li class="last"><a href="?page=clients&p=1">Last</a></li>
	</ul>
</div>
</div>
<?php }?>
