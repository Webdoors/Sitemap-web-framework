<?php
if(isset($_SESSION['GuserID'])){
$uid=mysqli_real_escape_string($con,$_GET["uid"]??"");
$q1=mysqli_query($con,"SELECT * FROM id WHERE id='".$uid."'");
$r1=mysqli_fetch_array($q1);
?>
<style>
.navbar{display:none;}
.tb td{
 padding: 4px!important;
}
</style>
<div class="col-md-12 ">
<form class="register m-0">
  <div class="text-center w-100 mb-3">
    <h4>
<?=$r1["personal_id"]!=""?"ფიზიკური პირი":"იურიდიული პირი"?>
  </h4>
  </div>
		  <div class="row justify-content-center my-2 mx-0 px-3">
        <div class="col-sm-6 col-12">
          <span>სახელი</span>
          <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="name" name="სახელი" placeholder="თქვენი სახელი" value="<?=$r1["name"]?>">
        </div>
        <div class="col-sm-6 col-12">
          <span>გვარი</span>
          <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="lastname" name="გვარი" placeholder="თქვენი გვარი" value="<?=$r1["lastname"]?>">
        </div>
		  

      <div class="my-2 <?=$r1["usertype"]=="2"?"d-none":""?>">

      <span>პ/ნ</span>
      <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="personal_id"   autocomplete="new" name="პ/ნ" value="<?=$r1["personal_id"]?>" placeholder="თქვენი საიდენტიფიკაციო">
    </div>
        <div class="col-sm-6 col-12">

      <span>მომხმარებლის ტიპი</span>
		<select  class="form-control UPTNO"  t="id" d="<?=$uid?>" n="usertype" >
			<option <?=$r1["usertype"]=="1"?"selected":""?> value="1">ფიზიკური პირი</option>
			<option <?=$r1["usertype"]=="2"?"selected":""?> value="2">იურიდიული პირი</option>
		</select>
    </div>
        <div class="col-sm-6 col-12  <?=$r1["usertype"]=="1"?"d-none":""?>">

      <span>საიდენტიფიკაციო</span>
      <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="company_id"   autocomplete="new" name="საიდენტიფიკაციო" value="<?=$r1["company_id"]?>" placeholder="თქვენი საიდენტიფიკაციო">
    </div>
      <div class="my-2 <?=$r1["usertype"]=="1"?"d-none":""?>">

      <span>კომპანიის დასახელება</span>
      <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="company_name"   autocomplete="new" name="კომპანიის დასახელება" value="<?=$r1["company_name"]?>" placeholder="კომპანიის დასახელება">
    </div>


      <div class="col-sm-6 col-12">
        <span>ელფოსტა</span>
        <input type="text" class="form-control UPTNO" t="id" d="<?=$uid?>" n="email" autocomplete="new-password" name="ელფოსტა" value="<?=$r1["email"]?>" placeholder="თქვენი ელფოსტა">
      </div>
      <div class="col-sm-6 col-12">
        <span>მობილურის ნომერი</span>
        <input type="text"  class="form-control UPTNO" t="id" d="<?=$uid?>" n="mobile_phone" name="მობილური" value="<?=$r1["mobile_phone"]?>" placeholder="თქვენი მობილურის ნომერი">
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
      <div class="my-0">
		<div class='row'>
		<div class='col-sm-12 mt-0 my-2'>
			<a class="btn btn-success SAVESET">დამახსოვრება</a>
		</div>	
		</div>	
    </div>
    </div>


		</form>
	</div>
<?php
}
?>