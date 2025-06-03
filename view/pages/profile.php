<input type="hidden"class="HOM"/>
<?php 
if($uid!=""){
	$q1=mysqli_query($con,"SELECT * FROM users WHERE id='".$uid."'");
	$r1=mysqli_fetch_array($q1);
	// var_dump($r1);
?>

<div class="container MTOP BLB mt-5">
<div class="row pt-5 mt-5">
	<div class="col-sm-4" >
		<div class="col-sm-12 col-xs-12 col-md-12">
			<div class="row">
				<div class="col-sm-8 BCT">
					<input class="form-control UPT" d="<?=$r1["id"]??""?>" t="users" n="firstname"  value="<?=$r1["firstname"]??""?>" d="fullname" placeholder="Name"/>
				</div>
				<div class="col-sm-4 BCT">
					<button class="btn w-100 btn-primary LGT">გასვლა</button>
				</div>
			</div>
			<div class="BCT mt-1">
				<input class="form-control UPT" d="<?=$r1["id"]??""?>" t="users" n="lastname" value="<?=$r1["lastname"]??""?>" d="pid" placeholder="Lastname"/>
			</div>
			<div class="BCT mt-1">
				<input class="form-control UPT" d="<?=$r1["id"]??""?>" t="users" n="personalid" value="<?=$r1["id"]??""?>" d="pid" placeholder="Personal Id"/>
			</div>
			<div class="BCT mt-1">
				<input class="form-control UPT" d="<?=$r1["id"]??""?>" t="users" n="email" value="<?=$r1["email"]??""?>" d="email" placeholder="Email"/>
			</div>
			<div class="BCT mt-1">
				<input class="form-control UPT" d="<?=$r1["id"]??""?>" t="users" n="tel" value="<?=$r1["tel"]??""?>" d="tel" placeholder="Tel"/>
			</div>
			<div class="BCT mt-1">
				<input class="form-control UPT" d="<?=$r1["id"]??""?>" t="users" n="pass" value="<?=$r1["pass"]??""?>" name="password" type="password" d="pass" placeholder="PASSWORD"/>
			</div>
			<div class="BCT mt-1">
				<select class="form-control lpt" d="country" l="<?=$L ?>" placeholder="Country">
<?php
$q10=mysqli_query($con,"SELECT * FROM country");
while($r10=mysqli_fetch_array($q10)){
?>	
<option <?=$r1["country"]==$r10["id"]?"selected":""?> value="<?=$r10["id"]??""?>" ><?=$r10["name"]??""?></option>
<?php
}
?>				
				</select>
			</div>
			<div class="BCT mt-1">
				<select class="form-control UPT <?=$ru['usercountry']=="GEORGIA"?"":"d-none"?>" d="<?=$r1["id"]??""?>"  t="users" n="city"   d="city" placeholder="Country">
           <?php
             $q10=mysqli_query($con,"SELECT * FROM city");
           while($r10=mysqli_fetch_array($q10)){
              ?>	
          <option <?=$r1["city"]==$r10["id"]?"selected":""?> value="<?=$r10["id"]??""?>" ><?=$r10["name"]??""?></option>
        <?php
}
?>				</select>
			</div>
			<div class="BCT mt-1">
				<input class="form-control lpt" value="<?=$r1["shippingaddress1"]??""?>" d="shippingaddress1" placeholder="Shipping Address 1"/>
			</div>
			<div class="BCT mt-1">
				<input class="form-control lpt" value="<?=$r1["shippingaddress2"]??""?>" d="shippingaddress2" placeholder="Shipping Address 2"/>
			</div>
			<div class="BCT mt-1">
				<input class="form-control lpt" value="<?=$r1["zip"]??""?>" d="zip" placeholder="Zip Code"/>
			</div>
		</div>
		<div class="col-sm-12 col-xs-12 col-md-12 mt-3">
		 <h5>პაროლის შეცვლა</h5>
		 <div class='my-2'>
		  <div class="BCT mt-1">
		    <input class='form-control OLDPASSWORD' type='password' placeholder='ძველი პაროლი'>
		  </div>
          <div class="BCT mt-1">		  
		    <input class='form-control PASSWORD INP' name='password' type='password' placeholder='ახალი პაროლი'>
		  </div>	
		  <div class="BCT mt-1">
		    <input class='form-control REPASSWORD INP' name='password' type='password' placeholder='გაიმორეთ ახალი პაროლი'>
		  </div>	
		
		      <button class='btn btn-primary my-2 NEWPASS'>save</button>
		 </div>
		</div>
		
		
	</div>
	<div class="col-sm-8" >
		<table class="t1 table table-striped table-bordered dataTable WTE">
			<tr>
				<th>Order Date</th>
				<th>Order id</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Details</th>
				<th>INVOICE</th>
			</tr>
<?php
$q1=mysqli_query($con,"SELECT * FROM orders WHERE uid='".$uid."' ORDER BY id DESC");
while($r1=mysqli_fetch_array($q1)){
?>
			<tr>
				<td><?=date("d-m-Y H:i:s",$r1["date"])?></td>
				<td><?=$r1["id"]??""?></td>
				<td><?=$r1["total"]??""?> &#8382;</td>
				<td><?=$r1["status"]==0?"filed":($r1["status"]==1?"ongoing":"finished")?></td>
				<td><a class="GIT CP" d="<?=$r1["id"]??""?>">Details<a/></td>		
				<td><a class="btn btn-primary" href="/func/invoice.php?invoice=<?=date("YmdHi",$r1["date"]).$r1['uid']??""?>&id=<?=$r1['id'] ?>">PDF Invoice</a></td>	
			</tr>
<?php
}
?>
		</table>
	</div>
</div>
	<div class="col-md-12 BLB">			
	<br>&nbsp;											
	</div>	
	<div class="col-md-12 BLB">			
	<br>&nbsp;											
	</div>	
	<div class="col-md-12 BLB">			
	<br>&nbsp;											
	</div>
</div>
<?php
}
?>