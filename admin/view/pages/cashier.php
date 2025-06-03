<textarea class="CASHIER" placeholder="შტრიხკოდი"></textarea>
<a class="btn btn-primary SELLIT">გაყიდვა</a>
<input class="form-control TOTAL FR" disabled />		
<table class="table table-bordered table-striped">

<thead>
	<tr>

		<td>ნივთის დასახელება</td>
		<td>ბრენდი</td>
		<td>BARCODE</td>
		<td>გასაყიდი ფასი</td>
		<td>ფასდაკლება</td>
		<td>ფასდაკლებული ფასი</td>

	</tr>
</thead>
<tbody>

</tbody>
</table>
					<select style="width:160px;" class="form-control METH" title="გადახდის მეთოდი">
					<option value="">აირჩიეთ გადახდის მეთოდი</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM methods ORDER BY id ASC");
while($r1=mysqli_fetch_array($q1)){
?>
					<option value="<?=$r1["id"]?>"><?=$r1["name"]?></option>
<?php
}
?>				
					</select>	
					<select style="width:160px;" class="form-control SELLER" title="გადახდის მეთოდი">
					<option value="">აირჩიეთ გამყიდველი</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM sellers ORDER BY id ASC");
while($r1=mysqli_fetch_array($q1)){
?>
					<option value="<?=$r1["id"]?>"><?=$r1["name"]?></option>
<?php
}
?>				
					</select>	
					<select style="width:160px;" class="form-control SALAMO" title="გადახდის მეთოდი">
					<option value="1">0%</option>		
					<option value="0.95">5%</option>		
					<option value="0.9">10%</option>		
					<option value="0.85">15%</option>		
					<option value="0.8">20%</option>		
					<option value="set">სეტი</option>		
					</select>
<input placeholder="20" class="form-control"/>			
					<select style="width:160px;" class="form-control PLACE" title="გადახდის მეთოდი">
					<option value="">აირჩიეთ გაყიდვის ადგილი</option>
<?php
$q1=mysqli_query($con,"SELECT * FROM stores ORDER BY id ASC");
while($r1=mysqli_fetch_array($q1)){
?>
					<option <?=$r1["id"]==16?"selected":""?> value="<?=$r1["id"]?>"><?=$r1["name"]?></option>
<?php
}
?>				
					</select>	