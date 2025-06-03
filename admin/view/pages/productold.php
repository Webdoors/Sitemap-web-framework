<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
 // error_reporting(E_ALL);
$a=mysqli_real_escape_string($con,$_GET["id"]);


$T=time();

if($a!=""){
	$q1=mysqli_query($con,"SELECT * FROM products WHERE id='".$a."' ");
	$r1=mysqli_fetch_array($q1);
}else{

	$ina=mysqli_query($con,"INSERT INTO products SET date='$T' ");

	// $dd=mysqli_query($con, "SELECT id FROM products  ORDER BY id DESC");
	// $rd=mysqli_fetch_array($dd);$a=$rd['id'];
	$a=mysqli_insert_id($con);
	
	$q1=mysqli_query($con,"SELECT * FROM products WHERE id='".$a."' ");
	$r1=mysqli_fetch_array($q1);	

	?>
	
<script>location.href="?page=product&id=<?=$a?>"</script>
<?php
	}
	
	
	
	      $c=0;
	  for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
 $lng=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND table_name='products' AND  table_column='title' AND table_id='$a' ");
 $lng1=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND table_name='products' AND  table_column='bigtext' AND table_id='$a' ");
 $lng2=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND table_name='products' AND  table_column='description' AND table_id='$a' ");
 $lng3=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND table_name='products' AND  table_column='keywords' AND table_id='$a' ");
 $lng4=mysqli_query($con, "SELECT id FROM langs WHERE shortname='".$lnshortarr[$z]."' AND table_name='products' AND  table_column='charachteristics' AND table_id='$a' ");
   if(mysqli_num_rows($lng)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , table_name='products' , table_column='title' , table_id='$a'  ");
   }
   
    if(mysqli_num_rows($lng1)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , table_name='products' , table_column='text' , table_id='$a'  ");
   }
   
    if(mysqli_num_rows($lng2)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , table_name='products' , table_column='description' , table_id='$a'  ");
   }
    if(mysqli_num_rows($lng3)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , table_name='products' , table_column='keywords' , table_id='$a'  ");
   } 
   if(mysqli_num_rows($lng4)<1)
   {
	   
	  
	   mysqli_query($con,"INSERT INTO langs SET shortname='".$lnshortarr[$z]."' , table_name='products' , table_column='charachteristics' , table_id='$a'  ");
   }
   
	   }
	
	
	
		$q10=mysqli_query($con,"SELECT * FROM ptexts WHERE pid='".$a."' ");
	$r10=mysqli_fetch_array($q10);
	$pid=$a;
	// var_dump($r1);
	$category=$r1["category"]??"";
?>
<div class="container">

<br/>
   <div class="col-sm-10 my-3 p-0">
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

                                                
<h3 class="title mt-3 mb-4 p-2">
    <span>
        პროდუქტის რედაქტირება 
    </span>
</h3>
	<div class="col-sm-12 my-3 d-none">
		<a target="_blank" href="/ka/product/<?=$r1["code"]?>"><button class="btn btn-primary">საიტზე პროდუქტის ნახვა</button></a>
	</div>
<div class="row d-none">
	<div class="col-sm-12 my-3">
	
		<a style="color:#FFF"  class="btn btn-primary svpr" ></a>
	
	</div>
</div>
<?php
$a=mysqli_real_escape_string($con,$_GET["id"]);
$q1=mysqli_query($con,"SELECT t1.*, ". languages('products','t1.id','title') .", 
                                    ". languages('products','t1.id','bigtext') .",
                                    ". languages('products','t1.id','description') .",
                                    ". languages('products','t1.id','keywords') .",
                                    ". languages('products','t1.id','charachteristics') ."
									FROM products AS t1 WHERE t1.id='".$a."'");
$r1=mysqli_fetch_array($q1);
?>
<div role="tabpanel">
    <!-- Tab panes -->
    <div class="tab-content col-sm-12">

                                <div role="tabpanel" class="tab-pane active" id="georgian">

        
		<br>
		<?php			   
             $c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
		

		
           <div class='enebi' d='<?=$c ?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '>
                       
                                <label for="ge[sarchevi]" class="required">დასახელება <?=$lnshortarr[$z] ?></label>
                                <input class="form-control INP" value="<?=$r1["title".$langdefaultarr[$z]]??""?>" n="title<?=$lnshortarr[$z] ?>" rows="10" data-locale="<?=$lnshortarr[$z] ?>" id="ADLGE" name="ADLGE" cols="50">
		               <br>
               </div>		
	   <?php
	   }
	 
		$c=0;
         for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
		<div class='enebi' d='<?=$c ?>' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>  '>
		
                                <label for="ge[sarchevi]" class="required">Keywords</label> 
<input class="form-control col-sm-12 INP" n="keywords<?=$lnshortarr[$z] ?>" value="<?=$r1["keywords".$lnshortarr[$z]]??""?>" rows="10" data-locale="<?=$lnshortarr[$z] ?>" id="SLGGE" name="SLGGE" cols="50">
		<br>
	</div>
	 <?php
	   }
?>	   
		
                                <label for="ge[sarchevi]" class="required">URL Sluug</label>
<input class="form-control col-sm-12 INP" n="slug" value="<?=$r1["slug"]??""?>" rows="10" data-locale="ge" id="SLGGE" name="SLGGE" cols="50">
		<br>
                                <label for="ge[sarchevi]" class="required">კოდი</label>
<input class="form-control col-sm-3 INP" n="code" value="<?=$r1["code"]??""?>" rows="10" data-locale="ge" id="SLGGE" name="SLGGE" cols="50">
		<br>
	
                                <label for="ge[sarchevi]" class="required">ფასი</label>
<input class="form-control col-sm-2 INP" n="price" value="<?=$r1["price"]??""?>" rows="10" data-locale="ge" id="SLGGE" name="SLGGE" placeholder="0.00" cols="50">
		<br>
	
                                <label for="ge[sarchevi]" class="required">რაოდენობა</label>
<input class="form-control col-sm-2 INP" n="instock" value="<?=$r1["instock"]??""?>" rows="10" data-locale="ge" id="SLGGE" placeholder="0.00" name="SLGGE" cols="50">
		<br>
		
				<?php
		$c=0;
         for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
        <div class='enebi' d='<?=$c ?>' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>  '>	
                                <label for="ge[sarchevi]" class="required">მახასიათებლები <?=$lnshortarr[$z] ?> </label>
<input class="form-control col-sm-6 INP" n="charachteristics" value="<?=$r1["charachteristics".$lnshortarr[$z]  ]??""?>" rows="10" data-locale="<?=$lnshortarr[$z] ?> " id="SLGGE" placeholder="მძიმით გამოყავით სიტყვები" name="SLGGE" cols="50">
		<br>
		</div>
		<?php
	   }
		$c=0;
         for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
        <div class='enebi' d='<?=$c ?>' style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?>  '>
                                <label for="ge[sarchevi]" class="required">მოკლე აღწერა <?=$lnshortarr[$z] ?>  (SEO DESC 160 letters)</label>
<textarea class="form-control col-sm-4 INP" n="smalldesc<?=$lnshortarr[$z] ?>"  rows="10" data-locale="ge" id="SLGGE" placeholder="" name="SLGGE" cols="50"><?=$r1["description".$lnshortarr[$z] ]??""?></textarea>
		<br>
   </div>
	   <?php
	   }
	   ?>
        <div class="col-sm-12 p-0 my-2">
            <label for="pdf">კატეგორია</label>
			<select class="form-control INP2 selectpicker" data-live-search="true"  multiple n="category" >
				<option value="">აირჩიეთ კატეგორია</option>
<?php
$q2=mysqli_query($con,"SELECT t1.*, ". languages('categories','t1.id','name') ." FROM categories AS t1  WHERE t1.type=(SELECT id FROM ctypes WHERE name='products') ORDER BY name ASC");
while($r2=mysqli_fetch_array($q2)){
	$catebi = explode(',',$r1["category"]);
?>
				<option <?=in_array($r2["id"], $catebi)?"selected":""?> value="<?=$r2["id"]?>"><?=$r2["name".$lngdefname]?></option>
<?php
}
?>
			</select>	
		</div>

        <div class="col-sm-12 p-0 my-2">
            <label for="pdf">პროდუქტის სურათების დამატება</label>

<div class="input-append row">
					<div class="col-md-9">
						<input id="YDA97670323" class="form-control PIMG" placeholder="სურათის ლინკი" type="text" value="">	
					</div>
					&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA97670323&relative_url=0')"><button class="btn iframe-btn btn-outline-success">Select</button></a>
					<button class="btn iframe-btn btn-success ADDIMG ml-2" d="<?=$a?>">დამატება</button>
				</div>
  
        </div>	
        <div class="col-sm-12 p-0 my-2">

<?php
$q2=mysqli_query($con,"SELECT * FROM productimgs WHERE productid='".$a."' ORDER BY id DESC ");
while($r2=mysqli_fetch_array($q2)){
	$iid=$r2["id"];
?>			<div class="row IMGS mb-2 pb-2">
<div class="col-sm-2">
	<img src="<?=$r2["img"]?>" style="height:50px"  />
</div>
<div class="col-sm-2">
	<label for="M<?=$iid?>">მთავარი </label><input type="checkbox" name="M" id="M<?=$iid?>" <?=$r2["main"]=="1"?"checked":""?> class="UPT2 ml-2" d="<?=$iid?>" t="productimgs" n="main"/>
</div>
<div class="col-sm-2">
	<button class="btn iframe-btn btn-danger  DGA ml-2" d="<?=$r2["id"]?>" n="productimgs"><i class="fa fa-trash text-light"></i></button>
</div>
<div class="col-sm-6">
</div>	</div>
<?php
}
?>
  
			
        </div>	
        <div class="col-sm-12 p-0 my-2">
            <label for="pdf">პროდუქტის ფაილების დამატება</label>

<div class="input-append row">
					<div class="col-md-9">
						<input id="YDA976703231" class="form-control PFILE" placeholder="ფაილის ლინკი" type="text" value="">	
					</div>
					&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=0&popup=1&field_id=YDA976703231&relative_url=0')"><button class="btn iframe-btn btn-outline-success">Select</button></a>
					<button class="btn iframe-btn btn-success ADDFILE ml-2" d="<?=$a?>">დამატება</button>
				</div>
  
        </div>	
        <div class="col-sm-12 p-0 my-2">

<?php
$q2=mysqli_query($con,"SELECT * FROM productfiles WHERE productid='".$a."' ORDER BY id DESC ");
while($r2=mysqli_fetch_array($q2)){
	$iid=$r2["id"];
	$file=explode("/",$r2["file"]);
	$file=end($file);
?>			<div class="row FILES mb-2 pb-2">
<div class="col-sm-2">
	<a target="_blank" href="<?=$r2["file"]?>" style="height:30px"  ><?=$file?></a>
</div>
<div class="col-sm-2">

</div>
<div class="col-sm-2">
	<button class="btn iframe-btn btn-danger  DGA ml-2" d="<?=$r2["id"]?>" n="productfiles"><i class="fa fa-trash text-light"></i></button>
</div>
<div class="col-sm-6">
</div>	</div>
<?php
}
?>
  
			
        </div>			
        <div class="col-sm-12 pad-no-right pad-no-xs my-2 NOP">
            <label for="pdf">მედია</label>

<div class="input-append row">
					<div class="col-md-9">
						<input id="YDA97670327" class="form-control" t="main" n="img1" d="1" placeholder="მედია" type="text" value="">		
					</div>
					&nbsp;<a href="javascript:open_popup('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=YDA97670327&relative_url=0')"><button class="btn iframe-btn btn-outline-success">Select</button></a>
				</div>
  
        </div>		
	<?php			   
             $c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
		

		
           <div class='enebi' d='<?=$c ?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '>
		              
                                <label for="pdf">ტექსტი <?=$lnshortarr[$z] ?></label>
                                <textarea id="ADTGE" class="ADTGE" placeholder="სიახლის ტექსტი"><?=$r1["bigtext".$lnshortarr[$z]]??""?></textarea>

					  <br>
               </div>		
	   <?php
	   }
	   ?>

               
            </div>

        
    </div>








	<div class="row">
		<div class="col-sm-2 d-none">
			<label for="ACA">აირჩიეთ კატეგორია</label>
		</div>
		<div class="col-sm-4 d-none">
			<select class="form-control ACA2 selectpicker" multiple name="ACA">
			<option <?=$r1["category"]==0?"selected":""?> value='0' >აირჩიეთ კატეგორია</option>
<?php
$q2=mysqli_query($con,"SELECT * FROM categories WHERE type=(SELECT id FROM ctypes WHERE name='products') ORDER BY id DESC");
while($r2=mysqli_fetch_array($q2)){
?>
				<option <?=$r1["category"]==$r2["id"]?"selected":""?> value="<?=$r2["id"]?>"><?=$r2["name"]!=""?$r2["name"]:$r2["shortName"]?> </option>
<?php
}
?>				
			</select>
		</div>
		<div class='col-sm-6 mt-3 d-none'>
		<label>
		    აქტიური
		   <input type='checkbox' <?=$r1['active']=='0'?'checked':'' ?> class='aactv' />
		</label>   
		<?php
		$sld=mysqli_query($con,"SELECT * FROM slider WHERE pid='".$r1["id"]."'");
		
		?>
	</div>	
    <div class="col-sm-12">
		<br>
		<label>Filters by Product Category</label>
		<div class="LFL">
<?php
$q4=mysqli_query($con,"SELECT * FROM fcategory WHERE cid='".$category."'");
if(mysqli_num_rows($q4)>0){
	while($r4=mysqli_fetch_array($q4)){
	$q5=mysqli_query($con,"SELECT * FROM filters WHERE id='".$r4["fid"]."'");
	$r5=mysqli_fetch_array($q5);
	$q8=mysqli_query($con,"SELECT * FROM fpshow WHERE fid='".$r4["fid"]."' AND pid='".$pid."'");
	$r8=$q8?mysqli_fetch_array($q8):"";
	if(mysqli_num_rows($q8)<1){
		mysqli_query($con,"INSERT INTO fpshow SET fid='".$r4["fid"]."',pid='".$pid."'");
	}
?>
			<div class="col-md-12"><label><strong><?=$r5["nameen"]?></strong> <?=$r5["comment"]?></label>
				&nbsp;&nbsp;&nbsp;&nbsp;<label>
				<div class="d-none">|&nbsp;Show on product page</label> <input type="checkbox" class="UCH" <?=($r8["pshow"]??null)?"checked":""?> d="<?=$r8["id"]?>" n="pshow" t="fpshow"/>		</div>	
			</div>
<?php
	$q6=mysqli_query($con,"SELECT * FROM filter WHERE fid='".$r4["fid"]."'");
		while($r6=mysqli_fetch_array($q6)){
		$q7=mysqli_query($con,"SELECT * FROM fproduct WHERE flid='".$r6["id"]."' AND pid='".$pid."'");
		$r7=mysqli_fetch_array($q7);
?>
			<div class="col-md-12">
				<input class="UPF" <?=($r7["val"]??"")==1?"checked":""?> d="<?=$r6["id"]?>" type="checkbox" />&nbsp;<?=$r6["nameen"]??""?> 
			</div>
<?php
		}
	}
}else{
	echo "No filters";
}
?>
		</div>	
    </div>	
	
    <div class="submit my-4 col-sm-12">
        <button  class="btn btn-success SAVPRO" d="<?=$a?>">დამახსოვრება</button>
    </div>

    

</div>
                    </div>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.17/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.17/dist/js/bootstrap-select.min.js"></script>

<script>
$(function(){
	tinymce.init({
		relative_urls: false,
	  selector: "textarea.ADTGE",
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
