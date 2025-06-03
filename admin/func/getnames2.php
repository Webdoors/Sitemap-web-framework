<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// session_start();
if(isset($_SESSION['GuserID'])){
$a=mysqli_real_escape_string($con,$_POST["a"]);
$b=mysqli_real_escape_string($con,$_POST["b"]);
$q3=mysqli_query($con,"SELECT t1.*  FROM special as t1  WHERE t1.id='".$a."' ");

while($r3=mysqli_fetch_array($q3)){
	$q4=mysqli_query($con,"SELECT t1.*  FROM orderproducts as t1  WHERE t1.orderid='".$b."' AND productid='".$r3["id"]."' ");
	$r4=mysqli_fetch_array($q4);
	if(mysqli_num_rows($q4)>0){
		mysqli_query($con,"UPDATE orderproducts SET quantity=quantity+1 WHERE orderid='".$b."' AND productid='".$r3["id"]."' ");		
		
	}else{
		mysqli_query($con,"INSERT INTO orderproducts SET productid='".$r3["id"]."',orderid='".$b."',item='".$r3["ITEM"]."',takeprice='".$r3["PRICE"]."',salesprice='".$r3["salesprice"]."',barcode='".$r3["BARCODE"]."',quantity='1'");	
	}
		
$total+=$item["salesprice"];
$profit+=$item["salesprice"]-$item["takeprice"];
	
?>
					<tr>
						<th style="min-width:130px"><textarea style="height:37px" class="form-control UPT" w="<?=$r3["id"]?>" d="item" placeholder="ნივთი" title="პროდუქტი"><?=$r3["ITEM"]?></textarea></th>
						<th style="min-width:100px"><input class="form-control UPT" w="<?=$r3["id"]?>" t="orderproducts" n="supplier" d="<?=$r2["id"]?>" placeholder="მომწოდებელი" value="<?=$r3["supplier"]?>" title="მომწოდებელი"/></th>
						<th><input class="form-control UPT" w="<?=$r3["PRICE"]?>" t="orderproducts" d="<?=$r3["id"]?>" n="PRICE" placeholder="ასაღები ფასი" value="<?=$r3["PRICE"]?>" title="ასაღები ფასი"/></th>
						<th><input class="form-control UPT" w="<?=$r3["salesprice"]?>" t="orderproducts" d="<?=$r3["id"]?>" n="salesprice" placeholder="გასაყიდი ფასი" value="<?=$r3["salesprice"]?>" t="orderproducts" d="<?=$r2["id"]?>" title="გასაყიდი ფასი"/></th>
						<th><input class="form-control UPT" type="number" min="1" w="<?=$r3["quantity"]?>" d="<?=$r3["id"]?>"  t="orderproducts" n="quantity" placeholder="გასაყიდი ფასი" value="1" title="Qnty"/></th>
						<th><button class="btn btn-danger DEL " t="orderproducts" d="<?=$r3["id"]?>" ><i class="fa fa-trash"></i></button></th>
					</tr>
<?php
}
}
?>