<?php
$d=(int)$_GET['d'];
    $srt=mysqli_query($con,"SELECT * FROM services WHERE id='$d' ");
 $rsrt=mysqli_fetch_assoc($srt);
?>
<div class='container'>
<div class="row">
<label>სათაური</label>
 <input type='text' value='<?=$rsrt['name'] ?>' placeholder='სათაური' class='form-control UPT' t='services' n='name' d='<?=$d ?>' ></input>
</div>



<?php

  

?>
<div class='row'>     
<div>
<br/>
<label>
   ფასი ₾
</label>
<div>
<input type='number' min='0' class='form-control UPT'  placeholder='ფასი' value='<?=$rsrt['price'] ?>' t='services' n='price' d='<?=$d ?>'  />
</div>
</div>
</div>

<div class='row'>     
<div>
<br/>
<label>
   ტექსტი
</label>
<div>
<textarea class="UPT  form-control TNN" t='services' n="description"  d='<?=$d ?>' value="" placeholder="Page description" ><?=$rsrt['description'] ?></textarea>
</div>
</div>
</div>

<div class='row'>     
<div>
<br/>
<label>
   აქტივაცია
</label>
<div>
<input type='checkbox' class='UPT' t='services' n="active" <?=($rsrt['active']!=1?'':'checked') ?>  d='<?=$d ?>'>
</div>
</div>
</div>


</div>
<script>
$(function(){
	tinymce.init({
		relative_urls: false,
	  selector: ".TNN",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],

	  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
	  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | responsivefilemanager | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
	  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

	  menubar: false,
	  toolbar_items_size: 'small',

	  style_formats: [{
		title: 'Bold text',
		inline: 'b'
	  }, {
		title: 'Red text',
		inline: 'span',
		styles: {
		  color: '#ff0000'
		}
	  }, {
		title: 'Red header',
		block: 'h1',
		styles: {
		  color: '#ff0000'
		}
	  }, {
		title: 'Example 1',
		inline: 'span',
		classes: 'example1'
	  }, {
		title: 'Example 2',
		inline: 'span',
		classes: 'example2'
	  }, {
		title: 'Table styles'
	  }, {
		title: 'Table row 1',
		selector: 'tr',
		classes: 'tablerow1'
	  }],
		setup : function(ed) {
			  ed.on('change keyup', function(e) {
				   //console.log('the event object ', e);
				   //console.log('the editor object ', ed);
				  // console.log('the content ', ed.getContent());
				  //console.log(ed.getContent());
				  func("updatetable",$(".TNN").attr('t'),$("#"+ed.id).attr("n"),ed.getContent(),$(".TNN").attr('d'));
			  });
		},
		external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}

	});
});

</script>
<script src="js/tinymce/tinymce.min.js"></script>

