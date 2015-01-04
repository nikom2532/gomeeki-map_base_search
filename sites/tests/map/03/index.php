<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			html, body, #map-canvas {
				height: 97%;
				margin: 0;
				padding: 0;
			}
			.form{
				/*margin-top: 20px;*/
				height: 3%;
			}
			.pac-input {
			    background-color: #fff;
			    padding: 0 11px 0 13px;
			    width: 400px;
			    font-family: Roboto;
			    font-size: 15px;
			    font-weight: 300;
			    text-overflow: ellipsis;
			}
			.controls {
				margin-top: 16px;
				border: 1px solid transparent;
				border-radius: 2px 0 0 2px;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				height: 32px;
				outline: none;
				box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
			}
			#city-label{
				position: absolute;
				top: 5%;
				left: 50%;
				z-index: 999;
				border: 2px solid #000;
				background-color: #fff;
				display: none;
			}
			#city-text{
				position: relative;
				color: #000;
				margin: 5px;
			}
		</style>
		<!-- <script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzxoqIy0F2_2xhgXOgCZHSH83Mtw4Kujg"></script> -->

		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
		
		<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>

		<script type="text/javascript">
			var map;
			var infowindow;
			
			function initialize() {
			  var pyrmont = new google.maps.LatLng(-33.8665433, 151.1956316);
			
			  map = new google.maps.Map(document.getElementById('map-canvas'), {
			    center: pyrmont,
			    zoom: 15
			  });
			
			  var request = {
			    location: pyrmont,
			    radius: 500,
			    types: ['store']
			  };
			  infowindow = new google.maps.InfoWindow();
			  var service = new google.maps.places.PlacesService(map);
			  service.nearbySearch(request, callback);
			}
			
			function callback(results, status) {
			  if (status == google.maps.places.PlacesServiceStatus.OK) {
			    for (var i = 0; i < results.length; i++) {
			      createMarker(results[i]);
			    }
			  }
			}
			
			function createMarker(place) {
			  var placeLoc = place.geometry.location;
			  var marker = new google.maps.Marker({
			    map: map,
			    position: place.geometry.location
			  });
			
			  google.maps.event.addListener(marker, 'click', function() {
			    infowindow.setContent(place.name);
			    infowindow.open(map, this);
			  });
			}
			
			google.maps.event.addDomListener(window, 'load', initialize);
			
		</script>
	</head>
	<body>
		<div id="city-label">
			<div id="city-text"></div>
		</div>
		<div id="map-canvas"></div>
		<form class="form" name="form" id="form" method="post">
			<input type="text" name="cityname" class="pac-input" value="<?
				if(isset($_POST["cityname"])){
					echo $_POST["cityname"];
				}
			?>" placeholder="City name" />
			<input type="hidden" name="search_cityname" value="yes" />
		</form>
	</body>
</html>