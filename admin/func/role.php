<?php
$q1=mysqli_query($con,"SELECT * FROM permissionsnew");
$perms=mysqli_fetch_all($q1,MYSQLI_ASSOC);
 // var_dump($perms);
$roleid=mysqli_real_escape_string($con,$_POST["roleid"]??"");
$q2=mysqli_query($con,"SELECT * FROM roleperms WHERE roleid='".$roleid."'");
// echo "SELECT * FROM roleperms WHERE roleid='".$roleid."'";
$r2=mysqli_fetch_all($q2,MYSQLI_ASSOC);
$q3=mysqli_query($con,"SELECT * FROM roles WHERE id='".$roleid."'");
// echo "SELECT * FROM roleperms WHERE roleid='".$roleid."'";
$r3=mysqli_fetch_array($q3);
$permed=array_column($r2,"permid");
if($roleid=="undefined"){
	$permed=[];
}
// var_dump($permed);
?>
<div class="modal-header">
        <h6 class="modal-title text-dark" id="exampleModalLabel">როლის შექმნა</h5>

    </div>
<div class="col-md-12 bg-dark py-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <label for="rolename" class="col-form-label pointer">
                    <i class="input-group-text fas fa-shield-alt fa-sm text-white"></i>
                </label>
            </div>
            <input type="text" name="rolename" class="form-control ROLENAME" id="rolename" value="<?=$r3["rolename"]??""?>" autocomplete="off" placeholder="როლის დასახელება">
        </div>
    </div>
<table class="table table-dark table-striped table-sm table-hover mb-0">
        <thead class="bg-primary text-white">
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">გვერდი</th>
            <th scope="col"></th>
                    </tr>
        </thead>
        <tbody>
<?php
foreach($perms as $perm){
?>
                <tr class="text-center align-middle">
            <th scope="row"><?=$perm["id"]?></th>
            <th scope="row">
			<label class="" for="<?=$perm["id"]?>"><?=$perm["permname"]?></label>
			</th>
            <th scope="row">
                    <input type="checkbox" <?=in_array($perm["id"],$permed)?"checked":""?> name="orders" class="PERMS" d="<?=$perm["id"]?>" id="<?=$perm["id"]?>">                   
            </th>
                </tr>
<?php
}
?>

             
                </tbody>
    </table>
	<div class="modal-footer">
        <button type="button" class="delete btn btn-danger DGA text-white <?=$roleid=="undefined"?"d-none":""?>" n="roles" d="<?=$roleid?>" data-save="addrole">წაშლა</button>
        <button type="button" class="SAVEROLE btn btn-primary" d="<?=$roleid?>" data-save="addrole">შენახვა</button>
    </div>