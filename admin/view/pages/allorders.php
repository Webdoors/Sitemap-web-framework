<?php
	$ACP=1;
	$p=$_REQUEST["p"]??"";
	if($p>0){
		$ACP=mysqli_real_escape_string($con,$p);
	}
	$PA=30;
	$fr=($ACP-1)*$PA;
	$KEY=$_GET["key"]??"";
	$key="";
	$WRE="";
	$WCI="";
	$WST="";
	if($KEY!=""){
		$key="AND (t1.finaid LIKE '%".$KEY."%' OR t1.id LIKE '%".$KEY."%' OR t2.firstname LIKE '%".$KEY."%' OR t2.lastname LIKE '%".$KEY."%' OR t2.personalid LIKE '%".$KEY."%' OR t2.companyid LIKE '%".$KEY."%' OR t2.companyname LIKE '%".$KEY."%') ";
	}
	$status=mysqli_real_escape_string($con,$_REQUEST["status"]??"");
if($status!=""){
	$WST=" AND FIND_IN_SET(t1.status,'".$status."') ";
}	
	$city=mysqli_real_escape_string($con,$_REQUEST["city"]??"");
if($city!=""){
	$WCI=" AND FIND_IN_SET(t1.city,'".$city."') ";
}
	$region=mysqli_real_escape_string($con,$_REQUEST["region"]??"");
if($region!=""){
	$WRE=" AND FIND_IN_SET(t1.region,'".$region."') ";
}	
$WHERE=" $key $WST $WCI $WRE";
?>
<style>
input,textarea,select,td,th{
	font-weight: 500 !important;
    color: #000 !important;	
	font-size:10px !important;	
}
textarea.form-control {
height: calc(1.5em + 0.75rem + 2px)!important;
}
</style>
<div class="col-10 mx-auto">
<div class="row">
<input type="hidden" class="PAGE" value="allorders"/>
<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th colspan=10 >
					<div class="row">
						<div class="col-sm-6">
							<input class="form-control KEY" placeholder="საძიებო სიტყვა (ფინა id,სახელი და ა.შ)" value="<?=$KEY?>"/>
						</div>
						<div class="col-sm-2">
							<button class="btn btn-primary SER">ძებნა</button>&nbsp;&nbsp;&nbsp;&nbsp;
						</div>
						<div class="col-sm-2">
							<button class="btn btn-danger CLN"><i class="fa fa-refresh"></i></button>
						</div>	
						<div class="col-sm-2">
							<div class="col-md-12"><a href="func/eorders.php" class="btn btn-success">Excel</a></div>
						</div>	
					</div>	
				</th>
			</tr>
			<tr>
				<th>ფინა Id</th>
				<th>თარიღი</th>
				<th>მომხმარებელი</th>	
				<th>ინვოისის ნომერი</th>	
				<th>მისამართი</th>	
				<th>ტელ</th>	
				<th>ქალაქი<i class="fa fa-filter FILT CP"></i>
				<div class="FILTER">
					<div class="row">
						<div class="col-sm-12">
							<input type="search" class="form-control FILTKEY" placeholder="ფილტრი"/>
						</div>
						<div class="col-sm-12 mt-2">
							<button class="btn btn-primary FILTBUT2">ფილტრი</button>
						</div>		
						<div class="col-sm-12 mt-2">
							<div class="row">
							<div class="col-sm-12 mt-1"style="border-bottom:solid 1px #ddd"><input class="FALL" type="checkbox" />
								<label class="FLAB">ყველა</label>
									
								</div>
<?php
$qs1=mysqli_query($con,"SELECT DISTINCT(t1.city) FROM orders as t1 ORDER BY t1.city ASC");
while($rs1=mysqli_fetch_array($qs1)){
	$sarr=explode(",",$city);
?>							
								<div class="col-sm-12 mt-1"><input class="FLIST" <?=in_array($rs1["city"],$sarr)?"checked":""?> type="checkbox" n="city" value="<?=$rs1["city"]?>"  />
								<label class="FLAB"><?=$rs1["city"]?></label>
									
								</div>	
<?php
}
?>								
							</div>								
						</div>				
					</div>				
				</div></th>		
				<th>ჯამში</th>

				<th>შენიშვნა/კომენტარი</th>	
								
				<th></th>								
			</tr>
		</thead>
		<tbody>
<?php
$q1=mysqli_query($con,"SELECT t1.*,t2.address,t2.tel,t2.firstname,t2.lastname,t2.companyname,t2.companyid,t2.personalid FROM orders as t1 LEFT JOIN users as t2 ON(t1.uid=t2.id) WHERE t1.id>0 $WHERE ORDER BY t1.id DESC LIMIT $PA OFFSET $fr");
if($q1){
while($r1=mysqli_fetch_array($q1)){
?>
			<tr>
				<th><?=$r1['finaid'] ?> </th>
				<th><?=date("d.m.Y H:i",$r1["udate"])?></th>
				<th><a ><?=$r1["firstname"]?> <?=$r1["lastname"]?><br><?=$r1["personalid"]?><br><?=$r1["companyname"]?> <?=$r1["companyid"]?></a></th>	
				<th><a href="func/invoiceexcel.php?orderid=<?=$r1["id"]?>" target="_blank">invoice</a></th>						
				<th><?=trim($r1["details"])==""?$r1["address"]:$r1["details"]?></th>	
				<th><?=$r1["tel"]?></th>	
				<th><?=$r1["city"]?></th>			
				<th><?=number_format($r1["total"],2)?> ₾</th>			
				<th><textarea class="form-control B UPT" t="orders" n="comment" d="<?=$r1["id"]?>" w="<?=$r1["id"]?>" d="comment" placeholder="შენიშვნა/კომენტარი" title="შენიშვნა/კომენტარი"><?=$r1["comment"]?></textarea></th>						
				<th class="d-none"><input class="form-control B" w="<?=$r1["id"]?>" d="income" placeholder="თანხის შემოსვლა" value="<?=$r1["income"]?>" title="თანხის შემოსვლა"/></th>	

				<th class="d-none"><input class="form-control B" w="<?=$r1["id"]?>" d="owner" placeholder="შეკვეთის მიმღები" value="<?=$r1["own"]!=""?$r1["own"]:$r1["owner"]?>" title="შეკვეთის მიმღები"/></th>	


				<th class="d-none"><input class="form-control B" w="<?=$r1["id"]?>"d="fine" placeholder="ჯარიმა" value="<?=$r1["fine"]?>" title="ჯარიმა"/></th>								
							
				<th>
<?php
if($r12["orderdelete"]==1){
?>
					<a class="btn btn-danger DGA" n="orders" d="<?=$r1["id"]?>"><i class="fa fa-trash text-white"></i></a>
<?php
}
?>
				</th>								
			</tr>
<?php
}
}
?>
		</tbody>
		<tfoot>
			<!--<tr>
				<th>თარიღი</th>
				<th>სტატუსი</th>	
				<th>ინვოისის ნომერი</th>	
				<th>კონტრაგენტი</th>	
				<th>მისამართი, პირადი ნომერი, ტელ, ნომერი</th>	
				<th>ნივთის დასახელება</th>
				<th>მომწოდებელი</th>	
				<th>ასაღები ფასი</th>	
				<th>გასაყიდი ფასი</th>	
				<th>მოგება</th>	
				<th>გადახდის ტიპი</th>	
				<th>თანხის შემოსვლა</th>	
				<th>კურიერი</th>	
				<th>შეკვეთის მიმღები</th>	
				<th>გაყიდვის ადგილი</th>	
				<th>შენიშვნა/კომენტარი</th>	
				<th>ჯარიმა</th>	
				<th>ჩამოწერა</th>																	
				<th></th>																	
			</tr>-->
		</tfoot>
</table>
<?php
$q3=mysqli_query($con,"SELECT * FROM orders as t1 LEFT JOIN users as t2 ON(t1.uid=t2.id) WHERE t1.id>0 $WHERE");
?>
	<div class="col-md-12 MID NOP text-center">
	<a href="?page=allorders&p=1&region=<?=$region?>&status=<?=$status?>&city=<?=$city?>" class="PG USR">«</a>
	<a href="?page=allorders&p=<?=$ACP!=1?($ACP-1):$ACP?>&region=<?=$region?>&status=<?=$status?>&city=<?=$city?>" class="PG USR">‹</a>
	<?php
	for($i=1;$i<=ceil(mysqli_num_rows($q3)/$PA);$i++){
		if(($ACP-5)<=$i&&($ACP+5)>=$i){
	?>
	<a href="?page=allorders&p=<?=$i?>&region=<?=$region?>&status=<?=$status?>&city=<?=$city?>" class="PG <?=($ACP==$i?"ACP":"")?> USR"><?=$i?></a>
	<?php }
	}
	?>
	<a href="?page=allorders&status=<?=$status?>&region=<?=$region?>&city=<?=$city?>&p=<?=$ACP!=ceil(mysqli_num_rows($q3)/$PA)?($ACP+1):$ACP?>" class="PG USR">›</a>
	<a href="?page=allorders&status=<?=$status?>&region=<?=$region?>&city=<?=$city?>&p=<?=ceil(mysqli_num_rows($q3)/$PA);?>" class="PG USR">» <?=ceil(mysqli_num_rows($q3)/$PA);?></a>
	</div>
</div>
</div>