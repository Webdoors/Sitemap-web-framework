<?php
$z=isset($_GET["lang"])?$_GET["lang"]:"ka";
$L=$z;
$q1=mysqli_query($con,"SELECT * FROM aboutus WHERE id='".$_GET["id"]."' ");
$r1=mysqli_fetch_array($q1);
?>
<div class="container">
<div class="row">

	<div class="col-sm-12 mt-4">

<ul class="nav nav-tabs">
<?php
$flags=["ka"=>"ge","en"=>"gb","ru"=>"ru"];
$q4=mysqli_query($con,"SELECT * FROM languages WHERE active=1");
while($r4=mysqli_fetch_array($q4)){
?>
  <li class="nav-item me-1">
 <a href="?page=aboutus&lang=<?=$r4["shortname"]?>&hidemenu=<?=(isset($_GET["hidemenu"])?$_GET["hidemenu"]:"")?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=$flags[$r4["shortname"]]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>
	</div>

    <h3 class="title mt-3">
    <span>
        ჩვენს შესახებ
    </span>
    </h3>


<div class="itmcontainer" t='aboutus'  d="<?=$r1['id'] ?>">
    <div role="tabpanel">
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="georgian">
           


                <br/>
              

	    <div class='enebi' d='<?=$c ?>' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">სათაური <?=$L ?></label>

               <input type="text"  ln='<?=$L ?>' class='form-control UPTNO' tp='' t="aboutus" d="<?=$r1["id"]?>" n="name_<?=$L?>" name='title' placeholder="title <?=$L ?>" value="<?=$r1["name_".$L] ?>" />
  
            </div>     
		</div>	
		<div class='enebi' d='<?=$c ?>' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">მოკლე ტექსტი <?=$L ?></label>

               <textarea id="ADTENG<?=$z ?>"  ln='<?=$L ?>' class='UPTNO form-control' t="aboutus" d="<?=$r1["id"]?>"  n='description_<?=$L?>'  style="width:100%" placeholder="SHORTTEXT <?=$L ?>"><?=$r1["description_".$L] ?></textarea>
  
            </div>     
		</div>	

	    <div class='enebi' d='<?=$c ?>' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">სურათი <?=$L ?></label>
			   
<div class="input-group">
<input type="text" class="form-control UPTNO" d="<?=$r1["id"]?>" placeholder="სურათის ლინკი"  n="img_<?=$L?>" t="aboutus"  value="<?=$r1["img_".$L]?>" id="example4<?=$r1["id"]?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" target="example4<?=$r2["id"]?>" type="button" id="minipan">არჩევა</button>
</div>
  
            </div>     
		</div>	
	
        <div class='enebi' d='<?=$c ?>'>
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">ტექსტი <?=$L ?></label>

               <textarea id="ADTENG<?=$z ?>" tiny='1' ln='<?=$L ?>' class='UPTNO tnm' t="aboutus" d="<?=$r1["id"]?>"  n='text_<?=$L?>' placeholder="TEXT <?=$L ?>"><?=$r1["text_".$L] ?></textarea>
  
            </div>     
		</div>	

            </div>
        </div>
        </div>

        <div class="submit my-4">
            <button  class="btn btn-success SAVESET" t='aboutus' msg="შენახულია" d="<?=$r1['id'] ?>">დამახსოვრება</button>
        </div>
       </div>
    </div>
</div>

<script>
    $(function(){
        tinymce.init({
            relative_urls: false,
            selector: ".tnm",
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