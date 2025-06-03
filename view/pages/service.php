<style>
#selectable li {
	 border:solid 1px #cccccc61;
}
#feedback { font-size: 1.4em; }
#selectable .ui-selecting { background: #FECA40; }
#selectable .ui-selected { background: #F39814; color: white; }
#selectable { list-style-type: none; margin: 0; padding: 0; width:900px;height:400px; }
#selectable li { margin: 0px; padding: 1px; float: left; width: 50px; height:50px; font-size: 4em; text-align: center; }
.KACI{
    width: 50px;
    right: calc(50% - 519px);
    position: absolute;
    top: 900px;
}
.WIDTH{
	color:#fff;
	font-size:12px;
	position:absolute;
	margin-top:-20px;
	user-select: none; 
	-webkit-user-select: none;
	-moz-user-select: none; 
	-ms-user-select: none; 
}
.HEIGHT{
	color:#fff;
	font-size:12px;	
	position:absolute;
	margin-left:-20px;
	user-select: none; 
	-webkit-user-select: none; 
	-moz-user-select: none;   
	-ms-user-select: none; 
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
.BOX1:hover .BOXTITLE {
    background: linear-gradient(#34825700, #101130);
	color: #FFF;
}
h1{
	font-weight:700!important;
	width:70%;
}
.SERV p{
	font-size:18px!important;
}
table{
	width:100%!important;
}
td{
	width:49%!important;
}
td img{
	float:right!important;
}
.LI1{
	font-size:18px!important;
	list-style-type: none!important;
    list-style-image: url(/img/l1.png);

}
.LI2{
	font-size:16px!important;
	list-style-type: none!important;
    list-style-image: url(/img/l2.png);
}
.BOX1{
	width:250px!important;
	height:250px!important;
}
.SECTIONTITLE {
    display: inline-block;
    background: #348257;
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
.SHIPPING {
    background: url(https://eventrox-react.expert-themes.com/images/main-slider/2.jpg);
    background-size: cover;
    background-position: center;
    height: 500px;
    margin-top: -132px;
}
.TITLE3 {
    font-weight: bold;
    font-size: 26px;
    color:#101130;
}
</style>
<?php 
$q1=mysqli_query($con,"SELECT t1.* FROM services as t1 LEFt JOIN sitemap as t2 on(t1.sitemapid=t2.id) WHERE t2.slug_$L='".$p3."'");
$r1=mysqli_fetch_array($q1);
$q12=mysqli_query($con,"SELECT * FROM about WHERE id='1'");
$r12=mysqli_fetch_array($q12);
$q14=mysqli_query($con,"SELECT * FROM discount_matrix ");
$r14=mysqli_fetch_all($q14,MYSQLI_ASSOC);
// var_dump($r14);
$arr=[];
$arr2=[];
foreach($r14 as $ar){
	$arr[]=array_values($ar);
	$ar=array_values($ar);
	array_shift($ar);
	$arr2[]=$ar;
}
?>

<section class="">
	<div class="SECTIONTITLE" style="transform: translateY(224px)"><?=$r1["name_".$L]??""?></div>
	<div class="container-fluid SHIPPING"></div>
	<div class="container SERV">

		<div class="row py-2 ">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

</head>
<body>
<section  style="height:624px;background: url(/img/d2.jpg);background-size: cover;">
 <div class="h1 text-center mb-0 py-4 text-white"><?=$W["მონიშნეთ ზომა რაოდენობრივად"]?><div style="font-size:11px"><?=$W["რამდენიმე ეკრანის მოსანიშნად დააჭირეთ ctrl"]?></div></div>
<ol id="selectable" class="mx-auto" style="opacity:0.85;background: url(/img/d1.png);    background-size: contain;
    background-repeat: repeat;">
<?php
for($i=0;$i<144;$i++){
?>
  <li class="ui-state-default"></li>
<?php
}
?>
</ol>
<img class="KACI" src="/img/k1.png"/>		
<script>
let isCtrlActive = false;
document.addEventListener("keydown", function (event) {
  if (event.ctrlKey) {
    isCtrlActive = true;
  }
});
document.addEventListener("keyup", function (event) {
  if (!event.ctrlKey) {
    isCtrlActive = false;
  }
});

var objects=0;
var obje="";
$( "#selectable" ).selectable({
	 unselected: function( event, ui ) {
		$( "#select-result" ).html(  ( $( ".ui-selecting", this ).length*0.25) );	
		$( "#select-result2" ).html( ( $( ".ui-selecting", this ).length) );	
	 }, 
	unselecting: function( event, ui ) {
		if(!isCtrlActive){
			$( "#selectable li" ).each(function(){$(this).attr("d","").html("")});
		}

		$( ".bg-danger").removeClass("bg-danger");
		$( ".bg-success").removeClass("bg-success");
		if($( ".ui-selecting", this ).length*0.25>36){
				$( ".ui-selecting").addClass("bg-danger");
			}else{
				$( ".ui-selecting").addClass("bg-success");
			}
		$( "#select-result" ).html(  ( ($( ".ui-selected", this ).length+$( ".ui-selecting", this ).length)*0.25) );	
		$( "#select-result2" ).html( ( ($( ".ui-selected", this ).length+$( ".ui-selecting", this ).length)) );	
	},
	selecting: function( event, ui ) {
		if(!isCtrlActive){
			$( "#selectable li" ).each(function(){$(this).attr("d","").html("")});
		}
		$( ".bg-danger").removeClass("bg-danger");
		$( ".bg-success").removeClass("bg-success");
		if($( ".ui-selecting", this ).length*0.25>36){
				$( ".ui-selecting").addClass("bg-danger");
			}else{
				$( ".ui-selecting").addClass("bg-success");
			}
			var a=($( ".ui-selected", this ).length+$( ".ui-selecting", this ).length);
			var a2=a*0.25;
		$( "#select-result" ).html(  (a2) );	
		$( "#select-result2" ).html( (a) );
		
		    var startDate = $('input[name="dates"]').data('daterangepicker').startDate;
    var endDate = $('input[name="dates"]').data('daterangepicker').endDate;
		var totalDays = endDate.diff(startDate, 'days') + 1; 


	var totalPrice = cPrice(price,a2,totalDays)*totalDays*a2;
		$(".TOTAL").html(totalPrice.toFixed(2));
		$(".ADDCART").attr("price",totalPrice.toFixed(2));
	},
  start: function( event, ui ) {
	  
  },
   stop: function( event, ui ) { 
   if(!isCtrlActive){
	  $( "#selectable li" ).each(function(){$(this).attr("d","").html("")});
  }
$( "#selectable li" ).html("");   
	$( "#select-result" ).html( ( $( ".ui-selected", this ).length*0.25) );	   
	$( "#select-result2" ).html( ( $( ".ui-selected", this ).length) );	   
	var result = $( "#select-result3" ).empty();

	let totalColumns = 18;
	objects++;
        $( ".ui-selected", this ).each(function() {
          var index = $( "#selectable li" ).index( this );
          result.append( "," + ( index + 1 ) );

if($(this).attr("d")==undefined||$(this).attr("d")==""){
	$(this).attr("d",objects);
}

        });	
		
		for(var i=0;i<=objects;i++){
			var k=[];
			var k2=[];
			$( ".ui-selected[d='"+i+"']", this ).each(function() {
				var index = $( "#selectable li" ).index( this );
				result.append( "," + ( index + 1 ) );
				k.push(index);
			});
			obje=isRectangle(k, totalColumns);

			try{
				if(!isNaN(obje.width)){
					$($( "#selectable li" )[(k[0])]).html("<div class='WIDTH text-center' style='min-width:74px;width:"+obje.width*50+"px'>"+obje.width*0.50+"მ სიგანე</div><div class='HEIGHT' style='margin-left:"+(obje.width*50+5)+"px"+";margin-top:"+(obje.height*22)+"px"+"'>"+obje.height*0.50+"მ სიმაღლე</div>");	
				}else{
					var de=$($( "#selectable li" )[(k[0]-1)]).attr("d");
					$(".ui-selected[d='"+de+"']" ).attr("d","").html("").removeClass("ui-selected");
					
				}
		
			}catch(e){
				
			}
		}	
		$( ".bg-danger").removeClass("bg-danger");
		$( ".bg-success").removeClass("bg-success");
		if($( ".ui-selected", this ).length*0.25>36){
				$( ".ui-selected").addClass("bg-danger");
			}else{
					$( ".ui-selected").addClass("bg-success");
			}
		$("#select-result3").html(objects+" ერთეული");	
    var startDate = $('input[name="dates"]').data('daterangepicker').startDate;
    var endDate = $('input[name="dates"]').data('daterangepicker').endDate;
		var totalDays = endDate.diff(startDate, 'days') + 1; 

	var totalPrice = cPrice(price,Number($("#select-result").html()),totalDays)*totalDays*Number($("#select-result").html());
		$(".TOTAL").html(totalPrice.toFixed(2));
		$(".ADDCART").attr("price",totalPrice.toFixed(2));
	}
});
function isRectangle(indices, totalColumns) {
    let coordinates = indices.map(index => ({
        row: Math.floor(index / totalColumns),
        col: index % totalColumns
    }));
console.log(indices);
console.log(coordinates);
    let rowGroups = {};
    coordinates.forEach(({ row, col }) => {
        if (!rowGroups[row]) rowGroups[row] = [];
        rowGroups[row].push(col);
    });

    let rows = Object.keys(rowGroups).map(Number).sort((a, b) => a - b);
    let columnCounts = [];

    for (let row of rows) {
        let cols = rowGroups[row].sort((a, b) => a - b);

        for (let i = 1; i < cols.length; i++) {
            if (cols[i] !== cols[i - 1] + 1) return { isRectangle: false };
        }

        columnCounts.push(cols.length);
    }
    let allSameWidth = columnCounts.every(count => count === columnCounts[0]);
    for (let i = 1; i < rows.length; i++) {
        if (rows[i] !== rows[i - 1] + 1) return { isRectangle: false };
    }
    if (allSameWidth) {
        let height = rows.length;
        let width = columnCounts[0];
		// console.log({ isRectangle: true, width, height });
        return { isRectangle: true, width, height };
		
    }
    return { isRectangle: false }; 
}

let indices = [373, 374, 375, 410, 411, 412, 447, 448, 449];
let totalColumns = 18;

 // true
</script>
<p id="feedback" class="text-white">
<div class="text-white"><span><?=$W["total"]?>: </span> <span id="select-result"></span> <?=$W["კვ.მ"]?> <b class="text-danger"><?=$W["მარაგშია"]?> 36<?=$W["კვ.მ"]?></b></div>
<div class="text-white"><span><?=$W["quantity"]?>: </span> <span id="select-result2"></span> <?=$W["ც"]?></div>
<div class="text-white d-none"><span><?=$W["screens"]?>:</span> <span id="select-result3"></span></div>
<div class="OBJECTS"></div>
</p>
		</div>
		<div class="row py-1 ">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="col-4 mx-auto text-center">
	<label><?=$W["არიჩიეთ პერიოდი"]?>:</label>
	<input type="text" name="dates" class="DATES text-center form-control pull-right">
	<script>
var price=<?=$r12["price"]?>;
		$(function() {
			$('input[name="dates"]').daterangepicker({  "drops": "up",  "opens": "center",startDate: moment(), endDate: moment().add(2, 'day')

			}, function(start, end, label) {
				var totalDays = end.diff(start, 'days') + 1; 

				var totalPrice = cPrice(price,Number($("#select-result").html()),totalDays)*totalDays*Number($("#select-result").html()); 
				$(".TOTAL").html(totalPrice.toFixed(2));
				$(".ADDCART").attr("price",totalPrice.toFixed(2));
			});
		})
		
const pM2 = JSON.parse('<?=json_encode($arr)?>');	
const pM = JSON.parse('<?=json_encode($arr2)?>');	
// console.log(pM);
function cPrice(bPrice, sqm, rDuration) {
	var min=pM2[0][0];
	
	// console.log(min);
	var max=pM2[pM2.length-1][0];
	if(sqm<min){sqm=min;}if(sqm>max){sqm=max;}
	sqm=Math.floor(sqm);
    let dIndex=rDuration-1;
    let sqmIndex=sqm-min; 	
    let priceIncrease=bPrice*((100-pM[sqmIndex][dIndex])/100);
    return priceIncrease;
}
		
	</script>
</div>
<div class="col-12 mt-3 mx-auto text-center" style="font-size:24px" >
	<?=$W["total"]?>: <span class="TOTAL">0.00</span> ₾
</div>
<div class="col-12 mt-3 mx-auto text-center">
<div class="row">
<div class="col-4 mt-3 mx-auto text-center">
	<label><?=$W["აირჩიე კონსტრუქცი"]?>:</label>
<div class="row my-3">
	<div class="SELCON col-6 CP" title="დასაკიდი" d="დასაკიდი"><img class="w-100" src="/img/v1.png"/></div>
	<div class="SELCON col-6 CP" title="დასადგამი" d="დასადგამი"><img class="w-100" src="/img/v2.png"/></div>
</div>
</div>
</div>
</div>
<script>
$(document).on("click",".SELCON",function(){
	$(".SELECTED").removeClass("SELECTED");
	$(this).addClass("SELECTED");
});
</script>
<style>
.SELCON img{
	filter: grayscale(1);
}
.SELECTED img,.SELCON img:hover{
	filter: grayscale(0);
}
.SELECTED img{
	border:solid 4px #101130;
	border-radius:10px;
}
.button--mimas {
    text-transform: uppercase;
    letter-spacing: 0.05rem;
    font-weight: 700;
    font-size: 0.85rem;
    border-radius: 0.5rem;
    overflow: hidden;
    color: #fff;
    background: #e7e7e7;
}
.button--mimas:hover::before {
    transform: translate3d(100%, 0, 0);
}
.button--mimas::before {
    content: '';
    background:#31a364;
    width: 148% !important;
    left: -12% !important;
    transform: skew(30deg);
    transition: transform 0.4s cubic-bezier(0.3, 1, 0.8, 1);
}
.button::before, .button::after {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.button--mimas span {
    position: relative;
	    color: #fff;
    // mix-blend-mode: difference;
}
.button {
    pointer-events: auto;
    cursor: pointer;
    background:#0d6efd;
    border: none;
    padding: 1.5rem 3rem;
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    position: relative;
    display: inline-block;
}
</style>
<div class="col-12 mt-3 mx-auto text-center">
<button class="button button--mimas"><span><a class="text-white ADDCART" d="1" price="0" oid="" thumb="/img/d1.png"><?=$W["add to cart"]?>
 <i class="fa text-white fa-shopping-cart"></i></a></span></button>
</div>

		</div>
		<div class="row py-2 ">
		<label class="mb-3"><?=$W["description"]?></label>
			<div class="col-12 mx-auto pe-5">
				<div class="row">	
					<div class="col-12 F16 mt-3">
<?=$r1["description_".$L]??""?>			
					</div>	
					<div class="col-12 F14 mt-0">
					<img class="mb-4 d-none" src="/img/line1.png"/>
<?=$r1["text_".$L]??""?>				
					</div>						
				</div>				
			</div>
		</div>
		<div class="row py-2 ">
<div class="col-12 mt-3 mx-auto ">
<div class="accordion" id="accordionExample">
<?php
$q22=mysqli_query($con,"SELECT * FROm specifications WHERE serviceid='".$r1["id"]."' ORDER BY id DESC ");
while($r22=mysqli_fetch_array($q22)){
?>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$r22["id"]?>" aria-expanded="false" aria-controls="collapseOne<?=$r22["id"]?>">
       <?=$r22["name_$L"]?>
      </button>
    </h2>
    <div id="collapseOne<?=$r22["id"]?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <?=$r22["text_$L"]?>
      </div>
    </div>
  </div>
<?php
}
?>
</div>
</div>
		</div>

	</div>
</section>
<section>

</section>
<section>
	<div class="container mb-5">
		<div class="my-1" style="border: 1px solid #101130"></div>
		<div class="TITLE3 text-center pt-5"><?=$W["სხვა სერვისები"]?></div>
		<div class="row" >
		<div class="col-sm-9 mx-auto">
		<div class="row py-5" style="justify-content:center;gap: 30px;">
<?php
$q11=mysqli_query($con,"SELECT t1.*,t2.slug_$L,t2.name_$L FROM services as t1 LEFt JOIN sitemap as t2 ON(t1.sitemapid=t2.id) WHERE t1.active=1 ORDER BY pos ASC");
while($r11=mysqli_fetch_array($q11)){
?>
				<a href="/<?=$L?>/service/<?=$r11["slug_$L"]?>" class="BOX1 d-flex px-0" style="background:url('<?=$r11["img"]?>');background-size: cover;background-position: center;">
					<div class="BOXTITLE"><?=$r11["name_$L"]?></div>
				</a>
<?php
}
?>
		</div>
		</div>
		</div>
	</div>
</section>
