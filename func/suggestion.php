<?php
$val=mysqli_real_escape_string($con,$_POST["val"]);

$sql="SELECT t1.*, 
             t2.nameen AS optname,
			 (SELECT slug FROM categories WHERE id=t1.category) as 'subcatslug' ,
			 (SELECT img FROM productimgs WHERE productid=t1.id AND main=1 LIMIT 1) AS mainimg,
			 (SELECT img FROM options WHERE pid=t1.id AND main=1 LIMIT 1) AS optionimg,
			 (SELECT slug FROM productgroups  WHERE t1.groupid=id) as 'gslug' 


  FROM products AS t1 LEFT JOIN options AS t2  ON(t1.id=t2.pid) WHERE t1.id IN(SELECT pid FROM options WHERE code like '%$val%' OR nameen like '%$val%') GROUP BY t2.pid LIMIT 7 ";
//echo $sql;
$sugg=mysqli_query($con, $sql);
if(mysqli_num_rows($sugg)>0&&$val!='')
{
while($rsugg=mysqli_fetch_assoc($sugg))
{
	if($rsugg["optionimg"]!=""){
		$img=$rsugg["optionimg"];
	}else{
		if($r1["img"]!='')
		{
		$img=$rsugg["img"];
		}
		else
		{
			$img="/admin/uploads/products/".str_replace(" ","-",substr($rsugg["ITEM"],0,6)).".jpg";
		if(!file_exists(getcwd().$img)){
			$img="/admin/img/noimg.png";
		}	
		}
	}
	
	
	?>
	<a href='ka/product/<?=$rsugg["subcatslug"]?>/<?=$rsugg["gslug"]==""?$rsugg["slug"]:$rsugg["gslug"] ?>/<?=$rsugg["id"]?>'>
	 <div class='sugimg' style='background:url("<?=$img ?>") no-repeat left center; '>
	   
	 </div>
	 <div class='sugtext'>  <?= $rsugg['optname'] ?></div>
	</a>

	 <?php
}
//echo $sql;
}

	echo "__1";

?>