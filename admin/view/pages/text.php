<?php
$a=(int)$_GET["id"];

$cat=mysqli_query($con,"SELECT t1.*, (SELECT name FROM ctypes WHERE id=t1.type) AS cname FROM categories AS t1 WHERE t1.id='$a' AND t1.type=(SELECT id FROM ctypes WHERE name='text' )");
if(mysqli_num_rows($cat)>0)
{

$q=mysqli_query($con,"SELECT t1.*, ". languages('textpages','t1.id','text')  .", 
                                      ". languages('textpages','t1.id','title')  .",
									  ". languages('textpages','t1.id','description')  .", 
									  ". languages('textpages','t1.id','keywords')  ." 
                                       									 
 								       FROM textpages AS t1 WHERE t1.category='$a'  ORDER BY t1.id DESC LIMIT 1");
if(mysqli_num_rows($q)<1)
{
	mysqli_query($con,"INSERT INTO textpages SET category='$a' ");
	?>
	<script>
	  location.reload();
	</script>
	<?php
	
}
else
{
	$dat=mysqli_fetch_assoc($q);
	$c=0;
	  for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
$lng=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND table_name='textpages' AND  table_column='text' AND table_id='".$dat['id']."' ");
$lng1=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND table_name='textpages' AND  table_column='title' AND table_id='".$dat['id']."' ");
$lng3=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND table_name='textpages' AND  table_column='description' AND table_id='".$dat['id']."' ");
$lng4=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND table_name='textpages' AND  table_column='keywords' AND table_id='".$dat['id']."' ");

        if(mysqli_num_rows($lng)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , table_name='textpages' , table_column='text' , table_id='".$dat['id']."'   ");
   }
       if(mysqli_num_rows($lng1)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , table_name='textpages' , table_column='title' , table_id='".$dat['id']."'   ");
   }
	   
        if(mysqli_num_rows($lng3)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , table_name='textpages' , table_column='description' , table_id='".$dat['id']."'   ");
   }

        if(mysqli_num_rows($lng4)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , table_name='textpages' , table_column='keywords' , table_id='".$dat['id']."'   ");
   }   
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

<?php			   
             $c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
		

		
           <div class='enebi' d='<?=$c ?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '>
                       <label for="ge[sarchevi]" class="required">დასახელება <?=$lnshortarr[$z] ?></label>
                       <input class="form-control UPTS" value="<?=$dat["title".$lnshortarr[$z]] ?>" tp='' ln='<?=$lnshortarr[$z] ?>' rows="10"  id="ADLGE" name="title" cols="50">
		               <br>
           </div>		
			   
			   
			   
	   <?php
	   }
	   ?>



    <div role="tabpanel">
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="georgian">
           


                <br/>
              
						 <?php			   
       $c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
        <div class='enebi' d='<?=$c ?>' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>  '>
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">ტექსტი <?=$lnshortarr[$z] ?></label>

               <textarea id="ADTENG<?=$z ?>" tiny='1' ln='<?=$lnshortarr[$z] ?>' class='UPTS tnmc' tp='' name='text' placeholder="ტექსტი <?=$lnshortarr[$z] ?>"><?=$dat["text".$lnshortarr[$z]] ?></textarea>
  
            </div>     
		</div>	
	<?php
	   }
   			
        $c=0;
         for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
        <div class='enebi' d='<?=$c ?>' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>  '>
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">აღწერა <?=$lnshortarr[$z] ?></label>

               <textarea id="ADTENG<?=$z ?>"  ln='<?=$lnshortarr[$z] ?>' style="width:100%;" class='UPTS ' tp='' name='description' placeholder="აღწერა <?=$lnshortarr[$z] ?>"><?=$dat["description".$lnshortarr[$z]] ?></textarea>
  
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
                       <input class="form-control UPTS" value="<?=$dat["keywords".$lnshortarr[$z]] ?>" tp='' ln='<?=$lnshortarr[$z] ?>' rows="10"  id="ADLGE" name="keywords" cols="50">
		               <br>
           </div>		
			   
			   
			   
	   <?php
	   }
	   ?>

            </div>
        </div>
		

		
        </div>

        <div class="submit my-4">
            <button  class="btn btn-success ADDITEMS" t='textpages' d="<?=$dat['id'] ?>">დამახსოვრება</button>
        </div>
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
            // setup : function(ed) {
            //     ed.on('change keyup', function(e) {
            //         func("updatetable","ptexts",$("#"+ed.id).attr("n"),ed.getContent(),$("#"+ed.id).attr("d"));
            //     });
            // },
            external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}
        });
    });
</script>
<script src="js/tinymce/tinymce.min.js"></script>
<?php
}
?>