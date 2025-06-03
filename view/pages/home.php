<div class="swiper">
	<img class="w-100" src="/img/logo.jpg"/>
	<div class="BTEXT">
<h1 class="FIRAGO" style="font-size:32px">ბოშის ავტონაწილები</h1>								
	</div>
</div>	
<section id="aboutus">
<h3 class="h1 mt-5 text-center border-bottom pt-4 pb-4">ბრენდები</h3>
	<div class="container mb-5 px-5">
		<div class="row mt-5">
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="h-100 mx-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/1024px-Mercedes-Logo.svg.png"/>
			</div>
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="h-100 mx-auto" src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Logo_audi.jpg"/>
			</div>
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="h-100 mx-auto" src="https://blog.logomaster.ai/hs-fs/hubfs/bmw-logo-1963.jpg?width=672&height=454&name=bmw-logo-1963.jpg"/>
			</div>
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="h-100 mx-auto" src="https://logowik.com/content/uploads/images/345_volkswagen_logo.jpg"/>
			</div>
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="h-100 mx-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Toyota_logo_%28Red%29.svg/800px-Toyota_logo_%28Red%29.svg.png"/>
			</div>
			</div>
		<div class="row mt-3">
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="w-100 mx-auto mt-4" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Ford_logo_flat.svg/1000px-Ford_logo_flat.svg.png"/>
			</div>
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="h-100 mx-auto" src="https://cdn.freelogovectors.net/wp-content/uploads/2023/05/hyundai-logo-01-freelogovectors.net_.png"/>
			</div>
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="h-100 mx-auto" src="https://download.logo.wine/logo/Mazda/Mazda-Logo.wine.png"/>
			</div>
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="h-100 mx-auto" src="https://wallpapers.com/images/hd/nissan-automotive-brand-logo-gcfu8m53losfzum1.png"/>
			</div>
			<div class="col-sm-2 mx-auto py-4 border rounded text-center bg-white" style="height:150px">
				<img class="h-100 mx-auto" src="https://logowik.com/content/uploads/images/197_suzuki.jpg"/>
			</div>
		</div>
	</div>
	<div class="container-fluid BLUEBACK">

	</div>
</section>
<section id="aboutus">
<h3 class="h1 mt-5 text-center border-bottom pt-4 pb-4"><?=$W["about us"]?></h3>
	<div class="container mb-5 px-5">
		<div class="row">
		<div class="col-sm-12 mx-auto">
<?php
$q2=mysqli_query($con,"SELECT * FROM aboutus as t1  ORDER BY t1.id DESC");
while($r2=mysqli_fetch_array($q2)){
?>
		<div class="row py-5" style="justify-content:center;gap: 30px;">
<?=$r2["text_$L"]?>
		</div>
<?php
}
?>
		</div>
		</div>
	</div>
	<div class="container-fluid BLUEBACK">

	</div>
</section>
<section>
<h4 class="h1 mt-5 text-center border-bottom pt-4 pb-4" id="contact"><?=$W["find on map"]?></h4>
	<div class="container mb-5">
		<div class="row">
		<div class="col-sm-12 mx-auto">
		<div class="row py-5" style="justify-content:center;gap: 30px;">
	<div class="row map-cont">
		<div class="col-md-12 p-0" >
    <div id="map" class="map"></div>
<img id="overlay" src="/img/pin2.png" />
<img id="overlay3" src="/img/pin2.png" />
		</div>
		</div>
		</div>
		</div>
		</div>
	</div>
	<div class="container-fluid BLUEBACK">

	</div>
</section>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
    <style>
      .map {
        height: 540px;
        width: 100%;
      }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.min.js"></script>
    <script type="text/javascript">;
	// $( document ).ready(function() {
    	// $("#loader").hide();
	// });
        // create a layer with the OSM source
        var layer = new ol.layer.Tile({
			maxZoom: 18,
          source: new ol.source.OSM()
        });

        // create an interaction to add to the map that isn't there by default
        var interaction = new ol.interaction.DragRotateAndZoom();

        // create a control to add to the map that isn't there by default
        var control = new ol.control.FullScreen();

        // center on london, transforming to map projection
        var center = ol.proj.transform([44.7856045,41.7278085], 'EPSG:4326', 'EPSG:3857');
        var center3 = ol.proj.transform([44.7856335,41.7271385], 'EPSG:4326', 'EPSG:3857');
        var center2 = ol.proj.transform([44.7840235,41.726685], 'EPSG:4326', 'EPSG:3857');
        // an overlay to position at the center
        var overlay = new ol.Overlay({
          position: center,
          element: document.getElementById('overlay')
        });
        var overlay3 = new ol.Overlay({
          position: center3,
          element: document.getElementById('overlay3')
        });
        // view, starting at the center
        var view = new ol.View({
          center: center2,
		  maxZoom: 17,
          zoom: 17
        });
        // finally, the map with our custom interactions, controls and overlays
        var map = new ol.Map({
			target: 'map',
			layers: [layer],
			interactions: ol.interaction.defaults({mouseWheelZoom:false}),
			<!-- interactions: [interaction], -->
			<!-- controls: [control], -->
			overlays: [overlay,overlay3],
			view: view
        });


    </script>
<style>
@media screen and (max-width: 768px) {
	.ITEM{
		display:none;
	}
	.CLOGO {
		top: 29%!important;
		width: 46%!important;
		left: 16%!important;
	}
    .LOGO {
        height: 37px!important;
        margin-top: -35px!important;
        margin-left: -25px!important;
    }
    footer .LOGO {
        height: 37px !important;
        transform: translateY(-50px);
        margin-left: 0px !important;
    }
	.BTEXT{
		display:none;
	}
	.SEL1,.SEL2{
		width:45%!important;
	}
}
.btn-primary{
    background: #00acee;
}
.irs--flat .irs-bar {
    background-color: #00acee;
}
.text-primary {
    color: #00acee !important;
	font-weight: bold;
}
.form-control,.form-select {
    height: 50px;
}
.nav .nav-link.active:after {
    background: #d1aa67;
}
.nav .nav-link:after {
    content: "";
    height: 2px;
    width: 100%;
    display: block;
    background: transparent;
    transform: translateY(-2px);
}
.nav .nav-link.active {
    background: transparent;
    color: #00acee;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #00acee;
}
.nav .nav-link {
    font-weight: 600;
    color: #636363;
}
.nav-form-result-output, .nav-form-result .nav-form-col-title, .nav .nav-link, .text-uppercase {
    font-feature-settings: "case" on;
}
.nav.nav-pills {
    display: inline-flex;
    background: #ece8ed;
    border-radius: 5px;
}
.nav {
    display: flex;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
body{
	background:#f1f1f1;
}
.card-heading-horizontal-lined {
    margin-bottom: 1.5rem;
}
.card-heading, .card-heading-vertical-lined .card-title {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.card-heading {
    text-align: center;
}
.card-heading-horizontal-lined .card-title {
    font-weight: 700;
    font-feature-settings: "case" on;
    text-transform: uppercase;
    color: #00acee;
    margin-bottom: .5rem;
}
.SVG polygon:hover{
	fill: #f1f1f10d !important;
}
.SVG polygon{
	fill:#ffffff1c!important;
}
.CLOGO{
	position: absolute;
    top: 50%;
    width: 28%;
    /* z-index: 9999; */
    left: 50%;
    transform: translate(70%, -50%);
    border-radius: 28px;
    box-shadow: 1px 1px 24px #000;
}
.BTEXT{
position: absolute;
    top: 80%;
    color: #fff;
    font-family: 'Poppins';
    margin: 0px 16%;
    font-size: 20px;
    font-weight: 600;
    background: #0000007a;
    padding: 10px;	
}
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