<!DOCTYPE HTML>
<html>
	
	<head>
		<?php include "include/head.php"?>
		<style>
		  /* Always set the map height explicitly to define the size of the div
		   * element that contains the map. */
			body {
				min-width: 500px;
			}
			#search {
				height: 50px;
				background-color:floralwhite;
				border-bottom: 3px solid;
				border-color:cornflowerblue;
				padding: 10px;
				box-sizing: border-box;
			}
			#map {
				height: calc(100% - 50px);
			}
			/* Optional: Makes the sample page fill the window. */
			html, body {
				height: 100%;
				margin: 0;
				padding: 0;
			}
			
			input, .button {
				height: 30px;
				min-width: 100px;
			}
			input {
				float: left;
				width: 35%;
				margin-right: 10px;
				padding: 5px;
			}
			.button {
				float: right;
				width: 15%;
			}
			button {
				width: 100%;
				height: 100%;
			}
    	</style>
	</head>
	
	<body>
		<?php include "include/jsFiles.php" ?>
		<div id="search">
			<input type="text" id="start" placeholder="Start" autofocus>
			<input type="text" id="end" placeholder="Destination">
			<div class="button"><button onclick="calcRoute()" type="button">Show Route</button></div>
		</div>
		<div id="map"></div>
		
		<script>
			var directionsDisplay;
			var directionsService;
			var map;
			var routeRes;

			function calcRoute() {
				var start = $("#start").val();
				var end = $("#end").val();
				var request = {
					origin: start,
					destination: end,
					travelMode: 'DRIVING'
				};
				directionsService = new google.maps.DirectionsService();
				directionsService.route(request, function(result, status) {
					if (status == 'OK') {
						directionsDisplay.setDirections(result);
						routeRes = result;
						console.log(routeRes["routes"]["0"]["legs"]["0"]["distance"]["text"] + " - " + routeRes["routes"]["0"]["legs"]["0"]["duration"]["text"])
					}
				});
			}
			
			function initialize() {
				directionsDisplay = new google.maps.DirectionsRenderer();
				directionsDisplay.setMap(map);
			}
			function initMap() {
				console.log("initMap() called");
				map = new google.maps.Map(document.getElementById('map'), {
					center: {lat: 55.983066, lng: 10.465233},
					zoom: 7
				});
				initialize();
			}
		</script>
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvqUxb4ugw9iq8Dqek3GNs5qE-FIkwNgQ&callback=initMap" async defer></script>
	</body>

</html>