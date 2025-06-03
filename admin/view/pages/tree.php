<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
<div class="dd">
    <ol class="dd-list">
<?php
$q1=mysqli_query($con,"SELECT t1.*,(SELECT count(t2.id) FROM categories as t2 WHERE t2.pid=t1.id) as 'children',(SELECT column_value FROM langs WHERE shortname='ka' AND table_name='categories' AND table_column='name' AND table_id=t1.id LIMIT 1) as 'title' FROM categories as t1  WHERE t1.pid=0");
while($r1=mysqli_fetch_array($q1)){
?>
        <li class="dd-item" data-id="<?=$r1["id"]?>">
            <div class="dd-handle"><?=$r1["title"]?></div>
<?php
if($r1["children"]>0){
	$q2=mysqli_query($con,"SELECT t1.*,(SELECT count(t2.id) FROM categories as t2 WHERE t2.pid=t1.id) as 'children',(SELECT column_value FROM langs WHERE shortname='ka' AND table_name='categories' AND table_column='name' AND table_id=t1.id LIMIT 1) as 'title' FROM categories as t1  WHERE t1.pid='".$r1["id"]."'");
?>
            <ol class="dd-list">
<?php
	while($r2=mysqli_fetch_array($q2)){
?>
        <li class="dd-item" data-id="<?=$r2["id"]?>">
            <div class="dd-handle"><?=$r2["title"]?></div>
<?php
if($r2["children"]>0){
	$q3=mysqli_query($con,"SELECT t1.*,(SELECT count(t2.id) FROM categories as t2 WHERE t2.pid=t1.id) as 'children',(SELECT column_value FROM langs WHERE shortname='ka' AND table_name='categories' AND table_column='name' AND table_id=t1.id LIMIT 1) as 'title' FROM categories as t1  WHERE t1.pid='".$r2["id"]."'");
?>
            <ol class="dd-list">
<?php
	while($r3=mysqli_fetch_array($q3)){
?>
        <li class="dd-item" data-id="<?=$r3["id"]?>">
            <div class="dd-handle"><?=$r3["title"]?></div>
<?php
if($r3["children"]>0){
	$q4=mysqli_query($con,"SELECT t1.*,(SELECT count(t2.id) FROM categories as t2 WHERE t2.pid=t1.id) as 'children',(SELECT column_value FROM langs WHERE shortname='ka' AND table_name='categories' AND table_column='name' AND table_id=t1.id LIMIT 1) as 'title' FROM categories as t1  WHERE t1.pid='".$r3["id"]."'");
?>
            <ol class="dd-list">
<?php
	while($r4=mysqli_fetch_array($q4)){
?>
        <li class="dd-item" data-id="<?=$r4["id"]?>">
            <div class="dd-handle"><?=$r4["title"]?></div>
                </li>
<?php
	}
?>
            </ol>
<?php
}
?>
                </li>
<?php
	}
?>
            </ol>
<?php
}
?>
                </li>
<?php
	}
?>
            </ol>
<?php
}
?>
        </li>
<?php	
}
?>
        <!--<li class="dd-item" data-id="1">
            <div class="dd-handle">Item 1</div>
        </li>
        <li class="dd-item" data-id="2">
            <div class="dd-handle">Item 2</div>
        </li>
        <li class="dd-item" data-id="3">
            <div class="dd-handle">Item 3</div>
            <ol class="dd-list">
                <li class="dd-item" data-id="4">
                    <div class="dd-handle">Item 4</div>
                </li>
                <li class="dd-item" data-id="5" data-id="5">
                    <div class="dd-handle">Item 5</div>
                </li>
            </ol>
        </li>-->
    </ol>
</div>
<script >
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if(window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            }
            else {
                output.val('JSON browser support required for this demo.');
            }
        };
$('.dd').nestable({ /* config options */ }).on('change', $("footer").html($('.dd').data('output', $('#nestable2-output'))));
</script>
<footer>

</footer>