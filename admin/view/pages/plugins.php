<?php
$file_path = '../view/inc/plugins.php';

// Check if the file exists
if (file_exists($file_path)) {
    // Read the contents of the file
    $file_contents = file_get_contents($file_path);

    // Output the contents

} else {
    echo "File not found: $file_path";
}
?>
<div class="container h-100">
	<div class="row h-100">
		<div class="col-12 h-100 mt-5">
			<textarea class="form-control PLUGINS" style="height:700px"><?=$file_contents?></textarea>
		</div>
		<div class="col-12 h-100 mt-3">
			<a class="btn btn-success SAVEPLUGINS">დამახსოვრება</a>
		</div>
	</div>
</div>
<script>
$(document).on("click",".SAVEPLUGINS",function(){

		bootbox.confirm({
			message: "Are you sure?",
			buttons: {
				confirm: {
					label: 'Yes',
					className: 'btn-success'
				},
				cancel: {
					label: 'No',
					className: 'btn-danger'
				}
			},
			callback: function (result) {
				if(result){
					func2("saveplugins",{plugins:$(".PLUGINS").val()},function(){
						wr();
					});	
				}
			}
		});

});
</script>