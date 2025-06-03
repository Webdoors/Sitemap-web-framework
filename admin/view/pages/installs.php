<table id="table-ajax-defer" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>
					<div class="col-md-12"><a href="func/eorders.php" class="btn btn-default">Excel</a></div>
				</th>
			</tr>

			<tr>
<th>თარიღი</th>	
<th>პროდუქტის სახელი</th>	
<th>პროდუქტის ფასი</th>	
<th>ვადა</th>	
<th>თანამონაწილეობა</th>	
<th>დაფარვის თარიღი</th>	
<th>სახელი</th>	
<th>გვარი</th>	
<th>პ/ნ</th>	
<th>დოკ.ნომერი</th>	
<th>დაბ.თარიღი</th>
<th>ტელეფონი</th>	
<th>გენდერი</th>
<th>ოჯახური მდგომარეობა</th>
<th>სახლის ტელეფონი</th>	
<th>ქალაქი</th>	
<th>იურ. მისამართი</th>
<th>ფაქტ.მისამართი:</th>	
<th>სამსახური</th>
<th>პოზიცია</th>
<th>სამს.მისამართი</th>	
<th>სამს.ტელ</th>	
<th>ხელფასი</th>	
<th>დამ.წყარო</th>	
<th>დამ.შემოსავალი</th>	
<th>ოჯახის წევრი</th>	
<th>კოლეგა</th>
<th>კოლეგის ტელ</th>
<th>სად.გერ.ხელფ</th>
<th>სტაჟი</th>
<th>საბუთ.ტიპი</th>
<th>Email</th>
<th>PromoCode</th>
<th>საქ.სფერო</th>
<th>საქ.დარგი</th>
<th>Pro.CATeg</th>
<th>ECO</th>
<th>TBC</th>
<th>TBC STATUS</th>
<th>Credo</th>
<th>Credo STATUS</th>
<th>Crystal</th>
<th>Crystal STATUS</th>
							
			</tr>
		</thead>
		<tbody>
<?php
$q1=mysqli_query($con,"SELECT * FROM forms ORDER BY id DESC");
while($r1=mysqli_fetch_array($q1)){
?>
					<tr>
<th><?=date("d-m-Y H:i:s",$r1["date"])?></th>	
<th><?=$r1["productname"]?></th>	
<th><?=$r1["price"]?></th>	
<th><?=$r1["period"]?></th>	
<th><?=$r1["participation"]?></th>	
<th><?=$r1["paydate"]?></th>	
<th><?=$r1["name"]?></th>	
<th><?=$r1["lastname"]?></th>	
<th><?=$r1["pid"]?></th>		
<th><?=$r1["docnum"]?></th>
<th><?=$r1["birthdate"]?></th>	
<th><?=$r1["tel"]?></th>	
<th><?=$r1["gender"]?></th>	
<th><?=$r1["family"]?></th>	
<th><?=$r1["hometel"]?></th>	
<th><?=$r1["city"]?></th>	
<th><?=$r1["legaladdress"]?></th>	
<th><?=$r1["realaddress"]?></th>	
<th><?=$r1["job"]?></th>	
<th><?=$r1["position"]?></th>	
<th><?=$r1["jobaddress"]?></th>	
<th><?=$r1["jobtel"]?></th>	
<th><?=$r1["sallary"]?></th>	
<th><?=$r1["othersource"]?></th>	
<th><?=$r1["otherincome"]?></th>	
<th><?=$r1["membertel"]?></th>	
<th><?=$r1["collegue"]?></th>	
<th><?=$r1["colleguetel"]?></th>				
<th><?=$r1["sallerywhere"]?></th>			
<th><?=$r1["experience"]?></th>												
<th><?=$r1["doctype"]?></th>												
<th><?=$r1["email"]?></th>												
<th><?=$r1["promocode"]?></th>												
<th><?=$r1["saqspero"]?></th>												
<th><?=$r1["dargi"]?></th>												
<th><?=$r1["jstree"]?></th>												
<th><?=$r1["eco"]?></th>												
<th><button class="btn btn-default TBCGAN" d="<?=$r1["id"]?>">TBC</button></th>									
<th></th>									
<th><button class="btn btn-default CREGAN" d="<?=$r1["id"]?>">Credo</button></th>									
<th></th>									
<th><button class="btn btn-default CRYGAN" d="<?=$r1["id"]?>">Crystal</button></th>									
<th></th>									
			</tr>
<?php
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