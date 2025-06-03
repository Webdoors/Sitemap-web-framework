<?php
$uid=mysqli_real_escape_string($con,$_POST["uid"]??"");
$q1=mysqli_query($con,"SELECT * FROM admins WHERE id='".$uid."'");
$r1=mysqli_fetch_array($q1);
$q3=mysqli_query($con,"SELECT permid FROM userperms WHERE userid='".$uid."'");
$r3=mysqli_fetch_all($q3,MYSQLI_ASSOC);
$r3=array_column($r3,"permid");
require_once("functions.php");
  // var_dump($r3); 
// var_dump($permed);
?>
<div id="8" uid="8" class="userpermtb bg-dark my-3">
    <div class="modal-header bg-white">
        <h5 class="modal-title text-dark" id="exampleModalLabel"><?=$r1["name"]?> <?=$r1["lastname"]?> უფლებები:</h5>
    </div>
    <table class="table table-dark table-striped table-sm table-hover mt-1">
        <thead class="bg-primary text-white">
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">უფლება</th>
            <th scope="col"></th>
                        </tr>
        </thead>
        <tbody>
<?php
$q2=mysqli_query($con,"SELECT * FROM permissionsnew");
while($r2=mysqli_fetch_array($q2)){
?>
                    <tr class="text-center align-middle">
                <th scope="row"><?=$r2["id"]?></th>
                <th scope="row">

                        <label class="" for="usr<?=$r2["id"]?>"><?=$r2["permname"]?></label>

                </th>
                <th scope="row">

                        <input type="checkbox" name="orders" <?=in_array($r2["id"],$r3)?"checked":""?> class="PERMS" uid="<?=$uid?>" permid="<?=$r2["id"]?>" id="usr<?=$r2["id"]?>">

                </th>
                                </tr>
<?php	
}
?>		

			
                    </tbody>
    </table>
    <div class="modal-footer">
        <button type="button" class="SAVEPERMS btn mx-3 mb-3 btn-primary" uid="<?=$uid?>" data-save="changeurole">შენახვა</button>
    </div>
</div>