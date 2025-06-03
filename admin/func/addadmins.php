<?php
if(isset($_SESSION['GuserID'])){
$uid=mysqli_real_escape_string($con,$_POST["uid"]??"");
$q1=mysqli_query($con,"SELECT * FROM admins WHERE id='".$uid."'");
$r1=mysqli_fetch_array($q1);
require_once("functions.php");
 // var_dump($r1); 
// var_dump($permed);
?>
<div id="newuser" class="bg-dark">
    <div class="modal-header bg-white">
        <h5 class="modal-title text-dark mt-3">ახალი მომხმარებელი</h5>
 
    </div>
    <div class="modal-body">
        <form class="container-fluid my-3" autocomplete="off">
            <div class="form-group">
                <div class="input-group mb-2">
                    <div class="input-group-prepend bg-dark">
                       <!-- <label for="username" class="col-form-label pointer">
                            <i class="input-group-text fas fa-user fa-sm text-white"></i>
                        </label>-->
                    </div>
                    <input type="text" name="username" class="form-control EMAIL" id="username" placeholder="მომხმარებელი" value="<?=$r1["email"]??""?>">
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend bg-dark">
                        <!--<label for="name" class="input-group-text col-form-label pointer">
                            <i class="far fa-id-card fa-sm text-white"></i>
                        </label>-->
                    </div>
                    <input type="text" name="firstname" class="form-control FIRSTNAME" id="name" autocomplete="off" placeholder="სახელი" value="<?=$r1["firstname"]??""?>">
                    <input type="text" name="lastname" class="form-control LASTNAME" id="last-name" autocomplete="off" placeholder="გვარი" value="<?=$r1["lastname"]??""?>">
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend bg-dark">
                       <!-- <label for="password" class="col-form-label pointer">
                            <i class="input-group-text fas fa-asterisk fa-sm text-white"></i>
                        </label>-->
                    </div>
                    <input type="password" name="password" class="form-control PASSWORD" id="password" placeholder="პაროლი" value="<?=encrypt_decrypt("decrypt",$r1["password"]??"")?>" autocomplete="current-password">
                    <div class="showpass bg-dark pointer" style="line-height: 1;">
                        <i class="input-group-text bg-dark py-3 ms-1 fas fa-eye fa-sm text-white"></i>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend bg-dark">
                        <label for="mobile" class="col-form-label pointer">
                            <i class="input-group-text bg-dark py-3 fas fa-mobile-alt fa-sm text-white"></i>
                        </label>
                    </div>
                    <input type="text" name="mobile" class="form-control TEL" id="mobile" placeholder="მობილური" value="<?=$r1["tel"]??""?>" >
                </div>

                <div class="list-group mb-2 mt-5">
                    <div class="list-group-prepend border text-center">
                        <i class="fas fa-user-shield fa-2x text-info d-inline-block position-relative bg-dark p-1" style="bottom:25px; line-height: 1;"></i>
                    </div>
   <select class="form-control form-select ROLE">
 	<option>აირჩიეთ როლი</option>
<?php
$q3=mysqli_query($con,"SELECT * FROM roles ");
// echo "SELECT * FROM roleperms WHERE roleid='".$roleid."'";
$roleids=explode(",",$r1["roleids"]);
while($r3=mysqli_fetch_array($q3)){
?>
	<option value="<?=$r3["id"]?>" <?=in_array($r3["id"],$roleids)?"selected":""?> ><?=$r3["rolename"]?></option>
<?php
}
?>
   </select>
                                    </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="SAVEUSER btn btn-primary" uid="<?=$uid?>" data-save="">შენახვა</button>
    </div>
</div>
<?php
}
?>