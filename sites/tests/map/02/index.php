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
						lat : -34.397,
						lng : 150.644
					},
					zoom : 8
				};
				var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			}


			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>
	<body>
		<div id="map-canvas"></div>
		<form class="form">
			<input type="text" class="pac-input" value="" placeholder="City name" />
		</form>
	</body>
</html>