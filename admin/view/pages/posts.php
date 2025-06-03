<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$L=isset($_GET["lang"])?$_GET["lang"]:"ka";
$ACP=1;
$p=isset($_REQUEST["p"])?$_REQUEST["p"]:1;
if(isset($p)){
	$ACP=$p;
}
$PA=30;
$fr=($ACP-1)*$PA;
$WSE="";
$KEY="";
$slang='';
$ksarch='';
$key=isset($_REQUEST["key"])?$_REQUEST["key"]:"";
if(isset($_REQUEST["key"])){
	
	$KEY=mysqli_real_escape_string($con,isset($_REQUEST["key"])?$_REQUEST["key"]:"");
	
	$ksarch='&key='.$KEY;
	
	   for($z=0;$z<count($lnarr);$z++)
	   {
	      
	      $slang.="t1.id IN (SELECT table_id FROM langs WHERE tableColumn='title'  AND shortname='".$lnshortarr[$z]."' AND tableName='posts' AND columnValue LIKE '%".$KEY."%') OR ";
		
	   }
	   $slang=rtrim($slang,"OR ");
	   //echo $slang;
	
	$WSE="";
}
$q1=mysqli_query($con,"SELECT t1.* FROM posts as t1
 WHERE t1.id>0   $WSE ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");	
	$q100=mysqli_query($con,"SELECT * FROM posts as t1 WHERE t1.id>0  $WSE  ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");	
if($q100){
	$cou=mysqli_num_rows($q100)-($ACP-1)*$PA;		
}


?>
<div class="container-fluid">

   <div class="col-sm-12 my-3 p-0 row">
   <div class="col-sm-12">
<ul class="nav nav-tabs">
<?php
$flags=["ka"=>"ge","en"=>"gb","ru"=>"ru","fr"=>"fr"];
$q4=mysqli_query($con,"SELECT * FROM languages WHERE active=1");
while($r4=mysqli_fetch_array($q4)){
?>
  <li class="nav-item me-1">
 <a href="?page=posts&key=<?=$key?>&p=<?=$p?>&lang=<?=$r4["shortname"]?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=$flags[$r4["shortname"]]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>

   </div>
   </div>



<div class="row justify-content-center border-top">




	<div class="col-sm-12">
		<div class="row my-2">
		<form>
		  <div class='row'>	  
			 <div class="col-sm-7">
				<input type="hidden" name="page" value="posts"/>
				<input class="form-control SERKEY2" name="key" value="<?=$KEY?>" placeholder="Search"/>
			 </div>
			  <div class="col-sm-4 pl-0">
				 <button class="btn btn-primary SER2">Search</button>
			   </div>
			<div class='col-sm-1 '>
			  <button class='btn btn-success'><a class="text-white"href='?page=post'>დამატება</a></button>
			</div>
			</div>
		</form>
			</div>
		</div>
		
	</div>
	<div class="col-sm-12 px-0">
	<table class="table table-sm table-striped table-bordered table-condensed table-hover">
		<thead>
		  <tr>
			<th>id</th>	
			<th>img</th>
			

		   <th class='enebi' d='<?=$c ?>' >title <?=$L ?></th>


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
			<th><?=$r1["id"]?></th>	
			<th><img src="<?=$r1["img_".$L]?>" style="width:70px" /></th>
	

			<th class='enebi'  d='<?=$c ?>'><?=$r1["title_" .$L]?></th>

	
			<!-- <td><input type='checkbox'<?=$r1["slider"]=="1"?"checked":""?> class='form-control UPT' n='slider' t='posts' d="<?=$r1["id"]?>" /></td> -->
			
			<th><input type='checkbox'<?=$r1["active"]=="1"?"checked":""?> class=' UPT' n='active' t='posts' d="<?=$r1["id"]?>" /></th>
		
			<th><a href="?page=post&id=<?=$r1["id"]?>"><button class="btn btn-outline-success">რედაქტირება</button> </a> </th>
			<th><button class="btn btn-outline-danger DGA" d="<?=$r1["id"]?>" n="posts">წაშლა</button></th>
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
$q3=mysqli_query($con,"SELECT * FROM posts as t1 WHERE t1.id>0 $WSE ");
$toto=0;
if($q3){
	$toto=mysqli_num_rows($q3)!==null?mysqli_num_rows($q3):0;	
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