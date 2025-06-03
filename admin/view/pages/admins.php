<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    
$ACP=1;
$p=$_REQUEST["p"]??"1";
$PP=20;
if($p>0){
	$ACP=$p;
}
$fr=($ACP-1)*$PP;
$key=mysqli_real_escape_string($con,$_GET["key"]??"");
if($key!=""){
	$WUS=" AND (pid LIKE '%".$key."%' or companyid LIKE '%".$key."%' or companyname LIKE '%".$key."%' or tel LIKE '%".$key."%' or email LIKE '%".$key."%' or fullname LIKE '%".$key."%') ";
}
 $WHERE="  ";

$q1=mysqli_query($con,"SELECT * FROM roles");
$roles=mysqli_fetch_all($q1,MYSQLI_ASSOC);
// var_dump($roles);

?>
<div class="container-fluid bg-dark ">
<div class="row ">
<div class="col-md-12  rounded bg-dark mp-3 mt-3">
    <h5 class="d-inline-block position-relative m-0 p-1 bg-dark text-white" style="">როლების მართვა</h5>
    <div class="d-flex border mt-3 p-3 rounded roles">
        <div class="btn-group m-1" role="group">
            <button id="del" type="button" class="btn btn-outline-primary text-center px-5 ADDROLE" data-toggle="popover" data-modal="" data-modal-temp="addrole" data-modal-lg="" data-placement="right" title="" data-content="დაამატე როლი მომხმარებელთათვის" data-original-title="ახალი როლი">
                <i class="fa fa-plus"></i>
            </button>
        </div>
<?php
foreach($roles as $role){
?>
                    <div class="btn-group m-1" role="group">
                <button id="1" type="button" class="btn btn-outline-primary text-center px-5 ADDROLE" roleid="<?=$role["id"]?>" data-toggle="popover" data-unique="1" data-modal="" data-modal-temp="editpermission" data-modal-lg="" data-placement="right" title="" data-content="დაარედაქტირე არსებული როლი" data-original-title="როლის რედაქტირება">
                    <span><?=$role["rolename"]?></span>
                    <i class="far fa-edit"></i>
                </button>
            </div>
<?php
}
?>

                        
                </div>
</div>

<div id="adminstable" class="col-md-12 rounded bg-dark mt-3 mb-5">
    <h5 class="d-inline-block position-relative m-0 p-1 bg-dark text-white" style=" ">მომხმარებლები</h5>
    <hr class="mt-0 mb-3">
    <div class="col-md-12 py-1">
        <div class="d-flex">
            <div class="btn-group" role="group">
                <button id="add" type="button" class="btn btn-outline-primary text-center px-5 ADDadmins" data-toggle="popover" data-modal="" data-modal-temp="newadmins" data-placement="right" title="" data-content="დაამატე მომხმარებელი" data-original-title="ახალი მომხმარებელი">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <table class="table table-dark table-borderless table-striped table-hover">
        <thead class="bg-primary text-white">
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">მონაცემები</th>
            <th scope="col">როლი</th>
            <th scope="col">უფლებები</th>
            <th scope="col">აქტიური</th>
            <th scope="col">sms</th>
            <th scope="col">მოქმედება</th>
        </tr>
        </thead>
        <tbody>
<?php
$q3=mysqli_query($con,"SELECT * FROM admins");
$cou=mysqli_num_rows($q3)-($ACP-1)*$PP;
	$qc=mysqli_query($con,"SELECT * FROM admins WHERE id>0 $WHERE ORDER BY id DESC LIMIT $PP OFFSET ".$fr."");
	while($rc=mysqli_fetch_array($qc)){
?>
                <tr>
            <th scope="row"><?=$cou?></th>
            <td>
                <div class="justify-content-center align-middle">
                    <div id="uname">
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?=$rc["firstname"]?> <?=$rc["lastname"]?>" autocomplete="name" readonly="">
                            <div class="input-group-prepend bg-dark">
                                <button id="udet8" uid="<?=$rc["id"]?>" class="btn btn-outline-primary ADDadmins" type="button" data-unique="8" data-toggle="popover" data-modal="" data-modal-temp="editadmins" data-placement="right" title="" data-content="მომხმარებლის მონაცემების რედაქტირება" data-original-title="მონაცემები">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </td>
            <td>
                <div class="justify-content-center align-middle">
                    <div class="roleselect">
                        <div class="input-group">
                            <select class="custom-select UPT"  n="roleids" t="admins" d="<?=$rc["id"]?>" disabled=""> <option="" >არჩევა...</option>
														<?php
															$roleids=explode(",",$rc["roleids"]);
															foreach($roles as $role){
														?>
                                                                <option value="<?=$role["id"]?>" <?=in_array($role["id"],$roleids)?"selected":""?> ><?=$role["rolename"]?></option>								
														<?php
															}
														?>
                                                            </select>
                            <div class="input-group-prepend bg-dark">
                                <button class="btn btn-outline-primary" type="button" data-unique="8" data-toggle="popover" data-placement="right" title="" data-content="მიანიჭე მომხმარებელს როლი" data-lock="" data-original-title="მომხმარებლის როლი">
                                    <i class="fa fa-lock" data-lock=""></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="row justify-content-center align-middle">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary text-center GETPERMS" uid="<?=$rc["id"]?>" aria-current="true" data-unique="8" data-toggle="popover" data-modal-lg="" data-modal="" data-modal-temp="adminspermtb" data-placement="right" title="" data-content="მომხმარებლის უფლებების ცვლილება" data-original-title="უფლებები">
                            <i class="fa fa-shield"></i>
                        </button>
                    </div>
                </div>
            </td>
            <td class="text-center">
                <div class="custom-control custom-checkbox" data-checkbox-child="">
                    <input type="checkbox" data-unique="8" class="custom-control-input UPT" d="<?=$rc["id"]?>" n="status" t="admins" name="status" <?=$rc["status"]=="1"?"checked":""?> id="status8">
                    <label class="custom-control-label" for="status8"></label>
                </div>
            </td>
            <td class="text-center">
                <div class="custom-control custom-checkbox" data-checkbox-child="">
                    <input type="checkbox" data-unique="8" class="custom-control-input UPT" d="<?=$rc["id"]?>" n="sms" t="admins" name="sms" <?=$rc["sms"]=="1"?"checked":""?> id="status8">
                    <label class="custom-control-label" for="status8"></label>
                </div>
            </td>
            <td>
                <div class="row justify-content-center align-middle">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-danger text-center DGA" n="admins" d="<?=$rc["id"]?>" aria-current="true" data-unique="8" data-toggle="popover" data-placement="right" title="" data-content="წაშალე მომხმარებელი" data-original-title="მომხმარებლის წაშლა">
                            <i class="fa fa-trash text-center"></i>
                        </button>
                    </div>
                </div>
            </td>
        </tr>
<?php
		$cou=$cou-1;
	}
?>
             
                </tbody>
    </table>
</div>

<div class="col-md-12 MID TC p-3 pagination">
<a href="?page=admins&p=1" class="PG USR"><i class="fa fa-angle-double-left"></i></a>
<a href="?page=admins&p=<?=$ACP!=1?($ACP-1):$ACP?>" class="PG USR"><i class="fa fa-angle-left"></i></a>
<?php

for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PP);$i++){
	if(($ACP-5)<=$i&&($ACP+5)>=$i){
?>
<a href="?page=admins&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
<?php }
}
?>
<a href="?page=admins&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PP)?($ACP+1):$ACP?>" class="PG USR"><i class="fa fa-angle-right"></i></a>
<a href="?page=admins&p=<?=ceil(mysqli_num_rows($q3)/$PP);?>" class="PG USR"><i class="fa fa-angle-double-right"></i> <?=ceil(mysqli_num_rows($q3)/100);?></a>
</div>	
</div>	
</div>	
<style>
	body {
		background-color: #343a40;
	}
    div.custom-control-right .custom-control-label::before,
    div.custom-control-right .custom-control-label::after{
        right: -1.5rem;
        left: initial;
    }
    .pointer{
        cursor: pointer;
    }
    .input-group .fas:hover{
        color:#fff !important;
    }
    .btn {
        padding: 0.1875em 0.625em !important;
    }
    .list-group-item {
        background-color: #292525 !important;
        color:#fff;
    }

    .list-group-prepend {
        border-color: #007bff!important;
    }

    .col-form-label {
        padding: 0 0.225em !important;
    }
    .col-form-label i:not(.fa-id-card), .showpass i, input {
        min-height: 31px;
    }
	.jconfirm-box{
		padding:0px!important;
	}
	.jconfirm-content-pane{
		padding: 0px!important;
		margin: 0px!important;
		line-height: 0px!important;		
	}
	table th,td{
		vertical-align:middle!important;
		height:30px!important;
	}
.table td, .table th {
    padding: 0.25rem 0.5rem!important;
}
.bootbox.modal{
    z-index: 99999999;
}
</style>
</script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    $(document).ready(function () {
        $(".btn").on("mouseover",function () {
            $('[data-toggle="popover"]').popover({
                trigger: 'hover'
            })
        });
    });
	$(document).on("click",".ADDROLE",function(){
		func2("role",{roleid:$(this).attr("roleid")},function(R){
			$.dialog({
				boxWidth:'34%',
				boxHeight:'95%',
				useBootstrap: false,
				title: false,
				content: R,
			});			
		});
	});
	$(document).on("click",".ADDadmins",function(){
		func2("addadmins",{uid:$(this).attr("uid")},function(R){
			$.dialog({
				boxWidth:'34%',
				boxHeight:'95%',
				useBootstrap: false,
				title: false,
				content: R,
			});			
		});
	});
	$(document).on("click",".GETPERMS",function(){
		func2("getadminsperms",{uid:$(this).attr("uid")},function(R){
			$.dialog({
				boxWidth:'34%',
				boxHeight:'95%',
				useBootstrap: false,
				title: false,
				content: R,
			});			
		});
	});
	$(document).on("click","[data-lock]",function(){
		var elem=$(this).parent().prev();
		var icon=$(this).children();
		icon.toggleClass("fa-lock").toggleClass("fa-lock-open");
		(elem.prop("disabled"))?elem.removeAttr("disabled").focus():elem.attr("disabled",true);
		$(this).on("mousedown",function () {
			elem.off("focusout");
		});
		elem.unbind("change focusout");
	});
</script>