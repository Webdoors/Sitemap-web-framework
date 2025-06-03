<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ACP=1;
$p=$_REQUEST["p"]??1;
if(isset($p)){
	$ACP=$p;
}
$PA=30;
$fr=($ACP-1)*$PA;
$WSE="";
$KEY="";
$slang='';
$ksarch='';
if(isset($_REQUEST["key"])){
	
	$KEY=mysqli_real_escape_string($con,$_REQUEST["key"]??"");
	$ksarch='&key='.$KEY;
	
	   for($z=0;$z<count($lnarr);$z++)
	   {
	      
	      $slang.="t1.id IN (SELECT table_id FROM langs WHERE tableColumn='title'  AND shortname='".$lnshortarr[$z]."' AND tableName='articles' AND columnValue LIKE '%".$KEY."%') OR ";
		
	   }
	   $slang=rtrim($slang,"OR ");
	   //echo $slang;
	
	$WSE="AND $slang";
}
	$q1=mysqli_query($con,"SELECT t1.*, ". languages('articles','t1.id','title') .", (SELECT t3.columnValue FROM langs as t3 WHERE tableName='categories' AND shortname='ka' AND tableColumn='name' AND t3.tableId=t2.id LIMIT 1) as 'catka', (SELECT t3.columnValue FROM langs as t3 WHERE tableName='categories' AND shortname='en' AND tableColumn='name' AND t3.tableId=t2.id LIMIT 1) as 'caten' FROM articles as t1
LEFT JOIN categories as t2 ON(t1.category=t2.id) WHERE t1.id>0 AND t1.news=1 $WSE ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");	



	$q100=mysqli_query($con,"SELECT * FROM articles as t1 WHERE t1.id>0 AND t1.news=1 $WSE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");	
	
if($q100){
	$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;		
}


?>
<div class="container-fluid">

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



<div class="row justify-content-center border-top">




	<div class="col-sm-12">
		<div class="row my-2">
		<form>
		  <div class='col-sm-11 row'>	  
			 <div class="col-sm-7">
				<input type="hidden" name="page" value="posts"/>
				<input class="form-control SERKEY2" name="key" value="<?=$KEY?>" placeholder="Search"/>
			 </div>
			  <div class="col-sm-5 pl-0">
				 <button class="btn btn-primary SER2">Search</button>
			   </div>
			</div>
		</form>
			<div class='col-sm-1 row'>
			  <button class='btn btn-success'><a class="text-white"href='?page=news'>დამატება</a></div></button>
			</div>
		</div>
		
	</div>
	<div class="col-sm-12 px-0">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
			<th>N</th>
			<th>id</th>	
			<th>img</th>
			
			<?php			   
             $c=0;
	         for($z=0;$z<count($lnarr);$z++)
	        {
	      $c++;
	       ?>
		   <th class='enebi' d='<?=$c ?>'  style="<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>">title <?=$lnshortarr[$z] ?></th>
			<?php
			}
			?>
			<th>category</th>
			
			<th>tags</th>
			<th>comments_number</th>
			<!-- <th>სლაიდზე</th> -->
			
			<th>აქტიური</th>
			
			<th>რედაქტირება</th>
			<th>წაშლა</th>
		  </tr>
		</thead>
		<tbody>
<?php
if($q1){
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
			<?php
	        $c=0;
	       for($z=0;$z<count($lnarr);$z++)
	        {
	         $c++;
	        ?>	
			<th class='enebi' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>' d='<?=$c ?>'><?=$r1["cat".$lnshortarr[$z]]?></th>
			<?php
			}?>			
			<th><?php /*$r1["tags"] */?></th>
			<th><?php /*$r1["comments_number"] */ ?></th>
			<!-- <td><input type='checkbox'<?=$r1["slider"]=="1"?"checked":""?> class='form-control UPT' n='slider' t='articles' d="<?=$r1["id"]?>" /></td> -->
			
			<th><input type='checkbox'<?=$r1["active"]=="1"?"checked":""?> class='form-control UPT' n='active' t='articles' d="<?=$r1["id"]?>" /></th>
		
			<th><a href="?page=news&id=<?=$r1["id"]?>"><button class="btn btn-outline-success">რედაქტირება</button> </a> </th>
			<th><button class="btn btn-outline-danger DGA" d="<?=$r1["id"]?>" n="articles">წაშლა</button></th>
		  </tr>
<?php
$cou=$cou-1;
}
}
?>
		</tbody>
	</table>
	</div>
<?php
$q3=mysqli_query($con,"SELECT * FROM articles as t1 WHERE t1.id>0 $WSE ");
$toto=0;
if($q3){
	$toto=mysqli_num_rows($q3)??0;	
}

?>
	<div class="col-md-12 MID">
	<a href="?page=posts&p=1<?=$ksarch?>" class="PG USR">«</a>
	<a href="?page=posts&p=<?=$ACP!=1?($ACP-1):$ACP?><?=$ksarch ?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil($toto/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=posts&p=<?=$i?><?=$ksarch ?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=posts&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?><?=$ksarch ?>" class="PG USR">›</a>
	<a href="?page=posts&p=<?=ceil(mysqli_num_rows($q3)/$PA);?><?=$ksarch ?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
</div>
</div>
<br>