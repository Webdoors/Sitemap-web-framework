<?php
$L=mysqli_real_escape_string($con,isset($_REQUEST["lang"])?$_REQUEST["lang"]:"ka");
$key=mysqli_real_escape_string($con,isset($_REQUEST["key"])?$_REQUEST["key"]:"");
/*
$languagename='';
$languageshortname='';
$lngs=mysqli_query($con,"SELECT * FROM languages WHERE active='1' "); 
while($rlngs=mysqli_fetch_assoc($lngs))
{
	$languagename.=','.$rlngs['name'];
	$languageshortname.=','.$rlngs['shortname'];
}
if($languagename!=''&&$languageshortname!='')
{
	$languagename=ltrim($languagename,',');
	$languageshortname=ltrim($languageshortname,',');
}
$lnarr=explode(',',$languagename);
$lnshortarr=explode(',',$languageshortname);
function languages($table_name,$table_id,$table_column)
{
	$alias='';
	$inleng ='';
	for($i=0;$i<count($GLOBALS['lnarr']);$i++)
	{
		$alias=$table_column . $GLOBALS['lnshortarr'][$i];
		$inleng .="(SELECT column_value FROM langs WHERE shortname='". $GLOBALS['lnshortarr'][$i] ."' AND table_name='$table_name' AND table_id=$table_id AND table_column='$table_column' ) AS $alias,";
	}
   $inleng=rtrim($inleng,",");
	return $inleng;
}
echo languages('slider','t1.id','name');
*/
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="/admin/minipan/minipan.js"></script>
<div class="container-fluid">
<br/>
   <div class="col-sm-10 my-3 p-0">
    <div class='row'>

	<div class="col-sm-12">

<ul class="nav nav-tabs">
<?php
$flags=["ka"=>"ge","en"=>"gb","ru"=>"ru","fr"=>"fr"];
$q4=mysqli_query($con,"SELECT * FROM languages WHERE active=1");
while($r4=mysqli_fetch_array($q4)){
?>
  <li class="nav-item me-1">
 <a href="?page=slider&lang=<?=$r4["shortname"]?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=$flags[$r4["shortname"]]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>
	</div>
	</div>
  </div>

 <div class='row'>
   
   <div class="col-sm-11 itmcontainer" t='slider'>
   

         	<?php
	$c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
			    <div class='enebi d-none' d='<?=$c ?>' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '   >
		
			
			<br/> 
			<input type='text' class='form-control  UPTS'  tp='' d='<?=$c ?>' name='description' ln='<?=$lnshortarr[$z] ?>' placeholder='აღწერა <?=$lnshortarr[$z] ?>'>
			<br/>
			</div>
	
      <?php
	   } 
	   ?>
			
   

			<input type='url' class='form-control UPTS' name='urlka' tp='' ln='' placeholder='ლინკი'>

	<!---ssss --->


   <div class='shimg mt-2'>
            <label for="pdf">სლაიდერის სურათი <small></small>1400px/600px</label>

<div class="input-append row">
					<div class="col-md-9">
						<input id="YDA9767032" class="form-control  UPTS" ln='' name='imageka'  placeholder="სურათი 1" type="text" />		
					</div>
					<div class="col-md-2">
					<button class="btn iframe-btn btn-outline-success FILESELECT" target="YDA9767032"><i class="fa fa-upload"></i></button>
					</div>
				</div>

        </div>
		   <div class='shvid d-none'>
            <label for="pdf">ვიდეო</label>

<div class="input-append row">
					<div class="col-md-9">
						<input  id="YDA9767033" class="form-control slvideo"  placeholder="video url" type="text" />
					</div>
					&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=3&popup=1&field_id=YDA9767033&relative_url=1')"><button class="btn iframe-btn btn-outline-success"><i class="fa fa-upload"></i></button></a>

				</div>

        </div>

     <br/>
			<a class="btn btn-success ADDITEMS text-white" msg="დამატებულია"   norep='name,description' t='slider' pos='1' d='' >დამატება</a>
		</div>
<?php
$q1=mysqli_query($con,"SELECT * FROM settings ");
$r1=mysqli_fetch_array($q1);
?>
		<div class="col-2 mt-3">
			<label>სლაიდერის სიჩქარე</label><input class="form-control UPT" t="settings" d="5" n="value" value="<?=isset($r1["sliderspeed"])?$r1["sliderspeed"]:0 ?>" placeholder="1000 for 1000sec"/>
		</div>
 </div>
 <br/>


<div class="row justify-content-center">
	<div class="col-sm-12">
		<div class="row my-2">
			<div class="col-sm-4">
				<h3>სლაიდერი</h3>
			</div>

		</div>
	</div>
	<div class="col-sm-12">
	<?php
	    // $sld=mysqli_query($con,"SELECT t1.*, t2.column_value AS nm FROM slider AS t1 INNER JOIN langs AS t2 ON()  ORDER BY position");
			 
			 
			  $sld=mysqli_query($con,"SELECT t1.*, 
		     ". languages('slider','t1.id','name') ." , ".languages('slider','t1.id','description') ."
		    
		  
			 FROM slider AS t1  ORDER BY position");
			
			 
			 // $sld=mysqli_query($con,"SELECT t1.* FROM slider AS t1  ORDER BY t1.position");
		 $slcount=mysqli_num_rows($sld);

	?>
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		<tr>
		<?php
		  if($slcount>1)
		  {
		?>
		<th>N</th>
		<?php
		  }
		  ?>
	<th>სურათი</th>
	<th>სურათის ლინკი</th>
		<?php
	$c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
		<th class='enebi' d='<?=$c ?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '  >Title <?=$lnshortarr[$z] ?></th>
		<th class='enebi' d='<?=$c ?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '  >Text <?=$lnshortarr[$z] ?></th>

		
		<th class='enebi d-none' d='<?=$c ?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '>აღწერა <?=$lnshortarr[$z] ?></th>
	   <?php
	   }
	   ?>

		<th>ლინკი</th>
		<?php
		  if($slcount>1)
		  {
		?>
		<th>რიგითობა</th>
		<?php
		  }
		  ?>

		<th>წაშლა</th>
		</tr>
		</thead>
		<tbody>
		<?php

		$i=0;
		while($rsld=mysqli_fetch_assoc($sld))
		{
		$i++;
		?>
		<tr>
		<?php
		  if($slcount>1)
		  {
		?>
		<th><?=$i ?></th>
		<?php
		  }
		  ?>
	
		<?php
		  if($rsld['video']==0)
		  {
			  ?>
		<th class='chimg'>



				<div>
				   <input type='hidden' value='<?=$rsld["image".$L]?>' n='image' d='<?=$rsld['id'] ?>' t='slider' id="YDA<?=$i ?>" class='YDA1'/>
			       <img src="<?=$rsld["image".$L]?>" style="width:70px; border:2px" />
				</div>



		</th>					 <th class=''>
<div class="input-group">
<input type="text" class="form-control UPT" d="<?=$rsld["id"]?>"  n="image<?=$L?>" t="slider"  value="<?=$rsld["image".$L]?>" id="example4<?=$rsld["id"]?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" target="example4<?=$rsld["id"]?>" type="button">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.minipan4<?=$rsld["id"]?>').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#example4<?=$rsld["id"]?>',
		});
	});
</script>
			
		</th>
		<?php
		  }
		  else
		  {
			 ?>
			 <th class=''>
			       <img src="<?=$rsld["image".$L]?>"  style="width:70px; border:2px" />			 
			 </th>
			 <th class=''>
<div class="input-group">
<input type="text" class="form-control UPT" d="<?=$rsld["id"]?>"  n="image<?=$L?>" t="slider"  value="<?=$rsld["image".$L]?>" id="example4<?=$rsld["id"]?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" target="example4<?=$rsld["id"]?>" type="button">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.minipan4<?=$rsld["id"]?>').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#example4<?=$rsld["id"]?>',
		});
	});
</script>
			
		</th>
            <?php			 
		  }
		  ?>
		  
	

		<th><input type='text' value='<?=$rsld['title_'.$L] ?>' class="form-control UPT" d='<?=$rsld['id'] ?>' n='title_<?=$L?>' t='slider' /></th>
		<th><textarea type='text' class="form-control UPT" d='<?=$rsld['id'] ?>' n='text_<?=$L?>' t='slider' /><?=$rsld['text_'.$L] ?></textarea>
		<th><input type='text' value='<?=$rsld['url'.$L] ?>' class="form-control UPT" d='<?=$rsld['id'] ?>' n='url<?=$L?>' t='slider' /></th>
		<?php
		  if($slcount>1)
		  {
		?>
		<th>
		
		   <select class='chslps form-control' d='<?=$rsld['id']?>'>
		   
		    <option>
				 
				    <?=$i ?>
		   </option>
		   <?php
		   $d=0;
		  $slpo=mysqli_query($con,"SELECT  * FROM slider ORDER BY position");
		  while($rslpo=mysqli_fetch_assoc($slpo))
		  { 
	        $d++;
			if($d==$i)
			{
				continue;
			}
			
		?>
		         <option value='<?=$rslpo['position'] ?>' >
				 
				    <?=$d ?>
				 </option>
			<?php
		  }
          ?>		  
		   </select>
          </th>
		  <?php
		  }
		  ?>
		<th><button class='btn btn-danger DGA' d='<?=$rsld["id"] ?>' n='slider'><i class="fa fa-trash"></i></button></th>
		</tr>
		<?php
		}
		?>
		</tbody>
	 </table>
	 </div>
 </div>
 </div>
	 