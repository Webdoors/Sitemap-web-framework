<div class="container-fluid">
	<div class="row">
		<div class="col-sm-7" id="maps" style="height:400px;">
			
		</div>
		<div class="col-sm-5">
			<div class="row">
				<div class="col-sm-12">
					<input class="form-control"/>
				</div>
				<div class="col-sm-12">
					<input class="form-control"/>
				</div>
				<div class="col-sm-12">
					<input class="form-control"/>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function myMap() {
 var infowindow2 = new google.maps.InfoWindow({
  content:'Bambis rigi 7 <a href="https://goo.gl/maps/RDp4eErJh2J2" >Get Direction</a>'
  });
   var infowindow = new google.maps.InfoWindow({
  content:'Kostava 77, 0160 <a href="https://goo.gl/maps/UhNHcAPJxek" >Get Direction</a>'
  });
  var myCenter = new google.maps.LatLng(41.738678, 44.780519);
  var mymarker2 = new google.maps.LatLng(41.6909201,44.808261);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 18};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position: myCenter, map: map,title: 'მესამე სართული ოთახი:375'});
  var marker = new google.maps.Marker({position:myCenter,icon:'img/lg.png'});
  var marker2 = new google.maps.Marker({position:mymarker2,icon:'img/lg.png'});
  marker.setMap(map);
  marker2.setMap(map);
  google.maps.event.addListener(marker,'click',function() {

	infowindow.open(map,marker);
  });
  google.maps.event.addListener(marker2,'click',function() {


infowindow2.close();
	infowindow2.open(map,marker2);
  });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjpdLIjhywzr2QZBamJXeijRkE1Zy3is&callback=myMap"></script>