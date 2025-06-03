<?php

$a=mysqli_real_escape_string($con,$_GET["id"]??"");


$T=time();

if($a!=""){
	$q1=mysqli_query($con,"SELECT * FROM articles WHERE id='".$a."' AND news=1");
	$r1=mysqli_fetch_array($q1);
}else{

	$ina=mysqli_query($con,"INSERT INTO articles (date,authorid,news) VALUES ('$T','$Guid',1) ");

	$dd=mysqli_query($con, "SELECT id FROM articles WHERE news=1 ORDER BY id DESC");
	$rd=mysqli_fetch_array($dd);
	//$aid=mysqli_insert_id($con);
	$a=$rd['id'];
	
	 
	
	?>
	
<script>location.href="?page=post&id=<?=$a?>"</script>
<?php

}
      $c=1;
	  for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
 $lng=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND tableName='articles' AND  tableColumn='title' AND tableId='$a' ");
 $lng1=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND tableName='articles' AND  tableColumn='text' AND tableId='$a' ");
 $lng2=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND tableName='articles' AND  tableColumn='description' AND tableId='$a' ");
 $lng3=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND tableName='articles' AND  tableColumn='keywords' AND tableId='$a' ");
 $lng4=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND tableName='articles' AND  tableColumn='shorttext' AND tableId='$a' ");
   if(mysqli_num_rows($lng)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , tableName='articles' , tableColumn='title' , tableId='$a'  ");
   }
   
    if(mysqli_num_rows($lng1)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , tableName='articles' , tableColumn='text' , tableId='$a'  ");
   }
   
    if(mysqli_num_rows($lng2)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , tableName='articles' , tableColumn='description' , tableId='$a'  ");
   }
    if(mysqli_num_rows($lng3)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , tableName='articles' , tableColumn='keywords' , tableId='$a'  ");
   }
     if(mysqli_num_rows($lng4)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , tableName='articles' , tableColumn='shorttext' , tableId='$a'  ");
   }
	   }


?>
<div class="container">
 <br/>
   <div class="col-sm-10 mt-3 p-0">
    <div class='row'>

		<?php
	$c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
	
	<div class='col-sm-2' >

	    <button class='btn <?=$langdefaultarr[$z]=='1'?"btn-success":"btn-danger" ?>  ltab' d='<?=$c ?>' >  <?=$lnarr[$z] ?></button>
	  
	</div>
	   <?php
	   }
	   ?>
	</div>
   </div>

                                                
<h3 class="title mt-3">
    <span>
        news რედაქტირება 
    </span>
</h3>

<div class="row">
	<div class="col-sm-12 my-3 d-none">
	
		<a style="color:#FFF"  class="btn btn-primary svpr" >გადახედვა</a>
	
	</div>
</div>
<?php

 $a=mysqli_real_escape_string($con,$_GET["id"]??"");
 $q1=mysqli_query($con,"SELECT t1.*,  ". languages('articles','t1.id','title') ." ,
                                      ".languages('articles','t1.id','text') .",
                                      ".languages('articles','t1.id','description') .",
                                      ".languages('articles','t1.id','shorttext') .",
                                      ".languages('articles','t1.id','keywords') ."
									  FROM articles  AS t1 WHERE t1.id='".$a."'");
 $r1=mysqli_fetch_array($q1);
?>
<div role="tabpanel">
    <!-- Tab panes -->

   
 

	
    <div class="tab-content  itmcontainer" t='articles'>

        <div role="tabpanel" class="tab-pane active" id="georgian">
              	
<?php			   
             $c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
		

		
           <div class='enebi' d='<?=$c ?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '>
                       <label for="ge[sarchevi]" class="required">დასახელება <?=$lnshortarr[$z] ?></label>
                       <input class="form-control UPTS" value="<?=$r1["title".$lnshortarr[$z]] ?>" tp='' ln='<?=$lnshortarr[$z] ?>' rows="10"  id="ADLGE" name="title" cols="50">
		               <br>
               </div>		
	   <?php
	   }
	   ?>
	   
	       <div class="row nonTranslatedInput pad-no-sm">
        
        <div class="col-sm-12 pad-no-right pad-no-xs my-2">
            <label for="pdf">სიახლის სურათი</label> <small>800px/800px</small>

<div class="input-append row">
					<div class="col-md-9">
						<input id="YDA9767032" class="form-control UPT" t="articles" n="img" d="<?=$a ?>" placeholder="სურათი 1" type="text" value="<?=$r1["img"]?>">		
					</div>
					&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA9767032&relative_url=0')"><button class="btn iframe-btn btn-outline-success">არჩევა</button></a>
				</div>
  
        </div>
		<br>&nbsp;




    

    </div>
				   
<input class="form-control UPTS d-none" value="<?=$r1["slug"] ?>" rows="10" data-locale="ge" tp='' ln='' id="SLGGE" name="slug" cols="50" placeholder='slug' />
		<br>
		

   <?php
     $c=0;
         for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
        <div class='enebi' d='<?=$c ?>' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>  '>
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">მოკლეტექსტი <?=$lnshortarr[$z] ?></label>

               <textarea id="ADTENG<?=$z ?>"  ln='<?=$lnshortarr[$z] ?>' style="width:100%;" class='UPTS ' tp='' name='shorttext' placeholder="აღწერა <?=$lnshortarr[$z] ?>"><?=$r1["shorttext".$lnshortarr[$z]] ?></textarea>
  
            </div>     
		</div>	
	<?php
	   }
   		?>			
		
		<br/>
		
		 <?php			   
       $c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
        <div class='enebi' d='<?=$c ?>' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>'>
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">ტექსტი <?=$lnshortarr[$z] ?></label>

               <textarea id="ADTENG<?=$z ?>" tiny='1' ln='<?=$lnshortarr[$z] ?>' class='UPTS tnmc' tp='' name='text' placeholder="ტექსტი <?=$lnshortarr[$z] ?>"><?=$r1["text".$lnshortarr[$z]] ?></textarea>
  
            </div>     
		</div>	
		
	<?php
	   }
	   ?>
	   <br/>
	   <h1>სეო</h1>
	   <?php
     $c=0;
         for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
        <div class='enebi' d='<?=$c ?>' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>  '>
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">აღწერა <?=$lnshortarr[$z] ?></label>

               <textarea id="ADTENG<?=$z ?>"  ln='<?=$lnshortarr[$z] ?>' style="width:100%;" class='UPTS ' tp='' name='description' placeholder="აღწერა <?=$lnshortarr[$z] ?>"><?=$r1["description".$lnshortarr[$z]] ?></textarea>
  
            </div>     
		</div>	
	<?php
	   }
   					
             
	   $c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
		

		
           <div class='enebi' d='<?=$c ?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '>
                       <label for="ge[sarchevi]" class="required">keywords <?=$lnshortarr[$z] ?></label>
                       <input class="form-control UPTS" value="<?=$r1["keywords".$lnshortarr[$z]] ?>" tp='' ln='<?=$lnshortarr[$z] ?>' rows="10"  id="ADLGE" name="keywords" cols="50">
		               <br>
           </div>		
			   
			   
			   
	   <?php
	   }
	   ?>	   
            </div>

        
   

	<div class="row">
		<div class="col-sm-2">
			<label for="ACA">აირჩიეთ ავტორი</label>
		</div>
		<div class="col-sm-4">
			<select class="form-control UPTS" name="authorid" tp='' ln='' >
			<option <?=$r1["category"]==0?"selected":""?> value='0' >აირჩიეთ ავტორი</option>
<?php
$q2=mysqli_query($con,"SELECT t1.* FROM admins AS t1 ORDER BY t1.Id DESC");
while($r2=mysqli_fetch_array($q2)){
?>
				<option <?=$r1["authorid"]==$r2["Id"]?"selected":""?> value="<?=$r2["Id"]?>"><?=$r2["firstname"] ?> <?=$r2["lastname"] ?> </option>
<?php
}
?>				
			</select>
		</div>
		
		
		
		
		
	
	</div>	

<br/>





	<div class="row">
		<div class="col-sm-2">
			<label for="ACA">აირჩიეთ კატეგორია</label>
		</div>
		<div class="col-sm-4">
			<select class="form-control UPTS" name="category" tp='' ln='' >
			<option <?=$r1["category"]==0?"selected":""?> value='0' >აირჩიეთ კატეგორია</option>
<?php
$q2=mysqli_query($con,"SELECT t1.*, ". languages('categories','t1.id','name') ." FROM categories AS t1 WHERE t1.type IN(SELECT id FROM ctypes WHERE name='news') AND t1.active='1'  ORDER BY t1.id DESC");
while($r2=mysqli_fetch_array($q2)){
?>
				<option <?=$r1["category"]==$r2["id"]?"selected":""?> value="<?=$r2["id"]?>"><?=$r2["name".$lngdefname] ?> </option>
<?php
}
?>				
			</select>
		</div>
		<div class='col-sm-6'>
		<label>
		    აქტიური
		   <input type='checkbox' class='UPTS' name='active' tp='int' ln='' <?=$r1['active']=='1'?'checked':'' ?> class='aactv' />
		</label>   
		
	
	
		</div>
	</div>	
	
	
	
    <div class="submit my-4">
        <button  class="btn btn-success ADDITEMS" slug='1' t='articles' d="<?=$a?>">დამახსოვრება</button>
    </div>
    
    </div><!---qart--->

</div>





                    </div>
<script>
$(function(){
	tinymce.init({
	content_style:
    "@import url('/css/style.css?family=nino-mtavruli-normal&display=swap');",
	content_style:
    "@import url('/css/style.css?family=nino-mtavruli&display=swap');",
	content_style:
    "@import url('/css/style.css?family=nino-medium&display=swap');",
  font_formats:
    "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats; nino-mtavruli-normal=nino-mtavruli-normal; nino-mtavruli=nino-mtavruli; nino-medium=nino-medium;",	
		relative_urls: false,
	  selector: "textarea.tnmc",
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
<!---
   <script src="https://cdn.tiny.cloud/1/e0r6yrodxwtfnbylamb80z2mcl1xh83kabyvqlc0px4gryka/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
tinymce.init({
  selector: 'textarea',
  height: 400,
  menubar: true,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks advcode fullscreen',
    'insertdatetime media table powerpaste hr code'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code',
  	  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
	  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | responsivefilemanager | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
	  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
	setup : function(ed) {
		  ed.on('change keyup', function(e) {
			   //console.log('the event object ', e);
			   //console.log('the editor object ', ed);
			  // console.log('the content ', ed.getContent());
			  //console.log(ed.getContent());
			  func("updatetable","ptexts",$("#"+ed.id).attr("n"),ed.getContent(),$("#"+ed.id).attr("d"));
		  });
	},
  powerpaste_allow_local_images: true,
  powerpaste_word_import: 'prompt',
  powerpaste_html_import: 'prompt',
  content_css: '//www.tiny.cloud/css/codepen.min.css'
});

  </script> --->