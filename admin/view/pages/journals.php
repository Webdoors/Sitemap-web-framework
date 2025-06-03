<?php
// phpinfo();
?>
<div class="container-fluid">
	<div class="row"> 
		<div class="col-sm-8 mt-3">
			<div class="input-append row">
				<br><div class="col-md-6">
					<input id="YDA" class="form-control JOU" placeholder="სურათის ლინკი" disabled type="text" value="">			
				</div>
				<div class="col-md-1">
					<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=0&popup=1&field_id=YDA&relative_url=0')" class="btn iframe-btn btn-outline-primary" type="button">Select</a>
				</div>
				<div class="col-md-1">
					<button class="btn iframe-btn btn-outline-success  ADDJOU" type="button">ატვირთვა</button>
				</div>
			</div>
		</div>
		<div class="col-sm-12 mt-3">
<table id="table-ajax-defer" class="table table-striped table-bordered LIS" cellspacing="0">
		<thead>
			<tr>
				<th>Id</th>
				<th>თარიღი</th>
				<th>ჟურნალის სახელი</th>
				<th>გვერდების რაოდენობა</th>
				<th>რედაქტირება</th>
		
				<th>წაშლა</th>
			</tr>
		</thead>
		<tbody>

<?php



$q2=mysqli_query($con,"SELECT * FROM journals ORDER BY id DESC");
			while($r2=mysqli_fetch_array($q2)){
?>

			<tr>
				<th><?=$r2["id"]?></th>
				<th><input class="form-control UPT2" d="<?=$r2["id"]?>" n="year" t="journals" min="2020" value="<?=date("Y/m/d",$r2["date"]) ?>" maxlength="4"/></th>
			
				<th><input class="form-control UPT2" d="<?=$r2["id"]?>" n="name" t="journals"  value="<?=$r2["name"]?>"/></th>
				<th><input class="form-control UPT2" type="number" d="<?=$r2["id"]?>" n="pages" t="journals"  value="<?=$r2["pages"]?>"/></th>
				<th><a class="btn btn-outline-primary" href="?page=journal&id=<?=$r2["id"]?>">რედაქტირება</a></th>

				<th><a class="btn btn-outline-danger DGA" n="journals" d="<?=$r2["id"]?>">წაშლა</a></th>
			</tr>
<?php
	}
?>
		</tbody>
</table>
		</div>
	</div>
</div>
