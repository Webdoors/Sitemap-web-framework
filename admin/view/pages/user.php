<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
//require('../../config.php');
$p=isset($_REQUEST["p"])?$_REQUEST["p"]:0;
$ACP=1;
$T=time();
if($p>0){
	$ACP=$p;
}
$PA=20;
$fr=($ACP-1)*$PA;
$uid=mysqli_real_escape_string($con,$_GET["uid"]??"");
if($uid==""){
		$ina=mysqli_query($con,"INSERT INTO id SET date='$T' ");
		$a=mysqli_insert_id($con);
?>
<script>location.href="/admin/?page=user&uid=<?=$a?>";</script>
<?php
}
$category=mysqli_real_escape_string($con,$_GET["category"]??"");
$q1=mysqli_query($con,"SELECT * FROM id WHERE id='".$uid."'");
$r1=mysqli_fetch_array($q1);
?>
<style media="screen">
  .round{
    border-radius: 25px;
    background: white;
    width: 100%;
    height: auto;
    padding: 30px;
  }
</style>
<div class="col-md-11 col12 row mx-auto mb-5">
  <div class="text-center w-100 my-5">
    <h2>
    პირადი კაბინეტი
  </h2>
  </div>

<div class="col-md-4 col-12 ">
<form class="register m-0">
  <div class="text-center w-100 mb-3">
    <h4>
<?=$r1["personal_id"]!=""?"ფიზიკური პირი":"იურიდიული პირი"?>
  </h4>
  </div>
		  <div class="row justify-content-center my-2">
        <div class="col-md-6 col-12">
          <span>სახელი</span>
          <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="name" name="სახელი" placeholder="თქვენი სახელი" value="<?=$r1["name"]?>">
        </div>
        <div class="col-md-6 col-12">
          <span>გვარი</span>
          <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="lastname" name="გვარი" placeholder="თქვენი გვარი" value="<?=$r1["lastname"]?>">
        </div>
		  </div>

      <div class="my-2 <?=$r1["usertype"]=="2"?"d-none":""?>">

      <span>პ/ნ</span>
      <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="personal_id"   autocomplete="new" name="პ/ნ" value="<?=$r1["personal_id"]?>" placeholder="თქვენი საიდენტიფიკაციო">
    </div>
      <div class="my-2 ">

      <span>მომხმარებლის ტიპი</span>
		<select  class="form-control UPTNO"  t="id" d="<?=$uid?>" n="usertype" >
			<option <?=$r1["usertype"]=="1"?"selected":""?> value="1">ფიზიკური პირი</option>
			<option <?=$r1["usertype"]=="2"?"selected":""?> value="2">იურიდიული პირი</option>
		</select>
    </div>
      <div class="my-2 <?=$r1["usertype"]=="1"?"d-none":""?>">

      <span>კომპანიის დასახელება</span>
      <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="company_name"   autocomplete="new" name="კომპანიის დასახელება" value="<?=$r1["company_name"]?>" placeholder="კომპანიის დასახელება">
    </div>
      <div class="my-2 <?=$r1["usertype"]=="1"?"d-none":""?>">

      <span>საიდენტიფიკაციო</span>
      <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="company_id"   autocomplete="new" name="საიდენტიფიკაციო" value="<?=$r1["company_id"]?>" placeholder="თქვენი საიდენტიფიკაციო">
    </div>
      <div class="row my-2">
      <div class="col-md-6 col-12">
        <span>ელფოსტა</span>
        <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="email" autocomplete="new-password" name="ელფოსტა" value="<?=$r1["email"]?>" placeholder="თქვენი ელფოსტა">
      </div>
      <div class="col-md-6 col-12">
        <span>მობილურის ნომერი</span>
        <input type="text"  class="form-control UPTNO" t="id" d="<?=$uid?>" n="mobile_phone" name="მობილური" value="<?=$r1["mobile_phone"]?>" placeholder="თქვენი მობილურის ნომერი">
      </div>
      </div>

      <div class="my-2">

      <span>ფაქტიური მისამართი</span>
      <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="current_address"  autocomplete="new-password" value="<?=$r1["current_address"]?>" name="ფაქტიური მისამართი" placeholder="თქვენი ფაქტიური მისამართი">
    </div>
      <div class="my-2">
	  <span>საფასო კატეგორია</span>
      <select name="price_group" class="UPTNO form-control w-50" d="<?=$uid?>" t="id" n="price_group">
        <?php
$q2=mysqli_query($con,"SELECT * FROM filters ");
while($r2=mysqli_fetch_array($q2)){
?>
	<option value="<?=$r2["id"]?>" <?=$r2["id"]==$r1["price_group"]?"selected":""?> ><?=$r2["title_ka"]?></option>
<?php
}
        ?>
      </select>
    </div>
      <div class="my-2 mb-3">
	  <span>უფასო მიწოდება (50-100ლარამდე)</span>
      <input type="checkbox" class="UPTNO " <?=$r1["freeship"]==1?"checked":""?> d="<?=$uid?>" t="id" n="freeship" />
    </div>
      <div class="my-0">
		<div class='row'>
		<div class='col-sm-12 mt-0 my-2'>
			<a class="btn btn-success SAVESET">დამახსოვრება</a>
		</div>	
		</div>	
    </div>


		</form>
</div>
<div class="col-md-8 col-12">
  <div class="">
    <div class="text-center w-100 mb-3">
<ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
	<li class="nav-item mr-1" role="presentation">
		
			<button class="nav-link <?=$category=="orders"||$category==""?"active":""?> p-0" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><a class="px-2" href="/admin/?page=user&uid=<?=$uid?>&category=orders"> შესყიდვები</a></button>
		
	</li>

    <li class="nav-item mr-1" role="presentation">
	
		<button class="nav-link <?=$category=="prices"?"active":""?> p-0" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><a class="px-2" href="/admin/?page=user&uid=<?=$uid?>&category=prices"> ფასები</a></button>
	
    </li>


  </ul>
 
    </div>
  <table class="table table-hover table-striped table-bordered <?=$category=="orders"||$category==""?"":"d-none"?>">
    <thead class="hdr ">
      <tr>
        <th scope="col">შეკვეთის თარიღი</th>
        <th scope="col">გადახდის თარიღი</th>
        <th scope="coli class="fa fa-search"></i></th>
        <th scope="col">რაოდ.</th>
        <th scope="col">ფასი</th>
        <th scope="col">სტატუსი</th>
        <th scope="col">ინვოისი</th>
      </tr>
    </thead>
    <tbody>
<?php
$q2 = mysqli_query($con," SELECT t1.*,t2.name as 'stat',(SELECT date FROM basket as t3 WHERE t3.u_group=t1.invoice LIMIT 1) as 'odate' FROM orders as t1
LEFT JOIN status as t2 ON(t1.status=t2.id)
WHERE t1.uid='".$uid."' AND t1.status>=3 ORDER by id DESC LIMIT ".$PA." OFFSET ".$fr."");		
$q100 = mysqli_query($con," SELECT t1.*,t2.name as 'stat',(SELECT date FROM basket as t3 WHERE t3.u_group=t1.invoice LIMIT 1) as 'odate' FROM orders as t1
LEFT JOIN status as t2 ON(t1.status=t2.id)
WHERE t1.uid='".$uid."' AND t1.status>=3 ");	
$tot=0;	
$tot2=0;	
while($r2=mysqli_fetch_array($q2)){
	if($r2["stat"]=="Shipped"){
		$tot=$tot+$r2["amount"];
		$tot2=$tot2+1;
	}
      echo '<tr>
        <th scope="row">'.date("d.m.Y H:i",$r2["date"]).'</th>
        <th>'.($r2["paydate"]?date("d.m.Y H:i",$r2["paydate"]):"").'</th>
        <th><small d="'.($r2["id"]).'" class="GETDET btn btn-outline-primary label CP"><i class="fa fa-search"></i></small></th>
        <td>'.$r2["qty"].'</td>
        <td>'.number_format($r2["amount"],2).'₾</td>
        <td>'.$r2["stat"].'</td>
        <td><a target="_blank" href="https://supta.ge/func/excel.php?id='.$r2["id"].'">გადმოწერა</a></td>
      </tr>';
}

?>
      <tr>
        <th scope="col" colspan="2">
<?php

$Total=mysqli_num_rows($q100);
?>
	<div class="col-md-12 MID">
	<div class='row'>
	    <div class='col-md-9'>
	<a href="?page=user&p=1&uid=<?=$uid!=""?$uid:""?>" class="PG USR">«</a>
	<a href="?page=user&p=<?=$ACP!=1?($ACP-1):$ACP?>&uid=<?=$uid!=""?$uid:""?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q2)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=user&p=<?=$i?>&uid=<?=$uid!=""?$uid:""?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=user&p=<?=$ACP!=ceil(mysqli_num_rows($q2)/$PA)?($ACP+1):$ACP?>&uid=<?=$uid!=""?$uid:""?>" class="PG USR">›</a>
	<a href="?page=user&p=<?=ceil(mysqli_num_rows($q2)/$PA);?>&uid=<?=$uid!=""?$uid:""?>" class="PG USR">» <?=ceil(mysqli_num_rows($q2)/$PA);?></a>
	</div>

	</div>
	</div>		
		</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">შეკვეთების რ-ბა <?=$tot2 ?></th>
        <th scope="col">სულ გადახდილი <?=$tot ?>₾</th>
      </tr>
    </tbody>
  </table>
  <table class="table table-hover table-striped table-bordered <?=$category=="prices"?"":"d-none"?>">
    <thead class="hdr ">
      <tr>
        <th scope="col">კოდი</th>
        <th scope="col">პროდუქტი</th>
        <th scope="col">ფასი</th>
        <th scope="col">
		<input type="hidden" class="ITEM" t="specprices"  n="uid" value="<?=$uid?>" />
		<button class="btn btn-success ADDITEM"><i class="fa fa-plus"></i></button></th>
      </tr>
    </thead>
    <tbody>
<?php
$q2 = mysqli_query($con," SELECT t1.*,(SELECT t2.title_ka FROM products as t2 WHERE t1.code=t2.good_n LIMIT 1) as 'product' FROM specprices as t1 WHERE t1.uid='".$uid."'");		
	
while($r2=mysqli_fetch_array($q2)){

      echo '<tr>
        <th scope="row"><input class="UPT" t="specprices" n="code" d="'.$r2["id"].'" value="'.$r2["code"].'"/></th>
        <th>'.$r2["product"].'</th>
        <td><input class="UPT" t="specprices" n="price" d="'.$r2["id"].'" value="'.$r2["price"].'"/></td>
        <td><button class="btn btn-danger DGA" d="'.$r2["id"].' " n="specprices"><i class="fa fa-trash"></i></button></td>
      </tr>';
}

?>
    </tbody>
  </table>

</div>
</div>
</div>
