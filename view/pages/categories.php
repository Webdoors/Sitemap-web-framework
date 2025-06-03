<script src="https://cdn.jsdelivr.net/npm/macy@2"></script>
<div class="container-fluid mt-3">
	<div id="macy-container">

<?php
$q2=mysqli_query($con,"SELECT * FROM categories WHERE pid='0' ORDER BY position DESC ");
while($r2=mysqli_fetch_array($q2)){
?>
		<a class="demo" href="/products/<?=$r2["slug"]?>" macy-complete="1">
			<img class="w-100" src="<?=$r2["img"]?>"/>
			<div class="CATT"><?=$r2["name"]?></div>
		</a>
<?php	
}
?>

	</div>
</div>
</div>
<script>
var macy = Macy({
    container: '#macy-container',
    trueOrder: false,
    waitForImages: false,
    margin: 24,
    columns: 3,
    breakAt: {
        1200: 5,
        940: 3,
        520: 2,
        400: 1
    }
});
</script>