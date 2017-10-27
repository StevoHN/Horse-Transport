<?php
session_start();

if(!$_SESSION['userLoggedIn'])
{
	header('location:login.php');
	exit;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php include "include/head.php" ?>
		<link rel="stylesheet" href="../css/datepicker.css">
	</head>
	<body>
		<?php include "include/navbar.php" ?>
		<div class="container">
			
			<div class="alert alert-info">
				<strong>Note: </strong>If you need multiple horses transported to or from multiple locations, please make an individual order for each horse.
			</div>
			
			<!-- Form Start -->
			<form action="processOrder.php" method="post" class="form-horizontal"> <!-- class="form-horizontal col-xs-10 col-xs-push-1 col-md-12 col-md-push-0"> -->
				<!-- Name of customer -->
				<div class="form-group">
					<label for="customerFirstName" class="control-label col-md-2">First Name:</label>
					<div class="col-md-4">
						<input type="text" id="customerFirstName" name="customerFirstName" class="form-control" placeholder="First Name" value="<?php echo $_SESSION['user']; ?>">
					</div>
					<label for="customerLastName" class="control-label col-md-2">Last Name:</label>
					<div class="col-md-4">
						<input type="text" id="customerLastName" name="customerLastName" class="form-control" placeholder="Last Name" value="<?php echo $_SESSION['userLastName']; ?>">
					</div>
				</div>
				
				<!-- Contact Info -->
				<!--<div class="form-group">
					<label for="customerEmail" class="control-label col-md-2">E-mail:</label>
					<div class="col-md-5">
						<input type="email" id="customerEmail" name="customerEmail" class="form-control" placeholder="E-mail">
					</div>
					<label for="customerPhone" class="control-label col-md-2">Phone:</label>
					<div class="col-md-3">
						<input type="tel" id="customerPhone" name="customerPhone" class="form-control" placeholder="Phone Number">
					</div>
				</div>-->
				
				
				<!-- Number of horses to be transported -->
				<div class="form-group">
					<label for="horseCount" class="control-label col-md-2">Number of Horses:</label>
					<div class="col-md-10">
						<input type="number" id="horseCount" name="horseCount" class="form-control" value="1" min="1">
					</div>
				</div>
				
				<!-- Horse information/details -->
				<!-- 
				Create dropdown menu to select a horse from.
				Dropdown menu will contain horses entered by the user before
				and the option to enter information about a new horse.
				-->
				
				
				<!-- Pickup Point -->
				<div class="col-xs-12 bg-warning formLocation">
					<div class="form-group">
						<label for="locationFrom" class="control-label col-md-2">Location (From):</label>
						<div class="col-md-10"> <!-- class="input-group" -->
							<!--<span class="input-group-addon" id="btnGroupAddon">@</span>-->
							<input type="text" id="locationFrom" name="locationFrom" class="form-control" placeholder="Enter pickup location">
						</div>
					</div>
					<div class="form-group">
						<!--<button type="button" class="btn btn-default col-md-1 col-md-push-1" onclick="$('#locationFrom').val('<?php //echo $_SESSION['userAddress']; ?>');$('#locationFrom').focus()">From Home</button>-->
						<label class="control-label col-md-2 col-md-push-2">Street:</label>
						<div class="col-md-8 col-md-push-2">
							<input type="text" id="fromStreet" name="fromStreet" class="form-control" placeholder="Street" disabled> 
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-md-push-2">City:</label>
						<div class="col-md-4 col-md-push-2 pushDownCity">
							<input type="text" id="fromCity" name="fromCity" class="form-control" placeholder="City" disabled> 
						</div>
						<label class="control-label col-md-2 col-md-push-2">Zip Code:</label>
						<div class="col-md-2 col-md-push-2">
							<input type="text" id="fromZipCode" name="fromZipCode" class="form-control" placeholder="Zip Code" disabled> 
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-md-push-2">Country:</label>
						<div class="col-md-8 col-md-push-2">
							<input type="text" id="fromCountry" name="fromCountry" class="form-control" placeholder="Country" disabled> 
						</div>
					</div>
				</div>
				
				<!-- Destination -->
				<div class="col-xs-12 bg-warning formLocation">
					<div class="form-group">
						<label for="locationTo" class="control-label col-md-2">Location (To):</label>
						<div class="col-md-10">
							<input type="text" id="locationTo" name="locationTo" class="form-control" placeholder="Enter destination">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-md-push-2">Street:</label>
						<div class="col-md-8 col-md-push-2">
							<input type="text" id="toStreet" name="toStreet" class="form-control" placeholder="Street" disabled> 
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-md-push-2">City:</label>
						<div class="col-md-4 col-md-push-2 pushDownCity">
							<input type="text" id="toCity" name="toCity" class="form-control" placeholder="City" disabled> 
						</div>
						<label class="control-label col-md-2 col-md-push-2">Zip Code:</label>
						<div class="col-md-2 col-md-push-2">
							<input type="text" id="toZipCode" name="toZipCode" class="form-control" placeholder="Zip Code" disabled> 
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-md-push-2">Country:</label>
						<div class="col-md-8 col-md-push-2">
							<input type="text" id="toCountry" name="toCountry" class="form-control" placeholder="Country" disabled> 
						</div>
					</div>
				</div>
				
				<!-- Date -->
				<div class="form-group">
					<label for="orderDate" class="control-label col-md-2">Date:</label>
					<div class="col-md-10">
                    	<input type="date" class="form-control" id="orderDate" name="orderDate" placeholder="DD/MM/YYYY" min="<?php 
						$tomorrow = new DateTime('tomorrow');
						echo $tomorrow->format("Y-m-d");
						?>">
					</div>	
				</div>
				
				<!-- Comments -->
				<div class="form-group">
					<label for="comments" class="control-label col-md-2">Comments:</label>
					<div class="col-md-10">
						<textarea id="orderComments" name="orderComments" class="form-control" rows="5" placeholder="Comments..."></textarea>
					</div>
				</div>
				
				<!-- Customer ID -->
				<!--<input type="text" value="<?php echo $_SESSION['userId'] ?>" id="customerId" name="customerId" style="display:none;" hidden>-->
				
				<!-- Submit -->
				<div class="form-group">
					<div class="col-md-12">
						<input type="submit" class="form-control btn-success">
					</div>
				</div>
		   	</form>
			<!-- Form End -->
		</div>
		
		<?php include "include/jsFiles.php" ?>
		<script src="../js/bootstrap-datepicker.min.js"></script>
		<script>
			/*$('#datepicker').datepicker(
			{
				changeMonth: true,
     			changeYear: true,
				startDate: "+1d"
			});*/

			
			var autocomplete1, autocomplete2;
			var componentForm = {
				street_number: 'short_name',
				route: 'long_name',
        		locality: 'long_name',
				sublocality_level_1: 'long_name',
				country: 'long_name',
				postal_code: 'short_name'
		  	};
			function initAutocomplete()
			{
				var defaultBounds = new google.maps.LatLngBounds(
				new google.maps.LatLng(54.312183, 7.583471),
				new google.maps.LatLng(57.965423, 13.050104)
				);
				var options = {
				bounds: defaultBounds
				};

				var input = document.getElementById("locationFrom");
				autocomplete1 = new google.maps.places.Autocomplete(input,options);
        		autocomplete1.addListener('place_changed', fillInAddress1);
				
				var input = document.getElementById("locationTo");
				autocomplete2 = new google.maps.places.Autocomplete(input,options);
        		autocomplete2.addListener('place_changed', fillInAddress2);
				
			}
			function fillInAddress1()
			{
				var addr = {};
				var address = autocomplete1.getPlace();

				// Get each component of the address from the place details
				// and fill the corresponding field on the form.
				for (var i = 0; i < address.address_components.length; i++)
				{
					var addressType = address.address_components[i].types[0];
					if(componentForm[addressType])
					{
						addr[addressType] = address.address_components[i][componentForm[addressType]];
					}
					//document.getElementById(field).value = val;
				}
				
				var street = typeof(addr.route) === "undefined" ? "" : addr.route;
				var street_number = typeof(addr.street_number) === "undefined" ? "" : " " + addr.street_number;
				$("#fromStreet").val(street + street_number);
				$("#fromStreet").prop("disabled",false);
				
				var city = typeof(addr.sublocality_level_1) === "undefined" ? addr.locality : addr.sublocality_level_1;
				$("#fromCity").val(city);
				$("#fromCity").prop("disabled",false);
				
				var zip_code = typeof(addr.postal_code) === "undefined" ? "" : addr.postal_code;
				$("#fromZipCode").val(zip_code);
				$("#fromZipCode").prop("disabled",false);
				
				var country = typeof(addr.country) === "undefined" ? "" : addr.country;
				$("#fromCountry").val(country);
				$("#fromCountry").prop("disabled",false);
			}
			
			function fillInAddress2() {
				var addr = {};
				var address = autocomplete2.getPlace();

				// Get each component of the address from the place details
				// and fill the corresponding field on the form.
				for (var i = 0; i < address.address_components.length; i++)
				{
					var addressType = address.address_components[i].types[0];
					if(componentForm[addressType])
					{
						addr[addressType] = address.address_components[i][componentForm[addressType]];
					}
					//document.getElementById(field).value = val;
				}
				
				var street = typeof(addr.route) === "undefined" ? "" : addr.route;
				var street_number = typeof(addr.street_number) === "undefined" ? "" : " " + addr.street_number;
				$("#toStreet").val(street + street_number);
				$("#toStreet").prop("disabled",false);
				
				var city = typeof(addr.sublocality_level_1) === "undefined" ? addr.locality : addr.sublocality_level_1;
				$("#toCity").val(city);
				$("#toCity").prop("disabled",false);
				
				var zip_code = typeof(addr.postal_code) === "undefined" ? "" : addr.postal_code;
				$("#toZipCode").val(zip_code);
				$("#toZipCode").prop("disabled",false);
				
				var country = typeof(addr.country) === "undefined" ? "" : addr.country;
				$("#toCountry").val(country);
				$("#toCountry").prop("disabled",false);
			}
		</script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvqUxb4ugw9iq8Dqek3GNs5qE-FIkwNgQ&libraries=places&callback=initAutocomplete"></script>
	</body>
</html>