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
<div class="sidebar-page-container">
  <div class="auto-container">
    <div class="row clearfix">
      <div class="content-side col-lg-8 col-md-12 col-sm-12">
        <div class="blog-sidebar">
<?php
$ACP=1;
$p=isset($_REQUEST["p"])?$_REQUEST["p"]:1;
if(isset($p)){
	$ACP=$p;
}
$PA=30;
$fr=($ACP-1)*$PA;
$WHERE="";
$q1=mysqli_query($con,"SELECT t1.*,t2.slug_$L FROM posts as t1 LEFT JOIN sitemap as t2 ON(t1.sitemapid=t2.id)
WHERE t1.id>0  AND t1.active=1  $WHERE ORDER BY t1.id DESC LIMIT ".$PA." OFFSET ".$fr."");
while($r1=mysqli_fetch_array($q1)){
?>
          <div class="news-block wow fadeInRight" style="animation-name: fadeInRight; visibility: visible;">
            <div class="inner-box">
              <div class="image-box" style="height:350px;background:url('<?=$r1["img_$L"]?>');background-position:center;background-size:cover" >
                <figure class="image">
                  <a href="/<?=$L?>/post/<?=$r1["slug_$L"]?>">
                 
                  </a>
                </figure>
              </div>
              <div class="lower-content">
                <ul class="post-info d-none">
                  <li>
                    <span class="far fa-comments"></span> Admin
                  </li>
                  <li>
                    <span class="far fa-user"></span> comments 3
                  </li>
                </ul>
                <h4>
                  <a href="/<?=$L?>/post/<?=$r1["slug_$L"]?>"><?=ucfirst($r1["title_$L"])?></a>
                </h4>
                <div class="text"><?=ucfirst(mb_substr(strip_tags($r1["text_$L"]),0,220))?>...</div>
                <div class="btn-box">
                  <a class="read-more" href="/<?=$L?>/post/<?=$r1["slug_$L"]?>"><?=$W["Read More"]?></a> 
                </div>
              </div>
            </div>
          </div>
<?php
}	 
?>


      <ul class="styled-pagination text-center mt-5" role="navigation" aria-label="Pagination">
        <li class="previous">
          <a href="/<?=$L?>/blog/1" class="" tabindex="0" role="button" aria-disabled="false" aria-label="Previous page" rel="prev">
            <i class="icon fa fa-angle-left"></i>
          </a>
        </li>
<?php
$q3=mysqli_query($con,"SELECT * FROM posts as t1 WHERE t1.id>0 AND t1.active=1  ");
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
	  <a href="/<?=$L?>/blog/<?=$i?>" rel="prev" role="button" tabindex="0" aria-label="Page 1">1</a>
	</li>
<?php }
}
?>

        <li class="next">
          <a href="/<?=$L?>/blog/<?=$ACP+1?>" class="" tabindex="0" role="button" aria-disabled="false" aria-label="Next page" rel="next">
            <i class="icon fa fa-angle-right"></i>
          </a>
        </li>
      </ul>
        </div>
      </div>
      <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
        <aside class="sidebar padding-left">
          <div class="sidebar-widget search-box d-none">
            <form>
              <div class="form-group">
                <input type="search" name="search" autocomplete="off" placeholder="Search..." required="">
                <button type="submit">
                  <span class="icon fa fa-search"></span>
                </button>
              </div>
            </form>
          </div>
          <div class="sidebar-widget popular-posts">
            <h4 class="sidebar-title">Latest Posts</h4>
            <div class="widget-content">
<?php
$q1=mysqli_query($con,"SELECT t1.*,t2.slug_$L FROM posts as t1 LEFT JOIN sitemap as t2 ON(t1.sitemapid=t2.id)
WHERE t1.id>0  $WHERE ORDER BY t1.id DESC LIMIT 7");
while($r1=mysqli_fetch_array($q1)){
?>
              <article class="post">
                <div class="post-inner">
                  <figure class="post-thumb">
                    <a href="/<?=$L?>/post/<?=$r1["slug_$L"]?>">
                      <img src="<?=$r1["img_$L"]?>" alt="image">
                    </a>
                  </figure>
                  <div class="post-info"><?=$r1["date_$L"]?></div>
                  <div class="text">
                    <a href="/<?=$L?>/post/<?=$r1["slug_$L"]?>"><?=$r1["title_$L"]?></a>
                  </div>
                </div>
              </article>
<?php
}	 
?>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</div>

<style>
body{
	padding-top:70px;
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
.sidebar-page-container {
    position: relative;
    padding: 120px 0 70px
}

.sidebar-page-container .content-side,.sidebar-page-container .sidebar-side {
    margin-bottom: 50px
}

.sidebar-page-container .sidebar.padding-left {
    padding-left: 40px
}

.sidebar-widget {
    position: relative;
    margin-bottom: 50px
}

.sidebar-widget:last-child {
    margin-bottom: 0
}

.sidebar-title {
    position: relative;
    display: block;
    font-size: 24px;
    line-height: 1.2em;
    color: #333;
    font-weight: 700;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 2px solid #eeeeee
}

.sidebar .search-box {
    margin-bottom: 60px
}

.sidebar .search-box .form-group {
    position: relative;
    margin: 0
}

.sidebar .search-box .form-group input[type=text],.sidebar .search-box .form-group input[type=search] {
    position: relative;
    padding: 20px 50px 20px 30px;
    border: 2px solid #eeeeee;
    background: #fff;
    display: block;
    font-size: 15px;
    line-height: 18px;
    width: 100%;
    height: 60px;
    color: #333;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -ms-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease
}

.sidebar .search-box .form-group input[type=text]:focus,.sidebar .search-box .form-group input[type=search]:focus {
    color: #666
}

.sidebar .search-box .form-group button {
    position: absolute;
    right: 0;
    top: 0;
    height: 60px;
    width: 60px;
    display: block;
    font-size: 18px;
    color: #888;
    line-height: 60px;
    font-weight: 400;
    background: #eee;
    z-index: 9;
    cursor: pointer
}

.sidebar .search-box .form-group button:hover {
    color: #e1137b
}

.sidebar .popular-posts .post {
    position: relative;
    margin-bottom: 20px
}

.sidebar .popular-posts .post .post-inner {
    position: relative;
    padding-left: 110px;
    min-height: 90px
}

.sidebar .popular-posts .post .post-thumb {
    position: absolute;
    left: 0;
    top: 0;
    width: 90px
}

.sidebar .popular-posts .post .post-thumb img {
    display: block;
    width: 100%;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease
}

.sidebar .popular-posts .post .text {
    position: relative;
    font-size: 18px;
    line-height: 26px;
    font-weight: 600;
    color: #888;
    margin: 0
}

.sidebar .popular-posts .post .text a {
    color: #3f4161;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease
}

.sidebar .popular-posts .post a:hover {
    color: #e1137b
}

.sidebar .popular-posts .post-info {
    position: relative;
    font-size: 16px;
    color: #7f8897;
    font-weight: 400;
    line-height: 30px;
    margin-bottom: 5px
}

.blog-categories,.blog-categories li {
    position: relative
}

.blog-categories li a {
    position: relative;
    display: block;
    color: #333;
    font-size: 18px;
    line-height: 30px;
    font-weight: 400;
    margin-bottom: 10px;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -ms-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease
}

.blog-categories li a span {
    float: right
}

.blog-categories li a:hover {
    color: #e1137b
}

.sidebar .popular-tags .widget-content {
    position: relative
}

.sidebar .popular-tags a {
    position: relative;
    float: left;
    padding: 5px;
    margin: 0 20px 10px 0;
    color: #333;
    text-align: center;
    font-size: 16px;
    line-height: 20px;
    background: none;
    font-weight: 400;
    border-bottom: 2px solid #dddddd;
    background-color: #fff;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease
}

.sidebar .popular-tags a:hover {
    border-color: #e1137b;
    color: #e1137b
}
.news-block .image img {
    display: block;
    width: 100%;
	height: auto;
}
.news-section {
    position: relative;
    padding: 110px 0 80px;
    overflow: hidden
}

.news-section.alternate {
    padding: 120px 0
}

.news-section .styled-pagination {
    margin-top: 30px
}

.news-block {
    position: relative;
    margin-bottom: 40px
}

.news-block .inner-box {
    position: relative;
    background-color: #fff;
    box-shadow: 0 0 20px #0000001a
}

.news-block .image-box {
    position: relative
}

.news-block .image {
    position: relative;
    overflow: hidden;
    margin-bottom: 0
}

.news-block .image-box .image a:after {
    content: "";
    position: absolute;
    top: -110%;
    left: -210%;
    width: 200%;
    height: 200%;
    opacity: 0;
    background: #ffffff21;
    background: linear-gradient(to right,#ffffff21 0%,#ffffff21 77%,#ffffff80 92%,#fff0 100%)
}

.news-block .inner-box:hover .image-box .image a:after {
    opacity: 1;
    top: -20%;
    left: -30%;
    transition-property: left,top,opacity;
    transition-duration: .7s,.7s,.15s;
    transition-timing-function: linear
}

.news-block .image img {
    display: block;
    width: 100%
}

.news-block .lower-content {
    position: relative;
    padding: 20px 30px 30px
}

.news-block .post-info {
    position: relative;
    margin-bottom: 10px
}

.news-block .post-info li {
    position: relative;
    display: inline-block;
    font-size: 14px;
    line-height: 24px;
    color: #777;
    font-weight: 400;
    margin-right: 25px
}

.news-block .post-info li span {
    margin-right: 5px;
    color: #1d95d2
}

.news-block h4 {
    position: relative;
    display: block;
    font-size: 22px;
    line-height: 1.4em;
    color: #222;
    font-weight: 500;
    margin-bottom: 20px
}

.news-block h4 a {
    color: #222;
    display: inline-block;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease
}

.news-block h4 a:hover {
    color: #e1137b
}

.news-block .text {
    position: relative;
    font-size: 14px;
    line-height: 27px;
    color: #888;
    font-weight: 400;
    margin-bottom: 20px
}

.news-block .btn-box {
    position: relative
}

.news-block .btn-box a {
    position: relative;
    display: inline-block;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    padding: 4px 15px;
    background-color: #1d95d2;
    border-radius: 2px;
    border: 1px solid #1d95d2;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease
}

.news-block .btn-box a:hover {
    background: none;
    color: #1d95d2;
    border-color: #1d95d2
}

.news-section .icon-circle-blue {
    right: -305px;
    bottom: -120px;
    opacity: .7;
    -webkit-animation: fa-spin 10s infinite;
    -moz-animation: fa-spin 10s infinite;
    -ms-animation: fa-spin 10s infinite;
    -o-animation: fa-spin 10s infinite;
    animation: fa-spin 10s infinite
}

.news-section .twist-line-1 {
    left: -110px;
    top: 290px
}

.news-section .twist-line-2 {
    left: -10%;
    top: 80px
}

.news-section .twist-line-3 {
    left: 90px;
    top: 50px
}

.blog-sidebar {
    position: relative
}

.blog-sidebar .news-block {
    margin-bottom: 50px
}

.blog-sidebar .news-block .lower-content {
    padding: 30px
}

.blog-sidebar .news-block h4 {
    font-size: 26px
}

.blog-single {
    position: relative
}

.blog-single .news-block {
    margin-bottom: 0
}

.blog-single .news-block .inner-box {
    box-shadow: none
}

.blog-single .lower-content {
    padding: 20px 0 0
}

.blog-single h2 {
    font-size: 28px;
    line-height: 1.2em;
    font-weight: 600;
    color: #222;
    margin-bottom: 15px
}

.blog-single .lower-content p {
    font-size: 16px;
    line-height: 30px;
    margin-bottom: 30px;
    color: #888
}

.blog-single .lower-content blockquote {
    position: relative;
    padding: 35px 40px 35px 95px;
    background-color: #fafafa;
    margin: 45px 0
}

.blog-single .lower-content blockquote .icon {
    position: absolute;
    left: 40px;
    top: 40px;
    font-size: 30px;
    line-height: 1em;
    color: #f20487
}

.blog-single .lower-content blockquote p {
    font-size: 20px;
    line-height: 32px;
    color: #7f8897;
    font-weight: 400;
    margin-bottom: 15px
}

.blog-single .lower-content blockquote cite {
    position: relative;
    display: block;
    font-size: 15px;
    line-height: 30px;
    color: #f20487;
    font-weight: 400;
    font-style: normal;
    padding-left: 30px
}

.blog-single .lower-content blockquote cite:before {
    position: absolute;
    left: 0;
    top: 14px;
    height: 1px;
    width: 20px;
    background-color: #f20487;
    content: ""
}

.blog-single .post-share-options {
    position: relative;
    margin-bottom: 65px;
    border-top: 2px solid #eeeeee;
    padding-top: 30px
}

.blog-single .post-share-options .tags {
    position: relative;
    display: inline-block
}

.blog-single .post-share-options .tags li {
    position: relative;
    display: inline-block;
    margin-right: 5px
}

.blog-single .post-share-options .tags a {
    position: relative;
    display: inline-block;
    font-size: 14px;
    line-height: 20px;
    border: 1px solid #dddddd;
    color: #7f8897;
    padding: 5px 20px;
    font-weight: 500;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease
}

.blog-single .post-share-options .tags a:hover {
    color: #e1137b
}

.blog-single .author-box {
    position: relative;
    padding: 40px 50px;
    background-color: #f7f7fa;
    margin-bottom: 90px
}

.blog-single .author-box .inner-box {
    position: relative
}

.blog-single .author-box .info-box {
    position: relative;
    padding-left: 110px;
    min-height: 80px;
    margin-bottom: 20px;
    padding-top: 15px
}

.blog-single .author-box .thumb {
    position: absolute;
    left: 0;
    top: 0;
    height: 80px;
    width: 80px;
    border-radius: 50%;
    overflow: hidden;
    margin-bottom: 10px
}

.blog-single .author-box .thumb img {
    display: block;
    width: 100%
}

.blog-single .author-box .name {
    position: relative;
    display: block;
    font-size: 20px;
    line-height: 1.2em;
    color: #3f4161;
    font-weight: 700
}

.blog-single .author-box .designation {
    display: block;
    font-size: 18px;
    line-height: 25px;
    color: #7f8897;
    font-weight: 400;
    margin-top: 5px
}

.blog-single .author-box .text {
    display: block;
    font-size: 16px;
    line-height: 30px;
    color: #888;
    font-weight: 400;
    margin-bottom: 25px
}

.blog-single .author-box .read-more {
    position: relative;
    display: inline-block;
    font-size: 16px;
    line-height: 24px;
    color: #7f8897;
    font-weight: 500;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease
}

.blog-single .author-box .read-more .icon {
    margin-left: 7px;
    float: right;
    font-size: 20px;
    line-height: 24px
}

.blog-single .author-box .read-more:hover {
    color: #e1137b
}

.styled-pagination {
    position: relative
}

.styled-pagination li {
    position: relative;
    display: inline-block;
    margin: 0 8px 8px 0
}

.styled-pagination li:last-child {
    margin-right: 0
}

.styled-pagination li a {
    position: relative;
    display: block;
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
    transition: all .5s ease
}

.styled-pagination li:hover a,.styled-pagination li.active a {
    background-color: #ec167f;
    color: #fff!important;
    box-shadow: 0 5px 10px #0000001a
}

.styled-pagination li.disabled:hover a {
    background: #fff;
    color: #222!important
}
.sidebar .search-box .form-group button {
    position: absolute;
    right: 0;
    top: 0;
    height: 60px;
    width: 60px;
    display: block;
    font-size: 18px;
    color: #888;
    line-height: 60px;
    font-weight: 400;
    background: #eee;
    z-index: 9;
    cursor: pointer
	outline:none;
	border:none;
}
.fa-search{
    margin-top: -12px;	
}
.sidebar .search-box .form-group input[type=text], .sidebar .search-box .form-group input[type=search] {
    position: relative;
    padding: 20px 50px 20px 30px;
    border: 2px solid #eeeeee;
    background: #fff;
    display: block;
    font-size: 15px;
    line-height: 18px;
    width: 100%;
    height: 60px;
    color: #333;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -ms-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
}

[type=search] {
    -webkit-appearance: textfield;
    outline-offset: -2px;
}
</style>