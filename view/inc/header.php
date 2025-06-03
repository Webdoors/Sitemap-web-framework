<?php
//echo "SELECT t1.*, (SELECT name FROM city WHERE id=t1.city ) AS usercity, (SELECT name FROM country WHERE id=t1.country ) AS usercountry  FROM users AS t1 WHERE t1.id='".$uid."'";
$uid=$uid??"";
	$qu=mysqli_query($con,"SELECT t1.*, (SELECT name FROM city WHERE id=t1.city ) AS usercity, (SELECT name FROM country WHERE id=t1.country ) AS usercountry  FROM users AS t1 WHERE t1.id='".$uid."'");
	$ru=mysqli_fetch_array($qu);
$qs=mysqli_query($con,"SELECT t1.* FROM sitemap as t1 WHERE t1.slug_$L='".($p2)."'");
$sitemap=mysqli_fetch_array($qs);
$qs2=mysqli_query($con,"SELECT t1.* FROM sitemap as t1 WHERE t1.slug_$L='".($p3)."'");
$sitemap2=mysqli_fetch_array($qs2);
//	var_dump($ru);
	$cnv=mysqli_query($con,"SELECT value FROM settings WHERE name='usdgel' ");
	$rcnv=mysqli_fetch_assoc($cnv);
$KEY=mysqli_real_escape_string($con,$_GET["key"]??"");
$cart=$_COOKIE["cart"]??"{}";
$cart=json_decode($cart,true);
$cartco=count($cart);
$incart=0;
foreach($cart as $ca){
	$incart+=floatval($ca["quantity"]);
}
$cart=array_sum($cart);
$URL=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
	$title="Iland | აილენდი";
	//$keys="online,vachroba,yidva,gayidva,saqoneli,satamashoebi,sabitumo";
	//$desc="შეიძინეთ apple ის პროდუქცია მხოლოდ iland ში, mackbook, imac, mackbook pro, iphone 12 , iphone 13, $title";
$q1x=mysqli_query($con,"SELECT * FROM slider ORDER BY position ASC LIMIT 1");
$r1x=mysqli_fetch_array($q1x);
	$img=$r1x["link"]??"";
if(($p4??"")!=""){
	$q1=mysqli_query($con,"SELECT keywords,smalltexten,nameen,namege,img FROM products WHERE slug='".$p4."'");
	$r1=mysqli_fetch_array($q1);
	$title=$r1["nameen"];
	$keys=$r1["keywords"];
	$desc=$r1["smalltexten"];
	$img=$r1["img"];;
}
$currurl="";
$currur=explode("/",$_SERVER['REQUEST_URI']);
for($i=2;$i<count($currur);$i++)
{
	$currurl .="/".$currur[$i]??"";
}

function autokeywords($page,$title="", $category="")
{

	
	$pg=($page!=""?",".$page :"");

	return "iland, აილენდი , apple , მაკბუქი, აიფონები,aifonebi, aiponi,aiponebi,onlain, ონლაინ, მაღაზია, ვაჭრობა ".$page .",".$category.",".$title;
}
$desc="შეიძინეთ apple ის პროდუქცია მხოლოდ iland ში, mackbook, imac, mackbook pro, iphone 12 , iphone 13, $title";
$slug=($p2!="product"?$p2:$p3);
$seopg=($p2!="product"?"":$p2.",პროდუქტები");
$seocats=mysqli_query($con,"SELECT * FROM categories WHERE slug='$slug' ");
$seocat=mysqli_fetch_assoc($seocats);
$linklangen="/en".(($sitemap["slug_en"]??"")!=""?"/".$sitemap["slug_en"]:"").(($sitemap2["slug_en"]??"")!=""?"/".$sitemap2["slug_en"]:"");
$linklangka="/ka".(($sitemap["slug_ka"]??"")!=""?"/".$sitemap["slug_ka"]:"").(($sitemap2["slug_ka"]??"")!=""?"/".$sitemap2["slug_ka"]:"");
?>
<!doctype html>
<html lang="en">
<head>
  <base href="https://bosch999.ge/"/>
  <meta charset="UTF-8">
  <link rel="icon" type="image/svg+xml" href="https://bosch999.ge/img/clogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$sitemap["title_$L"] ?></title>
 	<meta name="description" content="<?=$sitemap["description_$L"] ?>">
	<meta name="keywords" content="<?=$sitemap["keywords_$L"] ?>">
	<link href="/supr/css/icons.css" rel="stylesheet" />
<link rel="shortcut icon" href="https://bosch999.ge/img/clogo.png" data-react-helmet="true">
		<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="/css/style.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
<script>
// $.dialog({
    // title: '',
    // content: '<div class="text-center">COMING SOON!</div>',
    // closeIcon: false,  
    // buttons: {        
        
    // }
// });
</script>
</head>
<body page="<?=$P?>" lang="<?=$L?>">
<header>
	<nav class="NAV navbar px-3 py-2 w-100 <?=$P!="home"?"SCROLLED":""?>">
		<ul class="w-100 menu">
		<li class="text-center text-white LOGOCO" style="width:360px"><a class="LOGO pt-1 " style="text-shadow: 1px 1px 3px #000;" href="/"><img src="/img/clogo.png"  class="mx-2" style="width:50px;filter: drop-shadow(1px 1px 0px black);"/>BOSCH 999</a></li>
		<?php
			$q1=mysqli_query($con,"SELECt * FROM sitemap WHERE top=1 ORDER By pos ASC");
			while($r1=mysqli_fetch_Array($q1)){ 
?>
		<li class="ITEM d-none <?=$P==$r1["slug_$L"]?"current":""?>"><a href="/<?=$L?>/<?=$r1["slug_$L"]?>"><?=$r1["name_$L"]?></a></li>
<?php			
			}
		?>
		<li class="ITEM d-none <?=$P=="cart"?"current":""?>"><a href="/<?=$L?>/cart"><i class="fa fa-shopping-cart text-white"></i><span class="CARTCO"><?=$cartco>0?$cartco:""?></span></a></li>		
		<!--<li class="ITEM d-none <?=$P=="signin"?"current":""?>"><a href="/<?=$L?>/<?=($ru["firstname"]??"")!=""?"profile":"signin"?>"><?=$ru["firstname"]??""?> <i class="fa fa-user text-white"></i></a></li>-->
		<li class="d-none"><a href="/<?=$L?>/services" ><?=$W["Order Now"]?></a></li>
		<li class="ITEM"><a href="#aboutus"><?=$W["aboutus"]?></a></li>
		<li class="ITEM"><a href="#contact"><?=$W["contact"]?></a></li>
		<li class="ITEM SHOWM d-none"><a class="NAVITEM CP"><img src="https://new.gwl.ge/img/<?=$L?>.png"><img class="ms-1" src="https://new.gwl.ge/img/down.png"></a>
			<ul class="DROPLIST px-0" style="display:none;width:67px;">
				<li><a href="<?=$linklangka?>"><img src="https://new.gwl.ge/img/ka.png"></a></li>
				<li><a href="<?=$linklangen?>"><img src="https://new.gwl.ge/img/en.png"></a></li>
			</ul>
		</li>
		</ul>
	</nav>
</header>
<main>
<script>
$(document).on("click",".NAVITEM",function(){
	$(this).next().slideToggle();
});
</script>
<style>
.DROPLIST a {
    color: #000 !important;
    font-family: 'Firago';
    font-weight: lighter !important;
    font-size: 13px;
    padding: 5px 7px !important;
    display: inline-block;
    width: 100% !important;
}
.DROPLIST {
    margin-top: 7px;
    position: absolute;
    width: 280px;
    background: #fff;
    box-shadow: 1px 1px 3px #999;
}
.LOGO{
	font-size:40px;
	font-weight:900;
}
.NAV{
	align-items: center;
	height:70px;
	position:fixed;
	color:#fff;
	display: flex;
	width: 100%;
	justify-content: space-between;
	font-family:Poppins,sans-serif;
	font-weight:700;
	z-index: 99999;
	top: 0px;
}
.swiper{
	width:100%;
}
.SCROLLED{
	background-color: #101130;
	transition: background-color 0.5s ease;
}
li{
	display:inline-block;
}
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.menu {
    display: flex;
    align-items: center;
    list-style: none;
    padding: 0;
    margin: 0;
    width: 100%;
}

.LOGOCO {
    margin-right: auto; 
}

</style>
<script>
$(window).on('scroll', function() {
	if($("body").attr("page")=="home"){
		if ($(this).scrollTop() > 0) {
			$('.NAV').addClass('SCROLLED');
		} else {
			$('.NAV').removeClass('SCROLLED');
		}
    }
});
</script>