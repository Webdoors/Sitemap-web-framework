<?php
$token=mysqli_real_escape_string($con,$_GET["token"]);
?>
  <div class="bg">
		<div class="container">
		  <div class="d-flex justify-content-center faded py-5">
		    <div id="formc" class="formc">
				<input class="PART1" type="hidden" value="<?=$p1?>"/>
		      <div class="d-flex justify-content-end">
		  <div class="otr text-left position-relative">
		<div class="lang-t">
		   <a href="?page=recovery&lang=en&token=<?=$token?>" class="labels label-en" data-lang="en"></a>
		    <div class="lngsw <?=$lang=="ge"?"on":""?>"></div>
		    <a href="?page=recovery&lang=ge&token=<?=$token?>" class="labels label-ge" data-lang="ge"></a>
		</div>
		</div>
		</div>
		<h2 class="LAB mb-4 mt-5 text-center">change password</h2>
      <div class="col-xl-12 col-lg-12   pt-2 fadeIn first">
      </div>
      <form class="inp REG1 justify-content-center">
        <input type="password" class="form-control fadeIn second A1 PA1 INP TTIP mb-2 d-flex mx-auto" title="Fill in password (minimum 8 characters, 1 uppercase letter, 1 lowercase letter, 1 digit)" name="password" placeholder="new password">
        <input class="form-control fadeIn third A2 PA2 TTIP d-flex mx-auto INP" name="password" title="Fill in password (minimum 8 characters, 1 uppercase letter, 1 lowercase letter, 1 digit)" type="password" placeholder="repeat password">
          <input type="hidden" value="<?=$token?>" class="TOKEN" />
        <div class="col-xl-12 col-lg-12 col-md-12 text-md-center shi">
      </div>
        <input type="button" class="fadeIn fourth SIN3 mt-2 d-flex mx-auto" value="Change Password">
      </form>
    </div>
  </div>
</div>
</div>

<?php
// }
?>