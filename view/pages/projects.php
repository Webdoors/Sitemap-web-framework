<?php
$ACP=1;
$p=isset($_REQUEST["p"])?$_REQUEST["p"]:1;
if(isset($p)){
	$ACP=$p;
}
$PA=30;
$fr=($ACP-1)*$PA;
if($p3==""||is_numeric($p3)){
?>
<section class="page-title" style="background-image: url('<?=$sitemap["img_$L"]??"https://eventrox-react.expert-themes.com/images/background/5.jpg"?>');">
  <div class="auto-container">
    <h1><?=$sitemap["name_$L"]?></h1>
    <ul class="bread-crumb clearfix d-none">
      <li>
        <a href="/">Home</a>
      </li>
      <li><?=$sitemap["name_$L"]?></li>
    </ul>
  </div>
</section>
<section class="gallery-section">
  <div class="auto-container">
    <div class="row">
<?php
$q1=mysqli_query($con,"SELECT t1.*,t2.slug_$L FROM gallery as t1 LEFT JOIN sitemap as t2 ON(t2.id=t1.sitemapid) ORDER BY t1.id DESC");
while($r1=mysqli_fetch_array($q1)){
?>
      <a href="/<?=$L?>/project/<?=$r1["slug_".$L]?>" class="gallery-item px-0 col-lg-4 col-md-6 col-sm-12 mx-2 mb-3" style="background:url('<?=$r1["img"]?>') no-repeat;background-size: contain!important;background-position: center!important;background-color: #50454A!important;height:374px;width:374px" >
        <div class="image-box">
          <figure class="image">
            
          </figure>
          <div class="overlay-box">
            <div  class="lightbox-image" >
              <div style="margin-top: 50%;" class=" FIRAGO text-white px-5"><?=$r1["name_$L"]?></div>
            </div>
          </div>
        </div>
      </a>
<?php
}
?>
      <ul class="styled-pagination text-center mt-5" role="navigation" aria-label="Pagination">
        <li class="previous">
          <a href="/<?=$L?>/projects/1" class="" tabindex="0" role="button" aria-disabled="false" aria-label="Previous page" rel="prev">
            <i class="icon fa fa-angle-left"></i>
          </a>
        </li>
<?php
$q3=mysqli_query($con,"SELECT * FROM gallery as t1 WHERE t1.id>0 AND t1.active=1   ");
$toto=0;
if($q3){
	$toto=mysqli_num_rows($q3)!==null?mysqli_num_rows($q3):0;	
}

?>
<?php
for($i=1;$i<=ceil($toto/$PA);$i++){
	if(($ACP-5)<=$i&&($ACP+5)>=$i){
?>
	<li class="<?=$ACP==$i?"active":""?>">
	  <a href="/<?=$L?>/projects/<?=$i?>" rel="prev" role="button" tabindex="0" aria-label="Page 1">1</a>
	</li>
<?php }
}
?>

        <li class="next">
          <a href="/<?=$L?>/projects/1" class="" tabindex="0" role="button" aria-disabled="false" aria-label="Next page" rel="next">
            <i class="icon fa fa-angle-right"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</section>

<style>
body{
	padding-top:70px;
}
.page-title .bread-crumb {
    position: relative;
}
.page-title .bread-crumb li:first-child:before {
    position: absolute;
    right: -3px;
    font-size: 18px;
    line-height: 30px;
    color: #fff;
    font-weight: 400;
    content: "|";
}
.page-title .bread-crumb li:first-child:before {
    position: absolute;
    right: -3px;
    font-size: 18px;
    line-height: 30px;
    color: #fff;
    font-weight: 400;
    content: "|";
}
.page-title .bread-crumb li:last-child {
    padding-right: 0;
    margin-right: 0;
}

.page-title .bread-crumb li {
    position: relative;
    display: inline-block;
    font-size: 18px;
    line-height: 30px;
    color: #fff;
    font-weight: 500;
    cursor: default;
    padding-right: 15px;
    margin-right: 15px;
}
.page-title h1 {
    position: relative;
    display: block;
    font-size: 60px;
    color: #fff;
    line-height: 1em;
    font-weight: 700;
    margin-bottom: 20px;
    text-transform: capitalize;
}
.sec-title h2 {
    position: relative;
    display: inline-block;
    font-size: 48px;
    line-height: 1.2em;
    color: #1e1f36;
    font-weight: 700;
}
.gallery-section {
    position: relative;
    padding: 120px 0 90px;
}
.sec-title {
    position: relative;
    margin-bottom: 70px;
}
.clearfix:after {
    display: block;
    clear: both;
    content: "";
}
.gallery-item .image-box:hover .overlay-box {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    opacity: .9;
    border-radius: 0;
}
.gallery-item .image-box {
    -webkit-transform: scale(.5);
    -moz-transform: scale(.5);
    -ms-transform: scale(.5);
    -o-transform: scale(.5);
    transform: scale(.5);
    border-radius: 500px;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
.gallery-item:hover .image-box {
    width: 100%;
    height: 100%;
    position: relative;
    background-color: #1d95d2;
    opacity: 0.9;
	top: -16px;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    opacity: .9;
    border-radius: 0;
}
.gallery-item .overlay-box {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    text-align: center;
    content: "";
    opacity: 0;
    background-color: #1d95d2;
    -webkit-transform: scale(.5);
    -moz-transform: scale(.5);
    -ms-transform: scale(.5);
    -o-transform: scale(.5);
    transform: scale(.5);
    border-radius: 500px;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
.image-box{
	position: relative;
}
.sec-title .title {
    position: relative;
    display: block;
    font-size: 16px;
    line-height: 1em;
    color: #ff8a01;
    font-weight: 500;
    background: #f70068;
    background: -moz-linear-gradient(to left, rgba(247, 0, 104, 1) 0%, rgba(68, 16, 102, 1) 25%, rgba(247, 0, 104, 1) 75%, rgba(68, 16, 102, 1) 100%);
    background: -webkit-linear-gradient(to left, rgba(247, 0, 104, 1) 0%, rgba(68, 16, 102, 1) 25%, rgba(247, 0, 104, 1) 75%, rgba(68, 16, 102, 1) 100%);
    background: linear-gradient(to left, #f70068 0%, #441066 25%, #f70068 75%, #441066 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#F70068",endColorstr="#441066",GradientType=1);
    color: transparent;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    text-transform: uppercase;
    letter-spacing: 5px;
    margin-bottom: 15px;
}
.page-title .bread-crumb li a {
    color: #fff;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;
}
.page-title {
    position: relative;
    text-align: center;
    overflow: hidden;
    z-index: 1;
    padding: 120px 0;
    background-repeat: no-repeat;
    background-position: center bottom;
    background-size: cover;
}
.gallery-item .image-box .image img {
    display: block;
    width: 100%;
    height: auto;
}
.styled-pagination li:hover a, .styled-pagination li.active a {
    background-color: #ec167f;
    color: #fff !important;
    box-shadow: 0 5px 10px #0000001a;
}
a:not([href]):not([class]), a:not([href]):not([class]):hover {
    color: inherit;
    text-decoration: none;
}
.styled-pagination li {
    position: relative;
    display: inline-block;
    margin: 0 8px 8px 0;
}
.fa-angle-left,.fa-angle-right{
    font-size: 20px;
    font-weight: 900;
    margin-top: -10px;	
}
.styled-pagination li a {
    vertical-align: middle;
    position: relative;
    display: inline-block;
    line-height: 50px;
    font-size: 18px;
    height: 50px;
    width: 50px;
    color: #222;
    font-weight: 500;
    text-align: center;
    background: #fff;
    border: 1px solid #dddddd;
    border-bottom: 2px solid #ec167f;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -ms-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
}
.styled-pagination li {
    position: relative;
    display: inline-block;
    margin: 0 8px 8px 0;
}
</style>
<?php
}else{
	include("view/pages/gallerypost.php");
}
?>