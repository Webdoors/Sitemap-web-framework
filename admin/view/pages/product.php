		<script type="text/javascript" src="/lib/shadowbox/shadowbox.js"></script>
		<link rel="stylesheet" type="text/css" href="/lib/shadowbox/shadowbox.css">



<?php

$a=mysqli_real_escape_string($con,$_GET["id"]??"");
$L=mysqli_real_escape_string($con,$_GET["lang"]??"ka");


$T=time();

if($a!=""){
	$q1=mysqli_query($con,"SELECT t1.*,t3.id as 'menu' FROM products as t1 LEFT JOIN sitemap as t2 ON(t1.sitemapid=t2.id) LEFT JOIN sitemap as t3 ON(t3.id=t2.pid) WHERE t1.id='".$a."' ");
	$r1=mysqli_fetch_array($q1);
}else{

	$ina=mysqli_query($con,"INSERT INTO products SET date='$T' ");

	// $dd=mysqli_query($con, "SELECT id FROM products  ORDER BY id DESC");
	// $rd=mysqli_fetch_array($dd);$a=$rd['id'];
	$a=mysqli_insert_id($con);
	$q1=mysqli_query($con,"SELECT t1.*,t3.name_ka as 'menu' FROM products as t1 LEFT JOIN sitemap as t2 ON(t1.sitemapid=t2.id) LEFT JOIN sitemap as t3 ON(t3.id=t2.pid) WHERE t1.id='".$a."' ");
	$r1=mysqli_fetch_array($q1);	
?>

<?php	
}	
	$q2=mysqli_query($con,"SELECT * FROM sitemap WHERE id='".$r1["sitemapid"]."' ");
	$r2=mysqli_fetch_array($q2);

	?>
	


<div class="container">
   <div class="col-sm-10 mt-3 p-0">
    <div class='row'>

	<div class="col-sm-12">

<ul class="nav nav-tabs">
<?php
$flags=["ka"=>"ge","en"=>"gb","ru"=>"ru"];
$q4=mysqli_query($con,"SELECT * FROM languages WHERE active=1");
while($r4=mysqli_fetch_array($q4)){
?>
  <li class="nav-item me-1">
 <a href="?page=product&id=<?=$a?>&lang=<?=$r4["shortname"]?>&hidemenu=<?=($_GET["hidemenu"]??"")?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=$flags[$r4["shortname"]]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>
	</div>
	</div>
   </div>                                   
<h3 class="title mt-3 p-2 mb-0 pb-0">
    <span>
        პროდუქტის რედაქტირება 
    </span>
	<button class="btn btn-success SAVESET">Save</button>
</h3>
<?php			   
             $c=0;
	   for($z=0;$z<count($lnarr);$z++)
	   {
	   $c++;
	?>
		
	<div class="col-sm-12 my-3 mt-0 enebi <?=$r1["image1"]==''?"d-none":"" ?>" d='<?=$c?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '>
		<a href="/<?=$L?>/product/<?=$r2["slug_".$L]?>" target="_blank"><img style="width:200px" src="/img/<?=str_replace(["https://supta.ge/img/","https://new.supta.ge/img/"],"",$r1["image1"])?>"></a>
	</div>
	<div class="col-sm-12 my-0 enebi" d='<?=$c?>'  style='<?=$langdefaultarr[$z]=='1'?"":"display:none" ?> '>
		<a href="/<?=$L?>/product/<?=$r2["slug_".$L]?>" target="_blank"><button class="btn btn-primary">საიტზე პროდუქტის ნახვა</button></a>
	</div>

	   <?php
	   }
	   ?>
<div class="row my-3">
	<div class="col-sm-2">
		<small>დასახელება <?=$L?></small>
	</div>
	<div class="col-sm-8">
			<input class="form-control UPTNO" d="<?=$r1["id"]?>" n="title_<?=$L?>" t="products" value="<?=$r1["title_".$L]?>"/>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Sitemap ID</small>
	</div>
	<div class="col-sm-3">
			<input class="form-control UPTNO" d="<?=$r1["id"]?>" onchange="$('.SITEM').attr('href','/admin/?page=sitemapedit&id='+$(this).val())" n="sitemapid" t="products" value="<?=$r1["sitemapid"]?>"/>
	</div>
	<div class="col-sm-4">
			<a class="SITEM" href="/admin/?page=sitemapedit&id=<?=$r1["sitemapid"]?>">View Sitemap</a>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Slug <?=$L?></small>
	</div>
	<div class="col-sm-8">
			<input class="form-control UPTNO" d="<?=$r2["id"]?>" n="slug_<?=$L?>" t="sitemap" value="<?=$r2["slug_".$L]?>"/>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>კატეგორია</small>
	</div>
	<div class="col-sm-5">
			<select class="form-control UPTNO" d="<?=$r1["id"]?>" n="category" t="products" >
				<option>აირჩიე კატეგორია</option>
<?php
	       $brn=mysqli_query($con,"SELECT * FROM sitemap WHERE itemtype=2 AND pid='2' ORDER BY name_ka ASC");
		   while($rbrn=mysqli_fetch_assoc($brn))
		   {
?>				
    <optgroup label="<?=$rbrn["name_ka"]?>">
<?php
	       $brn2=mysqli_query($con,"SELECT * FROM sitemap WHERE pid='".$rbrn["id"]."' AND  itemtype=2 ORDER BY name_ka ASC");
		   while($rbrn2=mysqli_fetch_assoc($brn2))
		   {
?>		
     <option <?=$r1["category"]==$rbrn2["id"]?"selected":""?> value="<?=$rbrn2["id"]?>"><?=$rbrn2["name_ka"]?></option>
<?php
		   }
?>	
    </optgroup>
<?php
		   }
?>				
			</select>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>ბრენდი</small>
	</div>
	<div class="col-sm-5">
			<select class="form-control UPTNO" d="<?=$r1["id"]?>" n="brand" t="products" >
				<option>აირჩიე ბრენდი</option>
<?php
	       $brn=mysqli_query($con,"SELECT * FROM brands ORDER BY name_ka ASC");
		   while($rbrn=mysqli_fetch_assoc($brn))
		   {
?>				
				<option <?=$r1["brand"]==$rbrn["id"]?"selected":""?> value="<?=$rbrn["id"]?>"><?=$rbrn["name_ka"]?>/<?=$rbrn["name_en"]?></option>
<?php
		   }
?>				
			</select>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Image 1</small>
	</div>
	<div class="col-sm-10">

<div class="input-group">
<input d="<?=$r1["id"]?>"  n="image1" t="products"  value="<?=$r1["image1"]?>" id="example1<?=$a ?>" class="form-control UPTNO " />
<div class="input-group-append">
<a class="btn btn-success FILESELECT" target="example1<?=$a ?>">არჩევა</a>
</div>
</div>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Image 2</small>
	</div>
	<div class="col-sm-10">
<div class="input-group">
<input type="text" class="form-control UPTNO IMAGE" d="<?=$r1["id"]?>"  n="image2" t="products"  value="<?=$r1["image2"]?>" id="example2<?=$a ?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" target="example2<?=$a ?>">არჩევა</button>
</div>
</div>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Image 3</small>
	</div>
	<div class="col-sm-10">
<div class="input-group">
<input type="text" class="form-control UPTNO IMAGE" d="<?=$r1["id"]?>"  n="image3" t="products"  value="<?=$r1["image3"]?>" id="example3<?=$a ?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" target="example3<?=$a ?>">არჩევა</button>
</div>
</div>	
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Image 4</small>
	</div>
	<div class="col-sm-10">
<div class="input-group">
<input type="text" class="form-control UPTNO IMAGE" d="<?=$r1["id"]?>"  n="image4" t="products"  value="<?=$r1["image4"]?>" id="example4<?=$a ?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" target="example4<?=$a ?>">არჩევა</button>
</div>
</div>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Image 5</small>
	</div>
	<div class="col-sm-10">
<div class="input-group">
<input type="text" class="form-control UPTNO IMAGE" d="<?=$r1["id"]?>"  n="image5" t="products"  value="<?=$r1["image5"]?>"  id="example5<?=$a ?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" target="example5<?=$a ?>">არჩევა</button>
</div>
</div>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Image For Mobile (Image required width 200px)</small>
	</div>
	<div class="col-sm-10">

<div class="input-group">
<input type="text" class="form-control UPTNO IMAGE" d="<?=$r1["id"]?>"  n="imagemobile" t="products"  value="<?=$r1["imagemobile"]?>" id="example6<?=$a ?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary FILESELECT" type="button"  target="example6<?=$a ?>">არჩევა</button>
</div>
</div>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>პროდუქტის კოდი </small>
	</div>
	<div class="col-sm-3">
			<input class="form-control UPTNO" d="<?=$r1["id"]?>" n="good_n" t="products" value="<?=$r1["good_n"]?>"/>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>რაოდენობა </small>
	</div>
	<div class="col-sm-2">
			<input class="form-control UPTNO" d="<?=$r1["id"]?>" n="volume" t="products" value="<?=$r1["volume"]?>"/>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>რაოდენობა შეკვრაში</small>
	</div>
	<div class="col-sm-2">
			<input class="form-control UPTNO" d="<?=$r1["id"]?>" n="inbatch" t="products" value="<?=$r1["inbatch"]?>"/>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>შენიშნვა <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=$r1["id"]?>" n="shenishnva_<?=$L?>" t="products" /><?=$r1["shenishnva_".$L]?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>აღწერა <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO ADTGE" tiny='1' d="<?=$r1["id"]?>" id="ADL<?=$r2["id"]?>" n="description_<?=$L?>" t="products" /><?=$r1["description_".$L]?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<strong>ფასდაკლება</strong>
	</div>
	<div class="col-sm-7">
			<input type="checkbox" onclick="$('.SALEBO').toggleClass('d-none')" <?=$r1["sale"]=="1"?"checked":""?> style="height:27px;width:27px;" class="UPTNO" d="<?=$r1["id"]?>" n="sale" t="products"/>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>ფასის ჯგუფები</small>
	</div>
	<div class="col-sm-4">
		<div class="row mt-1">
			<div class="col-sm-5">
					 
			</div>
			<div class="col-sm-4">
				ფასი
			</div>
			<div class="col-sm-3 SALEBO <?=$r1["sale"]=="1"?"":"d-none"?>">
				ფასდაკლებული
			</div>
		</div>
<?php
$q4=mysqli_query($con,"SELECT t1.title_ka,t2.* FROM filters as t1 LEFT JOIN  `goods_prices` as t2 ON(t1.id=t2.group_id) WHERE t2.good_id='".$a."'");
while($r4=mysqli_fetch_array($q4)){
?>
		<div class="row mt-1">
			<div class="col-sm-5">
					<?=$r4["title_ka"]?> 
			</div>
			<div class="col-sm-4">
				<input class="form-control UPTNO" d="<?=$r4["id"]?>" placeholder="ფასი" n="price" t="goods_prices" value="<?=$r4["price"]?>"/>
			</div>
			<div class="col-sm-3 SALEBO <?=$r1["sale"]=="1"?"":"d-none"?>">
				<input class="form-control UPTNO" d="<?=$r4["id"]?>" n="saleprice" placeholder="ფასდაკლება" t="goods_prices" value="<?=$r4["saleprice"]?>"/>
			</div>
		</div>
<?php
}
?>
	</div>
	<div class="col-sm-4">
		<div class="row mt-1">
			<div class="col-sm-6">
					<b>სექტორი</b> 
			</div>
			<div class="col-sm-3">
			
			</div>
			<div class="col-sm-3 SALEBO <?=$r1["sale"]=="1"?"":"d-none"?>">
			
			</div>
		</div>
		<div class="row mt-1">
			<div class="col-sm-7">
				ჰორეკა
			</div>
			<div class="col-sm-2">
				<input class="UPTNO" d="<?=$r1["id"]?>" type="checkbox" n="horeca" t="products" <?=$r1["horeca"]==1?"checked":""?> />
			</div>
		</div>
		<div class="row mt-1">
			<div class="col-sm-7">
				საგანმანათლებლო
			</div>
			<div class="col-sm-2">
				<input class="UPTNO" d="<?=$r1["id"]?>" type="checkbox" n="edu" t="products" <?=$r1["edu"]==1?"checked":""?> />
			</div>
		</div>
		<div class="row mt-1">
			<div class="col-sm-7">
				სამედიცინო და ესთეტიკა
			</div>
			<div class="col-sm-2">
				<input class="UPTNO" d="<?=$r1["id"]?>" type="checkbox" n="medical" t="products" <?=$r1["medical"]==1?"checked":""?> />
			</div>
		</div>
		<div class="row mt-1">
			<div class="col-sm-7">
				ოფისები
			</div>
			<div class="col-sm-2">
				<input class="UPTNO" d="<?=$r1["id"]?>" type="checkbox" n="office" t="products" <?=$r1["office"]==1?"checked":""?> />
			</div>
		</div>
	</div>
</div>
<hr>
<div class="row my-3">
<h2>SEO</h2>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Img</small>
	</div>
	<div class="col-sm-7">
			<input class="form-control UPTNO" d="<?=$r2["id"]?>" n="img" t="sitemap" value="<?=$r2["img"]??""?>"/>
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

<div class="row mt-3 mb-4">
	<div class="col-sm-12">
		<button class="btn btn-success SAVESET">Save</button>
	</div>	
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.17/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.17/dist/js/bootstrap-select.min.js"></script>

<script>
function init_shadowbox()
{
	Shadowbox.init({
	    language: 'en',
		overlayColor:'#000000',
		overlayOpacity: 0,
	    players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'mp4']
	});
}

$(function(){
	init_shadowbox();
	tinymce.init({
		relative_urls: false,
	  selector: "textarea.ADTGE",
	  height:"300",
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
