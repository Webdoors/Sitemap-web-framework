<?php
session_start();
if(isset($_SESSION['GuserID'])){
$a=mysqli_real_escape_string($con,$_POST["a"]);
$q3=mysqli_query($con,"SELECT DESCRIPTION,id,QUANTITY FROM special WHERE id='".$a."'");
$r3=mysqli_fetch_array($q3);
?>
<div class="container-fluid">
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th colspan=4 ><?=$r3["id"]?> <?=$r3["DESCRIPTION"]?></th>							
			</tr>
			<!--<tr>
				<th >IN STOCK</th>							
				<th colspan=3 ><?=$r3["QUANTITY"]?></th>							
			</tr>-->
			<tr>
				<th>STORENAME</th>
				<th>QUANTITY</th>									
				<th>RESERVE</th>									
				<th>PREORDER</th>									
			</tr>
		</thead>
		<tbody>
<?php
$q1=mysqli_query($con,"SELECT * FROM stores ORDER BY id DESC");
while($r1=mysqli_fetch_array($q1)){
$q2=mysqli_query($con,"SELECT id FROM qbystore WHERE itemid='".$a."' AND storeid='".$r1["id"]."'");
if(mysqli_num_rows($q2)==0){
	mysqli_query($con,"INSERT INTO qbystore SET itemid='".$a."', storeid='".$r1["id"]."'");
	
}
$q2=mysqli_query($con,"SELECT * FROM qbystore WHERE itemid='".$a."' AND storeid='".$r1["id"]."'");
$r2=mysqli_fetch_array($q2);
?>
			<tr>
				<th><?=$r1["name"]?></th>
				<th><?=$r2["quantity"]?>&nbsp;&nbsp;&nbsp;<!--<div class="btn btn-default GCO" d="<?=$r2["id"]?>" c="qcom">დეტალურად</div>--></th>
				<th><?=$r2["reserve"]?>&nbsp;&nbsp;&nbsp;<div class="btn btn-default GCO" d="<?=$r2["id"]?>" c="rcom">დეტალურად</div></th>
				<th><?=$r2["preorder"]?>&nbsp;&nbsp;&nbsp;<div class="btn btn-default GCO" d="<?=$r2["id"]?>" c="pcom">დეტალურად</div></th>								
			</tr>
<?php
}
$q4=mysqli_query($con,"SELECT SUM(quantity) as 'q', SUM(reserve) as 'r', SUM(preorder) as 'p' FROM qbystore WHERE itemid='".$a."' ");
$r4=mysqli_fetch_array($q4);
?>		
		</tbody>
		<tfoot>
			<tr>
				<th>TOTAL</th>
				<th><?=$r4["q"]?></th>									
				<th><?=$r4["r"]?></th>									
				<th><?=$r4["p"]?></th>																	
			</tr>
		</tfoot>
</table>
<div class="col-md-12 NOP">
	<div class="col-md-3 NOP">
	<span class="label label-default">აირჩიეთ საწყობი</span>
		<select class="form-control SAW">
			<option value="">აირჩიეთ საწყობი</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM stores ORDER BY id DESC");
while($r1=mysqli_fetch_array($q1)){
?>
			<option value="<?=$r1["id"]?>"><?=$r1["name"]?></option>
<?php
}
?>
		</select>
	</div>
	<div class="col-md-3">
	<span class="label label-default">აირჩიეთ ოპერაცია</span>
		<select class="form-control OPE">
			<option value="">აირჩიეთ ოპერაცია</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM opertypes WHERE omit=0 ORDER BY id ASC");
while($r1=mysqli_fetch_array($q1)){
?>
			<option value="<?=$r1["id"]?>"><?=$r1["name"]?></option>
<?php
}
?>	
		</select>
	</div>
	<div class="col-md-6 NOP">
	<span class="label label-default">კომენტარი</span>	
		<textarea class="form-control COM" placeholder="კომენტარი"></textarea>
	</div>
	<div class="col-md-4 NOP">
	<span class="label label-default">სახელი</span>	
		<input class="form-control N1" placeholder="სახელი"/>
	</div>
	<div class="col-md-4">
	<span class="label label-default">გვარი</span>	
		<input class="form-control N2" placeholder="გვარი"/>
	</div>
	<div class="col-md-4 NOP">
	<span class="label label-default">ტელეფონი</span>	
		<input class="form-control N3" placeholder="ტელეფონი"/>
	</div>
	<div class="col-md-4 NOP">
	<span class="label label-default">მისამართი</span>	
		<input class="form-control N4" placeholder="მისამართი"/>
	</div>
	<div class="col-md-2">	
	<span class="label label-default">რაოდენობა</span>	
		<input class="form-control RAM" placeholder="რაოდენობა"/>
	</div>
	<div class="col-md-2 NOP">
	<br> 
		<div class="btn btn-default SAV" d="<?=$a?>">დამახსოვრება</div>
	</div>
	<div class="col-md-12 LIN"></div>
	<div class="col-md-3 NOP">
	<span class="label label-default">აირჩიეთ საწყობი საიდან</span>
		<select class="form-control SAI">
			<option value="">აირჩიეთ საწყობი</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM stores ORDER BY id DESC");
while($r1=mysqli_fetch_array($q1)){
?>
			<option value="<?=$r1["id"]?>"><?=$r1["name"]?></option>
<?php
}
?>
		</select>
	</div>
	<div class="col-md-3">
	<span class="label label-default">აირჩიეთ საწყობი სად</span>
		<select class="form-control SAD">
			<option value="">აირჩიეთ საწყობი</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM stores ORDER BY id DESC");
while($r1=mysqli_fetch_array($q1)){
?>
			<option value="<?=$r1["id"]?>"><?=$r1["name"]?></option>
<?php
}
?>
		</select>
	</div>
	<div class="col-md-6 NOP">
	<span class="label label-default">კომენტარი</span>	
		<textarea class="form-control CMM" placeholder="კომენტარი"></textarea>
	</div>
	<div class="col-md-2 NOP">	
	<span class="label label-default">რაოდენობა</span>	
		<input class="form-control RAD" placeholder="რაოდენობა"/>
	</div>
	<div class="col-md-2">
	<br> 
		<div class="btn btn-default MOV" d="<?=$a?>">გადატანა</div>
	</div>
</div>
</div>
<?php
}
?>