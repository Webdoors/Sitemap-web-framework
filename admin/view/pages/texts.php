

<?php


$ACP=1;
if(isset($_REQUEST["p"])){
	$ACP=$_REQUEST["p"];
}
$PA=30;
$fr=($ACP-1)*$PA;
$WSE="";
$KEY="";
if(isset($_REQUEST["key"])){
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]);
	$WSE=" AND (t1.pid LIKE '%".$KEY."%' OR t1.companyid LIKE '%".$KEY."%' OR t1.username LIKE '%".$KEY."%' OR t1.firstname LIKE '%".$KEY."%' OR t1.lastname LIKE '%".$KEY."%' OR t1.email LIKE '%".$KEY."%' OR t1.tel LIKE '%".$KEY."%')";
}
	$q1=mysqli_query($con,"SELECT t1.*, ". languages('categories','t1.id','name') .", ". languages('textpages','t2.id','title') ."   FROM categories AS t1 LEFT JOIN textpages AS t2 ON(t1.id=t2.category) WHERE t1.type=(SELECT id FROM ctypes WHERE name='text')");	

	$q100=mysqli_query($con,"SELECT * FROM textpages as t1 WHERE t1.id>0 $WSE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");	
$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;

?>
<br>&nbsp;
<div class="container-fluid">

 <br/>
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




	<div class="col-sm-12">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
			<th>რაოდ.</th>
			<th>id</th>	
			<th>სურათი</th>
			
			<?php			   
             $c=0;
	         for($z=0;$z<count($lnarr);$z++)
	        {
	      $c++;
	       ?>
		   <th class='enebi' d='<?=$c ?>'  style="<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>">სათაური <?=$lnshortarr[$z] ?></th>
			<?php
			}
			?>
			<th>კატეგორია</th>
			
			<!-- <th>tags</th> -->
			<!-- <th>comments_number</th> -->
		
			
			<th>აქტიური</th>
			
			<th>რედაქტირება</th>
			
		  </tr>
		</thead>
		<tbody>
<?php
while($r1=mysqli_fetch_array($q1)){
	// $sld=mysqli_query($con,"SELECT * FROM slider WHERE pid='".$r1["id"]."'");

	?>
		  <tr>
			<th><?=$cou?></th>
			<th><?=$r1["id"]?></th>	
			<th><img src="<?=$r1["img"]?>" style="width:70px" /></th>
	
			<?php
	        $c=0;
	       for($z=0;$z<count($lnarr);$z++)
	        {
	         $c++;
	        ?>
			<th class='enebi' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>' d='<?=$c ?>'><?=$r1["title" .$lnshortarr[$z]]?></th>
			<?php
			}?>
	        
			<th><?=$r1["name".$lngdefname]?></th>
			
			<!-- <th><?php /*$r1["tags"] */?></th> -->
			<!-- <th><?php /*$r1["comments_number"] */ ?></th> -->
	
			
			<th><input type='checkbox'<?=$r1["active"]=="1"?"checked":""?> class='form-control UPT' n='active' t='categories' d="<?=$r1["id"]?>" /></th>
		
			<th><a href="?page=text&id=<?=$r1["id"]?>"><button class="btn btn-outline-success">რედაქტირება</button> </a> </th>
	
		  </tr>
<?php
$cou=$cou-1;
}
?>
		</tbody>
	</table>
	</div>
<?php
$q3=mysqli_query($con,"SELECT t1.*  FROM categories AS t1 LEFT JOIN textpages AS t2 ON(t1.id=t2.category) WHERE t1.type=(SELECT id FROM ctypes WHERE name='text')");
?>
	<div class="col-md-12 MID">
	<a href="?page=texts&p=1" class="PG USR">«</a>
	<a href="?page=texts&p=<?=$ACP!=1?($ACP-1):$ACP?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=texts&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=texts&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>" class="PG USR">›</a>
	<a href="?page=texts&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
</div>
</div>
<br>