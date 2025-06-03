<?php



$q=mysqli_query($con,"SELECT t1.*, 
                                    
									  ". languages('seo','t1.id','description')  .", 
									  ". languages('seo','t1.id','keywords')  ." 
                                       									 
 								       FROM seo AS t1 WHERE   pagename='home'  ORDER BY t1.id DESC LIMIT 1");
if(mysqli_num_rows($q)<1)
{
	mysqli_query($con,"INSERT INTO seo SET pagename='home' ");
	
}
else
{
	$dat=mysqli_fetch_assoc($q);
	$c=0;
	  for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;

$lng3=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND tableName='seo' AND  tableColumn='description' AND tableId='".$dat['id']."' ");
$lng4=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND tableName='seo' AND  tableColumn='keywords' AND tableId='".$dat['id']."' ");


	   
        if(mysqli_num_rows($lng3)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , tableName='seo' , tableColumn='description' , tableId='".$dat['id']."'   ");
   }

        if(mysqli_num_rows($lng4)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , tableName='seo' , tableColumn='keywords' , tableId='".$dat['id']."'   ");
   }   
	   }
}   
?> 
<div class="container itmcontainer" t='seo'>

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

        
      

        <div class="submit my-4">
            <button  class="btn btn-success ADDITEMS" t='seo' d="<?=$dat['id'] ?>">დამახსოვრება</button>
        </div>
    </div>


<script>
    $(function(){
        tinymce.init({
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
