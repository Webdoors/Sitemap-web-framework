<?php	
	$id=mysqli_real_escape_string($con,isset($_GET["id"])?$_GET["id"]:"");
	$a=$id;
	$L=mysqli_real_escape_string($con,isset($_GET["lang"])?$_GET["lang"]:"ka");
	$q2=mysqli_query($con,"SELECT * FROM sitemap WHERE id='".$id."' ");
	$r2=mysqli_fetch_array($q2);
?>

<div class="container mt-3">
    <div class='row'>

	<div class="col-sm-12">

<ul class="nav nav-tabs">
<?php
$flags=["ka"=>"ge","en"=>"gb","ru"=>"ru","fr"=>"fr"];
$q4=mysqli_query($con,"SELECT * FROM languages");
while($r4=mysqli_fetch_array($q4)){
?>
  <li class="nav-item me-1">
 <a href="?page=sitemapedit&id=<?=$a?>&lang=<?=$r4["shortname"]?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=$flags[$r4["shortname"]]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>
	</div>
	</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Img</small>
	</div>
	<div class="col-sm-7">

<div class="input-group">
<input type="text" class="form-control UPT" d="<?=$r2["id"]?>" n="img<?=$L?>" t="sitemap" value="<?=$r2["img".$L]?>" onchange="$('.IMAG<?=$a ?>').attr('src',$(this).val());"  id="example<?=$a ?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" target="example<?=$a ?>" type="button" id="minipan">არჩევა</button>
</div>
</div>

	</div>
</div>

<div class="row my-3">
	<div class="col-sm-2">
		<small>Slug <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<input class="form-control UPTNO" d="<?=$r2["id"]?>" n="slug_<?=$L?>" t="sitemap" value="<?=$r2["slug_".$L]?>"/>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Name <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=$r2["id"]?>" n="name_<?=$L?>" t="sitemap" /><?=$r2["name_".$L]?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Title <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=$r2["id"]?>" n="title_<?=$L?>" t="sitemap" /><?=$r2["title_".$L]?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Description <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=$r2["id"]?>" n="description_<?=$L?>" t="sitemap" /><?=$r2["description_".$L]?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Keywords <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=$r2["id"]?>" n="keywords_<?=$L?>" t="sitemap" /><?=$r2["keywords_".$L]?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Schema <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=$r2["id"]?>" n="schema_<?=$L?>" t="sitemap" /><?=$r2["schema_".$L]?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Text <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO ADTGE TEXTIA" id="TEXTIA" d="<?=$r2["id"]?>" tiny="1" n="text_<?=$L?>" t="sitemap" /><?=$r2["text_".$L]?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Slogan <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=$r2["id"]?>" n="slogan_<?=$L?>" t="sitemap" /><?=$r2["slogan_".$L]?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Item Type <?=$L?></small>
	</div>
	<div class="col-sm-7">
<select class="UPTNO form-control" d="<?=$r2["id"]?>" n="itemtype" t="sitemap" ><option value=""  >ტიპი</option>
<?php
$q4=mysqli_query($con,"SELECT * FROM itemtypes");
while($r4=mysqli_fetch_array($q4)){
?>
<option value="<?=$r4["id"]?>" <?=$r4["id"]==$r2["itemtype"]?"selected":""?> ><?=$r4["nameka"]?></option>

<?php
}
?>			
			</select>
	</div>
</div>
<div class="row mt-3 mb-4">
	<div class="col-sm-12">
		<button class="btn btn-success SAVESET">Save</button>
	</div>	
</div>
</div>
<script>
$(function(){

	tinymce.init({
		selector: ".TEXTIA",
		height:"400",
  valid_elements: '*[*]', // Allow all elements
  extended_valid_elements: 'img[src|alt|title|width|height|style]',
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
		file_picker_callback: function(callback, value, meta) {
			// Open the custom file manager
			var fileManagerUrl = '/admin/filemanager'; // Adjust this to your file manager URL
			
			tinymce.activeEditor.windowManager.open({
				title: 'File Manager',
				url: fileManagerUrl,
				width: 900,  // Adjust width as needed
				height: 600, // Adjust height as needed
				buttons: [
					{
						text: 'Close',
						onclick: 'close'
					}
				]
			});
			window.addEventListener("message", function(event) {
				if (event.data.mceAction === 'insert') {
					var fileUrl = event.data.content;
	setTimeout(function() {
		console.log("File URL received:", fileUrl);
		callback(fileUrl);
		// Optionally, close the TinyMCE dialog
		tinymce.activeEditor.windowManager.close();
    }, 0);

				}
			});
		},
		content_style:
			"@import url('/css/style.css?family=nino-mtavruli-normal&display=swap');" +
			"@import url('/css/style.css?family=nino-mtavruli&display=swap');" +
			"@import url('/css/style.css?family=nino-medium&display=swap');",
		font_formats:
			"Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats; nino-mtavruli-normal=nino-mtavruli-normal; nino-mtavruli=nino-mtavruli; nino-medium=nino-medium;",	
		relative_urls: false,
		setup: function(ed) {
			ed.on('change keyup', function(e) {
				func("updatetable", "ptexts", $("#"+ed.id).attr("n"), ed.getContent(), $("#"+ed.id).attr("d"));
			});
		},
		// external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
		// filemanager_title:"Responsive Filemanager" ,
		// external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}
	});	
});
</script>

<script src="js/tinymce/tinymce.min.js"></script>