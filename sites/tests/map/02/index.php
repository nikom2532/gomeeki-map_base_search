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
			function initialize() {
				var mapOptions = {
					center : {
						lat : 13.7898093,
						lng : 100.632129
					},
					zoom : 8
				};
				var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
				
<?php
				if(isset($_POST["search_cityname"])){
					if($_POST["search_cityname"] == "yes"){
?>
						// setMarker(map);
						$("#city-label").css("display", "block");
						$("#city-text").html("<?php echo $_POST["cityname"]; ?>");
						
						var input = document.getElementById('cityname');
						// console.log(input);
						
						var searchBox = new google.maps.places.SearchBox(input);
						
						google.maps.event.addListener(searchBox, 'places_changed', function() {
							var places = searchBox.getPlaces();
							alert("test");
							if (places.length == 0) {
								return;
							}
							for (var i = 0, marker; marker = markers[i]; i++) {
								marker.setMap(null);
							}
							markers = [];
    						var bounds = new google.maps.LatLngBounds();
    						for (var i = 0, place; place = places[i]; i++) {
    							var marker = new google.maps.Marker({
									map: map,
									title: place.name,
									position: place.geometry.location
								});
								createMarker(place);
    							markers.push(marker);
    							bounds.extend(place.geometry.location);
    						}
    						map.fitBounds(bounds);
						});
						
						google.maps.event.addListener(map, 'bounds_changed', function() {
							var bounds = map.getBounds();
							searchBox.setBounds(bounds);
						});
<?php
					}
				}
?>
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
				
				
				function setMarker(map){
					var myLatlng = new google.maps.LatLng(13.7898093,100.632129);
					var mapOptions = {
					  zoom: 4,
					  center: myLatlng
					}
					
					var marker = new google.maps.Marker({
					    position: myLatlng,
					    title:"Hello World!"
					});
					
					var contentString = 
					  '<div id="content">'+
					  '<div id="siteNotice">'+
					  '</div>'+
					  '<h1 id="firstHeading" class="firstHeading">Test</h1>'+
					  '<div id="bodyContent">'+
					  '<p><b>Test</b>, My name is <b>Arming Huang</b> in Thai is <b>Nikom Suwankamol</b></p>' +
					  '<p>in Thai is <b>Nikom Suwankamol</b></p>' +
					  '</div>'+
					  '</div>';
					
					var infowindow = new google.maps.InfoWindow({
						content: contentString
					});
					  
					google.maps.event.addListener(marker, 'click', function() {
						infowindow.open(map,marker);
					});
					  
					// To add the marker to the map, call setMap();
					marker.setMap(map);
				}
			}
			
			google.maps.event.addDomListener(window, 'load', initialize);
			
			function setTest(){
						
			}
			
			
			
		</script>
	</head>
	<body>
		<div id="city-label">
			<div id="city-text"></div>
		</div>
		<div id="map-canvas"></div>
		<form class="form" name="form" id="form" method="post">
			<input type="text" name="cityname" id="cityname" class="pac-input" value="<?
				if(isset($_POST["cityname"])){
					echo $_POST["cityname"];
				}
			?>" placeholder="City name" />
			<input type="hidden" name="search_cityname" value="yes" />
		</form>
	</body>
</html>