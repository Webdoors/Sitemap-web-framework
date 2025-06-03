<?php
ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
$ACP=1;
if(isset($_REQUEST["p"])&&$_REQUEST["p"]>0){
	$ACP=$_REQUEST["p"];
}
$fr=($ACP-1)*30;
$from=date("m/d/Y");
$to=date("12/31/Y");
$guserid=$_SESSION['GuserID'];

?>
<style>
td{
	padding:0px !important;
	font-size:12px;
	text-align:center;
}
th{
	padding:4px !important;
	font-size:14px;
	text-align:center;
}
.CHEBO{
    right: 7px;
    top: 10px;
    width: 18px;
    height: 18px;
}
</style>
<div class="container-fluid ">

	 <div class="w-100 text-right py-2">
		 <button class="btn btn-success"><a class="text-white row mx-0"href="/cp/admin/func/epromo.php "> <i class="fas fa-file-excel">&nbsp;ექსპორტი</i></a></button>
	 </div>
 
   <div id='userlist'>
   </div>
   <div class="col-md-12 px-0" >
		 <table class="table table-bordered table-sm bg-warning">
	 <thead>
		 <tr>
			 <th>
				 	<div class="D1 " >
			 		    <div class=' lstitle'>
			 		       მყიდველის სახელი გვარი ან პ/ნ
			 		    </div>
			 		    <div class=""  >
			 		       <input type='text' placeholder='სახელი/გვარი/პნ' class='form-control  usrlst'/>
			 		    </div>
			 		</div>
				</th>
	
			 <th>
				 	<div class="D1 "  >

			 	       <div class=' lstitle'>
			 		     მოცულობა %
			 		    </div>
			 		    <div class=''>

			 	          <input type='number' min='0' max='39' onKeyPress="" onKeyUP="if(this.value>40) this.value=40;" placeholder="პროცენტი" value='1' class="ADPRC form-control"/>
			 		   
			            </div>
			 		</div>
				</th>
	<!---	<th>
				 	<div class="D1 "  >

			 	       <div class=' lstitle'>
			 		     რაოდენობა
			 		    </div>
			 		    <div class=''>

			 	           <input type='number' class='form-control ADRD' min='1' onKeyUP="if(this.value<1) this.value=1;" value='1' disabled />
			 		   
			            </div>
			 		</div>
				</th> --->	
				<th>
				 	<div class="D1 "  >

			 	       <div class=' lstitle'>
			 		     ტიპი
			 		    </div>
			 		    <div class=''>

			 	          <select class='form-control chpromo'>
						    <option value='0'>ერთჯერადი</option>
						    <option value='1'>მრავალჯერადი</option>
						  </select>
			 		   
			            </div>
			 		</div>
				</th>
			
			 <th>
				 <div class="D6  " >
 			  <div class=''>
 					<div class="">
 						<input value="დამატება" type="button" n="ADPROMO" ask='1' t="promocodes" class="ADPROMO  btn btn-primary ADSTYLE w-100"/>
 					</div>
 			  </div>
 		   </div>
		 </th>
		 </tr>
	 </thead>
 </table>
	</div>
	
	<div class="row ">

	<div class="col-12 ">
	<div class="LIS ">
	<table class="table">
	<thead class=" LISHEAD H">
		<tr>
			<th>Id</th>
			<th>სახელი/გვარი/პირ.ნ/ტელ</th>
	
			<th>პრომოკოდი</th>
			
			<th>დარჩა/სულ</th>
		
			<th>used number</th>
			<th>Sale</th>
			<th>შექმნის თარიღი</th> 
			<th>აქტ.</th>
			<th><i class="fa fa-trash"></i></th>
		</tr>
	</thead>

<?php

	$q1=mysqli_query($con,"SELECT t1.*,
						  (SELECT name FROM id as t4 WHERE t4.id=t1.uid) as 'fullname',
						  (SELECT personal_id FROM id as t5 WHERE t5.id=t1.uid) as 'personal_id',
						  (SELECT mobile_phone FROM id as t5 WHERE t5.id=t1.uid) as 'tel'
						  FROM promocodes as t1  ORDER BY t1.Id DESC LIMIT 30 OFFSET ".$fr."");
  
  $d=7;
    $name = 7;
	
  
  
   $tst=mysqli_prepare($con,"SELECT date FROM usepromo WHERE pid=? AND uid=? ORDER BY id DESC"); 
	
	
	while($r1=mysqli_fetch_array($q1)){
		$j=0;
		 $q2=mysqli_query($con,"SELECT t1.id, t1.uid, t1.date, t1.pid, count(t1.uid) AS usenum, (SELECT name FROM id as t2 WHERE t2.id=t1.uid) as 'fullname' ,
		                                     (SELECT personal_id FROM id as t3 WHERE t3.id=t1.uid) as 'personal_id'
                                             FROM usepromo   as t1  WHERE  t1.pid='".$r1['id']."' GROUP BY t1.uid ");
     $cnum=mysqli_num_rows($q2) ; 
	 

	?>

		<tr>
			<td><?=$r1["id"]?></td>
			<td> <b><?=$r1["fullname"]?></b> <br/> pid: <?=$r1["personal_id"]?> </br> tel: <?=$r1["tel"]?> </td>
			
			<td>
				<div class="position-relative">
					<input class="form-control UPT text-center" disabled t="promocodes" n="name" d="<?=$r1["id"]?>" value="<?=$r1["name"]?>"/>
					<input type="checkbox" class="position-absolute CHEBO"  checked style="" onclick="$(this).prev().prop('disabled',!$(this).prev().attr('disabled'))" />
				</div>
			</td>
		 <?php
		     if($r1["multiple"]!=1) 
			 {
		 ?>
			<td><div><span data-toggle="tooltip" data-html='true'  title="გამოყენებული რაოდენობა"><?=$r1["usnambers"] ?></span>/<span data-html='true' data-toggle="tooltip" title="დარჩენილი რაოდენობა"><?=$r1['totalnumber'] ?> </span></div></td>
			<?php
			 }
			 else
			 {
				 ?>
				<td><div><span data-toggle="tooltip" data-html='true'  title="გამოყენებული რაოდენობა"><?=$r1["usnambers"] ?></span>/<span data-html='true' data-toggle="tooltip" title="დარჩენილი რაოდენობა">&#8734; </span></div></td>
				 <?php
			 }	 
			 
			 ?>
			<td>
					  <?php
					  
					    while($r2=mysqli_fetch_array($q2))
						{
							$j++;
					  ?>
					    
			          <div style='cursor:pointer;'  data-html='true' data-toggle="tooltip" title="<b><?=$r2["fullname"]?>  personal_id -(<?=$r2['personal_id'] ?>) </b> <br/> 
					  
					  <?php
					    
                          mysqli_stmt_bind_param($tst,"ii",$r2['pid'],$r2['uid']);
                          mysqli_stmt_execute($tst);
                          mysqli_stmt_bind_result($tst,$dat);
						  $n=0;
                          while(mysqli_stmt_fetch($tst))
                         {
							 $n++;
	                    //  echo $dat ."<br/>";
                 
					   echo $n .")".  date("Y-m-d H:i:s",$dat) ." <br/>";
					  
						 }
					  ?>
					 " >
						 <?=$j ?>)  <?=$r2["fullname"]?> -(<?=$r2['personal_id'] ?>)-(<?=$r2['usenum'] ?>)  <a href="?page=user&id=<?=$r2['uid'] ?>">click</a>
						 
					  </div>	 
					   <br/>
					   
	


					   <?php
						}
						?>
					</td>
			<td><?=$r1["percent"].'%'?></td>
			<td><?=date('Y-m-d',$r1["createdate"]) ?></td>
		
		
			<td><input type='checkbox' class='acpromo' <?=$r1["active"]==1?'checked':''?> <?=$r1['disabled']==1?"disabled":"" ?> d='<?=$r1["id"] ?>' /></td>
			<td><a class="DGA btn btn-danger" d="<?=$r1["id"]?>" n='promocodes'><i class="fa fa-trash"></i></a></td>
		</tr>


<?php
	}
	?>
	</tbody>
	</table>
</div>
</div>


</div>
	<ul class="col-md-12 pagination LIS P">
<?php
	$q3=mysqli_query($con,"SELECT Id FROM promocodes  ORDER BY id DESC");
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/30);$i++){
	?><li>
	<a href="?page=promo&p=<?=$i?>" class="PG <?=($ACP==$i?"ACP":"")?> AMI"><?=$i?></a>
	</li>
<?php
	}
	?>
	<li class="next"><a href="?page=promo&p=1"><i class="fa fa-angle-right"></i></a></li>
	<li class="last"><a href="?page=promo&p=1">Last</a></li>
	</ul>
</div>
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'right'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<?php
mysqli_stmt_close($tst);

?>