<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="/admin/minipan/minipan.js"></script>
<style>
hr{
	margin-top:15px!important;
}
</style>
<div class='container-fluid'>
	<div class='row'>
		<div class='col-sm-12'>
			 
				<?php
				  $abt=mysqli_query($con,"SELECT * FROM about");
				
				   if(mysqli_num_rows($abt)==0)
				   {
					   mysqli_query($con,"INSERT INTO about SET logo='' ");
				
					   ?>
					   <script type='text/javascript'>
						  location.reload();
					   </script>
					   <?php
				   }
				   else
				   {
					   $rabt=mysqli_fetch_assoc($abt);
					   ?>
					   <div class='col-sm-2 mt-3 p-4' style="background: #f8f5f5d1;">
					   <input type='hidden' value='<?=$rabt["logo"]?>' n='logo' d='<?=$rabt['id']?>' t='about' id="YDA" class='YDA1'/> 
						   <img src="<?=$rabt["logo"]?>" class="mb-3" style="width:70px; border:2px" />
					
						<br/>
						<div>
					  
						 <button class="btn iframe-btn btn-outline-success FILESELECT" target="YDA">ლოგო</button>
					
					  </div>
					 </div>  
					   
					   <div class='col-sm-12 mt-3 d-none'>
					   <input type='hidden' value='<?=$rabt["slogo"]?>' n='slogo' d='<?=$rabt['id']?>' t='about' id="YDA2" class='YDA1'/> 
						   <img src="<?=$rabt["slogo"]?>" class="mb-3" style="width:70px; border:2px" />
					
						<br/>
						<div>
					  <a style='display:block; padding:0px;' href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA2&relative_url=0&fldr=logo')">
						 <button class="btn iframe-btn btn-outline-success">პატარა Title-ის ლოგო</button>
					  </a>
					  </div>
					 </div>  
					   
					   <?php
				   }   
				   
				   ?>
		</div>		   		
		<div class='col-sm-3 mt-2'>
		<div class='row'>
		<div class='col-sm-12 mt-2'>
			<input class="form-control UPTNO d-none" placeholder="Instagram Page Link" n="instagram" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["instagram"]?>"/>
		</div>	   		
		<div class='col-sm-12 mt-2'>
			<input class="form-control UPTNO" placeholder="Facebook Page Link" n="facebook" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["facebook"]?>" />
		</div>	   		
		<div class='col-sm-12 mt-2 d-none'>
			<input class="form-control UPTNO" placeholder="Twitter Page Link" n="twitter" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["twitter"]?>" />
		</div>	   		
		<div class='col-sm-12 mt-2 d-none'>
			<input class="form-control UPTNO" placeholder="Linkedin Page Link" n="linkedin" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["linkedin"]?>" />
		</div>	   		
		<div class='col-sm-12 mt-2 d-none'>
			<input class="form-control UPTNO" placeholder="Youtube Page Link" n="youtube" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["youtube"]?>" />
		</div>   		
		<div class='col-sm-12 mt-2'>
			<label>Address GE</label>
			<input class="form-control UPTNO" placeholder="Youtube Page Link" n="address_ka" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["address_ka"]?>" />
		</div>		
		<div class='col-sm-12 mt-2'>
			<label>Address En</label>
			<input class="form-control UPTNO" placeholder="Youtube Page Link" n="address_en" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["address_en"]?>" />
		</div>		
		<div class='col-sm-12 mt-2'>
			<label>Company Name GE</label>
			<input class="form-control UPTNO" placeholder="Youtube Page Link" n="companyname_ka" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["companyname_ka"]?>" />
		</div>		
		<div class='col-sm-12 mt-2'>
			<label>Company Name En</label>
			<input class="form-control UPTNO" placeholder="Youtube Page Link" n="companyname_en" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["companyname_en"]?>" />
		</div>		
		<div class='col-sm-12 mt-2'>
			<label>Company ID</label>
			<input class="form-control UPTNO" placeholder="Companid" n="companyid" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["companyid"]?>" />
		</div>			
		<div class='col-sm-12 mt-2'>
			<label>Website</label>
			<input class="form-control UPTNO" placeholder="Website" n="website" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["website"]?>" />
		</div>		
		<div class='col-sm-12 mt-2'>
			<label>Working Hours GE</label>
			<input class="form-control UPTNO" placeholder="Youtube Page Link" n="hours_ka" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["hours_ka"]?>" />
		</div>	
		<div class='col-sm-12 mt-2'>
			<label>Working Hours EN</label>
			<input class="form-control UPTNO" placeholder="Youtube Page Link" n="hours_en" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["hours_en"]?>" />
		</div>		
		<div class='col-sm-12 mt-2'>
			<label>Mobile</label>
			<input class="form-control UPTNO" placeholder="Youtube Page Link" n="mobile" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["mobile"]?>" />
		</div>		
		<div class='col-sm-12 mt-2'>
			<label>Email</label>
			<input class="form-control UPTNO" placeholder="Youtube Page Link" n="email" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["email"]?>" />
		</div>		
		<div class='col-sm-12 mt-2'>
			<label>Price</label>
			<input class="form-control UPTNO" placeholder="Price" n="price" t="about" d="<?=$rabt['id']?>" value="<?=$rabt["price"]?>" />
		</div>		
		</div>		
		</div>	

<hr/>
<h2>ბანერები</h2>
		<div class="col-7 mt-2">
			<label>მთავრი შუა ბანერი ka</label>
<div class="input-group">
<input type="text" class="form-control UPT " d="<?=$rabt["id"]?>"  n="mainimage1ka" t="about"  value="<?=isset($rabt["mainimage1ka"])?$rabt["mainimage1ka"]:""?>" id="YDA121ka" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary YDA121ka" type="button" id="minipan">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.YDA121ka').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#YDA121ka',
		});
	});
</script>
		</div>
		<div class="col-7 mt-2">
			<label>მთავრი შუა ბანერი en</label>
<div class="input-group">
<input type="text" class="form-control UPT " d="<?=$rabt["id"]?>"  n="mainimage1en" t="about"  value="<?=isset($rabt["mainimage1en"])?$rabt["mainimage1en"]:""?>" id="YDA121en" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary YDA121en" type="button" id="minipan">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.YDA121en').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#YDA121en',
		});
	});
</script>
		</div>
		<div class="col-7 mt-2">
			<label>მთავრი შუა ბანერი Mobile ka</label>
<div class="input-group">
<input type="text" class="form-control UPT " d="<?=$rabt["id"]?>"  n="mainimage1mobka" t="about"  value="<?=isset($rabt["mainimage1mobka"])?$rabt["mainimage1mobka"]:""?>" id="YDA121kamob" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary YDA121kamob" type="button" id="minipan">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.YDA121kamob').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#YDA121ka',
		});
	});
</script>
		</div>
		<div class="col-7 mt-2">
			<label>მთავრი შუა ბანერი Mobile en</label>
<div class="input-group">
<input type="text" class="form-control UPT " d="<?=$rabt["id"]?>"  n="mainimage1moben" t="about"  value="<?=isset($rabt["mainimage1moben"])?$rabt["mainimage1moben"]:""?>" id="YDA121enmob" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary YDA121enmob" type="button" id="minipan">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.YDA121enmob').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#YDA121en',
		});
	});
</script>
		</div>
		<div class="col-7 mt-2">
			<label>მთავრი ქვედა მარცხენა ბანერი ka</label>
<div class="input-group">
<input type="text" class="form-control UPT " d="<?=$rabt["id"]?>"  n="mainimage2ka" t="about"  value="<?=isset($rabt["mainimage2ka"])?$rabt["mainimage2ka"]:""?>" id="YDA122ka" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary YDA122ka" type="button" id="minipan">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.YDA122ka').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#YDA122ka',
		});
	});
</script>
		</div>
		<div class="col-7 mt-2">
			<label>მთავრი ქვედა მარცხენა ბანერი en</label>
<div class="input-group">
<input type="text" class="form-control UPT " d="<?=$rabt["id"]?>"  n="mainimage2en" t="about"  value="<?=isset($rabt["mainimage2en"])?$rabt["mainimage2en"]:""?>" id="YDA122en" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary YDA122en" type="button" id="minipan">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.YDA122en').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#YDA122en',
		});
	});
</script>
		</div>
		<div class="col-7 mt-2">
			<label>მთავრი ქვედა მარჯვენა ბანერი ka</label>
<div class="input-group">
<input type="text" class="form-control UPT " d="<?=$rabt["id"]?>"  n="mainimage3ka" t="about"  value="<?=isset($rabt["mainimage3ka"])?$rabt["mainimage3ka"]:""?>" id="YDA123ka" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary YDA123ka" type="button" id="minipan">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.YDA123ka').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#YDA123ka',
		});
	});
</script>
		</div>	
		<div class="col-7 mt-2">
			<label>მთავრი ქვედა მარჯვენა ბანერი en</label>
<div class="input-group">
<input type="text" class="form-control UPT " d="<?=$rabt["id"]?>"  n="mainimage3en" t="about"  value="<?=isset($rabt["mainimage3en"])?$rabt["mainimage3en"]:""?>" id="YDA123en" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary YDA123en" type="button" id="minipan">არჩევა</button>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.YDA123en').minipan({
			url:'minipan/index.php',
			width:1000,
			modal:'fancybox',
			target:'#YDA123en',
		});
	});
</script>
		</div>	


		<div class='col-sm-12 mt-2 my-5'>
			<button class="btn btn-success SAVESET">დამახსოვრება</button>
		</div>		
	</div>	
</div>	
<script>
$(function(){
	tinymce.init({
  font_formats:
    "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats; nino-mtavruli-normal=nino-mtavruli-normal; nino-mtavruli=nino-mtavruli; nino-medium=nino-medium;",	
		relative_urls: false,
	  selector: "textarea",
	  height:"400",
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

		setup : function(ed) {
			  ed.on('change keyup', function(e) {
				   //console.log('the event object ', e);
				   //console.log('the editor object ', ed);
				  // console.log('the content ', ed.getContent());
				  //console.log(ed.getContent());
				  func("updatetable","ptexts",$("#"+ed.id).attr("n"),ed.getContent(),$("#"+ed.id).attr("d"));
			  });
		},
		external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}
	  
	});	
});

</script>

<script src="js/tinymce/tinymce.min.js"></script>	   