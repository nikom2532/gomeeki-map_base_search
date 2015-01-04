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
		</style>
		<!-- <script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzxoqIy0F2_2xhgXOgCZHSH83Mtw4Kujg"></script> -->

		<script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

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
						setMarker(map);
						
<?php
					}
				}
?>
			}
			
			google.maps.event.addDomListener(window, 'load', initialize);
			
			
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
			
		</script>
	</head>
	<body>
		<div id="map-canvas"></div>
		<form class="form" name="form" id="form" method="post">
			<input type="text" class="pac-input" value="" placeholder="City name" />
			<input type="hidden" name="search_cityname" value="yes" />
		</form>
	</body>
</html>