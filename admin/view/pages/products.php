<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
$cid="";
$ACP=1;
$p=isset($_REQUEST["p"])?$_REQUEST["p"]:0;
if($p>0){
	$ACP=$p;
}
$PA=30;
$fr=($ACP-1)*$PA;
$category='';
$STATUS=mysqli_real_escape_string($con,isset($_REQUEST["status"])?$_REQUEST["status"]:"");
$volume=mysqli_real_escape_string($con,isset($_REQUEST["volume"])?$_REQUEST["volume"]:"");
$category=mysqli_real_escape_string($con,isset($_REQUEST["category"])?$_REQUEST["category"]:"");
$subcategory=mysqli_real_escape_string($con,isset($_REQUEST["subcategory"])?$_REQUEST["subcategory"]:"");
$brand=mysqli_real_escape_string($con,isset($_REQUEST["brand"])?$_REQUEST["brand"]:"");
$top=mysqli_real_escape_string($con,isset($_REQUEST["top"])?$_REQUEST["top"]:"");
$CAT=(int)(isset($_REQUEST["category"])?$_REQUEST["category"]:"");
$WCA="";
$WSE="";
$WBR="";
$WTO="";
$KEY="";
$cid="";


if($CAT!=""&&$CAT!="0"){
	$WCA=" AND (t1.sitemapid='".$CAT."' OR t1.sitemapid in (SELECT id FROM sitemap WHERE pid='".$CAT."'))";
}
if($brand!=""){
	$WBR=" AND t1.brand='".$brand."' ";
}
if($top!=""){
	$WTO=" AND t1.top='".$top."' ";
}
if($subcategory!=""&&$subcategory!="0"){
	$WCA=" AND (t1.sitemapid='".$subcategory."' OR t1.sitemapid in (SELECT id FROM sitemap WHERE pid='".$subcategory."'))";
}
if((isset($_REQUEST["key"])?$_REQUEST["key"]:"")!=""){
	$KEY=mysqli_real_escape_string($con,isset($_REQUEST["key"])?$_REQUEST["key"]:"");
	$WSE=" AND (t1.title_ka LIKE '%".$KEY."%' OR t1.title_en LIKE '%".$KEY."%' OR t1.good_n LIKE '%".$KEY."%')";
}
$CAT=$subcategory!=""?$subcategory:$category;
$WVO="";
if($volume!=""){
	if($volume=="1"){
		$WVO=" AND t1.volume>0 ";		
	}elseif($volume=="0"){
		$WVO=" AND t1.volume<1 ";
	}

}
$q2=mysqli_query($con,"SELECT * FROM sitemap WHERE id='".$CAT."' AND slug_ka<>''");
$r2=mysqli_fetch_array($q2);
$R2=$r2;
// var_dump($r2);

$q44=mysqli_query($con,"SELECT id FROM sitemap WHERE pid='".(isset($r2["id"])?$r2["id"]:"")."' AND slug_ka<>''");
$r44=mysqli_fetch_all($q44,MYSQLI_ASSOC);
$ids=array_column($r44,"id");
$q45=mysqli_query($con,"SELECT id FROM sitemap WHERE (pid='".(isset($r2["id"])?$r2["id"]:"")."' OR pid in ('".implode("','",$ids)."')) AND slug_ka<>''");
$r45=mysqli_fetch_all($q45,MYSQLI_ASSOC);
$ids2=array_column($r45,"id");

$q4=mysqli_query($con,"SELECT id FROM sitemap WHERE (pid='".(isset($r2["id"])?$r2["id"]:"")."' OR pid in ('".implode("','",$ids)."') OR pid in ('".implode("','",$ids2)."')) AND slug_ka<>''");
$r4=mysqli_fetch_all($q4,MYSQLI_ASSOC);
if($CAT!=""){
	$WCA=" AND t1.category='".$r2["id"]."' OR t1.category in ('".implode("','",array_column($r4,"id"))."') ";
}
$WHERE=" $WSE $WVO $WCA $WBR $WTO";
$q1=mysqli_query($con,"SELECT t1.*,t2.name_ka as 'menu',t2.name_en as 'menu_en',(SELECT slug_ka FROM sitemap as t4 WHERE t4.id=t1.sitemapid) as 'slug'
 FROM products as t1 LEFT JOIN sitemap as t2 ON(t1.category=t2.id) LEFT JOIN sitemap as t3 ON(t3.id=t2.pid) WHERE t1.id>0 $WHERE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");
$q100=mysqli_query($con,"SELECT t1.* FROM products as t1 WHERE t1.id>0 $WHERE ORDER BY t1.id DESC ");	
$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="row my-2">
			<div class="col-sm-3">
				<input class="form-control SERKEY3" placeholder="Search" value="<?=$KEY?>"/>
			</div>
			<div class="col-sm-1">
				<button class="btn btn-primary SER3">Search</button>
			</div>
			<div class="col-sm-2">
				<a  class="btn btn-success NEWPRO text-white">ახალი პროდუქტი <i class="fa text-white fa-plus ml-2"></i></a>
			</div>
			<div class="col-sm-5">
				<a href="?page=products" class="btn btn-danger SER3"><i class="fa text-white fa-sync"></i></a>
			</div>
			<div class="col-sm-5 d-none">
				<select class="form-control UTY">
					<option <?=$UTYPE==""?"selected":""?> value="">ყველა მომხმარებელი</option>
					<option <?=$UTYPE=="1"?"selected":""?> value="1">ფიზიკური პირი</option>
					<option <?=$UTYPE=="2"?"selected":""?> value="2">იურიდიული პირი</option>
				</select>
			</div>
			<div class="col-sm-1 d-flex justify-content-end">
<a tagret="_blank" href="/admin/func/productsexcel.php?status=<?=$STATUS ?>&volume=<?=$volume ?>&key=<?=$KEY ?>&category=<?=$CAT ?>"><button class="btn btn-success">Excel</button>	</a>			
			</div>
		</div>
	</div>
	<div class="col-12">
<ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
	<li class="nav-item mr-1" role="presentation">
		
			<button class="nav-link <?=$category==""?"active":""?> p-0" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><a class="px-2" href="/admin/?page=products"> All</a></button>
		
	</li>
<?php
$q2=mysqli_query($con,"SELECT * FROM sitemap WHERE itemtype=2 AND pid=2 ORDER BY name_ka ASC");
while($r2=mysqli_fetch_array($q2)){

?>
    <li class="nav-item mr-1" role="presentation">
	
		<button class="nav-link <?=$category==$r2["id"]?"active":""?> p-0" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><a class="px-2" href="/admin/?page=products&category=<?=$r2["id"]?>"> <?=$r2["name_ka"]?></a></button>
	
    </li>
<?php
}
?>

  </ul>
	</div>
	<div class="col-12">
<ul class="nav nav-tabs mb-2 <?=$category==""?"d-none":""?>" id="myTab" role="tablist">

<?php
$q2=mysqli_query($con,"SELECT * FROM sitemap WHERE itemtype=2 AND pid='".$category."' ORDER BY name_ka ASC");
// echo "SELECT * FROM sitemap WHERE itemtype=2 AND pid='".$category."' ORDER BY name_ka ASC";
while($r2=mysqli_fetch_array($q2)){
		
?>
    <li class="nav-item mr-1" role="presentation">
	
		<button class="nav-link <?=$subcategory==$r2["id"]?"active":""?> p-0" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><a class="px-2" href="/admin/?page=products&category=<?=$category?>&subcategory=<?=$r2["id"]?>"> <?=$r2["name_ka"]?></a></button>
	
    </li>
<?php
}
?>

  </ul>
	</div>
	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
			<th>Image</th>
			<th>Count</th>
			<th>Id</th>
			<th>დასახელება</th>
			<th>კატეგორია
<select class="form-control p-1 CAT" onchange="location.href='?page=products&key='+$('.SERKEY3').val()+'&volume='+$('.VOLUME').val()+'&category='+$('.CAT').val()">
	<option value="" <?=$CAT==""?"selected":""?> >ყველა</option>
<?php
$q4=mysqli_query($con,"SELECT * FROM sitemap WHERE pid>'2'  AND itemtype=2");
$i=0;
while($r4=mysqli_fetch_array($q4)){
	$i++;
?>
	<option value=<?=$r4["id"]?> <?=$CAT==$r4['id']?"selected":""?> ><?=$i?>. <?=$r4["name_ka"]?> </option>
<?php
}
?>
</select>			
			</th>
			<th>ბრენდი
<select class="form-control p-1 BRAND" onchange="location.href='?page=products&key='+$('.SERKEY3').val()+'&volume='+$('.VOLUME').val()+'&category='+$('.CAT').val()+'&brand='+$('.BRAND').val()">
	<option value="" <?=$brand==""?"selected":""?> >ყველა</option>
<?php
$q4=mysqli_query($con,"SELECT * FROM brands ORDER BY name_ka ASC");
$i=0;
while($r4=mysqli_fetch_array($q4)){
	$i++;
?>
	<option value=<?=$r4["id"]?> <?=$brand==$r4['id']?"selected":""?> ><?=$r4["name_ka"]?> </option>
<?php
}
?>
</select>			
			</th>
			<th>საქონლის კოდი</th>
			<th>რაოდენობა</th>
			<th>შეკვრაში</th>
			<th>დეტალურად</th>
			<th class="d-none">Top გაყიდვადი</th>
			<th>გამოჩნდეს Facebook-ზე</th>
			<th>არქივი</th>
			<th>ტიპი
<select class="form-control p-1 VOLUME" onchange="location.href='?page=products&key='+$('.SERKEY3').val()+'&top='+$(this).val()">
	<option value=0 <?=$top=="0"?"selected":""?> >ყველა</option>
	<option value=1 <?=$top=="1"?"selected":""?> >Top</option>
</select>			
			</th>
			<th>მარაგების სტატუსი	
<select class="form-control p-1 VOLUME" onchange="location.href='?page=products&key='+$('.SERKEY3').val()+'&volume='+$(this).val()">
	<option value="" <?=$volume==""?"selected":""?> >ყველა</option>
	<option value=1 <?=$volume=="1"?"selected":""?> >ხელმისაწვდომია</option>
	<option value=0 <?=$volume=="0"?"selected":""?> >ხელმიუწვდომელია</option>
</select>			
			</th>
			<th>წაშლა</th>
			<th>Select All&nbsp;<br><input class="SELALL" type="checkbox"/> </th>
		  </tr>
		</thead>
		<tbody>
<?php
while($r1=mysqli_fetch_array($q1)){
// var_dump($r1);
?>
		  <tr>
			<th>
				<a target="_blank" href="/ka/product/<?=$r1["slug"]?>">
					<img style="width:61px" src="/img/<?=str_replace(["https://supta.ge/img/","https://new.supta.ge/img/"],"",$r1["image1"])?>" />
				</a>
			</th>
			<th><?=$cou?></th>
			<th><?=$r1["id"]?></th>
			<th><?=$r1["title_ka"]?></th>
			<th><a href="?page=products&key=&volume=&category=<?=$r1["category"]?>"><?=$r1["menu"]?></a></th>
			<th>
			<select class="form-control UPT" d="<?=$r1["id"]?>" n="brand" t="products" >
				<option>აირჩიე ბრენდი</option>
<?php
	       $brn=mysqli_query($con,"SELECT * FROM brands ORDER BY name_ka ASC");
		   while($rbrn=mysqli_fetch_assoc($brn))
		   {
?>				
				<option <?=$r1["brand"]==$rbrn["id"]?"selected":""?> value="<?=$rbrn["id"]?>"><?=$rbrn["name_ka"]?></option>
<?php
		   }
?>				
			</select>			
			</th>
			<th><input class="form-control UPT" n="good_n" t="products" d="<?=$r1["id"]?>" value="<?=$r1["good_n"]?>"/><a class="PROPOP" d="<?=$r1["id"]?>"><div class="ml-1 d-inline btn btn-primary px-1 py-0"><i class=" fa fa-eye"></i></div></a></th>
			<th><?=$r1["volume"]?></th>
			<th><?=$r1["inbatch"]?></th>
			<th><a class="btn btn-primary" href="?page=product&id=<?=$r1["id"]?>">დეტალურად</a></th>
			<th class="d-none"><input class="UPT" n="top" d="<?=$r1["id"]?>" <?=$r1["top"]=="1"?"checked":""?> t="products" type="checkbox"/></th>
			<th><input class="UPT" n="onfacebook" d="<?=$r1["id"]?>" <?=$r1["onfacebook"]=="1"?"checked":""?> t="products" type="checkbox"/></th>
			<th><input class="UPT" n="archive" d="<?=$r1["id"]?>" <?=$r1["archive"]=="1"?"checked":""?> t="products" type="checkbox"/></th>
			<th><input class="UPT" n="top" d="<?=$r1["id"]?>" <?=$r1["top"]=="1"?"checked":""?> t="products" type="checkbox"/></th>
			<th><?=$r1["volume"]>0?'<span class="badge bg-success">ხელმისაწვდომია</span>':'<span class="badge bg-warning">ხელმიუწვდომელია</span>'?></th>
			<th><button class="btn btn-default DGA" d="<?=$r1["id"]?>" n="products"><i class="fa fa-trash text-danger"></i></button></th>
			<th><input class="SUS" type="checkbox" d="<?=$r1["id"]?>"/></th>
		  </tr>
<?php
$cou=$cou-1;
}
?>
		</tbody>
	</table>
	</div>
<?php
$q3=mysqli_query($con,"SELECT * FROM products as t1 WHERE t1.id>0 $WHERE ");
$Total=mysqli_num_rows($q3);
?>
	<div class="col-md-12 MID">
	<div class='row'>
	    <div class='col-md-9'>
	<a href="?page=products&p=1&category=<?=$CAT?>&volume=<?=$volume?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">«</a>
	<a href="?page=products&p=<?=$ACP!=1?($ACP-1):$ACP?>&category=<?=$CAT?>&volume=<?=$volume?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=products&p=<?=$i?>&volume=<?=$volume?>&category=<?=$CAT?>&cid=<?=$cid!=""?$cid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=products&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&category=<?=$CAT?>&volume=<?=$volume?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">›</a>
	<a href="?page=products&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&category=<?=$CAT?>&volume=<?=$volume?>&cid=<?=$cid!=""?$cid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
	<div class='col-md-3'>
	  <h5>სულ <?=$Total ?></h5>
	</div>
	</div>
	</div>
</div>
</div>
<br>