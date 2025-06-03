<?php

$a=mysqli_real_escape_string($con,isset($_GET["id"])?$_GET["id"]:"");
$L=mysqli_real_escape_string($con,isset($_GET["lang"])?$_GET["lang"]:"ka");

$T=time();

if($a!=""&&$a!="0"){
	// echo "SELECT * FROM posts WHERE id='".$a."' ";
	$q1=mysqli_query($con,"SELECT * FROM posts WHERE id='".$a."' ");
	$r1=mysqli_fetch_array($q1);
}else{
echo 1;

	mysqli_query($con,"INSERT INTO sitemap SET name_ka='',itemtype='4'");
	$sid=mysqli_insert_id($con);
// echo "INSERT INTO posts (date,authorid) VALUES ('$T','$Guid') ";
	$ina=mysqli_query($con,"INSERT INTO posts (date,authorid,sitemapid) VALUES ('$T','$Guid','$sid') ");
	$pid=mysqli_insert_id($con);
	mysqli_query($con,"UPDATE sitemap SET name_ka='article_sitemapid-".$sid."' WHERE id='".$sid."'");
	$dd=mysqli_query($con, "SELECT id FROM posts WHERE news!=1 ORDER BY id DESC");
	$rd=mysqli_fetch_array($dd);
	//$aid=mysqli_insert_id($con);
	$a=$pid;
	
	 
	
	?>
	
<script>location.href="?page=post&id=<?=$a?>"</script>
<?php

}


	$q2=mysqli_query($con,"SELECT * FROM sitemap WHERE id='".$r1["sitemapid"]."' ");
	$r2=mysqli_fetch_array($q2);

?>
<div class="container">
 <br/>
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
 <a href="?page=post&id=<?=$a?>&lang=<?=$r4["shortname"]?>&hidemenu=<?=(isset($_GET["hidemenu"])?$_GET["hidemenu"]:"")?>" class="nav-link <?=$r4["shortname"]==$L?"active":""?>" aria-controls="georgian" role="tab" data-toggle="tab"><i class="flag-<?=$flags[$r4["shortname"]]?> space"></i> <?=$r4["name"]?></a>
  </li>
<?php
}
?>
</ul>
	</div>
	</div>
   </div>   

                                                
<h3 class="title mt-3">
    <span>
        პოსტის რედაქტირება 
    </span>
</h3>
 <button  class="btn float-right mb-2 btn-success SAVESET" style="float:right" msg="შენახულია"   sitemap='2' t='posts' pagename='blog' d="<?=$a?>">დამახსოვრება</button>
 <a target="_blank" href="/<?=$L?>/article/<?=isset($r2["slug_".$L])?$r2["slug_".$L]:""?>"class="btn float-right mb-2 btn-primary me-1" style="float:right"   sitemap='2' t='posts' pagename='blog' d="<?=$a?>">ნახვა</a>
<div class="row">
	<div class="col-sm-12 my-3 d-none">
	
		<a style="color:#FFF"  class="btn btn-primary svpr" >გადახედვა</a>
	
	</div>
</div>
<div role="tabpanel">
    <!-- Tab panes -->

   
 

	
    <div class="tab-content  itmcontainer" t='posts'>

        <div role="tabpanel" class="tab-pane active" id="georgian">
              	

           <div class='enebi' d='' >
                       <label for="ge[sarchevi]" class="required">დასახელება <?=$L ?></label>
                       <input class="form-control UPTNO" t="posts" d="<?=$a?>" n="title_<?=$L?>" value="<?=$r1["title_".$L] ?>" tp=''  rows="10"  id="ADLGE" name="title" cols="50">
		               <br>
               </div>	
           <div class='enebi col-sm-2' d='' >
                       <label for="ge[sarchevi]" class="required">თარიღი <?=$L ?></label>
                       <input class="form-control UPTNO" t="posts" d="<?=$a?>" n="date_<?=$L?>" value="<?=$r1["date_".$L] ?>" tp=''  rows="10" placeholder="november 11, 2024"  id="ADLGE" name="title" cols="50">
		               <br>
               </div>		
	   

		<br>
		
<div class="row my-3">
	<div class="col-sm-2">
		<small>Sitemap ID</small>
	</div>
	<div class="col-sm-3">
			<input class="form-control UPT" d="<?=$r1["id"]?>" onchange="$('.SITEM').attr('href','/admin/?page=sitemapedit&id='+$(this).val())" n="sitemapid" t="posts" value="<?=$r1["sitemapid"]?>"/>
	</div>
	<div class="col-sm-4">
			<a class="SITEM" href="/admin/?page=sitemapedit&id=<?=$r1["sitemapid"]?>">View Sitemap</a>
	</div>
</div>
    <div class="row nonTranslatedInput pad-no-sm">
        
<div class="row my-3">
	<div class="col-sm-2">
		<small>სიახლის სურათი <?=$L?></label> <small></small>
	</div>
	<div class="col-sm-7">

<div class="input-group">
<input type="text" class="form-control UPTNO IMAGE" d="<?=$r1["id"]?>"  n="img_<?=$L?>" t="posts"  value="<?=$r1["img_".$L]?>" id="example1<?=$a ?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary   FILESELECT" target="example1<?=$a ?>" type="button" >არჩევა</button>
</div>
</div>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Video <?=$L?></label> <small></small>
	</div>
	<div class="col-sm-7">

<div class="input-group">
<input type="text" class="form-control UPTNO IMAGE" d="<?=$r1["id"]?>"  n="video_<?=$L?>" t="posts"  value="<?=$r1["img_".$L]?>" id="example2<?=$a ?>">
<div class="input-group-append">
	<button class="btn btn-outline-secondary   FILESELECT" target="example2<?=$a ?>" type="button" >არჩევა</button>
</div>
</div>
	</div>
</div>
    </div>


  <br/>

        <div class='enebi' d='<?=$c ?>' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">ტექსტი <?=$L ?></label>

               <textarea id="ADTENG" tiny='1' t="posts" d="<?=$a?>" n="text_<?=$L?>" class=' tnmc ADTGE' tp='' name='text' placeholder="ტექსტი"><?=$r1["text_".$L] ?></textarea>
  
            </div>     
		</div>
        <div class='enebi mt-3' d='<?=$c ?>' >
           <div class="col-sm-12 pad-no-right pad-no-xs NOP">
               <label for="pdf">მცირე ტექსტი <?=$L ?></label>

               <textarea   t="posts" d="<?=$a?>" n="desc_<?=$L?>" class='form-control UPTNO' tp='' name='text' placeholder="მცირე ტექსტი"><?=$r1["desc_".$L] ?></textarea>
  
            </div>     
		</div>	
<div class="row my-3">
	<div class="col-sm-2">
		<small>სიახლის სურათების დამატება <?=$L?></label> <small></small>
	</div>
	<div class="col-sm-7">

<div class="input-group">
<input type="text" class="form-control  POSTIMG" d="<?=$r1["id"]?>"  n="img" t="posts"  value="" id="example3<?=$a ?>" aria-describedby="minipan">
<div class="input-group-append">
	<button class="btn btn-outline-secondary   FILESELECT" target="example3<?=$a ?>" type="button" >არჩევა</button>
	<button class="btn btn-outline-success   ADDPOSTIMG" d="<?=$r1["id"]?>" type="button" >დამატება</button>
</div>
</div>
<?php
$q22=mysqli_query($con,"SELECT * FROm postimgs WHERE postid='".$r1["id"]."' ORDER BY id DESC ");
while($r22=mysqli_fetch_array($q22)){
?>
	<div class="col-sm-12 mt-2">
<a href="<?=$r22["img"]?>" class="d-inline-block " target="_blank" ><img style="width:120px" src="<?=$r22["img"]?>"/></a> <div class="ms-2 btn btn-danger DEL" d="<?=$r22["id"]?>" t="postimgs"><i class="fa fa-trash text-white"></i></div>
	</div>
<?php
}
?>	
	</div>
</div>
	   <br/>
	<hr>
<div class="row my-3">
<h2>SEO</h2>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Img</small>
	</div>
	<div class="col-sm-7">
			<input class="form-control UPTNO" d="<?=isset($r2["id"])?$r2["id"]:""?>" n="img" t="sitemap" value="<?=isset($r2["img"])?$r2["img"]:""?>"/>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Title <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=isset($r2["id"])?$r2["id"]:""?>" n="title_<?=$L?>" t="sitemap" /><?=isset($r2["title_".$L])?$r2["title_".$L]:""?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Slug <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<input class="form-control UPTNO" d="<?=isset($r2["id"])?$r2["id"]:""?>" n="slug_<?=$L?>" t="sitemap" value="<?=isset($r2["slug_".$L])?$r2["slug_".$L]:""?>"/>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Description <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=isset($r2["id"])?$r2["id"]:""?>" n="description_<?=$L?>" t="sitemap" /><?=isset($r2["description_".$L])?$r2["description_".$L]:""?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Keywords <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=isset($r2["id"])?$r2["id"]:""?>" n="keywords_<?=$L?>" t="sitemap" /><?=isset($r2["keywords_".$L])?$r2["keywords_".$L]:""?></textarea>
	</div>
</div>
<div class="row my-3">
	<div class="col-sm-2">
		<small>Schema <?=$L?></small>
	</div>
	<div class="col-sm-7">
			<textarea class="form-control UPTNO" d="<?=isset($r2["id"])?$r2["id"]:""?>" n="schema_<?=$L?>" t="sitemap" /><?=isset($r2["schema_".$L])?$r2["schema_".$L]:""?></textarea>
	</div>
</div>
		<div class='col-sm-4'>
		<label>
		    აქტიური
		   <input type='checkbox' class='UPTNO' n='active' d="<?=isset($r2["id"])?$r2["id"]:""?>" t="posts" tp='int' ln='' <?=$r1['active']=='1'?'checked':'' ?> class='aactv' />
		</label>   
		
		
	
		</div>
	</div>	
	
	
	
	
    <div class="submit my-4">
        <button  class="btn btn-success SAVESET" msg="შენახულია"   sitemap='2' t='posts' pagename='blog' d="<?=$a?>">დამახსოვრება</button>
    </div>
    
  </div><!---qart--->
</div>

 



                    </div>
<script>
$(function(){
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
				  console.log(ed.getContent());
				  func("updatetable","posts",$("#"+ed.id).attr("n"),ed.getContent(),$("#"+ed.id).attr("d"));
				  
			  });
		},
		external_filemanager_path:"/admin/responsive_filemanager/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "../../responsive_filemanager/filemanager/plugin.min.js"}
	  
	});	
});
$(document).on("click",".ADDPOSTIMG",function(e) {
	func2("addpostimg",{postid:$(this).attr("d"),img:$(".POSTIMG").val()},function(R){
		wr();
	})
});
</script>
<script src="js/tinymce/tinymce.min.js"></script>
