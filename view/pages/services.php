<section class="mt-5">
	<div class="SECTIONTITLE">მომსახურება</div>
	<div class="container mb-5">
		<div class="row">
		<div class="col-sm-12 mx-auto">
		<div class="row py-5" style="justify-content:center;gap: 30px;">
<?php

$q11=mysqli_query($con,"SELECT t1.*,t2.slug_$L,t2.name_$L FROM services as t1 LEFt JOIN sitemap as t2 ON(t1.sitemapid=t2.id) WHERE t1.active=1 ORDER BY pos ASC");
while($r11=mysqli_fetch_array($q11)){
?>
				<a href="/<?=$L?>/service/<?=$r11["slug_$L"]?>" class="BOX1 d-flex px-0" style="background:url('<?=$r11["img"]?>');background-size: cover;background-position: center;">
					<div class="BOXTITLE"><h2><?=$r11["name_$L"]?></h2></div>
				</a>
<?php
}
?>
		</div>
		</div>
		</div>
	</div>
	<div class="container-fluid BLUEBACK">

	</div>
</section>
<style>
.SECTIONTITLE {
    display: inline-block;
    background: #101130;
    width: auto;
    height: 62px;
    font-size: 36px;
    text-align: right;
    color: #fff;
    font-weight: 900;
    padding-left: 110px;
    padding-right: 30px;
    margin-top: 70px;
}
.BOX1 {
    height: 250px;
    width: 250px !important;
    justify-content: flex-end;
    flex-direction: column;
    transition: filter 0.5s ease;
    border: solid 3px #101130;
    // border-radius: 20px;
	overflow:hidden;
}
.BOXTITLE {
    transition: background 0.5s ease;
    background: linear-gradient(#34825700, #34825700);
    color: #e91e63;
    height: auto;
    padding: 15px 15px;
    font-size: 15px;
    font-weight: bold;
}
.BOX1:hover {
    cursor: pointer;
    filter: brightness(0.9);
}
.BOX1 .BOXTITLE {
    background: linear-gradient(#34825700, #101130);
	color: #FFF;
}
</style>