<?php
$L=mysqli_real_escape_string($con,isset($_GET["lang"])?$_GET["lang"]:"ka");
include("../lang/main.php");
$inclang['main']=$W; 
	$c=1;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	

include("../lang/".$lnshortarr[$z].".php");
$inclang[$lnshortarr[$z]]=$W; 
}
?>
<div class="col-md-9 mx-auto mt-5 row d-none">
  <table class="t1 table table-striped table-bordered dataTable">
    <thead>
		<tr>
		  <th colspan='1'><input type='text' class='form-control UPTS' name='name' ln='' tp='' placeholder='ენიბის დასახელება' /> </th>
		  <th><input type='text' class='form-control UPTS' ln='' tp='' name='shortname' placeholder='მოკლე დასახელება' /> </th>
		  <th><input type='checkbox' class='form-control UPTS'  tp='int' name='active' /> </th>
		  <th><input type='checkbox' class='form-control UPTS'  tp='int' name='main' /> </th>
		  <th><button class='btn btn-success ADDITEMS' t='languages' d=''>დამატება</button> </th> 
		
		</tr>
		<tr class="text-center">
			<td>ენა</td>
			<td>მოკლე დასახელება</td>
			<td>აქტივაცია</td>
			<td>ძირითადი</td>
			<td>წაშლა</td>
		</tr>

		<?php
		  $enebi=mysqli_query($con,"SELECT * FROM languages  ORDER BY id DESC");
		  while($rowlangs=mysqli_fetch_assoc($enebi))
		  {
			  ?>
		<tr>
		 <td><?=$rowlangs['name'] ?></td>
		 <td><?=$rowlangs['shortname'] ?></td>
		 <td><input type='checkbox' class='form-control UPT' d='<?=$rowlangs['id'] ?>' <?=$rowlangs['active']==1?"checked":"" ?> n='active' t='languages' /></td>
		 <td><input type='checkbox' class='form-control default' d='<?=$rowlangs['id'] ?>' <?=$rowlangs['main']==1?"checked":"" ?> n='main' t='languages' /></td>
		 <td><button class="btn btn-danger DGA" d="<?=$rowlangs['id'] ?>" n='languages'><i class="fa fa-trash text-white"></i></button></td>
		</tr>
			  <?php
		  }
		?>
	</thead>	
  </table>
</div>
<div class="col-md-9 mx-auto mt-5 row">

      <div class="col-sm-10 my-3 p-0">

     <div class='row'>

       

<ul class="nav nav-tabs">
<?php
$flags=["ka"=>"ge","en"=>"gb","ru"=>"ru"];
$q4=mysqli_query($con,"SELECT * FROM languages WHERE active='1'");
while($r4=mysqli_fetch_array($q4)){
?>
  <li class="nav-item me-1">
 <a href="?page=translation&lang=<?=$r4["shortname"]?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=array_key_exists($r4["shortname"],$flags)?$flags[$r4["shortname"]]:$r4["shortname"]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>
    </div>
    </div>


<table class="t1 table table-striped table-bordered dataTable">
	<thead>
		<tr>
		<th colspan="3" class="my-2">
		<input type="hidden" value="users" name="page" />
		<input placeholder="სისტემური სიტყვა" class="form-control py-1 WORD border-success" name="key" />
		</th>
		<th class='d-none'>
	
			<div class="input-append row pl-1 pt-1">
		
			
			<div class="col-md-3 px-0 d-none">
				<input id="YDA2" class="form-control h-100 border" placeholder="Excel Link" type="text" value="">			
			</div>		
			<div class="col-md-2 px-0 d-none"><a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=2&amp;popup=1&amp;field_id=YDA2&amp;relative_url=0')" class="btn  py-1" style="background:blue !important;" type="button">Select</a>		</div>	
			<div class="col-md-1 pl-0 d-none">			
				<a class="btn btn-primary py-1 UPDLANG"><i class="fa fa-upload"></i></a>
			</div>	
			<div class="col-md-2 pl-0 d-none">			
				<a href="?page=lang" class="btn btn-success">Fina-დან <i class="fa fa-sync-alt"></i></a>	
			</div>	
			</div>
		</th>
		<th>

		<a href="func/langexcel.php" class="btn btn-success d-none"><i class="fa fa-file-excel"></i></a>
       <div class="col-md-3">
		<button class="btn btn-success ADDWORD py-1 my-1 float-left">დამატება</button>			
			</div>		

		</th>

		</tr>
		<tr>
			<td>სისტემური სიტყვა</td>
		
			<?php
			
				$c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	   ?>
	   <td class='enebi' colspan='2' d='<?=$c ?>'  style='<?=$langdefaultarr[$z]=="1"?"":"display:none" ?>'>თარგმნა</td>
	   <?php
	   }
	?>
			<td>წაშლა</td>
		</tr>
	</thead>
	<tbody>
<?php
$i=0;
//$en=array_reverse($en);
foreach(array_reverse($inclang['main']) as $key=>$value){
?>
		<tr>
			<td><input class="form-control UPDKEY" value="<?=$key?>" d="<?=$key?>" placeholder="სიტვა"/></td>
			
			
				<?php
			
				$c=0;
	            for($z=0;$z<count($lnarr);$z++)
	            {
	             $c++;
	           ?>
			   <td class='enebi' colspan='2' d='<?=$c ?>'  style='<?=$lnshortarr[$z]==$L?"":"display:none" ?>' ><input class="form-control UPDWORD" style="<?=$inclang[$lnshortarr[$z]][$key]==""?"background: #f443362e;":""?>" value="<?=$inclang[$lnshortarr[$z]][$key] ?>" d="<?=$key?>" lang="<?=$lnshortarr[$z] ?>" placeholder="<?=$lnarr[$z] ?>"/></td>
				<?php 
				}
				?>
			<td><button class="btn btn-danger REMWORD" d="<?=$key?>"><i class="fa fa-trash text-white"></i></button></td>
		</tr>
<?php
$i++;
	}
?>		
	</tfoot>
</table>
</div>