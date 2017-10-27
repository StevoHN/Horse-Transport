<?php
session_start();

if($_SESSION['userLoggedIn'])
{
	header('location:index.php');
	exit;
}
?>
<!DOCTYPE HTML>
<html>

	<head>
		<?php include "include/head.php" ?>
		
		<title>Horse Transport - Register</title>
	</head>

	<body>
		<?php include "include/navbar.php" ?>
		
		<div class="container">
			
			<!-- Form Start -->
			<div class="col-sm-8 col-sm-push-2 col-md-6 col-md-push-3">
				<form action="processRegistration.php" method="post" class="form-horizontal">
					
					<!-- Name of customer -->
					<div class="form-group">
						<label for="customerFirstName" class="col-xs-12">First Name:</label>
						<div class="col-xs-12">
							<input type="text" id="customerFirstName" name="customerFirstName" class="form-control" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="customerLastName" class="col-xs-12">Last Name:</label>
						<div class="col-xs-12">
							<input type="text" id="customerLastName" name="customerLastName" class="form-control" placeholder="Last Name">
						</div>
					</div>
					
					<!-- Contacts -->
					<div class="form-group">
						<label for="customerEmail" class="col-xs-12">E-mail:</label>
						<div class="col-xs-12">
							<input type="email" id="customerEmail" name="customerEmail" class="form-control" placeholder="E-mail">
						</div>
					</div>
					<div class="form-group">
						<label for="customerRetypeEmail" class="col-xs-12">Retype E-mail:</label>
						<div class="col-xs-12">
							<input type="email" id="customerRetypeEmail" name="customerRetypeEmail" class="form-control" placeholder="Retype E-mail">
						</div>
					</div>
					
					<div class="form-group">
						<label for="customerPhone" class="col-xs-12">Phone:</label>
						<div class="col-xs-12">
							<input type="tel" id="customerPhone" name="customerPhone" class="form-control" placeholder="Phone Number">
						</div>
					</div>
					
					<div class="form-group">
						<label for="customerAddress" class="col-xs-12">Address:</label>
						<div class="col-xs-12">
							<input type="text" id="customerAddress" name="customerAddress" class="form-control" placeholder="Addess">
						</div>
					</div>
					
					<div class="form-group">
						<label for="customerBirthday" class="col-xs-12">Birthday:</label>
						<div class="col-xs-12">
							<input type="date" id="customerBirthday" name="customerBirthday" class="form-control" placeholder="DD/MM/YYYY" max="<?php 
						$today = new DateTime('today');
						$today->modify("-10 years");
						echo $today->format("Y-m-d");
						?>">
						</div>
					</div>
					
					<!-- Password -->
					<div class="form-group">
						<label for="customerPassword" class="col-xs-12">Password:</label>
						<div class="col-xs-12">
							<input type="password" id="customerPassword" name="customerPassword" class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<label for="customerRetypePassword" class="col-xs-12">Retype Password:</label>
						<div class="col-xs-12">
							<input type="password" id="customerRetypePassword" name="customerRetypePassword" class="form-control" placeholder="Retype Password">
						</div>
					</div>
					
					<div class="alert alert-danger">
						<strong>Warning: </strong>There is currently no security on the website, please refrain from using one of your typical passwords.
					</div>
					<!-- Submit -->
					<div class="form-group">
						<div class="col-xs-12">
							<button type="submit" class="form-control btn btn-success" value="Register">Register</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
		
		<?php include "include/jsFiles.php" ?>
	</body>
	
</html>