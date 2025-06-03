<?php
ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

?>
<!doctype html>
<html xmlns="https://www.w3.org/2012/xhtml" lang="ka">
	<head>
		<meta name="google-site-verification" content="<meta name="google-site-verification" content="g4DimXsv0vBSkzQSl3i7eQDlsgdo3u4cuCWgVdBTY7c" />
		<link rel="icon"type="image/x-icon"href="https://bosch999.ge/img/clogo.png"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <meta http-equiv="Access-Control-Allow-Origin" content="*"/>
		<title>BOSCH 999 სამართავი პანელი</title> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="content-language" content="ka">
		<meta name="Author" content="Irakli Shalamberidze">
		<meta property="og:title" content="intelectro" />
		<meta property="og:description" content="" />
		<meta name="keywords" content=""/>
		<meta name="description" content="ონლაინ ბიზნეს შეფასება 24/7" />
		<meta name="author" content="" /> 
		<meta name="copyright" content="&copy;2016 sufta.ge" />
		<meta name="robots" content="all" />
		<meta name="revisit-after" content="1 days" />
		<link rel="canonical" href=""/>
		<meta property="og:image" content="https://sufta.ge/img/unnamed.jpg" />
		<meta property="og:type" content="website" />
		<meta property="fb:app_id" content="248744675578367" />
		<meta property="og:url" content="https://sufta.ge/" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css?v=7774"/>
		<link rel="stylesheet" type="text/css" href="css/flags.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$(document).on("click",".FILESELECT",function(){
		$(".FILEMANAGER").remove();
		$("body").append("<iframe class='FILEMANAGER' style='position:fixed;top:30px;width:90%;height:90%;box-shadow:1px 1px 3px #000;left:50%;transform:translateX(-50%);z-index:99999999;' src='/admin/filemanager/?target="+$(this).attr("target")+"'></iframe>");	
	});
</script>
	</head>
	<body>
<?php
if((isset($_GET["hidemenu"])?$_GET["hidemenu"]:"")!="1"){
?>

<nav class="navbar navbar-expand-lg bg-light p-0">
  <div class="container-fluid">
    <a class="navbar-brand pl-3" href="/admin/">BOSCH 999</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


       <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown L border-left d-none">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           fo
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">


<?php  if(getpages($Guid,'categories',$pages,$con)==1){ ?><a class="dropdown-item" href="?page=categories">კატეგორიები</a><?php }?>
<?php  if(getpages($Guid,'brands',$pages,$con)==1){ ?><a class="dropdown-item" href="?page=brands">ბრენდები</a><?php }?>


         </div>
       </li>
   
 
   

<?php if(getpages($Guid,'orders',$pages,$con)==1){ ?><li class="L L4 nav-item d-none <?=($PG=="users"?"active":"")?>"><a  href="?page=users" class="nav-link " >მომხმარებლები</a></li><?php }?>	  

<?php if(getpages($Guid,'orders',$pages,$con)==1){ ?><li class="L L4 nav-item d-none <?=($PG=="orders"?"active":"")?>"><a  href="?page=orders" class="nav-link " >შეკვეთები</a></li><?php }?>

<?php  if(getpages($Guid,'aboutus',$pages,$con)==1){ ?><li class="L L4 nav-item <?=($PG=="aboutus"?"active":"")?>"><a href="?page=aboutus" class="nav-link ">ჩვენ შესახებ</a></li><?php }?>
<?php  if(getpages($Guid,'currencies',$pages,$con)==1){ ?><li class="L L4 nav-item <?=($PG=="currencies"?"active":"")?>"><a href="?page=currencies" class="nav-link ">კურსები</a></li><?php }?>
<?php  if(getpages($Guid,'services',$pages,$con)==1){ ?><li class="L L4 nav-item d-none <?=($PG=="services"?"active":"")?>"><a href="?page=services" class="nav-link ">სერვისები</a></li><?php }?>
<?php  if(getpages($Guid,'projects',$pages,$con)==1){ ?><li class="L L4 nav-item d-none <?=($PG=="projects"?"active":"")?>"><a href="?page=projects" class="nav-link ">პროექტები</a></li><?php }?>
<?php  if(getpages($Guid,'posts',$pages,$con)==1){ ?><li class="L L4 nav-item d-none <?=($PG=="posts"?"active":"")?>"><a href="?page=posts" class="nav-link">ბლოგი</a></li><?php }?>
<?php  if(getpages($Guid,'info',$pages,$con)==1){ ?><li class="L L4 nav-item d-none <?=($PG=="info"?"active":"")?>"><a href="?page=info" class="nav-link">სასარგებლო ინფორმაცია</a></li><?php }?>

<!--<?php if(getpages($Guid,'allorders',$pages,$con)==1){ ?><li class="L L4  nav-item <?=($PG=="products"?"active":"")?> "><a  href="?page=products" class="nav-link ">პროდუქტები</a></li><?php }?>-->


<?php  if(getpages($Guid,'team',$pages,$con)==1){ ?><li class="L L4 nav-item d-none <?=($PG=="team"?"active":"")?>"><a href="?page=team" class="nav-link ">გუნდი</a></li><?php }?>

<!--<?php  if(getpages($Guid,'brands',$pages,$con)==1){ ?><li class="L L4 nav-item <?=($PG=="brands"?"active":"")?>"><a href="?page=brands" class="nav-link ">ბრენდები</a></li><?php }?>-->





  <li class="nav-item dropdown L d-none">
 <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         საიტის რუკა
        </a>
		  <div class="dropdown-menu" >

<?php if(getpages($Guid,'sitemap',$pages,$con)==1){ ?><a  class="dropdown-item"  href="?page=sitemap">საიტის ხე</a><?php }?>
<?php if(getpages($Guid,'sitemap',$pages,$con)==1){ ?><a  class="dropdown-item"  href="?page=sitemaplist">საიტის ნუსხა</a><?php }?>

</div>
</li>






  <li class="nav-item dropdown L">
       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         პარამეტრები
        </a>
		  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php if(getpages($Guid,'settings',$pages,$con)==1){ ?> <a  class="dropdown-item"  href="?page=languages">ენები</a><?php }?>
<?php if(getpages($Guid,'settings',$pages,$con)==1){ ?> <a  class="dropdown-item"  href="?page=translation">სიტყვები/თარგმნა</a><?php }?>
<?php if(getpages($Guid,'settings',$pages,$con)==1){ ?> <a  class="dropdown-item"  href="?page=settings">Settings</a><?php }?>
<a href="?page=slider" class="dropdown-item">სლაიდერი</a>
  </div>
  </li><?php if(getpages($Guid,'users',$pages,$con)==1){ ?><li class="L L4 nav-item <?=($PG=="admins"?"active":"")?>"><a href="?page=admins" class="nav-link ">ადმინები</a></li><?php }?>
  		<!--<li class="nav-item L  <?=($PG=="ipay"?"active":"")?>"><a class="nav-link" href="/admin/?page=ipay">ipay</a>	</li>	-->
 
    </ul>
    <a href="" class="form-inline my-2 my-lg-0">
       <button class="btn btn-outline-success my-2 my-sm-0 d-none" type="submit">CP</button>
    </a><?php
$q10=mysqli_query($con,"SELECT count(id) as 'tot' FROM notifications WHERE seen!=1");
$r10=mysqli_fetch_array($q10);

?>		

<?php echo $r10["tot"]==0?"":$r10["tot"];?>
	</a>	
	<button class="btn btn-default my-2 my-sm-0 FILESELECT ms-auto" ><i class="fa fa-download"></i></button>	
    <button class="btn btn-default my-2 my-sm-0 LGT" ><i class="fa fa-sign-out"></i></button>	
    </div>
  </div>
</nav>	
<?php
}
?>
 <?php

$languagename='';
$languageshortname='';
$langdefault='';
$lngdefname='';
$lngs=mysqli_query($con,"SELECT * FROM languages WHERE active='1' ");
while($rlngs=mysqli_fetch_assoc($lngs))
{
	$languagename.=','.$rlngs['name'];
	$languageshortname.=','.$rlngs['shortname'];
	$langdefault.=','.$rlngs['main'];
	if($rlngs['main']==1)
	{
		$lngdefname=$rlngs['shortname'];
	}
}
if($languagename!=''&&$languageshortname!='')
{
	$languagename=ltrim($languagename,',');
	$languageshortname=ltrim($languageshortname,',');
	$langdefault=ltrim($langdefault,',');
}
$lnarr=explode(',',$languagename);
$lnshortarr=explode(',',$languageshortname);
// echo $langdefault;
$langdefaultarr=explode(',',$langdefault);
function languages($table_name,$table_id,$table_column)
{
	$alias='';
	$inleng ='';
	for($i=0;$i<count($GLOBALS['lnarr']);$i++)
	{
		$alias=$table_column . $GLOBALS['lnshortarr'][$i];
		$inleng .="(SELECT columnValue FROM langs WHERE shortname='". $GLOBALS['lnshortarr'][$i] ."' AND tableName='$table_name' AND tableId=$table_id AND tableColumn='$table_column'  LIMIT 1) AS $alias,";
	}
   $inleng=rtrim($inleng,",");
	return $inleng;
}

// echo languages('slider','t1.id','name');

// ?>
<?php
  /* $nt=mysqli_query($con,"SELECT * FROM messages WHERE seen!=1");
   $cnt=mysqli_num_rows($nt);
?>
		<div class="notf ">
		<i class="fas fa-bell seenord"></i>
		<div class="n-count ">
		  <?=$cnt ?>	</div>
	</div>
	*/
	?>
<script src="https://unpkg.com/flmngr"></script>
<script>
	Flmngr.load({
            apiKey: "KBIzdrB1",                                  // default free key
            urlFileManager: 'https://supta.ge/admin/flmngr/flmngr.php', // demo server
            urlFiles: 'https://supta.ge/img',   
}, {
  onFlmngrLoaded: () => {
    attachOnClickListenerToButton();
  }
});
function attachOnClickListenerToButton() {
  // Add a listener for selecting files
  $(".SELECTFILE").each(function(){
	  var d=this;
		this.addEventListener("click", () => {

			Flmngr.open({
				isMultiple: false,
				initialFolderState: "closed",
				acceptExtensions: ["png", "jpeg", "jpg", "webp", "gif"],
				onFinish: (files) => {
						let file = files[0];
						console.log($(d).parent().parent());
						$(d).parent().parent().find(".IMAGE").val(file.url);
				}
			});

		}); 	  
  }); 
}

$(document).ready(function() {
    // Select all folders and close them
    $(".FLMNGR_FOLDER").each(function() {
        $(this).removeClass("FLMNGR_OPEN").addClass("FLMNGR_CLOSED");
        $(this).next(".FLMNGR_FOLDERCONTENT").hide();
    });
});

</script>