<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// session_start();
if(isset($_SESSION['GuserID'])){
$a=mysqli_real_escape_string($con,$_POST["a"]);
$q3=mysqli_query($con,"SELECT DISTINCT(BARCODE) as 'BARCODE',t1.*,t1.id as 'sid',t1.PRICE as 'takeprice1',t1.salesprice as 'salesprice1'  FROM special as t1 

WHERE t1.ITEM LIKE '%".$a."%' ");
while($r3=mysqli_fetch_array($q3)){
	
?>
<div class="col-md-12 CP NOP GNA"><span class="N1" price="<?=$r3["takeprice1"]?>" salesprice="<?=$r3["salesprice1"]?>" d="<?=$r3["sid"]?>"><?=$r3["ITEM"]?></span> price(<span class="N2"><?=$r3["price"]?></span>)  <?=date("d.m.Y H:i:s",$r3["date"])?><input type="hidden" value="<?=$r3["brand"]?>" class="N3"/> Barcode(<span class='N4'><?=$r3['BARCODE'] ?></span>)</div>

<?php
}
}
?>