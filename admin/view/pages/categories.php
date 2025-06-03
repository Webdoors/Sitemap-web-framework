<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$ACP=1;
if(isset($_REQUEST["p"])){
	$ACP=$_REQUEST["p"];
}

$WSE='';
$active=isset($_REQUEST["active"])&&$_REQUEST["active"]!=''?(int)$_REQUEST["active"]:'';
$category=isset($_REQUEST["category"])?(int)$_REQUEST["category"]:0;
$type=isset($_REQUEST["type"])?(int)$_REQUEST["type"]:0;
$qcat="";


if($category!=''&&$category!=0)
{
	$qcat="AND (t1.id='$category' OR (t1.pid='$category' OR t1.pid='$category' )) ";
	$WSE.=$qcat;
}
if($type!=''&&$type!=0)
{
	
	$qtype=" AND t1.type='$type' ";
	$WSE.=$qtype;
}
if($active!='')
{
	
	$qactive=" AND t1.active='$active' ";
	$WSE.=$qactive;
}
$PA=30;
$fr=($ACP-1)*$PA;
	$noblg='';
				$blg=mysqli_query($con,"SELECT id FROM categories WHERE type='4'");
				if(mysqli_num_rows($blg)>0)
				{
					$noblg=" AND name <> 'blog'";
					//$noblg1=" WHERE name <> 'blog'";
				}
$q3=mysqli_query($con,"SELECT * FROM ctypes ");
$ctypes=mysqli_fetch_all($q3,MYSQLI_ASSOC);

?>
<style>
.table .form-control{
	font-size:11px;
	padding:4px;
}
</style>
<div class='container-fluid'>

 <div class="col-sm-12 my-3 p-0 row">


		<?php
	$c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
	
	<div class='col-sm-1' >

	    <button class='btn <?=$langdefaultarr[$z]=='1'?"btn-success":"btn-danger" ?> ltab' d='<?=$c ?>' >  <?=$lnarr[$z] ?></button>
	  
	</div>
	   <?php
	   }
	   ?>

   </div>


<div class="col-md-12 p-0 H mt-2 my-2">







	<div class="col-md-12 LIS H bgbox itmcontainer" t="categories" norep="name" conf='' message='კატეგორია უკვე არსებობს!' d='' slug='1' >
		
	<?php
	$c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
		<div class="D2" style="width:280px;"><input placeholder="კატეგორიის დასახელება <?=$lnshortarr[$z]?>" class="UPTS form-control"   tp='' ln='<?=$lnshortarr[$z]?>' name='name'/></div>
		<div class="D2" style="width:280px; display:none"><input placeholder="კატეგორიის დასახელება" class="UPTS form-control"   tp='' ln='<?=$lnshortarr[$z]?>' name='description'/></div>
		<div class="D2" style="width:280px; display:none"><input placeholder="კატეგორიის დასახელება" class="UPTS form-control"   tp='' ln='<?=$lnshortarr[$z]?>' name='keywords'/></div>
			
	<?php
	   }
	   ?>	

		<div class="D2" style="width:280px">
		      <select class='form-control UPTS' name='type' ln='' tp='int' >
			    <option value='0'>აირჩიეთ ტიპი</option>
				<?php
			
				  $ctp=mysqli_query($con,"SELECT * FROM ctypes WHERE name<>'products' $noblg ORDER BY id DESC");
				  while($rctp=mysqli_fetch_assoc($ctp))
				  {
					  ?>
					  <option value='<?=$rctp['id'] ?>'> <?=$rctp['name'] ?></option>
					  <?php
				  }
				?>
			  </select>
		
		</div>
		<div class="D6" style="width:180px"><button class="ADDITEMS btn btn-primary" slug='name/en' msg='დამატებულია' sitemap='2' pagename='category' wr='1'  t='categories' d=''> დამატება</button></div>
	</div>
    
	
	
   <div class="col-sm-12 my-3 p-0 row d-none">

		<?php
		/*
	$c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
	
	<div class='col-sm-1' >

	    <button class='btn <?=$langdefaultarr[$z]=='1'?"btn-success":"btn-danger" ?> ltab' d='<?=$c ?>' >  <?=$lnarr[$z] ?></button>
	  
	</div>
	   <?php
	   } */
	   ?>

   </div>	
	
	
<div class="col-md-12 bg-light px-0 pb-2 mt-2">

<table id="table-ajax-defer" class="table table-condensed table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
              
					<?php			   
                   $c=0;
	               for($z=0;$z<count($lnarr);$z++)
	              {
	               $c++;
	              ?>
				  <th d='<?=$c ?>' class='enebi' style="width:200px;  <?=$langdefaultarr[$z]=='1'?"":"display:none" ?> ">კატეგორია <?=$lnshortarr[$z] ?></th>
				  <?php
				  }
				  ?>
				<th style="width:120px" class="d-none">Slug</th>
				<th class="d-none">მშობელი კატეგორია
				  <select class="form-control CATE" onchange="location.href='?page=categories&category='+$('.CATE').val()+'&type='+$('.tp').val()+'&active='+$('.ACTIVE').val();" >
				   <option value='0'>ყველა კატეგორია </option>
						<?php
                  $ct=mysqli_query($con,"SELECT t1.*, ". languages('categories','t1.id','name') ." FROM categories AS t1 WHERE  (t1.pid=0 OR  t1.id IN (SELECT pid FROM categories)) ORDER BY t1.id DESC");
				  while($rct=mysqli_fetch_assoc($ct))
				  {
		?>		   
				   <option <?=$category==$rct['id']?"selected":"" ?> value='<?=$rct['id'] ?>' ><?=$rct["name".$lngdefname] ?></option>
				   
		 <?php
				  }
         ?>				  
				</select>
				</th>
					<?php			   
                   $c=0;
	               for($z=0;$z<count($lnarr);$z++)
	              {
	               $c++;
	              ?>
				<th d='<?=$c ?>' style="<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> " class='enebi' >keywords <?=$lnshortarr[$z] ?></th>
				<th d='<?=$c ?>' style="width:200px;  <?=$langdefaultarr[$z]=='1'?"":"display:none" ?> " class='enebi'> description <?=$lnshortarr[$z] ?></th>
				<?php
				  }
				  ?>
				<th>ტიპი
				  <select class='form-control tp'  onchange="location.href='?page=categories&category='+$('.CATE').val()+'&type='+$('.tp').val()+'&active='+$('.ACTIVE').val();" >
				   <option value='0'>ყველა ტიპი</option>
				   
		        <?php
                  $tp=mysqli_query($con,"SELECT * FROM ctypes ORDER BY id DESC");
				  while($rtp=mysqli_fetch_assoc($tp))
				  {
		      ?>			  
				   <option <?=$type==$rtp['id']?"selected":"" ?> value='<?=$rtp['id'] ?>' ><?=$rtp["name"] ?></option>
		       <?php
				  }
		         ?>		   
				</select>
				</th>
				<th>პოზ.</th>
				<th style="width:120px">სურათი</th>
				<th style="width:120px">ბანერი</th>
				<th><i class="fa fa-filter"></i></th>
				<th>აქტიური
					      <select class='form-control ACTIVE'  onchange="location.href='?page=categories&category='+$('.CATE').val()+'&type='+$('.tp').val()+'&active='+$('.ACTIVE').val();" >
				   <option value=''>ყველა</option>
				   
		<?php
                
		?>			  
				   <option <?=$active==0?"selected":"" ?> value='0' >არააქტიური</option>
				   <option <?=$active==1?"selected":"" ?> value='1' >აქტიური</option>
		<?php
				  
		?>		   
				</select>
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
<?php
$i=0;
$q2=mysqli_query($con,"SELECT t1.*,(SELECT t2.columnValue FROM langs as t2 WHERE t2.tableId=t1.pid and t2.tableName='categories' AND t2.shortname='en' LIMIT 1) as 'parenten',(SELECT t2.columnValue FROM langs as t2 WHERE t2.tableId=t1.pid and t2.tableName='categories' AND t2.shortname='geo'  LIMIT 1) as 'parentka', (SELECT name FROM ctypes WHERE id=t1.type)  AS ctype, 
   ". languages('categories','t1.id','name') .",
   ". languages('categories','t1.id','description') .",

   ". languages('categories','t1.id','keywords') ."

 FROM categories AS t1 WHERE t1.id<>0 $WSE ORDER BY t1.position ASC LIMIT ".$PA." OFFSET ".$fr."");
 


//line 166 query moved here
			while($r2=mysqli_fetch_array($q2)){
				$i++;
$stm=mysqli_prepare($con,"SELECT t1.*, ". languages('categories','t1.id','name') ." FROM categories AS t1 WHERE t1.type=(SELECT id FROM ctypes WHERE name=?) AND t1.id!=?  ORDER BY t1.name ASC ");

	
				
			$a=mysqli_query($con,"SELECT * FROM langs WHERE tableId='".$r2['id']."' and tableName='categories' AND shortname='en' ");
			
				if(mysqli_num_rows($a)<1)
				{
					 $ra=mysqli_fetch_assoc($a);
				mysqli_query($con,"INSERT INTO langs SET tableId='".$r2['id']."', tableName='categories', shortname='ka', tableColumn='description' ");
				 mysqli_query($con,"INSERT INTO langs SET tableId='".$r2['id']."', tableName='categories', shortname='en', tableColumn='description' ");
				mysqli_query($con,"INSERT INTO langs SET tableId='".$r2['id']."', tableName='categories', shortname='ka', tableColumn='keywords' ");
				 mysqli_query($con,"INSERT INTO langs SET tableId='".$r2['id']."', tableName='categories', shortname='en', tableColumn='keywords' ");
			
				mysqli_query($con,"INSERT INTO langs SET tableId='".$r2['id']."', tableName='categories', shortname='ka', tableColumn='name' ");
				 mysqli_query($con,"INSERT INTO langs SET tableId='".$r2['id']."', tableName='categories', shortname='en', tableColumn='name' ");
				}
			
			
?>

			<tr>


				<?php			   
                   $c=0;
	               for($z=0;$z<count($lnarr);$z++)
	              {
	               $c++;
	              ?>
		   <th class='enebi' d='<?=$c ?>'  style="width:200px;  <?=$langdefaultarr[$z]=='1'?"":"display:none" ?> "><input class="form-control UPT"  d="<?=$r2["id"]?>" t="categories" n="name" ln='<?=$lnshortarr[$z] ?>' value="<?=$r2["name".$lnshortarr[$z]]?> "/></th>
			     <?php
			     }
				 $j=0;
			     ?>

				<th class="d-none"><input style="width:120px"  class="form-control UPT" d="<?=$r2["id"]?>" t="categories" n="slug" value="<?=$r2["slug"]?>"/></th>
				<th style="width:150px" class="d-none">
<?php
if($r2["type"]!=1){
?>
				<select class="form-control UPT3"   <?=$r2['type']==4?"disabled":""?>   d="<?=$r2["id"]?>" t="categories" n="pid">
				<option value="0">აირჩიეთ კატეგორია </option>
<?php
//$q3=mysqli_query($con,"SELECT t1.*, ". languages('categories','t1.id','name') ." FROM categories AS t1 WHERE t1.type=(SELECT id FROM ctypes WHERE name='".$r2['ctype']."') AND t1.id!='".$r2['id']."'  ORDER BY t1.name ASC");
            mysqli_stmt_bind_param($stm,"si",$r2['ctype'],$r2['id']);
            mysqli_stmt_execute($stm);
            $result=mysqli_stmt_get_result($stm);
			while($r3=mysqli_fetch_array($result)){
				$catebi = explode(',',$r2["pid"]);
				if($r3["type"]!=1 && $r3['pid']==0 )
				{
?>		
				<option <?=in_array($r3["id"], $catebi)?"selected":""?> value="<?=$r3["id"]?>"><?=$r3["name".$lngdefname]?></option>
<?php
				}
				if($r3["type"]==1)
				{
					?>
				<option <?=in_array($r3["id"], $catebi)?"selected":""?> value="<?=$r3["id"]?>"><?=$r3["name".$lngdefname]?></option>	
					<?php
				}
					
	}
	
?>		
</select>
<?php
			}else{
							   
                   $c=0;
	               for($z=0;$z<count($lnarr);$z++)
	              {
	               $c++;
				   echo $r2["parent".$lnshortarr[$z]];
				  }
			}
?>
				</th>
					<?php			   
                   $c=0;
	               for($z=0;$z<count($lnarr);$z++)
	              {
	               $c++;
	              ?>
				<th class="enebi" style="<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>" d='<?=$c ?>'><textarea class="form-control UPT  " placeholder="keyword1,keyword2,keyword3 (max 20 სიტყვა)" title="keyword1,keyword2,keyword3 (max 20 სიტყვა)" d="<?=$r2["id"]?>"type="text" t="categories" n="keywords" ln='<?=$lnshortarr[$z] ?>' ><?=$r2["keywords".$lnshortarr[$z]]?></textarea></th>			
				<th class="enebi" style="<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>" d='<?=$c ?>'><textarea class="form-control UPT " placeholder="აღწერა (max 160 სიმბოლო)" title="აღწერა (max 160 სიმბოლო)" d="<?=$r2["id"]?>"type="text" t="categories" n="description"  ln='<?=$lnshortarr[$z] ?>' ><?=$r2["description".$lnshortarr[$z]]?></textarea></th>	
              <?php
				  }
            ?>				  
				<th><select style="width:90px" class="form-control UPT3" t="categories" n="type" d="<?=$r2["id"]?>">
					<option   value="0">აირჩიეთ ტიპი </option>
			<?php 
			foreach($ctypes as $r3){
		?>
					<option <?=$r2["ctype"]==$r3["name"]?"selected":""?>  value="<?=$r3['id'] ?>"><?=$r3['name']?> </option>
					
				<?php
				
			}
			?>
			
			
				</select></th>			
				<th>
				 <select class="form-control chpldps" t="categories" n="position" d="<?=$r2["id"]?>">
					    <option><?=$i ?></option>
				<?php
				         
						$d=0;
						 $po=mysqli_query($con,"SELECT position FROM categories WHERE position!=0  ORDER BY position");
						 while($rpo=mysqli_fetch_assoc($po))
						 { $d++;
					        if($d==$i)
							{
								continue;
							}
						?>
						<option value='<?=$rpo['position'] ?>'><?=$d ?></option>
						<?php
						 }
						?>
					  </select>
				</th>			
				<th>
					<div class="input-append row pr-2">
						<div class="col-md-9 pr-0">
							<input id="YDA9767032<?=$r2["id"]?>" class="form-control UPT" d="<?=$r2["id"]?>" t="categories" n="img" value="<?=$r2["img"]?>" placeholder="სურათის ლინკი" type="text" value="<?=$r1["img"]?>">		
						</div>
						<div class="col-md-3 pl-1"><a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA9767032<?=$r2["id"]?>&relative_url=0')"><button class="btn iframe-btn btn-outline-success px-1 py-0"><i class="fa fa fa-upload"></i></button></a>
						</div>
						<small class="ml-3">30px/30px</small>
					</div>				
				</th>			
				<th>
					<div class="input-append row pr-2">
						<div class="col-md-9 pr-0">
							<input id="YDA97670323<?=$r2["id"]?>" class="form-control UPT" d="<?=$r2["id"]?>" t="categories" n="banner" value="<?=$r2["banner"]?>" placeholder="სურათის ლინკი" type="text" value="<?=$r1["banner"]?>">		
						</div>
						<div class="col-md-3 pl-1"><a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA97670323<?=$r2["id"]?>&relative_url=0')"><button class="btn iframe-btn btn-outline-success px-1 py-0"><i class="fa fa fa-upload"></i></button></a>
						</div>
						<small class="ml-3">900px/250px</small>
					</div>				
				</th>				
				<th ><div class="btn btn-primary FIL px-1 py-0" d="<?=$r2["id"]?>"><i class="fa fa-filter"></i></div></th>
				<th><input class="form-control UPT2" d="<?=$r2["id"]?>"type="checkbox" t="categories" n="active" <?=$r2["active"]=="1"?"checked":""?>/></th> 				
				<th><div class="btn btn-danger DEL px-1 py-0" t="categories" d="<?=$r2["id"]?>"><i class="fa text-white fa-trash"></i></div></th>
			</tr>
<?php
	}
?>
		</tbody>

</table>
</div>

<?php
$q3=mysqli_query($con,"SELECT * FROM categories as t1 WHERE t1.id>0 $WSE ");
?>
	<div class="col-md-12 MID">
	<a href="?page=categories&p=1&category=<?=$category?>&type=<?=$type ?>&active=<?=$active ?>" class="PG USR">«</a>
	<a href="?page=categories&p=<?=$ACP!=1?($ACP-1):$ACP?>&category=<?=$category?>&type=<?=$type ?>&active=<?=$active?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=categories&p=<?=$i?>&category=<?=$category?>&type=<?=$type ?>&active=<?=$active?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=categories&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>&category=<?=$category?>&type=<?=$type ?>&active=<?=$active?>" class="PG USR">›</a>
	<a href="?page=categories&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>&category=<?=$category?>&type=<?=$type ?>&active=<?=$active?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
</div>
</div>