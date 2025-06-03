<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$a=mysqli_real_escape_string($con,$_POST["a"]);
$b=mysqli_real_escape_string($con,$_POST["b"]);
mysqli_query($con,"UPDATE products SET groupid='".$b."' WHERE id='".$a."' ");
    $q1=mysqli_query($con,"SELECT t1.id,t1.active,t1.nameen,t1.namege,t1.slug,t1.code,t1.sale,t1.price,
(SELECT nameen FROM categories as t2 WHERE t2.id=t1.category LIMIT 1) as 'cat',
(SELECT nameen FROM brands as t3 WHERE t3.id=t1.brand LIMIT 1) as 'brandi' FROM products as t1
WHERE t1.id='".$a."' ");
	$r1=mysqli_fetch_array($q1);
//	    ase loopshi gamodzaxeba ara efficient aris
	 $q3=mysqli_query($con,"SELECT ident,ext FROM productimgs WHERE pid='".$r1["id"]."' AND main=1");
	 $r3=$q3?mysqli_fetch_array($q3):[];
?>

	<tr>
		<td><input class="form-control UPT mx-auto text-center" placeholder="Pos" style="width:70px" type="number"value="<?=$r1["pos"]?>" d="<?=$r1["id"]?>" t="products" n="pos" value="<?=$r1["pos"]?>"/></td>
		<td><a class="example-image-link" href="uploads/product/<?=$r1["id"]."/".$r3["ident"]."_720.".$r3["ext"]?>" data-title="<?=$r1["nameen"]?>" data-lightbox="example-1"><img style="max-width:70px" src="uploads/<?=$r3["ident"]==""?"noimage.png":"product/".$r1["id"]."/".$r3["ident"]."_61.".$r3["ext"]?>" alt="Main image"/></a></td>
		<td><a href="?page=product&id=<?=$r1["id"]?>" target="_blank"><span class="FORSLUG" d="<?=$r1["code"]?>"><?=$r1["code"]?></span><br><small>(Edit)</small></a></td>
		<td><a href="/ka/product/<?=$r1["slug"]?>" target="_blank"><?=$r1["namege"]?><br><small>(View)</small></a></td>
		<td><span style="<?=$r1["sale"]!="0"?"text-decoration: line-through;":""?>"><?=$r1["price"]?> ₾</span><br><span class="<?=$r1["sale"]!="0"?"":"d-none"?>"><?=$r1["sprice"]?> ₾</span></td>

	
	

		<td>

		</td>
		<td><a class="btn btn-danger REMGROUP"d="<?=$r1["id"]?>" gid="<?=$gid?>" ><i class="fa fa-trash  text-white"></i></a></td>
	</tr>