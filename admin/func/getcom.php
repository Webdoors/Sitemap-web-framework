<?php
session_start();
if(isset($_SESSION['GuserID'])){
$a=mysqli_real_escape_string($con,$_POST["a"]);
$b=mysqli_real_escape_string($con,$_POST["b"]);
$q3=mysqli_query($con,"SELECT $b FROM qbystore WHERE id='".$a."'");
$r3=mysqli_fetch_array($q3);
?>
<div class="container-fluid">
<strong>კომენტარი</strong>
<br>&nbsp;
	<div class="col-md-12 NOP">
		<textarea class="form-control CCM" placeholder="მიუთითეთ კომენტარი" d="<?=$a?>" c="<?=$b?>"><?=$r3[$b]?></textarea>
	</div>
	<div class="col-md-12 NOP LIN"></div>
	<div class="col-md-12 NOP">
		<div class="col-md-2">Name Lastname</div>		
		<div class="col-md-2 NOP">Tel</div>	
		<div class="col-md-2">Address</div>	
		<div class="col-md-1 NOP">Qnty</div>	
		<div class="col-md-2">Comment</div>	
		<div class="col-md-1 NOP">N</div>	
		<div class="col-md-2">Action</div>	
	</div>
<?php
if($b=="rcom"){
	$w="reserve";
}
if($b=="pcom"){
	$w="preorder";
}
$q4=mysqli_query($con,"SELECT * FROM info WHERE qbystoreid='".$a."' AND $w=1");
while($r4=mysqli_fetch_array($q4)){
?>
	<div class="col-md-12 NOP LIN2"></div>
	<div class="col-md-12 NOP">
		<div class="col-md-2"><?=$r4["name"]?> <?=$r4["lastname"]?></div>		
		<div class="col-md-2 NOP"><?=$r4["tel"]?></div>	
		<div class="col-md-2"><?=$r4["address"]?></div>	
		<div class="col-md-1 NOP QC1"><?=$r4["quantity"]?></div>	
		<div class="col-md-2"><?=$r4["com"]?></div>	
		<div class="col-md-1 NOP"><input class="form-control RC1" placeholder="N" /></div>	
		<div class="col-md-2"><div class="btn btn-default CHM" w="<?=$w?>" d="<?=$r4["id"]?>" t="<?=$a?>">ჩამოწერა</div></div>	
	</div>
<?php
}
?>
</div>
<?php
}
?>